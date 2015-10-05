<?php /* Smarty version Smarty3-b8, created on 2012-11-19 02:02:27
         compiled from "D:\APMServ5.2.6\www\htdocs\shehuahk\backadmin/Template/exchange_append.html" */ ?>
<?php /*%%SmartyHeaderCode:593450a922b3a3eaf1-93713877%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b3d8f167e74d22d141abc07acfc443569b1a0c97' => 
    array (
      0 => 'D:\\APMServ5.2.6\\www\\htdocs\\shehuahk\\backadmin/Template/exchange_append.html',
      1 => 1305853533,
    ),
  ),
  'nocache_hash' => '593450a922b3a3eaf1-93713877',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_write_url')) include 'D:\APMServ5.2.6\www\htdocs\shehuahk\smarty\plugins\function.write_url.php';
if (!is_callable('smarty_function_CLASS_COLOR')) include 'D:\APMServ5.2.6\www\htdocs\shehuahk\smarty\plugins\function.CLASS_COLOR.php';
if (!is_callable('smarty_modifier_default')) include 'D:\APMServ5.2.6\www\htdocs\shehuahk\smarty\plugins\modifier.default.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo @Site_Name;?>
</title>
<link href="css/public.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="Js/string.js"></script>
<script type="text/javascript" src="Js/menu.js"></script>
<script type="text/javascript" src="Js/exec.js"></script>
</head>

<body>
<?php $_template = new Smarty_Internal_Template("header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

<div class="center">
	<div class="left"><?php $_template = new Smarty_Internal_Template("menu.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
</div>
	<div class="right">
		<div class="Nav">
			<ul>
				<?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['edit']){?><li><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'edit','DEL'=>'id'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('exchange'=>$_smarty_tpl->getVariable('get')->value['open'],'edit'=>$_smarty_tpl->getVariable('get')->value['action'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>编辑汇率</a></li><?php }?>
				<?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['show']){?><li><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'show','DEL'=>'id'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('exchange'=>$_smarty_tpl->getVariable('get')->value['open'],'show'=>$_smarty_tpl->getVariable('get')->value['action'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>汇率管理</a></li><?php }?>
			</ul>
			<span class="clear"></span>
		</div>
		<div class="append">
			<form action="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'go'=>'append'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" method="post">
				<table width="100%" border="0" cellspacing="1" cellpadding="0" id="tab_show">
					<tr><th colspan="2">编辑汇率</th></tr>
					<tr>
						<td align="right" width="45%" class="Need">美元 -&gt; 人民币</td>
						<td><input type="text" name="USD" value="<?php echo smarty_modifier_default($_smarty_tpl->getVariable('show')->value['USD'],0);?>
" style="width:80px;text-align:center" onfocus="sprintf('%.2f' , this )" /></td>
					</tr>
					<tr>
						<td align="right" class="Need">港元 -&gt; 人民币</td>
						<td><input type="text" name="HKD" value="<?php echo smarty_modifier_default($_smarty_tpl->getVariable('show')->value['HKD'],0);?>
" style="width:80px;text-align:center" onfocus="sprintf('%.2f' , this )" /></td>
					</tr>
					<tr>
						<td align="right" class="Need">台币 -&gt; 人民币</td>
						<td><input type="text" name="TWD" value="<?php echo smarty_modifier_default($_smarty_tpl->getVariable('show')->value['TWD'],0);?>
" style="width:80px;text-align:center" onfocus="sprintf('%.2f' , this )" /></td>
					</tr>
					<tr>
						<td align="right">日元 -&gt; 人民币</td>
						<td><input type="text" name="JPY" value="<?php echo smarty_modifier_default($_smarty_tpl->getVariable('show')->value['JPY'],0);?>
" style="width:80px;text-align:center" onfocus="sprintf('%.2f' , this )" /></td>
					</tr>
					<tr>
						<td align="right">欧元 -&gt; 人民币</td>
						<td><input type="text" name="EUR" value="<?php echo smarty_modifier_default($_smarty_tpl->getVariable('show')->value['EUR'],0);?>
" style="width:80px;text-align:center" onfocus="sprintf('%.2f' , this )" /></td>
					</tr>
					<tr>
						<td align="right">英镑 -&gt; 人民币</td>
						<td><input type="text" name="GBP" value="<?php echo smarty_modifier_default($_smarty_tpl->getVariable('show')->value['GBP'],0);?>
" style="width:80px;text-align:center" onfocus="sprintf('%.2f' , this )" /></td>
					</tr>
					<tr><th colspan="2" align="center"><input type="submit" value=" 提 交 " /> <input type="reset" value=" 重 填 " /></th></tr>
				</table>
			</form>
		</div>
	</div>
	<b class="clear"></b>
</div>
</body>
</html>