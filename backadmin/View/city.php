<?php
	class city extends start
	{
		private $city_list;
		
		public function __construct()
		{
			parent::__construct(true);
			$this->city_list = $this->db->select_to_2Array("select id,name from city where UPID='0' order by ranking desc");
			$this->sma->assign('city_list' , $this->city_list);
		}
		
		public function show()
		{
			$ORDER = array('UPID_UP'=>'c.UPID asc' , 'UPID_Dn'=>'c.UPID desc' , 'rank_UP'=>'c.ranking asc' , 'rank_Dn'=>'c.ranking desc');
			$this->get['ORDER'] = $ors = ($this->get['ORDER']) ? $this->get['ORDER'] : 'UPID_Dn';
			$this->sma->assign('get' , $this->get);
			
			require_once(BASEPATH . '../Class/page.php');
			
			$list = new page;
			$list->db = $this->db;
			$list->pageNS = (is_numeric($this->get['PNS'])) ? $this->get['PNS'] : 14;
			$list->NowPage = (empty($this->get['page']) | $this->get['page'] < 1 | !is_numeric($this->get['page'])) ? 1 : $this->get['page'];
			$list->SQL = "select c.*,p.name as Pname from city as c left join city as p on p.id=c.UPID order by {$ORDER[$ors]}";
			
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
			
			$this->db->del('city' , 'id in ' . $id);
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
				if (($edit = $this->db->select_to_1Array("select * from city where id='{$this->get['id']}'")) != false)
					$this->sma->assign('edit' , $edit);
				
				$this->sma->display($this->get['open'] . '_append');
			}
		}
		
		public function json()
		{
			if ($this->get['go'] == 'make')
			{
				if (($json = $this->db->select_to_2Array("select c.name,p.name as UPname from city as c left join city as p on p.id=c.UPID order by c.UPID desc")) != false)
				{
					file_put_contents('../json/city.txt' , $this->fun->php_json_encode($json));
				}
			}
			$this->sma->display($this->get['open'] . '_json');
		}
		
		/**
		 * @param $url	操作完成跳转的页面
		 * @param $id	编辑状态的ID
		 */
		private function append($url , $id = false)
		{
			$post = $this->fun->pars_all('post' , true);
			if (!$post['name']) $this->fun->Msg('城市名称为必填信息');
			
			$array = array();
			$array['name'] = $post['name'];
			$array['UPID'] = $post['UPID'];
			$array['ranking'] = (int)$post['ranking'];
			$array['time'] = mktime();
			
			if ($id)
			{
				$this->db->update('city' , $array , "id='{$id}'");
			}else{
				$array['id'] = $this->fun->rand_string(12);
				$this->db->insert('city' , $array);
			}
			
			$this->fun->local($url);
		}
	}
?>