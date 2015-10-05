<?php

if (!class_exists('photo'))
{
	class photo
	{
		public $norm_photo_src , $norm_writing ;
		private $_photo_jb , $norm_photo;
		
		/**
		 * 缩略图
		 * 将生成的缩略图保持到同目录下,并返回相关数组
		 * @param $src		文件
		 * @param $w		宽, 大于 1 = 像素,小于 1 = 百分比
		 * @param $h		高,同上
		 * @return unknown_type
		 */
		public function get_min_photo($src , $w = 0.5 , $h = 0.5 ,$save = true)
		{
			
			$photo = @getimagesize($src);
			if (!in_array($photo[2] , array(1,2,3))) return false;
			
			//文件名
			$photo['name'] = $this->get_photo_name($src);
			
			$go_x_y = $this->w_h_to_x_y($src , $w ,$h);
			if (!$save)
			{
				ob_clean();
				header('Content-type: ' . $photo['mime']);
				$photo['file_name'] = null;
			}else{
				$photo['file_name'] = str_replace($photo['name'][0].'.'.$photo['name'][1] , $photo['name'][0] . '_min.' . $photo['name'][1] , $src);
			}
			
			$min = imagecreatetruecolor($go_x_y['w'] , $go_x_y['h']);
			switch ($photo[2])
			{
				//GIF
				case 1:
					imagecopyresampled($min,imagecreatefromgif($src),0,0,$go_x_y['x'],$go_x_y['y'],$go_x_y['src_w'],$go_x_y['src_h'],$photo[0] , $photo[1]);
					imagegif($min, $photo['file_name']);
				break;
				
				//JPG
				case 2:
					imagecopyresampled($min,imagecreatefromjpeg($src),0,0,$go_x_y['x'],$go_x_y['y'],$go_x_y['src_w'],$go_x_y['src_h'],$photo[0] , $photo[1]);
					imagejpeg($min, $photo['file_name'] , 100);
				break;
				
				//PNG
				case 3:
					imagecopyresampled($min,imagecreatefrompng($src),0,0,$go_x_y['x'],$go_x_y['y'],$go_x_y['src_w'],$go_x_y['src_h'],$photo[0] , $photo[1]);
					imagepng($min, $photo['file_name']);
				break;
			}
			
			$photo[0] = $go_x_y['w'];
			$photo[1] = $go_x_y['h'];
			$photo[3] = "width='{$go_x_y['w']}' height='{$go_x_y['h']}'";
			return $photo;
		}
		
		/**
		 * 在原图基础上生成水印
		 * @param $src		文件地址
		 * @param $save		保存文件/输出文件(默认保存)
		 * @param $alpha	水印透明度
		 * @param $x		X位置
		 * @param $y		Y位置
		 */
		public function write_norm($src , $save = true , $alpha = 80 ,$x = 'C' , $y = 'C')
		{
			$this->_photo_jb = @getimagesize($src);
			if (!$this->_photo_jb) return false;
			if (!in_array($this->_photo_jb[2] , array(1,2,3))) return false;
			
			$x_y = $this->_norm_x_y($src , $x , $y);
			
			if ($this->norm_photo_src)
			{
				$this->_norm_photo($src , $save , $alpha , $x_y);
			}else{
				$this->_norm_writing($src , $save , $alpha , $x_y);
			}
		}
		
		/**
		 * 取得文件[名 , 后缀]
		 */
		private function get_photo_name($src)
		{
			if (strrchr($src , '/')) $src = substr(strrchr($src , '/'),1);
			return explode('.' , $src);
		}
		
		/**
		 * 通过宽高计算所需的坐标
		 * @param $src	文件
		 * @param $w	宽
		 * @param $h	高
		 * @return		返回相关数组
		 */
		private function w_h_to_x_y($src , $w = 0.5 , $h = 0.5)
		{
			$photo = @getimagesize($src);
			$w = ($w <= 1) ? (int)($w * $photo[0]) : (int)$w;
			$h = ($h <= 1) ? (int)($h * $photo[1]) : (int)$h;
			
			$arr = array('w'=>$w , 'h'=>$h ,'x'=>0 ,'y'=>0 ,'src_w'=>$photo[0],'src_h'=>$photo[1]);
			if (($w / $photo[0]) == ($h / $photo[1])) return $arr;
			
			$scale = (($w / $photo[0]) > ($h / $photo[1])) ? $w / $photo[0] : $h / $photo[1];
			$arr['src_w'] = (int)($photo[0] * $scale + 1);
			$arr['src_h'] = (int)($photo[1] * $scale + 1);
			
			$arr['x'] = (int)(($arr['src_w'] - $w) / 2);
			$arr['y'] = (int)(($arr['src_h'] - $h) / 2);
			
			return $arr;
		}
		
		private function _norm_x_y($src , $x , $y)
		{
			$src = @getimagesize($src);
			
			$x = (is_numeric($x)) ? (int)$x : $this->_norm_get_xy($src , $x , 'x');
			$y = (is_numeric($y)) ? (int)$y : $this->_norm_get_xy($src , $y , 'y');
			
			$x = ($x > $src[0]) ? $src[0] : $x;
			$y = ($y > $src[1]) ? $src[1] : $y;
			return array($x , $y);
		}
		
		private function _norm_get_xy($src , $shu , $direction)
		{
			$norm = @getimagesize($this->norm_photo_src);
			
			switch (strtolower($shu))
			{
				//中
				case 'center':case 'c':
					return ($direction == 'x') ? (int)(($src[0] - $norm[0]) / 2) : (int)(($src[1] - $norm[1]) / 2);
				break;
				
				//上
				case 'up':case 'top':case 'u':case 't':return 20;break;
				
				//下
				case 'down':case 'bottom':case 'd':case 'b':return  $src[1] - $norm[1] - 20;break;
				
				//左
				case 'left':case 'l':return 20;break;
				
				//右
				case 'right':case 'r':return $src[0] - $norm[0] - 20;break;
			}
			unset($norm);
		}
		
		private function _norm_open($src)
		{
			$srcs = @getimagesize($src);
			if (!in_array($srcs[2] , array(1,2,3))) return false;
			switch ($srcs[2])
			{
				case 1: return imagecreatefromgif($src); break;
				case 2: return imagecreatefromjpeg($src); break;
				case 3: return imagecreatefrompng($src); break;
			}
			unset($srcs);
		}
		
		private function _norm_photo($src , $save , $alpha , $x_y)
		{
			$this->norm_photo = @getimagesize($this->norm_photo_src);
			if ($this->norm_photo[0] > $this->_photo_jb[0] || $this->norm_photo[1] > $this->_photo_jb[1])
				return false;
			
			if (!$save)
			{
				ob_clean();
				header('Content-type: ' . $this->_photo_jb['mime']);
				$this->_photo_jb['name'] = null;
			}else{
				$this->_photo_jb['name'] = $src;
			}
			
			$photo = $this->_norm_open($src);
			$_norm = $this->_norm_open($this->norm_photo_src);
			
			imagecopymerge($photo ,$_norm ,$x_y[0],$x_y[1],0,0,$this->norm_photo[0],$this->norm_photo[1],$alpha);
			imagejpeg($photo, $this->_photo_jb['name'], 100);
		}
		
		private function _norm_writing($src , $save , $alpha , $x_y)
		{
			
		}
	}
}
?>