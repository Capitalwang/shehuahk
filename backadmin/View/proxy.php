<?php
	class proxy extends start
	{
		private $role , $group , $position , $NAB , $Appendix;
		
		public function __construct()
		{
			parent::__construct(true);
		}
		
		//代理列表
		public function show()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			
			$ORDER = array('time_UP'=>'login_time asc' , 'time_Dn'=>'login_time desc' , 'nber_UP'=>'`number` asc' , 'nber_Dn'=>'`number` desc');
			$this->get['ORDER'] = $ors = ($this->get['ORDER']) ? $this->get['ORDER'] : 'time_Dn';
			
			//查询
			if ($this->get['go'] == 'query')
			{
			 	$query = "where p.account like '%{$this->get['info']}%' 
			 	or p.name like '%{$this->get['info']}%' or p.nickname like '%{$this->get['info']}%' or p.number like '%{$this->get['info']}%'
			 	or p.company_name like '%{$this->get['info']}%'";
			}
			
			$this->sma->assign('get' , $this->get);
			
			require_once(BASEPATH . '../Class/page.php');
			
			$list = new page;
			$list->db = $this->db;
			$list->pageNS = (is_numeric($this->get['PNS'])) ? $this->get['PNS'] : 14;
			$list->NowPage = (empty($this->get['page']) | $this->get['page'] < 1 | !is_numeric($this->get['page'])) ? 1 : $this->get['page'];
			$list->SQL = "select p.id,p.account,p.name,p.nickname,p.number,p.login_time,p.company_name,p.mag,g.mag as `gmag`,g.name as `group` from proxy as p left join proxy_group as g on g.id=p.proxy_group {$query} order by p.{$ORDER[$ors]}";
			
			$this->sma->assign('list_page',$list->getPage());
			$this->sma->assign('list_text',$list->getText());
			
			$this->sma->display($this->get['open']);
		}
		
		//删除代理
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
			
			$this->db->del('proxy' , 'id in ' . $id);
			//TODO 此处需要删除文件(未处理)
			$this->db->del('proxy_appendix' , 'proxy_id in ' . $id);
			$this->db->del('proxy_nab' , 'proxy_id in ' . $id);
			
			$this->fun->local('./?open=' . $this->get['open']);
		}
		
		//添加代理
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
		
		//编辑代理
		public function edit()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			
			if ($this->get['go'] == 'append')
			{
				$this->append('./?open=' . $this->get['open'] , $this->get['id']);
			}else{
				
				if (($edit = $this->db->select_to_1Array("select * from proxy where id='{$this->get['id']}'")) != false)
					$this->sma->assign('edit' , $edit);
				
				$this->_this_show();
				
				$this->sma->display($this->get['open'] . '_append');
			}
		}
		
		//代理通讯录
		public function proxy_nab()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			
			if ($this->get['go'] == 'append')
			{
				$this->set_db_NAB('./?open=' . $this->get['open'] , $this->get['id']);
				
			}else{
				$this->NAB = array('QQ' => 'QQ','mail' => '邮箱','tel' => '电话','mobile' => '手机','msn' => 'MSN','skype' => 'Skype','else' => '其他方式');
				$this->sma->assign('NAB' , $this->NAB);
			
				if (($edit = $this->db->select_to_1Array("select account,name,nickname,`number`,company_name,position from proxy where id='{$this->get['id']}'")) != false)
					$this->sma->assign('edit' , $edit);
				
				if (($Nab = $this->db->select_to_2Array("select * from proxy_nab where proxy_id='{$this->get['id']}'")) != false)
					$this->sma->assign('Nab' , $Nab);
					
				$this->sma->display($this->get['open'] . '_nab');
			}
		}
		
		//代理 - 附件 - 列表
		public function proxy_appx_show()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			
			$this->_appendix_public();
			$ORDER = array('time_UP'=>'time asc' , 'time_Dn'=>'time desc' , 'type_UP'=>'type asc' , 'type_Dn'=>'type desc');
			$this->get['ORDER'] = $ors = ($this->get['ORDER']) ? $this->get['ORDER'] : 'time_Dn';
			$this->sma->assign('get' , $this->get);
			
			require_once(BASEPATH . '../Class/page.php');
			$list = new page;
			$list->db = $this->db;
			$list->pageNS = (is_numeric($this->get['PNS'])) ? $this->get['PNS'] : 14;
			$list->NowPage = (empty($this->get['page']) | $this->get['page'] < 1 | !is_numeric($this->get['page'])) ? 1 : $this->get['page'];
			$list->SQL = "select id,type,name,`into`,time from proxy_appendix where proxy_id='{$this->get['id']}' order by {$ORDER[$ors]}";
			
			$this->sma->assign('list_page',$list->getPage());
			$this->sma->assign('list_text',$list->getText());
			
			$this->sma->display('proxy_appx_show');
		}
		
		//代理 - 附件 - 添加
		public function proxy_appx_add()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			
			if ($this->get['go'] == 'append')
			{
				$this->proxy_appx_append("./?open={$this->get['open']}&action=proxy_appx_show&id={$this->get['id']}");
			}else{
				$this->_appendix_public();
				$this->sma->display('proxy_appx_append');
			}
		}
		
		//代理 - 附件 - 编辑
		public function proxy_appx_edit()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			
			if ($this->get['go'] == 'append')
			{
				$this->proxy_appx_append("./?open={$this->get['open']}&action=proxy_appx_show&id={$this->get['id']}" , $this->get['appxid']);
			}else{
				if (($edit = $this->db->select_to_1Array("select * from proxy_appendix where id='{$this->get['appxid']}'")) != false)
					$this->sma->assign('edit' , $edit);
				
				$this->_appendix_public();
				$this->sma->display('proxy_appx_append');
			}
		}
		
		//代理 - 附件 - 删除
		public function proxy_appx_del()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			if ($_POST['appxid'])
			{
				$post = $this->fun->pars_all('post' , true);
				$id = "('" . join("','" , $post['appxid']) . "')";
			}else{
				$id = "('" . $this->get['appxid'] . "')";
			}
			//TODO 此处要删除文件(未处理)
			$this->db->del('proxy_appendix' , 'id in ' . $id);
			
			$this->fun->local("./?open={$this->get['open']}&action=proxy_appx_show&id={$this->get['id']}");
		}
		
		//代理 - 附件 - 下载
		public function proxy_appx_down()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			
			if (($file = $this->db->select_to_1Array("select name , host from proxy_appendix where id='{$this->get['appxid']}'")) != false)
			{
				if ($file['host']) $this->fun->Download('../' . $file['host'] , $file['name']);
			}
		}
		
		//代理 - ajax 取上级
		public function ajax()
		{
			$tab = ($this->get['tab'] == 'proxy') ? 'proxy' : 'service';
			$DATA = $this->db->select_to_1Array("select id from {$tab} where account='{$this->get['string']}' or name='{$this->get['string']}' or number='{$this->get['string']}'");
			if ($DATA)
				$DATA = array('id'=>$DATA['id'] , 'S'=>1);
			else
				$DATA = array('id'=>'' , 'S'=>0);
				
			echo $this->fun->php_json_encode($DATA);
		}
		
		//财务
		public function money()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			
			if ($this->get['go'] == 'append')
			{
				$post = $this->fun->pars_all('post' , true);
				if (!is_numeric($post['money'])) $this->fun->Msg('请填写要 加/减 的 金额');
				if (!$post['show']) $this->fun->Msg('请填写操作原因');
				
				if ($post['money'] != 0)
				{
					//写入到全局日志中去
					$log = array();
					$log['id'] = $this->fun->rand_string(32);
					$log['type'] = 'money';
					$log['who_id'] = $this->get['id'];
					$log['update_id'] = $_SESSION['back']['id'];
					$info = $this->db->select_to_1Array("select * from proxy where id='{$this->get['id']}'");
					$log['pre-info'] = serialize($info);
					$info['money'] = sprintf('%.2f' , $info['money'] + (float)$post['money']);
					$log['sith-info'] = serialize($info);
					$log['show'] = "{$_SESSION['back']['name']} 为 {$post['name']} 代理";
					if ($post['money'] > 0)$log['show'] .= " 增加了 {$post['money']} 元"; else $log['show'] .= ' 减去了 ' . abs($post['money']) . ' 元';
					$log['show'] .= "\r\n操作原因：" . $post['show'];
					$log['show'] = nl2br($log['show']);
					
					$log['time'] = mktime();
					$this->db->insert('log' , $log);
					
					$this->db->update('proxy' , array('money'=>'+++' . $post['money']) , "id='{$this->get['id']}'");
				}
				$this->fun->local('./?open=proxy');
			}else{
				if (($edit = $this->db->select_to_1Array("select account,name,nickname,`number`,company_name,position,money from proxy where id='{$this->get['id']}'")) != false)
					$this->sma->assign('edit' , $edit);
				
				$this->sma->display($this->get['open'] . '_money');
			}
		}
		
		//日志
		public function log()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			
			$this->_appendix_public();

			$ORDER = array('time_UP'=>'time asc' , 'time_Dn'=>'time desc' , 'type_UP'=>'`type` asc' , 'type_Dn'=>'`type` desc');
			$this->get['ORDER'] = $ors = ($this->get['ORDER']) ? $this->get['ORDER'] : 'time_Dn';
			$this->sma->assign('get' , $this->get);
			
			require_once(BASEPATH . '../Class/page.php');
			$list = new page;
			$list->db = $this->db;
			$list->pageNS = (is_numeric($this->get['PNS'])) ? $this->get['PNS'] : 14;
			$list->NowPage = (empty($this->get['page']) | $this->get['page'] < 1 | !is_numeric($this->get['page'])) ? 1 : $this->get['page'];
			$list->SQL = "select id,`show`,time from log where who_id='{$this->get['id']}' order by {$ORDER[$ors]}";
			
			$this->sma->assign('list_page',$list->getPage());
			$this->sma->assign('list_text',$list->getText());
			
			$this->sma->display($this->get['open'] . '_log');
		}
	
		/**
		 * 代理 - 附件 - post
		 * @param $url	操作完成跳转的页面
		 * @param $id	编辑状态的ID
		 */
		private function proxy_appx_append($url , $id = false)
		{
			$post = $this->fun->pars_all('post' , true);
			if (!$post['type']) $this->fun->Msg('请选择文件类型');
			if (!$post['name']) $this->fun->Msg('名称为必填信息');
			
			$array = array();
			$array['id'] = ($id) ? $id : $this->fun->rand_string(15);
			
			$File = $this->fun->UpFILE('../upload/proxy/appendix/','host',$array['id'],5242880,array('jpg','gif','bmp','png','doc','xls','ppt','rar','zip'));
			$array['type'] = $post['type'];
			$array['proxy_id'] = $this->get['id'];
			$array['name'] = $post['name'];
			$array['into'] = $post['into'];
			if ($File['path']) $array['host'] = $File['path'];
			$array['show'] = nl2br($post['show']);
			$array['time'] = mktime();
			
			if ($id)
			{
				$this->db->update('proxy_appendix' , $array , "id='{$id}'");
			}else{
				if (!$File['path']) $this->fun->Msg('请上传附件');
				$this->db->insert('proxy_appendix' , $array);
			}
			
			$this->fun->local($url);
		}
		
		/**
		 * 代理 - 附件 - public show
		 */
		private function _appendix_public()
		{
			$this->Appendix = array('photo' => '图片','document' => 'Office 文件','zipped' => '压缩文件');
			$this->sma->assign('Appendix' , $this->Appendix);
			
			if (($edit = $this->db->select_to_1Array("select account,name,nickname,`number` from proxy where id='{$this->get['id']}'")) != false)
				$this->sma->assign('proxy' , $edit);
		}
		
		/**
		 * 代理 - show
		 */
		private function _this_show()
		{
			if (($this->role = $this->db->select_to_2Array("select id,name from role where is_work='Y' order by time asc")) != false)
				$this->sma->assign('role' , $this->role);
			
			if (($this->group = $this->db->select_to_2Array("select id,name from proxy_group order by taxis,time asc")) != false)
				$this->sma->assign('group' , $this->group);
		}
		
		/**
		 * 角色的信息入库
		 * @param $url	操作完成跳转的页面
		 * @param $id	编辑状态的ID
		 */
		private function append($url , $id = false)
		{
			// echo 'here append';die;
			$post = $this->fun->pars_all('post' , true);
			if (!$post['account']) $this->fun->Msg('账号为必填信息');
			if (!$id) if (!$post['password']) $this->fun->Msg('密码为必填信息');
			if ($post['password']) if (strlen($post['password']) < 6) $this->fun->Msg('密码不能少于6个字符');
			if (!$post['nickname']) $this->fun->Msg('昵称为必填信息');
			if (!$post['number']) $this->fun->Msg('编号为必填信息');
			if (!$post['role'] || count($post['role']) < 1) $this->fun->Msg('角色为必备信息');
			if (!$post['proxy_group']) $this->fun->Msg('代理组为必填信息');
			if (!$post['start_date']) $this->fun->Msg('开户日期为必备信息');
			
			$array = array();
			$array['account'] = $post['account'];
			if ($post['password']) $array['password'] = md5($post['password']);
			$array['name'] = $post['name'];
			$array['nickname'] = $post['nickname'];
			$array['number'] = $post['number'];
			$array['company_logo'] = $post['company_logo'];
			$array['company_name'] = $post['company_name'];
			$array['company_address'] = $post['company_address'];
			$array['brand_name'] = $post['brand_name'];
			$array['position'] = $post['position'];
			$array['business_zone'] = $post['business_zone'];
			$array['business_scope'] = $post['business_scope'];
			$array['salesman_id'] = ($post['salesman_id']) ? $post['salesman_id'] : null;
			$array['salesman_write'] = ($post['salesman_id']) ? $post['salesman_write'] : null;
			
			$array['service_id'] = ($post['service_id']) ? $post['service_id'] : null;
			$array['service_write'] = ($post['service_id']) ? $post['service_write'] : null;
			
			$array['home_page'] = $post['home_page'];
			$array['start_date'] = strtotime($post['start_date']);
			$array['province'] = $post['province'];
			$array['city'] = $post['city'];
			$array['sex'] = $post['sex'];
			$array['is_SMS'] = ($post['is_SMS'] == 'Y') ? 'Y' : 'N';
			$array['role'] = serialize($post['role']);
			$array['proxy_group'] = $post['proxy_group'];
			$array['remark'] = nl2br($post['remark']);
			$array['time'] = mktime();
			
			if ($id)
			{
				$this->db->update('proxy' , $array , "id='{$id}'");
			}else{
				$array['id'] = $this->fun->rand_string(16);
				$this->db->insert('proxy' , $array);
			}
			
			$this->fun->local($url);
		}
		
		/**
		 * 代理的通讯录入库
		 * @param $url	操作完成跳转的页面
		 * @param $id	编辑状态的ID
		 */
		private function set_db_NAB($url , $id)
		{
			$post = $this->fun->pars_all('post' , true);
			
			$this->db->del('proxy_nab' , "proxy_id='{$id}'");
			foreach ($post['content'] as $key => $val)
			{
				if ($val)
				{
					if (!$post['type'][$key]) $this->fun->Msg('请选择通讯类型');
					
					$array = array();
					$array['id'] = $this->fun->rand_string(14);
					$array['proxy_id'] = $this->get['id'];
					$array['type'] = $post['type'][$key];
					$array['type_name'] = $post['type_name'][$key];
					$array['content'] = $val;
					$array['is_default'] = ($val == $post['is_default']) ? 'Y' : 'N';
					$array['time'] = mktime();
					
					$this->db->insert('proxy_nab' , $array);
				}
			}
			
			$this->fun->local($url);
		}
		
	}
?>