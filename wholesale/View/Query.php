<?php
	class Query extends start
	{
		private static $shape , $proSource ,$color , $clarity , $cut , $Fent_Isity , $Fent_color , $diploma;
		
		public function __construct()
		{
			parent::__construct(true);
		}
		
		public function show()
		{
			if (!$this->QX[$this->get['open']][$this->get['action']]) $this->fun->Msg('你没有此权限');
			$this->get['st'] = ($this->get['st']) ? $this->get['st'] : 'l';
			$this->sma->assign('get' , $this->get);
			
			$post = $this->fun->pars_all('post' , true);
			if ($post && count($post))
			{
				//把搜索条件存储进cookie中去
				setcookie('Query' , serialize($post));
			}else{
				if (get_magic_quotes_gpc())
					$post = unserialize(stripslashes($_COOKIE['Query']));
				else
					$post = unserialize($_COOKIE['Query']);
			}
			//echo $this->get['open'];die;
			if ($this->get['go'] == 'query')
			{
				
				$this->get['px'] = ($this->get['px']) ? $this->get['px'] : 'agio';
				$this->get['orders'] = ($this->get['orders']) ? $this->get['orders'] : 'asc';
				$ORDER = $this->get['px'] . ' ' . $this->get['orders'];
				
				//形状
				$this->st_array(&$post['shape']);
				$shape = ($post['shape'] && count($post['shape'])) ? "and shape in ('" . join("','" , $post['shape']) . "')" : '';
				
				//颜色
				$this->st_array(&$post['color']);
				$color = ($post['color'] && count($post['color'])) ? "and color in ('" . join("','" , $post['color']) . "')" : '';
				
				//净度
				$this->st_array(&$post['clarity']);
				$clarity = ($post['clarity'] && count($post['clarity'])) ? "and clarity in ('" . join("','" , $post['clarity']) . "')" : '';
				
				//切工
				$this->st_array(&$post['cut']);
				$cut = ($post['cut'] && count($post['cut'])) ? "and cut in ('" . join("','" , $post['cut']) . "')" : '';
				
				//抛光
				$this->st_array(&$post['buffing']);
				$buffing = ($post['buffing'] && count($post['buffing'])) ? "and buffing in ('" . join("','" , $post['buffing']) . "')" : '';
				
				//对称
				$this->st_array(&$post['symmetry']);
				$symmetry = ($post['symmetry'] && count($post['symmetry'])) ? "and symmetry in ('" . join("','" , $post['symmetry']) . "')" : '';
				
				//荧光强度
				$this->st_array(&$post['Fent_Isity']);
				$Fent_Isity = ($post['Fent_Isity'] && count($post['Fent_Isity'])) ? "and Fent_Isity in ('" . join("','" , $post['Fent_Isity']) . "')" : '';
				
				//荧光颜色
				$this->st_array(&$post['Fent_color']);
				$Fent_color = ($post['Fent_color'] && count($post['Fent_color'])) ? "and Fent_color in ('" . join("','" , $post['Fent_color']) . "')" : '';
				
				//证书
				$this->st_array(&$post['diploma']);
				$diploma = ($post['diploma'] && count($post['diploma'])) ? "and diploma in ('" . join("','" , $post['diploma']) . "')" : '';
				
				//重量
				if (is_numeric($post['weight'][0]) && is_numeric($post['weight'][1]) && ($post['weight'][0] || $post['weight'][1]))
				{
					$s = $post['weight'][0];
					$p = $post['weight'][1];
					if ($s > $p) {$p = $s + $p;$s = $p - $s;$p = $p - $s;}
					$weight = "and weight>={$s} and weight<={$p}";
				}
				
				$this->default_value();
				require_once(BASEPATH . '../Class/page.php');
				$list = new page;
				$list->db = $this->db;
				$list->pageNS = (is_numeric($this->get['PNS'])) ? $this->get['PNS'] : 50;
				$list->NowPage = (empty($this->get['page']) | $this->get['page'] < 1 | !is_numeric($this->get['page'])) ? 1 : $this->get['page'];
				$list->SQL = "select INTbid,id,ProID,shape,weight,color,clarity,cut,buffing,symmetry,Fent_Isity,scalar_value,diploma,diplomaNO,agio,baseAgio,infml,is_promotion,promotion_start,promotion_stop,promotion_dot 
								from product where amount>0 and agio>-100 and baseAgio !=9 and status='up' {$shape} {$color} {$clarity} {$cut} {$buffing} {$symmetry} {$Fent_Isity} {$Fent_color} 
								{$diploma} {$weight} order by {$ORDER}";
				
				$this->sma->assign('list_page',$list->getPage(true));
				$this->sma->assign('list_text',$list->getText());
			}else{
				$this->default_value();
				
				//$this->sma->assign('post' , $post);
			}
			
			$this->sma->assign('post' , $post);
			
			if ($this->get['st'] == 'l')
				$this->sma->display('search_letter');
			else
				$this->sma->display('search_button');
		}

		
		//快捷查询
		public function shortcut()
		{
			if (!$this->QX[$this->get['open']][$this->get['action']]) $this->fun->Msg('你没有此权限');
			
			if ($this->get['go'] == 'query')
			{
				$this->get['px'] = ($this->get['px']) ? $this->get['px'] : 'agio';
				$this->get['orders'] = ($this->get['orders']) ? $this->get['orders'] : 'desc';
				$ORDER = $this->get['px'] . ' ' . $this->get['orders'];
				$this->sma->assign('get' , $this->get);
				
				$SQL = "select INTbid,id,ProID,shape,weight,color,clarity,cut,buffing,symmetry,Fent_Isity,scalar_value,diploma,diplomaNO,agio,baseAgio,infml,is_promotion,promotion_start,promotion_stop,promotion_dot from product where amount>0 and status='up' and (ProID like '%{$this->get['info']}%' or diplomaNO like '%{$this->get['info']}%' or previousNO like '%{$this->get['info']}%') order by {$ORDER} limit 0,10";
				if(($list = $this->db->select_to_2Array($SQL)) != false) $this->sma->assign('list_text' , $list); 
			}
			
			$this->sma->display('Query_shortcut');
		}
		
		private function st_array(&$array)
		{
			if (!is_array($array)) return;
			
			foreach($array as $key => $val) if (empty($val)) unset($array[$key]);
		}
		
		/**
		 * 页面默认值
		 */
		private function default_value()
		{
			//形状
			self::$shape = array('round'=>'圆形','princess'=>'公主方','heart'=>'心形','pear'=>'梨形','emerald'=>'祖母绿','marquise'=>'马眼形','cushion'=>'垫形','oval'=>'椭圆形','radiant'=>'明亮形');
			$this->sma->assign('shape' , self::$shape);
			
			//产品来源
			self::$proSource = array('speculation'=>'炒货','self'=>'自家店铺','comate'=>'代理商');
			$this->sma->assign('proSource' , self::$proSource);
			
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
		}
	}
?>