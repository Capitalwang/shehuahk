<?php
class Quit extends start
{
	public function __construct()
	{
		parent::__construct(true);
	}
	
	public function show()
	{
		unset($_SESSION['proxy']);
		$this->fun->local('./');
	}
}

?>