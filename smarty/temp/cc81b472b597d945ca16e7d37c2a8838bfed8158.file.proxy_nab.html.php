<?php /* Smarty version Smarty3-b8, created on 2015-07-21 11:52:51
         compiled from "D:\WWW\shehua_hk\backadmin/Template/proxy_nab.html" */ ?>
<?php /*%%SmartyHeaderCode:2728455adc2138a0ec9-93283424%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cc81b472b597d945ca16e7d37c2a8838bfed8158' => 
    array (
      0 => 'D:\\WWW\\shehua_hk\\backadmin/Template/proxy_nab.html',
      1 => 1437359489,
    ),
  ),
  'nocache_hash' => '2728455adc2138a0ec9-93283424',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_write_url')) include 'D:\WWW\shehua_hk\smarty\plugins\function.write_url.php';
if (!is_callable('smarty_function_CLASS_COLOR')) include 'D:\WWW\shehua_hk\smarty\plugins\function.CLASS_COLOR.php';
if (!is_callable('smarty_function_selected')) include 'D:\WWW\shehua_hk\smarty\plugins\function.selected.php';
if (!is_callable('smarty_function_checked')) include 'D:\WWW\shehua_hk\smarty\plugins\function.checked.php';
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
" <?php echo smarty_function_CLASS_COLOR(array('add'=>$_smarty_tpl->getVariable('get')->value['action'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>添加代理</a></li><?php }?>
				<?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['show']){?><li><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'show','DEL'=>'ALL'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('show'=>$_smarty_tpl->getVariable('get')->value['action'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>代理管理</a></li><?php }?>
			</ul>
			<span class="clear"></span>
		</div>
		<div class="append">
			<form action="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'go'=>'append'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" method="post">
				<table width="100%" border="0" cellspacing="1" cellpadding="0" id="tab_show">
					<tr><th colspan="2">代理通讯录</th></tr>
					<tr>
						<td align="right" width="40%">代理账号</td>
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
					<tr>
						<td align="right">公司</td>
						<td><?php echo $_smarty_tpl->getVariable('edit')->value['company_name'];?>
</td>
					</tr>
					<tr>
						<td align="right">职务</td>
						<td><?php echo $_smarty_tpl->getVariable('edit')->value['position'];?>
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
									<select name="type[]" onchange="Up_NAB(this);set_default(this);">
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
" onkeyup="set_mobile(this)" />
									<span <?php if ($_smarty_tpl->getVariable('nB')->value['type']!='mobile'){?>style="display:none"<?php }?>><input name="is_default" <?php echo smarty_function_checked(array('val'=>$_smarty_tpl->getVariable('nB')->value['is_default'],'str'=>'Y'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 type="radio" value="<?php echo $_smarty_tpl->getVariable('nB')->value['content'];?>
" style="width:auto" /> 接收 手机短信 号码</span>
									<a href="javascript:;" onclick="Del_NAB('NAB' , this)">删除</a>
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
<script type="text/javascript">var NAB_ONE_LI_INNERHTML = '<select name="type[]" onchange="Up_NAB(this);set_default(this);"><option value="0">请选择通讯类型</option><?php  $_smarty_tpl->tpl_vars['aon'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['nabKey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('NAB')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['aon']->key => $_smarty_tpl->tpl_vars['aon']->value){
 $_smarty_tpl->tpl_vars['nabKey']->value = $_smarty_tpl->tpl_vars['aon']->key;
?><option value="<?php echo $_smarty_tpl->getVariable('nabKey')->value;?>
"><?php echo $_smarty_tpl->getVariable('aon')->value;?>
</option><?php }} ?></select><input name="type_name[]" type="hidden" value="" />&nbsp;<input name="content[]" type="text" value="" onkeyup="set_mobile(this)" /> <span style="display:none"><input name="is_default" type="radio" style="width:auto" /> 接收 手机短信 号码</span> <a href="javascript:;" onclick="Del_NAB(\'NAB\' , this)">删除</a>';</script>
</body>
</html>