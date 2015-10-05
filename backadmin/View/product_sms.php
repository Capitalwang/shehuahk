<?php
	class product_sms extends start
	{
		public function __construct()
		{
			parent::__construct(true);
		}
		
		public function show()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			
			if (count($_SESSION['back']['P_SMS']['pro']))
			{
				$this->default_value();
				$this->sms_list();
				$this->proxy_list();
				
				//print_r($_SESSION['back']['P_SMS']['proxy']);
			}
			
			$this->sma->display($this->get['open']);
		}
		
		public function add()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			
			$post = $this->fun->pars_all('post' , true);
			$id = "('" . join("','" , $post['id']) . "')";
			
			if (($to_sms = $this->db->select_N_to_1key("select id from product where id in {$id}" , 'id' , 'id')) != false)
			{
				if (is_array($_SESSION['back']['P_SMS']['pro']))
					$_SESSION['back']['P_SMS']['pro'] = array_merge($_SESSION['back']['P_SMS']['pro'] , $to_sms);
				else
					$_SESSION['back']['P_SMS']['pro'] = $to_sms;
			}
			
			$this->fun->local('./?open=' . $this->get['open']);
		}
		
		public function del()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			
			if ($this->get['id'])
				unset($_SESSION['back']['P_SMS']['pro'][$this->get['id']]);
			else
				unset($_SESSION['back']['P_SMS']);
			$this->fun->local('./?open=' . $this->get['open']);
		}
		
		public function proxy()
		{
			$this->sma->display($this->get['open']);
		}
		
		public function add_proxy()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			
			if (count($_SESSION['back']['P_SMS']['proxy']) > 99) $this->fun->Msg('一次最多只能群发100个账号');
			
			$post = $this->fun->pars_all('post' , true);
			
			if ($post)
			{
				if (!$post['proxy_id'])
				{
					$proxy = $this->db->select_to_1Array("select id from proxy where account='{$post['proxy_write']}' or `number`='{$post['proxy_write']}' or name='{$post['proxy_write']}'");
					$post['proxy_id'] = $proxy['id'];
				}
				
				if (is_array($_SESSION['back']['P_SMS']['proxy']))
					$_SESSION['back']['P_SMS']['proxy'] = array_merge($_SESSION['back']['P_SMS']['proxy'] , array($post['proxy_id'] => $post['proxy_id']));
				else
					$_SESSION['back']['P_SMS']['proxy'][$post['proxy_id']] = $post['proxy_id'];
			}
			
			$this->fun->local('./?open=' . $this->get['open']);
		}
		
		public function del_proxy()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			
			if ($this->get['id'])
				unset($_SESSION['back']['P_SMS']['proxy'][$this->get['id']]);
			else
				unset($_SESSION['back']['P_SMS']['proxy']);
			$this->fun->local('./?open=' . $this->get['open']);
		}
		
		public function send()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			
			if ($_SESSION['back']['P_SMS']['pro'])
			{
				$proxy = $this->proxy_list();
				//得到电话组
				foreach ($proxy as $val)
				{
					$user[$val['group_id']]['is_offer'] = $val['is_offer'];
					$user[$val['group_id']]['rebate'] = $val['rebate'];
					$user[$val['group_id']]['name'][] = $val['account'];
					if ($val['content'] && $this->fun->IsPhone($val['content'])) $user[$val['group_id']]['phome'][] = $val['content'];
				}
				
				foreach ($user as $key => $val)
				{
					//删除空的组
					if (!count($val['phome']))
					{
						unset($user[$key]);
					}else{
						$user[$key]['name'] = join(',' , $user[$key]['name']);
						$user[$key]['phome'] = join(',' , $user[$key]['phome']);
					}
				}
				//error	3	没有正确的手机号码
				if (!$user || !count($user)) $this->fun->local('./?open=product_sms&action=error&code=3');
				
				//得到产品
				$product = $this->sms_list();
				//error	2	数据库中没有产品
				if (!$product || !count($product)) $this->fun->local('./?open=product_sms&action=error&code=2');
				//print_r($user);exit;
				
				$tiao = 0;
				foreach ($user as $Uer)
				{
					foreach ($product as $Pct)
					{
						$message = "{$Pct['diploma']}{$Pct['diplomaNO']} {$Pct['weight']} {$Pct['color']} {$Pct['clarity']} {$Pct['cut']}/{$Pct['buffing']}/{$Pct['symmetry']} ";
						if ($Uer['is_offer'] == 'Y' && $Pct['is_promotion'] == 'Y' && $Pct['promotion_start']>=mktime() && $Pct['promotion_stop']<=mktime())
						{
							$message .= sprintf('%.2f' , $Pct['INTbid'] * $Pct['weight'] * (100+$Pct['agio']+$Pct['baseAgio']+$Pct['promotion_dot'])/100) . '元 ';
							$message .= $Pct['agio']+$Pct['baseAgio']+$Pct['promotion_dot'] . '%';
						}else{
							$message .= sprintf('%.2f' , $Pct['INTbid'] * $Pct['weight'] * (100+$Pct['agio']+$Pct['baseAgio']+$Uer['rebate'])/100) . '元 ';
							$message .= $Pct['agio']+$Pct['baseAgio']+$Uer['rebate'] . '%';
						}
						$message .= ' [GLDHK.com]';
						$message = urlencode($message);
						$url = "http://sdkhttp.eucp.b2m.cn/sdkproxy/sendsms.action?cdkey=" . SMS_key . "&password=" . SMS_password . "&phone={$Uer['phome']}&message={$message}";
						
						if (($url = @file($url)) !== false)
						{
							$ARR = array();
							$ARR['id'] = $this->fun->rand_string(17);
							$ARR['send_id'] = $_SESSION['proxy']['account'];
							$ARR['receiver_id'] = $Uer['name'];
							$ARR['mobile'] = $Uer['phome'];
							$ARR['type'] = 'back_product';
							$ARR['info'] = urldecode($message);
							$ARR['price'] = 0;
							$ARR['err_no'] = strip_tags(trim($url[3]));
							$ARR['err_info'] = strip_tags(trim($url[4]));
							$ARR['time'] = mktime();
								
							if (trim($url[3]) === '<error>0</error>')
							{
								$tiao++;
								unset($_SESSION['back']['P_SMS']['pro'][$Pct['id']]);
								
								//发送时,删除之前发送失败的,也可以不删除,保留给管理员查看
								$this->db->del('sms' , "err_no!=0 and info='{$ARR['info']}' and send_id='{$ARR['send_id']}' and receiver_id='{$ARR['receiver_id']}' and mobile='{$ARR['mobile']}'");
								$this->db->insert('sms' , $ARR);
								
							}else{
								$_SESSION['back']['P_SMS']['anew']['url'][] = $url;
								$_SESSION['back']['P_SMS']['anew']['info'][] = $ARR;
								
								if ($this->db->select_to_1Array("select id from sms where err_no!=0 and info='{$ARR['info']}' and send_id='{$ARR['send_id']}' and receiver_id='{$ARR['receiver_id']}' and mobile='{$ARR['mobile']}'") == false)
									$this->db->insert('sms' , $ARR);
								else
									$this->db->update('sms' , array('time' => mktime()) , "err_no!=0 and info='{$ARR['info']}' and send_id='{$ARR['send_id']}' and receiver_id='{$ARR['receiver_id']}' and mobile='{$ARR['mobile']}'");
							}
						}
					}
				}
				$_SESSION['back']['P_SMS']['infos'] = array('yes' => $tiao , 'no' => count($_SESSION['back']['P_SMS']['anew']));
				if ($tiao)
					$this->fun->local('./?open=product_sms&action=successful');
				else
					$this->fun->local('./?open=product_sms&action=error&code=-1');
				
			}else{
				//error	1	缓存中没有产品
				$this->fun->local('./?open=product_sms&action=error&code=1');
			}
		}
		
		//重新发送短信
		public function anew()
		{
			if ($_SESSION['back']['P_SMS']['anew'] && count($_SESSION['back']['P_SMS']['anew']))
			{
				$tiao = 0;
				foreach ($_SESSION['back']['P_SMS']['anew']['url'] as $key => $val)
				{
					if (($url = @file($val)) !== false)
					{
						$ARR = $_SESSION['back']['P_SMS']['anew']['info'][$key];
						
						if (trim($url[3]) === '<error>0</error>')
						{
							$tiao++;
							unset($_SESSION['back']['P_SMS']['anew']['url'][$key] , $_SESSION['back']['P_SMS']['anew']['info'][$key]);
							
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
			}
			$_SESSION['back']['P_SMS']['infos'] = array('yes' => $tiao , 'no' => count($_SESSION['back']['P_SMS']['anew']));
			$this->fun->local('./?open=product_sms&action=successful');
		}
		
		public function successful()
		{
			$this->sma->display($this->get['open']);
		}
		
		public function error()
		{
			$this->sma->display($this->get['open']);
		}
		
		/**
		 * 产品列表
		 */
		private function sms_list()
		{
			if ($_SESSION['back']['P_SMS']['pro'])
			{
				$id = "('" . join("','" , $_SESSION['back']['P_SMS']['pro']) . "')";
				
				$SQL = "select id,amount,ProID,shape,weight,color,clarity,cut,buffing,symmetry,Fent_Isity,scalar_value,baseAgio,diploma,diplomaNO,agio,infml,INTbid,is_promotion,promotion_start,promotion_stop,promotion_dot from product where id in {$id} order by ProID desc";
				if (($Qs = $this->db->select_to_2Array($SQL)) != false)
				{
					$this->sma->assign('list_cart',$Qs);
					return $Qs;
				}
			}
		}
		
		private function proxy_list()
		{
			if ($_SESSION['back']['P_SMS']['proxy'])
			{
				$id = "('" . join("','" , $_SESSION['back']['P_SMS']['proxy']) . "')";
				$SQL = "select p.id,p.account,p.name,p.nickname,p.number,p.company_name,n.content,g.rebate,g.is_offer,g.id as group_id,g.name as `group` from proxy as p join proxy_group as g on g.id=p.proxy_group left join proxy_nab as n on n.proxy_id=p.id and n.is_default='Y' where p.id in {$id}";
				if (($proxy_list = $this->db->select_to_2Array($SQL , 'id')) != false)
				{
					$this->sma->assign('proxy_list',$proxy_list);
					return $proxy_list;
				}
			}
		}
		
		private function default_value()
		{
			//形状
			$this->shape = array('round'=>'圆形','princess'=>'公主方','heart'=>'心形','pear'=>'梨形','emerald'=>'祖母绿','marquise'=>'马眼形','cushion'=>'垫形','oval'=>'椭圆形','radiant'=>'明亮形');
			$this->sma->assign('shape' , $this->shape);
		}
	}
?>