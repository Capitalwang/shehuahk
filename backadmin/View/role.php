<?php
	class role extends start
	{
		public function __construct()
		{
			parent::__construct(true);
		}
		
		public function show()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			
			$ORDER = array('time_UP'=>'time asc' , 'time_Dn'=>'time desc' , 'role_UP'=>'name asc' , 'role_Dn'=>'name desc');
			$this->get['ORDER'] = $ors = ($this->get['ORDER']) ? $this->get['ORDER'] : 'role_Dn';
			$this->sma->assign('get' , $this->get);
			
			require_once(BASEPATH . '../Class/page.php');
			
			$list = new page;
			$list->db = $this->db;
			$list->pageNS = (is_numeric($this->get['PNS'])) ? $this->get['PNS'] : 14;
			$list->NowPage = (empty($this->get['page']) | $this->get['page'] < 1 | !is_numeric($this->get['page'])) ? 1 : $this->get['page'];
			$list->SQL = "select * from role order by {$ORDER[$ors]}";
			
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
			
			$this->db->del('role' , 'id in ' . $id);
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
				if (($edit = $this->db->select_to_1Array("select * from role where id='{$this->get['id']}'")) != false)
					$this->sma->assign('edit' , $edit);
				
				$this->sma->display($this->get['open'] . '_append');
			}
		}
		
		public function purview()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			
			if ($this->get['go'] == 'append')
			{
				$this->set_purview('./?open=' . $this->get['open'] , $this->get['id']);
			}else{
				if (($edit = $this->db->select_to_1Array("select * from role where id='{$this->get['id']}'")) != false)
					$this->sma->assign('edit' , $edit);
				
				if (($purview = $this->db->select_to_2Array("select id,open,open_show,action,action_show,host from purview order by open asc,action desc")) != false)
				{
					$length = count($purview);
					for ($i = 0 ; $i < $length ; $i++)
					{
						$purview[$purview[$i]['host']][$purview[$i]['open']]['open'] = $purview[$i]['open'];
						$purview[$purview[$i]['host']][$purview[$i]['open']]['open_show'] = $purview[$i]['open_show'];
						$purview[$purview[$i]['host']][$purview[$i]['open']]['action'][] = $purview[$i];
						unset($purview[$i]);
					}
					
					//print_r($purview);
					$this->sma->assign('purview' , $purview);
				}
					
				$this->sma->display($this->get['open'] . '_purview');
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
			if (!$post['name']) $this->fun->Msg('角色名为必填信息');
			
			$array = array();
			$array['name'] = $post['name'];
			$array['show'] = $post['show'];
			$array['is_work'] = ($post['is_work'] == 'Y') ? 'Y' : 'N';
			$array['remark'] = nl2br($post['remark']);
			$array['time'] = mktime();
			
			if ($id)
			{
				$this->db->update('role' , $array , "id='{$id}'");
			}else{
				$array['id'] = $this->fun->rand_string(15);
				$this->db->insert('role' , $array);
			}
			
			$this->fun->local($url);
		}
		
		/**
		 * 角色的权限入库
		 * @param $url	操作完成跳转的页面
		 * @param $id	编辑状态的ID
		 */
		private function set_purview($url , $id = false)
		{
			$post = $this->fun->pars_all('post' , true);
			$post['purview'] = (is_array($post['purview'])) ? $post['purview'] : array();
			$array['purview'] = serialize($post['purview']);
			
			$this->db->update('role' , $array , "id='{$id}'");
			$this->fun->local($url);
		}
		
	}
?>