<?php
	class Sina_oauth extends Origin
	{
		private $userIP , $sina;
		public function __construct()
		{
			parent::__construct(true , true);
			set_include_path(dirname(dirname(__FILE__)) . '/Class/Sina/');
			require_once('saetv2.ex.class.php');
			$this->sina = new SaeTOAuthV2(WB_AKEY , WB_SKEY);
			$this->userIP = $this->fun->getIP();
			
		}
		
		public function index()
		{
			header('Location: ' . $this->sina->getAuthorizeURL(WB_CALLBACK_URL));
		}
		
		/**
		 * 从Callback返回时
		 */
		public function callback()
		{
			if (isset($_REQUEST['code']))
			{
				$keys = array();
				$keys['code'] = $_REQUEST['code'];
				$keys['redirect_uri'] = WB_CALLBACK_URL;
				
				try
				{
					$token = $this->sina->getAccessToken( 'code', $keys ) ;
				}catch (OAuthException $e) {}
			}
			
			if ($token)
			{
				$_SESSION['token'] = $token;
				setcookie( 'weibojs_'.$this->sina->client_id, http_build_query($token) );
				
				$c = new SaeTClientV2( WB_AKEY , WB_SKEY , $token['access_token'] );
				$ms  = $c->home_timeline(); // done
				$uid_get = $c->get_uid();
				$uid = $uid_get['uid'];
				$user = $c->show_user_by_id($uid);//根据ID获取用户等基本信息
				
				$_SESSION['token']['name'] = $user['name'];
				
				echo "
					<script type=\"text/javascript\">
						window.opener.callback_exec('Sina' , {$uid} , '{$user['name']}',false);
						window.close();
					</script>";
			}else{
				echo '授权失败';
			}
		}
		
		//发表一条微博
		public function send()
		{
			$post = $this->__get_post();
			if (empty($post['id'])) {echo $this->fun->json_encode(array('error'=>-1 , 'msg' => '转发的微博信息不不存在'));exit;}
			
			$c = new SaeTClientV2(WB_AKEY , WB_SKEY , $_SESSION['token']['access_token']);
			$ret = $c->update($post['content']);
			
			if (isset($ret['error_code']) && $ret['error_code'] > 0)
			{
				echo $this->fun->json_encode(array('error'=>-5 , 'msg' => '转发不成功,请过会操作'));exit;
				//echo "<p>发送失败，错误：{$ret['error_code']}:{$ret['error']}</p>";
			}else{
				$this->db->update('award_wb' , array('share_wb_id' => $ret['idstr']) , 'id=' . $post['id']);
				echo $this->fun->json_encode(array('error'=>'0' , 'msg' => '中奖信息分享成功咯'));exit;
			}
		}
		
		//转发微博
		public function transmit()
		{
			$post = $this->__get_post();
			if (empty($post['W_U_id'])) {echo $this->fun->json_encode(array('error'=>-1 , 'msg' => '新浪微博账号不存在'));exit;}
			if (empty($post['content'])) {echo $this->fun->json_encode(array('error'=>-2 , 'msg' => '转发信息不能为空'));exit;}
			
			//10分钟转发一次
			if (($time = $this->db->select_to_1Array("select time from award_wb where W_U_id='{$post['W_U_id']}' order by id desc limit 1;")))
			{
				if (($time['time'] + 600) > time())
				{
					$time = ceil(($time['time'] + 600 - time()) / 60);
					echo $this->fun->json_encode(array('error'=>-3 , 'msg' => '操作过快,请 ' . $time . ' 分钟后在转发'));exit;
				}
			}
			
			$c = new SaeTClientV2(WB_AKEY , WB_SKEY , $_SESSION['token']['access_token']);
			//是否在转发的同时发表评论，0：否、1：评论给当前微博、2：评论给原微博、3：都评论，默认为0。
			$ret = $c->repost($post['wbID'] , $post['content'] , 3);
			
			$friends = false;
			
			if ($post['friends']) $friends = $this->friends_add($post['friends']);
			//var_dump($friends);exit;
			//提交成功
			if (isset($ret['error_code']) && $ret['error_code'] > 0)
			{
				echo $this->fun->json_encode(array('error'=>-5 , 'msg' => '转发不成功,请过会操作'));exit;
			}else{
				$array = array();
				$array['W_U_id'] = $post['W_U_id'];
				$array['W_U_name'] = $post['W_U_name'];
				
				$array['W_U_info_id'] = $ret['idstr'];
				$array['W_U_info'] = $post['content'];
				$array['W_U_ip'] = $this->userIP;
				$array['time'] = time();
				$array['is_friends'] = $friends ? 1 : 0;
				
				if (($tab = $this->db->select_to_2Array("select * from award order by taxis asc")))
				{
					$this->load_file('award' , '' , false);
					$award = new award();
					$keys = $award->exec($tab);
					
					$array['aid'] = $keys['id'];
					
					$Ks = strtoupper($this->fun->rand_string(16));
					$Ks = substr($Ks , 0 , 4) . ' - ' . substr($Ks , 4 , 4) . ' - ' . substr($Ks , 8 , 4) . ' - ' . substr($Ks , 12 , 4);
					$array['key'] = $Ks;
					
					$this->db->insert('award_wb' , $array);
					$id = $this->db->get_id();
					
					echo $this->fun->json_encode(
												array(
													'error'=> '0' ,
													'info' => array(
																	'msg' => str_replace('{{key}}' , $Ks , $keys['views']) ,
																	'shareID'=> $id,
																	'share' => $keys['share'])
															)
												);
					exit;
					
				}else{
					echo $this->fun->json_encode(array('error'=>-4 , 'msg' => '程序处理错误,请与管理员联系'));exit;
				}
			}
		}
		
		//关注一个用户
		public function friends_add($uid)
		{
			//return $uid;
			$c = new SaeTClientV2(WB_AKEY , WB_SKEY , $_SESSION['token']['access_token']);
			$ret = $c->follow_by_id((int)$uid);
			//return $ret['error_code'];
			return (isset($ret['error_code']) && $ret['error_code'] > 0 && $ret['error_code']!=20506) ? false : true;
		}
	}
?>