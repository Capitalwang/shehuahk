<?php
	error_reporting(0);
	define('BASEPATH' , pathinfo(__FILE__ , PATHINFO_DIRNAME) . '/');
	require_once(BASEPATH . '../config.php');
	
	function __autoload($class_name)
	{
		require_once(BASEPATH . '../Class/' . $class_name . '.php');
	}
	
	class start
	{
		public $BTP_Words = '你没有此权限';
		
		public $db , $fun , $get;
		
		public function __construct($is_output_header = false)
		{
			ob_start();
			if ($is_output_header) $this->Output_Header();
			
			$this->fun = new simon;
			
			$this->get = $this->fun->pars_all('get' , true);
			$this->get['o'] = ($this->get['o']) ? $this->get['o'] : 'error';
			$this->get['a'] = ($this->get['a']) ? $this->get['a'] : 'show';
			$this->get['R'] = ($this->get['R']) ? $this->get['R'] : 'xml';
			
			$this->db = new db_api;
			$this->db->SERVER = Host;
			$this->db->port = Port;
			$this->db->dbName = Database;
			$this->db->dbUser = UserName;
			$this->db->dbPass = Password;
			$error = $this->db->connect();
			
			if ($error && is_array($error)) $this->{make_ . $this->get['R']}($error);
		}
		
		/**
		 * 加载处理的文件
		 */
		public function start_dispose()
		{
			if (is_file($file = BASEPATH . $this->get['o'] . '.php'))
			{
				require_once($file);
				$dispose = new $this->get['o']();
				
				if ($this->get['a']) $dispose->{$this->get['a']}();
			}else{
				$this->{make_ . $this->get['R']}(array('error' => array('code' => -1 , 'info' => '参数错误')));
			}
		}
		
		public function make_xml($array)
		{
			header('content-type: text/xml; charset=UTF-8');
			echo '<?xml version="1.0" encoding="utf-8"?>';
			echo "\r\n<all>";
			foreach ($array as $key => $val)
			{
				echo (is_numeric($key)) ? "\r\n\t<pro>" : "\r\n\t<{$key}>";
				if (is_array($val))
				{
					foreach ($val as $K => $V)
					{
						echo "\r\n\t\t<{$K}>{$V}</{$K}>";
					}
				}else{
					echo $val;
				}
				echo (is_numeric($key)) ? "\r\n\t</pro>" : "\r\n\t</{$key}>";
			}
			echo "\r\n</all>";
			exit;
		}
		
		public function make_json($array)
		{
			header('content-type: text/plain; charset=UTF-8');
			
			echo strtr($this->fun->php_json_encode($array) , array(chr(10)=>'' , chr(13)=>''));
			exit;
		}
		
		public function make_serialize($array)
		{
			header('content-type: text/plain; charset=UTF-8');
			echo serialize($array);
			exit;
		}
		
		/**
		 * 输出头
		 */
		private function Output_Header()
		{
			//ob_start();
			date_default_timezone_set('PRC');
			//header("Cache-control: private");
			//header('content-type: text/html; charset=UTF-8');
		}
	}
	
	$start = new start(false);
	$start->start_dispose();
	  
?>