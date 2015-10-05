<?php
	class service extends start
	{
		private $role , $group , $position , $NAB , $Appendix;
		
		public function __construct()
		{
			parent::__construct(true);
		}
		
		//列表
		public function show()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			
			$ORDER = array('time_UP'=>'login_time asc' , 'time_Dn'=>'login_time desc' , 'nber_UP'=>'`number` asc' , 'nber_Dn'=>'`number` desc');
			$this->get['ORDER'] = $ors = ($this->get['ORDER']) ? $this->get['ORDER'] : 'time_Dn';
			$this->sma->assign('get' , $this->get);
			
			require_once(BASEPATH . '../Class/page.php');
			
			$list = new page;
			$list->db = $this->db;
			$list->pageNS = (is_numeric($this->get['PNS'])) ? $this->get['PNS'] : 14;
			$list->NowPage = (empty($this->get['page']) | $this->get['page'] < 1 | !is_numeric($this->get['page'])) ? 1 : $this->get['page'];
			$list->SQL = "select id,account,name,nickname,`number`,login_time from service order by {$ORDER[$ors]}";
			
			$this->sma->assign('list_page',$list->getPage());
			$this->sma->assign('list_text',$list->getText());
			
			$this->sma->display($this->get['open']);
		}
		
		//删除用户
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
			
			$this->db->del('service' , 'id in ' . $id);
			$this->db->del('service_nab' , 'service_id in ' . $id);
			//TODO 此处需要删除用户的文件(未处理)
			$this->db->del('service_appendix' , 'service_id in ' . $id);
			
			$this->fun->local('./?open=' . $this->get['open']);
		}
		
		//添加用户
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
		
		//TODO 用户明细
		public function view()
		{
			
		}
		
		//编辑用户
		public function edit()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			
			if ($this->get['go'] == 'append')
			{
				$this->append('./?open=' . $this->get['open'] , $this->get['id']);
			}else{
				
				if (($edit = $this->db->select_to_1Array("select * from service where id='{$this->get['id']}'")) != false)
					$this->sma->assign('edit' , $edit);
				
				$this->_this_show();
				
				$this->sma->display($this->get['open'] . '_append');
			}
		}
		
		//用户通讯录
		public function nab()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			
			if ($this->get['go'] == 'append')
			{
				$this->set_db_NAB('./?open=' . $this->get['open'] , $this->get['id']);
				
			}else{
				$this->NAB = array('QQ' => 'QQ','mail' => '邮箱','tel' => '电话','mobile' => '手机','msn' => 'MSN','skype' => 'Skype','else' => '其他方式');
				$this->sma->assign('NAB' , $this->NAB);
			
				if (($edit = $this->db->select_to_1Array("select account,name,nickname,`number` from service where id='{$this->get['id']}'")) != false)
					$this->sma->assign('edit' , $edit);
				
				if (($Nab = $this->db->select_to_2Array("select * from service_nab where service_id='{$this->get['id']}'")) != false)
					$this->sma->assign('Nab' , $Nab);
					
				$this->sma->display($this->get['open'] . '_nab');
			}
		}
		
		//用户附件 - 列表
		public function appx_show()
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
			$list->SQL = "select id,type,name,`into`,time from service_appendix where service_id='{$this->get['id']}' order by {$ORDER[$ors]}";
			
			$this->sma->assign('list_page',$list->getPage());
			$this->sma->assign('list_text',$list->getText());
			
			$this->sma->display('service_appx_show');
		}
		
		//用户附件 - 添加
		public function appx_add()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			
			if ($this->get['go'] == 'append')
			{
				$this->service_appx_append("./?open={$this->get['open']}&action=appx_show&id={$this->get['id']}");
			}else{
				$this->_appendix_public();
				$this->sma->display('service_appx_append');
			}
		}
		
		//用户附件 - 编辑
		public function appx_edit()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			
			if ($this->get['go'] == 'append')
			{
				$this->service_appx_append("./?open={$this->get['open']}&action=appx_show&id={$this->get['id']}" , $this->get['appxid']);
			}else{
				if (($edit = $this->db->select_to_1Array("select * from service_appendix where id='{$this->get['appxid']}'")) != false)
					$this->sma->assign('edit' , $edit);
				
				$this->_appendix_public();
				$this->sma->display('service_appx_append');
			}
		}
		
		//用户附件 - 删除
		public function appx_del()
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
			$this->db->del('service_appendix' , 'id in ' . $id);
			
			$this->fun->local("./?open={$this->get['open']}&action=appx_show&id={$this->get['id']}");
		}
		
		//用户附件 - 下载
		public function appx_down()
		{
			if (!$this->BTP[$this->get['open']][$this->get['action']]) $this->fun->Msg($this->BTP_Words);
			
			if (($file = $this->db->select_to_1Array("select name , host from service_appendix where id='{$this->get['appxid']}'")) != false)
			{
				if ($file['host']) $this->fun->Download('../' . $file['host'] , $file['name']);
			}
		}
		
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
		
		/**
		 * 用户附件的信息入库
		 * @param $url	操作完成跳转的页面
		 * @param $id	编辑状态的ID
		 */
		private function appx_append($url , $id = false)
		{
			$post = $this->fun->pars_all('post' , true);
			if (!$post['type']) $this->fun->Msg('请选择文件类型');
			if (!$post['name']) $this->fun->Msg('名称为必填信息');
			
			$array = array();
			$array['id'] = ($id) ? $id : $this->fun->rand_string(15);
			
			$File = $this->fun->UpFILE('../upload/service/appendix/','host',$array['id'],5242880,array('jpg','gif','bmp','png','doc','xls','ppt','rar','zip'));
			$array['type'] = $post['type'];
			$array['service_id'] = $this->get['id'];
			$array['name'] = $post['name'];
			$array['into'] = $post['into'];
			if ($File['path']) $array['host'] = $File['path'];
			$array['show'] = nl2br($post['show']);
			$array['time'] = mktime();
			
			if ($id)
			{
				$this->db->update('service_appendix' , $array , "id='{$id}'");
			}else{
				if (!$File['path']) $this->fun->Msg('请上传附件');
				$this->db->insert('service_appendix' , $array);
			}
			
			$this->fun->local($url);
		}
		
		/**
		 * 用户附件 - 公共信息
		 */
		private function _appendix_public()
		{
			$this->Appendix = array('photo' => '图片','document' => 'Office 文件','zipped' => '压缩文件');
			$this->sma->assign('Appendix' , $this->Appendix);
			
			if (($edit = $this->db->select_to_1Array("select account,name,nickname,`number` from service where id='{$this->get['id']}'")) != false)
				$this->sma->assign('service' , $edit);
		}
		
		/**
		 * 用户 - 公共信息
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
			$post = $this->fun->pars_all('post' , true);
			if (!$post['account']) $this->fun->Msg('账号为必填信息');
			if (!$id) if (!$post['password']) $this->fun->Msg('密码为必填信息');
			if ($post['password']) if (strlen($post['password']) < 6) $this->fun->Msg('密码不能少于6个字符');
			if (!$post['nickname']) $this->fun->Msg('昵称为必填信息');
			if (!$post['name']) $this->fun->Msg('真实姓名为必填信息');
			if (!$post['number']) $this->fun->Msg('编号为必填信息');
			if (!$post['role'] || count($post['role']) < 1) $this->fun->Msg('角色为必备信息');
			
			$array = array();
			$array['account'] = $post['account'];
			if ($post['password']) $array['password'] = md5($post['password']);
			$array['name'] = $post['name'];
			$array['nickname'] = $post['nickname'];
			$array['number'] = $post['number'];
			$array['province'] = $post['province'];
			$array['city'] = $post['city'];
			$array['sex'] = $post['sex'];
			$array['role'] = serialize($post['role']);
			$array['remark'] = nl2br($post['remark']);
			$array['time'] = mktime();
			$array['service_id'] = ($post['service_id']) ? $post['service_id'] : null;
			$array['service_write'] = ($post['service_id']) ? $post['service_write'] : null;
			
			if ($id)
			{
				$this->db->update('service' , $array , "id='{$id}'");
			}else{
				$array['id'] = $this->fun->rand_string(16);
				$this->db->insert('service' , $array);
			}
			
			$this->fun->local($url);
		}
		
		/**
		 * 用户的通讯录入库
		 * @param $url	操作完成跳转的页面
		 * @param $id	编辑状态的ID
		 */
		private function set_db_NAB($url , $id)
		{
			$post = $this->fun->pars_all('post' , true);
			
			$this->db->del('service_nab' , "service_id='{$id}'");
			foreach ($post['content'] as $key => $val)
			{
				if ($val)
				{
					if (!$post['type'][$key]) $this->fun->Msg('请选择通讯类型');
					
					$array = array();
					$array['id'] = $this->fun->rand_string(14);
					$array['service_id'] = $this->get['id'];
					$array['type'] = $post['type'][$key];
					$array['type_name'] = $post['type_name'][$key];
					$array['content'] = $val;
					$array['time'] = mktime();
					
					$this->db->insert('service_nab' , $array);
				}
			}
			
			$this->fun->local($url);
		}
		
		/**
		 * 代理 - 附件 - post
		 * @param $url	操作完成跳转的页面
		 * @param $id	编辑状态的ID
		 */
		private function service_appx_append($url , $id = false)
		{
			$post = $this->fun->pars_all('post' , true);
			if (!$post['type']) $this->fun->Msg('请选择文件类型');
			if (!$post['name']) $this->fun->Msg('名称为必填信息');
			
			$array = array();
			$array['id'] = ($id) ? $id : $this->fun->rand_string(15);
			
			$File = $this->fun->UpFILE('../upload/service/appendix/','host',$array['id'],5242880,array('jpg','gif','bmp','png','doc','xls','ppt','rar','zip'));
			$array['type'] = $post['type'];
			$array['service_id'] = $this->get['id'];
			$array['name'] = $post['name'];
			$array['into'] = $post['into'];
			if ($File['path']) $array['host'] = $File['path'];
			$array['show'] = nl2br($post['show']);
			$array['time'] = mktime();
			
			if ($id)
			{
				$this->db->update('service_appendix' , $array , "id='{$id}'");
			}else{
				if (!$File['path']) $this->fun->Msg('请上传附件');
				$this->db->insert('service_appendix' , $array);
			}
			
			$this->fun->local($url);
		}
	}
?>