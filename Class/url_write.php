<?php

	/**
	 * URL重写类
	 * 作者:simon
	 * -------------------- 公有变量 --------------------------
	 * $this->State 			状态,是否开启url重写
	 * $this->varORvar			变量与变量之间符号
	 * $this->varORvalue		变量与值的间隔符号
	 * $this->DefaultFileName	默认文件文件名称
	 * $this->varOpen			是否带上变量名称
	 *
	 * -------------------- 公有方法(函数) --------------------
	 * $this->make				返回 动态链接 转变成 伪静态链接
	 * $this->make_echo			直接输出伪静态链接
	 * $this->revert_Array		自动解析成变量数组
	 */

	class url_write
	{
		/**
		 * 状态,是否开启url重写
		 */
		public $State;
		
		/**
		 * 是否带上变量名称
		 */
		public $varOpen;

		/**
		 * 变量与变量之间符号
		 */
		public $varORvar;
		
		public $suffix;
		/**
		 * 变量与值的间隔符号
		 */
		public $varORvalue;
		
		/**
		 * 默认文件文件名称
		 */
		public $DefaultFileName;
		
		public function __construct()
		{
			$this->State = true;
			$this->varOpen = false;
			$this->varORvar = '/';
			$this->varORvalue = '-';
			$this->DefaultFileName = 'index';
			$this->suffix = '.do';
		}
		
		/**
		 * 直接输出伪静态链接
		 */
		public function make_echo($str)
		{
			echo $this->make($str);
		}
		
		/**
		 * 针对兼职网
		 */
		public function makes($str)
		{
			$str = strtr($str,array( RootList =>''));
			$str = RootList . $str;
			return $this->make($str);
		}
		
		/**
		 * 返回 动态链接 转变成 伪静态链接
		 */
		public function make($str)
		{
			//关闭直接返回
			if (!$this->State)
				return $str;

			if (strrpos($str,'/') === false)
			{
				//总参数	
				$cs = explode('?',$str);
			}else{
				ereg("(.*[/{0,}])(.*)",$str,$ArrStr);
				//总参数
				$cs = explode('?',$ArrStr[2]);
			}

			//取得锚
			if (strpos($cs[1],'#') !== false)
			{
				$fragment = (strstr($cs[1],'#'));
				$DTCS = substr($cs[1],0,strpos($cs[1],'#'));
			}else{
				$DTCS = $cs[1];
			}

			$str = '';
			//动态参数
			
			parse_str($DTCS,$CSARR);
			//打开文件名称
			$CSARR['open'] = (empty($CSARR['open'])) ? ((empty($cs[0])) ? $this->DefaultFileName : substr($cs[0],0,strrpos($cs[0],'.'))) : $CSARR['open'];
			if ($this->varOpen)
			{
				foreach ($CSARR as $k => $v)
					$str .= $this->varORvar.$k.$this->varORvalue.$v;
			}else{
				foreach ($CSARR as $v)
					$str .= $this->varORvar.$v;
			}
			
			$str = $ArrStr[1].substr($str,1).$this->suffix.$fragment;
			return $str;
		}
		
		/**
		 * 自动解析成变量数组
		 */
		public function revert_Array($str)
		{
			$str = parse_url($str);
			$str = str_replace($this->suffix,'',$str['path']);
			
			if ($str[0] == '/')
				$str = substr($str,1);
			
			$str = explode($this->varORvar,$str);
			//$str = explode($this->varORvar,str_replace('/','',$str));
//			if ($this->varORvar == '/')
//				$str = explode($this->varORvar,$str);
//			else
//				$str = explode($this->varORvar,str_replace('/','',strrchr($str,'/')));

			foreach ($str as $v)
			{
				if (strrpos($v,$this->varORvalue) !== false)
				{
					$stmps = explode($this->varORvalue,$v);
					$stmp[$stmps[0]] = $stmps[1];
				}
			}
			$stmp['open'] = (empty($stmp['open'])) ? $this->DefaultFileName : $stmp['open'];
			return $stmp;
		}

	}
?>
