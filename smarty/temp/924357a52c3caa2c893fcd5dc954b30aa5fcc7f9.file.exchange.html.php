<?php /* Smarty version Smarty3-b8, created on 2012-05-11 09:32:26
         compiled from "D:\APMServ5.2.6\www\htdocs\shehuahk\backadmin/Template/exchange.html" */ ?>
<?php /*%%SmartyHeaderCode:156194fac6c2a07fae5-15477377%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '924357a52c3caa2c893fcd5dc954b30aa5fcc7f9' => 
    array (
      0 => 'D:\\APMServ5.2.6\\www\\htdocs\\shehuahk\\backadmin/Template/exchange.html',
      1 => 1305853533,
    ),
  ),
  'nocache_hash' => '156194fac6c2a07fae5-15477377',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_write_url')) include 'D:\APMServ5.2.6\www\htdocs\shehuahk\smarty\plugins\function.write_url.php';
if (!is_callable('smarty_function_CLASS_COLOR')) include 'D:\APMServ5.2.6\www\htdocs\shehuahk\smarty\plugins\function.CLASS_COLOR.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo @Site_Name;?>
</title>
<link href="css/public.css" rel="stylesheet" type="text/css" />
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
			<table width="100%" border="0" cellspacing="1" cellpadding="0" class="Padd_TD" id="tab_show">
				<tr><th colspan="2">汇率管理</th></tr>
				<tr>
					<td align="right" width="45%" class="Need">美元 -&gt; 人民币</td>
					<td><?php echo $_smarty_tpl->getVariable('show')->value['USD'];?>
</td>
				</tr>
				<tr>
					<td align="right" class="Need">港元 -&gt; 人民币</td>
					<td><?php echo $_smarty_tpl->getVariable('show')->value['HKD'];?>
</td>
				</tr>
				<tr>
					<td align="right" class="Need">台币 -&gt; 人民币</td>
					<td><?php echo $_smarty_tpl->getVariable('show')->value['TWD'];?>
</td>
				</tr>
				<tr>
					<td align="right">日元 -&gt; 人民币</td>
					<td><?php echo $_smarty_tpl->getVariable('show')->value['JPY'];?>
</td>
				</tr>
				<tr>
					<td align="right">欧元 -&gt; 人民币</td>
					<td><?php echo $_smarty_tpl->getVariable('show')->value['EUR'];?>
</td>
				</tr>
				<tr>
					<td align="right">英镑 -&gt; 人民币</td>
					<td><?php echo $_smarty_tpl->getVariable('show')->value['GBP'];?>
</td>
				</tr>
			</table>
		</div>
	</div>
	<b class="clear"></b>
</div>
</body>
</html>