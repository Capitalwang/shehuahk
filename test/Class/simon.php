<?php
class simon {
	
	/**
	 * 取得IP地址
	 */
	public function getIP()
	{
		if(getenv('HTTP_CLIENT_IP'))
		{
			return getenv('HTTP_CLIENT_IP');
		}elseif(getenv('HTTP_X_FORWARDED_FOR')){
			return getenv('HTTP_X_FORWARDED_FOR');
		}elseif(getenv('REMOTE_ADDR')){
			return getenv('REMOTE_ADDR');
		}else{
			return $HTTP_SERVER_VARS['REMOTE_ADDR'];
		}
	}
	
	private function json_encode_string($in_str)
	{
		mb_internal_encoding("UTF-8");
		$convmap = array(0x80, 0xFFFF, 0, 0xFFFF);
		$str = "";
		for($i = mb_strlen($in_str)-1; $i>=0; $i--)
		{
			$mb_char = mb_substr($in_str, $i, 1);
			if(mb_ereg("&#(\\d+);", mb_encode_numericentity($mb_char, $convmap, "UTF-8"), $match))
				$str = sprintf("\\u%04x", $match[1]) . $str;
			else
				$str = $mb_char . $str;
		}
		return $str;
	}
	
	/**
	 * 把对象转成JSON字符串
	 */
	public function json_encode($arr)
	{
		if (function_exists('json_encode')) return json_encode($arr);
		
		$json_str = "";
		if(is_array($arr))
		{
			$pure_array = true;
			$array_length = count($arr);
			
			for($i=0;$i<$array_length;$i++)
			{
				if(! isset($arr[$i]))
				{
					$pure_array = false;
					break;
				}
			}
			
			if($pure_array)
			{
				$json_str ="[";
				$temp = array();
				
				for($i=0;$i<$array_length;$i++)        
					$temp[] = sprintf("%s", $this->php_json_encode($arr[$i]));
			
				$json_str .= implode(",",$temp);
				$json_str .="]";
			}else{
				$json_str ="{";
				$temp = array();
				
				foreach($arr as $key => $value) $temp[] = sprintf("\"%s\":%s", $key, $this->php_json_encode($value));
				
				$json_str .= implode(",",$temp);
				$json_str .="}";
			}
		}else{
			if(is_string($arr))
				$json_str = "\"". $this->json_encode_string($arr) . "\"";
			else if(is_numeric($arr))
				$json_str = $arr;
			else
				$json_str = "\"". $this->json_encode_string($arr) . "\"";
		}
		return $json_str;
	}
	
	/**
	 * 获取 页面的完整地址
	 * @param $code		使用了 URL 编码
	 */
	public function Get_Url($code = false)
	{
		$url = $this->Get_Domain() . $_SERVER['REQUEST_URI'];
		return ($code) ? (rawurlencode($url)) : $url;
	}
	
	/**
	 * 获取域名
	 */
	public function Get_Domain()
	{
		$url = (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) ? 'https://' : 'http://';
		$url .= $_SERVER['HTTP_HOST'];
		return $url;
	}
	
	/**
	 * JS 弹出消息提示
	 * @param $msg		信息
	 * @param $Url		默认返回上一页,给定页面地址,则跳转到新页面
	 * @param $self		父级页面跳转,默认本页跳转,真则是父级页面跳转
	 */
	public function Msg($msg , $Url = 'up' , $self = true)
	{
		header('content-type:text/html; charset=UTF-8');
		if ($Url == 'up')
		{
			echo "<script>alert('{$msg}');history.go(-1);</script>";
		}else{
			if ($self)
				echo "<script>alert('{$msg}');window.location.href='{$Url}';</script>";
			else
				echo "<script>alert('{$msg}');self.parent.location.href='{$Url}';</script>";
		}
		exit;
	}
	
	/**
	 * 中文字符串加亮 
	 * @param $key		关键字
	 * @param $str		被查找的字符串
	 * @param $color	加亮的颜色,默认红色
	 */
	public function plus_shining($key , $str , $color = 'red')
	{
		$str = rawurlencode($str);
		$key = rawurlencode($key);
		$str = str_replace($key , "<font style='color:{$color};font-weight:900'>{$key}</font>" , $str);
		return rawurldecode($str);
	}
	
	/**
	 * 截取字符串
	 * @param $str			字符串
	 * @param $length		截取的长度
	 * @param $Suffix		尾部添加字符
	 * @param $code			编码格式,默认UTF-8
	 */
	public function cut_string($str,$length,$Suffix ='...',$code = 'utf8')
	{
		if (is_string($str) and $str !='')
		{
			$length = intval($length);
			$str = strip_tags($str);
			$length = ($code == 'utf8') ? (($length > 0) ? 3*($length/2) : 20) : (($length > 0) ? $length : 20);
			//截取到有效长度多一点的字段
			$strs = ($code == 'utf8') ? substr($str,0,3*($length+3)) : substr($str,0,2*($length+3));
			
			for ($i = 0;$i < $length;$i++)
			{
				if ($code == 'utf8')
				{
					if (ord($strs) > 224)
					{
						$i +=2;
						$strArr[] = substr($strs,0,3);
						$strs = substr($strs,3);
					}elseif (ord($strs)<192){
						$strArr[] = substr($strs,0,1);
						$strs = substr($strs,1);
					}else{
						$i +=1;
						$strArr[] = substr($strs,0,2);
						$strs = substr($strs,2);
					}
				}else{//GBK
					if (ord($strs) > 192)
					{
						$i +=1;
						$strArr[] = substr($strs,0,2);
						$strs = substr($strs,2);
					}else{
						$strArr[] = substr($strs,0,1);
						$strs = substr($strs,1);
					}
						
				}
			}
			return (strlen($str) > $length) ? join($strArr).$Suffix : join($strArr);
		}else{
			return false;
		}
	}
	
	/**
	 * 随机数
	 * @param $len		生成的位数
	 * @param $type		1 = 数字	/ 2 = 大小写字母 / 3 = 大写字母 / 4 = 小写字母 / 0 = 字母数字混合
	 */
	public function rand_string($len = 40 , $type = 0)
	{
		$string = '';
		switch ($type)
		{
			case 1:
				for ($i = 0 ; $i < $len ; $i++)
				{
					$j = mt_rand(48,57);
					$string.= chr($j);
				}
			break;
			
			case 2:
				for ($i = 0 ; $i < $len ; $i++)
				{
					$j = mt_rand(65,122);
					$j = ($j > 90 && $j < 97) ? 90 : $j;
					$string.= chr($j);
				}
			break;
			
			case 3:
				for ($i = 0 ; $i < $len ; $i++)
				{
					$j = mt_rand(65,90);
					$string.= chr($j);
				}
			break;
			
			case 4:
				for ($i = 0 ; $i < $len ; $i++)
				{
					$j = mt_rand(97,122);
					$string.= chr($j);
				}
			break;
			
			default:
				for ($i = 0 ; $i < $len ; $i++)
				{
					$j = mt_rand(48,122);
					$j = (($j > 57 && $j < 65) || ($j > 90 && $j < 97)) ? 48 : $j;
					$string.= chr($j);
				}
		}
		unset($len , $i , $j);
		
		return $string;
	}
	
	/**
	 * 根据时间的随机数
	 * @param $len		生成的位数
	 * @param $type		1 = 数字	/ 2 = 大小写字母 / 3 = 大写字母 / 4 = 小写字母 / 0 = 字母数字混合
	 */
	public function rand_string_time($len = 40 , $type = 3)
	{
		$time = explode(' ' , microtime());
		$time[0] = (int)($time[0] * 100000000);
		$time[1] = (int)$time[1];
		
		$date[0] = $this->get_time_rand($time[0]);
		$date[1] = $this->get_time_rand($time[1]);
		if (($len = $len - strlen($date[0]) - strlen($date[1]) - 2)) $date[2] = $this->rand_string($len , $type);
		
		return join('-' , $date);
	}
	
	private function get_time_rand($str)
	{
		$array = str_split('0123456789QWERTYUIOPLKJHGFDSAZXCVBNM');
		while($str != 0)
		{
			$b = $str % 36;
			@$t = $array[$b] . $t;
			$str = ($str - $b) / 36;
		}
		return $t;
	}
	
	/**
	 * 过滤字符串中的JS,空行
	 * @param $str		要过滤的字符串
	 */
	public function text_filtrate($str)
	{
		$search = $replace = array();
		$search[] = '/<script[^>]*?>.*?<\/script>/si';
		$search[] = '/expression[^(;|})]*;?/i';
		$search[] = '/([\r\n])[\s]+/';
		
		$replace[] = '';
		$replace[] = '';
		$replace[] = '\\1';
		return preg_replace($search , $replace , $str);
	}
	
	/**
	 * 字符串 过滤 符号
	 * 用途:对需要 进行数据库操作的字符串过滤
	 * @param $str		需要过滤的字符串
	 */
	private function sign_filtrate_one($str)
	{
		return str_replace(array('"','\'',',','%',';') , array('&#34;','&#39;','&#44;','&#37;','&#59;') , $str);
	}
	
	/**
	 * 过滤 符号
	 * 用途:对需要 进行数据库操作的字符串过滤
	 * @param $array_or_str		需要过滤的字符串
	 */
	public function sign_filtrate($array_or_str)
	{
		if (!is_array($array_or_str)) return $this->sign_filtrate_one($array_or_str);
		
		foreach ($array_or_str as $key => $val)
		{
			if (is_array($val) && count($val))
			{
				$array_or_str[$key] = $this->sign_filtrate($val);
			}else
				$array_or_str[$key] = $this->sign_filtrate_one($val);
		}
		return $array_or_str;
	}
	
	/**
	 * 多文件上传
	 */
	private function duo_upFile($dir,$tagName,$saveName,$maxsize,$fileType)
	{
		foreach ($_FILES[$tagName]['name'] as $key => $val)
		{
			if ($_FILES[$tagName]['error'][$key] == 2) continue;
			if ($_FILES[$tagName]['error'][$key] != 0 && $_FILES[$tagName]['tmp_name'][$key] != '') continue;
			
			$SN = ($saveName && $key) ? $key : $this->rand_string(40);
			$SN = is_numeric($key) ? $this->rand_string(40) : $key;
			
			$type = substr(strtolower(strrchr($_FILES[$tagName]['name'][$key],".")),1);
	
			if (!$_FILES[$tagName]['size'][$key]) continue;
			if ($fileType !== false && !in_array($type,$fileType)) continue;
			if ($_FILES[$tagName]['size'][$key] > $maxsize) continue;
			
			if (is_uploaded_file($_FILES[$tagName]['tmp_name'][$key]))
			{
				$ImgName = $dir . $SN . '.' . $type;
				move_uploaded_file($_FILES[$tagName]['tmp_name'][$key] , $ImgName);
				
				//$_FILES[$tagName]['path'] = dirname($_SERVER['PHP_SELF']). '/' . $ImgName;
				
				$_FILES[$tagName]['true_path'][$key] = str_replace('//' , '/' , $ImgName);
				$ImgName = (substr($ImgName , 0 , 3) == '../') ? substr($ImgName ,3) : $ImgName;
				$_FILES[$tagName]['path'][$key] = str_replace('//' , '/' , $ImgName);
			}
		}
		
		unset($_FILES[$tagName]['tmp_name']);
		
		return $_FILES[$tagName];
	}
	
	public function UpFILE($dir,$tagName,$saveName=false,$maxsize=2097152,$fileType=array('jpeg','jpg','gif','png','bmp'))
	{
		$dir .= '/' . date('Y-m') . '/';
		if(!file_exists($dir)) mkdir($dir,0777);
		
		//多文件时传递
		if (is_array($_FILES[$tagName]['name']))
		{
			return $this->duo_upFile($dir , $tagName , $saveName , $maxsize , $fileType);
		}
		
		//print_r($_FILES);exit;
		if ($_FILES[$tagName]['error'] == 2) $this->Msg('文件超过规定大小');
		if ($_FILES[$tagName]['error'] != 0 && $_FILES[$tagName]['tmp_name'] != '') $this->Msg('文件上传失败');
		
		$saveName = ($saveName) ? $saveName : $this->rand_string(40);

		$type = substr(strtolower(strrchr($_FILES[$tagName]['name'],".")),1);

		if (!$_FILES[$tagName]['size']) return null;
		if ($fileType !== false && !in_array($type,$fileType)) return false;
		if ($_FILES[$tagName]['size'] > $maxsize) return false;
		
		if (is_uploaded_file($_FILES[$tagName]['tmp_name']))
		{
			$ImgName = $dir . $saveName . '.' . $type;
			move_uploaded_file($_FILES[$tagName]['tmp_name'] , $ImgName);
			
			unset($_FILES[$tagName]['tmp_name']);
			//$_FILES[$tagName]['path'] = dirname($_SERVER['PHP_SELF']). '/' . $ImgName;
			
			$_FILES[$tagName]['true_path'] = str_replace('//' , '/' , $ImgName);
			$ImgName = (substr($ImgName , 0 , 3) == '../') ? substr($ImgName ,3) : $ImgName;
			$_FILES[$tagName]['path'] = str_replace('//' , '/' , $ImgName);
			return $_FILES[$tagName];
		}
	}
	
	/**
	 * 页面跳转
	 * @param $url			跳转地址
	 * @param $php_jump		跳转方式,true=PHP跳转,false=JS跳转
	 * @param $self			跳转位置,当$php_jump=false时有效,true=本页跳转,flase=父级跳转
	 */
	public function local($url , $php_jump = true , $self = true)
	{
		if ($php_jump)
		{
			//ob_clean();
			header("Location: " . $url);
		}else{
			if ($self)
			{
				header('content-type:text/html; charset=UTF-8');
				echo "<script>window.location='{$url}';</script>";
			}else{
				header('content-type:text/html; charset=UTF-8');
				echo "<script>self.parent.location='{$url}';</script>";
			}
		}
		exit;
	}
	
	/**
	 * 下载文件
	 * @param $file		文件地址
	 * @param $name		下载要显示的文件名,默认为原始文件名
	 */
	public function Download($file , $name = false)
	{
		if (!is_file($file)) return false;
		
		$name = ($name) ? $name . strrchr($file , '.') : basename($file);
		ob_end_clean();
		header('Content-Type: application/octet-stream');
		if (preg_match('/Firefox/' , $_SERVER["HTTP_USER_AGENT"]))
			header('Content-Disposition: attachment; filename=' . str_replace(' ' , '' , $name));
		else
			header('Content-Disposition: attachment; filename=' . str_replace('+' , '%20' , urlencode($name)));
			
		$handle = fopen($file , 'rb');
		while (!feof($handle)) echo fread($handle, 524288);
		fclose($handle);
		exit;
	}
	
	/**
	 * 得到get请求的值
	 * @param $str			某一个GET请求的参数
	 * @param $is_filtrate	是否过滤
	 */
	public function get($str , $is_filtrate = false)
	{
		if (empty($_GET[$str]))
			return false;
		else
		{
			return ($is_filtrate) ? $this->sign_filtrate($this->text_filtrate($_GET[$str])) : $_GET[$str];
			//return $_GET[$str];
		}
	}
	
	/**
	 * 得到POST请求的值
	 * @param $str			某一个GET请求的参数
	 * @param $is_filtrate	是否过滤
	 */
	public function post($str , $is_filtrate = true)
	{
		if (empty($_POST[$str])){
			return false;
		}else{
			return ($is_filtrate) ? $this->sign_filtrate($this->text_filtrate($_POST[$str])) : $_POST[$str];
			//return $_POST[$str];
		}
	}
	
	/**
	 * 获取全部的参数
	 * @param $type		get/post	参数的类型
	 * @param $isPost	bool		为真时使用PostOffSQL过滤
	 * @return 			array/false
	 */
	public function pars_all($type = 'get',$isPost = false)
	{
		$type = ($type == 'get') ? $_GET : $_POST;
		if (count($type) > 0)
		{
			if ($isPost)
			{
				foreach($type as $k => $v)
				{
					if (is_array($v)) continue;
					$type[$k] = $this->text_filtrate($v);
				}
			}
			return $type;
		}else{
			return false;
		}
	}
	
	/**
	 * 改变url路径
	 * 用法				write_url($this->fun->GetUrl() , false , 'abc=abc' , 'ddd=ddd')
	 * @param $URL		当前的URL
	 * @param $DEL		需要删除的参数
	 */
	public function write_url($URL , $DEL = false)
	{
		if ($URL === true) $URL = $this->Get_Url();
		
		$params = func_get_args();
		unset($params[0] , $params[1]);
		//print_r($params);exit;
		
		$url = parse_url($URL);
		$url['query'] = @explode('&' , $url['query']);
		$temp = array();
		
		foreach ($url['query'] as $key => $val)
		{
			$val = explode('=' , $val);
			@$temp[$val[0]] = $val[1];
		}
		$url['query'] = $temp;
		
		//删除参数
		if ($DEL)
		{
			if ($DEL == 'ALL' || $DEL === true)
			{
				@$url['query'] = array('open'=>$url['query']['open']);
			}else{
				$del = explode(',' , $DEL);
				foreach ($del as $val) unset($url['query'][$val]);
			}
		}
		
		unset($URL , $DEL);
		
		foreach ($params as $key => $val)
		{
			$val = explode('=' , $val);
			$url['query'][$val[0]] = $val[1];
		}
		//return http_build_url('' , $url , HTTP_URL_STRIP_AUTH | HTTP_URL_JOIN_PATH | HTTP_URL_JOIN_QUERY | HTTP_URL_STRIP_FRAGMENT);
		$str = '';
		@$str .= ($url['scheme']) ? $url['scheme'] . '://' : '';
		$str .= (isset($url['user']) && isset($url['pass'])) ? $url['user'] . ':' . $url['pass'] . '@' : '';
		@$str .= ($url['host']) ? $url['host'] : '';
		$str .= ($url['path']) ? $url['path'] : '';
		$str .= ($url['query']) ? '?' . str_replace('&amp;' , '&' ,http_build_query($url['query'])) : '';
		$str .= isset($url['fragment']) ? '#' . $url['fragment'] : '';
		
		return $str;
	}
	
	/**
	 * 改变url路径,并且跳转
	 * @param $URL		当前的URL
	 * @param $DEL		需要删除的参数
	 */
	public function local_write_url($URL , $DEL = false)
	{
		$params = func_get_args();
		unset($params[0] , $params[1]);
		$this->local($this->write_url($URL , $DEL , $params));
	}
	
	/**
	 * 获取首字母
	 * @param $str	字符串
	 */
	public function get_first($str)
	{
		$firstchar_ord=ord(strtoupper($str{0}));
		if (($firstchar_ord>=65 && $firstchar_ord<=91) || ($firstchar_ord>=48 && $firstchar_ord<=57)) return $str{0};
		$s=iconv('UTF-8' , 'gb2312' , $str);
		$asc=ord($s{0})*256+ord($s{1})-65536;
		if($asc>=-20319 && $asc<=-20284)return 'A';
		if($asc>=-20283 && $asc<=-19776)return 'B';
		if($asc>=-19775 && $asc<=-19219)return 'C';
		if($asc>=-19218 && $asc<=-18711)return 'D';
		if($asc>=-18710 && $asc<=-18527)return 'E';
		if($asc>=-18526 && $asc<=-18240)return 'F';
		if($asc>=-18239 && $asc<=-17923)return 'G';
		if($asc>=-17922 && $asc<=-17418)return 'H';
		if($asc>=-17417 && $asc<=-16475)return 'J';
		if($asc>=-16474 && $asc<=-16213)return 'K';
		if($asc>=-16212 && $asc<=-15641)return 'L';
		if($asc>=-15640 && $asc<=-15166)return 'M';
		if($asc>=-15165 && $asc<=-14923)return 'N';
		if($asc>=-14922 && $asc<=-14915)return 'O';
		if($asc>=-14914 && $asc<=-14631)return 'P';
		if($asc>=-14630 && $asc<=-14150)return 'Q';
		if($asc>=-14149 && $asc<=-14091)return 'R';
		if($asc>=-14090 && $asc<=-13319)return 'S';
		if($asc>=-13318 && $asc<=-12839)return 'T';
		if($asc>=-12838 && $asc<=-12557)return 'W';
		if($asc>=-12556 && $asc<=-11848)return 'X';
		if($asc>=-11847 && $asc<=-11056)return 'Y';
		if($asc>=-11055 && $asc<=-10247)return 'Z';
		return null;
	}
	
	/**
	 * 是否是电话
	 * @param $str	电话号码
	 */
	public function is_telephone($str)
	{
		return preg_match('/^0[1-9][0-9]{1,2}[-]{0,1}[1-9][0-9]{6,7}$/' , $str);
	}
	
	/**
	 * 是否是手机
	 * @param $str	手机号码
	 */
	public function is_mobile($str)
	{
		return preg_match('/^1[3|5|8][0-9]{9}$/' , $str);
	}
	
	/**
	 * 是否是电子邮件地址
	 * @param $str	电子邮件地址
	 */
	public function is_mail($str)
	{
		return preg_match('/^[_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3}$/i' , $str);
	}
	
	/**
	 * 是否是QQ号码
	 * @param $str	QQ号码
	 */
	public function is_QQ($str)
	{
		return preg_match('/^[1-9][0-9]{4,9}$/' , $str);
	}
	
	/**
	 * 是否是IP地址
	 * @param $str	IP地址
	 */
	public function is_ip($str)
	{
		return ip2long($str);
	}
	
	/**
	 * 是否是HTTP地址
	 * @param $str	HTTP地址
	 */
	public function is_http($str)
	{
		return preg_match('/^http[s]{0,1}://[www\.]{0,1}[-_a-z0-9\.]{1,}[a-z]{2,6}[.a-z]{0,1}[/]{0,1}[-%&?#_a-z0-9/]{0,}$/' , $str);
	}
	
	/**
	 * 是否是邮政编码
	 * @param $str	邮政编码
	 */
	public function is_zipCode($str)
	{
		return preg_match('/^[1-9][0-9]{5}$/' , $str);
	}
	
}

?>