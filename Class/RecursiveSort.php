<?php
class RecursiveSort extends db
{
	/**
	 * 递归分类 (内存式)
	**/

	public $tableName,$newTypeArr,$SQL,$Cshu,$sort,$FID,$ZID;
	private $originalityTypeArr,$new_arr;

	public function __construct()
	{
		global $db;
		parent::__construct(false , $db);
		$this->tableName = 'product_type';
		$this->Cshu = 'id,title,UPID';
		$this->sort = 'ranking';
		$this->FID = 'id';
		$this->ZID = 'UPID';
		$this->SQL = null;
		$this->new_arr = array();
	}
		
	/**
	 * 取得某个节点下的所有分类
	 * @param $id	string/int	节点ID
	 * @param $i	int			节点起始层
	 * @return		bool/array	二维数组/false
	 */
	public function getType($id = '0',$i = 0)
	{
		//调用getArray(),取得完整的数据
		$this->getArray();
		
		if (is_array($this->originalityTypeArr))
		{
			foreach ($this->originalityTypeArr as $key => $value)
			{
				if ($value[$this->FID] == $id)
				{
					$this->newTypeArr[$key] = $value;
					if ($i == 0) $i++;
					$this->newTypeArr[$key]['L'] = $i;
					
					unset($this->originalityTypeArr[$key]);
				}
				
				if ($value[$this->ZID] == $id)
				{
					$this->newTypeArr[$key] = $value;
					$this->newTypeArr[$key]['L'] = $i;
	
					$this->getType($value[$this->FID],$i+1);
				}
			}
			
			unset($this->originalityTypeArr);
			return $this->newTypeArr;
		}else{
			return false;
		}
	}
	
	public function get_up_type($id = null)
	{
		if ($id)
		{
			$this->get_up_type_private($id);
			return $this->new_arr;
		}
	}
	
	private function get_up_type_private($id = null,$arr = null)
	{
		//调用getType(),取得整理后的数据
		$arr = ($arr == null) ? $this->getType() : $arr;
		
		//if ($id == '0') return $this->new_arr;
		
		foreach ($arr as $k => $v)
		{
			if ($v['id'] == $id)
			{
				array_unshift($this->new_arr,$v);
				$this->del_array(&$arr,$v['L']);
				$this->get_up_type_private($v['UPID'],$arr);
				break;
			}
		}
	}
	
	/**
	 * 类中使用方法,删除数组中无效的数据
	 */
	private function del_array($arr,$TJ = 0)
	{
		foreach ($arr as $k => $v)
		{
			if ($v['L'] >= $TJ) unset($arr[$k]);
		}
	}
	
	/*
	 * 类中使用方法,取得原始的数据
	*/
	private function getArray()
	{
		if ($this->SQL === null) $this->SQL = "select {$this->Cshu} from {$this->tableName} order by {$this->sort} asc";
		if (($Q = $this->select($this->SQL)) != false) $this->originalityTypeArr = $Q;
		return $this->originalityTypeArr;
	}
}
?>