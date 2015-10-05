<?php
	class exchange extends start
	{
		public function __construct()
		{
			parent::__construct(true);
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			
			if (($show = $this->db->select_to_2Array("select currency,exchange from exchange")))
			{
				foreach ($show as $key => $val) $SHOW[$val['currency']] = $val['exchange'];
				unset($show);
				$this->sma->assign('show' , $SHOW);
			}
		}
		
		public function show()
		{
			$this->sma->display($this->get['open']);
		}
				
		public function edit()
		{
			if ($this->get['go'] == 'append')
			{
				$post = $this->fun->pars_all('post' , true);
				if (!is_numeric($post['USD'])) $this->fun->Msg('美元 -&gt; 人民币 为必填汇率');
				if (!is_numeric($post['HKD'])) $this->fun->Msg('港元 -&gt; 人民币 为必填汇率');
				if (!is_numeric($post['TWD'])) $this->fun->Msg('台币 -&gt; 人民币 为必填汇率');
				
				$array = array();
				$array['USD'] = (float)$post['USD'];
				$array['HKD'] = (float)$post['HKD'];
				$array['TWD'] = (float)$post['TWD'];
				$array['JPY'] = (float)$post['JPY'];
				$array['EUR'] = (float)$post['EUR'];
				$array['GBP'] = (float)$post['GBP'];
				
				foreach ($array as $key => $val)
					$this->db->update('exchange' , array('exchange' => $val , 'time'=>mktime()) , "currency='{$key}'");
				
				$this->fun->local('./?open=exchange');
			}else{
				$this->sma->display($this->get['open'] . '_append');
			}
		}
		
	}
?>