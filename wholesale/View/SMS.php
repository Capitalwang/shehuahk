<?php
	class SMS extends start
	{
		private $shape;
		
		public function __construct()
		{
			parent::__construct(true);
			
			$_SESSION['proxy']['mobile'] = false;
			if (($mob = $this->db->select_to_1Array("select content from proxy_nab where proxy_id='{$_SESSION['proxy']['id']}' and type='mobile' and is_default='Y'")) != false)
			{
				if ($this->fun->IsPhone($mob['content'])) $_SESSION['proxy']['mobile'] = $mob['content'];
			}
		}
		
		public function show()
		{
			if (!$this->QX[$this->get['open']][$this->get['action']]) $this->fun->Msg('你没有此权限');
			//print_r($_SESSION['proxy']);
			if ($_SESSION['proxy']['is_SMS'] == 'Y' && $_SESSION['proxy']['mobile'])
			{
				if (count($_SESSION['proxy']['SMS']))
				{
					$this->default_value();
					$this->sms_list();
				}
				$this->sma->display($this->get['open']);
			}else{
				$this->fun->local('./?open=SMS&action=error');
			}
		}
		
		//添加到缓存
		public function add()
		{
			if (!$this->QX[$this->get['open']][$this->get['action']]) $this->fun->Msg('你没有此权限');
			
			if ($_SESSION['proxy']['is_SMS'] == 'Y' && $_SESSION['proxy']['mobile'])
			{
				$post = $this->fun->pars_all('post' , true);
				$id = "('" . join("','" , $post['id']) . "')";
				
				if (($to_sms = $this->db->select_N_to_1key("select id from product where id in {$id}" , 'id' , 'id')) != false)
				{
					if (is_array($_SESSION['proxy']['SMS']))
						$_SESSION['proxy']['SMS'] = array_merge($_SESSION['proxy']['SMS'] , $to_sms);
					else
						$_SESSION['proxy']['SMS'] = $to_sms;
				}
					
				$this->fun->local('./?open=' . $this->get['open']);
			}else{
				$this->fun->local('./?open=SMS&action=error');
			}
		}
		
		public function error()
		{
			unset($_SESSION['proxy']['SMS_link_no']);
			$this->sma->display('SMS_error');
		}
		
		//成功或部分成功
		public function successful()
		{
			$this->sma->display('SMS_successful');
		}
		
		//删除缓存的产品
		public function del()
		{
			if (!$this->QX[$this->get['open']][$this->get['action']]) $this->fun->Msg('你没有此权限');
			
			if ($_SESSION['proxy']['is_SMS'] == 'Y' && $_SESSION['proxy']['mobile'])
			{
				if ($this->get['id'])
					unset($_SESSION['proxy']['SMS'][$this->get['id']]);
				else
					unset($_SESSION['proxy']['SMS']);
				$this->fun->local('./?open=' . $this->get['open']);
			}else{
				$this->fun->local('./?open=SMS&action=error');
			}
		}
		
		public function send()
		{
			if (!$this->QX[$this->get['open']][$this->get['action']]) $this->fun->Msg('你没有此权限');
			ini_set('max_execution_time','0');
			
			if ($_SESSION['proxy']['is_SMS'] == 'Y' && $_SESSION['proxy']['mobile'])
			{
				$proxy = $this->db->select_to_1Array("select money from proxy where id='{$_SESSION['proxy']['id']}'");
				$proxy['money'] = ($proxy['money']) ? $proxy['money'] : 0;
				if ((count($_SESSION['proxy']['SMS']) * $_SESSION['proxy']['sms_price']) > $proxy['money'])
				{
					$this->fun->local('./?open=SMS&action=error&status=-1');
				}
				
				$money = 0;
				$tiao = 0;
				$logs = '';
				$pro = $this->sms_list(true);
				foreach ($pro as $val)
				{
					$message = "{$val['diploma']}{$val['diplomaNO']} {$val['weight']} {$val['color']} {$val['clarity']} {$val['cut']}/{$val['buffing']}/{$val['symmetry']} ";
					if ($_SESSION['proxy']['is_offer'] == 'Y' && $val['is_promotion'] == 'Y' && $val['promotion_start'] <= mktime() && $val['promotion_stop'] >= mktime())
					{
						$message .= sprintf('%.2f' , $val['INTbid'] * $val['weight'] * (100+$val['agio']+$val['baseAgio']+$val['promotion_dot'])/100) . '元 ';
						$message .= $val['agio']+$val['baseAgio']+$val['promotion_dot'] . '%';
					}else{
						$message .= sprintf('%.2f' , $val['INTbid'] * $val['weight'] * (100+$val['agio']+$val['baseAgio']+$_SESSION['proxy']['rebate'])/100) . '元 ';
						$message .= $val['agio']+$val['baseAgio']+$_SESSION['proxy']['rebate'] . '%';
					}
					$message .= ' [GLDHK.com]';
					$message = urlencode($message);
					
					$url = "http://sdkhttp.eucp.b2m.cn/sdkproxy/sendsms.action?cdkey=" . SMS_key . "&password=" . SMS_password . "&phone={$_SESSION['proxy']['mobile']}&message={$message}";
					if (($url = @file($url)) !== false)
					{
						$ARR = array();
						$ARR['id'] = $this->fun->rand_string(19);
						$ARR['send_id'] = $_SESSION['proxy']['account'];
						$ARR['receiver_id'] = $_SESSION['proxy']['account'];
						$ARR['mobile'] = $_SESSION['proxy']['mobile'];
						$ARR['type'] = 'proxy_product';
						$ARR['info'] = urldecode($message);
						$ARR['price'] = $_SESSION['proxy']['sms_price'];
						$ARR['err_no'] = strip_tags(trim($url[3]));
						$ARR['err_info'] = strip_tags(trim($url[4]));
						$ARR['time'] = mktime();
							
						if (trim($url[3]) === '<error>0</error>')
						{
							$money += $_SESSION['proxy']['sms_price'];
							$tiao++;
							$logs .= $val['diploma'] . '-' . $val['diplomaNO'] . ' ';
							
							$ARR['err_no'] = '0';
							
							unset($_SESSION['proxy']['SMS'][$val['id']]);
							$_SESSION['proxy']['SMS_successful'][] = $val['id'];
							
							//发送时,删除之前发送失败的,也可以不删除,保留给管理员查看
							$this->db->del('sms' , "err_no!=0 and info='{$ARR['info']}' and send_id='{$ARR['send_id']}' and receiver_id='{$ARR['receiver_id']}' and mobile='{$ARR['mobile']}'");
							$this->db->insert('sms' , $ARR);
							
						}else{
							$ARR['price'] = '0';
							
							if ($this->db->select_to_1Array("select id from sms where err_no!=0 and info='{$ARR['info']}' and send_id='{$ARR['send_id']}' and receiver_id='{$ARR['receiver_id']}' and mobile='{$ARR['mobile']}'") == false)
								$this->db->insert('sms' , $ARR);
							else
								$this->db->update('sms' , array('time' => mktime()) , "err_no!=0 and info='{$ARR['info']}' and send_id='{$ARR['send_id']}' and receiver_id='{$ARR['receiver_id']}' and mobile='{$ARR['mobile']}'");
						}
					}else{
						$_SESSION['proxy']['SMS_link_no'] = true;
						$this->fun->local('./?open=SMS&action=error');
					}
				}
				//扣费
				if ($tiao)
				{
					if ($money) $this->db->update('proxy' , array('money'=>'---' . $money) , "id='{$_SESSION['proxy']['id']}'");
					//TODO 记录到日志
					
					$log = array();
					$log['id'] = $this->fun->rand_string(19);
					$log['type'] = 'money';
					$log['who_id'] = $_SESSION['proxy']['id'];
					$log['update_id'] = $_SESSION['proxy']['id'];
					$log['show'] = "{$_SESSION['proxy']['name']} 于 " . date('Y-m-d H:i:s') . "发送成功了" . $tiao . "条短信 , 扣除了{$money}元";
					$log['time'] = mktime();
					$this->db->insert('log' , $log);
				}
				
				$this->fun->local('./?open=SMS&action=successful');
			}else{
				$this->fun->local('./?open=SMS&action=error');
			}
		}
		
		/**
		 * 产品列表
		 */
		private function sms_list($is_return = false)
		{
			$id = "('" . join("','" , $_SESSION['proxy']['SMS']) . "')";
			$Qs = false;
			
			$SQL = "select id,amount,ProID,shape,weight,color,clarity,cut,buffing,symmetry,Fent_Isity,scalar_value,diploma,diplomaNO,agio,baseAgio,infml,INTbid,is_promotion,promotion_start,promotion_stop,promotion_dot from product where status='up' and amount>0 and id in {$id} order by weight desc";
			if (($Qs = $this->db->select_to_2Array($SQL)) != false)
			{
				if (!$is_return) $this->sma->assign('sms_list',$Qs);
			}
			return $Qs;
		}
		
		private function default_value()
		{
			//形状
			$this->shape = array('round'=>'圆形','princess'=>'公主方','heart'=>'心形','pear'=>'梨形','emerald'=>'祖母绿','marquise'=>'马眼形','cushion'=>'垫形','oval'=>'椭圆形','radiant'=>'明亮形');
			$this->sma->assign('shape' , $this->shape);
		}
		
	}
?>