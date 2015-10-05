<?php
	class cart extends start
	{
		public function __construct()
		{
			parent::__construct(true);
		}
		
		public function show()
		{
			if (!$this->QX[$this->get['open']][$this->get['action']]) $this->fun->Msg('你没有此权限');
			
			if (count($_SESSION['proxy']['cart'])) $this->cart_list();
			
			$this->sma->display($this->get['open']);
		}
		
		//添加到购物车
		public function add()
		{
			if (!$this->QX[$this->get['open']][$this->get['action']]) $this->fun->Msg('你没有此权限');
			
			$post = $this->fun->pars_all('post' , true);
			$id = "('" . join("','" , $post['id']) . "')";
			
			if (($cart = $this->db->select_N_to_1key("select id from product where status='up' and amount>0 and id in {$id}" , 'id' , 'id')) != false)
			{
				if (is_array($_SESSION['proxy']['cart']))
					$_SESSION['proxy']['cart'] = array_merge($_SESSION['proxy']['cart'] , $cart);
				else
					$_SESSION['proxy']['cart'] = $cart;
			}
				
			$this->fun->local('./?open=' . $this->get['open']);
		}
		
		//删除购物车中的商品
		public function del()
		{
			if (!$this->QX[$this->get['open']][$this->get['action']]) $this->fun->Msg('你没有此权限');
			
			if ($this->get['id'])
				unset($_SESSION['proxy']['cart'][$this->get['id']]);
			else
				unset($_SESSION['proxy']['cart']);
			$this->fun->local('./?open=cart');
		}
		
		//生成订单
		public function make_orders()
		{
			$post = $this->fun->pars_all('post' , true);
			if (!count($post['amount'])) $this->fun->Msg('请填写购买量');
			//print_r($_SESSION);exit;
			
			$IS_XD = false;
			
			$orders = array();
			$orders['orders_id'] = $this->make_orders_id();
			$orders['proxy_id'] = $_SESSION['proxy']['id'];
			$orders['salesman_id'] = $_SESSION['proxy']['salesman_id'];
			$orders['service_id'] = $_SESSION['proxy']['service_id'];
			$orders['time'] = mktime();
			$orders['rebate'] = $_SESSION['proxy']['rebate'];
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
					if ($_SESSION['proxy']['is_offer'] == 'Y' && $info['is_promotion'] == 'Y' and $info['promotion_start'] <= mktime() and $info['promotion_stop'] >= mktime())
					{
						$product['Yprice'] = sprintf('%.2f' , $info['INTbid'] * $info['weight'] * (100+$info['agio'] + $info['baseAgio'] + $info['promotion_dot']) / 100);
						$product['price'] = (float)$product['Yprice'] * $product['amount'];
					}else{
						$product['Yprice'] = sprintf('%.2f' , $info['INTbid'] * $info['weight'] * (100+$info['agio'] + $info['baseAgio'] + $orders['rebate']) / 100);
						$product['price'] = (float)$product['Yprice'] * $product['amount'];
					}
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
			
			unset($_SESSION['proxy']['cart']);
			if ($IS_XD)
			{
				$orders['price'] = $price;
				$this->db->insert('orders' , $orders);
				
				$log = array();
				$log['id'] = $this->fun->rand_string(22);
				$log['proxy_id'] = $orders['proxy_id'];
				$log['orders_id'] = $orders['orders_id'];
				$log['update_id'] = $orders['proxy_id'];
				$log['update_name'] = $_SESSION['proxy']['name'];
				$log['time'] = mktime();
				$log['info'] = "{$_SESSION['proxy']['name']} 于  " . date('Y-m-d H:i:s') . " 下单";
				$this->db->insert('orders_log' , $log);
				
				$this->fun->local('./?open=me&action=orders');
			}else{
				$this->fun->Msg('你选择的产品已被别人订购,请重新选择产品' , '?open=Query');
			}
			
		}
		
		/**
		 * 产品列表
		 */
		private function cart_list()
		{
			$id = "('" . join("','" , $_SESSION['proxy']['cart']) . "')";
			//形状
			$shape = array('round'=>'圆形','princess'=>'公主方','heart'=>'心形','pear'=>'梨形','emerald'=>'祖母绿','marquise'=>'马眼形','cushion'=>'垫形','oval'=>'椭圆形','radiant'=>'明亮形');
			$this->sma->assign('shape' , $shape);
			
			$SQL = "select id,amount,ProID,shape,weight,color,clarity,cut,buffing,symmetry,Fent_Isity,scalar_value,baseAgio,diploma,diplomaNO,agio,infml,INTbid,is_promotion,promotion_start,promotion_stop,promotion_dot from product where status='up' and amount>0 and id in {$id} order by weight desc";
			if (($Qs = $this->db->select_to_2Array($SQL)) != false)
			{
				/**
				 * 此两句用于调试,主要用于产品状态改变
				 * 而购物车数字未变的情况,稍微耗费内存
				 * 此情况对程序无影响,只是显示数字而已,建议隐藏
				 */
				//unset($_SESSION['proxy']['cart']);
				//foreach ($Qs as $val) $_SESSION['proxy']['cart'][$val['id']] = $val['id'];
				
				$this->sma->assign('list_cart',$Qs);
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