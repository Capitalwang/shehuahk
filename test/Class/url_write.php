<?php
	/**
	 * URL重写类
	 * 作者:simon
	 */

	class url_write
	{
		/**
		 * 状态,是否开启url重写
		 */
		public $IS_WRITE;
		
		/**
		 * 是否带上变量名称
		 */
		public $IS_KEY;

		/**
		 * 变量与变量之间符号
		 */
		public $KEY_KEY;
		
		/**
		 * 变量与值的间隔符号
		 */
		public $KEY_VALUE;
		
		public function __construct()
		{
			$this->IS_WRITE = IS_WRITE;
			$this->IS_KEY = IS_KEY;
			$this->KEY_KEY = KEY_KEY;
			$this->KEY_VALUE = KEY_VALUE;
		}
		
		/**
		 * 得到 伪静态数组
		 */
		public function get_array()
		{
			$os = false;
			$url = getenv('REQUEST_URI');
			$url = $url ? $url : $_SERVER['REQUEST_URI'];
			$url = str_replace('/' . WRITE_LIST . $this->KEY_KEY , '' , $url);
			
			if (in_array($url , array('/' , ''))) return false;
			
			if ($this->IS_KEY)
			{
				$url = explode($this->KEY_KEY , $url);
				foreach ($url as $val)
				{
					if (stripos($val , $this->KEY_VALUE) !== false)
					{
						$new = explode($this->KEY_VALUE , $val);
						$news[$new[0]] = $new[1];
					}
				}
				$os = $news;
			}else{
				$os = explode($this->KEY_KEY , $url);
			}
			return $os;
		}
		
		/**
		 * 直接输出伪静态链接
		 */
		public function make_echo($String_Array)
		{
			echo $this->make($String_Array);
		}
		
		/**
		 * 动态链接 转变成 伪静态链接
		 * @param $String_Array		URL字符串 或者带 关键字一维数组
		 */
		public function make($String_Array)
		{
			if (is_array($String_Array))
			{
				if (!$this->IS_WRITE)
				{
					#关闭返回
					$url = '?';
					foreach ($String_Array as $key => $val) $url .= '&' . $key . '=' . $val;
					$url = DOMAIN . str_replace('?&' , '?' , $url);
				}else{
					#开启
					$url = DOMAIN . WRITE_LIST;
					if ($this->IS_KEY)
						foreach ($String_Array as $key => $val) $url .= $this->KEY_KEY . $key . $this->KEY_VALUE . $val;
					else
						foreach ($String_Array as $val) $url .= $this->KEY_KEY . $val;
				}
			}else{
				#关闭直接返回
				if (!$this->IS_WRITE) return $String_Array;
				
				preg_match("/([^?]*\?)(.*)/" , $String_Array , $url);
				
				$url = isset($url[2]) ? $url[2] : false;
				if ($this->IS_KEY)
				{
					$url = strtr($url , array('&' => $this->KEY_KEY , '=' => $this->KEY_VALUE));
				}else{
					$url = '&' . $url;
					$url = preg_replace("/\&[^=]*=/" , $this->KEY_KEY , $url);
					$url = substr($url , 1);
				}
				$url = DOMAIN . WRITE_LIST . $this->KEY_KEY . $url;
			}
			
			return $url;
		}
	}
?>
