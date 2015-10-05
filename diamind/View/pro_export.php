<?php
	class pro_export extends start
	{
		private $shape , $attribute;
		
		public function __construct()
		{
			parent::__construct(true);
		}
		
		public function show()
		{
			if (!$this->QX[$this->get['open']][$this->get['action']]) $this->fun->Msg('你没有此权限');
			
			if (count($_SESSION['proxy']['pro_export']))
			{
				$this->default_value();
				$this->cart_list();
			}
			
			$this->sma->display($this->get['open']);
		}
		
		//添加到缓存
		public function add()
		{
			if (!$this->QX[$this->get['open']][$this->get['action']]) $this->fun->Msg('你没有此权限');
			
			$post = $this->fun->pars_all('post' , true);
			$id = "('" . join("','" , $post['id']) . "')";
			
			if (($to_csv = $this->db->select_N_to_1key("select id from product where id in {$id}" , 'id' , 'id')) != false)
			{
				if (is_array($_SESSION['proxy']['pro_export']))
					$_SESSION['proxy']['pro_export'] = array_merge($_SESSION['proxy']['pro_export'] , $to_csv);
				else
					$_SESSION['proxy']['pro_export'] = $to_csv;
			}
				
			$this->fun->local('./?open=' . $this->get['open']);
		}
		
		//删除缓存的产品
		public function del()
		{
			if (!$this->QX[$this->get['open']][$this->get['action']]) $this->fun->Msg('你没有此权限');
			
			if ($this->get['id'])
				unset($_SESSION['proxy']['pro_export'][$this->get['id']]);
			else
				unset($_SESSION['proxy']['pro_export']);
			$this->fun->local('./?open=' . $this->get['open']);
		}
		
		//选择要导出的属性
		public function choose()
		{
			if ($_SESSION['proxy']['pro_export'] && count($_SESSION['proxy']['pro_export']))
			{
				$this->default_value();
				
				$_SESSION['proxy']['pro_export_temp'] = $_SESSION['proxy']['pro_export'];
				unset($_SESSION['proxy']['pro_export']);
			}else{
				$this->fun->local('./?open=' . $this->get['open']);
			}
			$this->sma->display($this->get['open']);
		}
		
		//生成订单
		public function write()
		{
			$post = $this->fun->pars_all('post' , true);
			if (!count($post['attribute'])) $this->fun->Msg('请至少选择一个产品属性');
			$_SESSION['proxy']['pro_export_post'] = $post;
			
			$this->sma->display($this->get['open']);
		}
		
		//下载csv
		public function down()
		{
			if ($_SESSION['proxy']['pro_export_temp'] && count($_SESSION['proxy']['pro_export_temp']))
			{
				//print_r($_SESSION['proxy']['pro_export_post']);exit;
				$id = "('" . join("','" , $_SESSION['proxy']['pro_export_temp']) . "')";
				
				if ($_SESSION['proxy']['pro_export_post']['taxis'])
				{
					$order = 'order by';
					foreach ($_SESSION['proxy']['pro_export_post']['taxis'] as $key => $val)
					$order .= ' ' . $key . ' ' . $val . ',';
					$order = substr($order , 0 , -1);
				}
				
				if (($down = $this->db->select_to_2Array("select * from product where id in {$id} {$order}")) != false)
				{
					ob_clean();
					header("Content-Type: text/tab-separated-values; charset=UTF-8");
					header("Accept-Ranges:bytes");
					header('Content-Disposition:attachment;filename=['. date('Y-m-d') .']pro_export.csv');
					header("Pragma: no-cache");
					
					$this->default_value();
					echo "\xEF\xBB\xBF";
					foreach ($_SESSION['proxy']['pro_export_post']['attribute'] as $val)
					{
						$str .= $this->attribute[$val]['name'] . ',';
					}
					$str .= '售价(人民币)';
					echo $str;
					
					foreach ($down as $doV)
					{
						$str = "\r\n";
						foreach ($_SESSION['proxy']['pro_export_post']['attribute'] as $val)
						{
							switch ($val)
							{
								case 'agio':
									if ($_SESSION['proxy']['is_offer'] == 'Y' && $doV['is_promotion']=='Y' && $doV['promotion_start']<=mktime() && $doV['promotion_stop']>=mktime())
										$str .= sprintf('%.2f',$doV['agio']+$doV['baseAgio']+$doV['promotion_dot']).'%';
									else
										$str .= sprintf('%.2f',$doV['agio']+$doV['baseAgio']+$_SESSION['proxy']['rebate']).'%';
								break;
								default:$str .= $doV[$val];
							}
							$str .=  ',';
						}
						if ($_SESSION['proxy']['is_offer'] == 'Y' && $doV['is_promotion']=='Y' && $doV['promotion_start']<=mktime() && $doV['promotion_stop']>=mktime())
							$str .= sprintf('%.2f' , $doV['INTbid'] * $doV['weight'] * (100+$doV['agio'] + $doV['baseAgio'] + $doV['promotion_dot']) / 100);
						else
							$str .= sprintf('%.2f' , $doV['INTbid'] * $doV['weight'] * (100+$doV['agio'] + $doV['baseAgio'] + $_SESSION['proxy']['rebate']) / 100);
						echo $str;
					}
					exit;
				}else{
					$this->fun->Msg('没有需要导出的产品');
				}
			}else{
				$this->fun->Msg('请先选择产品,并设定导出条件');
			}
		}
		
		/**
		 * 产品列表
		 */
		private function cart_list()
		{
			$id = "('" . join("','" , $_SESSION['proxy']['pro_export']) . "')";
			
			$SQL = "select id,amount,ProID,shape,weight,color,clarity,cut,buffing,symmetry,Fent_Isity,scalar_value,baseAgio,diploma,diplomaNO,agio,infml,INTbid,is_promotion,promotion_start,promotion_stop,promotion_dot from product where status='up' and amount>0 and id in {$id} order by ProID desc";
			if (($Qs = $this->db->select_to_2Array($SQL)) != false) $this->sma->assign('list_cart',$Qs);
		}
		
		private function default_value()
		{
			//形状
			$this->shape = array('round'=>'圆形','princess'=>'公主方','heart'=>'心形','pear'=>'梨形','emerald'=>'祖母绿','marquise'=>'马眼形','cushion'=>'垫形','oval'=>'椭圆形','radiant'=>'明亮形');
			$this->sma->assign('shape' , $this->shape);
			
			$this->attribute = array(
		'ProID' => array('value'=>'ProID' , 'name'=>'产品编号' , 'checked'=>true),
		'amount' => array('value'=>'amount' , 'name'=>'数量' , 'checked'=>false),
		'shape' => array('value'=>'shape' , 'name'=>'形状' , 'checked'=>false),
		'weight' => array('value'=>'weight' , 'name'=>'重量' , 'checked'=>true),
		'color' => array('value'=>'color' , 'name'=>'颜色' , 'checked'=>true),
		'clarity' => array('value'=>'clarity' , 'name'=>'净度' , 'checked'=>true),
		'cut' => array('value'=>'cut' , 'name'=>'切工' , 'checked'=>true),
		'buffing' => array('value'=>'buffing' , 'name'=>'抛光' , 'checked'=>true),
		'symmetry' => array('value'=>'symmetry' , 'name'=>'对称' , 'checked'=>true),
		'Fent_Isity' => array('value'=>'Fent_Isity' , 'name'=>'荧光强度' , 'checked'=>true),
		'Fent_color' => array('value'=>'Fent_color' , 'name'=>'荧光颜色' , 'checked'=>false),
		'scalar_value' => array('value'=>'scalar_value' , 'name'=>'测量值 (直径)' , 'checked'=>true),
		'body_ratio' => array('value'=>'body_ratio' , 'name'=>'全身比' , 'checked'=>false),
		'table_width' => array('value'=>'table_width' , 'name'=>'台宽比' , 'checked'=>false),
		'diploma' => array('value'=>'diploma' , 'name'=>'证书类型' , 'checked'=>true),
		'diplomaNO' => array('value'=>'diplomaNO' , 'name'=>'证书编号' , 'checked'=>true),
		'INTbid' => array('value'=>'INTbid' , 'name'=>'国际报价' , 'checked'=>false),
		'agio' => array('value'=>'agio' , 'name'=>'退点' , 'checked'=>true)
	);
			$this->sma->assign('attribute' , $this->attribute);
		}
		
	}
?>