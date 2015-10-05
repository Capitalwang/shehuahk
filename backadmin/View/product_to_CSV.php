<?php
	class product_to_CSV extends start
	{
		private $shape , $attribute;
		
		public function __construct()
		{
			parent::__construct(true);
		}
		
		public function show()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			
			if (count($_SESSION['back']['product_to_CSV']))
			{
				$this->default_value();
				$this->cart_list();
			}
			
			$this->sma->display($this->get['open']);
		}
		
		//添加到缓存
		public function add()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			
			$post = $this->fun->pars_all('post' , true);
			$id = "('" . join("','" , $post['id']) . "')";
			
			if (($to_csv = $this->db->select_N_to_1key("select id from product where id in {$id}" , 'id' , 'id')) != false)
			{
				if (is_array($_SESSION['back']['product_to_CSV']))
					$_SESSION['back']['product_to_CSV'] = array_merge($_SESSION['back']['product_to_CSV'] , $to_csv);
				else
					$_SESSION['back']['product_to_CSV'] = $to_csv;
			}
				
			$this->fun->local('./?open=' . $this->get['open']);
		}
		
		//删除缓存的产品
		public function del()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			
			if ($this->get['id'])
				unset($_SESSION['back']['product_to_CSV'][$this->get['id']]);
			else
				unset($_SESSION['back']['product_to_CSV']);
			$this->fun->local('./?open=' . $this->get['open']);
		}
		
		//选择要导出的属性
		public function choose()
		{
			if ($_SESSION['back']['product_to_CSV'] && count($_SESSION['back']['product_to_CSV']))
			{
				$this->default_value();
				
				$this->get_proxy_group();
				
				$_SESSION['back']['product_to_CSV_temp'] = $_SESSION['back']['product_to_CSV'];
				unset($_SESSION['back']['product_to_CSV']);
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
			if (!$post['money']) $this->fun->Msg('请选择价格体系');
			$_SESSION['back']['product_to_CSV_post'] = $post;
			
			$this->sma->display($this->get['open']);
		}
		
		//下载csv
		public function down()
		{
			if ($_SESSION['back']['product_to_CSV_temp'] && count($_SESSION['back']['product_to_CSV_temp']))
			{
				//print_r($_SESSION['back']['product_to_CSV_post']);exit;
				$id = "('" . join("','" , $_SESSION['back']['product_to_CSV_temp']) . "')";
				
				if ($_SESSION['back']['product_to_CSV_post']['taxis'])
				{
					$order = 'order by';
					foreach ($_SESSION['back']['product_to_CSV_post']['taxis'] as $key => $val)
					$order .= ' ' . $key . ' ' . $val . ',';
					$order = substr($order , 0 , -1);
				}
				
				if (($down = $this->db->select_to_2Array("select * from product where id in {$id} {$order}")) != false)
				{
					ob_clean();
					header("Content-Type: text/tab-separated-values; charset=UTF-8");
					header("Accept-Ranges:bytes");
					header('Content-Disposition:attachment;filename=['. date('Y-m-d') .']product_to_csv.csv');
					header("Pragma: no-cache");
					
					$this->default_value();
					echo "\xEF\xBB\xBF";
					foreach ($_SESSION['back']['product_to_CSV_post']['attribute'] as $val)
					{
						$str .= $this->attribute[$val]['name'] . ',';
					}
					$str .= '售价(人民币)';
					echo $str;
					$money = (float)substr($_SESSION['back']['product_to_CSV_post']['money'] , 1);
					$is_offer = substr($_SESSION['back']['product_to_CSV_post']['money'] , 0 , 1);
					
					foreach ($down as $doV)
					{
						$str = "\r\n";
						foreach ($_SESSION['back']['product_to_CSV_post']['attribute'] as $val)
						{
							switch ($val)
							{
								case 'agio':
									if ($is_offer == 'Y' && $doV['is_promotion']=='Y' && $doV['promotion_start']<=mktime() && $doV['promotion_stop']>=mktime())
										$str .= sprintf('%.2f',$doV['agio']+$doV['baseAgio']+$doV['promotion_dot']).'%';
									else
										$str .= sprintf('%.2f',$doV['agio']+$doV['baseAgio']+$money).'%';
								break;
								case 'is_promotion':
									if ($doV['is_promotion']=='Y' && $doV['promotion_start']<=mktime() && $doV['promotion_stop']>=mktime())
										$str .= '促销';
									else
										$str .= '';
								break;
								default:$str .= $doV[$val];
							}
							$str .=  ',';
						}
						if ($is_offer == 'Y' && $doV['is_promotion']=='Y' && $doV['promotion_start']<=mktime() && $doV['promotion_stop']>=mktime())
							$str .= sprintf('%.2f' , $doV['INTbid'] * $doV['weight'] * (100 + $doV['agio'] + $doV['baseAgio'] + $doV['promotion_dot']) / 100);
						else
							$str .= sprintf('%.2f' , $doV['INTbid'] * $doV['weight'] * (100 + $doV['agio'] + $doV['baseAgio'] + $money) / 100);
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
		
		//得到代理组
		private function get_proxy_group()
		{
			if (($proxy_group = $this->db->select_to_2Array("select id,name,rebate,is_offer from proxy_group order by taxis desc")) != false)
			{
				$this->sma->assign('proxy_group' , $proxy_group);
				return $proxy_group;
			}
		}
		
		/**
		 * 产品列表
		 */
		private function cart_list()
		{
			$id = "('" . join("','" , $_SESSION['back']['product_to_CSV']) . "')";
			
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
				'previousNO' => array('value'=>'previousNO' , 'name'=>'货物原编号' , 'checked'=>false),
				'status' => array('value'=>'status' , 'name'=>'产品状态' , 'checked'=>false),
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
				'proSource' => array('value'=>'proSource' , 'name'=>'产品来源' , 'checked'=>false),
				'stockAddress' => array('value'=>'stockAddress' , 'name'=>'库存地点' , 'checked'=>false),
				'is_promotion' => array('value'=>'is_promotion' , 'name'=>'是否促销' , 'checked'=>false),
				'promotion_start' => array('value'=>'promotion_start' , 'name'=>'促销开始日期' , 'checked'=>false),
				'promotion_stop' => array('value'=>'promotion_stop' , 'name'=>'促销结束日期' , 'checked'=>false),
				'promotion_dot' => array('value'=>'promotion_dot' , 'name'=>'促销价' , 'checked'=>false),
				'country' => array('value'=>'country' , 'name'=>'国家' , 'checked'=>false),
				'infml' => array('value'=>'infml' , 'name'=>'进货价' , 'checked'=>false),
				'INTbid' => array('value'=>'INTbid' , 'name'=>'国际报价' , 'checked'=>false),
				'agio' => array('value'=>'agio' , 'name'=>'退点' , 'checked'=>true),
				'time' => array('value'=>'time' , 'name'=>'产品添加日期' , 'checked'=>false),
				'edit_time' => array('value'=>'edit_time' , 'name'=>'最后修改日期' , 'checked'=>false)
			);
			$this->sma->assign('attribute' , $this->attribute);
		}
		
	}
?>