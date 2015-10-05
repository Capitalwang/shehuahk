<?php
	class proxy_sms extends start
	{
		public function __construct()
		{
			parent::__construct(true);
		}
		
		public function show()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			$this->proxy_list();
			
			$this->sma->display($this->get['open']);
		}
		
		public function add()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			
			$post = $this->fun->pars_all('post' , true);
			$id = "('" . join("','" , $post['id']) . "')";
			
			if (($to_proxy = $this->db->select_N_to_1key("select id from proxy where id in {$id}" , 'id' , 'id')) != false)
			{
				if (is_array($_SESSION['back']['Pxy_SMS']))
					$_SESSION['back']['Pxy_SMS'] = array_merge($_SESSION['back']['Pxy_SMS'] , $to_proxy);
				else
					$_SESSION['back']['Pxy_SMS'] = $to_proxy;
			}
			
			$this->fun->local('./?open=' . $this->get['open']);
		}
		
		public function del()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			
			if ($this->get['id'])
				unset($_SESSION['back']['Pxy_SMS'][$this->get['id']]);
			else
				unset($_SESSION['back']['Pxy_SMS']);
			$this->fun->local('./?open=' . $this->get['open']);
		}
		
		public function send()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			
			if ($this->get['go'])
			{
				$post = $_SESSION['back']['Pxy_SMS_post'];
			}else{
				$post = $this->fun->pars_all('post' , true);
				$_SESSION['back']['Pxy_SMS_post'] = $post;
			}
			
			if (!$post['message']) $this->fun->Msg('请输入短信内容');
			
			$proxy = $this->proxy_list(false);
			$i = 0;
			foreach ($proxy as $val)
			{
				if ($val['content'] && $this->fun->IsPhone($val['content']))
				{
					$pxy['id'][$i / 100][] = $val['id'];
					$pxy['name'][$i / 100][] = $val['account'];
					$pxy['phone'][$i / 100][] = $val['content'];
				}else{
					unset($_SESSION['back']['Pxy_SMS'][$val['id']]);
				}
			}
			if (!count($pxy['phone'])) $this->fun->local('./?open=proxy_sms&action=error&code=1');
			
			foreach ($pxy['phone'] as $key => $val)
			{
				$pxy['phone'][$key] = join(',' , $val);
				$pxy['name'][$key] = join(',' , $pxy['name'][$key]);
				//$pxy['id'][$key] = join(',' , $pxy['id'][$key]);
			}
			//print_r($pxy);exit;
			$tiao = 0;
			foreach ($pxy['phone'] as $key => $val)
			{
				$message = urlencode($post['message']);
				$url = "http://sdkhttp.eucp.b2m.cn/sdkproxy/sendsms.action?cdkey=" . SMS_key . "&password=" . SMS_password . "&phone={$val}&message={$message}";
				if (($url = @file($url)) !== false)
				{
					$ARR = array();
					$ARR['id'] = $this->fun->rand_string(16);
					$ARR['send_id'] = $_SESSION['proxy']['account'];
					$ARR['receiver_id'] = $pxy['name'][$key];
					$ARR['mobile'] = $val;
					$ARR['type'] = 'back_proxy';
					$ARR['info'] = $post['message'];
					$ARR['price'] = 0;
					$ARR['err_no'] = strip_tags(trim($url[3]));
					$ARR['err_info'] = strip_tags(trim($url[4]));
					$ARR['time'] = mktime();
						
					if (trim($url[3]) === '<error>0</error>')
					{
						$tiao += count($pxy['id'][$key]);
						foreach ($pxy['id'][$key] as $mo) unset($_SESSION['back']['Pxy_SMS'][$mo]);
						
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
			$_SESSION['back']['Pxy_SMS_successful'] = $tiao;
			if ($tiao)
				$this->fun->local('./?open=proxy_sms&action=successful');
			else
				$this->fun->local('./?open=proxy_sms&action=error&code=-1');
		}
		
		public function successful()
		{
			$this->sma->display($this->get['open']);
		}
		
		public function error()
		{
			$this->sma->display($this->get['open']);
		}
		
		private function proxy_list($show = true)
		{
			if ($_SESSION['back']['Pxy_SMS'])
			{
				$id = "('" . join("','" , $_SESSION['back']['Pxy_SMS']) . "')";
				$SQL = "select p.id,p.account,p.name,p.nickname,p.number,p.company_name,n.content,g.name as `group` from proxy as p left join proxy_group as g on g.id=p.proxy_group left join proxy_nab as n on n.proxy_id=p.id and n.is_default='Y' where p.id in {$id} order by n.content desc";
				if (($proxy_list = $this->db->select_to_2Array($SQL , 'id')) != false)
				{
					if ($show) $this->sma->assign('proxy_list',$proxy_list);
					return $proxy_list;
				}
			}
		}
	}
?>