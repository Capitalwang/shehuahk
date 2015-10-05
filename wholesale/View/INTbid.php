<?php
	class INTbid extends start
	{
		private static $color , $clarity;
		
		public function __construct()
		{
			parent::__construct(true);
		}
		
		public function show()
		{
			$this->default_value();
			$this->sma->display($this->get['open']);
		}
		
		public function get_price()
		{
			if (($bid = $this->db->select_to_1Array("select price from bid where color='{$this->get['color']}' and clarity='{$this->get['clarity']}' and weight_start<='{$this->get['weight']}' and weight_stop>='{$this->get['weight']}'")) != false)
			{
				echo $bid['price'];
			}else{
				echo '0';
			}
			exit;
		}
		
		private function default_value()
		{
			//颜色
			self::$color = array('D','E','F','G','H','I','J','K','L','M','N');
			$this->sma->assign('color' , self::$color);
			
			//净度
			self::$clarity = array('IF','VVS1','VVS2','VS1','VS2','SI1','SI2','SI3','I1','I2','I3');
			$this->sma->assign('clarity' , self::$clarity);
		}
	}
?>