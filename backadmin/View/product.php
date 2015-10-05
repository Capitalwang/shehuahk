<?php
	class product extends start
	{
		private static $shape , $status , $proSource ,$color , $clarity , $cut , $exchange;
		
		private static $Fent_Isity , $Fent_color , $diploma , $country , $stockAddress;
		
		public function __construct()
		{
			parent::__construct(true);
		}
		
		//列表
		public function show()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			
			$ORDER = array('agio_UP'=>'agio asc' , 'agio_Dn'=>'agio desc' , 'nber_UP'=>'id asc' , 'nber_Dn'=>'id desc' , 'inml_UP'=>'infml asc' , 'inml_Dn'=>'infml desc' , 'weit_UP'=>'weight asc' , 'weit_Dn'=>'weight desc' , 'time_UP'=>'time asc' , 'time_Dn'=>'time desc');
			$this->get['ORDER'] = $ors = ($this->get['ORDER']) ? $this->get['ORDER'] : 'agio_Dn';
			
			//状态
			if ($this->get['status'] == 'promotion')
				$status = "and is_promotion='Y' and (promotion_start<=UNIX_TIMESTAMP() and promotion_stop>=UNIX_TIMESTAMP())";
			else
				$status = ($this->get['status']) ? "and status='{$this->get['status']}'" : '';
			
			//普通查询
			$query = ($this->get['go'] == 'query') ? "and (ProID like '%{$this->get['info']}%' or previousNO like '%{$this->get['info']}%' or diplomaNO like '%{$this->get['info']}%')" : '';
			$this->sma->assign('get' , $this->get);

			$this->default_value();
			require_once(BASEPATH . '../Class/page.php');
			$list = new page;
			$list->db = $this->db;
			$list->pageNS = (is_numeric($this->get['PNS'])) ? $this->get['PNS'] : 14;
			$list->NowPage = (empty($this->get['page']) | $this->get['page'] < 1 | !is_numeric($this->get['page'])) ? 1 : $this->get['page'];
			$list->SQL = "select INTbid,id,ProID,shape,weight,color,clarity,cut,buffing,symmetry,Fent_Isity,scalar_value,diploma,diplomaNO,agio,baseAgio,infml,is_promotion,promotion_start,promotion_stop,promotion_dot from product where 1 {$status} {$query} order by {$ORDER[$ors]}";
			
			$this->sma->assign('list_page',$list->getPage());
			$this->sma->assign('list_text',$list->getText());
			
			$this->sma->display($this->get['open']);
		}
		
		//高级查询
		public function advanced()
		{
			$post = $this->fun->pars_all('post' , true);
			
			if ($post && count($post))
			{
				//把搜索条件存储进cookie中去
				setcookie('advanced' , serialize($post));
			}else{
				if (get_magic_quotes_gpc())
					$post = unserialize(stripslashes($_COOKIE['advanced']));
				else
					$post = unserialize($_COOKIE['advanced']);
			}

			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			//状态
			$status = ($this->get['status']) ? "and status='{$this->get['status']}'" : '';
			
			if ($this->get['go'] == 'query')
			{
				$ORDER = array('agio_UP'=>'agio asc' , 'agio_Dn'=>'agio desc' , 'nber_UP'=>'id asc' , 'nber_Dn'=>'id desc' , 'inml_UP'=>'infml asc' , 'inml_Dn'=>'infml desc');
				$this->get['ORDER'] = $ors = ($this->get['ORDER']) ? $this->get['ORDER'] : 'agio_Dn';
				
				//形状
				if ($post['shape'] && count($post['shape']))
					$shape = "and shape in ('" . join("','" , $post['shape']) . "')";
				
				//颜色
				if ($post['color'] && count($post['color']))
					$color = "and color in ('" . join("','" , $post['color']) . "')";
				
				//净度
				if ($post['clarity'] && count($post['clarity']))
					$clarity = "and clarity in ('" . join("','" , $post['clarity']) . "')";
				
				//切工
				if ($post['cut'] && count($post['cut']))
					$cut = "and cut in ('" . join("','" , $post['cut']) . "')";
				
				//抛光
				if ($post['buffing'] && count($post['buffing']))
					$buffing = "and buffing in ('" . join("','" , $post['buffing']) . "')";
				
				//对称
				if ($post['symmetry'] && count($post['symmetry']))
					$symmetry = "and symmetry in ('" . join("','" , $post['symmetry']) . "')";
				
				//荧光强度
				if ($post['Fent_Isity'] && count($post['Fent_Isity']))
					$Fent_Isity = "and Fent_Isity in ('" . join("','" , $post['Fent_Isity']) . "')";
				
				//荧光颜色
				if ($post['Fent_color'] && count($post['Fent_color']))
					$Fent_color = "and Fent_color in ('" . join("','" , $post['Fent_color']) . "')";
				
				//证书
				if ($post['diploma'] && count($post['diploma']))
					$diploma = "and diploma in ('" . join("','" , $post['diploma']) . "')";
				
				//产品来源
				if ($post['proSource'] && count($post['proSource']))
					$proSource = "and proSource in ('" . join("','" , $post['proSource']) . "')";
					
				//促销
				if ($post['promotion_start'] && $post['promotion_stop'])
				{
					$st = strtotime($post['promotion_start']);
					$sp = strtotime($post['promotion_stop']);
					if ($st > $sp) {$sp = $st + $sp;$st = $sp - $st;$sp = $sp - $st;}
					
					$promotion = "and '{$sp}'>=promotion_start and '{$st}'<=promotion_stop";
				}
				
				//退点
				if (is_numeric($post['agio'][0]) && is_numeric($post['agio'][1]) && ($post['agio'][0] || $post['agio'][1]))
				{
					$s = $post['agio'][0];
					$p = $post['agio'][1];
					if ($s > $p) {$p = $s + $p;$s = $p - $s;$p = $p - $s;}
					$agio = "and agio>={$s} and agio<={$p}";
				}
				
				//重量
				if (is_numeric($post['weight'][0]) && is_numeric($post['weight'][1]) && ($post['weight'][0] || $post['weight'][1]))
				{
					$s = $post['weight'][0];
					$p = $post['weight'][1];
					if ($s > $p) {$p = $s + $p;$s = $p - $s;$p = $p - $s;}
					$weight = "and weight>={$s} and weight<={$p}";
				}
				
				//全身比
				if (is_numeric($post['body_ratio'][0]) && is_numeric($post['body_ratio'][1]) && ($post['body_ratio'][0] || $post['body_ratio'][1]))
				{
					$s = $post['body_ratio'][0];
					$p = $post['body_ratio'][1];
					if ($s > $p) {$p = $s + $p;$s = $p - $s;$p = $p - $s;}
					$body_ratio = "and body_ratio>={$s} and body_ratio<={$p}";
				}
				
				//台宽比
				if (is_numeric($post['table_width'][0]) && is_numeric($post['table_width'][1]) && ($post['table_width'][0] || $post['table_width'][1]))
				{
					$s = $post['table_width'][0];
					$p = $post['table_width'][1];
					if ($s > $p) {$p = $s + $p;$s = $p - $s;$p = $p - $s;}
					$table_width = "and table_width>={$s} and table_width<={$p}";
				}
				
				$this->default_value();
				require_once(BASEPATH . '../Class/page.php');
				$list = new page;
				$list->db = $this->db;
				$list->pageNS = (is_numeric($this->get['PNS'])) ? $this->get['PNS'] : 14;
				$list->NowPage = (empty($this->get['page']) | $this->get['page'] < 1 | !is_numeric($this->get['page'])) ? 1 : $this->get['page'];
				$list->SQL = "select INTbid,id,ProID,shape,weight,color,clarity,cut,buffing,symmetry,Fent_Isity,scalar_value,diploma,diplomaNO,agio,baseAgio,infml,is_promotion,promotion_start,promotion_stop,promotion_dot 
								from product where 1 {$status} {$shape} {$color} {$clarity} {$cut} {$buffing} {$symmetry} {$Fent_Isity} {$Fent_color} 
								{$diploma} {$proSource} {$promotion} {$agio} {$weight} {$body_ratio} {$table_width} order by {$ORDER[$ors]}";
				
				$this->sma->assign('list_page',$list->getPage());
				$this->sma->assign('list_text',$list->getText());
			}else{
				$this->default_value(true);
			}
			$this->sma->display($this->get['open'] . '_advanced');
		}
		
		//添加
		public function add()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			
			if ($this->get['go'] == 'append')
			{
				$this->append('./?open=' . $this->get['open']);
			}else{
				$this->default_value(true);
				$this->sma->display($this->get['open'] . '_append');
			}
		}
		
		//编辑
		public function edit()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			
			if ($this->get['go'] == 'append')
			{
				$this->append('./?open=' . $this->get['open'] , $this->get['id']);
			}else{
				$this->default_value(true);
				if (($edit = $this->db->select_to_1Array("select * from product where id='{$this->get['id']}'")) != false)
					$this->sma->assign('edit' , $edit);
				
				$this->sma->display($this->get['open'] . '_append');
			}
		}
		
		//删除
		public function del()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			
			if ($_POST['id'])
			{
				$post = $this->fun->pars_all('post' , true);
				$id = "('" . join("','" , $post['id']) . "')";
			}else{
				$id = "('" . $this->get['id'] . "')";
			}
			//TODO 此处需要删除文件(未处理)
			$this->db->del('product' , 'id in ' . $id);
			$this->fun->local('./?open=' . $this->get['open']);
		}
		
		//详情 ajax调用
		public function detail()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]){echo '<div style="text-align:center; padding:3em">' . $this->BTP_Words . '</div>';exit;}
			if ($this->get['id'])
			{
				if (($json = $this->db->select_to_1Array("select * from product where id='{$this->get['id']}'")) != false)
				{
					$this->default_value(true);
					$this->sma->assign('show' , $json);
					echo $this->sma->fetch('product_detail.html');
				}
			}
		}
		
		public function check_NO()
		{
			if ($this->db->select_to_1Array("select ProID from product where ProID='{$this->get['NO']}'") != false)
			{
				echo '此编号已存在,请重新输入';
			}else{
				echo -1;
			}
			exit;
		}
		
		//用户等级价格 ajax 调用
		public function view_price()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]){echo '<div style="text-align:center; padding:3em">' . $this->BTP_Words . '</div>';exit;}
			if ($this->get['id'])
			{
				if (($json = $this->db->select_to_1Array("select weight,INTbid,infml,promotion_start,promotion_stop,promotion_dot,is_promotion,agio,baseAgio from product where id='{$this->get['id']}'")) != false)
				{
					//if ($json['is_promotion'] == 'N' or $json['promotion_start'] > mktime() or $json['promotion_stop'] < mktime())
					//{
						if (($proxy_group = $this->db->select_to_2Array("select name,rebate from proxy_group order by taxis desc")) != false)
							$json['proxy_group'] = $proxy_group;
					//}
					$this->sma->assign('show' , $json);
					echo $this->sma->fetch('product_view_price.html');
				}
			}
		}
				
		/**
		 * 取得国际报价
		 * @param $color	颜色
		 * @param $clarity	净度
		 * @param $weight	重量
		 * @param $is_php	PHP / ajax 调用
		 */
		public function get_bid($color = false , $clarity = false, $weight = false , $is_php = false)
		{
			$color = ($color) ? $color : $this->get['color'];
			$clarity = ($clarity) ? $clarity : $this->get['clarity'];
			$weight = ($weight) ? $weight : $this->get['weight'];
			
			$exchange = $this->get_exchange();
			
			$bid = $this->db->select_to_1Array("select price from bid where color='{$color}' and clarity='{$clarity}' and weight_start<='{$weight}' and weight_stop>='{$weight}'");
			if ($is_php)
				return ($bid['price']) ? sprintf('%0.2f' , $bid['price'] * $exchange['USD']) : 0;
			else
				echo ($bid['price']) ? sprintf('%0.2f|%0.2f' , $bid['price'] * $exchange['USD'] , $bid['price']) : '0|0';
		}
		
		public function get_GIA()
		{
			
			$html = file_get_contents('https://myapps.gia.edu/ReportCheckPortal/getReportData.do?&reportno='.$this->get['NO'].'&weight='.sprintf('%.2f' , $this->get['weight']));
			if ($html)
			{
				if (strpos($html , '<h1>Match Not Found</h1>') !== false)
				{
					echo -2;
				}else{
					@preg_match_all("|<td[^>]*>(.*?)</td>|si" , $html , $TD);
					$this->GIA_ZH(&$TD);
					echo json_encode($TD);
				}
			}else{
				echo -1;
			}
		}
		
		public function clear()
		{
			$this->db->del('product' , "proSource='speculation' and status='down'");
			
			$this->fun->Msg('执行完成' , $this->fun->write_url(true,true));
		}
		
		private function GIA_ZH(&$array)
		{
			$ZH_CUT = array('ideal'=>'ID','Excellent'=>'EX','Very Good'=>'VG','Good'=>'G','Fair'=>'FR','Poor'=>'PR');
			$Fent_Isity = array('None'=>'N','Faint'=>'F/SL','Medium'=>'M','Strong'=>'S','Very Strong'=>'VS');
			$Fent_color = array('Blue'=>'Blue','Yellow'=>'Yellow','Green'=>'Green','Red'=>'Red','Orange'=>'Orange','White'=>'White');
			$to = array();
			$to['color'] = $array[1][array_search('Color Grade: ' , $array[1]) + 1];
			$to['clarity'] = $array[1][array_search('Clarity Grade:' , $array[1]) + 1];
			$to['cut'] = strtr($array[1][array_search('Cut Grade: ' , $array[1]) + 1] , $ZH_CUT);
			$to['buffing'] = strtr($array[1][array_search('Polish: ' , $array[1]) + 1] , $ZH_CUT);
			$to['symmetry'] = strtr($array[1][array_search('Symmetry: ' , $array[1]) + 1] , $ZH_CUT);
			$to['Fent_Isity'] = $this->is_to_array($Fent_Isity , $array[1][array_search('Fluorescence:' , $array[1]) + 1]);
			$to['Fent_color'] = $this->is_to_array($Fent_color , $array[1][array_search('Fluorescence:' , $array[1]) + 1]);
			$to['scalar_value'] = strip_tags($array[1][array_search('Measurements:' , $array[1]) + 1]);
			$to['body_ratio'] = (float)$array[1][array_search('Depth: ' , $array[1]) + 1];
			$to['table_width'] = (float)$array[1][array_search('Table:' , $array[1]) + 1];
			$to['userRemark'] = $array[1][array_search('Girdle: ' , $array[1]) + 1];
			$array = $to;
		}
		
		private function is_to_array($array , $string)
		{
			foreach ($array as $key => $val)
			{
				if (strpos($string , $key) !== false) return $val;
			}
			return false;
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
				$this->sma->assign('exchange' , self::$exchange);
				return self::$exchange;
			}
		}
		
		/**
		 * @param $url	操作完成跳转的页面
		 * @param $id	编辑状态的ID
		 */
		private function append($url , $id = false)
		{
			$post = $this->fun->pars_all('post' , true);
			if (!$id && !$post['ProID'] && !$post['to_NO']) $this->fun->Msg('请填写编号或选择系统自动生成');
			if (!$post['status']) $this->fun->Msg('请选择产品状态');
			if (!$post['shape']) $this->fun->Msg('请选择产品形状');
			if (!is_numeric($post['weight'])) $this->fun->Msg('请填写产品重量');
			if (!$post['color']) $this->fun->Msg('请选择产品颜色');
			if (!$post['clarity']) $this->fun->Msg('请选择产品净度');
			if (!$post['cut']) $this->fun->Msg('请选择产品切工');
			if (!$post['buffing']) $this->fun->Msg('请选择产品抛光');
			if (!$post['symmetry']) $this->fun->Msg('请选择产品对称');
			if (!$post['Fent_Isity']) $this->fun->Msg('请选择产品荧光强度');
			if (!$post['diploma']) $this->fun->Msg('请选择产品证书类型');
			
			if (!$post['proSource']) $this->fun->Msg('请选择产品来源');
			if ($post['proSource'] == 'self')
			{
				if (!$post['stockAddress_Select']) $this->fun->Msg('请选择库存地点');
			}else{
				if (!$post['sellerID']) $this->fun->Msg('请填写商家ID');
				if (!$post['stockAddress_String']) $this->fun->Msg('请填写库存地点');
			}
			if (!is_numeric($post['infml'])) $this->fun->Msg('请填写产品进货价');
			if (!is_numeric($post['amount'])) $this->fun->Msg('请填写产品数量');
			
			if (!$post['is_promotion']) $this->fun->Msg('请选择产品促销状态');
			if ($post['is_promotion'] == 'Y')
			{
				if (!$post['promotion_start']) $this->fun->Msg('请选择促销开始时间');
				if (!$post['promotion_stop']) $this->fun->Msg('请选择促销结束时间');
				if (strtotime($post['promotion_start']) >= strtotime($post['promotion_stop'])) $this->fun->Msg('结束时间 必须大于 开始时间');
				if (!is_numeric($post['promotion_dot'])) $this->fun->Msg('请填写产品促销点');
			}
			
			$post['baseAgio'] = (is_numeric($post['baseAgio'])) ? $post['baseAgio'] : 0;
			
			$array = array();
			$array['previousNO'] = $post['previousNO'];
			$array['status'] = $post['status'];
			$array['amount'] = (int)$post['amount'];
			$array['shape'] = $post['shape'];
			$array['weight'] = sprintf('%.2f' , $post['weight']);
			$array['color'] = $post['color'];
			$array['clarity'] = $post['clarity'];
			$array['cut'] = $post['cut'];
			$array['buffing'] = $post['buffing'];
			$array['symmetry'] = $post['symmetry'];
			$array['Fent_Isity'] = $post['Fent_Isity'];
			$array['Fent_color'] = $post['Fent_color'];
			$array['scalar_value'] = $post['scalar_value'];
			$array['body_ratio'] = sprintf('%.2f' , $post['body_ratio']);
			$array['table_width'] = sprintf('%.2f' , $post['table_width']);
			$array['diploma'] = $post['diploma'];
			$array['diplomaNO'] = $post['diplomaNO'];
			//$array['diplomaPhoto'] = $post['diplomaPhoto'];
			$array['proSource'] = $post['proSource'];
			$array['sellerID'] = ($post['proSource'] != 'self') ? $post['sellerID'] : Null;
			$array['stockAddress'] = ($post['proSource'] == 'self') ? $post['stockAddress_Select'] : $post['stockAddress_String'];
			$array['is_promotion'] = ($post['is_promotion'] == 'Y') ? 'Y' : 'N';
			$array['promotion_start'] = ($post['is_promotion'] == 'Y') ? strtotime($post['promotion_start']) : Null;
			$array['promotion_stop'] = ($post['is_promotion'] == 'Y') ? strtotime($post['promotion_stop']) : Null;
			$array['promotion_dot'] = ($post['is_promotion'] == 'Y') ? sprintf('%.2f' , $post['promotion_dot']) : Null;
			$array['country'] = $post['country'];
			$array['infml'] = sprintf('%.2f' , $post['infml']);
			$array['INTbid'] = $this->get_bid($array['color'] , $array['clarity'] , $array['weight'] , true);
			$array['agio'] = sprintf('%.2f' , $array['infml'] / $array['weight'] / $array['INTbid'] * 100 - 100);
			$array['baseAgio'] = sprintf('%.2f' , $post['baseAgio']);
			$array['userRemark'] = nl2br($post['userRemark']);
			$array['backRemark'] = nl2br($post['backRemark']);
			if ($id) $array['edit_time'] = mktime(); else $array['time'] = mktime();
			
			$array['id'] = ($id) ? $id : $this->fun->rand_string(20);
			$File = $this->fun->UpFILE('../upload/product/','diplomaPhoto',$array['id'],5242880);
			if ($File['path']) $array['diplomaPhoto'] = $File['path'];
			
			if ($id)
			{
				$this->db->update('product' , $array , "id='{$id}'");
			}else{
				$array['ProID'] = ($post['to_NO']) ? $this->get_id($array['weight'] , $array['proSource']) : $post['ProID'];
				if ($post['ProID'])
				{
					if ($this->db->select_to_1Array("select ProID from product where ProID='{$array['ProID']}'") != false)
						$this->fun->Msg('已存在此编号,请重新输入,或选择系统自动生成');
				}
				$this->db->insert('product' , $array);
			}
			
			$this->fun->local($url);
		}

		/**
		 * 页面默认值
		 */
		private function default_value($append = false)
		{
			//形状
			self::$shape = array('round'=>'圆形','princess'=>'公主方','heart'=>'心形','pear'=>'梨形','emerald'=>'祖母绿','marquise'=>'马眼形','cushion'=>'垫形','oval'=>'椭圆形','radiant'=>'明亮形');
			$this->sma->assign('shape' , self::$shape);
			
			//状态
			self::$status = array('cancle'=>'无效','sold'=>'已销售','down'=>'下架','up'=>'上架');
			$this->sma->assign('status' , self::$status);
			
			//产品来源
			self::$proSource = array('speculation'=>'炒货','self'=>'自家店铺','comate'=>'代理商');
			$this->sma->assign('proSource' , self::$proSource);
			
			if ($append)
			{
				//颜色
				self::$color = array('D','E','F','G','H','I','J','K','L','M','N');
				$this->sma->assign('color' , self::$color);
				
				//净度
				self::$clarity = array('IF','VVS1','VVS2','VS1','VS2','SI1','SI2','SI3','I1','I2','I3');
				$this->sma->assign('clarity' , self::$clarity);
				
				//切工 or 抛光 or 对称
				self::$cut = array('ID','EX','VG','G','FR','PR','N');
				$this->sma->assign('cut' , self::$cut);
				
				//荧光强度
				self::$Fent_Isity = array('N','VSL','F/SL','M','S','VS');
				$this->sma->assign('Fent_Isity' , self::$Fent_Isity);
				
				//荧光颜色
				self::$Fent_color = array('Blue','Yellow','Green','Red','Orange','White');
				$this->sma->assign('Fent_color' , self::$Fent_color);
				
				//证书类型
				self::$diploma = array('GIA','IGI','HRD','PGS','VGR','AGS','DCLA','Uncertified','EGL','USA','EGL Israel','EGL Other','NGDTC','NGTC','GTC','Other');
				$this->sma->assign('diploma' , self::$diploma);
				
				//国家
				self::$country = array('China'=>'中国','India'=>'印度','Hongkong'=>'香港','Belgium'=>'比利时','USA'=>'美国');
				$this->sma->assign('country' , self::$country);
				
				//库存地点
				self::$stockAddress = $this->db->select_to_2Array("select address from stock_address order by taxis desc");
				$this->sma->assign('stockAddress' , self::$stockAddress);
			}
		}
		
		/**
		 * 生成ID
		 */
		private function get_id($weight , $proSource)
		{
			$weight = str_pad($weight * 100 , 4 , '0' , STR_PAD_LEFT);
			switch ($proSource)
			{
				case 'speculation':$proSource = $this->fun->rand_string(2 , 3);break;
				case 'comate':$proSource = $this->fun->rand_string(1 , 3);$proSource .= $proSource;break;
				default:$proSource = $this->fun->rand_string(2 , 1);
			}
			
			return $weight . '-'. $proSource . '-' . $this->fun->rand_string(8 , 1);
		}
	}
?>