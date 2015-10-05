<?php
	class SP extends start
	{
		private static $shape , $status , $proSource;
		
		public function __construct()
		{
			parent::__construct(true);
		}
		
		public function show()
		{
			//if (!$this->QX[$this->get['open']][$this->get['action']]) $this->fun->Msg('你没有此权限');
			if (is_numeric($this->get['weight']))
			{
				$this->default_value();
				
				$start = (float)$this->get['weight'] / 10;
				$stop = $start + 0.09;
				
				switch($this->get['weight'])
				{
					case '03':$weight = "and weight<={$stop}";break;
					case '010':$weight = "and weight>={$start}";break;
					default:$weight = "and weight>={$start} and weight<={$stop}";
				}
				
				$this->get['px'] = ($this->get['px']) ? $this->get['px'] : 'agio';
				$this->get['orders'] = ($this->get['orders']) ? $this->get['orders'] : 'asc';
				$ORDER = $this->get['px'] . ' ' . $this->get['orders'];
				
				$this->sma->assign('get' , $this->get);
				
				$promotion_dot = ($_SESSION['proxy']['is_offer'] == 'Y') ? 'promotion_dot' : $_SESSION['proxy']['rebate'];
				require_once(BASEPATH . '../Class/page.php');
				$list = new page;
				$list->db = $this->db;
				$list->pageNS = 50;
				$list->NowPage = (empty($this->get['page']) | $this->get['page'] < 1 | !is_numeric($this->get['page'])) ? 1 : $this->get['page'];
				$list->SQL = "select id,ProID,shape,weight,color,clarity,cut,buffing,symmetry,Fent_Isity,scalar_value,diploma,diplomaNO,INTbid,(agio+baseAgio+{$promotion_dot}) as agio from product where  status='up' {$weight} and amount>0 and is_promotion='Y' and promotion_start<=UNIX_TIMESTAMP() and promotion_stop>=UNIX_TIMESTAMP() order by {$ORDER}";
				
				//$list->SQL = "select id,ProID,shape,weight,color,clarity,cut,buffing,symmetry,Fent_Isity,scalar_value,diploma,diplomaNO,INTbid,(agio+baseAgio+{$promotion_dot}) as agio from product where  status='up' {$weight} and amount>0 and proSource='self' order by {$ORDER}";

				$this->sma->assign('list_page',$list->getPage(true));
				$this->sma->assign('list_text',$list->getText());
			}
			else
			{
				$this->default_value();
				
				//$start = (float)$this->get['weight'] / 10;
				//$stop = $start + 0.09;
				
				//switch($this->get['weight'])
				//{
				//	case '03':$weight = "and weight<={$stop}";break;
				//	case '010':$weight = "and weight>={$start}";break;
				//	default:$weight = "and weight>={$start} and weight<={$stop}";
				//}
				
				$weight = "and weight>=0.3";

				$this->get['px'] = ($this->get['px']) ? $this->get['px'] : 'agio';
				$this->get['orders'] = ($this->get['orders']) ? $this->get['orders'] : 'asc';
				$ORDER = $this->get['px'] . ' ' . $this->get['orders'];
				
				$this->sma->assign('get' , $this->get);
				
				$promotion_dot = ($_SESSION['proxy']['is_offer'] == 'Y') ? 'promotion_dot' : $_SESSION['proxy']['rebate'];
				require_once(BASEPATH . '../Class/page.php');
				$list = new page;
				$list->db = $this->db;
				$list->pageNS = 50;
				$list->NowPage = (empty($this->get['page']) | $this->get['page'] < 1 | !is_numeric($this->get['page'])) ? 1 : $this->get['page'];
				$list->SQL = "select id,ProID,shape,weight,color,clarity,cut,buffing,symmetry,Fent_Isity,scalar_value,diploma,diplomaNO,INTbid,(agio+baseAgio+{$promotion_dot}) as agio from product where  status='up' {$weight} and amount>0 and is_promotion='Y' and promotion_start<=UNIX_TIMESTAMP() and promotion_stop>=UNIX_TIMESTAMP() order by {$ORDER}";
				
				//$list->SQL = "select id,ProID,shape,weight,color,clarity,cut,buffing,symmetry,Fent_Isity,scalar_value,diploma,diplomaNO,INTbid,(agio+baseAgio+{$promotion_dot}) as agio from product where  status='up' {$weight} and amount>0 and proSource='self' order by {$ORDER}";

				$this->sma->assign('list_page',$list->getPage(true));
				$this->sma->assign('list_text',$list->getText());
			}
			
			$this->sma->display('SP');
		}
		
		public function detail()
		{
			//if (!$this->QX[$this->get['open']][$this->get['action']]){echo '<div style="text-align:center; padding:3em">你没有此权限</div>';exit;}
			if ($this->get['id'])
			{
				if (($json = $this->db->select_to_1Array("select * from product where status='up' and id='{$this->get['id']}'")) != false)
				{
					$this->default_value();
					$this->sma->assign('get',$this->get);
					$this->sma->assign('show' , $json);
					echo $this->sma->fetch('product_detail.html');
				}
			}
		}
		
		private function default_value()
		{
			//形状
			self::$shape = array('round'=>'圆形','princess'=>'公主方','heart'=>'心形','pear'=>'梨形','emerald'=>'祖母绿','marquise'=>'马眼形','cushion'=>'垫形','oval'=>'椭圆形','radiant'=>'明亮形');
			$this->sma->assign('shape' , self::$shape);
			
			//状态
			self::$status = array('cancle'=>'无效','sold'=>'已销售','down'=>'下架','up'=>'上架');
			$this->sma->assign('status' , self::$status);
			
			//产品来源
			self::$proSource = array('speculation'=>'炒货','self'=>'自家店铺','comate'=>'代理商');
			$this->sma->assign('proSource' , self::$proSource);
		}
	}
?>