<?php
//文章内容分页
if (!class_exists('coutentPage'))
{
	//require_once 'db.php';
	class coutentPage extends db
	{
		/*
		 * --------------- public --------------------
		 * 
		 * $SQL			= 执行的SQL语句
		 * $Indicators	= 分页标示符
		 * $TextName	= 分页的字段名称
		 * $NowArtPage	= 当前内容的分页
		 * 
		 * --------------- private -------------------
		 * 
		 * $DataTemp	= 原始内容分段数组
		 * $NewDataTemp	= 新内容分段数组
		 * $PageTemp	= 分页数组
		 * 
		 * --------------- public function -----------
		 * 
		 * getPage()	= 取得分页的数组
		 * getText()	= 取得当前页的分段内容
		 * 
		 * --------------- private function ----------
		 * 
		 * getData()	= 取得数据
		 * outblank()	= 去除字段中的空白,或者数组中的空白
		 * 
		 */
	
		public $SQL,$Indicators,$TextName,$NowArtPage;
		private $DataTemp,$NewDataTemp,$PageTemp;
		
		public function __construct()
		{
			parent::__construct();
			$this->NowArtPage = 1;
			$this->DataTemp = false;
			$this->NewDataTemp = array();
			$this->PageTemp = array();
			$this->Indicators = '<div style="page-break-after: always; "><span style="DISPLAY:none">&nbsp;</span></div>';
			$this->TextName = 'text';
		}
		
		
		/**
		 * 取得分页的数组
		 * $this->PageTemp 数组结构
		 * $this->PageTemp['count']		= 总页数
		 * $this->PageTemp['NowPage']	= 当前页
		 * $this->PageTemp['up10']		= 前10页
		 * $this->PageTemp['down10']	= 后10页
		 * $this->PageTemp['up']		= 前页
		 * $this->PageTemp['down']		= 后页
		 * $this->PageTemp['PageCode']	= N-X页码循环
		 * 
		 */
		public function getPage($return = true)
		{
			if (!is_array($this->NewDataTemp) or count($this->NewDataTemp) < 1) $this->getData();
			if (!is_array($this->PageTemp) or count($this->PageTemp) < 1)
			{
				//总页数
				$count = count($this->NewDataTemp);
				$this->PageTemp['count'] = $count;
				
				//当前页
				$NowPage = ($this->NowArtPage > $count) ? $count : $this->NowArtPage;
				$NowPage = ($NowPage < 1) ? 1 : $NowPage;
				$this->PageTemp['NowPage'] = $NowPage;
				
				//前10页
				$up10 = floor($NowPage*0.99/10)*10;
				$up10 = ($up10 < 1) ? 1 : $up10;
				$start = ($up10 < 10) ? 1 : $up10+1;
				$this->PageTemp['up10'] = $up10;
				
				//后10页
				$tempINT = ($up10 < 10) ? 10 : 11;
				$down10 = (($up10 + $tempINT) > $count) ? $count : $up10 + $tempINT ;
				$stop = ($down10 >= $count) ? $count : $down10-1;
				$this->PageTemp['down10'] = $down10;
				
				$this->PageTemp['up'] = (($NowPage-1) < 1) ? 1 : $NowPage-1;
				$this->PageTemp['down'] = (($NowPage+1) > $count) ? $count : $NowPage+1;
				
				for($i = $start ; $i <= $stop ;$i++)
					$this->PageTemp['PageCode'][] = $i;
				
				unset($count,$NowPage,$up10,$start,$tempINT,$down10,$stop);
			}
			return $this->PageTemp;
		}
		
		/**
		 * 取得当前页的分段内容
		 */
		public function getText()
		{
			if (!is_array($this->NewDataTemp) or count($this->NewDataTemp) < 1) $this->getData();
			if (!is_array($this->PageTemp) or count($this->PageTemp) < 1) $this->getPage();
	
			if (is_array($this->NewDataTemp) && count($this->NewDataTemp) > 1)
				return $this->NewDataTemp[($this->PageTemp['NowPage']-1)];
			else
				//print_r($this->NewDataTemp);
				return $this->NewDataTemp;
		}
		
		/**
		 * 去除字段中的空白,或者数组中的空白
		 */
		private function outblank($str = null)
		{
			if (is_array($str))
			{
				foreach ($str as $value)
				{
					$VE = strip_tags($value,'<img>');
					$VE = str_replace(array(' ','&nbsp;',chr(0),chr(8),chr(9),chr(10),chr(11),chr(12),chr(13),chr(28),chr(29),chr(30),chr(31),chr(32),chr(127)),'',$VE);
					if ($VE != '' and count($VE) > 0)
						array_push($this->NewDataTemp,$value);
				}
			}else{
				$str = strip_tags($str,'<img>');
				$str = str_replace(array(' ','&nbsp;',chr(0),chr(8),chr(9),chr(10),chr(11),chr(12),chr(13),chr(28),chr(29),chr(30),chr(31),chr(32),chr(127)),'',$str);
				array_push($this->NewDataTemp,$str);
			}
			unset($this->DataTemp);
		}
		
		/**
		 * 初始化取得数据
		 */
		private function getData()
		{
			global $fun;
			if (($Q = $this->select($this->SQL)) != false)
			{
				$TextName = $fun->Revert($Q[0][$this->TextName]);
				
				$this->DataTemp = (strstr($TextName,$this->Indicators) === false) ? $TextName : explode($this->Indicators,$TextName);
				if (is_array($this->DataTemp) && count($this->DataTemp) > 1)
					$this->outblank($this->DataTemp);
				else
					$this->NewDataTemp = $this->DataTemp;
			}else{
				return null;
			}
		}
	
	}
}
?>