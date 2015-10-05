<?php
	class login extends start
	{
		public function __construct()
		{
			parent::__construct(true);
		}
		
		public function show()
		{
			$this->sma->display($this->get['open']);
		}
		
		public function login()
		{
			$post = $this->fun->pars_all('post' , true);
			if (!$post['Username']) $this->fun->Msg('请填写你的账号');
			if (!$post['Password']) $this->fun->Msg('请填写你的密码');
			$proxy = $this->db->select_to_1Array("select p.*,g.mag,g.rebate,g.name as `group`,g.is_offer,g.sms_price from proxy as p join proxy_group as g on g.id=p.proxy_group where p.account='{$post['Username']}' and p.password='".md5($post['Password'])."'");
			if ($proxy!= false)
			{
				$role = unserialize($proxy['role']);
				
				
				if (!$role) $this->fun->Msg('此账号没有登录的权限');
				
				$role = "('" . join("','" , $role) . "')";
				//var_dump($role);die;
				if (($Login = $this->db->select_to_1Array("select id from purview where host='proxy' and open='login' and action='login'")) == false)
					$this->fun->Msg('目前没有登录权限');
					
				if (($purview = $this->db->select_N_to_1key("select purview from role where is_work='Y' and id in {$role}" , 'purview')) != false)
				{
					$role = array();
					foreach ($purview as $val) $role = array_merge($role , unserialize($val));
					$role = array_unique($role);
				
					if (in_array($Login['id'] , $role))
					{
						unset($proxy['password'] , $proxy['role'] , $proxy['money']);
						$_SESSION['proxy'] = $proxy;
						
						if (($BTP = $this->db->select_to_2Array("select id,open,action from purview where host='proxy'")) != false)
						{
							foreach ($BTP as $val) $QS[$val['open']][$val['action']] = (@in_array($val['id'] , $role)) ? 1 : 0;
							unset($BTP);
							$_SESSION['proxy']['purview'] = $QS;

						}
						
						$this->db->update('proxy' , array('login_time'=>mktime()) , "id='{$proxy['id']}'");
						
						$this->fun->local('?open=home');
					}else{
						$this->fun->Msg('此账号没有登录的权限');
					}
				}
				unset($_SESSION['proxy']);
				$this->fun->local('./');
			}else{
				unset($_SESSION['proxy']);
				$this->fun->Msg('你填写的账号或者密码有误');
			}
		}
	}
?>