<?php
class get_ip extends start
	{
		public function __construct()
		{
			parent::__construct(true);
			echo '你现在的IP地址是:' , $this->fun->getIP();
			exit;
		}
	}
?>