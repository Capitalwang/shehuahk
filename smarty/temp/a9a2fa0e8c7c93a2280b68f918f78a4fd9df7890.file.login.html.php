<?php /* Smarty version Smarty3-b8, created on 2011-05-28 18:58:21
         compiled from "D:\web\vhosts\shehua.hk\backadmin/Template/login.html" */ ?>
<?php /*%%SmartyHeaderCode:6574de0d54d7dea12-33614758%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a9a2fa0e8c7c93a2280b68f918f78a4fd9df7890' => 
    array (
      0 => 'D:\\web\\vhosts\\shehua.hk\\backadmin/Template/login.html',
      1 => 1306580023,
    ),
  ),
  'nocache_hash' => '6574de0d54d7dea12-33614758',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_write_url')) include 'D:\web\vhosts\shehua.hk\smarty\plugins\function.write_url.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo @Site_Name;?>
</title>
<link href="css/login.css" rel="stylesheet" type="text/css" />
</head>
<body>
<form method="post" action="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'login'),$_smarty_tpl->smarty,$_smarty_tpl);?>
">
<table border="0" cellspacing="1" cellpadding="0" align=center>
	<tr><th colspan="2"><?php echo @Site_Name;?>
</th></tr>
	<tr>
		<td align="right" width="30%">账　号</td>
		<td><input type="text" name="Username" /></td>
	</tr>
	<tr>
		<td align="right">密　码</td>
		<td><input type="password" name="Password" /></td>
	</tr>
<!--
	<tr>
		<td align="right">验证码</td>
		<td>
			<input type="text" name="code" maxlength="4" style="width:40px;" />
			<img src="?open=code" onclick="this.src='?open=code&'+Math.random()" />
		</td>
	</tr>
-->
	<tr>
		<th colspan="2" align="center">
			<input type="submit" value="登 陆" />
			<input type="reset" value="重 填" />
		</th>
	</tr>
</table>
</form>
</body>
</html>
