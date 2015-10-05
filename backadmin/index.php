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
		
		public $sma , $db , $fun , $get , $thisurl , $BTP , $cart;
		
		public function __construct($is_output_header = false , $is_exec_smarty = true , $is_BTP = true)
		{
			ob_start();
			session_start();
			
			if ($is_output_header) $this->Output_Header();
			
			$this->fun = new simon;
			
			$this->get = $this->fun->pars_all('get' , true);
			$this->get['open'] = ($this->get['open']) ? $this->get['open'] : 'login';
			$this->get['action'] = ($this->get['action']) ? $this->get['action'] : 'show';
			
			$this->thisurl = $this->fun->GetUrl();
			
			$this->db = new db;
			$this->db->SERVER = Host;
			$this->db->port = Port;
			$this->db->dbName = Database;
			$this->db->dbUser = UserName;
			$this->db->dbPass = Password;
			$this->db->connect();
			
			if ($is_exec_smarty) $this->exec_smarty();
			
			if ($is_BTP) $this->BackTPurview();
		}
		
		/**
		 * 加载处理的文件
		 */
		public function start_dispose()
		{
			if (is_file($file = BASEPATH . 'View/' . $this->get['open'] . '.php'))
			{
				require_once($file);
				$dispose = new $this->get['open']();
				
				//if ($this->get['action']) eval('$dispose->' . $this->get['action'] . '();');
				if ($this->get['action']) $dispose->{$this->get['action']}();
	
				//if ($this->sma) $this->sma->display($this->get['open'] . '.html');
			}else{
				$this->db->echoErr('<b class="blue">你传递的参数错误</b><div>?open=' . $this->get['open'] . '</div>');
			}
		}
		
		/**
		 * 初始化 smarty
		 */
		public function exec_smarty()
		{
			require_once(BASEPATH . '../smarty/Smarty.class.php');
			
			$this->sma = new Smarty;
			$this->sma->template_dir		= BASEPATH . 'Template/';
			$this->sma->cache_dir			= BASEPATH . '../Smarty/cache/';
			$this->sma->config_dir			= BASEPATH . '../Smarty/config/';
			$this->sma->compile_dir			= BASEPATH . '../Smarty/temp/';
			$this->sma->caching				= false;
			$this->sma->config_fix_newlines	= true;
			
			$this->sma->assign('thisurl' , $this->thisurl);
			$this->sma->assign('get' , $this->get);
			
		}
		
		/**
		 * 实例化fckeditor
		 * @param $textarea_name	textarea Name
		 * @param $default_info		默认的信息
		 * @param $Height			编辑器高度
		 */
		public function _editor($textarea_name= 'text' , $default_info = false , $Height = 450 , $Width = '100%')
		{
			$default_info = ($default_info) ? $this->fun->Revert($default_info) : '';
			
			require_once(BASEPATH . 'fckeditor/fckeditor.php');
			$oFCKeditor 			= new FCKeditor($textarea_name) ;
			$oFCKeditor->BasePath	= 'fckeditor/';
			$oFCKeditor->Value		= $default_info;
			$oFCKeditor->Height		= $Height;
			$oFCKeditor->Width		= $Width;
			
			if ($this->sma)
				$this->sma->assign($textarea_name , $oFCKeditor->CreateHtml());
			else
				return $oFCKeditor->CreateHtml();
		}
		
		/**
		 * 全局检查是否登录
		 */
		public function check_Login()
		{
			$args = func_get_args();
			if (in_array($this->get['open'] , $args)) return;
			
			if (!$_SESSION['back'] | count($_SESSION['back']) < 2)
			{
				unset($_SESSION['back']);
				$this->fun->local('./');
			}
		}
		
		/**
		 * 输出头
		 */
		private function Output_Header()
		{
			//ob_start();
			date_default_timezone_set('PRC');
			header("Cache-control: private");
			header('content-type: text/html; charset=UTF-8');
		}
		
		/**
		 * 检查权限
		 * 将权限组压缩到BTP中,方便模板层控制
		 * 同时写入到全局$this->BTP变量中
		 */
		private function BackTPurview()
		{
			$this->BTP = @$_SESSION['back']['purview'];
			$this->sma->assign('BTP' , $this->BTP);
			
			$this->cart = @$_SESSION['back'];
			$this->sma->assign('back' , $this->cart);
		}
		
	}
	$start = new start(false , true , false);
	$start->check_Login('login' , 'code');
	$start->start_dispose();

	  
?>