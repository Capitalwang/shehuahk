<?php
	class product extends start
	{
		private $allow_view;
		
		public function __construct()
		{
			parent::__construct(true);
			$this->allow_view = array('INTbid','price','ProID','shape','weight','color','clarity','cut','polish','symmetry','FLR','scalar_value','depth','table','cert','certNO','agio','promotion');
		}
		
		public function show()
		{
			$user = $this->get_user();
			
			if ($this->db->update('api_log' , array('amount' => '+++1') , "api_key='{$this->get['key']}' and type='product' and year=EXTRACT(YEAR FROM CURDATE()) and month=EXTRACT(MONTH FROM CURDATE())") == false)
				$this->db->insert('api_log' , array('api_key'=>$this->get['key'],'type'=>'product','year'=>date('Y'),'month'=>date('m'),'amount'=>1));
			
			if ($this->get['shape']) $shape = "and shape in ('" . implode("','" , explode(',' , $this->get['shape'])) . "')";
			if ($this->get['color']) $color = "and color in ('" . implode("','" , explode(',' , $this->get['color'])) . "')";
			if ($this->get['clarity']) $clarity = "and clarity in ('" . implode("','" , explode(',' , $this->get['clarity'])) . "')";
			if ($this->get['cut']) $cut = "and cut in ('" . implode("','" , explode(',' , $this->get['cut'])) . "')";
			if ($this->get['polish']) $polish = "and buffing in ('" . implode("','" , explode(',' , $this->get['polish'])) . "')";
			if ($this->get['symmetry']) $symmetry = "and symmetry in ('" . implode("','" , explode(',' , $this->get['symmetry'])) . "')";
			if ($this->get['FLR']) $FLR = "and Fent_Isity in ('" . implode("','" , explode(',' , $this->get['FLR'])) . "')";
			if ($this->get['cert']) $cert = "and diploma in ('" . implode("','" , explode(',' , $this->get['cert'])) . "')";
			if ($this->get['GIANo']) $GIANo = "and diplomaNo in ('" . implode("','" , explode(',' , $this->get['GIANo'])) . "')";
			$lz_price = $this->luozuan_price($this->get['p_app'],$this->get['$p_price'],$this->get['$g_price']);
			if (!empty($this->get['min_p']) or !empty($this->get['max_p']) )
			{
				if($this->get['min_p']>=0 or $this->get['max_p']>=0)
				{
					if(empty($this->get['min_p']) or $this->get['min_p']==0) $this->get['min_p'] = 1 ;
					if(empty($this->get['max_p']) or $this->get['max_p']==0) $this->get['max_p'] = 1000000000000 ;
					if($this->get['min_p'] > $this->get['max_p'])
					{
						$min_p = $this->get['max_p'];
						$max_p = $this->get['min_p'];
					}
					else
					{
						$min_p = $this->get['min_p'];
						$max_p = $this->get['max_p'];
					}
					
					$db_price = " and $lz_price>=$min_p and $lz_price<=$max_p+1";
					
				}
				/*$max_p = $this->get['max_p'];
				$min_p = $this->get['min_p'];
				$db_price = " and  price_order >=$min_p and price_order <=$max_p ";
				$order_is = 1;*/
			}
			

			switch ($this->get['is_promotion'])
			{
				case 'Y':$is_promotion = "and is_promotion='Y' and promotion_start<=UNIX_TIMESTAMP() and promotion_stop>=UNIX_TIMESTAMP()";break;
				case 'N':$is_promotion = "and (is_promotion='N' or promotion_start>UNIX_TIMESTAMP() and promotion_stop<UNIX_TIMESTAMP())";
			}
			
			if ($this->get['weight'] || $this->get['weight'] === '0')
			{
				$weight = explode(',' , $this->get['weight']);
				if (count($weight) > 1)
				{
					$weight[0] = ($weight[0]) ? $weight[0] : 0;
					$weight[1] = ($weight[1]) ? $weight[1] : 100;
					if (is_numeric($weight[0]) && is_numeric($weight[1]))
					{
						$weight = 'and weight>=' . $weight[0] . ' and weight<=' . $weight[1];
					}else
						$this->{make_ . $this->get['R']}(array('error' => array('code' => 1 , 'info' => '重量错误')));
				}else{
					if (is_numeric($weight[0]))
						$weight = 'and weight=' . $weight[0];
					else
						$this->{make_ . $this->get['R']}(array('error' => array('code' => 1 , 'info' => '重量错误')));
				}	
			}
			
			if (!$this->get['view']) $this->{make_ . $this->get['R']}(array('error' => array('code' => -2 , 'info' => '显示的参数不能为空')));
			
			if ($this->get['list'])
			{
				if($this->get['list']=='price/asc' or $this->get['list']=='price/desc')
				{
					$val = explode('/' , $this->get['list']);
					list($p,$ord) = split("/",$this->get['list']);
					$ORDER = 'order by  '. $lz_price . $ord ;
				}
				else
				{
					$list = explode(',' , $this->get['list']);
					foreach ($list as $val)
					{
						$val = explode('/' , $val);
						if (!$val[0]) $this->{make_ . $this->get['R']}(array('error' => array('code' => 2 , 'info' => '排序字段为空')));
						$val[1] = ($val[1]) ? $val[1] : 'asc';
						if (!in_array($val[1] , array('asc' , 'desc'))) $this->{make_ . $this->get['R']}(array('error' => array('code' => 3 , 'info' => '排序格式错误')));
						$ORDER .= ",{$val[0]} {$val[1]}";
					}
					$ORDER = 'order by ' . substr($ORDER , 1);
				}
			}
			
			require_once(BASEPATH . '../Class/page.php');
			$list = new page;
			$list->db = $this->db;
			$list->pageNS = (is_numeric($this->get['page_amount'])) ? $this->get['page_amount'] : 100;
			$list->NowPage = (empty($this->get['page']) | $this->get['page'] < 1 | !is_numeric($this->get['page'])) ? 1 : $this->get['page'];
			$list->SQL = "select INTbid,ProID,shape,weight,color,clarity,cut,buffing as polish,symmetry,Fent_Isity as FLR,scalar_value,body_ratio as depth,table_width as `table`,diploma as cert,diplomaNO as certNO,(agio+baseAgio) as agio,infml,is_promotion,promotion_start,promotion_stop,promotion_dot from product where status='up' {$is_promotion} {$weight} {$shape} {$color} {$clarity} {$cut} {$polish} {$symmetry} {$FLR} {$cert} {$GIANo} {$db_price} {$ORDER}";
			
			if (count($DATA = $list->getText()))
			{
				$DATA = $this->make_data($DATA , $user);
				
				$info['data'] = $list->getPage();
				$info['source'] = '奢华珠宝';
				$info['home_page'] = 'www.shehua.hk';
				$info['author'] = 'simon';
				$info['time'] = date('Y-m-d H:i:s');
				$info['view'] = $this->get['view'];
				$info['amount'] = $info['data']['Record'];
				$info['page'] = $info['data']['count'];
				$info['now_page'] = $info['data']['NowPage'];
				$info['page_amount'] = $info['data']['PNS'];
				unset($info['data']);
				
				$DATA = $this->get_new_array('info' , $info , $DATA);
				
				$this->{make_ . $this->get['R']}($DATA);
			}else{
				$this->{make_ . $this->get['R']}(array('error' => array('code' => 0 , 'info' => '没有产品')));
			}
		}
		
		private function get_user()
		{
			if (($user = $this->db->select_to_1Array("select u.product_ip,u.dot,g.rebate,g.is_offer from api_user as u join proxy_group as g on g.id=u.proxy_group where u.key='{$this->get['key']}'")) != false)
			{
				$user['product_ip'] = unserialize($user['product_ip']);
				if (in_array($this->fun->getIP() , $user['product_ip']))
				{
					return $user;
				}else{
					$this->{make_ . $this->get['R']}(array('error' => array('code' => -4 , 'info' => 'IP地址错误' , 'IP'=>$this->fun->getIP())));
				}
			}else
				$this->{make_ . $this->get['R']}(array('error' => array('code' => -3 , 'info' => '用户key错误')));
		}
		
		private function get_new_array($key , $info , $DATA)
		{
			$new[$key] = $info;
			foreach ($DATA as $val) $new[] = $val;
			return $new;
		}
		
		private function make_data($array , $user)
		{
			$view = explode(',' , $this->get['view']);
			foreach ($view as $key => $val) if (!in_array($val , $this->allow_view)) unset($view[$key]);
			
			$dot = (is_numeric($this->get['dot'])) ? sprintf('%.2f' , $this->get['dot']) : $user['dot'];
			$dot = (is_numeric($dot)) ? $dot : 0;
			
			foreach ($array as $key => $pro)
			{
				foreach ($view as $val)
				{
					if ($user['is_offer'] == 'Y' && $pro['is_promotion']=='Y' && $pro['promotion_start']<=mktime() && $pro['promotion_stop']>=mktime())
					{
						switch ($val)
						{
							//价格
							case 'price':
								$info[$key][$val] = sprintf('%.2f' , $pro['INTbid'] * $pro['weight'] * (100 + $pro['agio'] + $pro['promotion_dot'] + $dot) / 100);
							break;
							//退点
							case 'agio':
								$info[$key][$val] = sprintf('%.2f',$pro['agio']+$pro['promotion_dot'] + $dot).'%';
							break;
							
							case 'promotion':
								$info[$key]['promotion'] = 'yes';
								$info[$key]['promotion_start'] = date('Y-m-d H:i:s' , $pro['promotion_start']);
								$info[$key]['promotion_stop'] = date('Y-m-d H:i:s' , $pro['promotion_stop']);
							break;
							
							default: $info[$key][$val] = $pro[$val];
						}
					}else{
						switch ($val)
						{
							//价格
							case 'price':
								$info[$key][$val] = sprintf('%.2f' , $pro['INTbid'] * $pro['weight'] * (100 + $pro['agio'] + $user['rebate'] + $dot) / 100);
							break;
							//退点
							case 'agio':
								$info[$key][$val] = sprintf('%.2f',$pro['agio']+$user['rebate'] + $dot).'%';
							break;
							
							case 'promotion': $info[$key]['promotion'] = 'no';break;
														
							default: $info[$key][$val] = $pro[$val];
						}
					}
				}
			}
			return $info;
		}

		private function luozuan_price($p_app,$p_price,$g_price)
		{
			if($p_app == 1)
			{$price = " INTbid*weight*(agio+100+8)/100 ";
			}
			if($p_app == 2)
			{$price = " (INTbid*weight*(agio+100+8)/100)/(1-$p_price)*(1 + $g_price) ";
			}
			else
			{
			$price_start = "  if(weight>=1, if(is_promotion='Y',INTbid*weight*(agio+100+10)/100, if(cut='EX' && buffing='EX' && symmetry='EX', if( (agio+8+100)*1.15>99 , INTbid/6.5*7 * weight * (agio+8 + 100)*1.15/100 ,INTbid/6.5*7*weight*0.99 ) , if(( cut='EX' && buffing='EX' && symmetry!='EX') || ( cut='EX' && buffing!='EX' && symmetry='EX') || ( (cut!='EX' || isnull(cut) ) && buffing='EX' && symmetry='EX') , if( (agio+8+100)*1.15>97,INTbid/6.5*7*weight*(agio+8+100)*1.15/100,INTbid/6.5*7*weight*0.97) , if( ( cut='EX' && buffing!='EX' && symmetry!='EX') || ( (cut!='EX' || isnull(cut) ) && buffing!='EX' && symmetry='EX') || ( (cut!='EX' || isnull(cut) ) && buffing='EX' && symmetry!='EX') ,if( (agio+8+100)*1.15>96,INTbid/6.5*7*weight*(agio+8+100)*1.15/100 ,INTbid/6.5*7*weight*0.96) ,if(cut='VG' && buffing='VG' && symmetry='VG', if( (agio+8+100)*1.15>94,INTbid/6.5*7*weight*(agio+8+100)*1.15/100,INTbid/6.5*7*weight*0.94) ,if( (cut='G' && buffing!='EX' && symmetry!='EX') || ( (cut!='EX' || isnull(cut) ) && buffing!='EX' && symmetry='G') || ( (cut!='EX' || isnull(cut) ) && buffing ='G' && symmetry!='EX'),if( (agio+8+100)*1.15>93,INTbid/6.5*7*weight*(agio+8+100)*1.15/100,INTbid/6.5*7*weight*0.93) ,INTbid/6.5*7*weight*(agio+8+100)*1.15/100 ))   ))  ))       , if(is_promotion='Y',INTbid*weight*(agio+100+10)/100, if(cut='EX' && buffing='EX' && symmetry='EX', if( (agio+8+100)*1.2>99 , INTbid/6.5*7 * weight * (agio+8 + 100)*1.2/100 ,INTbid/6.5*7*weight*0.99 ) , if((cut='EX' && buffing='EX' && symmetry!='EX') || (cut='EX' && buffing!='EX' && symmetry='EX') || ( (cut!='EX' || isnull(cut) ) && buffing='EX' && symmetry='EX') , if( (agio+8+100)*1.2>97,INTbid/6.5*7*weight*(agio+8+100)*1.2/100,INTbid/6.5*7*weight*0.97) , if( (cut='EX' && buffing!='EX' && symmetry!='EX') || ( (cut!='EX' || isnull(cut) ) && buffing!='EX' && symmetry='EX') || ( (cut!='EX' || isnull(cut) ) && buffing='EX' && symmetry!='EX') ,if( (agio+8+100)*1.2>96,INTbid/6.5*7*weight*(agio+8+100)*1.2/100,INTbid/6.5*7*weight*0.96) ,if( cut='VG' && buffing='VG' && symmetry='VG', if( (agio+8+100)*1.2>94,INTbid/6.5*7*weight*(agio+8+100)*1.2/100,INTbid/6.5*7*weight*0.94) ,if( (cut='G' && buffing!='EX' && symmetry!='EX') || ((cut!='EX' || isnull(cut) ) && buffing!='EX' && symmetry='G') || ( (cut!='EX' || isnull(cut) ) && buffing ='G' && symmetry!='EX'),if( (agio+8+100)*1.2>93,INTbid/6.5*7*weight*(agio+8+100)*1.2/100 ,INTbid/6.5*7*weight*0.93) , INTbid/6.5*7*weight*(agio+8+100)*1.2/100 ))   ))  ))     )";

			//$price_start = "if(weight>=1, if(is_promotion='Y',INTbid*weight*(agio+100+(10-2))/100, if(cut='EX' && buffing='EX' && symmetry='EX', if( (agio+100)*1.15>99 , INTbid/6.5*7 * weight * (agio + 100)*1.15/100 ,INTbid/6.5*7*weight*0.99 ) , if((cut='EX' && buffing='EX' && symmetry!='EX') || (cut='EX' && buffing!='EX' && symmetry='EX') || (cut!='EX' && buffing='EX' && symmetry='EX') , if( (agio+100)*1.15>97,INTbid/6.5*7*weight*(agio+100)*1.15/100,INTbid/6.5*7*weight*0.97) , if( (cut='EX' && buffing!='EX' && symmetry!='EX') || (cut!='EX' && buffing!='EX' && symmetry='EX') || (cut!='EX' && buffing='EX' && symmetry!='EX') ,if( (agio+100)*1.15>96,INTbid/6.5*7*weight*(agio+100)*1.15/100 ,INTbid/6.5*7*weight*0.96) ,if(cut='VG' && buffing='VG' && symmetry='VG', if( (agio+100)*1.15>94,INTbid/6.5*7*weight*(agio+100)*1.15/100,INTbid/6.5*7*weight*0.94) ,if( (cut='G' && buffing!='EX' && symmetry!='EX') || (cut!='EX' && buffing!='EX' && symmetry='G') || (cut!='EX' && buffing ='G' && symmetry!='EX'),if( (agio+100)*1.15>93,INTbid/6.5*7*weight*(agio+100)*1.15/100,INTbid/6.5*7*weight*0.93) ,INTbid/6.5*7*weight*(agio+100)*1.15/100 ))   ))  ))       , if(is_promotion='Y',INTbid*weight*(agio+100+(10-5))/100, if(cut='EX' && buffing='EX' && symmetry='EX', if( (agio+100)*1.2>99 , INTbid/6.5*7 * weight * (agio + 100)*1.2/100 ,INTbid/6.5*7*weight*0.99 ) , if((cut='EX' && buffing='EX' && symmetry!='EX') || (cut='EX' && buffing!='EX' && symmetry='EX') || (cut!='EX' && buffing='EX' && symmetry='EX') , if( (agio+100)*1.2>97,INTbid/6.5*7*weight*(agio+100)*1.2/100,INTbid/6.5*7*weight*0.97) , if( (cut='EX' && buffing!='EX' && symmetry!='EX') || (cut!='EX' && buffing!='EX' && symmetry='EX') || (cut!='EX' && buffing='EX' && symmetry!='EX') ,if( (agio+100)*1.2>96,INTbid/6.5*7*weight*(agio+100)*1.2/100,INTbid/6.5*7*weight*0.96) ,if(cut='VG' && buffing='VG' && symmetry='VG', if( (agio+100)*1.2>94,INTbid/6.5*7*weight*(agio+100)*1.2/100,INTbid/6.5*7*weight*0.94) ,if( (cut='G' && buffing!='EX' && symmetry!='EX') || (cut!='EX' && buffing!='EX' && symmetry='G') || (cut!='EX' && buffing ='G' && symmetry!='EX'),if( (agio+100)*1.2>93,INTbid/6.5*7*weight*(agio+100)*1.2/100 ,INTbid/6.5*7*weight*0.93) ,INTbid/6.5*7*weight*(agio+8+100)*1.2/100 ))   ))  ))     )";

			$price = " if(is_promotion='Y' ,$price_start,  if(  weight>=1 , $price_start*0.9  , if( weight>=0.3 && weight<=0.49   , if( agio+8 + 100 > 78, $price_start*0.86  , $price_start*0.85 )  , if( agio + 100 > 78 , $price_start*0.9 , $price_start*0.89)  )  )  )";
			}		
			return $price;
		}
	}
?>