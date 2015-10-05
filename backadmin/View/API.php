<?php
	class API extends start
	{
		public function __construct()
		{
			parent::__construct(true);
		}
		
		public function show()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			
			$ORDER = array('time_UP'=>'a.time asc' , 'time_Dn'=>'a.time desc' , 'name_UP'=>'a.name asc' , 'name_Dn'=>'a.name desc');
			$this->get['ORDER'] = $ors = ($this->get['ORDER']) ? $this->get['ORDER'] : 'time_Dn';
			$this->sma->assign('get' , $this->get);
			
			require_once(BASEPATH . '../Class/page.php');
			
			$list = new page;
			$list->db = $this->db;
			$list->pageNS = (is_numeric($this->get['PNS'])) ? $this->get['PNS'] : 14;
			$list->NowPage = (empty($this->get['page']) | $this->get['page'] < 1 | !is_numeric($this->get['page'])) ? 1 : $this->get['page'];
			$list->SQL = "select a.key,a.name,a.tel,a.mail,a.QQ,a.company_name,a.home_page,a.province,a.city,g.name as `group` from api_user as a join proxy_group as g on a.proxy_group=g.id order by {$ORDER[$ors]}";
			
			$this->sma->assign('list_page',$list->getPage());
			$this->sma->assign('list_text',$list->getText());
			
			$this->sma->display($this->get['open']);
		}
		
		public function add()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			
			if ($this->get['go'] == 'append')
			{
				$this->append('./?open=' . $this->get['open']);
			}else{
				$this->_this_show();
				$this->sma->display($this->get['open'] . '_append');
			}
		}
		
		public function edit()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			
			if ($this->get['go'] == 'append')
			{
				$this->append('./?open=' . $this->get['open'] , $this->get['key']);
			}else{
				$this->_this_show();
				if (($edit = $this->db->select_to_1Array("select * from api_user where `key`='{$this->get['key']}'")) != false)
					$this->sma->assign('edit' , $edit);
				$this->sma->display($this->get['open'] . '_append');
			}
		}
		
		public function del()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			
			if ($_POST['key'])
			{
				$post = $this->fun->pars_all('post' , true);
				$id = "('" . join("','" , $post['key']) . "')";
			}else{
				$id = "('" . $this->get['key'] . "')";
			}
			
			$this->db->del('api_user' , '`key` in ' . $id);
			
			$this->fun->local('./?open=' . $this->get['open']);
		}
		
		public function log()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			
			$ORDER = array('time_UP'=>'log.year asc,log.month asc' , 'time_Dn'=>'log.year desc,log.month desc');
			$this->get['ORDER'] = $ors = ($this->get['ORDER']) ? $this->get['ORDER'] : 'time_Dn';
			$this->sma->assign('get' , $this->get);
			
			require_once(BASEPATH . '../Class/page.php');
			$list = new page;
			$list->db = $this->db;
			$list->pageNS = (is_numeric($this->get['PNS'])) ? $this->get['PNS'] : 14;
			$list->NowPage = (empty($this->get['page']) | $this->get['page'] < 1 | !is_numeric($this->get['page'])) ? 1 : $this->get['page'];
			$list->SQL = "select log.*,a.name from api_log as log join api_user as a on a.key=log.api_key order by {$ORDER[$ors]}";
			
			$this->sma->assign('list_page',$list->getPage());
			$this->sma->assign('list_text',$list->getText());
			
			$this->sma->display('API_log');
		}
		
		/**
		 * 代理 - show
		 */
		private function _this_show()
		{
			if (($this->group = $this->db->select_to_2Array("select id,name from proxy_group order by taxis,time asc")) != false)
				$this->sma->assign('group' , $this->group);
		}
		
		/**
		 * API user 的信息入库
		 * @param $url	操作完成跳转的页面
		 * @param $key	编辑状态的key
		 */
		private function append($url , $key = false)
		{
			$post = $this->fun->pars_all('post' , true);
			if (!$post['name']) $this->fun->Msg('联系人为必填信息');
			if (!$post['proxy_group']) $this->fun->Msg('代理组为必填信息');
			if (!$post['product_ip']) $this->fun->Msg('产品 服务器IP 为必填信息');
			if (!$post['detail_ip']) $this->fun->Msg('产品明细 服务器IP 为必填信息');
			if (!$post['INTbid_ip']) $this->fun->Msg('国际报价 服务器IP 为必填信息');
			
			$array = array();
			$array['name'] = $post['name'];
			//$array['proxy_id'] = $post['proxy_id'];
			$array['tel'] = $post['tel'];
			$array['proxy_group'] = $post['proxy_group'];
			$array['QQ'] = $post['QQ'];
			$array['mail'] = $post['mail'];
			$array['province'] = $post['province'];
			$array['city'] = $post['city'];
			$array['company_name'] = $post['company_name'];
			$array['company_address'] = $post['company_address'];
			$array['home_page'] = $post['home_page'];
			$array['brand_name'] = $post['brand_name'];
			$array['dot'] = sprintf('%.2f' , $post['dot']);
			$array['product_ip'] = $this->to_ip($post['product_ip']);
			$array['detail_ip'] = $this->to_ip($post['detail_ip']);
			$array['INTbid_ip'] = $this->to_ip($post['INTbid_ip']);
			$array['remark'] = nl2br($post['remark']);
			$array['time'] = mktime();
			
			if ($key)
			{
				$this->db->update('api_user' , $array , "`key`='{$key}'");
			}else{
				$array['key'] = $this->get_key();
				$this->db->insert('api_user' , $array);
			}
			
			$this->fun->local($url);
		}
		
		private function to_ip($ip)
		{
			$ip = explode(',' , $ip);
			$ip = serialize($ip);
			return $ip;
		}
		
		private function get_key()
		{
			$str = strtoupper($this->fun->rand_string(20));
			return substr($str , 0 , 5) . '-' . substr($str , 5 , 5) . '-' . substr($str , 10 , 5) . '-' . substr($str , 15 , 5);
		}
	}
?>