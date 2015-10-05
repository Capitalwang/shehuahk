<?php
	class home extends Origin
	{
		public function __construct()
		{
			parent::__construct(true , true , true);
		}
		
		public function index()
		{
			echo '这不是一个正确的请求';
		}
	}
?>