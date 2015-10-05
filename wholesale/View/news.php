<?php
	class news extends start
	{
		public function __construct()
		{
			parent::__construct(true);
		}
		
		public function show()
		{
			//if (!$this->QX[$this->get['open']][$this->get['action']]) $this->fun->Msg('你没有此权限');
			
			require_once(BASEPATH . '../Class/page.php');
			$list = new page;
			$list->db = $this->db;
			$list->pageNS = 5;
			$list->NowPage = (empty($this->get['page']) | $this->get['page'] < 1 | !is_numeric($this->get['page'])) ? 1 : $this->get['page'];
			$list->SQL = "select id,title,uptime,bewrite from news where is_view='Y' order by taxis desc";
			
			$this->sma->assign('list_page',$list->getPage());
			$this->sma->assign('list_text',$list->getText());
			
			$this->sma->display('news_list');
		}
		
		public function view()
		{
			//if (!$this->QX[$this->get['open']][$this->get['action']]) $this->fun->Msg('你没有此权限');
			
			if ($this->get['id'])
			{
				if (($show = $this->db->select_to_1Array("select * from news where id='{$this->get['id']}'")) != false)
					$this->sma->assign('show' , $show);
			}else{
				$this->fun->Msg('你没有此权限');
			}
			
			$this->sma->display('news_view');
		}
		
	}
?>