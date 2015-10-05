<?php
	class news extends start
	{
		public function __construct()
		{
			parent::__construct(true);
		}
		
		public function show()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			
			$ORDER = array('time_UP'=>'time asc' , 'time_Dn'=>'time desc' , 'name_UP'=>'title asc' , 'name_Dn'=>'title desc');
			$this->get['ORDER'] = $ors = ($this->get['ORDER']) ? $this->get['ORDER'] : 'time_Dn';
			$this->sma->assign('get' , $this->get);
			
			require_once(BASEPATH . '../Class/page.php');
			$list = new page;
			$list->db = $this->db;
			$list->pageNS = (is_numeric($this->get['PNS'])) ? $this->get['PNS'] : 14;
			$list->NowPage = (empty($this->get['page']) | $this->get['page'] < 1 | !is_numeric($this->get['page'])) ? 1 : $this->get['page'];
			$list->SQL = "select id,title,taxis,uptime,is_view from news order by {$ORDER[$ors]}";
			
			$this->sma->assign('list_page',$list->getPage());
			$this->sma->assign('list_text',$list->getText());
			
			$this->sma->display($this->get['open']);
		}
		
		public function add()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			
			if ($this->get['go'] == 'append')
			{
				$this->append('./?open=' . $this->get['open']);
			}else{
				$this->_editor('content');
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
				if (($edit = $this->db->select_to_1Array("select * from news where id='{$this->get['id']}'")) != false)
				{
					$this->_editor('content' , $edit['content']);
					$this->sma->assign('edit' , $edit);
				}
				
				$this->sma->display($this->get['open'] . '_append');
			}
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
			
			$this->db->del('news','id in ' . $id);
			$this->fun->local("./?open={$this->get['open']}&PNS={$this->get['PNS']}");
		}
				
		/**
		 * @param $url	操作完成跳转的页面
		 * @param $id	编辑状态的ID
		 */
		private function append($url , $id = false)
		{
			$post = $this->fun->pars_all('post',true);
			if (!$post['title']) $this->fun->Msg('请填写新闻名称');
			if (!$post['is_view']) $this->fun->Msg('请选择状态');
			
			$arr = array();
			$arr['title'] = $post['title'];
			$arr['bewrite'] = nl2br($post['bewrite']);
			$arr['key_word'] = $post['key_word'];
			$arr['derivation_name'] = $post['derivation_name'];
			$arr['derivation_url'] = $post['derivation_url'];
			$arr['content'] = $post['content'];
			
			$arr['taxis'] = (int)$post['taxis'];
			$arr['is_view'] = ($post['is_view'] == 'Y') ? 'Y' : 'N';
			$arr['time'] = mktime();
			$arr['uptime'] = mktime();
			
			if ($id)
			{
				$this->db->update('news' , $arr , "id='{$id}'");
			}else{
				$arr['id'] = $this->fun->rand_string(16);
				$this->db->insert('news' , $arr);
			}
			
			$this->fun->local($url);
		}
	}
?>