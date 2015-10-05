<?php
if (!class_exists('page'))
{
	/**
	 * 分页类
	 * 需要db类的支持,在使用本类前要先实例化db类
	 * @author 蜃楼寻梦(simon)
	 * @version 2.0
	 * @time 2010-04-09
	 */
	class page
	{
		public $SQL , $NowPage , $pageNS , $echoSQL , $db;
		private $DataTemp , $pageTemp;
		
		public function __construct()
		{
			$this->SQL = null;
			$this->pageNS = 10;
			$this->NowPage = 1;
			$this->pageTemp['count'] = 0;
			$this->echoSQL = false;
		}
	
		/**
		 * 初始化取得数据
		 */
		private function getData()
		{
			if (!$this->SQL) return false;
			if ($this->echoSQL) $this->db->echoErr($this->SQL);
			
			//当前页
			$this->NowPage = (!is_numeric($this->NowPage) | $this->NowPage < 1) ? 1 : $this->NowPage;
			$this->NowPage = ($this->pageTemp['NowPage']) ? $this->pageTemp['NowPage'] : $this->NowPage;
			
			//$this->SQL = (strstr(strtolower($this->SQL),'limit') !== false) ? $this->SQL : $this->SQL.' limit '.$this->NowPage*$this->pageNS.','.$this->pageNS;
			if (($Q = $this->db->select_to_2Array($this->SQL.' limit '.($this->NowPage-1)*$this->pageNS.','.$this->pageNS))  != false)
			{
				$this->DataTemp = $Q;
			}else{
				return false;
			}
		}
		
		/**
		 * 取得当前页数据
		 */
		public function getText()
		{
			if (!$this->DataTemp) $this->getData();
			return $this->DataTemp;
		}
		
		/**
		 * 取得分页数据
		 */
		public function getPage($type = false)
		{
			//if (!$this->DataTemp) $this->getData();
			//记录数
			$SQL = str_replace(array(chr(8),chr(9),chr(10),chr(13)),' ',$this->SQL);
			$SQL = eregi_replace("select .* from","select count(*) as count from",$SQL);
			$SQL = $this->db->select_to_1Array($SQL);
			$SQL['count'] = ($SQL['count'] < 0) ? 0 : $SQL['count'];
			
			//每页条数
			$this->pageTemp['PNS'] = $this->pageNS;
			
			//总条数
			$this->pageTemp['Record'] = $SQL['count'];
			
			//总页数
			$this->pageTemp['count'] = ceil($this->pageTemp['Record'] / $this->pageNS);
			
			//当前页
			$this->pageTemp['NowPage'] = ($this->NowPage > $this->pageTemp['count']) ? $this->pageTemp['count'] : $this->NowPage;
			
			//上一页
			$this->pageTemp['up'] = (($this->pageTemp['NowPage']-1) < 1) ? 1 : $this->pageTemp['NowPage']-1;
			
			//下一页
			$this->pageTemp['down'] = (($this->pageTemp['NowPage']+1) > $this->pageTemp['count']) ? $this->pageTemp['count'] : $this->pageTemp['NowPage']+1;
			
			if ($type)
			{
				//前10页
				$up10 = floor($this->pageTemp['NowPage']*0.99/10)*10;
				$up10 = ($up10 < 1) ? 1 : $up10;
				$start = ($up10 < 10) ? 1 : $up10+1;
				$this->pageTemp['up10'] = $up10;
				
				//后10页
				$tempINT = ($up10 < 10) ? 10 : 11;
				$down10 = (($up10 + $tempINT) > $this->pageTemp['count']) ? $this->pageTemp['count'] : $up10 + $tempINT ;
				$stop = ($down10 >= $this->pageTemp['count']) ? $this->pageTemp['count'] : $down10-1;
				$this->pageTemp['down10'] = $down10;
				
				for($i = $start ; $i <= $stop ;$i++) $this->pageTemp['PageCode'][] = $i;
			}
			
			return $this->pageTemp;
		}
	}
}
?>