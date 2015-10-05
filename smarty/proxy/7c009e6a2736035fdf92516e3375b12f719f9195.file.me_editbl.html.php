<?php /* Smarty version Smarty3-b8, created on 2015-07-23 12:24:12
         compiled from "D:\WWW\shehua_hk\wholesale/Template/me_editbl.html" */ ?>
<?php /*%%SmartyHeaderCode:234655b06c6cd18233-31134958%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7c009e6a2736035fdf92516e3375b12f719f9195' => 
    array (
      0 => 'D:\\WWW\\shehua_hk\\wholesale/Template/me_editbl.html',
      1 => 1437625432,
    ),
  ),
  'nocache_hash' => '234655b06c6cd18233-31134958',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_write_url')) include 'D:\WWW\shehua_hk\smarty\plugins\function.write_url.php';
if (!is_callable('smarty_modifier_default')) include 'D:\WWW\shehua_hk\smarty\plugins\modifier.default.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>奢华-编辑倍率</title>
<link href="css/default.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="Js/default.js"></script>
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
" method="post" enctype="multipart/form-data">
					<table width="100%" border="0" cellspacing="1" cellpadding="0" class="log mes">
						<tr><th colspan="2" class="te">编辑倍率</th></tr>
						<tr><th width="35%">编号</th><td><?php echo $_smarty_tpl->getVariable('show')->value['number'];?>
</td></tr>
						<tr><th>账号</th><td><?php echo $_smarty_tpl->getVariable('show')->value['account'];?>
</td></tr>
						
						<tr><th>倍率</th><td><input name="mag" type="text" value="<?php echo smarty_modifier_default($_smarty_tpl->getVariable('show')->value['mag'],0);?>
" style="width:50%" onfocus="sprintf('%.2f' , this , true)" /></td></tr>

						<tr><td colspan="2" class="INP" align="center"><input value="确定" type="submit" style="height:auto; line-height:normal" /></td></tr>
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
