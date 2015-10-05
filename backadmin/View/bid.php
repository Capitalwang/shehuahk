<?php
	class bid extends start
	{
		public function __construct()
		{
			parent::__construct(true);
		}
		
		public function show()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			
			$ORDER = array('Wt_UP'=>'weight_start asc' , 'Wt_Dn'=>'weight_start desc' , 'Cy_UP'=>'clarity asc' , 'Cy_Dn'=>'clarity desc' , 'Cr_UP'=>'color asc' , 'Cr_Dn'=>'color desc' , 'Pe_UP'=>'price asc' , 'Pe_Dn'=>'price desc');
			$this->get['ORDER'] = $ors = ($this->get['ORDER']) ? $this->get['ORDER'] : 'Wt_Dn';
			$this->sma->assign('get' , $this->get);
			
			require_once(BASEPATH . '../Class/page.php');
			
			$list = new page;
			$list->db = $this->db;
			$list->pageNS = (is_numeric($this->get['PNS'])) ? $this->get['PNS'] : 14;
			$list->NowPage = (empty($this->get['page']) | $this->get['page'] < 1 | !is_numeric($this->get['page'])) ? 1 : $this->get['page'];
			$list->SQL = "select * from bid order by {$ORDER[$ors]}";
			
			$this->sma->assign('list_page',$list->getPage());
			$this->sma->assign('list_text',$list->getText());
			
			$this->sma->display($this->get['open']);
		}
		
		public function import()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			
			if ($this->get['go'] == 'append')
			{
				$File = $this->fun->UpFILE('../upload/bid/','import', date('Y-m-d') ,5242880,array('csv'));
				if (!$File['path']) $this->fun->Msg('请选择国际报价的CSV文件');
				
				$this->db->query('TRUNCATE bid');
				$handle = fopen('../' . $File['path'] , 'rb');
				while ($csv = fgetcsv($handle))
				{
					$array = array();
					$array['weight_start'] = sprintf('%.2f' , $csv[2]);
					$array['weight_stop'] = sprintf('%.2f' , $csv[3]);
					$array['weight_stop'] = ($array['weight_stop'] == 5.99) ? 9.99 : $array['weight_stop'];
					$array['color'] = $csv[1];
					$array['clarity'] = $csv[0];
					$array['price'] = sprintf('%.2f' , $csv[4]);
					
					$this->db->insert('bid' , $array);
				}
				fclose($handle);
				
				$this->fun->local('./?open=' . $this->get['open']);
			}else{
				$this->sma->display($this->get['open'] . '_import');
			}
		}
		
		public function edit()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			
			if ($this->get['go'] == 'append')
			{
				$post = $this->fun->pars_all('post' , true);
				if (!$post['price']) $this->fun->Msg('价格为必填信息');
				
				$array['price'] = $post['price'];
				$this->db->update('bid' , $array , "id='{$this->get['id']}'");
				
				$this->fun->local('./?open=' . $this->get['open']);
				
			}else{
				if (($edit = $this->db->select_to_1Array("select * from bid where id='{$this->get['id']}'")) != false)
					$this->sma->assign('edit' , $edit);
				
				$this->sma->display($this->get['open'] . '_append');
			}
		}
	}
?>