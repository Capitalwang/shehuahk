<?php
	class import extends start
	{
		private static $exchange;
		
		private $tab_name , $CerNO , $exist_CerNO , $i18n , $weight_level , $replace;
		
		public function __construct()
		{
			parent::__construct(true);
		}
		
		public function show()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			$this->sma->display('import_show');
		}
		
		//从接口获取CSV文件
		public function show_exec()
		{
			if (!$this->BTP[$this->get['open']]['show']) {echo $this->BTP_Words;exit;}
			
			ini_set('max_execution_time','0');
			
			$get = $this->fun->pars_all('get' , true);
			$get['start'] = (float)sprintf('%.2f', $get['start']);
			$get['stop'] = (float)sprintf('%.2f', $get['stop']);
			
			if ($get['start'] && $get['stop'])
			{
				if ($get['start'] > $get['stop'])
				{
					$get['stop'] = $get['start'] + $get['stop'];
					$get['start'] = $get['stop'] - $get['start'];
					$get['stop'] = $get['stop'] - $get['start'];
				}
				
				$auth_url = 'https://technet.rapaport.com/HTTP/Authenticate.aspx';
				$post_string = 'username=78139&password=' . urlencode('335808!@#SH');
				
				$request = curl_init($auth_url);
				curl_setopt($request, CURLOPT_HEADER, 0);
				curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($request, CURLOPT_POSTFIELDS, $post_string);
				curl_setopt($request, CURLOPT_SSL_VERIFYPEER, FALSE);
				$auth_ticket = curl_exec($request);
				curl_close ($request);
				
				for ($i = $get['start'] ; $i < $get['stop'] + 0.01 ;)
				{
					
					$feed_url = 'http://technet.rapaport.com/HTTP/RapLink/download.aspx?ColorIDs=1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23&ClarityIDs=1,2,3,4,5,6,7,8,9,10,11,12&DiscountFrom=-80&DiscountTo=+70&ShapeIDs=1,2,3,4,9,7,8,11,15,16&ExcludedSellers=44275,68448,6412,73881,73713,61748,73217,71100,70958,71303,68862,71747,55376,53466,71211,73248,71344,43093,63048,74464,52372,47821,73826,76410&WeightFrom='.$i.'&WeightTo='.$i.'&LabIDs=1,2,5&CountryIDs=204,217,208&SortBy=Owner&White=1&Fancy=1&Programmatically=yes&Version=1.0&UseCheckedCulommns=1&cCT=1&cCERT=1&cCLAR=1&cCOLR=1&cCUT=1&cDPTH=1&cFLR=1&cLOTNN=1&cMEAS=1&cPOL=1&cTPr=1&cAct=1&cSHP=1&cSYM=1&cTBL=1&cCertID=1&ticket=' . $auth_ticket;
					$fp = fopen('../csv/' . $i . '.csv' , 'wb');
					if ($fp == FALSE)
					{
						echo "File not opened";exit;
					}
					$request = curl_init($feed_url);
					curl_setopt($request, CURLOPT_FILE, $fp);
					curl_setopt($request, CURLOPT_HEADER, 0);
					curl_setopt($request, CURLOPT_TIMEOUT, 300);
					curl_exec($request);
					curl_close ($request); 
					fclose($fp);
					
					//$_SESSION['back']['import'][$i] = $i;
					echo $i ,' ct 处理完成', '<br />';
					$i = sprintf('%.2f' , $i + 0.01);
				}
				
			}else{
				echo '请输入一个正确的钻石重量';
			}
		}
		
		//CSV导入数据库(标准)
		public function standard()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			
			$this->sma->display('import_standard');
		}
		
		//CSV导入数据库(标准) 执行
		public function standard_exec()
		{
			if (!$this->BTP[$this->get['open']]['standard']) {echo $this->BTP_Words;exit;}
			
			ini_set('max_execution_time','0');
			
			$get = $this->fun->pars_all('get' , true);
			$get['start'] = (float)sprintf('%.2f', $get['start']);
			$get['stop'] = (float)sprintf('%.2f', $get['stop']);
			if ($get['start'] && $get['stop'])
			{
				if ($get['start'] > $get['stop'])
				{
					$get['stop'] = $get['start'] + $get['stop'];
					$get['start'] = $get['stop'] - $get['start'];
					$get['stop'] = $get['stop'] - $get['start'];
				}
				for ($i = $get['start'] ; $i <= $get['stop'] ; )
				{
					$csv = new import_csv;
					$csv->db = $this->db;
					$csv->fun = $this->fun;
					$csv->exec($i);
					$i = sprintf('%.2f' , $i + 0.01);
				}
				
				//$this->db->update('product' , array('status'=>'down') , "status='up' and agio>0 and weight>0.3");

			}else{
				echo '请输入一个正确的钻石重量';
			}
		}
		
		//CSV导入数据库(自定义)
		public function customize()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			$this->default_value();
			if ($this->get['go']) $this->{$this->get['go']}();
			
			$this->sma->display('import_customize');
		}
		
		//得到上传文件
		private function _up()
		{
			$photo = $this->fun->UpFILE('../upload/csv/','csv' , null , 2097152 , array('csv'));
			if (!$photo['path'])
			{
				$this->fun->Msg('请选择CSV文件');
			}else{
				return $photo['path'];
			}
		}
		
		private function default_value()
		{
			$this->tab_name = array(
				'0' => '此列数据无用',
				'customize_NO' => '自定义 编号',
				'diploma' => '证书类型',
				'diplomaNO' => '证书编号',
				'amount' => '数量',
				'shape' => '形状',
				'weight' => '重量',
				'color' => '颜色',
				'clarity' => '净度',
				'cut' => '切工',
				'buffing' => '抛光',
				'symmetry' => '对称',
				'Fent_Isity' => '荧光强度',
				'Fent_color' => '荧光颜色',
				'scalar_value' => '测量值(直径)',
				'body_ratio' => '全身比',
				'table_width' => '台宽比',
				'sellerID' => '商家/卖家 ID',
				'stockAddress' => '库存地点',
				'country' => '国家',
				'infml_USD' => '进货价(美元)',
				'infml_RMB' => '进货价(人民币)',
				'previousNO' => '货物原编号',
				'userRemark' => '备注'
			);
			
			$this->replace = array(
				's:5:"Round"' => 's:5:"round"',
				's:9:"Excellent"' => 's:2:"EX"',
				's:9:"Very Good"' => 's:2:"VG"',
				's:5:"Ideal"' => 's:2:"ID"',
				's:4:"Good"' => 's:1:"G"',
				's:4:"Fair"' => 's:2:"FR"',
				's:4:"Poor"' => 's:2:"PR"',
				's:5:"None "' => 's:1:"N"',
				's:12:"Very Slight "' => 's:3:"VSL"',
				's:7:"Slight "' => 's:4:"F/SL"',
				's:6:"Faint "' => 's:4:"F/SL"',
				's:7:"Medium "' => 's:1:"M"',
				's:7:"Strong "' => 's:1:"S"',
				's:12:"Very Strong "' => 's:2:"VS"',
				's:11:"Strong Blue"' => 's:1:"S"',
				's:11:"Medium Blue"' => 's:1:"M"',
				's:10:"Faint Blue"' => 's:4:"F/SL"',
				's:13:"Medium Yellow"' => 's:1:"M"',
				's:16:"Very Strong Blue"' => 's:2:"VS"',
				's:14:"Good-Very Good"' => 's:2:"VG"',
				's:12:"Medium Green"' => 's:1:"M"'
			);
		}
		
		private function doo()
		{
			$CSV_file = $this->_up();

			$handle = fopen('../' . $CSV_file , "r");
			
			$i = 0;
			$tab = '<table class="tas" width="100%" border="0" cellspacing="1" cellpadding="0">' . chr(13);
			while ($csv = fgetcsv($handle))
			{
				if ($i > 2) break;
				$k = 0;
				$tab .= '<tr align="center">' . chr(13);
				foreach($csv as $val)
				{
					$k++;
					$tab .= '<td>' . $val . '</td>' . chr(13);
				}
				
				$tab .= '</tr>' . chr(13);
				$i++;
			}
			
			$tab .= '<tr align="center">' . chr(13);
			for ($p = 0 ; $p < $k ; $p++)
			{
				$tab .= '<td><select name="csv_data[]">';
				foreach($this->tab_name as $key => $val)
				{
					$tab .= '<option value="' .$key. '">' . $val . '</option>';
				}
				$tab .= '</select></td>' . chr(13);
			}
			$tab .= '</tr>' . chr(13);
			
			$tab .= '</table>';
			
			$this->sma->assign('file_url' , '../' . $CSV_file);
			$this->sma->assign('tab_html' , $tab);
		}
		
		//得到写入的1维数组
		private function get_data($file , $key , $exchange , $is_new = true)
		{
			//print_r($file);exit;
			if (count($file))
			{
				if ($is_new) $file['id'] = $this->fun->rand_string(20);
				if ($is_new)
				{
					$file['ProID'] = ($file['customize_NO']) ? $file['customize_NO'] : $this->get_id($file['weight']);
				}
				$file['status'] = 'up';
				$file['amount'] = (is_numeric($file['amount']) && $file['amount']>0) ? (int)$file['amount'] : 1;
				$file['weight'] = (float)sprintf('%.2f' , $file['weight']);
				if ($is_new) $file['proSource'] = 'comate';
				if ($file['infml_USD'])
				{
					$file['infml'] = sprintf('%.2f' , (float)$file['infml_USD'] * self::$exchange['USD']);
				}else{
					$file['infml'] = sprintf('%.2f' , (float)$file['infml_RMB']);
				}
				unset($file['infml_USD'] , $file['infml_RMB'] , $file['customize_NO']);
				
				$file['INTbid'] = $this->get_bid($file['color'] , $file['clarity'] , $file['weight']);
				$file['agio'] = sprintf('%.2f' , $file['infml'] / $file['weight'] / $file['INTbid'] * 100 -100);
				if ($is_new) $file['time'] = mktime();
			}
			return (is_array($file)) ? $file : false;
		}
		
		private function go()
		{
			ini_set('max_execution_time','0');
			
			$post = $this->fun->pars_all('post' , true);
			
			$csv_flie = $post['file_url'];
			
			//取得汇率
			$this->get_exchange();
			
			//对选择的列进行判断,处理
			$this->_get_cf_array(&$post);
			
			//读取csv文件
			$post = $this->read_csv($post);
			
			//取得一维的证书编号
			$this->CerNO = $this->get_CerNO($post);
			
			//返回数据库中存在的证书
			$this->exist_CerNO = $this->get_exist_CerNO($this->CerNO);

			//如果存在,更新数据
			if ($this->exist_CerNO) $this->update_db(&$post , $this->exist_CerNO);
			
			//写入新数据
			$this->write_db($post);
			
			@unlink($csv_flie);
			
			$this->fun->local('./?open=import&action=customize&go=end');
		}
		
		//如果存在,更新数据,同时删除post对应的项目
		private function update_db(&$post , $exist_NO)
		{
			foreach ($exist_NO as $val)
			{
				if ($array = $this->get_data($post[$val] , $val , 6.82 , false))
				{
					$this->db->update('product' , $array , "diplomaNO='{$val}'" , true);
					unset($post[$val]);
				}
			}
			
			
		}
		
		private function end()
		{
			
		}
		
		//写入新数据
		private function write_db($post)
		{
			foreach ($post as $key => $val)
			{
				$array = $this->get_data($val , $key , 6.82 , true);
				$this->db->insert('product' , $array , true);
			}
		}
		
		//返回数据库中存在的证书
		private function get_exist_CerNO($array)
		{
			$SQL = "('" . join("','" , $array) . "')";
			return $this->db->select_N_to_1key('select diplomaNO from product where diplomaNO in '. $SQL , 'diplomaNO');
		}
		
		//取得一维的证书编号
		private function get_CerNO($array)
		{
			foreach ($array as $key => $val) $NEW[$key] = $val['diplomaNO'];
			return $NEW;
		}
		
		//读取csv文件
		private function read_csv($post)
		{
			$handle = fopen($post['file_url'] , "r");
			
			$i = 0;
			while ($csv = fgetcsv($handle))
			{
				$Hs = array();
				$is_write = false;
				
				foreach ($post['csv_data'] as $key => $val)
				{
					if (!empty($csv[$key]) && !$is_write) $is_write = true;
					$Hs[$val] = $csv[$key];
				}
				if ($is_write) $dos[$i] = $Hs;
				$i++;
			}
			
			//删除POST提交的行数
			$del_NO = explode(',' , $post['del_NO']);
			foreach ($del_NO as $val) unset($dos[(int)$val - 1]);
			
			//删除重复的证书编号的行
			$this->del_GIA_CF(&$dos , $post);
			return $dos;
		}
		
		//删除重复的证书编号的行
		private function del_GIA_CF(&$dos , $post)
		{
			$length = count($dos);
			foreach ($dos as $key => $val)
			{
				if (!(is_null($val['diplomaNO']) || empty($val['diplomaNO']) || $val['diplomaNO'] == ''))
				{
					//单行替换数据
					$val = serialize($val);
					$val = strtr($val , $this->replace);
					$val = unserialize($val);
					if (is_numeric($val['weight']) && in_array($val['color'] , array('M','L','K','J','I','H','G','F','E','D')) && $val['clarity'] && (is_numeric($val['infml_USD']) || is_numeric($val['infml_RMB'])) )
						$NEW[$val['diplomaNO']] = $val;
				}
			}
			$dos = $NEW;
			//unset($NEW);
		}
		
		/**
		 * 取得汇率
		 */
		private function get_exchange()
		{
			if (self::$exchange) return self::$exchange;
			
			if (($show = $this->db->select_to_2Array("select currency,exchange from exchange")) != false)
			{
				foreach ($show as $key => $val) self::$exchange[$val['currency']] = $val['exchange'];
				unset($show);
				return self::$exchange;
			}
		}
		
		//对选择的列进行判断,处理
		private function _get_cf_array(&$post)
		{
			if (!is_file($post['file_url'])) $this->fun->Msg('你上传的文件不存在');
			
			foreach ($post['csv_data'] as $key => $val) if (!$val) unset($post['csv_data'][$key]);
			$cf = array_count_values($post['csv_data']);
			
			foreach ($cf as $key => $val) if ($val > 1) $msg .= $this->tab_name[$key] . '  ' . $val . '次  重复\n';
			if ($msg) $this->fun->Msg($msg);
			$cf = array_flip($post['csv_data']);
			
			if (is_null($cf['diplomaNO'])) $this->fun->Msg($this->tab_name['diplomaNO'] . ' 为必选选择的对象');
			if (is_null($cf['weight'])) $this->fun->Msg($this->tab_name['weight'] . ' 为必选选择的对象');
			if (is_null($cf['color'])) $this->fun->Msg($this->tab_name['color'] . ' 为必选选择的对象');
			if (is_null($cf['clarity'])) $this->fun->Msg($this->tab_name['clarity'] . ' 为必选选择的对象');
			if (is_null($cf['infml_USD']) && is_null($cf['infml_RMB'])) $this->fun->Msg('进货价 为必选选择的对象');
		}
		
		/**
		 * 生成ID
		 */
		private function get_id($weight)
		{
			$weight = str_pad($weight * 100 , 4 , '0' , STR_PAD_LEFT);
			$proSource = $this->fun->rand_string(1 , 3);
			$proSource .= $proSource;
			return $weight . '-'. $proSource . '-' . $this->fun->rand_string(8 , 1);
		}
		
		/**
		 * 取得国际报价
		 * @param $color	颜色
		 * @param $clarity	净度
		 * @param $weight	重量
		 * @param $is_php	PHP / ajax 调用
		 */
		private function get_bid($color , $clarity , $weight)
		{
			$exchange = $this->get_exchange();
			
			$bid = $this->db->select_to_1Array("select price from bid where color='{$color}' and clarity='{$clarity}' and weight_start<='{$weight}' and weight_stop>='{$weight}'");
			return ($bid['price']) ? sprintf('%0.2f' , $bid['price'] * $exchange['USD']) : 0;
		}
	}
	
	class import_csv
	{
		private static $replace , $exchange;
		private $CSV_id , $BID;
		
		public $db , $file_address , $fun;
		
		/**
		 * 生成ID
		 */
		private function get_id($weight)
		{
			$weight = str_pad($weight * 100 , 4 , '0' , STR_PAD_LEFT);
			return $weight . '-'. $this->fun->rand_string(2 , 3) . '-' . $this->fun->rand_string(8 , 1);
		}
		
		//得到写入的1维数组
		private function get_data($file , $val , $exchange , $BID , $is_new = true)
		{
			if (count($file))
			{
				$array = array();
				if ($is_new) $array['id'] = $this->fun->rand_string(20);
				if ($is_new) $array['ProID'] = $this->get_id($file[$val][2]);
				$array['previousNO'] = $file[$val][15];
				$array['status'] = 'up';
				if ($is_new) $array['amount'] = 1;
				$array['shape'] = $file[$val][1];
				$array['weight'] = sprintf('%.2f' , (float)$file[$val][2]);
				$array['color'] = $file[$val][3];
				$array['clarity'] = $file[$val][4];
				$array['cut'] = $file[$val][5];
				$array['buffing'] = $file[$val][6];
				$array['symmetry'] = $file[$val][7];
				$array['Fent_Isity'] = $file[$val][8];
				$array['scalar_value'] = $file[$val][9];
				$array['body_ratio'] = $file[$val][13];
				$array['table_width'] = $file[$val][14];
				$array['diploma'] = $file[$val][10];
				$array['diplomaNO'] = $file[$val][11];
				if ($is_new) $array['proSource'] = 'speculation';
				if ($is_new) $array['sellerID'] = $file[$val][0];
				if ($is_new) $array['stockAddress'] = $file[$val][0];
				$array['infml'] = sprintf('%.2f' , (float)$file[$val][12] * $exchange['USD']);
				$array['INTbid'] = @sprintf('%.2f' , $BID[$file[$val][4]][$file[$val][3]] * $exchange['USD']);
				$array['agio'] = @sprintf('%.2f' , $file[$val][12] / $array['weight'] / $BID[$file[$val][4]][$file[$val][3]] * 100 - 100);
				if ($is_new) $array['time'] = mktime();
				//echo 123;exit;
				return ($array['INTbid'] && $array['agio']) ? $array : false;
			}
		}
		
		/**
		 * 取得国际报价
		 * @param $color	颜色
		 * @param $clarity	净度
		 * @param $weight	重量
		 */
		private function get_bid($weight)
		{
			if ($this->BID) return $this->BID;
			
			if (($bid = $this->db->select_to_2Array("select price,clarity,color from bid where weight_start<='{$weight}' and weight_stop>='{$weight}'"))!= false)
			{
				foreach ($bid as $val) $this->BID[$val['clarity']][$val['color']] = $val['price'];
			}
			return $this->BID;
		}
		
		/**
		 * 得到替换后的数组
		 */
		private function get_private()
		{
			self::$replace = array(
				's:5:"Round"' => 's:5:"round"',
				's:9:"Excellent"' => 's:2:"EX"',
				's:9:"Very Good"' => 's:2:"VG"',
				's:5:"Ideal"' => 's:2:"ID"',
				's:4:"Good"' => 's:1:"G"',
				's:4:"Fair"' => 's:2:"FR"',
				's:4:"Poor"' => 's:2:"PR"',
				's:5:"None "' => 's:1:"N"',
				's:12:"Very Slight "' => 's:3:"VSL"',
				's:7:"Slight "' => 's:4:"F/SL"',
				's:6:"Faint "' => 's:4:"F/SL"',
				's:7:"Medium "' => 's:1:"M"',
				's:7:"Strong "' => 's:1:"S"',
				's:12:"Very Strong "' => 's:2:"VS"',
				's:11:"Strong Blue"' => 's:1:"S"',
				's:11:"Medium Blue"' => 's:1:"M"',
				's:10:"Faint Blue"' => 's:4:"F/SL"',
				's:13:"Medium Yellow"' => 's:1:"M"',
				's:16:"Very Strong Blue"' => 's:3:"VSB"',
				's:14:"Good-Very Good"' => 's:2:"VG"',
				's:12:"Medium Green"' => 's:1:"M"'
			);
		}
		
		/**
		 * 取得汇率
		 */
		private function get_exchange()
		{
			if (self::$exchange) return self::$exchange;
			
			if (($show = $this->db->select_to_2Array("select currency,exchange from exchange")) != false)
			{
				foreach ($show as $key => $val) self::$exchange[$val['currency']] = $val['exchange'];
				unset($show);
				return self::$exchange;
			}
		}
		
		/**
		 * 读取整个CSV文件
		 */
		private function read_to_array($file)
		{
			$handle = @fopen($file , 'rb');
			if ($handle)
			{
				while ($csv = fgetcsv($handle))
				{
					$csv = serialize($csv);
					$csv = strtr($csv , self::$replace);
					$csv = unserialize($csv);
					if ($csv[11] && is_numeric($csv[2]) && in_array($csv[3] , array('M','L','K','J','I','H','G','F','E','D')) && $csv[4] && is_numeric($csv[12]))
					{
						
						$temp[$csv[15]] = $csv;
						$this->CSV_id[] = $csv[15];
					}
				}
				fclose($handle);
			}
			return ($temp) ? $temp : false;
		}
		
		//转换1维数组
		private function to_1Arr($array , $key)
		{
			foreach ($array as $val) $new[] = $val[$key];
			return $new;
		}
		
		//得到更新的数据
		private function to_get_edit($file , $dong_id , $dong)
		{
			$new = array_intersect($this->CSV_id , $dong_id);
			if ($new && count($new))
			{
				
				foreach ($new as $key => $val)
				{
					//数据库中状态为down同时 数量(amount) > 1的数据才能够更新数据
					if (!(in_array($dong[$val]['status'] , array('up' , 'down')) && $dong[$val]['amount'])) unset($new[$key]);
				}
				if (count($new)) return $new;
			}
		}
		
		/**
		 * 得到数据 (更新 , 下架 , 上架)
		 * @return unknown_type
		 */
		private function judgment_Data($file , $weight)
		{
			if (($dong = $this->db->select_to_2Array('select previousNO,status,amount from product where proSource=\'speculation\' and weight=' . $weight , 'previousNO')) != false)
			{
				$dong_id = $this->to_1Arr($dong , 'previousNO');
				$do['new'] = array_diff($this->CSV_id , $dong_id);
				$do['edit'] = $this->to_get_edit($file , $dong_id , $dong);
				$do['down'] = array_diff($dong_id , $this->CSV_id);
			}else{
				$do['new'] = $this->CSV_id;
			}
			if (!$do['new']) unset($do['new']);
			if (!$do['edit']) unset($do['edit']);
			if (!$do['down']) unset($do['down']);
			return ($do) ? $do : false;
		}
		
		//上架
		private function new_data($file , $NO , $BID)
		{
			if ($NO['new'] && count($NO['new']))
			{
				$exchange = $this->get_exchange();
				//print_r($NO['new']);exit;
				foreach ($NO['new'] as $key => $val)
				{
					$array = $this->get_data($file , $val , $exchange , $BID);
					if ($array) $this->db->insert('product' , $array , true);
				}
			}
		}
		
		//下架
		private function down_data($do)
		{
			if ($do['down'] && count($do['down']))
			{
				foreach ($do['down'] as $val)
				{
					$this->db->update('product' , array('status'=>'down') , "previousNO='{$val}'" , true);
				}
			}
		}
		
		//更新数据
		private function edit_data($file , $do , $BID)
		{
			//echo 123;exit;
			if ($do['edit'] && count($do['edit']))
			{
				$exchange = $this->get_exchange();
				$id = "('" . join("','" , $do['edit']) . "')";
				
				if (($pro = $this->db->select_to_2Array('select previousNO,weight,infml,INTbid,agio from product where previousNO in ' . $id , 'previousNO')) != false)
				{
					foreach ($do['edit'] as $val)
					{
						$array = $this->get_data($file , $val , $exchange , $BID , false);
						//echo 11111;exit;
						if ($array && ($array['weight'] != $pro[$val]['weight'] || $array['infml'] != $pro[$val]['infml'] || $array['INTbid'] != $pro[$val]['INTbid'] || $array['agio'] != $pro[$val]['agio'])) 
						{
							$this->db->update('product' , $array , "previousNO='{$val}'" , true);
						}
							
					}
				}
			}
		}
		
		public function exec($weight)
		{
			$this->file_address = '../csv/' . $weight . '.csv';
			
			if (is_file($this->file_address))
			{
				//替换数组
				$this->get_private();
				
				$BID = $this->get_bid($weight);
				
				//读取CSV文件
				$file = $this->read_to_array($this->file_address);
				
				//得到数据 (更新 , 下架 , 上架)
				$do = $this->judgment_Data($file , $weight);
				
				//上架
				$this->new_data($file , $do , $BID);

				//下架
				$this->down_data($do);
				
				//更新数据
				$this->edit_data($file , $do , $BID);
				
				echo $weight ,' ct 处理完成', '<br />';
			}else{
				echo $weight ,' ct 不存在,或者文件为空', '<br />';
			}
		}
	}
?>