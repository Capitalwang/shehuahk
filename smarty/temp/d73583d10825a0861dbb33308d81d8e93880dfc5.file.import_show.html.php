<?php /* Smarty version Smarty3-b8, created on 2011-05-28 18:54:12
         compiled from "D:\web\vhosts\shehua.hk\backadmin/Template/import_show.html" */ ?>
<?php /*%%SmartyHeaderCode:256174de0d45434c310-15812234%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd73583d10825a0861dbb33308d81d8e93880dfc5' => 
    array (
      0 => 'D:\\web\\vhosts\\shehua.hk\\backadmin/Template/import_show.html',
      1 => 1306580023,
    ),
  ),
  'nocache_hash' => '256174de0d45434c310-15812234',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_write_url')) include 'D:\web\vhosts\shehua.hk\smarty\plugins\function.write_url.php';
if (!is_callable('smarty_function_CLASS_COLOR')) include 'D:\web\vhosts\shehua.hk\smarty\plugins\function.CLASS_COLOR.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo @Site_Name;?>
</title>
<link href="css/public.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="Js/string.js"></script>
<script type="text/javascript" src="Js/EXPORT.js"></script>
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
				<?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['customize']){?><li><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'customize','DEL'=>'ALL'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('customize'=>$_smarty_tpl->getVariable('get')->value['action'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>CSV导入数据库(自定义)</a></li><?php }?>
				<?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['standard']){?><li><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'standard','DEL'=>'ALL'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('standard'=>$_smarty_tpl->getVariable('get')->value['action'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>CSV导入数据库</a></li><?php }?>
				<?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['show']){?><li><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'DEL'=>'ALL'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('show'=>$_smarty_tpl->getVariable('get')->value['action'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>从接口获取CSV文件</a></li><?php }?>
			</ul>
			<span class="clear"></span>
		</div>
		<div class="append">
			<table width="100%" border="0" cellspacing="1" cellpadding="0" class="Padd_TD" id="tab_show">
				<tr><th colspan="2">从接口获取CSV文件</th></tr>
				<tr>
					<td align="right" class="Need">开始重量</td>
					<td><input type="text" id="start" value="0.29" style="width:80px;text-align:center" onfocus="sprintf('%.2f',this);" /></td>
				</tr>
				<tr>
					<td align="right" class="Need">结束重量</td>
					<td><input type="text" id="stops" value="11.00" style="width:80px;text-align:center" onfocus="sprintf('%.2f',this);" /></td>
				</tr>
				<tr><th align="center" colspan="2"><input type="button" value=" 确认 执行 " onclick="read_exec(this , 'show_exec')" /></th></tr>
				<tr id="msg" style="display:none"><td colspan="2"></td></tr>
			</table>
		</div>
	</div>
	<b class="clear"></b>
</div>
</body>
</html>