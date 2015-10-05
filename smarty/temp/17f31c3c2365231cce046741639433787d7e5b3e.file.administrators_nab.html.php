<?php /* Smarty version Smarty3-b8, created on 2014-07-12 15:18:38
         compiled from "D:\APMServ5.2.6\www\htdocs\shehuahk\backadmin/Template/administrators_nab.html" */ ?>
<?php /*%%SmartyHeaderCode:1857353c0e14e132218-12122279%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '17f31c3c2365231cce046741639433787d7e5b3e' => 
    array (
      0 => 'D:\\APMServ5.2.6\\www\\htdocs\\shehuahk\\backadmin/Template/administrators_nab.html',
      1 => 1305853532,
    ),
  ),
  'nocache_hash' => '1857353c0e14e132218-12122279',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_write_url')) include 'D:\APMServ5.2.6\www\htdocs\shehuahk\smarty\plugins\function.write_url.php';
if (!is_callable('smarty_function_CLASS_COLOR')) include 'D:\APMServ5.2.6\www\htdocs\shehuahk\smarty\plugins\function.CLASS_COLOR.php';
if (!is_callable('smarty_function_selected')) include 'D:\APMServ5.2.6\www\htdocs\shehuahk\smarty\plugins\function.selected.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo @Site_Name;?>
</title>
<link href="css/public.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="Js/menu.js"></script>
<script type="text/javascript" src="Js/user.js"></script>
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
" <?php echo smarty_function_CLASS_COLOR(array('user'=>$_smarty_tpl->getVariable('get')->value['open'],'add'=>$_smarty_tpl->getVariable('get')->value['action'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>添加管理员</a></li><?php }?>
				<?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['show']){?><li><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'show','DEL'=>'ALL'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('user'=>$_smarty_tpl->getVariable('get')->value['open'],'show'=>$_smarty_tpl->getVariable('get')->value['action'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>管理员列表</a></li><?php }?>
			</ul>
			<span class="clear"></span>
		</div>
		<div class="append">
			<form action="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'go'=>'append'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" method="post">
				<table width="100%" border="0" cellspacing="1" cellpadding="0" id="tab_show">
					<tr><th colspan="2">管理员通讯录</th></tr>
					<tr>
						<td align="right" width="40%">管理员账号</td>
						<td><?php echo $_smarty_tpl->getVariable('edit')->value['account'];?>
</td>
					</tr>
					<tr>
						<td align="right">真实姓名</td>
						<td><?php echo $_smarty_tpl->getVariable('edit')->value['name'];?>
</td>
					</tr>
					<tr>
						<td align="right">昵称</td>
						<td><?php echo $_smarty_tpl->getVariable('edit')->value['nickname'];?>
</td>
					</tr>
					<tr>
						<td align="right">编号</td>
						<td><?php echo $_smarty_tpl->getVariable('edit')->value['number'];?>
</td>
					</tr>
					<tr class='NO_TAB_SHOW'>
						<td align="right" class="Need">通讯</td>
						<td>
							<a href="javascript:;" class="AddTX" onclick="Add_NAB('NAB');">添加新的通讯</a>
							<ul class="NAB" id="NAB">
								<?php  $_smarty_tpl->tpl_vars['nB'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('Nab')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['nB']->key => $_smarty_tpl->tpl_vars['nB']->value){
?>
								<li>
									<select name="type[]" onchange="Up_NAB(this)">
										<option value="0">请选择通讯类型</option>
										<?php  $_smarty_tpl->tpl_vars['aon'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['nabKey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('NAB')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['aon']->key => $_smarty_tpl->tpl_vars['aon']->value){
 $_smarty_tpl->tpl_vars['nabKey']->value = $_smarty_tpl->tpl_vars['aon']->key;
?><option value="<?php echo $_smarty_tpl->getVariable('nabKey')->value;?>
" <?php echo smarty_function_selected(array('val'=>$_smarty_tpl->getVariable('nB')->value['type'],'str'=>$_smarty_tpl->getVariable('nabKey')->value),$_smarty_tpl->smarty,$_smarty_tpl);?>
><?php echo $_smarty_tpl->getVariable('aon')->value;?>
</option><?php }} ?>
									</select>
									<input name="type_name[]" type="hidden" value="<?php echo $_smarty_tpl->getVariable('nB')->value['type_name'];?>
" />
									<input name="content[]" type="text" value="<?php echo $_smarty_tpl->getVariable('nB')->value['content'];?>
" />&nbsp;<a href="javascript:;" onclick="Del_NAB('NAB' , this)">删除</a>
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
<script type="text/javascript">var NAB_ONE_LI_INNERHTML = '<select name="type[]" onchange="Up_NAB(this)"><option value="0">请选择通讯类型</option><?php  $_smarty_tpl->tpl_vars['aon'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['nabKey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('NAB')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['aon']->key => $_smarty_tpl->tpl_vars['aon']->value){
 $_smarty_tpl->tpl_vars['nabKey']->value = $_smarty_tpl->tpl_vars['aon']->key;
?><option value="<?php echo $_smarty_tpl->getVariable('nabKey')->value;?>
"><?php echo $_smarty_tpl->getVariable('aon')->value;?>
</option><?php }} ?></select><input name="type_name[]" type="hidden" value="" />&nbsp;<input name="content[]" type="text" value="" />&nbsp;<a href="javascript:;" onclick="Del_NAB(\'NAB\' , this)">删除</a>';</script>
</body>
</html>