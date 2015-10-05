<?php /* Smarty version Smarty3-b8, created on 2015-07-22 11:06:12
         compiled from "D:\WWW\shehua_hk\backadmin/Template/proxy_group_append.html" */ ?>
<?php /*%%SmartyHeaderCode:2648355af08a42d5552-43441049%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9ae77fb2c5d61a05bdbd6da2726be30c62986367' => 
    array (
      0 => 'D:\\WWW\\shehua_hk\\backadmin/Template/proxy_group_append.html',
      1 => 1437359489,
    ),
  ),
  'nocache_hash' => '2648355af08a42d5552-43441049',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_write_url')) include 'D:\WWW\shehua_hk\smarty\plugins\function.write_url.php';
if (!is_callable('smarty_function_CLASS_COLOR')) include 'D:\WWW\shehua_hk\smarty\plugins\function.CLASS_COLOR.php';
if (!is_callable('smarty_modifier_default')) include 'D:\WWW\shehua_hk\smarty\plugins\modifier.default.php';
if (!is_callable('smarty_function_checked')) include 'D:\WWW\shehua_hk\smarty\plugins\function.checked.php';
if (!is_callable('smarty_function_br_to_null')) include 'D:\WWW\shehua_hk\smarty\plugins\function.br_to_null.php';
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
>添加代理组</a></li><?php }?>
				<?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['show']){?><li><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'show','DEL'=>'ALL'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('show'=>$_smarty_tpl->getVariable('get')->value['action'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>代理组管理</a></li><?php }?>
			</ul>
			<span class="clear"></span>
		</div>
		<div class="append">
			<form action="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'go'=>'append'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" method="post">
				<table width="100%" border="0" cellspacing="1" cellpadding="0" id="tab_show">
					<tr><th colspan="2"><?php if ($_smarty_tpl->getVariable('get')->value['action']!='edit'){?>添加代理组<?php }else{ ?>编辑代理组<?php }?></th></tr>
					<tr>
						<td align="right" width="30%" class="Need">代理组</td>
						<td><input type="text" name="name" value="<?php echo $_smarty_tpl->getVariable('edit')->value['name'];?>
" style="width:250px" /></td>
					</tr>
					<tr>
						<td align="right">说明</td>
						<td><input type="text" name="show" value="<?php echo $_smarty_tpl->getVariable('edit')->value['show'];?>
" style="width:85%" /></td>
					</tr>
					<tr>
						<td align="right" class="Need">退点</td>
						<td><input type="text" name="rebate" class="taxis" value="<?php echo smarty_modifier_default($_smarty_tpl->getVariable('edit')->value['rebate'],0);?>
" maxlength="5" onfocus="sprintf('%.2f' , this , true)" /> %</td>
					</tr>
					<tr>
						<td align="right">促销价</td>
						<td>
							<input name="is_offer" type="radio" value="Y" <?php if ($_smarty_tpl->getVariable('get')->value['action']=='add'||$_smarty_tpl->getVariable('edit')->value['is_offer']=='Y'){?>checked="checked"<?php }?> /> 支持
							<input name="is_offer" type="radio" value="N" <?php echo smarty_function_checked(array('val'=>$_smarty_tpl->getVariable('edit')->value['is_offer'],'str'=>'N'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 /> 不支持
						</td>
					</tr>
					<tr>
						<td align="right" class="Need">短信 / 每条</td>
						<td><input type="text" name="sms_price" class="taxis" value="<?php echo smarty_modifier_default($_smarty_tpl->getVariable('edit')->value['sms_price'],0.1);?>
" maxlength="4" onfocus="sprintf('%.2f' , this)" /> 元</td>
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
</body>
</html>