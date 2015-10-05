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
			if (!$post['Username']) $this->fun->Msg('请填写的账号');
			if (!$post['Password']) $this->fun->Msg('请填写的密码');
			//if ($post['code'] != $_SESSION['randcode']) $this->fun->Msg('你输入的验证码不正确');
			
			if (($administrators = $this->db->select_to_1Array("select * from administrators where account='{$post['Username']}' and password='".md5($post['Password'])."'")) != false)
			{
				$role = unserialize($administrators['role']);
				if (!$role) $this->fun->Msg('此账号没有登录的权限');
				
				$role = "('" . join("','" , $role) . "')";
				
				if (($Login = $this->db->select_to_1Array("select id from purview where host='back' and open='login' and action='login'")) == false)
					$this->fun->Msg('目前没有登录权限');
					
				if (($purview = $this->db->select_N_to_1key("select purview from role where is_work='Y' and id in {$role}" , 'purview')) != false)
				{
					$role = array();
					foreach ($purview as $val) $role = array_merge($role , unserialize($val));
					$role = array_unique($role);
					
					if (in_array($Login['id'] , $role))
					{
						unset($administrators['password'] , $administrators['role']);
						$_SESSION['back'] = $administrators;
						
						if (($BTP = $this->db->select_to_2Array("select id,open,action from purview where host='back'")) != false)
						{
							//foreach ($BTP as $val) $QS[$val['open']][$val['action']] = (@in_array($val['id'] , $role)) ? 1 : 0;
							foreach ($BTP as $val) if (@in_array($val['id'] , $role)) $QS[$val['open']][$val['action']] = 1;
							unset($BTP);
							$_SESSION['back']['purview'] = $QS;
						}
						
						$this->db->update('administrators' , array('login_time'=>mktime()) , "id='{$administrators['id']}'");
						
						$this->fun->local('?open=home');
					}else{
						$this->fun->Msg('此账号没有登录的权限');
					}
				}
				unset($_SESSION['back']);
				$this->fun->local('./');
			}else{
				unset($_SESSION['back']);
				$this->fun->Msg('你填写的账号或者密码有误');
			}
		}
	}
?>