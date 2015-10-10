<?php /* Smarty version Smarty3-b8, created on 2015-10-10 14:52:55
         compiled from "D:\www\shehuahk\wholesale/Template/me_onDb.html" */ ?>
<?php /*%%SmartyHeaderCode:105225618b5c73af357-16774963%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4e8121e84d1692570454f4a6670f8966841b1fe7' => 
    array (
      0 => 'D:\\www\\shehuahk\\wholesale/Template/me_onDb.html',
      1 => 1444459948,
    ),
  ),
  'nocache_hash' => '105225618b5c73af357-16774963',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_write_url')) include 'D:\www\shehuahk\smarty\plugins\function.write_url.php';
?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<title>奢华</title>
<link href="css/me1.css" rel="stylesheet" type="text/css" />
<link href="css/kh-index.css" rel="stylesheet" type="text/css" />

<script src="http://libs.baidu.com/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="Js/default.js"></script>
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
" method="post" enctype="multipart/form-data">
					<table width="100%" border="0" cellspacing="0" cellpadding="0" class="me_log mes">
						<tr><th colspan="2" class="te">修改倍率</th></tr>
						<tr><th>*倍率</th><td><input name="mag" type="text" value="<?php echo $_smarty_tpl->getVariable('show')->value['mag'];?>
" style="width:70%"  /></td></tr>
						<tr><td colspan="2" class="INP" align="center"><input value="修改资料" type="submit" style="height:auto; line-height:normal;" /></td></tr>
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
<script type="text/javascript" src="Js/city.js"></script>
<script type="text/javascript">set_PROVINCE_CITY('PROVINCE_CITY' , 'province' , 'city' , '<?php echo $_smarty_tpl->getVariable('show')->value['province'];?>
' , '<?php echo $_smarty_tpl->getVariable('show')->value['city'];?>
');</script>
<script type="text/javascript">var NAB_ONE_LI_INNERHTML = '<select name="type[]" onchange="Up_NAB(this);set_default(this);"><option value="0">请选择通讯类型</option><?php  $_smarty_tpl->tpl_vars['aon'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['nabKey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('NAB')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['aon']->key => $_smarty_tpl->tpl_vars['aon']->value){
 $_smarty_tpl->tpl_vars['nabKey']->value = $_smarty_tpl->tpl_vars['aon']->key;
?><option value="<?php echo $_smarty_tpl->getVariable('nabKey')->value;?>
"><?php echo $_smarty_tpl->getVariable('aon')->value;?>
</option><?php }} ?></select><input name="type_name[]" type="hidden" value="" />&nbsp;<input name="content[]" type="text" value="" onkeyup="set_mobile(this)" /> <span style="display:none"><input name="is_default" type="radio" style="width:auto" /> 接收 手机短信 号码</span> &nbsp;<a href="javascript:;" onclick="Del_NAB(\'NAB\' , this)">删除</a>';</script>
</body>
</html>
