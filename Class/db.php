<?php
if (!class_exists('db'))
{
	/**
	 * 基于mysql的数据库操作类
	 * @author 蜃楼寻梦(simon)
	 * @version 2.0
	 * @time 2010-04-09
	 */
	class db
	{
		/**
		 * 数据库编码
		 */
		public $Coding = 'utf8';
		
		/**
		 * 服务器名称或IP地址
		 */
		public $SERVER = 'localhost';
		
		/**
		 * mysql端口
		 */
		public $port = '3306';
		
		/**
		 * 数据库名称
		 */
		public $dbName = null;
		
		/*
		 * 数据库用户名
		 */
		public $dbUser = null;
		
		/**
		 * 数据库密码
		 */
		public $dbPass = null;
		
		/**
		 * 数据库操作句柄
		 */
		private $dbLink = null;
		
		public function connect()
		{
			$this->dbLink = @mysql_connect($this->SERVER . ':' . $this->port , $this->dbUser , $this->dbPass , $this->dbName);
			if (!$this->dbLink)
			{
				$this->echoErr('<b class="red">db->connect() 数据库链接出错</b><div>' . mysql_error() . '</div>');
			}else{
				mysql_query('set names ' . $this->Coding, $this->dbLink);
				mysql_select_db($this->dbName, $this->dbLink);
			}
		}
		
		public function __destruct()
		{
			try{unset($this->dbLink);}catch(Exception $e){}
		}
		
		/**
		 * 返回数据库链接句柄
		 */
		public function _getDBLink()
		{
			return $this->dbLink;
		}
		
		/**
		 * 执行SQL语句
		 * @param $SQL		string	SQL语句
		 * @param $Rdb		bool	为真时,返回操作句柄
		 * @param $echo_sql	bool	测试输出SQL语句
		 * @return			int		返回(-1 , 0 , >-1 , 操作句柄) -1 = 出错 , 0 = 未执行 , >-1 = 成功
		 */
		public function query($SQL , $Rdb = false , $echo_sql = false)
		{
			if ($echo_sql) $this->echoErr('<b class="blue">db->query() 调试SQL语句</b><div>' . $SQL . '</div>');
			
			$this->dbData = mysql_query($SQL , $this->dbLink);
			if ($this->dbData)
			{
				if ($Rdb) return $this->dbData;
				
				if (strtoupper(substr(trim($SQL),0,6)) == 'SELECT')
					return @mysql_num_rows($this->dbData);
				else
					return @mysql_affected_rows($this->dbLink);
			}else{
				$this->echoErr('<b class="red">db->query() 错误的SQL语句 </b><div>'.$SQL.'</div><b class="blue">错误提示</b><div>'.mysql_error().'</div>');
			}
		}
		
		/**
		 * 查询数据 -> 返回二维数组
		 * @param $SQL		string		SQL语句
		 * @param $Key		bool/string	给返回的'数组'指定一个字段作为key
		 * @param $echo_sql	bool		测试输出SQL语句
		 * @return						正常情况返回数组,错误情况输出错误,查询为空的情况输出false
		 */
		public function select_to_2Array($SQL , $Key = false , $echo_sql = false)
		{
			if ($echo_sql) $this->echoErr('<b class="blue">db->select_to_2Array() 调试SQL语句</b><div>' . $SQL . '</div>');
			
			$this->dbData = mysql_query($SQL , $this->dbLink);
			if ($this->dbData)
			{
				$select = false;
				if (mysql_num_rows($this->dbData) > 0)
				{
					if ($Key)
						while ($Q = mysql_fetch_assoc($this->dbData)) $select[$Q[$Key]] = $Q;
					else
						while ($Q = mysql_fetch_assoc($this->dbData)) $select[] = $Q;
				}
				return $select;
			}else{
				$this->echoErr('<b class="red">db->select_to_2Array() 错误的SQL语句 </b><div>'.$SQL.'</div><b class="blue">错误提示</b><div>'.mysql_error().'</div>');
			}
		}
		
		/**
		 * 查询数据 -> 返回查询的第一条数据
		 * @param $SQL		string		SQL语句
		 * @param $echo_sql	bool		测试输出SQL语句
		 * @return						正常情况返回数组,错误情况输出错误,查询为空的情况输出false
		 */
		public function select_to_1Array($SQL , $echo_sql = false)
		{
			if ($echo_sql) $this->echoErr('<b class="blue">db->select_to_1Array() 调试SQL语句</b><div>' . $SQL . '</div>');
			
			$this->dbData = mysql_query($SQL , $this->dbLink);
			if ($this->dbData)
			{
				return mysql_fetch_assoc($this->dbData);
			}else{
				$this->echoErr('<b class="red">db->select_to_1Array() 错误的SQL语句 </b><div>'.$SQL.'</div><b class="blue">错误提示</b><div>'.mysql_error().'</div>');
			}
		}
		
		/**
		 * 查询数据 -> 返回以某个字段的一维数组
		 * @param $SQL		string		SQL语句
		 * @param $Key		bool/string	给返回的'数组'指定一个字段作为key
		 * @param $echo_sql	bool		测试输出SQL语句
		 * @return						正常情况返回数组,错误情况输出错误,查询为空的情况输出false
		 */
		public function select_N_to_1key($SQL , $value , $key = false , $echo_sql = false)
		{
			if ($echo_sql) $this->echoErr('<b class="blue">db->select_N_to_1key() 调试SQL语句</b><div>' . $SQL . '</div>');
			
			$this->dbData = mysql_query($SQL , $this->dbLink);
			if ($this->dbData)
			{
				if ($key)
					while ($Q = mysql_fetch_assoc($this->dbData)) $select[$Q[$key]] = $Q[$value];
				else
					while ($Q = mysql_fetch_assoc($this->dbData)) $select[] = $Q[$value];
				return $select;
			}else{
				$this->echoErr('<b class="red">db->select_N_to_1key() 错误的SQL语句 </b><div>'.$SQL.'</div><b class="blue">错误提示</b><div>'.mysql_error().'</div>');
			}
		}
				
		/**
		 * 快速插入数据库
		 * @param $tabName			string	表名
		 * @param $data				array	带索引的一维数组
		 * @param $echo_sql			bool	测试输出SQL语句
		 * @param $is_unbuffered	bool	是否使用无缓存查询(适用多数据)
		 * @return 					int		返回(-1 , >-1) -1 = 出错  , >-1 = 成功
		 */
		public function insert($tabName = null , $data = null , $is_unbuffered = false , $echo_sql = false)
		{
			if (!(is_array($data) && count($data) > 0)) $this->echoErr('<b class="red">db->insert() 错误</b><div>请传递正确的数组</div>');
			
			$SQL = '';
			$key = $value = '';
			foreach ($data as $k => $v)
			{
				$key .= ",`{$k}`";
				switch($v)
				{
					case '0':$value .= ",'0'";break;
					case Null:$value .= ",Null";break;
					default:$value .= ",'{$v}'";
				}
			}
			$key = substr($key,1);
			$value = substr($value,1);
			$SQL = "INSERT INTO `{$tabName}` ({$key}) VALUES ($value);";
			if ($echo_sql) $this->echoErr('<b class="blue">db->insert() 调试SQL语句</b><div>' . $SQL . '</div>');
			
			if ($is_unbuffered)
				$this->unbuffered_query($SQL);
			else
				return $this->query($SQL);
		}
		
		/**
		 * 返回最近一次插入的ID号
		 * @return 	int/string
		 */
		public function get_id()
		{
			return @mysql_insert_id();
		}
		
		/**
		 * 快速修改字段
		 * @param $tabName			string	表名
		 * @param $data				array	带索引的一维数组,值使用'+3,-2',值=值+3,值=值-2
		 * @param $Cons				string	修改条件,为空或null时,更新整个表
		 * @param $is_unbuffered	string	是否使用无缓存查询(适用多数据)
		 * @param $echo_sql			bool	测试输出SQL语句
		 * @return 					int		返回(-1 , 0 , >-1) -1 = 出错  , 0 = 未执行 , >-1 = 成功
		 */
		public function update($tabName = null , $data = null , $Cons = null , $is_unbuffered = false , $echo_sql = false)
		{
			if (!(is_array($data) && count($data) > 0)) $this->echoErr('<b class="red">db->update() 错误</b><div>请传递正确的数组'.print_r($data).'</div>');
			
			$SQL = '';
			foreach ($data as $k => $v)
			{
				switch($v)
				{
					
					case '0': $SQL .= ",`{$k}`='0'"; break;
					case null: $SQL .= ",`{$k}`=Null"; break;
					default:
						if (substr($v,0,3) === '+++' || substr($v,0,3) === '---')
							$SQL .= ",`{$k}`=`{$k}`" . substr($v,0,1) . substr($v,3);
						else
							$SQL .= ",`{$k}`='{$v}'";
				}
			}
			$SQL = substr($SQL,1);
			
			if ($Cons == null)
				$SQL = "UPDATE `{$tabName}` SET {$SQL};";
			else
				$SQL = "UPDATE `{$tabName}` SET {$SQL} WHERE {$Cons};";
			
			if ($echo_sql) $this->echoErr('<b class="blue">db->update() 调试SQL语句</b><div>' . $SQL . '</div>');
			
			if ($is_unbuffered)
				$this->unbuffered_query($SQL);
			else
				return $this->query($SQL);
		}
		
		/**
		 * 删除字段
		 * @param $tabName	string	表名
		 * @param $Cons		string	条件,为空或null时,删除整个表
		 * @param $echo_sql	bool	测试输出SQL语句
		 * @return			int		返回(-1 , 0 , >-1) -1 = 出错  , 0 = 数据不存在,或者未执行 , >-1 = 成功
		 */
		public function del($tabName = null , $Cons = null , $echo_sql = false)
		{
			if ($Cons == null)
				$SQL = "TRUNCATE `{$tabName}`";
			else
				$SQL = "DELETE FROM `{$tabName}` WHERE {$Cons}";
			
			if ($echo_sql) $this->echoErr('<b class="blue">db->del() 调试SQL语句</b><div>' . $SQL . '</div>');
			return $this->query($SQL);
		}
		
		public function unbuffered_query($SQL , $Rdb = false , $echo_sql = false)
		{
			if ($echo_sql) $this->echoErr('<b class="blue">db->query() 调试SQL语句</b><div>' . $SQL . '</div>');
			mysql_unbuffered_query($SQL , $this->dbLink);
		}
		
		
		/**
		 * 输出错误
		 * @param $message	string	错误信息
		 */
		public function echoErr($message)
		{
			header('content-type:text/html; charset=UTF-8');
			$message = '<div class="arkel">' . $message . '</div>';
			$message = '<style type="text/css">body{margin:0 auto;text-align:center}.arkel{text-align:left;margin:200px auto 0 auto;border:#A8DCF4 1px solid;background:#F0FDFC;padding:2em 2em 1em 2em;width:70%;clear:both}.arkel .red{color:#F00}.arkel .blue{color:#03F}.arkel div{padding:1em;margin:0.2em 0 1em 0;border:1px solid #39F}</style>' . $message;
			die($message);
		}
	}
}
?>