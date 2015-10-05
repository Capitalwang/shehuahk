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

		public $sma , $db , $fun , $get , $thisurl , $QX;
		
		public function __construct($is_output_header = false , $is_exec_smarty = true , $is_QX = true)
		{
			ob_start();
			session_start();
			
			if ($is_output_header) $this->Output_Header();
			
			$this->fun = new simon;
			
			$this->get = $this->fun->pars_all('get' , true);
			if ($_SESSION['proxy']['account'])
				$this->get['open'] = ($this->get['open']) ? $this->get['open'] : 'home';
			else
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
			
			if ($is_QX) $this->proxyTPurview();
		}
		
		/**
		 * ���ش�����ļ�
		 */
		public function start_dispose()
		{
			if (is_file($file = BASEPATH . 'View/' . $this->get['open'] . '.php'))
			{
				require_once($file);

				$dispose = new $this->get['open']();
				//echo $this->get['open'].'/'.$this->get['action'];die;
				//if ($this->get['action']) eval('$dispose->' . $this->get['action'] . '();');
				if ($this->get['action']) $dispose->{$this->get['action']}();

				//if ($this->sma) $this->sma->display($this->get['open'] . '.html');
			}else{
				$this->db->echoErr('<b class="blue">�㴫�ݵĲ�������</b><div>?open=' . $this->get['open'] . '</div>');
			}
		}
		
		/**
		 * ��ʼ�� smarty
		 */
		public function exec_smarty()
		{
			require_once(BASEPATH . '../smarty/Smarty.class.php');
			
			$this->sma = new Smarty;
			$this->sma->template_dir		= BASEPATH . 'Template/';
			$this->sma->cache_dir			= BASEPATH . '../Smarty/cache/';
			$this->sma->config_dir			= BASEPATH . '../Smarty/config/';
			$this->sma->compile_dir			= BASEPATH . '../Smarty/proxy/';
			$this->sma->caching				= false;
			$this->sma->config_fix_newlines	= true;
			
			$this->sma->assign('thisurl' , $this->thisurl);
			$this->sma->assign('get' , $this->get);
		}
		
		/**
		 * ȫ�ּ���Ƿ��¼
		 */
		public function check_Login()
		{
			$args = func_get_args();
			if (in_array($this->get['open'] , $args)) return;
			
			if (!$_SESSION['proxy'] || count($_SESSION['proxy']) < 2)
			{
				unset($_SESSION['proxy']);
				$this->fun->local('./');
			}
		}
		
		/**
		 * ���ͷ
		 */
		private function Output_Header()
		{
			date_default_timezone_set('PRC');
			header("Cache-control: private");
			header('content-type: text/html; charset=UTF-8');
		}
				
		/**
		 * ���Ȩ��
		 * ��Ȩ����ѹ����QX��,����ģ������
		 * ͬʱд�뵽ȫ��$this->QX������
		 */
		private function proxyTPurview()
		{
			$this->QX = @$_SESSION['proxy']['purview'];
			//var_dump($_SESSION['proxy']['purview']);die;
			$this->sma->assign('QX' , $this->QX);
			$this->sma->assign('proxy' , $_SESSION['proxy']);
		}
	}
	
	$start = new start(false , true , false);
	$start->check_Login('login' , 'code' , 'INTbid' , 'news' , 'Quote' , 'LD');

	$start->start_dispose();

	
?>