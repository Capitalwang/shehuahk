<?php
	class me extends start
	{
		private static $shape , $status , $proSource , $country , $stockAddress;

		public function __construct()
		{
			parent::__construct(true);
			$this->orders_default_value();
		}
		
		public function show()
		{
			//if (!$this->QX[$this->get['open']][$this->get['action']]) $this->fun->Msg('你没有此权限');
			$this->get['action'] = 'info';
			$this->sma->assign('get' , $this->get);

			$this->info();
			
			//$this->sma->display($this->get['open']);
		}
		
		public function info()
		{
			if (!$this->QX[$this->get['open']][$this->get['action']]) $this->fun->Msg('你没有此权限');
			
			if (($show = $this->db->select_to_1Array("select * from proxy where id='{$_SESSION['proxy']['id']}'")) != false)
				$this->sma->assign('show' , $show);
				
			if (($Nab = $this->db->select_to_2Array("select * from proxy_nab where proxy_id='{$_SESSION['proxy']['id']}'")) != false)
				$this->sma->assign('Nab' , $Nab);
			
			$this->sma->display('me_info');
		}
		
		public function orders()
		{
			if (!$this->QX[$this->get['open']][$this->get['action']]) $this->fun->Msg('你没有此权限');
			
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
			$list->pageNS = 10;
			$list->NowPage = (empty($this->get['page']) | $this->get['page'] < 1 | !is_numeric($this->get['page'])) ? 1 : $this->get['page'];
			$list->SQL = "select o.orders_id,o.time,o.earnest,o.price,o.gotten_money,o.status,p.account,s.name as service_name,ps.name as salesman_name
							from orders as o join proxy as p on p.id=o.proxy_id	join service as s on s.id=o.service_id 
							join proxy as ps on ps.id=o.salesman_id where 1 {$query} {$status} and o.proxy_id='{$_SESSION['proxy']['id']}' order by {$ORDER[$ors]}";
			$info = $list->getText();
			if ($info) foreach ($info as $key => $val) $info[$key]['status'] = $this->get_status($val);
			//print_r($info);
			$this->sma->assign('list_page', $list->getPage());
			$this->sma->assign('list_text', $info);
			
			$this->sma->display('orders');
		}
		
		public function orders_detail()
		{
			if (!$this->QX[$this->get['open']][$this->get['action']]) $this->fun->Msg('你没有此权限');
			
			//订单
			$SQL = "select o.*,p.account,s.name as service_name,ps.name as salesman_name,w.name as outers,n.name as inners from orders as o join proxy as p on p.id=o.proxy_id join service as s on s.id=o.service_id join proxy as ps on ps.id=o.salesman_id left join logistics_status as w on o.logistics_outer_id=w.id left join logistics_status as n on o.logistics_inner_id=n.id where orders_id='{$this->get['orders_id']}'";
			if (($orders = $this->db->select_to_1Array($SQL)) != false)
			{
				$orders['status'] = $this->get_status($orders);
				
				$this->sma->assign('orders' , $orders);
			}
			
			//产品
			if (($product = $this->db->select_to_2Array("select id,amount,price,info,is_arrival,express_type,express_ID,status from orders_product where orders_id='{$this->get['orders_id']}'")) != false)
			{
				foreach ($product as $key => $val) $product[$key]['info'] = unserialize($val['info']);
				$this->sma->assign('product' , $product);
			}
			
			//日志
			if (($log = $this->db->select_to_2Array("select * from orders_log where orders_id='{$this->get['orders_id']}' order by time asc")) != false)
				$this->sma->assign('log' , $log);
				
			$this->sma->display('orders_detail');
		}
		
		//产品详情
		public function product_detail()
		{
			
			if ($this->get['id'])
			{
				if (($json = $this->db->select_to_1Array("select * from orders_product where id='{$this->get['id']}'")) != false)
				{
					$json['info'] = unserialize($json['info']);

					$this->sma->assign('show' , $json);
					echo $this->sma->fetch('orders_product_detail.html');
				}
			}
		}
		
		//现金日志
		public function log()
		{
			if (!$this->QX[$this->get['open']][$this->get['action']]) $this->fun->Msg('你没有此权限');
			
			require_once(BASEPATH . '../Class/page.php');
			$list = new page;
			$list->db = $this->db;
			$list->pageNS = 20;
			$list->NowPage = (empty($this->get['page']) | $this->get['page'] < 1 | !is_numeric($this->get['page'])) ? 1 : $this->get['page'];
			$list->SQL = "select id,`show`,time from log where `type`='money' and who_id='{$_SESSION['proxy']['id']}' order by time desc";
			
			$this->sma->assign('list_page',$list->getPage());
			$this->sma->assign('list_text',$list->getText());
			
			$this->sma->display('me_log');
		}
		
		//修改密码
		public function password()
		{
			if (!$this->QX[$this->get['open']][$this->get['action']]) $this->fun->Msg('你没有此权限');
			if ($this->get['go'] == 'append')
			{
				$post = $this->fun->pars_all('post' , true);
				if (!$post['password']) $this->fun->Msg('请填写当前密码');
				if (!$post['oneP'] || strlen($post['oneP']) < 6) $this->fun->Msg('新的密码不能少于6个字符');
				if ($post['oneP'] != $post['twoP']) $this->fun->Msg('两次新密码不相同');
				
				if ($this->db->select_to_1Array("select id from proxy where id='{$_SESSION['proxy']['id']}' and password='".md5($post['password'])."'") != false)
				{
					$this->db->update('proxy' , array('password' => md5($post['twoP'])) , "id='{$_SESSION['proxy']['id']}'");
					$this->fun->local('./?open=me&action=info');
				}else{
					$this->fun->Msg('你输入的当前密码错误');
				}
			}else{
				if (($show = $this->db->select_to_1Array("select number,account,name,nickname from proxy where id='{$_SESSION['proxy']['id']}'")) != false)
					$this->sma->assign('show' , $show);
					
				$this->sma->display('me_password');
			}
		}
		
		//修改资料
		public function edit()
		{
            
			if (!$this->QX[$this->get['open']][$this->get['action']]) $this->fun->Msg('你没有此权限');
			if ($this->get['go'] == 'append')
			{
				$picName='';
				$completePath='';
				$array = array();
				$post = $this->fun->pars_all('post' , true);
				
				if(!$_SESSION["proxy"]["company_logo"]){
				if(!empty($_FILES["company_logo"]["tmp_name"])){
			        if($_FILES["company_logo"]["size"]>1024*1024*2){
                                    $this->fun->Msg('图片太大！请上传小于2M的图片！');
					}else{
						$upPath="upload/";
						$upPathN=$upPath.$_SESSION['proxy']['account']."/";
						if(!is_dir($upPath)){
							mkdir($upPath,0700);
						}else{
							mkdir($upPathN,0700);
						}
						$tp=array("image/gif","image/pjpeg","image/jpeg","image/jpg","image/png"); 
						if(!in_array($_FILES["company_logo"]["type"],$tp)){
							$this->fun->Msg('格式不对！');
						}
						//var_dump($_FILES["company_logo"]);die;
						
						$filetype=$_FILES['company_logo']['type'];
						$type="";
						$flag=0;
						if($filetype=='image/jpeg'){
							$type='.jpg';
						}
						if($filetype=='image/jpg'){
							$type='.jpg';
						}
						if($filetype=='image/pjpeg'){
							$type='.jpg';
						}
						if($filetype=='image/png'){
							$type='.png';
						}
						if($filetype=='image/gif'){
							$type='.gif';
						}
						if($_FILES["company_logo"]["name"]){
							$now=date("YmdHs");
							$completePath=$upPathN.$now.$type;
							$picName='logo'.$now.$type;
		                    if($_SESSION["proxy"]["company_logo"]){
		                    	unlink($_SESSION["proxy"]["company_logo"]);
		                    }
							$flag=1;
						}
						if($flag){
							$result=move_uploaded_file($_FILES["company_logo"]["tmp_name"],$completePath);
						    if($result){
						    	$array['company_logo'] =$completePath;
						    	$_SESSION["proxy"]["company_logo"]=$completePath;
						    }else{
						    	$this->fun->Msg('上传图片失败！');
						    }
						}
					}
				}else{
					$this->fun->Msg('请重新选择图片，要求小于2M');
				}
				}
				if(!$post['name']) {$this->fun->Msg('请填写真实姓名');}
				if(!$post['company_name']) {$this->fun->Msg('请填写公司名称');}
				if(!$post['mag']) {$this->fun->Msg('请填写倍率！默认为0！');}
				
				$array['name'] = $post['name'];
				$array['nickname'] = $post['nickname'];
				$array['company_name'] = $post['company_name'];
				$array['company_address'] = $post['company_address'];
				$array['mag'] = $post['mag'];
				$array['brand_name'] = $post['brand_name'];
				$array['position'] = $post['position'];
				$array['business_zone'] = $post['business_zone'];
				$array['business_scope'] = $post['business_scope'];
				$array['home_page'] = $post['home_page'];
				$array['province'] = $post['province'];
				$array['city'] = $post['city'];
				$array['sex'] = $post['sex'];
				$array['is_SMS'] = ($post['is_SMS'] == 'Y') ? 'Y' : 'N';
				$_SESSION['proxy']['is_SMS'] = $array['is_SMS'];
				if ($array['is_SMS'] == 'N') unset($_SESSION['proxy']['SMS']);
				
				$this->db->update('proxy' , $array , "id='{$_SESSION['proxy']['id']}'");
				$this->set_db_NAB($_SESSION['proxy']['id']);
				
				$this->fun->local('./?open=me&action=info');
			}else{
				
				$this->NAB = array('QQ' => 'QQ','mail' => '邮箱','tel' => '电话','mobile' => '手机','msn' => 'MSN','skype' => 'Skype','else' => '其他方式');
				$this->sma->assign('NAB' , $this->NAB);
				
				if (($show = $this->db->select_to_1Array("select * from proxy where id='{$_SESSION['proxy']['id']}'")) != false)
					$this->sma->assign('show' , $show);
				
				if (($Nab = $this->db->select_to_2Array("select * from proxy_nab where proxy_id='{$_SESSION['proxy']['id']}'")) != false)
					$this->sma->assign('Nab' , $Nab);
					
				$this->sma->display('me_edit');
			}
        }
		private function set_db_NAB($id)
		{
			$post = $this->fun->pars_all('post' , true);
			
			$this->db->del('proxy_nab' , "proxy_id='{$id}'");
			foreach ($post['content'] as $key => $val)
			{
				if ($val)
				{
					if (!$post['type'][$key]) $this->fun->Msg('请选择通讯类型');
					
					$array = array();
					$array['id'] = $this->fun->rand_string(14);
					$array['proxy_id'] = $id;
					$array['type'] = $post['type'][$key];
					$array['type_name'] = $post['type_name'][$key];
					$array['content'] = $val;
					$array['time'] = mktime();
					$array['is_default'] = ($val == $post['is_default']) ? 'Y' : 'N';
					
					$this->db->insert('proxy_nab' , $array);
				}
			}
		}
		
		/**
		 * 默认值
		 */
		private function orders_default_value()
		{
			//状态
			self::$status = array('null'=>'下订单 -> 审核','audit'=>'通过审核','earnest'=>'通过审核 -> 付定金',	'deploy'=>'付定金 -> 调货','balance'=>'调货 -> 付余款','dispatch'=>'付余款 -> 发货','receiving'=>'收到货物','returned'=>'取消的订单');
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
	}


?>
