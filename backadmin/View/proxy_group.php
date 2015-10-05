<?php
	class proxy_group extends start
	{
		private $role , $group , $position;
		
		public function __construct()
		{
			parent::__construct(true);
			$this->role = $this->db->select_to_2Array("select id,name from role where is_work='Y' order by time asc");
			$this->sma->assign('role' , $this->role);
			
			$this->group = $this->db->select_to_2Array("select id,name from proxy_group order by taxis,time asc");
			$this->sma->assign('group' , $this->group);
		}
		
		public function show()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			
			$ORDER = array('time_UP'=>'time asc' , 'time_Dn'=>'time desc' , 'tais_UP'=>'taxis asc' , 'tais_Dn'=>'taxis desc');
			$this->get['ORDER'] = $ors = ($this->get['ORDER']) ? $this->get['ORDER'] : 'time_Dn';
			$this->sma->assign('get' , $this->get);
			
			require_once(BASEPATH . '../Class/page.php');
			
			$list = new page;
			$list->db = $this->db;
			$list->pageNS = (is_numeric($this->get['PNS'])) ? $this->get['PNS'] : 14;
			$list->NowPage = (empty($this->get['page']) | $this->get['page'] < 1 | !is_numeric($this->get['page'])) ? 1 : $this->get['page'];
			$list->SQL = "select id,name,`show`,time,mag,rebate,taxis,is_offer from proxy_group order by {$ORDER[$ors]}";
			
			$this->sma->assign('list_page',$list->getPage());
			$this->sma->assign('list_text',$list->getText());
			
			$this->sma->display($this->get['open']);
		}
		
		public function del()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			
			if ($_POST['id'])
			{
				$post = $this->fun->pars_all('post' , true);
				$id = "('" . join("','" , $post['id']) . "')";
			}else{
				$id = "('" . $this->get['id'] . "')";
			}
			
			$this->db->del('proxy_group' , 'id in ' . $id);
			//$this->db->update('user' , array('proxy_group'=>null) , 'proxy_group in ' . $id);
			
			$this->fun->local('./?open=' . $this->get['open']);
		}
		
		public function add()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			
			if ($this->get['go'] == 'append')
			{
				$this->append('./?open=' . $this->get['open']);
			}else{
				$this->sma->display($this->get['open'] . '_append');
			}
		}
		
		public function edit()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			
			if ($this->get['go'] == 'append')
			{
				$this->append('./?open=' . $this->get['open'] , $this->get['id']);
			}else{
				if (($edit = $this->db->select_to_1Array("select * from proxy_group where id='{$this->get['id']}'")) != false)
					$this->sma->assign('edit' , $edit);
				
				$this->sma->display($this->get['open'] . '_append');
			}
		}
				
		/**
		 * 角色的信息入库
		 * @param $url	操作完成跳转的页面
		 * @param $id	编辑状态的ID
		 */
		private function append($url , $id = false)
		{
			$post = $this->fun->pars_all('post' , true);
			if (!$post['name']) $this->fun->Msg('代理组为必填信息');
			if (!is_numeric($post['mag'])) $this->fun->Msg('倍率为必填信息\n同时退点必须是一个数字');
			if (!is_numeric($post['taxis'])) $this->fun->Msg('排序为必填信息\n同时排序必须是一个整数');
			
			$array = array();
			$array['name'] = $post['name'];
			$array['show'] = $post['show'];
                        $array['mag'] = (float)$post['mag'];
			//$array['rebate'] = (float)$post['rebate'];
			$array['taxis'] = (int)$post['taxis'];
			$array['remark'] = nl2br($post['remark']);
			$array['is_offer'] = ($post['is_offer'] == 'Y') ? 'Y' : 'N';
			$array['time'] = mktime();
			$array['sms_price'] = (float)$post['sms_price'];
			
			if ($id)
			{
				$this->db->update('proxy_group' , $array , "id='{$id}'");
			}else{
				$array['id'] = $this->fun->rand_string(12);
				$this->db->insert('proxy_group' , $array);
			}
			
			$this->fun->local($url);
		}
		
	}
?>