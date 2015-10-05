<?php
	class customSMS extends start
	{
		public function __construct()
		{
			parent::__construct(true);
		}
		
		public function show()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			
			if (count($_SESSION['back']['customSMS']))
			{
				$this->proxy_list();
			}
			
			$this->sma->display($this->get['open']);
		}
		
		public function add()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			
			if (count($_SESSION['back']['customSMS']) > 99) $this->fun->Msg('一次最多只能群发100个账号');
			
			$post = $this->fun->pars_all('post' , true);
			if (!$this->fun->IsPhone($post['phone'])) $this->fun->Msg('请输入正确的手机号码');

			if (is_array($_SESSION['back']['customSMS']))
				$_SESSION['back']['customSMS'] = array_merge($_SESSION['back']['customSMS'] , array($post['phone'] => $post['phone']));
			else
				$_SESSION['back']['customSMS'] = array($post['phone'] => $post['phone']);
			
			$this->fun->local('./?open=' . $this->get['open']);
		}
		
		public function del()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			
			if ($this->get['phone'])
				unset($_SESSION['back']['customSMS'][$this->get['phone']]);
			else
				unset($_SESSION['back']['customSMS']);
			$this->fun->local('./?open=' . $this->get['open']);
		}
		
		public function send()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			
			if ($this->get['go'])
			{
				$post = $_SESSION['back']['customSMS_post'];
			}else{
				$post = $this->fun->pars_all('post' , true);
				$_SESSION['back']['customSMS_post'] = $post;
			}
			
			if (!$post['message']) $this->fun->Msg('请输入短信内容');
			
			$i = 0;
			foreach ($_SESSION['back']['customSMS'] as $val)
			{
				if ($val && $this->fun->IsPhone($val))
				{
					$pxy[$i / 100][] = $val;
				}else{
					unset($_SESSION['back']['customSMS'][$val]);
				}
			}
			if (!count($pxy)) $this->fun->local('./?open=customSMS&action=error&code=1');
			
			foreach ($pxy as $key => $val)
			{
				$pxy[$key] = join(',' , $val);
			}
			//print_r($pxy);exit;
			$tiao = 0;
			foreach ($pxy as $key => $val)
			{
				$message = urlencode($post['message']);
				$url = "http://sdkhttp.eucp.b2m.cn/sdkproxy/sendsms.action?cdkey=" . SMS_key . "&password=" . SMS_password . "&phone={$val}&message={$message}";
				if (($url = @file($url)) !== false)
				{
					$ARR = array();
					$ARR['id'] = $this->fun->rand_string(13);
					$ARR['send_id'] = $_SESSION['back']['account'];
					$ARR['receiver_id'] = $val;
					$ARR['mobile'] = $val;
					$ARR['type'] = 'back_custom';
					$ARR['info'] = $post['message'];
					$ARR['price'] = 0;
					$ARR['err_no'] = strip_tags(trim($url[3]));
					$ARR['err_info'] = strip_tags(trim($url[4]));
					$ARR['time'] = mktime();
						
					if (trim($url[3]) === '<error>0</error>')
					{
						$mob = explode(',' , $val);
						$tiao += count($mob);
						foreach ($mob as $mo) unset($_SESSION['back']['customSMS'][$mo]);
						
						//发送时,删除之前发送失败的,也可以不删除,保留给管理员查看
						$this->db->del('sms' , "err_no!=0 and info='{$ARR['info']}' and send_id='{$ARR['send_id']}' and receiver_id='{$ARR['receiver_id']}' and mobile='{$ARR['mobile']}'");
						$this->db->insert('sms' , $ARR);
						
					}else{
						if ($this->db->select_to_1Array("select id from sms where err_no!=0 and info='{$ARR['info']}' and send_id='{$ARR['send_id']}' and receiver_id='{$ARR['receiver_id']}' and mobile='{$ARR['mobile']}'") == false)
							$this->db->insert('sms' , $ARR);
						else
							$this->db->update('sms' , array('time' => mktime()) , "err_no!=0 and info='{$ARR['info']}' and send_id='{$ARR['send_id']}' and receiver_id='{$ARR['receiver_id']}' and mobile='{$ARR['mobile']}'");
					}
				}
			}
			$_SESSION['back']['customSMS_successful'] = $tiao;
			if ($tiao)
				$this->fun->local('./?open=customSMS&action=successful');
			else
				$this->fun->local('./?open=customSMS&action=error&code=-1');
		}
		
		public function successful()
		{
			$this->sma->display($this->get['open']);
		}
		
		public function error()
		{
			$this->sma->display($this->get['open']);
		}
		
		private function proxy_list()
		{
			if ($_SESSION['back']['customSMS'])
			{
				$id = "('" . join("','" , $_SESSION['back']['customSMS']) . "')";
				$SQL = "select n.content as tel,p.account,p.name,p.nickname,p.`number`,p.company_name,g.name as `group` from proxy_nab as n left join proxy as p on p.id=n.proxy_id left join proxy_group as g on g.id=p.proxy_group where n.content in {$id} and n.is_default='Y' and n.type='mobile'";
				if (($proxy_list = $this->db->select_to_2Array($SQL , 'tel')) != false)
				{
					$this->sma->assign('proxy_list',$proxy_list);
					//return $proxy_list;
				}
			}
		}
	}
?>