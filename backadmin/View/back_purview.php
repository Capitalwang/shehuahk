<?php
	class back_purview extends start
	{
		public function __construct()
		{
			parent::__construct(true);
		}
		
		public function show()
		{
			$ORDER = array('time_UP'=>'time asc' , 'time_Dn'=>'time desc' , 'open_UP'=>'open asc' , 'open_Dn'=>'open desc');
			$this->get['ORDER'] = $ors = ($this->get['ORDER']) ? $this->get['ORDER'] : 'open_Dn';
			$this->sma->assign('get' , $this->get);
			
			require_once(BASEPATH . '../Class/page.php');
			
			$list = new page;
			$list->db = $this->db;
			$list->pageNS = (is_numeric($this->get['PNS'])) ? $this->get['PNS'] : 14;
			$list->NowPage = (empty($this->get['page']) | $this->get['page'] < 1 | !is_numeric($this->get['page'])) ? 1 : $this->get['page'];
			$list->SQL = "select * from purview where host='back' order by {$ORDER[$ors]}";
			
			$this->sma->assign('list_page',$list->getPage());
			$this->sma->assign('list_text',$list->getText());
			
			$this->sma->display($this->get['open']);
		}
		
		public function del()
		{
			if ($_POST['id'])
			{
				$post = $this->fun->pars_all('post' , true);
				$id = "('" . join("','" , $post['id']) . "')";
			}else{
				$id = "('" . $this->get['id'] . "')";
			}
			
			$this->db->del('purview' , 'id in ' . $id);
			$this->fun->local('./?open=' . $this->get['open']);
		}
		
		public function add()
		{
			if ($this->get['go'] == 'append')
			{
				$this->append('./?open=' . $this->get['open']);
			}else{
				$this->sma->display($this->get['open'] . '_append');
			}
		}
		
		public function edit()
		{
			if ($this->get['go'] == 'append')
			{
				$this->append('./?open=' . $this->get['open'] , $this->get['id']);
			}else{
				if (($edit = $this->db->select_to_1Array("select * from purview where id='{$this->get['id']}'")) != false)
					$this->sma->assign('edit' , $edit);
				
				$this->sma->display($this->get['open'] . '_append');
			}
		}
		
		/**
		 * @param $url	操作完成跳转的页面
		 * @param $id	编辑状态的ID
		 */
		private function append($url , $id = false)
		{
			$post = $this->fun->pars_all('post' , true);
			if (!$post['open']) $this->fun->Msg('Open参数为必填信息');
			if (!$post['open_show']) $this->fun->Msg('Open参数说明为必填信息');
			
			if (!$post['action']) $this->fun->Msg('Action参数为必填信息');
			if (!$post['action_show']) $this->fun->Msg('动作说明为必填信息');
			
			$array = array();
			$array['open'] = $post['open'];
			$array['host'] = 'back';
			$array['open_show'] = $post['open_show'];
			$array['action'] = $post['action'];
			$array['action_show'] = $post['action_show'];
			$array['show'] = nl2br($post['show']);
			$array['is_del'] = ($post['is_del'] == 'Y') ? 'Y' : 'N';
			$array['time'] = mktime();
			
			if ($id)
			{
				$this->db->update('purview' , $array , "id='{$id}'");
			}else{
				$array['id'] = $this->fun->rand_string(12);
				$this->db->insert('purview' , $array);
			}
			
			$this->fun->local($url);
		}
	}
?>