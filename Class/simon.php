<?php
class simon {
	
	public function getIP()
	{
		if($_SERVER['REMOTE_ADDR'])
		{
			return $_SERVER['REMOTE_ADDR'];
		}elseif(getenv('REMOTE_ADDR')){
			return getenv('REMOTE_ADDR');
		}else{
			return $HTTP_SERVER_VARS['REMOTE_ADDR'];
		}
	}
	
	public function json_encode_string($in_str)
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
	
	public function php_json_encode($arr)
	{
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
				
				foreach($arr as $key => $value)
					$temp[] = sprintf("\"%s\":%s", $key, $this->php_json_encode($value));
				
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
		
	public function GetUrl($code = false)
	{
		if (strtolower(substr($_SERVER['SERVER_PROTOCOL'],0,5)) == 'https')
			$url = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		else
			$url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		return ($code) ? (rawurlencode($url)) : $url;
	}
	
	public function GetDomain()
	{
		if (strtolower(substr($_SERVER['SERVER_PROTOCOL'],0,5)) == 'https')
			$url = 'https://' . $_SERVER['HTTP_HOST'];
		else
			$url = 'http://' . $_SERVER['HTTP_HOST'];
		return $url;
	}
	
	/*
	 * base64 加密
	 */
	public function base64_encode($str = false , $replace = false)
	{
		$str = ($str) ? base64_encode($str) : $str;
		return ($replace) ? str_replace('=' , '*' , $str) : $str;
	}
	
	/**
	 * base64 解密
	 */
	public function base64_decode($str = false)
	{
		return ($str) ? base64_decode(str_replace('*','=',$str)) : false;
	}
	
	public function Msg($msg , $Url = 'up' , $self = false)
	{
		header('content-type:text/html; charset=UTF-8');
		if ($Url == 'up'){
			echo "<script>alert('{$msg}');history.go(-1);</script>";exit;
		}else{
			if ($self)
			{
				echo "<script>alert('{$msg}');self.parent.location.href='{$Url}';</script>";exit;
			}else{
				echo "<script>alert('{$msg}');window.location.href='{$Url}';</script>";exit;
			}
		}
		unset($msg,$Url);
		exit;
	}

	/*
	 * 中文字符串加亮 
	 */
	public function Highlights($str , $NowStr , $color = 'red')
	{
		$str = rawurlencode($str);
		$NowStr = rawurlencode($NowStr);
		$str = str_replace($NowStr , "<font style='color:{$color};font-weight:900'>{$NowStr}</font>" , $str);
		return rawurldecode($str);
	}

	public function CutString($str,$Length,$Suffix ='...',$code = 'utf8')
	{
		if (is_string($str) and $str !='')
		{
			$Length = intval($Length);
			$str = strip_tags($str);
			$Length = ($code == 'utf8') ? (($Length > 0) ? 3*($Length/2) : 20) : (($Length > 0) ? $Length : 20);
			//截取到有效长度多一点的字段
			$strs = ($code == 'utf8') ? substr($str,0,3*($Length+3)) : substr($str,0,2*($Length+3));
			
			for ($i = 0;$i < $Length;$i++)
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
			return (strlen($str) > $Length) ? join($strArr).$Suffix : join($strArr);
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
					$j = ($j > 90 && $j < 97) ? 65 : $j;
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

	public function PostOffSQL($str)
	{
		$str = strtr($str , array('<script ' => '< s c r i p t ' , '</script>' => '< / s c r i p t >' , 'expression' => 'e x p r e s s i o n'));
		$PostOffSQL=str_replace(chr(34) , '&#34;' , trim($str));
		$PostOffSQL=str_replace(chr(39) , '&#39;' , $PostOffSQL);
		$PostOffSQL=str_replace(chr(40) , '&#40;' , $PostOffSQL);
		$PostOffSQL=str_replace(chr(41) , '&#41;' , $PostOffSQL);
		$PostOffSQL=str_replace(chr(42) , '&#42;' , $PostOffSQL);
		$PostOffSQL=str_replace(chr(91) , '&#91;' , $PostOffSQL);
		$PostOffSQL=str_replace(chr(93) , '&#93;' , $PostOffSQL);
		return str_replace('\&#39;' , '&#39;' , str_replace('\&#34;' , '&#34;' , $PostOffSQL));
		unset($str,$PostOffSQL);
	}

	public function Revert($str)
	{
		$Revert = str_replace('&#34;' , chr(34) , trim($str));
		$Revert = str_replace('&#39;' , chr(39) , $Revert);
		$Revert = str_replace('&#40;' , chr(40) , $Revert);
		$Revert = str_replace('&#41;' , chr(41) , $Revert);
		$Revert = str_replace('&#42;' , chr(42) , $Revert);
		$Revert = str_replace('&#91;' , chr(91) , $Revert);
		$Revert = str_replace('&#93;' , chr(93) , $Revert);
		return $Revert;
		unset($str,$Revert);
	}

	public function IsTel($str)
	{
		if (ereg("^0[1-9][0-9]{1,2}-[1-9][0-9]{6,7}$",$str)){return true;}
		return false;
		unset($str);
	}

	public function IsPhone($str)
	{
		if (ereg("^1[3|5|8][0-9]{9}$",$str)){return true;}
		return false;
		unset($str);
	}
		
	public function IsMail($str)
	{
		if (eregi("^[_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3}$",$str)){return true;}
		return false;
		unset($str);
	}

	public function IsQQ($str)
	{
		if(ereg("[1-9][0-9]{4,9}$",$str)){return true;}
		return false;
		unset($str);
	}
	
	public function IsIP($str)
	{
		if (strcmp(long2ip(ip2long($str)) ,$str) == 0)
			return true;
		else
			return false;
	}

	public function IsHttp($str)
	{
		if (ereg("^http[s]{0,1}://[www\.]{0,1}[-_a-z0-9\.]{1,}[a-z]{2,6}[.a-z]{0,1}[/]{0,1}[-%&?#_a-z0-9/]{0,}$", strtolower($str))) {return true;}
		return false;
		unset($str);
	}

	public function IsNull($str)
	{
		if (!is_string($str)) return true;
		if (empty($str)) return true;
		if ($str=='') return true;
		unset($str);
		return false;
	}

	public function IsZipCode($str)
	{
		if(eregi("^[1-9][0-9]{5}$",$str)){return true;}
		unset($str);
		return false;
	}

	public function UpFILE($dir,$tagName,$saveName=false,$maxsize=2097152,$fileType=array('jpeg','jpg','gif','png','bmp'))
	{
		$dir .= '/' . date('Y-m') . '/';
		if(!file_exists($dir)) mkdir($dir,0777);
		if ($_FILES[$tagName]['error'] == 2) $this->Msg('文件超过规定大小');
		if ($_FILES[$tagName]['error'] != 0 && $_FILES[$tagName]['tmp_name'] != '') $this->Msg('文件上传失败');
		
		$saveName = ($saveName) ? $saveName : $this->rand_string(40);

		$type = substr(strtolower(strrchr($_FILES[$tagName]['name'],".")),1);

		if (!$_FILES[$tagName]['size']) return null;
		if (!in_array($type,$fileType)) return false;
		if ($_FILES[$tagName]['size'] > $maxsize) return false;
		
		if (is_uploaded_file($_FILES[$tagName]['tmp_name']))
		{
			$ImgName = $dir . $saveName . '.' . $type;
			move_uploaded_file($_FILES[$tagName]['tmp_name'] , $ImgName);
			
			unset($_FILES[$tagName]['tmp_name']);
			//$_FILES[$tagName]['path'] = dirname($_SERVER['PHP_SELF']). '/' . $ImgName;
			
			$_FILES[$tagName]['true_path'] = $ImgName;
			$ImgName = (substr($ImgName , 0 , 3) == '../') ? substr($ImgName ,3) : $ImgName;
			$_FILES[$tagName]['path'] = str_replace('//' , '/' , $ImgName);
			return $_FILES[$tagName];
		}
	}
	
	public function up_file_all($dir,$tagName,$maxsize=2097152,$fileType=array('jpeg','jpg','gif','png','bmp'))
	{
		if(!file_exists($dir)) mkdir($dir,0777);
		
		if (is_array($_FILES[$tagName]['name']))
		{
			foreach ($_FILES[$tagName]['name'] as $key => $val)
			{
				if ($_FILES[$tagName]['error'][$key] != 0) unset($_FILES[$tagName]['tmp_name'][$key]);
				if (!$_FILES[$tagName]['size'][$key]) unset($_FILES[$tagName]['tmp_name'][$key]);
				
				$type = substr(strtolower(strrchr($val,".")),1);
				if (!in_array($type,$fileType)) unset($_FILES[$tagName]['tmp_name'][$key]);
				if ($_FILES[$tagName]['size'][$key] > $maxsize) unset($_FILES[$tagName]['tmp_name'][$key]);
				
				if (is_uploaded_file($_FILES[$tagName]['tmp_name'][$key]))
				{
					$saveName = (is_numeric($key)) ? $this->RndCode(40) : $key;
					$ImgName = $dir . $saveName . '.' . $type;
					move_uploaded_file($_FILES[$tagName]['tmp_name'][$key] , $ImgName);
					
					$_FILES[$tagName]['true_path'][$key] = $ImgName;
					$ImgName = (substr($ImgName , 0 , 3) == '../') ? substr($ImgName ,3) : $ImgName;
					$_FILES[$tagName]['path'][$key] = $ImgName;
				}
			}
			unset($_FILES[$tagName]['tmp_name']);
			return $_FILES[$tagName];
		}else{
			return $this->UpFILE($dir , $tagName, null , $maxsize , $fileType);
		}
	}
	
	public function local($url,$y = true,$self = false)
	{
		if ($y)
		{
			ob_clean();
			header("Location: ".$url);exit;
		}else{
			if ($self)
			{
				header('content-type:text/html; charset=UTF-8');
				echo "<script>self.parent.location='{$url}';</script>";
				exit;
			}else{
				header('content-type:text/html; charset=UTF-8');
				echo "<script>window.location='{$url}';</script>";
				exit;
			}
		}
	}
	
	/**
	 * 下载文件
	 * @param $url		文件地址
	 * @param $name		文件名		default:false
	 */
	public function Download($url , $name = false)
	{
		if (!is_file($url)) return false;
		
		$name = ($name) ? $name . strrchr($url , '.') : basename($url);
		ob_end_clean();
		header('Content-Type: application/octet-stream');
		if (preg_match('/Firefox/' , $_SERVER["HTTP_USER_AGENT"]))
			header('Content-Disposition: attachment; filename=' . str_replace(' ' , '' , $name));
		else
			header('Content-Disposition: attachment; filename=' . str_replace('+' , '%20' , urlencode($name)));
			
		$handle = fopen($url , 'rb');
		while (!feof($handle)) echo fread($handle, 524288);
		fclose($handle);
		exit;
	}

	public function get($str,$isPost = false)
	{
		if (empty($_GET[$str])){
			return false;
		}else{
			return ($isPost) ? $this->PostOffSQL($_GET[$str]) : $_GET[$str];
		}
		unset($str);
	}

	public function post($str,$isPost = true)
	{
		if (empty($_POST[$str])){
			return false;
		}else{
			return ($isPost) ? $this->PostOffSQL($_POST[$str]) : $_POST[$str];
		}
		unset($str);
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
					$type[$k] = $this->PostOffSQL($v);
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
		$params = func_get_args();
		unset($params[0] , $params[1]);
		
		$url = parse_url($URL);
		$url['query'] = explode('&' , $url['query']);
		$temp = array();
		
		foreach ($url['query'] as $key => $val)
		{
			$val = explode('=' , $val);
			$temp[$val[0]] = $val[1];
		}
		$url['query'] = $temp;
		
		//删除参数
		if ($DEL)
		{
			if ($params['DEL'] == 'ALL')
				$url['query'] = array('open'=>$url['query']['open']);
			else
			{
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
		$str .= ($url['scheme']) ? $url['scheme'] . '://' : '';
		$str .= ($url['user'] && $url['pass']) ? $url['user'] . ':' . $url['pass'] . '@' : '';
		$str .= ($url['host']) ? $url['host'] : '';
		$str .= ($url['path']) ? $url['path'] : '';
		$str .= ($url['query']) ? '?' . str_replace('&amp;' , '&' ,http_build_query($url['query'])) : '';
		$str .= ($url['fragment']) ? '#' . $url['fragment'] : '';
		
		return $str;
	}
	
	/**
	 * 改变url路径,并且跳转
	 * @param $URL		当前的URL
	 * @param $DEL		需要删除的参数
	 */
	public function local_write_url($URL , $DEL = false)
	{
		$this->local($this->write_url($URL , $DEL));
	}
	
}

?>