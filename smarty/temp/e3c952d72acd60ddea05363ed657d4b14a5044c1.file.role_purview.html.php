<?php /* Smarty version Smarty3-b8, created on 2013-05-25 13:53:35
         compiled from "D:\APMServ5.2.6\www\htdocs\shehuahk\backadmin/Template/role_purview.html" */ ?>
<?php /*%%SmartyHeaderCode:1460851a051df17e930-18060504%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e3c952d72acd60ddea05363ed657d4b14a5044c1' => 
    array (
      0 => 'D:\\APMServ5.2.6\\www\\htdocs\\shehuahk\\backadmin/Template/role_purview.html',
      1 => 1305853533,
    ),
  ),
  'nocache_hash' => '1460851a051df17e930-18060504',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_write_url')) include 'D:\APMServ5.2.6\www\htdocs\shehuahk\smarty\plugins\function.write_url.php';
if (!is_callable('smarty_function_CLASS_COLOR')) include 'D:\APMServ5.2.6\www\htdocs\shehuahk\smarty\plugins\function.CLASS_COLOR.php';
if (!is_callable('smarty_function_checked')) include 'D:\APMServ5.2.6\www\htdocs\shehuahk\smarty\plugins\function.checked.php';
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
					<tr><th colspan="2">设定角色权限</th></tr>
					<tr>
						<td align="right" width="20%">角色名</td>
						<td><?php echo $_smarty_tpl->getVariable('edit')->value['name'];?>
</td>
					</tr>
					<tr class='NO_TAB_SHOW'>
						<td align="right" class="Need">代理权限</td>
						<td>
							<div class="select">
								注：在存在[显示]标签的行中,选择其他任何标签,都将选中[显示].
							</div>
							<ul class="purview">
								<?php  $_smarty_tpl->tpl_vars['pws'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('purview')->value['proxy']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['pws']->key => $_smarty_tpl->tpl_vars['pws']->value){
?>
								<li>
									<b><?php echo $_smarty_tpl->getVariable('pws')->value['open_show'];?>
</b>
									<input value="选择" type="button" class="set" onclick="select_zfs(this);" />
									<?php  $_smarty_tpl->tpl_vars['aon'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('pws')->value['action']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['aon']->key => $_smarty_tpl->tpl_vars['aon']->value){
?>
									<label for="<?php echo $_smarty_tpl->getVariable('aon')->value['id'];?>
"><input name="purview[]" type="checkbox" value="<?php echo $_smarty_tpl->getVariable('aon')->value['id'];?>
" id="<?php echo $_smarty_tpl->getVariable('aon')->value['id'];?>
" title="<?php echo $_smarty_tpl->getVariable('aon')->value['action'];?>
" onclick="select_ck(this)" <?php echo smarty_function_checked(array('val'=>$_smarty_tpl->getVariable('aon')->value['id'],'str'=>$_smarty_tpl->getVariable('edit')->value['purview']),$_smarty_tpl->smarty,$_smarty_tpl);?>
 /> <?php echo $_smarty_tpl->getVariable('aon')->value['action_show'];?>
</label>
									<?php }} ?>
								</li>
								<?php }} ?>
							</ul>
						</td>
					</tr>
					<tr class='NO_TAB_SHOW'>
						<td align="right" class="Need">客服权限</td>
						<td>
							<div class="select">
								注：在存在[显示]标签的行中,选择其他任何标签,都将选中[显示].
							</div>
							<ul class="purview">
								<?php  $_smarty_tpl->tpl_vars['pws'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('purview')->value['service']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['pws']->key => $_smarty_tpl->tpl_vars['pws']->value){
?>
								<li>
									<b><?php echo $_smarty_tpl->getVariable('pws')->value['open_show'];?>
</b>
									<input value="选择" type="button" class="set" onclick="select_zfs(this);" />
									<?php  $_smarty_tpl->tpl_vars['aon'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('pws')->value['action']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['aon']->key => $_smarty_tpl->tpl_vars['aon']->value){
?>
									<label for="<?php echo $_smarty_tpl->getVariable('aon')->value['id'];?>
"><input name="purview[]" type="checkbox" value="<?php echo $_smarty_tpl->getVariable('aon')->value['id'];?>
" id="<?php echo $_smarty_tpl->getVariable('aon')->value['id'];?>
" title="<?php echo $_smarty_tpl->getVariable('aon')->value['action'];?>
" onclick="select_ck(this)" <?php echo smarty_function_checked(array('val'=>$_smarty_tpl->getVariable('aon')->value['id'],'str'=>$_smarty_tpl->getVariable('edit')->value['purview']),$_smarty_tpl->smarty,$_smarty_tpl);?>
 /> <?php echo $_smarty_tpl->getVariable('aon')->value['action_show'];?>
</label>
									<?php }} ?>
								</li>
								<?php }} ?>
							</ul>
						</td>
					</tr>
					<tr class='NO_TAB_SHOW'>
						<td align="right" class="Need">后台权限</td>
						<td>
							<div class="select">
								注：在存在[显示]标签的行中,选择其他任何标签,都将选中[显示].
							</div>
							<ul class="purview">
								<?php  $_smarty_tpl->tpl_vars['pws'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('purview')->value['back']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['pws']->key => $_smarty_tpl->tpl_vars['pws']->value){
?>
								<li>
									<b><?php echo $_smarty_tpl->getVariable('pws')->value['open_show'];?>
</b>
									<input value="选择" type="button" class="set" onclick="select_zfs(this);" />
									<?php  $_smarty_tpl->tpl_vars['aon'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('pws')->value['action']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['aon']->key => $_smarty_tpl->tpl_vars['aon']->value){
?>
									<label for="<?php echo $_smarty_tpl->getVariable('aon')->value['id'];?>
"><input name="purview[]" type="checkbox" value="<?php echo $_smarty_tpl->getVariable('aon')->value['id'];?>
" id="<?php echo $_smarty_tpl->getVariable('aon')->value['id'];?>
" title="<?php echo $_smarty_tpl->getVariable('aon')->value['action'];?>
" onclick="select_ck(this)" <?php echo smarty_function_checked(array('val'=>$_smarty_tpl->getVariable('aon')->value['id'],'str'=>$_smarty_tpl->getVariable('edit')->value['purview']),$_smarty_tpl->smarty,$_smarty_tpl);?>
 /> <?php echo $_smarty_tpl->getVariable('aon')->value['action_show'];?>
</label>
									<?php }} ?>
								</li>
								<?php }} ?>
							</ul>
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