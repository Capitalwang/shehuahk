<?php
//验证码
class Quit extends start
{
	public function __construct()
	{
		parent::__construct(true);
	}
	
	public function show()
	{
		unset($_SESSION['back']);
		$this->fun->local('./');
	}
}

?>