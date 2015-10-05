<?php
//导出文件
	class Export
	{
		public $db , $smarty;
		private $Sizes;
		
		public function Excel($string = false , $name = false)
		{
			if (!$string) return false;
			$name = ($name) ? $name : mktime();
			ob_clean();
			header("Content-Type: application/vnd.ms-excel");
			header("Accept-Ranges:bytes");
			header("Content-Disposition:attachment;filename={$name}.xls");
			header("Pragma: no-cache");
			header("Expires: 0");
			echo '<html xmlns:o="urn:schemas-microsoft-com:office:office"
					xmlns:x="urn:schemas-microsoft-com:office:excel"
					xmlns=" http://www.w3.org/TR/REC-html40">
					<meta http-equiv="expires" content="Mon, 06 Jan 1999 00:00:01 GMT">
					<meta http-equiv=Content-Type content="text/html; charset=Utf-8">
					<!--[if gte mso 9]><xml>
					<x:ExcelWorkbook>
					<x:ExcelWorksheets>
					<x:ExcelWorksheet>
					<x:Name></x:Name>
					<x:WorksheetOptions>
					<x:DisplayGridlines/>
					</x:WorksheetOptions>
					</x:ExcelWorksheet>
					</x:ExcelWorksheets>
					</x:ExcelWorkbook>
					</xml><![endif]-->';
			echo $string;
			exit;
		}
		
		//货品订单导出
		public function OF_pro($id , $template)
		{
			if (!$id || !$template) return false;
			
			//尺码组
			if (($size_list = $this->db->select("select id,CustomizeType,sizeName from product_size order by CustomizeType,ranking asc")) != false)
			{
				foreach ($size_list as $k => $v) $size_lists[$v['CustomizeType']][$v['id']] = $size_list[$k];

				$count = $this->array_pad(&$size_lists);
				$this->Sizes = $size_lists;
				
				$this->smarty->assign('size_count',$count);
				$this->smarty->assign('size_list',$size_lists);
				unset($size_list,$size_lists);
			}
			
			//订单列表
			$SQL = "select `numeric`,money,bewrite,OrderForm_status_id,isLock from orderform where id in {$id}";
			if (($list = $this->db->select($SQL)) != false)
			{
				$this->smarty->assign('list',$list);
				
				//订单详细列表
				$SQL = "select `text` from orderform_back where orderform_id in {$id}";
				if (($back = $this->db->select($SQL,true)) != false)
				{
					$back = (unserialize($back['text']));
					$this->set_new_array(&$back , $count);
					$this->smarty->assign('back',$back);
				}
			}
			
			$str = $this->smarty->fetch($template);
			$this->Excel($str);
		}
		
		//广告画订单导出
		public function OF_pos($id , $template)
		{
			if (!$id || !$template) return false;
			
			$SQL = "select PO.*,U.account as Uacc,U.nickname as Unick,S.account as Sacc,S.nickname as Snick 
					from poster_orderform as PO 
					join user as U on U.id=PO.user_id 
					left join user as S on S.id=PO.service_id 
					where PO.id in {$id}";
			if (($list = $this->db->select($SQL,true)) != false) $this->smarty->assign('list',$list);
			
			$SQL = "select POD.width,POD.height,POD.amount,POD.close_price,POD.bewrite,PM.name,PM.poster_materials 
					from poster_orderform_detail as POD 
					left join poster_makings as PM on PM.id=POD.poster_makings_id 
					where POD.poster_orderform_id in {$id}";
			if (($detail = $this->db->select($SQL)) != false)
			{
				$this->smarty->assign('detail',$detail);
				foreach ($detail as $val)
				{
					$zong['amount'] += (int)$val['amount'];
					$zong['price'] += (float)$val['close_price'] * (int)$val['amount'];
				}
				$this->smarty->assign('zong',$zong);
			}
			
			$str = $this->smarty->fetch($template);
			$this->Excel($str);
		}
		
		//辅料订单导出
		public function OF_mat($id , $template)
		{
			if (!$id || !$template) return false;
			
			$SQL = "select mods.type,mods.price,mods.amount,M.numeric,M.name,MO.numeric as of_matView,MO.money 
					from material_orderform_detail as mods 
					join material_orderform as MO on MO.id=mods.orderform_id 
					left join material as M on M.id=mods.material_id 
					where mods.orderform_id in {$id}";
			if (($matView = $this->db->select($SQL)) != false) $this->smarty->assign('matView',$matView);
			
			$str = $this->smarty->fetch($template);
			$this->Excel($str);
		}
		
		//补齐数组
		private function array_pad(&$array)
		{
			$i = 0;
			foreach ($array as $k => $v)
			{
				$i = (($a = count($array[$k])) > $i) ? $a : $i; 
			}
			
			foreach ($array as $k => $v)
			{
				$count = count($array[$k]);
				$xh = $i - $count;
				for ($j = 0 ; $j < $xh ; $j++) $array[$k][] = false;
			}
			return $i;
		}
		
		//订单详细	数组重新排列
		private function set_new_array(&$array , $count)
		{
			if (!is_array($array) || !is_array($array['pro']) || !is_array($array['zong'])) return false;
			
			foreach ($array['pro'] as $key => $value)
			{
				foreach ($value['size'] as $K => $V)
				{
					$color = array();
					$color['colorName'] = $V['colorName'];
					$color['sizeName'] = $V['sizeName'];
					$color['shu'] = $V['shu'];
					$color['viewPrice'] = $V['viewPrice'];
					$color['price'] = $V['price'];
					$color['CustomizeType'] = $V['CustomizeType'];
					$color['number'] = $value['number'];
					$color['name'] = $value['name'];
					$color['PID'] = $value['PID'];
					
					$array['new'][] = $color;
				}
			}
			
			$viewPrice = $Price = $shu = 0;
			foreach ($array['new'] as $key => $val)
			{
				$size[$val['sizeName']]['shu'] = $val['shu'];
				$size[$val['sizeName']]['sizeName'] = $val['sizeName'];
				$shu += (int)$val['shu'];
				$viewPrice += (int)$val['shu'] * (float)$val['viewPrice'];
				$Price += (int)$val['shu'] * (float)$val['price'];
				
				$cor = ($array['new'][$key+1]['colorName']) ? $array['new'][$key+1]['colorName'] : null;
				$PID = ($array['new'][$key+1]['PID']) ? $array['new'][$key+1]['PID'] : null;
				
				if ($val['colorName'] != $cor || $val['PID'] != $PID)
				{
					$arr = array();
					$arr['colorName'] = $val['colorName'];
					$arr['size_type'] = $val['CustomizeType'];
					$arr['number'] = $val['number'];
					$arr['name'] = $val['name'];
					$arr['PID'] = $val['PID'];
					
					$this->fill_array(&$size , $arr['size_type']);
					$arr['size'] = $size;
					
					$arr['shu'] = $shu;
					$arr['viewPrice'] = $viewPrice;
					$arr['Price'] = $Price;
					
					$array['NEW'][] = $arr;
					$size = array();
					$viewPrice = $Price = $shu = 0;
				}
			}
			unset($array['pro'],$array['new']);
		}
		
		//填充尺码组
		private function fill_array(&$arr , $type)
		{
			foreach ($this->Sizes[$type] as $key => $val)
			{
				if ($val)
				{
					if (!$arr[$val['sizeName']]) $arr[$val['sizeName']] = array('shu'=>0);
				}else{
					$arr[$key] = array('shu'=>'-');
				}
			}
		}
		
	}
?>