<?php /* Smarty version Smarty3-b8, created on 2011-05-25 16:18:33
         compiled from "D:\htdocs\yulog.net.shehua\proxy/Template/me_info.html" */ ?>
<?php /*%%SmartyHeaderCode:317074ddcbb591cb816-19107160%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6e94831a9da4d8321816fbe895336d9bbde4349a' => 
    array (
      0 => 'D:\\htdocs\\yulog.net.shehua\\proxy/Template/me_info.html',
      1 => 1306305835,
    ),
  ),
  'nocache_hash' => '317074ddcbb591cb816-19107160',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>奢华</title>
<link href="css/default.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="Pe">
	<div class="head">
		<img src="images/logo.jpg" />
		<?php $_template = new Smarty_Internal_Template("nav.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

	</div>
	<div class="gray me">
		<div class="let">
			<div>您好！欢迎进入在线库存中心</div>
			<?php $_template = new Smarty_Internal_Template("me_nav.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

		</div>
		
		<div class="Ys">
			<div class="foe">
				<table width="100%" border="0" cellspacing="1" cellpadding="0" class="log">
					<tr><th colspan="2" class="te">我的资讯</th></tr>
					<tr><th width="45%">编号</th><td><?php echo $_smarty_tpl->getVariable('show')->value['number'];?>
</th></tr>
					<tr><th>账号</th><td><?php echo $_smarty_tpl->getVariable('show')->value['account'];?>
</td></tr>
					<tr><th>真实姓名</th><td><?php echo $_smarty_tpl->getVariable('show')->value['name'];?>
</td></tr>
					<tr><th>昵称</th><td><?php echo $_smarty_tpl->getVariable('show')->value['nickname'];?>
</td></tr>
					<tr><th>余款</th><td><?php echo $_smarty_tpl->getVariable('show')->value['money'];?>
 元</td></tr>
					<!--<tr>
						<th>手机短信</th>
						<td><?php if ($_smarty_tpl->getVariable('show')->value['is_SMS']=='Y'){?>开启<span style="color:#09F;margin:0 0 0 2em"><?php echo $_smarty_tpl->getVariable('proxy')->value['sms_price'];?>
 / 条</span><?php }else{ ?>关闭<?php }?></td>
					</tr>-->
					<tr><th>公司名称</th><td><?php echo $_smarty_tpl->getVariable('show')->value['company_name'];?>
</td></tr>
					<tr><th>公司地址</th><td><?php echo $_smarty_tpl->getVariable('show')->value['company_address'];?>
</td></tr>
					<tr><th>品牌名称</th><td><?php echo $_smarty_tpl->getVariable('show')->value['brand_name'];?>
</td></tr>
					<tr><th>职务名称</th><td><?php echo $_smarty_tpl->getVariable('show')->value['position'];?>
</td></tr>
					<tr><th>经营区域</th><td><?php echo $_smarty_tpl->getVariable('show')->value['business_zone'];?>
</td></tr>
					<tr><th>经营范围</th><td><?php echo $_smarty_tpl->getVariable('show')->value['business_scope'];?>
</td></tr>
					<tr><th>上级业务</th><td><?php echo $_smarty_tpl->getVariable('show')->value['salesman_write'];?>
</td></tr>
					<tr><th>上级客服</th><td><?php echo $_smarty_tpl->getVariable('show')->value['service_write'];?>
</td></tr>
					<tr><th>网站</th><td><?php echo $_smarty_tpl->getVariable('show')->value['home_page'];?>
</td></tr>
					<tr><th>开户日期</th><td><?php echo $_smarty_tpl->getVariable('show')->value['start_date'];?>
</td></tr>
					<tr><th>位置</th><td><?php echo $_smarty_tpl->getVariable('show')->value['province'];?>
<?php if ($_smarty_tpl->getVariable('show')->value['city']){?> - <?php echo $_smarty_tpl->getVariable('show')->value['city'];?>
<?php }?></td></tr>
					<tr><th>性别</th><td><?php if ($_smarty_tpl->getVariable('show')->value['sex']=='privacy'){?>保密<?php }elseif($_smarty_tpl->getVariable('show')->value['sex']=='man'){?>男<?php }else{ ?>女<?php }?></td></tr>
					<tr><th>上次登录时间</th><td><?php echo $_smarty_tpl->getVariable('show')->value['login_time'];?>
</td></tr>
					<tr>
						<th>通讯</th>
						<td>
							<ul class="NAB" id="NAB">
								<?php  $_smarty_tpl->tpl_vars['nB'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('Nab')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['nB']->key => $_smarty_tpl->tpl_vars['nB']->value){
?>
								<li><?php echo $_smarty_tpl->getVariable('nB')->value['type_name'];?>
 - <?php echo $_smarty_tpl->getVariable('nB')->value['content'];?>
 <?php if ($_smarty_tpl->getVariable('nB')->value['is_default']=='Y'){?><span style="color:#F00">接收 手机短信 号码</span><?php }?></li>
								<?php }} ?>
							</ul>
						</td>
					</tr>
					<!--<tr><td>备注</td><td><?php echo $_smarty_tpl->getVariable('show')->value['remark'];?>
</td></tr>-->
				</table>
			</div>
		</div>
		<i class="clear"></i>
	</div>
	<?php $_template = new Smarty_Internal_Template("foot.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

</div>
</body>
</html>
