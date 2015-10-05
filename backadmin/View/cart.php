<?php
	class cart extends start
	{
		public function __construct()
		{
			parent::__construct(true);
		}
		
		public function show()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			
			if (count($_SESSION['back']['cart'])) $this->cart_list();
			
			$this->sma->display($this->get['open']);
		}
		
		//添加到购物车
		public function add()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			
			$post = $this->fun->pars_all('post' , true);
			$id = "('" . join("','" , $post['id']) . "')";
			
			if (($cart = $this->db->select_N_to_1key("select id from product where status='up' and amount>0 and id in {$id}" , 'id' , 'id')) != false)
			{
				if (is_array($_SESSION['back']['cart']))
					$_SESSION['back']['cart'] = array_merge($_SESSION['back']['cart'] , $cart);
				else
					$_SESSION['back']['cart'] = $cart;
			}
				
			$this->fun->local('./?open=' . $this->get['open']);
		}
		
		//删除购物车中的商品
		public function del()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			
			if ($this->get['id'])
				unset($_SESSION['back']['cart'][$this->get['id']]);
			else
				unset($_SESSION['back']['cart']);
			$this->fun->local('./?open=cart');
		}
		
		//填写订单信息
		public function orders_info()
		{
			$post = $this->fun->pars_all('post' , true);
			if ($_SESSION['back']['cart'] && count($_SESSION['back']['cart']))
			{
				$post['remark'] = nl2br($post['remark']);
				$this->sma->assign('post' , $post);
				
				$this->cart_list($post);
			}else{
				$this->fun->local('./?open=cart');
			}
			$this->sma->display($this->get['open']);
		}
		
		//生成订单
		public function make_orders()
		{
			$post = $this->fun->pars_all('post' , true);
			if (!$post['proxy_id']) $this->fun->Msg('请填写代理身份');
			if (!$post['salesman_id']) $this->fun->Msg('请填写业务');
			if (!$post['service_id']) $this->fun->Msg('请填写客服');
			if (!count($post['amount']) || !count($post['price'])) $this->fun->Msg('请填写购买量');
			
			$IS_XD = false;
			
			$orders = array();
			$orders['orders_id'] = $this->make_orders_id();
			$orders['proxy_id'] = $post['proxy_id'];
			$orders['salesman_id'] = $post['salesman_id'];
			$orders['service_id'] = $post['service_id'];
			$orders['time'] = mktime();
			$orders['rebate'] = $this->get_proxy(true , $post['proxy_value']);
			$orders['rebate'] = $orders['rebate']['rebate'];
			$orders['remark'] = nl2br($post['remark']);
			
			$price = 0;
			foreach ($post['amount'] as $key => $val)
			{
				if (($info = $this->db->select_to_1Array("select * from product where status='up' and amount>0 and id='{$key}'")) != false)
				{
					$product = array();
					$product['id'] = $this->fun->rand_string(20);
					$product['orders_id'] = $orders['orders_id'];
					$product['proxy_id'] = $orders['proxy_id'];
					$product['product_id'] = $key;
					$product['amount'] = ((int)$val >= $info['amount']) ? $info['amount'] : (int)$val;
					$product['is_promotion'] = ($info['is_promotion'] == 'Y' && $info['promotion_start'] <= mktime() && $info['promotion_stop'] >= mktime()) ? 'Y' : 'N';
					$product['Yprice'] = $post['Yprice'][$key];
					$product['price'] = (float)$post['price'][$key] * $product['amount'];
					$product['baseAgio'] = $info['baseAgio'];
					$price += $product['price'];
					
					//如果买完所有的产品,那么下架
					//改变产品表中的数量
					$PT = array();
					$PT['amount'] = $info['amount'] - $product['amount'];
					if ($product['amount'] >= $info['amount']) $PT['status'] = 'sold';
					$this->db->update('product' , $PT , "id='{$key}'");
					
					$info['amount'] = $product['amount'];
					$product['info'] = serialize($info);
					$this->db->insert('orders_product' , $product);
					$IS_XD = true;
				}
			}
			
			unset($_SESSION['back']['cart']);
			if ($IS_XD)
			{
				$orders['price'] = $price;
				$this->db->insert('orders' , $orders);
				
				$log = array();
				$log['id'] = $this->fun->rand_string(22);
				$log['proxy_id'] = $orders['proxy_id'];
				$log['orders_id'] = $orders['orders_id'];
				$log['update_id'] = $_SESSION['back']['id'];
				$log['update_name'] = $_SESSION['back']['name'];
				$log['time'] = mktime();
				$log['info'] = "{$_SESSION['back']['name']} 代 {$post['proxy_value']} 下单";
				$this->db->insert('orders_log' , $log);
				
				$this->fun->local('./?open=orders');
			}else{
				$this->fun->Msg('你选择的产品已被别人订购,请重新选择产品' , '?open=prodcut');
			}
		}
		
		//ajax 代理身份
		public function get_proxy($mode = false , $string = false)
		{
			$string = ($string) ? $string : $this->get['string'];
			if (!$string) {if ($mode) return false; else exit('0');}
			
			$SQL = "select p.id,p.salesman_id,p.salesman_write,p.service_id,p.service_write,pg.rebate,pg.is_offer,pg.name as `group` 
					from proxy as p join proxy_group as pg on pg.id=p.proxy_group 
					where p.account='{$string}' or p.name='{$string}' or p.number='{$string}'";
			if (($proxy = $this->db->select_to_1Array($SQL)) != false)
			{
				if ($mode) return $proxy; else echo $this->fun->php_json_encode($proxy);
			}else{
				if ($mode) return false; else exit('0');
			}
		}
		
		//ajax 改变 业务 || 客服
		public function change()
		{
			if (!$this->get['string'] || !$this->get['tab']) exit('0');
			
			if (($change = $this->db->select_to_1Array("select id from {$this->get['tab']} where account='{$this->get['string']}' or name='{$this->get['string']}' or number='{$this->get['string']}'")) != false)
				echo $this->fun->php_json_encode($change);
			else
				exit('0');
		}
		
		/**
		 * 产品列表
		 */
		private function cart_list($post = false)
		{
			$id = "('" . join("','" , $_SESSION['back']['cart']) . "')";
			//形状
			$shape = array('round'=>'圆形','princess'=>'公主方','heart'=>'心形','pear'=>'梨形','emerald'=>'祖母绿','marquise'=>'马眼形','cushion'=>'垫形','oval'=>'椭圆形','radiant'=>'明亮形');
			$this->sma->assign('shape' , $shape);
			
			$SQL = "select id,amount,ProID,shape,weight,color,clarity,cut,buffing,symmetry,Fent_Isity,scalar_value,baseAgio,diploma,diplomaNO,agio,infml,INTbid,is_promotion,promotion_start,promotion_stop,promotion_dot from product where status='up' and amount>0 and id in {$id} order by ProID desc";
			if (($Qs = $this->db->select_to_2Array($SQL)) != false)
			{
				/**
				 * 此两句用于调试,主要用于产品状态改变
				 * 而购物车数字未变的情况,稍微耗费内存
				 * 此情况对程序无影响,只是显示数字而已,建议隐藏
				 */
				//unset($_SESSION['back']['cart']);
				//foreach ($Qs as $val) $_SESSION['back']['cart'][$val['id']] = $val['id'];
				
				$this->sma->assign('list_cart',$Qs);
				if ($post)
				{
					$price = 0;
					foreach ($Qs as $val)
					{
						if ($post['is_offer'] == 'Y' && $val['is_promotion'] == 'Y' && $val['promotion_start'] <= mktime() && $val['promotion_stop'] >= mktime())
							$price += sprintf('%.2f' , $val['INTbid'] * $val['weight'] * (100 + $val['agio'] + $val['baseAgio'] + $val['promotion_dot']) / 100);
						else
							$price += sprintf('%.2f' , $val['INTbid'] * $val['weight'] * (100 + $val['agio'] + $val['baseAgio'] + $post['rebate']) / 100);
					}
					$this->sma->assign('price',$price);
				}
			}
		}
		
		/**
		 * 生成订单号
		 */
		private function make_orders_id()
		{
			return date('dym') . '-' . $this->fun->rand_string(6 , 1) . '-' . date('iHs');
		}
	}
?>