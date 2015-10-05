<?php /* Smarty version Smarty3-b8, created on 2011-05-28 18:59:44
         compiled from "D:\web\vhosts\shehua.hk\backadmin/Template/service_append.html" */ ?>
<?php /*%%SmartyHeaderCode:291194de0d5a0dca7f0-51489551%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cd30e4f33d8911e66d5f87c96b48356793a9a374' => 
    array (
      0 => 'D:\\web\\vhosts\\shehua.hk\\backadmin/Template/service_append.html',
      1 => 1305853533,
    ),
  ),
  'nocache_hash' => '291194de0d5a0dca7f0-51489551',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_write_url')) include 'D:\web\vhosts\shehua.hk\smarty\plugins\function.write_url.php';
if (!is_callable('smarty_function_CLASS_COLOR')) include 'D:\web\vhosts\shehua.hk\smarty\plugins\function.CLASS_COLOR.php';
if (!is_callable('smarty_modifier_default')) include 'D:\web\vhosts\shehua.hk\smarty\plugins\modifier.default.php';
if (!is_callable('smarty_function_checked')) include 'D:\web\vhosts\shehua.hk\smarty\plugins\function.checked.php';
if (!is_callable('smarty_function_br_to_null')) include 'D:\web\vhosts\shehua.hk\smarty\plugins\function.br_to_null.php';
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
>添加客服</a></li><?php }?>
				<?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['show']){?><li><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'show','DEL'=>'ALL'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('show'=>$_smarty_tpl->getVariable('get')->value['action'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>客服列表</a></li><?php }?>
			</ul>
			<span class="clear"></span>
		</div>
		<div class="append">
			<form action="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'go'=>'append'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" method="post">
				<table width="100%" border="0" cellspacing="1" cellpadding="0" id="tab_show">
					<tr><th colspan="2"><?php if ($_smarty_tpl->getVariable('get')->value['action']!='edit'){?>添加客服<?php }else{ ?>编辑客服<?php }?></th></tr>
					<tr>
						<td align="right" width="40%" class="Need">账号</td>
						<td><input type="text" name="account" value="<?php echo $_smarty_tpl->getVariable('edit')->value['account'];?>
" style="width:250px" /></td>
					</tr>
					<tr>
						<td align="right" <?php echo smarty_function_CLASS_COLOR(array('add'=>$_smarty_tpl->getVariable('get')->value['action'],'CLASS'=>'Need'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>密码</td>
						<td>
							<input type="password" name="password" style="width:250px" />
							<span class="Hint">注：密码不能少于6个字符. <?php if ($_smarty_tpl->getVariable('get')->value['action']=='edit'){?><b>不填写表示不更改客服的密码</b><?php }?></span>
						</td>
					</tr>
					<tr>
						<td align="right" class="Need">昵称</td>
						<td><input type="text" name="nickname" value="<?php echo $_smarty_tpl->getVariable('edit')->value['nickname'];?>
" style="width:250px" /></td>
					</tr>
					<tr>
						<td align="right" class="Need">真实姓名</td>
						<td><input type="text" name="name" value="<?php echo $_smarty_tpl->getVariable('edit')->value['name'];?>
" style="width:250px" /></td>
					</tr>
					<tr>
						<td align="right" class="Need">编号</td>
						<td><input type="text" name="number" value="<?php echo $_smarty_tpl->getVariable('edit')->value['number'];?>
" style="width:250px" /></td>
					</tr>
					<tr>
						<td align="right">位置</td>
						<td><span id='PROVINCE_CITY'></span></td>
					</tr>
					<tr>
						<td align="right">客服经理</td>
						<td class="AjaxShow">
							<input type="text" name="service_write" value="<?php echo smarty_modifier_default($_smarty_tpl->getVariable('edit')->value['service_write'],'账号,编号,姓名');?>
" onfocus="AjaxShow(this,'账号,编号,姓名' , 'service' , 'service')" <?php if ($_smarty_tpl->getVariable('edit')->value['service_id']){?>style="color:#F00;font-weight:900"<?php }?> />
							<input name="service_id" type="hidden" value="<?php echo $_smarty_tpl->getVariable('edit')->value['service_id'];?>
" />
							<b <?php if ($_smarty_tpl->getVariable('edit')->value['service_id']){?>class="act_1_6"<?php }?>></b>
						</td>
					</tr>
					<tr>
						<td align="right" class="Need">角色</td>
						<td class="block_CHECK">
							<?php  $_smarty_tpl->tpl_vars['re'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('role')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['re']->key => $_smarty_tpl->tpl_vars['re']->value){
?>
							<label for='<?php echo $_smarty_tpl->getVariable('re')->value['id'];?>
'><input type="checkbox" name="role[]" value="<?php echo $_smarty_tpl->getVariable('re')->value['id'];?>
" id="<?php echo $_smarty_tpl->getVariable('re')->value['id'];?>
" <?php echo smarty_function_checked(array('val'=>$_smarty_tpl->getVariable('re')->value['id'],'str'=>$_smarty_tpl->getVariable('edit')->value['role']),$_smarty_tpl->smarty,$_smarty_tpl);?>
 /> <?php echo $_smarty_tpl->getVariable('re')->value['name'];?>
</label>
							<?php }} ?>
						</td>
					</tr>
					<tr>
						<td align="right">性别</td>
						<td>
							<input name="sex" type="radio" value="privacy" <?php if ($_smarty_tpl->getVariable('get')->value['action']=='add'){?>checked="checked"<?php }else{ ?><?php echo smarty_function_checked(array('val'=>$_smarty_tpl->getVariable('edit')->value['sex'],'str'=>'privacy'),$_smarty_tpl->smarty,$_smarty_tpl);?>
<?php }?> /> 保密
							<input name="sex" type="radio" value="man" <?php echo smarty_function_checked(array('val'=>$_smarty_tpl->getVariable('edit')->value['sex'],'str'=>'man'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 /> 男
							<input name="sex" type="radio" value="woman" <?php echo smarty_function_checked(array('val'=>$_smarty_tpl->getVariable('edit')->value['sex'],'str'=>'woman'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 /> 女
						</td>
					</tr>
					<tr>
						<td align="right">备注</td>
						<td><textarea name="remark" style="width:80%; height:120px"><?php echo smarty_function_br_to_null(array('str'=>$_smarty_tpl->getVariable('edit')->value['remark']),$_smarty_tpl->smarty,$_smarty_tpl);?>
</textarea></td>
					</tr>
					<tr><th colspan="2" align="center"><input type="submit" value=" 提 交 " /> <input type="reset" value=" 重 填 " /></th></tr>
				</table>
			</form>
		</div>
	</div>
	<b class="clear"></b>
</div>
<script type="text/javascript" src="Js/city.js"></script>
<script type="text/javascript">set_PROVINCE_CITY('PROVINCE_CITY' , 'province' , 'city' , '<?php echo smarty_modifier_default($_smarty_tpl->getVariable('edit')->value['province'],"0");?>
' , '<?php echo smarty_modifier_default($_smarty_tpl->getVariable('edit')->value['city'],"0");?>
');</script>
</body>
</html>