<?php
class award
{
	//执行函数
	public function exec(array $list)
	{
		foreach ($list as $val)
		{
			if (method_exists($this , 'odds_' . $val['code']) && $this->{'odds_' . $val['code']}())
			{
				return $val;
			}
		}
	}
	
	// 100%
	private function odds_100()
	{
		return true;
	}
	
	// 3000/10000
	private function odds_200()
	{
		return rand(1,10000) <= 3000 ? true : false;
	}
	
	// 1990/10000
	private function odds_500()
	{
		return rand(1,10000) <= 1990 ? true : false;
	}
	
	// 8 / 10000
	private function odds_jade()
	{
		$so = array(66 , 666 , 88 , 888 , 8888 , 99 , 999 , 9999);
		$val = rand(1 , 10000);
		return in_array($val , $so);
	}
	
	//	1/10000
	private function odds_pearl()
	{
		$a = rand(1,100);
		$b = rand(1,100);
		return $a == $b ? true : false;
	}
	
	//	1/10000
	private function odds_diamond()
	{
		$a = rand(1,100);
		$b = rand(1,100);
		return $a == $b ? true : false;
	}
}
?>