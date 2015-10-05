<?php /* Smarty version Smarty3-b8, created on 2011-06-14 21:38:38
         compiled from "D:\web\vhosts\shehua.hk\wholesale/Template/login.html" */ ?>
<?php /*%%SmartyHeaderCode:102964df7645edcf369-33457301%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c2eea421bf10aaa3f1b4ea46b252df7de3213165' => 
    array (
      0 => 'D:\\web\\vhosts\\shehua.hk\\wholesale/Template/login.html',
      1 => 1308058709,
    ),
  ),
  'nocache_hash' => '102964df7645edcf369-33457301',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_write_url')) include 'D:\web\vhosts\shehua.hk\smarty\plugins\function.write_url.php';
?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>奢华国际钻石集团-专业的钻石批发商,全球最大的GIA,IGI,HRD裸钻数据库！</title>
<meta name="keywords" content="钻石批发,裸钻批发,广州钻石批发,GIA钻石批发" />
<meta name="description" content="奢华国际钻石集团专注于GIA,IGI,HRD,国检钻石批发!钻石从0.3ct到11ct所有品质的裸钻库超3万颗钻石！成为全球最大的裸钻数据库和网上钻石批发交易平台！" />
<link href="css/default.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="Pe">
	<div class="head">
		<img src="images/logo.jpg" alt="奢华国际钻石集团"/>
		
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
	<strong>24小时服务热线:400-889-0005 , 13682251579(韩先生) ,  13560318112(谢先生) ,  15820216519(赵小姐) <br><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=200778839&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:200778839:41" alt="QQ咨询" title="点击这里给我发消息"></a> <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=228998702&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:228998702:41" alt="QQ咨询" title="点击这里给我发消息"></a> <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=248239835&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:248239835:41" alt="QQ咨询" title="点击这里给我发消息"></a> <a href="skype:shehua52?call" onclick="return skypeCheck();"><img src="http://mystatus.skype.com/bigclassic/shehua52" style="border: none;" width="91" height="22" 
alt="My status" /></a> E-mail:shehua52@163.com</strong>
	<p>©版权所有1982至2012年由 LD国际钻石集团 保留所有权利</p>
</div>
</body>
</html>
