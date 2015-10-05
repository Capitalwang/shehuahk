<?php /* Smarty version Smarty3-b8, created on 2011-05-26 12:03:01
         compiled from "D:\htdocs\yulog.net.shehua\wholesale/Template/login.html" */ ?>
<?php /*%%SmartyHeaderCode:31354dddd0f566e734-01989755%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '09ee7f4a4ad52b320b474c00e9b7908301a1d717' => 
    array (
      0 => 'D:\\htdocs\\yulog.net.shehua\\wholesale/Template/login.html',
      1 => 1305861020,
    ),
  ),
  'nocache_hash' => '31354dddd0f566e734-01989755',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_write_url')) include 'D:\htdocs\yulog.net.shehua\smarty\plugins\function.write_url.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>奢华</title>
<link href="css/default.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="Pe">
	<div class="Login_head">
		<img src="images/login.jpg" />
		<strong>服务热线：400 889 0005</strong>
		<?php $_template = new Smarty_Internal_Template("nav.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

	</div>
</div>

<div class="login">
	<div>
		<form action="<?php echo smarty_function_write_url(array('open'=>'login','action'=>'login'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" method="post">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr><th rowspan="4" valign="top"><img src="images/ln_ren.jpg" /></th><th align="left">LD会员登陆</th></tr>
				<tr><td>用户账号：<input type="text" name="Username" /></td></tr>
				<tr><td>登录密码：<input type="password" name="Password" /></td></tr>
				<tr><th><input type="submit" value="登  陆" /><input type="button" value="忘记密码" /></th></tr>
			</table>
		</form>
		<img src="images/ln_p.jpg" />
		<i class="clear"></i>
	</div>
</div>

<div class="Pe Login_foot">
	<strong>24小时服务热线:400-889-0005</strong>
	<p>©版权所有1982至2012年由 奢华国际(香港)钻石珠宝有限公司 保留所有权利</p>
</div>
</body>
</html>
