<?php
	class QQ_oauth extends Origin
	{
		private $userIP;
		public function __construct()
		{
			parent::__construct(true , true);
			
			$this->userIP = $this->fun->getIP();
			
			set_include_path(dirname(dirname(__FILE__)) . '/Class/QQ/');
			require_once('OpenSDK/Tencent/Weibo.php');
			OpenSDK_Tencent_Weibo::init(TX_appkey , TX_appsecret);
		}
		
		public function index()
		{
			//$callback = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . '/?O=QQ_oauth&A=callback';
			$request_token = OpenSDK_Tencent_Weibo::getRequestToken(TX_callback);
			$url = OpenSDK_Tencent_Weibo::getAuthorizeURL($request_token);
			header('Location: ' . $url);
		}
		
		/**
		 * 从Callback返回时
		 */
		public function callback()
		{
			if(OpenSDK_Tencent_Weibo::getAccessToken($this->get['oauth_verifier']))
			{
				//此时已经可以正常调用CGI
				$uinfo = OpenSDK_Tencent_Weibo::call('user/info');
				//echo '<pre>';
				//print_r($uinfo);
				//echo '</pre>';exit;
				echo "
					<script type=\"text/javascript\">
						window.opener.callback_exec('Tencent' , false , '{$uinfo['data']['name']}','{$uinfo['data']['nick']}');
						window.close();
					</script>";
			
			}else{
				echo '获得Access Tokn 失败';
			}
		}
		
		//发表一条微博
		public function send()
		{
			$post = $this->__get_post();
			if (empty($post['id'])) {echo $this->fun->json_encode(array('error'=>-1 , 'msg' => '转发的微博信息不不存在'));exit;}
			
			$call = OpenSDK_Tencent_Weibo::call(
						't/add' ,
						array('content' => $post['content'] , 'clientip' => $this->userIP) ,
						'POST' , FALSE , true
					);
			
			//提交成功
			if ($call['ret'] == 0)
			{
				$this->db->update('award_wb' , array('share_wb_id' => $call['data']['id']) , 'id=' . $post['id']);
				echo $this->fun->json_encode(array('error'=>'0' , 'msg' => '中奖信息分享成功咯'));exit;
			}else{
				echo $this->fun->json_encode(array('error'=>-5 , 'msg' => '转发不成功,请过会操作'));exit;
			}
		}
		
		//转发微博
		public function transmit()
		{
			$post = $this->__get_post();
			if (empty($post['W_U_name'])) {echo $this->fun->json_encode(array('error'=>-1 , 'msg' => '腾讯微博账号不存在'));exit;}
			if (empty($post['content'])) {echo $this->fun->json_encode(array('error'=>-2 , 'msg' => '转发信息不能为空'));exit;}
			
			//10分钟转发一次
			if (($time = $this->db->select_to_1Array("select time from award_wb where W_U_name='{$post['W_U_name']}' order by id desc limit 1;")))
			{
				if (($time['time'] + 600) > time())
				{
					$time = ceil(($time['time'] + 600 - time()) / 60);
					echo $this->fun->json_encode(array('error'=>-3 , 'msg' => '操作过快,请 ' . $time . ' 分钟后在转发'));exit;
				}
			}
			
			$call = OpenSDK_Tencent_Weibo::call(
						't/re_add' ,
						array('content' => $post['content'] ,'clientip' => $this->userIP , 'reid'=> $post['wbID']) ,
						'POST' , FALSE , true
					);
			
			$friends = false;
			if ($post['friends']) $friends = $this->friends_add($post['friends']);
			
			//提交成功
			if ($call['ret'] == 0)
			{
				$array = array();
				$array['W_U_name'] = $post['W_U_name'];
				$array['W_U_nick'] = $post['W_U_nick'];
				$array['W_U_info_id'] = $call['data']['id'];
				$array['W_U_info'] = $post['content'];
				$array['W_U_ip'] = $this->userIP;
				$array['time'] = $call['data']['time'];
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
				
			}else{
				//接口发送不成功
				echo $this->fun->json_encode(array('error'=>-5 , 'msg' => '转发不成功,请过会操作'));exit;
			}
		}
		
		//关注一个用户
		public function friends_add($wbName)
		{
			$call = OpenSDK_Tencent_Weibo::call('friends/add' , array('name' => $wbName) ,'POST' , FALSE , true);
			
			return isset($call['ret']) && $call['ret'] == 0 ? true : false;
		}
	}
?>