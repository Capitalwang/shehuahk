<?php /* Smarty version Smarty3-b8, created on 2015-10-10 15:08:33
         compiled from "D:\www\shehuahk\wholesale/Template/me_password.html" */ ?>
<?php /*%%SmartyHeaderCode:192345618b97117d3d0-71114340%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '696c1aea9525e0d62b7a9dbf58644ef6b09e2cc7' => 
    array (
      0 => 'D:\\www\\shehuahk\\wholesale/Template/me_password.html',
      1 => 1444460911,
    ),
  ),
  'nocache_hash' => '192345618b97117d3d0-71114340',
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

<title>奢华</title>
<!-- <link href="css/default.css" rel="stylesheet" type="text/css" /> -->
<link href="css/me1.css" rel="stylesheet" type="text/css" />
<link href="css/kh-index.css" rel="stylesheet" type="text/css" />

<script src="http://libs.baidu.com/jquery/1.10.2/jquery.min.js"></script>
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
	<div class="me_home">
	<div class="me_gray">
    	<span id="left_hied"></span>
		<div class="me_let">
        <div>您好！欢迎进入在线库存中心</div>
			<?php $_template = new Smarty_Internal_Template("me_nav.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

		</div>	
		<div class="me_Ys">
			<div class="me_foe">
				<form action="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'go'=>'append'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" method="post">
					<table width="100%" border="0" cellspacing="0" cellpadding="0" class="me_log mes">
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
						<tr><td colspan="2" class="INP" style="text-align:center;"><input value="修改密码" type="submit" /></td></tr>
					</table>
				</form>
			</div>
		</div>
		<i class="clear"></i>
	</div>

</div>
<footer>
    <?php $_template = new Smarty_Internal_Template("foot.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
   
</footer>
<script type="text/javascript" src="Js/hk.js"></script>
</body>
</html>
