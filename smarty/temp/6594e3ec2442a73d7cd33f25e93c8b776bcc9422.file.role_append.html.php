<?php /* Smarty version Smarty3-b8, created on 2011-06-10 17:15:13
         compiled from "D:\web\vhosts\shehua.hk\backadmin/Template/role_append.html" */ ?>
<?php /*%%SmartyHeaderCode:215634df1e0a18ebdf7-85403019%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6594e3ec2442a73d7cd33f25e93c8b776bcc9422' => 
    array (
      0 => 'D:\\web\\vhosts\\shehua.hk\\backadmin/Template/role_append.html',
      1 => 1305853533,
    ),
  ),
  'nocache_hash' => '215634df1e0a18ebdf7-85403019',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_write_url')) include 'D:\web\vhosts\shehua.hk\smarty\plugins\function.write_url.php';
if (!is_callable('smarty_function_CLASS_COLOR')) include 'D:\web\vhosts\shehua.hk\smarty\plugins\function.CLASS_COLOR.php';
if (!is_callable('smarty_function_checked')) include 'D:\web\vhosts\shehua.hk\smarty\plugins\function.checked.php';
if (!is_callable('smarty_function_br_to_null')) include 'D:\web\vhosts\shehua.hk\smarty\plugins\function.br_to_null.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo @Site_Name;?>
</title>
<link href="css/public.css" rel="stylesheet" type="text/css" />
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
>添加角色</a></li><?php }?>
				<?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['show']){?><li><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'show','DEL'=>'ALL'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('show'=>$_smarty_tpl->getVariable('get')->value['action'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>角色管理</a></li><?php }?>
			</ul>
			<span class="clear"></span>
		</div>
		<div class="append">
			<form action="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'go'=>'append'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" method="post">
				<table width="100%" border="0" cellspacing="1" cellpadding="0" id="tab_show">
					<tr><th colspan="2"><?php if ($_smarty_tpl->getVariable('get')->value['action']!='edit'){?>添加角色<?php }else{ ?>编辑角色<?php }?></th></tr>
					<tr>
						<td align="right" width="20%" class="Need">角色名</td>
						<td><input type="text" name="name" value="<?php echo $_smarty_tpl->getVariable('edit')->value['name'];?>
" style="width:150px" /></td>
					</tr>
					<tr>
						<td align="right">说明</td>
						<td><input type="text" name="show" value="<?php echo $_smarty_tpl->getVariable('edit')->value['show'];?>
" style="width:90%" /></td>
					</tr>
					<tr>
						<td align="right" class="Need">是否工作</td>
						<td>
							<input name="is_work" type="radio" value="Y" <?php if ($_smarty_tpl->getVariable('get')->value['action']=='add'){?>checked="checked"<?php }else{ ?><?php echo smarty_function_checked(array('val'=>$_smarty_tpl->getVariable('edit')->value['is_work'],'str'=>'Y'),$_smarty_tpl->smarty,$_smarty_tpl);?>
<?php }?> /> 是
							<input name="is_work" type="radio" value="N" <?php echo smarty_function_checked(array('val'=>$_smarty_tpl->getVariable('edit')->value['is_work'],'str'=>'N'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 /> 否
						</td>
					</tr>
					<tr>
						<td align="right">备注</td>
						<td><textarea name="remark" style="width:90%;height:120px;"><?php echo smarty_function_br_to_null(array('str'=>$_smarty_tpl->getVariable('edit')->value['remark']),$_smarty_tpl->smarty,$_smarty_tpl);?>
</textarea></td>
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