<?php

	class home extends start
	{
		public function __construct()
		{
			parent::__construct(true);
		}
		
		public function show()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			$this->sma->display($this->get['open']);
		}
	}
?>