<?php /* Smarty version Smarty3-b8, created on 2012-07-03 22:59:23
         compiled from "D:\APMServ5.2.6\www\htdocs\shehuahk\wholesale/Template/me_password.html" */ ?>
<?php /*%%SmartyHeaderCode:205624ff308cbafb4b8-74538970%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6e54ea8502692bcc29daa50608958792d6ac1783' => 
    array (
      0 => 'D:\\APMServ5.2.6\\www\\htdocs\\shehuahk\\wholesale/Template/me_password.html',
      1 => 1306302594,
    ),
  ),
  'nocache_hash' => '205624ff308cbafb4b8-74538970',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_write_url')) include 'D:\APMServ5.2.6\www\htdocs\shehuahk\smarty\plugins\function.write_url.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
				<form action="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'go'=>'append'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" method="post">
					<table width="100%" border="0" cellspacing="1" cellpadding="0" class="log">
						<tr><th colspan="2" class="te">修改密码</th></tr>
						<tr><th width="45%">编号</th><td><?php echo $_smarty_tpl->getVariable('show')->value['number'];?>
</td></tr>
						<tr><th>账号</th><td><?php echo $_smarty_tpl->getVariable('show')->value['account'];?>
</td></tr>
						<tr><th>真实姓名</th><td><?php echo $_smarty_tpl->getVariable('show')->value['name'];?>
</td></tr>
						<tr><th>昵称</th><td><?php echo $_smarty_tpl->getVariable('show')->value['nickname'];?>
</td></tr>
						<tr><th>当前密码</th><td><input name="password" type="password" style="width:150px" /></td></tr>
						<tr><th>新的密码</th><td><input name="oneP" type="password" style="width:150px" /></td></tr>
						<tr><th>再次输入</th><td><input name="twoP" type="password" style="width:150px" /></td></tr>
						<tr><td colspan="2" class="INP" align="center"><input value="修改密码" type="submit" /></td></tr>
					</table>
				</form>
			</div>
		</div>
		<i class="clear"></i>
	</div>
	<?php $_template = new Smarty_Internal_Template("foot.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

</div>
</body>
</html>
