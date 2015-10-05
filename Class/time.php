<?php
class time
{
	public $StartTime = 0;
	public $StopTime = 0;

	function get_microtime()
	{
		list($usec, $sec) = explode(' ', microtime());
		return ((float)$usec + (float)$sec);
	}

	function start()
	{
		$this->StartTime = $this->get_microtime();
	}

	function stop()
	{
		$this->StopTime = $this->get_microtime();
	}

	function spent()
	{
		return round(($this->StopTime - $this->StartTime) * 1000, 1);
	}
}
?>