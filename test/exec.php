<?php
//错误报告
//error_reporting(0);
error_reporting(E_ALL);

	define('DIR' , dirname(__FILE__) . '/');
	
	class Origin
	{
		//预留 'smarty模板,数据库,基本常用方法类,get请求' 的公有属性
		public $db , $fun , $get;
		
		public function __construct($is_output_header = false , $is_open_db = false)
		{
			if ($is_output_header) $this->Output_Header();
			
			//加载配置文件
			$this->load_file('config' , '' , false);
			
			//加载常用函数库
			$this->load_file('simon' , 1);
			$this->fun = new simon;
			
			$this->get = $this->fun->pars_all('get',true);
			$this->get['O'] = isset($this->get['O']) ? $this->get['O'] : 'home';
			$this->get['A'] = isset($this->get['A']) ? $this->get['A'] : 'index';
			
			if ($is_open_db)
			{
				$this->load_file('db' , 1);
				$this->db = new db;
				$this->db->SERVER = Host;
				$this->db->port = Port;
				$this->db->dbName = Database;
				$this->db->dbUser = UserName;
				$this->db->dbPass = Password;
				$this->db->connect();
			}
			
		}
		
		private function Output_Header()
		{
			header("Cache-control: private");
			header('content-type: text/html; charset=UTF-8');
		}
		
		/**
		 * 加载文件类
		 * @param $name				文件名称
		 * @param $catalog			文件目录
		 * 							1=常用类,2=功能处理类,自定义=自定义加载位置
		 * @param $is_check_class	是否检查类
		 */
		public function load_file($name , $catalog = 2 , $is_check_class = true)
		{
			if (!$name) return false;
			$Dir = array('' , 'Class' , 'View');
			$Dir = ($catalog === 1 | $catalog === 2) ? $Dir[$catalog] : $catalog;
			
			if (is_file($file = DIR . $Dir . '/' . $name . '.php'))
			{
				require_once($file);
				if (!class_exists($name) && $is_check_class) die('You load the class was not created.');
			}else{
				echo $file;
				die(' You load the class file does not exist.');
			}
		}
		
		/**
		 * 取得post数组
		 */
		public function __get_post()
		{
			return $this->fun->pars_all('post' , true);
		}
		
		/**
		 * 加载处理的文件
		 */
		public function _Origin_dispose()
		{
			//定义时区
			date_default_timezone_set('PRC');
			
			//开启缓冲
			ob_start();
			
			if(!isset($_SESSION)) session_start();
			
			$this->load_file($this->get['O']);
			$dispose = new $this->get['O']();
			if ($this->get['A']) $dispose->{$this->get['A']}();
		}
	}
	//$dot = new Origin(0,0,1);
	//$dot->db->echoErr('正在升级当前版本,请稍后访问');
	$dot = new Origin;
	$dot->_Origin_dispose();
?>