<?php /* Smarty version Smarty3-b8, created on 2012-05-01 16:13:31
         compiled from "D:\APMServ5.2.6\www\htdocs\shehuahk\backadmin/Template/import_customize.html" */ ?>
<?php /*%%SmartyHeaderCode:65314f9f9b2b874f95-50013533%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0ba8952eb6a6110e0cf323f30bdcfca516eb4bfe' => 
    array (
      0 => 'D:\\APMServ5.2.6\\www\\htdocs\\shehuahk\\backadmin/Template/import_customize.html',
      1 => 1305853533,
    ),
  ),
  'nocache_hash' => '65314f9f9b2b874f95-50013533',
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
			<?php if ($_smarty_tpl->getVariable('get')->value['go']=='doo'){?>
			<h4 style="color:#F00">请选择对应的数据</h4>
			<form action="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'go'=>'go'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" method="post">
			<input type="hidden" name="file_url" value="<?php echo $_smarty_tpl->getVariable('file_url')->value;?>
" />
			<?php echo $_smarty_tpl->getVariable('tab_html')->value;?>

			<div style="padding:1em 0">
				<b style="color:#69F">删除行数</b> <input name="del_NO" type="text" value="1,2" />
				<span style="color:#666;">注意:如果删除多行数据 请用半角状态的逗号隔开</span>
			</div>
			<input type="submit" value="确定" />
			</form>
			<?php }elseif($_smarty_tpl->getVariable('get')->value['go']=='end'){?>
			<div align="center" style="padding:100px 0">
				<b style="color:#F00; display:block; margin:1em;">数据导入成功</b>
				<a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'customize','DEL'=>'ALL'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" style="margin:0 1em">返回到 导入 程序</a>
			</div>
			<?php }else{ ?>
			<form action="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'go'=>'doo'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" method="post" enctype="multipart/form-data">
				<table width="100%" border="0" cellspacing="1" cellpadding="0" id="tab_show">
					<tr><th colspan="2">自定义CSV文件导入程序</th></tr>
					<tr>
						<td align="right" class="Need" width="40%">请选择CSV文件</td>
						<td><input type="file" name="csv" size="60" style="height:25px; width:80%" /></td>
					</tr>
					<tr><th align="center" colspan="2"><input type="submit" value=" 上传 " /></th></tr>
				</table>
			</form>
			<?php }?>
		</div>
	</div>
	<b class="clear"></b>
</div>
</body>
</html>