<?php
	class detail extends start
	{
		private $Domain;
		
		public function __construct()
		{
			parent::__construct(true);
			$this->Domain = 'http://www.GLDHK.com/';
		}
		
		public function show()
		{
			$user = $this->get_user();
			
			if ($this->db->update('api_log' , array('amount' => '+++1') , "api_key='{$this->get['key']}' and type='detail' and year=EXTRACT(YEAR FROM CURDATE()) and month=EXTRACT(MONTH FROM CURDATE())") == false)
				$this->db->insert('api_log' , array('api_key'=>$this->get['key'],'type'=>'detail','year'=>date('Y'),'month'=>date('m'),'amount'=>1));
			
			$SQL = "select INTbid,ProID,amount,shape,weight,color,clarity,cut,buffing as polish,symmetry,Fent_Isity,Fent_color,scalar_value,body_ratio as depth,table_width as `table`,diploma,diplomaNO,diplomaPhoto,agio,baseAgio,is_promotion,promotion_start,promotion_stop,promotion_dot,userRemark as remark from product where status='up' and (ProID='{$this->get['NO']}' or diplomaNO='{$this->get['NO']}')";
			
			if (($DATA = $this->db->select_to_1Array($SQL)) != false)
			{
				$this->make_data(&$DATA , $user);
				//print_r($DATA);
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
				$this->{make_ . $this->get['R']}(array('error' => array('code' => 0 , 'info' => '该产品不存在')));
			}
		}
		
		private function get_user()
		{
			if (($user = $this->db->select_to_1Array("select u.detail_ip,u.dot,g.rebate,g.is_offer from api_user as u join proxy_group as g on g.id=u.proxy_group where u.key='{$this->get['key']}'")) != false)
			{
				$user['detail_ip'] = unserialize($user['detail_ip']);
				if (in_array($this->fun->getIP() , $user['detail_ip']))
				{
					return $user;
				}else{
					$this->{make_ . $this->get['R']}(array('error' => array('code' => -4 , 'info' => 'IP地址错误')));
				}
			}else
				$this->{make_ . $this->get['R']}(array('error' => array('code' => -3 , 'info' => '用户key错误')));
		}
		
		
		private function make_data(&$array , $user)
		{
			$dot = (is_numeric($this->get['dot'])) ? sprintf('%.2f' , $this->get['dot']) : $user['dot'];
			$dot = (is_numeric($dot)) ? $dot : 0;
			
			if ($array['diplomaPhoto']) $array['diplomaPhoto'] = $this->Domain . $array['diplomaPhoto'];
			
			if ($user['is_offer'] == 'Y' && $array['is_promotion']=='Y' && $array['promotion_start']<=mktime() && $array['promotion_stop']>=mktime())
			{
				$array['money'] = sprintf('%.2f' , $array['INTbid'] * $array['weight'] * (100 + $array['agio'] + $array['baseAgio'] + $array['promotion_dot']) / 100);
				$array['price'] = sprintf('%.2f' , $array['INTbid'] * $array['weight'] * (100 + $array['agio'] + $array['baseAgio'] + $array['promotion_dot'] + $dot) / 100);
				$array['agio'] = sprintf('%.2f',$array['agio']+$array['baseAgio']+$array['promotion_dot'] + $dot).'%';
				$array['promotion'] = 'yes';
				$array['promotion_start'] = date('Y-m-d H:i:s' , $array['promotion_start']);
				$array['promotion_stop'] = date('Y-m-d H:i:s' , $array['promotion_stop']);
			}else{
				$array['money'] = sprintf('%.2f' , $array['INTbid'] * $array['weight'] * (100 + $array['agio'] + $array['baseAgio'] + $user['rebate']) / 100);
				$array['price'] = sprintf('%.2f' , $array['INTbid'] * $array['weight'] * (100 + $array['agio'] + $array['baseAgio'] + $user['rebate'] + $dot) / 100);
				$array['agio'] = sprintf('%.2f',$array['agio']+$array['baseAgio']+$user['rebate'] + $dot).'%';
				$array['promotion'] = 'no';
				
				unset($array['promotion_start'] , $array['promotion_stop']);
			}
			unset($array['baseAgio'] , $array['is_promotion'] , $array['promotion_dot']);
		}
	}
?>