<?php /* Smarty version Smarty3-b8, created on 2011-06-03 17:11:12
         compiled from "D:\web\vhosts\shehua.hk\backadmin/Template/stock_append.html" */ ?>
<?php /*%%SmartyHeaderCode:68434de8a530434d60-62022559%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bd9764a2e361d65b4c30952565fc1c37fd49a6bb' => 
    array (
      0 => 'D:\\web\\vhosts\\shehua.hk\\backadmin/Template/stock_append.html',
      1 => 1305853533,
    ),
  ),
  'nocache_hash' => '68434de8a530434d60-62022559',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_write_url')) include 'D:\web\vhosts\shehua.hk\smarty\plugins\function.write_url.php';
if (!is_callable('smarty_function_CLASS_COLOR')) include 'D:\web\vhosts\shehua.hk\smarty\plugins\function.CLASS_COLOR.php';
if (!is_callable('smarty_modifier_default')) include 'D:\web\vhosts\shehua.hk\smarty\plugins\modifier.default.php';
if (!is_callable('smarty_function_br_to_null')) include 'D:\web\vhosts\shehua.hk\smarty\plugins\function.br_to_null.php';
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
				<?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['add']){?><li><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'add','DEL'=>'id'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('stock'=>$_smarty_tpl->getVariable('get')->value['open'],'add'=>$_smarty_tpl->getVariable('get')->value['action'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>添加库存地址</a></li><?php }?>
				<?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['show']){?><li><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'show','DEL'=>'id'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('stock'=>$_smarty_tpl->getVariable('get')->value['open'],'show'=>$_smarty_tpl->getVariable('get')->value['action'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>库存地址管理</a></li><?php }?>
			</ul>
			<span class="clear"></span>
		</div>
		<div class="append">
			<form action="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'go'=>'append'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" method="post">
				<table width="100%" border="0" cellspacing="1" cellpadding="0" id="tab_show">
					<tr><th colspan="2"><?php if ($_smarty_tpl->getVariable('get')->value['action']!='edit'){?>添加库存地址<?php }else{ ?>编辑库存地址<?php }?></th></tr>
					<tr>
						<td align="right" width="30%" class="Need">库存地址</td>
						<td><input type="text" name="address" value="<?php echo $_smarty_tpl->getVariable('edit')->value['address'];?>
" style="width:80%" /></td>
					</tr>
					<tr>
						<td align="right">负责人</td>
						<td><input type="text" name="principal" value="<?php echo $_smarty_tpl->getVariable('edit')->value['principal'];?>
" style="width:250px" /></td>
					</tr>
					<tr>
						<td align="right">电话</td>
						<td><input type="text" name="tel" value="<?php echo $_smarty_tpl->getVariable('edit')->value['tel'];?>
" style="width:250px" /></td>
					</tr>
					<tr>
						<td align="right">手机</td>
						<td><input type="text" name="mobile" value="<?php echo $_smarty_tpl->getVariable('edit')->value['mobile'];?>
" style="width:250px" /></td>
					</tr>
					<tr>
						<td align="right">传真</td>
						<td><input type="text" name="fax" value="<?php echo $_smarty_tpl->getVariable('edit')->value['fax'];?>
" style="width:250px" /></td>
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