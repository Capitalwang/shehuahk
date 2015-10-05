<?php /* Smarty version Smarty3-b8, created on 2011-05-29 22:47:23
         compiled from "D:\web\vhosts\shehua.hk\backadmin/Template/news_append.html" */ ?>
<?php /*%%SmartyHeaderCode:261994de25c7b34cb35-42154027%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8d3bfa7e9239b2575bb96bf7d3f7b8b41e201299' => 
    array (
      0 => 'D:\\web\\vhosts\\shehua.hk\\backadmin/Template/news_append.html',
      1 => 1305863301,
    ),
  ),
  'nocache_hash' => '261994de25c7b34cb35-42154027',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_write_url')) include 'D:\web\vhosts\shehua.hk\smarty\plugins\function.write_url.php';
if (!is_callable('smarty_function_CLASS_COLOR')) include 'D:\web\vhosts\shehua.hk\smarty\plugins\function.CLASS_COLOR.php';
if (!is_callable('smarty_function_br_to_null')) include 'D:\web\vhosts\shehua.hk\smarty\plugins\function.br_to_null.php';
if (!is_callable('smarty_modifier_default')) include 'D:\web\vhosts\shehua.hk\smarty\plugins\modifier.default.php';
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
				<?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['add']){?><li><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'add','DEL'=>'ALL'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('add'=>$_smarty_tpl->getVariable('get')->value['action'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>添加新闻</a></li><?php }?>
				<?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['show']){?><li><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'show','DEL'=>'ALL'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('show'=>$_smarty_tpl->getVariable('get')->value['action'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>新闻管理</a></li><?php }?>
			</ul>
			<span class="clear"></span>
		</div>
		<div class="append">
			<form action="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'go'=>'append'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" method="post">
				<table width="100%" border="0" cellspacing="1" cellpadding="0" id="tab_show">
					<tr><th colspan="2"><?php if ($_smarty_tpl->getVariable('get')->value['action']!='edit'){?>添加新闻<?php }else{ ?>编辑新闻<?php }?></th></tr>
					<tr>
						<td align="right" width="20%" class="Need">新闻名称</td>
						<td><input name="title" type="text" style="width:90%" value="<?php echo $_smarty_tpl->getVariable('edit')->value['title'];?>
" /></td>
					</tr>
					<tr>
						<td align="right" class="Need">简介</td>
						<td><textarea name="bewrite" style="width:90%; height:120px;"><?php echo smarty_function_br_to_null(array('str'=>$_smarty_tpl->getVariable('edit')->value['bewrite']),$_smarty_tpl->smarty,$_smarty_tpl);?>
</textarea></td>
					</tr>
					<tr>
						<td align="right">关键字</td>
						<td><input name="key_word" type="text" style="width:90%" value="<?php echo $_smarty_tpl->getVariable('edit')->value['key_word'];?>
" /></td>
					</tr>
					<tr>
						<td align="right">来源名称</td>
						<td><input name="derivation_name" type="text" style="width:90%" value="<?php echo $_smarty_tpl->getVariable('edit')->value['derivation_name'];?>
" /></td>
					</tr>
					<tr>
						<td align="right">来源URL</td>
						<td><input name="derivation_url" type="text" style="width:90%" value="<?php echo $_smarty_tpl->getVariable('edit')->value['derivation_url'];?>
" /></td>
					</tr>
					<tr>
						<td align="right">排序</td>
						<td>
							<input name="taxis" type="text" class="taxis" value="<?php echo smarty_modifier_default($_smarty_tpl->getVariable('edit')->value['taxis'],1);?>
" onfocus="sprintf('%d' , this)" />
							<span class="Hint">注：数字越大越靠前,数字范围(-2147483648 ~ 2147483647)</span>
						</td>
					</tr>
					<tr>
						<td align="right">状态</td>
						<td>
							<label for="is_view_Y"><input name="is_view" id="is_view_Y" type="radio" value="Y" <?php if ($_smarty_tpl->getVariable('edit')->value['is_view']=='Y'||$_smarty_tpl->getVariable('get')->value['action']=='add'){?>checked="checked"<?php }?> /> 显示</label>
							<label for="is_view_N"><input name="is_view" id="is_view_N" type="radio" value="N" <?php if ($_smarty_tpl->getVariable('edit')->value['is_view']=='N'){?>checked="checked"<?php }?> /> 隐藏</label>
						</td>
					</tr>
					<tr>
						<td align="right">内容</td>
						<td><?php echo $_smarty_tpl->getVariable('content')->value;?>
</td>
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