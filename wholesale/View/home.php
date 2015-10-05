<?php
	class home extends start
	{
		public function __construct()
		{
			parent::__construct(true);
		}
		
		public function show()
		{
			if (!$this->QX[$this->get['open']][$this->get['action']]) $this->fun->Msg('你没有此权限');
			
			$this->get_SP();
			$this->get_news();
			$this->sma->display($this->get['open']);
		}
		
		private function get_SP($N = 21)
		{
			$promotion_dot = ($_SESSION['proxy']['is_offer'] == 'Y') ? 'promotion_dot' : $_SESSION['proxy']['rebate'];
			if (($sp = $this->db->select_to_2Array("select ProID,weight,color,clarity,cut,buffing,symmetry,INTbid,(agio+baseAgio+{$promotion_dot}) as agio from product where status='up' and amount>0 and is_promotion='Y' and promotion_start<=UNIX_TIMESTAMP() and promotion_stop>=UNIX_TIMESTAMP() order by agio asc limit 0,{$N}")) != false)
				$this->sma->assign('special_price' , $sp);
		}
		
		private function get_news($N = 3)
		{
			if (($sp = $this->db->select_to_2Array("select id,title,bewrite from news where is_view='Y' order by time desc limit 0,{$N}")) != false)
				$this->sma->assign('NEWS' , $sp);
		}
	}
?>