<?php
//自定义会话
class session
{
	//数据库句柄
	public $dbHandle;
	
	//会话有效期
	public $lifeTime;
	
	//启动时调用
	public function open()
	{
		$this->dbHandle->del('session',"session_expires + " . $this->lifeTime . " < " . time());
		//$this->dbHandle->del('session',"session_expires + " . $this->lifeTime . " < " . mktime());
		return true;
	}
	
	//终止调用
	public function close()
	{
		$this->gc($this->lifeTime);
		return true;
	}
	
	//读取方法
	public function read($sessID)
	{
		$SQL = "SELECT session_data AS d FROM session WHERE session_id = '{$sessID}' AND session_expires > " . time();
		if(($res = $this->dbHandle->select($SQL,true)) != false) return $res['d'];
		return '';
	}
	
	//写入方法
	public function write($sessID,$sessData)
	{
		$newExp = time() + $this->lifeTime;
		
		if ($this->dbHandle->select("SELECT * FROM session WHERE session_id = '{$sessID}'") != false)
		{
			$arr = array();
			$arr['session_expires'] = $newExp;
			$arr['session_data'] = $sessData;
			if($this->dbHandle->update('session',$arr,"session_id='{$sessID}'")) return true;
		}else{
			$arr = array();
			$arr['session_id'] = $sessID;
			$arr['session_expires'] = $newExp;
			$arr['session_data'] = $sessData;
			
			if($this->dbHandle->insert('session',$arr)) return true;
		}
		
		return false;
	}
	
	//程序销毁方法
	public function destroy($sessID)
	{
		if($this->dbHandle->del('session',"`session_id`='{$sessID}'") > 0) return true;
		return false;
	}
	
	//系统进程注销
	public function gc($sessMaxLifeTime)
	{
		$this->dbHandle->del('session',"session_id='{$sessMaxLifeTime}'");
		if($this->dbHandle->del('session',"session_expires < " . time() ) > 0) return true;
		return false;
	}
}
?>