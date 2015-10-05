<?php
	class orders extends start
	{
		private static $shape , $status , $proSource , $country , $stockAddress;
		
		public function __construct()
		{
			parent::__construct(true);
		}
		
		//订单列表
		public function show()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			
			$this->default_value();
			$ORDER = array('time_UP'=>'o.time asc' , 'time_Dn'=>'o.time desc' , 'prxy_UP'=>'o.proxy_id asc' , 'prxy_Dn'=>'o.proxy_id desc');
			$this->get['ORDER'] = $ors = ($this->get['ORDER']) ? $this->get['ORDER'] : 'time_Dn';
			
			//查询
			if ($this->get['go'] == 'query')
			{
			 	$query = "and o.orders_id like '%{$this->get['info']}%' 
			 	or p.account like '%{$this->get['info']}%' or p.name like '%{$this->get['info']}%' or p.number like '%{$this->get['info']}%'
			 	or s.account like '%{$this->get['info']}%' or s.name like '%{$this->get['info']}%' or s.number like '%{$this->get['info']}%'
			 	or ps.account like '%{$this->get['info']}%' or ps.name like '%{$this->get['info']}%' or ps.number like '%{$this->get['info']}%'
			 	";
			}
			
			//订单状态
			switch ($this->get['status'])
			{
				//下订单 -> 审核
				case 'null':$status = "and o.status is null";break;
				//通过审核
				case 'audit':$status = "and o.status='audit' and o.earnest is null";break;
				//通过审核 -> 付定金
				case 'earnest':$status = "and o.status='earnest' and o.earnest>0 and o.gotten_money is null";break;
				//付定金 -> 调货
				case 'deploy':$status = "and o.status='deploy' and o.earnest=o.gotten_money";break;
				//调货 -> 付余款
				case 'balance':$status = "and o.status='balance' and o.earnest=o.gotten_money";break;
				//付余款 -> 发货
				case 'dispatch':$status = "and o.status='dispatch' and o.price=o.gotten_money";break;
				//收到货物
				case 'receiving':$status = "and o.status='receiving'";break;
				//取消订单
				case 'returned':$status = "and o.status='returned'";break;
			}
			
			$this->sma->assign('get' , $this->get);
			require_once(BASEPATH . '../Class/page.php');
			$list = new page;
			$list->db = $this->db;
			$list->pageNS = (is_numeric($this->get['PNS'])) ? $this->get['PNS'] : 14;
			$list->NowPage = (empty($this->get['page']) | $this->get['page'] < 1 | !is_numeric($this->get['page'])) ? 1 : $this->get['page'];
			$list->SQL = "select o.proxy_id,o.orders_id,o.time,o.earnest,o.price,o.gotten_money,o.status,p.account,s.name as service_name,ps.name as salesman_name
							from orders as o join proxy as p on p.id=o.proxy_id	join service as s on s.id=o.service_id 
							join proxy as ps on ps.id=o.salesman_id where 1 {$query} {$status} order by {$ORDER[$ors]}";
			$info = $list->getText();
			if ($info) foreach ($info as $key => $val) $info[$key]['status'] = $this->get_status($val);
			//print_r($info);
			$this->sma->assign('list_page', $list->getPage());
			$this->sma->assign('list_text', $info);
			
			$this->sma->display($this->get['open']);
		}
		
		//发送短信
		public function sms()
		{
			if (!$this->BTP[$this->get['open']]['cancel']){echo '<div style="text-align:center;padding:2em 0">' . $this->BTP_Words . '</div>';exit;}
			
			if ($this->get['go'] == 'send')
			{
				$post = $this->fun->pars_all('post' , true);
				//print_r($post);exit;
				$url = "http://sdkhttp.eucp.b2m.cn/sdkproxy/sendsms.action?cdkey=" . SMS_key . "&password=" . SMS_password . "&phone={$post['tel']}&message=".urlencode($post['message']);
				if (($url = @file($url)) !== false)
				{
					$ARR = array();
					$ARR['id'] = $this->fun->rand_string(20);
					$ARR['send_id'] = $_SESSION['back']['account'];
					$ARR['receiver_id'] = $post['proxy'];
					$ARR['mobile'] = $post['tel'];
					$ARR['type'] = 'back_order';
					$ARR['info'] = urldecode($post['message']);
					$ARR['price'] = 0;
					$ARR['err_no'] = strip_tags(trim($url[3]));
					$ARR['err_info'] = strip_tags(trim($url[4]));
					$ARR['time'] = mktime();
					
					if (trim($url[3]) === '<error>0</error>')
					{
						//发送时,删除之前发送失败的,也可以不删除,保留给管理员查看
						$this->db->del('sms' , "err_no!=0 and info='{$ARR['info']}' and send_id='{$ARR['send_id']}' and receiver_id='{$ARR['receiver_id']}' and mobile='{$ARR['mobile']}'");
						$this->db->insert('sms' , $ARR);
						echo '短信发送成功';
					}else{
						if ($this->db->select_to_1Array("select id from sms where err_no!=0 and info='{$ARR['info']}' and send_id='{$ARR['send_id']}' and receiver_id='{$ARR['receiver_id']}' and mobile='{$ARR['mobile']}'") == false)
							$this->db->insert('sms' , $ARR);
						else
							$this->db->update('sms' , array('time' => mktime()) , "err_no!=0 and info='{$ARR['info']}' and send_id='{$ARR['send_id']}' and receiver_id='{$ARR['receiver_id']}' and mobile='{$ARR['mobile']}'");
						
						echo '短信发送失败,请稍后再试';
					}
				}else{
					echo '短信功能繁忙,请稍后再试';
				}
				
				exit;
			}else{
				if (($proxy = $this->db->select_to_1Array("select p.id,if(p.name,p.name,p.account) as name,p.number,p.company_name,n.content as tel from proxy as p left join proxy_nab as n on n.proxy_id=p.id and n.is_default='Y' where p.id='{$this->get['proxy_id']}'")) != false)
				{
					$this->sma->assign('proxy' , $proxy);
				}
				
				echo $this->sma->fetch('orders_sms.html');
			}
		}
		
		//删除订单
		public function del()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			
			if ($this->db->del('orders' , "orders_id='{$this->get['orders_id']}' and (gotten_money is null or gotten_money<=0)") > 0)
			{
				//在删除订单产品之前先还原产品
				if (($orders = $this->db->select_to_2Array("select proxy_id,product_id,amount,info from orders_product where orders_id='{$this->get['orders_id']}'")) != false)
				{
					foreach ($orders as $val)
					{
						if (($pro = $this->db->select_to_1Array("select amount from product where id='{$val['product_id']}'")) != false)
						{
							$this->db->update('product' , array('amount'=>'+++' . $val['amount'] , 'status'=>'up') , "id='{$val['product_id']}'");
						}else{
							$this->db->insert('product' , unserialize($val['info']));
						}
					}
					$this->db->del('orders_product' , "orders_id='{$this->get['orders_id']}'");
				}
				
				$log = array();
				$log['id'] = $this->fun->rand_string(25);
				$log['orders_id'] = $this->get['orders_id'];
				$log['proxy_id'] = $orders[0]['proxy_id'];
				$log['update_id'] = $_SESSION['back']['id'];
				$log['update_name'] = $_SESSION['back']['name'];
				$log['time'] = mktime();
				$log['info'] = "{$_SESSION['back']['name']} 删除了 {$log['orders_id']} 订单";
				$this->db->insert('orders_log' , $log);
				$this->fun->local('./?open=' . $this->get['open']);
				
			}else{
				$this->fun->Msg('此订单中有代理资金,因此不能删除');
			}
		}
		
		//取消订单
		public function cancel()
		{
			if (!$this->BTP[$this->get['open']]['cancel']){echo '<div style="text-align:center;padding:2em 0">' . $this->BTP_Words . '</div>';exit;}
			
			if ($this->get['go'] == 'validation')
			{
				$close = $this->cancel_public($this->get['orders_id']);
				switch ($close)
				{
					case -1:echo '<div style="text-align:center;padding:2em 0">' . $this->BTP_Words . '</div>';break;
					case 0:echo '<b style="color:red">取消订单 情况异常 请正常操作</b>';break;
					case 1:echo '<b style="color:green">成功取消订单</b>';break;
				}
				exit;
			}else{
				if (($orders = $this->db->select_to_1Array("select orders_id,earnest,gotten_money,status,time,price from orders where orders_id='{$this->get['orders_id']}'")) != false)
					$this->sma->assign('show' , $orders);
				
				echo $this->sma->fetch('orders_cancel.html');
			}
		}
		
		//审核订单
		public function audit($is_audit = true)
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']] && $is_audit) $this->fun->Msg($this->BTP_Words);
			
			if ($this->get['go'] == 'append')
			{
				$post = $this->fun->pars_all('post' , true);
				
				if (!$post['status'] || !count($post['status'])) $this->fun->Msg('请选择产品状态');
				
				if (strpos(serialize($post['status']) , ';s:1:"Y";') === false)
				{
					//取消订单
					$this->cancel_public($this->get['orders_id']);
				}else{
					$this->audit_public_append($post , $is_audit);
				}
				
				$this->fun->local('?open=orders&action=detail&orders_id=' . $this->get['orders_id']);
			}else{
				$this->default_value();
				$this->orders_and_products();
				$this->sma->display($this->get['open']);
			}
		}
		
		//订单详情
		public function detail()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			
			$this->default_value();
			
			//订单
			$SQL = "select o.*,p.account,s.name as service_name,ps.name as salesman_name,w.name as outers,n.name as inners from orders as o join proxy as p on p.id=o.proxy_id join service as s on s.id=o.service_id join proxy as ps on ps.id=o.salesman_id left join logistics_status as w on o.logistics_outer_id=w.id left join logistics_status as n on o.logistics_inner_id=n.id where orders_id='{$this->get['orders_id']}'";
			if (($orders = $this->db->select_to_1Array($SQL)) != false)
			{
				$orders['status'] = $this->get_status($orders);
				
				$this->sma->assign('orders' , $orders);
			}
			
			//产品
			if (($product = $this->db->select_to_2Array("select id,amount,price,info,is_arrival,express_type,express_ID from orders_product where orders_id='{$this->get['orders_id']}'")) != false)
			{
				foreach ($product as $key => $val) $product[$key]['info'] = unserialize($val['info']);
				$this->sma->assign('product' , $product);
			}
			
			//日志
			if (($log = $this->db->select_to_2Array("select * from orders_log where orders_id='{$this->get['orders_id']}' order by time asc")) != false)
				$this->sma->assign('log' , $log);
			
			$this->sma->display($this->get['open']);
		}
		
		//产品详情
		public function product_detail()
		{
			if ($this->get['id'])
			{
				if (($json = $this->db->select_to_1Array("select * from orders_product where id='{$this->get['id']}'")) != false)
				{
					$this->default_value();
					$json['info'] = unserialize($json['info']);

					$this->sma->assign('show' , $json);
					echo $this->sma->fetch('orders_product_detail.html');
				}
			}
		}
		
		//计算定金
		public function count_deposit()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			
			if ($this->get['go'] == 'append')
			{
				$post = $this->fun->pars_all('post' , true);
				if (!is_numeric($post['earnest']) || $post['earnest'] < 0) $this->fun->Msg('请填写定金');
				
				if ((float)$post['yuan_earnest'] != (float)$post['earnest'])
				{
					$orders = array();
					$orders['status'] = 'earnest';
					$orders['earnest'] = $post['earnest'];
					$this->db->update('orders' , $orders , "orders_id='{$this->get['orders_id']}'");
					
					$log = array();
					$log['id'] = $this->fun->rand_string(21);
					$log['orders_id'] = $this->get['orders_id'];
					$log['proxy_id'] = $post['proxy_id'];
					$log['update_id'] = $_SESSION['back']['id'];
					$log['update_name'] = $_SESSION['back']['name'];
					$log['time'] = mktime();
					$log['info'] = "{$_SESSION['back']['name']} 将 {$log['orders_id']} 订单的定金设定为 {$post['earnest']} 元";
					$this->db->insert('orders_log' , $log);
				}
				$this->fun->local('?open=orders&action=detail&orders_id=' . $this->get['orders_id']);
			}else{
				$this->default_value();
				$this->orders_and_products();
				$this->sma->display($this->get['open']);
			}
		}
		
		//更改订单
		public function edit_orders()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			$this->audit(false);
		}
		
		//扣除定金
		public function recoup_deposit()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			
			if ($this->get['go'] == 'append')
			{
				$post = $this->fun->pars_all('post' , true);
				
				if (($ORD = $this->db->select_to_1Array("select proxy_id,earnest from orders where orders_id='{$this->get['orders_id']}'")) != false)
				{
					//扣除代理中的钱
					if ($this->recoup_proxy_money($this->get['orders_id'] , $ORD['proxy_id'] , $ORD['earnest'] , 'order_earnest'))
					{
						$orders = array();
						$orders['status'] = 'deploy';
						$orders['gotten_money'] = $ORD['earnest'];
						$this->db->update('orders' , $orders , "orders_id='{$this->get['orders_id']}'");
						
						$log = array();
						$log['id'] = $this->fun->rand_string(20);
						$log['orders_id'] = $this->get['orders_id'];
						$log['proxy_id'] = $ORD['proxy_id'];
						$log['update_id'] = $_SESSION['back']['id'];
						$log['update_name'] = $_SESSION['back']['name'];
						$log['time'] = mktime();
						$log['info'] = "{$_SESSION['back']['name']} 扣除了 {$log['orders_id']} 订单的定金 {$ORD['earnest']} 元";
						$this->db->insert('orders_log' , $log);
					}
				}
				$this->fun->local('?open=orders&action=detail&orders_id=' . $this->get['orders_id']);
			}else{
				$this->default_value();
				$ORD = $this->orders_and_products(true);
				
				if (($proxy = $this->db->select_to_1Array("select money from proxy where id='{$ORD['proxy_id']}'")) != false)
					$this->sma->assign('proxy' , $proxy);
				
				$this->sma->display($this->get['open']);
			}
		}
		
		//更改到货情况
		public function deploy()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			
			$this->default_value();
			
			if ($this->get['go'] == 'append')
			{
				$post = $this->fun->pars_all('post' , true);
				
				$balance = 1;
				foreach ($post['Y_is_arrival'] as $key => $val)
				{
					$temp = array();
					if ($post['is_arrival'][$key] != 'Y')
					{
						$balance = 0;
						$temp['is_arrival'] = 'N';
					}else{
						$temp['is_arrival'] = 'Y';
					}
					$temp['express_type'] = $post['express_type'][$key];
					$temp['express_ID'] = $post['express_ID'][$key];
					
					$this->db->update('orders_product' , $temp , "id='{$key}'");
					
					if ($val != $temp['is_arrival'])
					{
						$log = array();
						$log['id'] = $this->fun->rand_string(23);
						$log['orders_id'] = $this->get['orders_id'];
						$log['proxy_id'] = $post['proxy_id'];
						$log['update_id'] = $_SESSION['back']['id'];
						$log['update_name'] = $_SESSION['back']['name'];
						$log['time'] = mktime();
						$log['info'] = "{$_SESSION['back']['name']} 把 {$log['orders_id']} 订单 {$post['ProID'][$key]} 产品的 到货情况 设置为";
						$log['info'] .= ($temp['is_arrival'] == 'Y') ? '到货' : '未到';
						$this->db->insert('orders_log' , $log);
					}
				}
				
				$balance = ($balance) ? 'balance' : 'deploy';
				if ($post['status'] != $balance)
				{
					$this->db->update('orders' , array('status'=>$balance) , "orders_id='{$this->get['orders_id']}'");
					
					$log = array();
					$log['id'] = $this->fun->rand_string(27);
					$log['orders_id'] = $this->get['orders_id'];
					$log['proxy_id'] = $post['proxy_id'];
					$log['update_id'] = $_SESSION['back']['id'];
					$log['update_name'] = $_SESSION['back']['name'];
					$log['time'] = mktime();
					$log['info'] = "{$_SESSION['back']['name']} 把 {$log['orders_id']} 订单 设置为  ". self::$status[$balance] .' 状态';
					$this->db->insert('orders_log' , $log);
				}
				
				$this->fun->local('?open=orders&action=detail&orders_id=' . $this->get['orders_id']);
			}else{
				$this->orders_and_products();
				$this->sma->display($this->get['open']);
			}
		}
		
		//扣除余款
		public function balance()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			$this->default_value();
			
			if ($this->get['go'] == 'append')
			{
				$post = $this->fun->pars_all('post' , true);
				
				if (($ORD = $this->db->select_to_1Array("select proxy_id,earnest,price from orders where orders_id='{$this->get['orders_id']}'")) != false)
				{
					//扣除代理中的钱
					if ($this->recoup_proxy_money($this->get['orders_id'] , $ORD['proxy_id'] , $ORD['price'] - $ORD['earnest'] , 'order_balance'))
					{
						$orders = array();
						$orders['status'] = 'dispatch';
						$orders['gotten_money'] = $ORD['price'];
						$this->db->update('orders' , $orders , "orders_id='{$this->get['orders_id']}'");
						
						$log = array();
						$log['id'] = $this->fun->rand_string(20);
						$log['orders_id'] = $this->get['orders_id'];
						$log['proxy_id'] = $ORD['proxy_id'];
						$log['update_id'] = $_SESSION['back']['id'];
						$log['update_name'] = $_SESSION['back']['name'];
						$log['time'] = mktime();
						$log['info'] = "{$_SESSION['back']['name']} 扣除了 {$log['orders_id']} 订单的余款 " . sprintf('%.2f' , $ORD['price']-$ORD['earnest']) . '元';
						$log['info'] .= ' , 并把订单状态设定为 ' . self::$status['dispatch'];
						$this->db->insert('orders_log' , $log);
					}
				}
				$this->fun->local('?open=orders&action=detail&orders_id=' . $this->get['orders_id']);
			}else{
				$ORD = $this->orders_and_products(true);
				
				if (($proxy = $this->db->select_to_1Array("select money from proxy where id='{$ORD['proxy_id']}'")) != false)
					$this->sma->assign('proxy' , $proxy);
				
				$this->sma->display($this->get['open']);
			}
		}
		
		//更改物流状态
		public function dispatch()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			$this->default_value();
			if (($logistics = $this->db->select_to_2Array("select id,name,type from logistics_status order by taxis desc")) != false)
			{
				foreach ($logistics as $key => $val){$logs[$val['type']][$val['id']] = $val;}
				$this->sma->assign('logistics' , $logs);
			}
		
			if ($this->get['go'] == 'append')
			{
				$post = $this->fun->pars_all('post' , true);
				
				if (!$post['logistics_outer_id'] && !$post['logistics_inner_id']) $this->fun->Msg('请选择物理状态');
				
				$orders = array();
				$orders['logistics_outer_id'] = $post['logistics_outer_id'];
				$orders['logistics_inner_id'] = $post['logistics_inner_id'];
				$orders['express_type'] = $post['express_type'];
				$orders['express_ID'] = $post['express_ID'];
				$this->db->update('orders' , $orders , "orders_id='{$this->get['orders_id']}'");
				
				if ($post['logistics_outer_id'] != $post['Y_logistics_outer_id'] || $post['logistics_inner_id'] != $post['Y_logistics_inner_id'])
				{
					$log = array();
					$log['id'] = $this->fun->rand_string(22);
					$log['orders_id'] = $this->get['orders_id'];
					$log['proxy_id'] = $post['proxy_id'];
					$log['update_id'] = $_SESSION['back']['id'];
					$log['update_name'] = $_SESSION['back']['name'];
					$log['time'] = mktime();
					$log['info'] = "{$_SESSION['back']['name']} 操作 {$log['orders_id']} 订单";
					if ($post['logistics_outer_id'] != $post['Y_logistics_outer_id']) $log['info'] .= ' , 把外部物流状态设定为 ' . $logs['outer'][$post['logistics_outer_id']]['name'];
					if ($post['logistics_inner_id'] != $post['Y_logistics_inner_id']) $log['info'] .= ' , 把内部物流状态设定为 ' . $logs['inner'][$post['logistics_inner_id']]['name'];
					$this->db->insert('orders_log' , $log);
				}
				
				$this->fun->local('?open=orders&action=detail&orders_id=' . $this->get['orders_id']);
			}else{
				$ORD = $this->orders_and_products(true);
				$this->sma->display($this->get['open']);
			}
		}
		
		//收到货物
		public function receiving()
		{
			if (!$this->BTP[$this->get['open']]['cancel']){echo '<div style="text-align:center;padding:2em 0">' . $this->BTP_Words . '</div>';exit;}
			
			if ($this->get['go'] == 'append')
			{
				$this->default_value();
				
				$post = $this->fun->pars_all('post' , true);
				
				$orders = array();
				$orders['status'] = 'receiving';
				if ($this->db->update('orders' , $orders , "orders_id='{$this->get['orders_id']}' and status!='receiving'"))
				{
					$log = array();
					$log['id'] = $this->fun->rand_string(25);
					$log['orders_id'] = $this->get['orders_id'];
					$log['proxy_id'] = $post['proxy_id'];
					$log['update_id'] = $_SESSION['back']['id'];
					$log['update_name'] = $_SESSION['back']['name'];
					$log['time'] = mktime();
					$log['info'] = "{$_SESSION['back']['name']} 把 {$log['orders_id']} 订单的状态设定为 " . self::$status['receiving'];
					$this->db->insert('orders_log' , $log);
					
					echo '收到货物 成功';
				}else{
					echo '目前已 收到货物';
				}
			}else{
				echo '<div style="text-align:center;padding:2em 0"><a href="javascript:;" onClick="set_receiving(this , \'' . $this->get['orders_id'] . '\')">确认收到货物</a></div>';
			}
			
		}
		
		//订单导出CSV
		public function to_csv()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			$this->default_value();
			
			switch ($this->get['go'])
			{
				case 'write':$this->to_csv_write();break;
				case 'down_excel':$this->to_csv_down_excel();break;
				case 'down_csv':$this->to_csv_down_csv();break;
				default:
					
			}
			$this->sma->display($this->get['open']);
		}
		
		//打印
		public function prints()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) exit('0');
			$SQL = "select o.time,o.orders_id,p.company_name,if (p.name,p.name,p.account) as proxy_name from orders as o left join proxy as p on p.id=o.proxy_id where o.orders_id='{$this->get['id']}'";
			if (($orders = $this->db->select_to_1Array($SQL)) != false)
			{
				$orders['print_time'] = date('Y-m-d H:i:s');
				$orders['time'] = date('Y-m-d H:i:s' , $orders['time']);
				if (($pro = $this->db->select_to_2Array("select info,amount,price from orders_product where orders_id='{$this->get['id']}'")) != false)
				{
					foreach ($pro as $key => $val)
					{
						$info = unserialize($val['info']);
						$array = array();
						$array['ProID'] = $info['ProID'];
						$array['diploma'] = $info['diploma'];
						$array['diplomaNO'] = $info['diplomaNO'];
						$array['detail'] = $info['color'].' '.$info['clarity'].' '.$info['cut'].' '.$info['buffing'].' '.$info['symmetry'];
						$array['amount'] = $val['amount'];
						$array['weight'] = $info['weight'];
						$array['DP'] = sprintf('%.2f/ct' , $val['price'] / $val['amount'] / $info['weight']);
						$array['price'] = $val['price'];
						$orders['pro'][] = $array;
					}
				}
				echo $this->fun->php_json_encode($orders);
			}
		}
		
		//输出CSV显示页面
		private function to_csv_write()
		{
			$post = $this->fun->pars_all('post' , true);
			if ($post['orders_start'] && $post['orders_stop'])
			{
				if (strtotime($post['orders_start']) > strtotime($post['orders_stop']))
				{
					$temp = $post['orders_start'];
					$post['orders_start'] = $post['orders_stop'];
					$post['orders_stop'] = $temp;
				}
				$_SESSION['back']['orders_to_csv'] = $post;
			}else{
				$this->fun->Msg('请选择导出的开始时间和结束时间');
			}
		}
		
		//下载Excel文件
		private function to_csv_down_excel()
		{
			if ($_SESSION['back']['orders_to_csv'])
			{
				$SQL = 'select o.time,o.rebate,o.orders_id,p.Yprice,p.info,p.amount,p.price,if(pxy.name,pxy.name,pxy.account) as proxy 
						from orders as o 
						join orders_product as p on p.orders_id=o.orders_id 
						left join proxy as pxy on pxy.id=o.proxy_id 
						where o.time>='.strtotime($_SESSION['back']['orders_to_csv']['orders_start']).
						' and o.time<='.strtotime($_SESSION['back']['orders_to_csv']['orders_stop'])
						.' order by o.time asc';
				if (($down = $this->db->select_to_2Array($SQL)) != false)
				{
					ob_clean();
					header("Content-Type: application/vnd.ms-excel");
					header("Accept-Ranges:bytes");
					header('Content-Disposition:attachment;filename=['. date('Y-m-d') .']orders_to_csv.xls');
					header("Pragma: no-cache");
					header("Expires: 0");
					echo '<html xmlns:o="urn:schemas-microsoft-com:office:office"
							xmlns:x="urn:schemas-microsoft-com:office:excel"
							xmlns=" http://www.w3.org/TR/REC-html40">
							<meta http-equiv="expires" content="Mon, 06 Jan 1999 00:00:01 GMT">
							<meta http-equiv=Content-Type content="text/html; charset=Utf-8">
							<!--[if gte mso 9]><xml>
							<x:ExcelWorkbook>
							<x:ExcelWorksheets>
							<x:ExcelWorksheet>
							<x:Name></x:Name>
							<x:WorksheetOptions>
							<x:DisplayGridlines/>
							</x:WorksheetOptions>
							</x:ExcelWorksheet>
							</x:ExcelWorksheets>
							</x:ExcelWorkbook>
							</xml><![endif]-->';
					echo '<table width="100%" border="1" cellspacing="1" cellpadding="0">';
					echo '<tr><th colspan="15"><h3>'.$_SESSION['back']['orders_to_csv']['orders_start'].' 到 '.$_SESSION['back']['orders_to_csv']['orders_stop'].' 的订单</h3></th></tr>';
					echo '<tr><th>日期</th><th>订单编号</th><th>客户名称</th><th>商品编号</th><th>证书</th><th>证书号</th><th>产品详情</th><th>数量</th><th>单价(¥/ct)</th><th>订单售价</th><th>退点</th><th>最终售价</th><th>成本价</th><th>毛利</th><th>备注</th></tr>';
					foreach ($down as $val)
					{
						$pro = unserialize($val['info']);
						echo '<tr align="center" height="25">';
						echo '<td>' , date('Y-m-d',$val['time']) , '</td>';
						echo '<td>' , $val['orders_id'] , '</td>';
						echo '<td align="left">' , $val['proxy'] , '</td>';
						echo '<td>' , $pro['ProID'] , '</td>';
						echo '<td>' , $pro['diploma'] , '</td>';
						echo '<td>' , $pro['diplomaNO'] , '</td>';
						echo '<td>' , $pro['color'] , ' ' , $pro['clarity'] , ' ' , $pro['cut'] , ' ' , $pro['buffing'] , ' ' , $pro['symmetry'] , '</td>';
						echo '<td>' , $val['amount'] , '</td>';
						echo '<td align="right">' , sprintf('%.2f' , $val['price'] / $val['amount'] / $pro['weight']) , '</td>';
						echo '<td align="right">' , sprintf('%.2f' , $val['Yprice'] * $val['amount']) , '</td>';
						echo '<td>' , sprintf('%.2f' , $val['price'] / $val['amount'] / $pro['weight'] / $pro['INTbid'] * 100 - 100 ),'%' , '</td>';
						echo '<td align="right">' , $val['price'] , '</td>';
						echo '<td align="right">' , sprintf('%.2f' , $pro['infml'] * $val['amount']) , '</td>';
						echo '<td align="right">' , sprintf('%.2f' , $val['price'] - $pro['infml'] * $val['amount']) , '</td>';
						echo '<td align="left">' , $pro['stockAddress'],' + ' , $pro['previousNO'] , '</td>';
						echo '</tr>';
					}
					echo '</table>';
				}else{
					$this->fun->Msg('你选择的时间段内没有订单');
				}
			}else{
				$this->fun->local('?open=orders&action=to_csv');
			}
			exit;
		}
		
		//下载CSV文件
		private function to_csv_down_csv()
		{
			if ($_SESSION['back']['orders_to_csv'])
			{
				$SQL = 'select o.time,o.rebate,o.orders_id,p.Yprice,p.info,p.amount,p.price,if(pxy.name,pxy.name,pxy.account) as proxy 
						from orders as o 
						join orders_product as p on p.orders_id=o.orders_id 
						left join proxy as pxy on pxy.id=o.proxy_id 
						where o.time>='.strtotime($_SESSION['back']['orders_to_csv']['orders_start']).
						' and o.time<='.strtotime($_SESSION['back']['orders_to_csv']['orders_stop'])
						.' order by o.time asc';
				if (($down = $this->db->select_to_2Array($SQL)) != false)
				{
					ob_clean();
					header('Content-Type: text/tab-separated-values; charset=UTF-8');
					header('Accept-Ranges:bytes');
					header('Content-Disposition:attachment;filename=['. date('Y-m-d') .']orders_to_csv.csv');
					header('Pragma: no-cache');
					echo "\xEF\xBB\xBF";
					
					echo '日期,订单编号,客户名称,商品编号,证书,证书号,产品详情,数量,单价(¥/ct),订单售价,退点,最终售价,成本价,毛利,备注';
					foreach ($down as $val)
					{
						$pro = unserialize($val['info']);
						echo "\r\n" , date('Y-m-d',$val['time']);
						echo ',' , $val['orders_id'];
						echo ',' , $val['proxy'];
						echo ',' , $pro['ProID'];
						echo ',' , $pro['diploma'];
						echo ',' , $pro['diplomaNO'];
						echo ',' , $pro['color'] , ' ' , $pro['clarity'] , ' ' , $pro['cut'] , ' ' , $pro['buffing'] , ' ' , $pro['symmetry'];
						echo ',' , $val['amount'];
						echo ',' , sprintf('%.2f' , $val['price'] / $val['amount'] / $pro['weight']);
						echo ',' , sprintf('%.2f' , $val['Yprice'] * $val['amount']);
						echo ',' , sprintf('%.2f' , $val['price'] / $val['amount'] / $pro['weight'] / $pro['INTbid'] * 100 - 100),'%';
						echo ',' , $val['price'];
						echo ',' , sprintf('%.2f' , $pro['infml'] * $val['amount']);
						echo ',' , sprintf('%.2f' , $val['price'] - $pro['infml'] * $val['amount']);
						echo ',' , $pro['stockAddress'],' + ' , $pro['previousNO'];
					}
					
				}else{
					$this->fun->Msg('你选择的时间段内没有订单');
				}
			}else{
				$this->fun->local('?open=orders&action=to_csv');
			}
			exit;
		}
		
		/**
		 * 默认值
		 */
		private function default_value()
		{
			//状态
			self::$status = array('null'=>'下订单 -> 审核','audit'=>'通过审核','earnest'=>'通过审核 -> 付定金',	'deploy'=>'付定金 -> 调货','balance'=>'调货 -> 付余款','dispatch'=>'付余款 -> 发货','receiving'=>'收到货物',	'returned'=>'取消的订单');
			$this->sma->assign('status' , self::$status);
			
			//形状
			self::$shape = array('round'=>'圆形','princess'=>'公主方','heart'=>'心形','pear'=>'梨形','emerald'=>'祖母绿','marquise'=>'马眼形','cushion'=>'垫形','oval'=>'椭圆形','radiant'=>'明亮形');
			$this->sma->assign('shape' , self::$shape);
			
			//产品来源
			self::$proSource = array('speculation'=>'炒货','self'=>'自家店铺','comate'=>'代理商');
			$this->sma->assign('proSource' , self::$proSource);
			
			//国家
			self::$country = array('China'=>'中国','India'=>'印度','Hongkong'=>'香港','Belgium'=>'比利时','USA'=>'美国');
			$this->sma->assign('country' , self::$country);

			//库存地点
			self::$stockAddress = $this->db->select_to_2Array("select address from stock_address order by taxis desc");
			$this->sma->assign('stockAddress' , self::$stockAddress);
		}
		
		/**
		 * 获取状态
		 */
		private function get_status($array)
		{
			switch ($array['status'])
			{
				//通过审核
				case 'audit':
					if (!$array['earnest']) return 'audit';
				break;
				//通过审核 -> 付定金
				case 'earnest':
					if ($array['earnest'] > 0 && !$array['gotten_money']) return 'earnest';
				break;
				//付定金 -> 调货
				case 'deploy':
					if ($array['earnest'] == $array['gotten_money']) return 'deploy';
				break;
				//调货 -> 付余款
				case 'balance':
					if ($array['earnest'] == $array['gotten_money']) return 'balance';
				break;
				//付余款 -> 发货
				case 'dispatch':
					if ($array['price'] == $array['gotten_money']) return 'dispatch';
				break;
				
				case 'receiving'://收到货物
				case 'returned'://取消订单
					return $array['status'];
				break;
				//下订单 -> 审核
				default: return 'null';
			}
		}
		
		/**
		 * 取消订单的功能
		 */
		private function cancel_public($orders_id)
		{
			if (!$this->BTP[$this->get['open']]['cancel']) return -1;
			
			if (($ord = $this->db->select_to_1Array("select proxy_id,gotten_money from orders where (status!='returned' or status is null) and orders_id='{$orders_id}'")) != false)
			{
				//在取消订单产品之前先还原产品
				if (($orders = $this->db->select_to_2Array("select proxy_id,product_id,amount,info from orders_product where status !='C' and orders_id='{$orders_id}'")) != false)
				{
					foreach ($orders as $val)
					{
						if (($pro = $this->db->select_to_1Array("select amount from product where id='{$val['product_id']}'")) != false)
						{
							$this->db->update('product' , array('amount'=>'+++' . $val['amount'] , 'status'=>'up') , "id='{$val['product_id']}'");
						}else{
							$this->db->insert('product' , unserialize($val['info']));
						}
					}
					$this->db->update('orders_product' , array('status'=>'C') , "orders_id='{$orders_id}'");
				}
				
				if ($ord['gotten_money'])
				{
					$post = $this->fun->pars_all('post' , true);
					if (is_array($post) && count($post))
					{
						//扣款
						$this->db->update('orders' , array('status'=>'returned' , 'gotten_money'=>$post['money']) , "orders_id='{$orders_id}'");
						
						$post['money'] = (is_numeric($post['money'])) ? (float)$post['money'] : 0;
						$money = $ord['gotten_money'] - $post['money'];
						
						//如果全款时归还除开扣款的其他金额
						if ($money) $this->db->update('proxy' , array('money'=>'+++' . $money) , "id='{$ord['proxy_id']}'");
					}else{
						//抛错
						return 0;
					}
				}else{
					$this->db->update('orders' , array('status'=>'returned') , "orders_id='{$orders_id}'");
				}
				
				$log = array();
				$log['id'] = $this->fun->rand_string(26);
				$log['orders_id'] = $orders_id;
				$log['proxy_id'] = $ord['proxy_id'];
				$log['update_id'] = $_SESSION['back']['id'];
				$log['update_name'] = $_SESSION['back']['name'];
				$log['time'] = mktime();
				if ($post['money'])
					$log['info'] = "{$_SESSION['back']['name']} 取消了 {$log['orders_id']} 订单,并扣款 {$post['money']} 元";
				else
					$log['info'] = "{$_SESSION['back']['name']} 取消了 {$log['orders_id']} 订单";
				
				$this->db->insert('orders_log' , $log);
				
				//输出
				return 1;
			}
		}
		
		/**
		 * 显示订单和产品
		 */
		private function orders_and_products($is_return = false)
		{
			//订单
			$SQL = "select o.*,p.account,s.name as service_name,ps.name as salesman_name,w.name as outers,n.name as inners from orders as o join proxy as p on p.id=o.proxy_id join service as s on s.id=o.service_id join proxy as ps on ps.id=o.salesman_id left join logistics_status as w on o.logistics_outer_id=w.id left join logistics_status as n on o.logistics_inner_id=n.id where orders_id='{$this->get['orders_id']}'";
			if (($orders = $this->db->select_to_1Array($SQL)) != false)
			{
				$orders['status'] = $this->get_status($orders);
				$this->sma->assign('orders' , $orders);
			}
			
			//产品
			if (($product = $this->db->select_to_2Array("select * from orders_product where orders_id='{$this->get['orders_id']}'")) != false)
			{
				foreach ($product as $key => $val) $product[$key]['info'] = unserialize($val['info']);
				$this->sma->assign('product' , $product);
			}
			
			if ($is_return) return $orders;
		}
		
		/**
		 * 审核 and 更改 订单
		 */
		private function audit_public_append($post , $is_audit)
		{
			$orders = array();
			$orders['status'] = 'audit';
			$orders['remark'] = nl2br($post['remark']);
			
			$orders['price'] = 0;
			
			foreach ($post['status'] as $key => $val)
			{
				$log = array();
				$log['id'] = $this->fun->rand_string(23);
				$log['orders_id'] = $this->get['orders_id'];
				$log['proxy_id'] = $post['proxy_id'];
				$log['product_id'] = $key;
				$log['update_id'] = $_SESSION['back']['id'];
				$log['update_name'] = $_SESSION['back']['name'];
				$log['time'] = mktime();
				
				$pro = array();
				$pro['price'] = $post['price'][$key];
				$pro['remark'] = nl2br($post['pro_remark'][$key]);
				$pro['time'] = mktime();
				$log['info'] = "{$_SESSION['back']['name']} 把 {$log['orders_id']} 订单 {$post['ProID'][$key]} 产品的状态设置为";
				
				if ($val == 'Y')
				{
					$pro['status'] = 'Y';
					$orders['price'] += $post['price'][$key];
					$log['info'] .= ' 通过审核';
				}else{
					$pro['status'] = 'C';
					$log['info'] .= ' 取消';
					
					//在取消产品之前先还原产品
					$this->HY_product($this->get['orders_id'] , $key);
				}
				
				if ($post['price'][$key] != $post['Yuan_price'][$key])
					$log['info'] .= " , 并把产品 的价格由原来的 {$post['Yuan_price'][$key]} 元 改为了 {$post['price'][$key]} 元";
				
				$this->db->update('orders_product' , $pro , "product_id='{$key}'");
				
				if ((float)$post['Yuan_price'][$key] != (float)$post['price'][$key] || $post['Yuan_status'][$key] != $val || $is_audit)
					$this->db->insert('orders_log' , $log);
			}
			$this->db->update('orders' , $orders , "orders_id='{$this->get['orders_id']}'");
			
			$log = array();
			$log['id'] = $this->fun->rand_string(22);
			$log['orders_id'] = $this->get['orders_id'];
			$log['proxy_id'] = $post['proxy_id'];
			$log['update_id'] = $_SESSION['back']['id'];
			$log['update_name'] = $_SESSION['back']['name'];
			$log['time'] = mktime();
			if ($is_audit)
				$log['info'] = "{$_SESSION['back']['name']} 审核通过了 {$log['orders_id']} 订单";
			else
				$log['info'] = "{$_SESSION['back']['name']} 更改了 {$log['orders_id']} 订单";
			$this->db->insert('orders_log' , $log);
		}
		
		/**
		 * 扣除代理的钱
		 * @param $proxy	代理ID
		 * @param $money	要扣除的钱
		 */
		private function recoup_proxy_money($orders_id , $proxy , $money , $type)
		{
			//写入到全局日志中去
			$log = array();
			$log['id'] = $this->fun->rand_string(32);
			$log['type'] = 'money';
			$log['who_id'] = $proxy;
			$log['update_id'] = $_SESSION['back']['id'];
			$info = $this->db->select_to_1Array("select * from proxy where id='{$proxy}'");
			$log['pre-info'] = serialize($info);
			$info['money'] = sprintf('%.2f' , $info['money'] - $money);
			$log['sith-info'] = serialize($info);
			$type = $type == 'order_earnest' ? '定金' : '余款';
			$log['show'] = "{$_SESSION['back']['name']} 为 {$orders_id} 订单 扣除了 {$type} {$money} 元";
			$log['time'] = mktime();
			$this->db->insert('log' , $log);

			if ($money)
				return $this->db->update('proxy' , array('money'=>'---' . $money) , "id='{$proxy}' and money>={$money}");
			else
				return true;
		}
		
		/**
		 * 还原单个产品
		 */
		private function HY_product($orders_id , $id)
		{
			if (($orders = $this->db->select_to_1Array("select proxy_id,amount,info from orders_product where status !='C' and product_id='{$id}' and orders_id='{$orders_id}'")) != false)
			{
				if (($pro = $this->db->select_to_1Array("select amount from product where id='{$id}'")) != false)
				{
					$this->db->update('product' , array('amount'=>'+++' . $orders['amount'] , 'status'=>'up') , "id='{$id}'");
				}else{
					$this->db->insert('product' , unserialize($orders['info']));
				}
			}
		}
	}
?>