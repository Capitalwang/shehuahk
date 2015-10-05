<?php /* Smarty version Smarty3-b8, created on 2015-09-24 14:17:56
         compiled from "D:\www\shehuahk\wholesale/Template/login.html" */ ?>
<?php /*%%SmartyHeaderCode:3251556039594d48011-83299671%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2b2f40c7ab36a9ee9aaf1240e273b860f0ce4564' => 
    array (
      0 => 'D:\\www\\shehuahk\\wholesale/Template/login.html',
      1 => 1443075462,
    ),
  ),
  'nocache_hash' => '3251556039594d48011-83299671',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_write_url')) include 'D:\www\shehuahk\smarty\plugins\function.write_url.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<title>奢华国际钻石集团-专业的钻石批发商,全球最大的GIA,IGI,HRD裸钻数据库！</title>
<meta name="keywords" content="钻石批发,裸钻批发,广州钻石批发,GIA钻石批发" />
<meta name="description" content="奢华国际钻石集团专注于GIA,IGI,HRD,国检钻石批发!钻石从0.3ct到11ct所有品质的裸钻库超3万颗钻石！成为全球最大的裸钻数据库和网上钻石批发交易平台！" />
<!-- <link href="css/default.css" rel="stylesheet" type="text/css" /> -->
<link href="css/kh-index.css" rel="stylesheet" type="text/css" />
<script src="http://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" scr="Js/hk.js"></script>
</head>

<body>

<header>
    <div class="box head-box">
        <img class="index-img" src="images/logo1.jpg" alt="奢华国际钻石集团"/>
        <span id="heid" style="background:url(images/anniu.png);"></span>
        <div class="head">
            <?php $_template = new Smarty_Internal_Template("nav.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

       </div>
   </div>
</header>


<!-- <div class="login">
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
</div> -->

<center id="center_index">
	<div class="box">
     <div class="form">
         <form action="<?php echo smarty_function_write_url(array('open'=>'login','action'=>'login'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" method="post">
              <table border="0" cellspacing="0" cellpadding="0">
                  <tr><th rowspan="4" valign="top"><img src="images/ln_ren.jpg"  alt=""/></th><th align="left">LD会员登陆</th></tr>
                  <tr><td>用户账号：<input class="input" type="text" name="Username" /></td></tr>
                  <tr><td>登录密码：<input class="input" type="password" name="Password" /></td></tr>
                  <tr><th><input class="butt" type="submit" value="登  陆" /><input class="butt" type="button" value="忘记密码" /></th></tr>
              </table>
         </form>        
     </div>
     <div class="center-img" style="float:left">
         <img src="images/ln_p.jpg" alt="" />
     </div>
    </div>
</center>

<footer>
    <?php $_template = new Smarty_Internal_Template("foot.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
   
</footer>
</body>
</html>
