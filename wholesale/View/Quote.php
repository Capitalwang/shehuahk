<?php
	class Quote extends start
	{
		//ÑÕÉ«
		private $color = array('' , 'D' , 'E' , 'F' , 'G' , 'H' , 'I' , 'J' , 'K' , 'L' , 'M' , 'N');
		
		//¾»¶È
		private $clarity = array('' , 'IF' , 'VVS1' , 'VVS2' , 'VS1' , 'VS2' , 'SI1' , 'SI2' , 'SI3' , 'I1' , 'I2' , 'I3');
		
		private $exchange;
		
		public function __construct()
		{
			parent::__construct(true);
		}
		
		public function show()
		{
			//if (!$this->QX[$this->get['open']][$this->get['action']]) $this->fun->Msg('ÄãÃ»ÓÐ´ËÈ¨ÏÞ');
			
			$this->get_html();
			$this->sma->display($this->get['open']);
		}
		
		public function Prints()
		{
			//if (!$this->QX[$this->get['open']][$this->get['action']]) $this->fun->Msg('ÄãÃ»ÓÐ´ËÈ¨ÏÞ');
			
			$Bid = $this->get_html(true);
			
			//$html = '<div style="text-align:center;font-size:11px">ÑÇÌ«±¨¼Û (' . $this->language['Quote'][$this->get['exchange']]. ') ±¨¼Û</div>';
			$i = 0;
			foreach ($Bid as $key => $val)
			{
				if (in_array($i , array(0,8,14))) $html .= '<div style="page-break-before:auto;page-break-after:always;font-size:12px">';
				$html .= '<table border="0" cellspacing="1" cellpadding="0">';
				if ((float)substr($key,0,4) < 0.3)
					$html .= '<tr><td colspan="9" height="18"><b>' . $key . '</b></td></tr>';
				else
					$html .= '<tr><td colspan="12" height="18"><b>' . $key . '</b></td></tr>';
				foreach ($val as $koo => $voo)
				{
					$html .= '<tr align="center">';
					foreach ($voo as $ko => $vo)
					{
						if (is_numeric($vo))
							$html .= '<td>' . sprintf('%.1f' , $vo * $this->exchange[$this->get['exchange']] / 100) . '</td>';
						elseif (strlen($vo) == 1)
							$html .= '<th width="35" height="20">' . $vo . '</th>';
						else
							$html .= '<td height="20"><b>' . $vo . '</b></td>';
					}
					$html .= '</tr>';
				}
				$html .= '</table>' . "\n";
				$i++;
				if (in_array($i , array(0,8,14))) $html .= '</div>';
			}
			if (substr($html , -6) != '</div>') $html .= '</div>';
			$this->sma->assign('html' , $html);
			
			$this->sma->display('Quote_print');
		}
		
		private function get_html($is_print = false)
		{
			if (($bid = $this->db->select_to_2Array("select * from bid order by weight_start asc")) != false)
			{
				$this->get_exchange();
				
				$this->get['exchange'] = ($this->get['exchange']) ? $this->get['exchange'] : 'USD';
				$this->sma->assign('get' , $this->get);
				
				foreach ($bid as $val)
				{
					$Quote[$val['weight_start'] . ' ct - ' . $val['weight_stop'] . ' ct'][$val['color']][$val['clarity']] = $val['price'];
				}
				
				foreach ($Quote as $key => $val)
				{
					array_unshift($Quote[$key] , $this->clarity);
					foreach ($val as $koo => $voo) array_unshift($Quote[$key][$koo] , $koo);
					
					if ((float)substr($key,0,4) < 0.3) $this->format(&$Quote[$key]);
				}
				
				if ($is_print) return $Quote;
				
				$html = '';
				foreach ($Quote as $key => $val)
				{
					$html .= '<table border="0" cellspacing="1" cellpadding="0">';
					if ((float)substr($key,0,4) < 0.3)
						$html .= '<tr><th colspan="9" class="ed"> ' . $key . ' </th></tr>';
					else
						$html .= '<tr><th colspan="12" class="ed"> ' . $key . ' </th></tr>';
					foreach ($val as $koo => $voo)
					{
						$html .= '<tr>';
						foreach ($voo as $ko => $vo)
						{
							if (is_numeric($vo))
								$html .= '<td>' . sprintf('%.2f' , $vo * $this->exchange[$this->get['exchange']] / 100) . '</td>';
							else
								$html .= '<th>' . $vo . '</th>';
						}
						$html .= '</tr>';
					}
					$html .= '</table>';
				}

				$this->sma->assign('html' , $html);
			}
		}
		
		private function get_exchange()
		{
			if (($exchange = $this->db->select_to_2Array("select * from exchange" , 'currency')) != false)
			{
				foreach ($exchange as $val)
				{
					$this->exchange[$val['currency']] = ($val['currency'] == 'USD') ? $val['exchange'] : $exchange['USD']['exchange'] / $val['exchange'];
				}
				$this->exchange['CNY'] = $this->exchange['USD'];
				$this->exchange['USD'] = 1;
			}
		}
		
		//¸ñÊ½»¯0.3ctÒÔÏÂµÄÊý¾Ý
		private function format(&$array)
		{
			$array['D'][0] = 'D-F';
			$array['G'][0] = 'G-H';
			$array['I'][0] = 'I-J';
			$array['K'][0] = 'K-L';
			$array['M'][0] = 'M-N';
			unset($array['E'] , $array['F'] , $array['H'] , $array['J'] , $array['L'] , $array['N']);
			
			$array[0][1] = 'IF-VVS';
			$array[0][4] = 'VS';
			unset($array[0][2] , $array[0][3] , $array[0][5]);
			
			foreach ($array as $key => $val) unset($array[$key]['VVS1'],$array[$key]['VVS2'],$array[$key]['VS2']);
		}
	}
?>