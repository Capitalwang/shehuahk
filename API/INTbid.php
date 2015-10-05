<?php
	class INTbid extends start
	{
		public function __construct()
		{
			parent::__construct(true);
		}
		
		public function show()
		{
			$user = $this->get_user();
			
			if ($this->db->update('api_log' , array('amount' => '+++1') , "api_key='{$this->get['key']}' and type='INTbid' and year=EXTRACT(YEAR FROM CURDATE()) and month=EXTRACT(MONTH FROM CURDATE())") == false)
				$this->db->insert('api_log' , array('api_key'=>$this->get['key'],'type'=>'INTbid','year'=>date('Y'),'month'=>date('m'),'amount'=>1));
			
			$weight = (is_numeric($this->get['weight']) && $this->get['weight'] > 0) ? sprintf('%.2f' , $this->get['weight']) : $this->{make_ . $this->get['R']}(array('error' => array('code' => 10 , 'info' => '重量错误')));
			$color = (in_array($this->get['color'] , array('N','M','L','K','J','I','H','G','F','E','D'))) ? $this->get['color'] : $this->{make_ . $this->get['R']}(array('error' => array('code' => 20 , 'info' => '颜色错误')));
			$clarity = (in_array($this->get['clarity'] , array('IF','VVS1','VVS2','VS1','VS2','SI1','SI2','SI3','I1','I2','I3'))) ? $this->get['clarity'] : $this->{make_ . $this->get['R']}(array('error' => array('code' => 30 , 'info' => '净度错误')));
			$exchange = (is_numeric($this->get['exchange']) && $this->get['exchange'] > 0) ? (float)$this->get['exchange'] : 1;
			$is_100 = ($this->get['is_100'] == 'no') ? 'no' : 'yes';
			
			$SQL = "select price from bid where weight_start<={$weight} and weight_stop>={$weight} and color='{$color}' and clarity='{$clarity}'";
			
			if (($DATA = $this->db->select_to_1Array($SQL)) != false)
			{
				$DATA['weight'] = $weight;
				$DATA['color'] = $color;
				$DATA['clarity'] = $clarity;
				if ($is_100 == 'yes')
					$DATA['price'] = sprintf('%.2f' , $DATA['price'] * $exchange);
				else
					$DATA['price'] = sprintf('%.2f' , $DATA['price'] * $exchange / 100);
				
				$DATA['exchange'] = $exchange;
				$DATA['is_100'] = $is_100;
				
				$doss = array(
					'info' => array(
						'source' => '广利珠宝网',
						'home_page' => 'www.GLDHK.com',
						'author' => 'simon',
						'time' => date('Y-m-d H:i:s')
					),
					'detail' => $DATA
				);
				$this->{make_ . $this->get['R']}($doss);
			}else{
				$this->{make_ . $this->get['R']}(array('error' => array('code' => 0 , 'info' => '不存在的数据')));
			}
		}
		
		private function get_user()
		{
			if (($user = $this->db->select_to_1Array("select INTbid_ip from api_user where `key`='{$this->get['key']}'")) != false)
			{
				$user['INTbid_ip'] = unserialize($user['INTbid_ip']);
				if (in_array($this->fun->getIP() , $user['INTbid_ip']))
					return $user;
				else
					$this->{make_ . $this->get['R']}(array('error' => array('code' => -4 , 'info' => 'IP地址错误')));
			}else
				$this->{make_ . $this->get['R']}(array('error' => array('code' => -3 , 'info' => '用户key错误')));
		}
	}
?>