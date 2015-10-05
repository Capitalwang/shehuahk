<?php /* Smarty version Smarty3-b8, created on 2014-08-14 14:57:55
         compiled from "D:\www\shehuahk\backadmin/Template/API_append.html" */ ?>
<?php /*%%SmartyHeaderCode:19053ec5df38d7021-85815480%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd518402b637e5bee481c7595775c3c4011f3a3ca' => 
    array (
      0 => 'D:\\www\\shehuahk\\backadmin/Template/API_append.html',
      1 => 1305853533,
    ),
  ),
  'nocache_hash' => '19053ec5df38d7021-85815480',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_write_url')) include 'D:\www\shehuahk\smarty\plugins\function.write_url.php';
if (!is_callable('smarty_function_CLASS_COLOR')) include 'D:\www\shehuahk\smarty\plugins\function.CLASS_COLOR.php';
if (!is_callable('smarty_function_selected')) include 'D:\www\shehuahk\smarty\plugins\function.selected.php';
if (!is_callable('smarty_modifier_default')) include 'D:\www\shehuahk\smarty\plugins\modifier.default.php';
if (!is_callable('smarty_function_unserialize_to_string')) include 'D:\www\shehuahk\smarty\plugins\function.unserialize_to_string.php';
if (!is_callable('smarty_function_br_to_null')) include 'D:\www\shehuahk\smarty\plugins\function.br_to_null.php';
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
				<?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['log']){?><li><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'log','DEL'=>'ALL'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('log'=>$_smarty_tpl->getVariable('get')->value['action'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>API日志</a></li><?php }?>
				<?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['add']){?><li><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'add','DEL'=>'ALL'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('add'=>$_smarty_tpl->getVariable('get')->value['action'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>添加API用户</a></li><?php }?>
				<?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['show']){?><li><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'show','DEL'=>'ALL'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('show'=>$_smarty_tpl->getVariable('get')->value['action'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>API用户列表</a></li><?php }?>
			</ul>
			<span class="clear"></span>
		</div>
		<div class="append">
			<form action="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'go'=>'append'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" method="post">
				<table width="100%" border="0" cellspacing="1" cellpadding="0" id="tab_show">
					<tr><th colspan="2"><?php if ($_smarty_tpl->getVariable('get')->value['action']!='edit'){?>添加API用户<?php }else{ ?>编辑API用户<?php }?></th></tr>
					<?php if ($_smarty_tpl->getVariable('get')->value['action']=='edit'){?>
					<tr>
						<td align="right" height="25" class="Need">标识码</td>
						<td><?php echo $_smarty_tpl->getVariable('edit')->value['key'];?>
</td>
					</tr>
					<?php }?>
					<tr>
						<td align="right" width="40%" class="Need">联系人</td>
						<td><input type="text" name="name" value="<?php echo $_smarty_tpl->getVariable('edit')->value['name'];?>
" style="width:250px" /></td>
					</tr>
					<tr>
						<td align="right" class="Need">代理组</td>
						<td>
						<select name="proxy_group">
							<option value="0">请选择</option>
							<?php  $_smarty_tpl->tpl_vars['bch'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('group')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['bch']->key => $_smarty_tpl->tpl_vars['bch']->value){
?><option value="<?php echo $_smarty_tpl->getVariable('bch')->value['id'];?>
" <?php echo smarty_function_selected(array('val'=>$_smarty_tpl->getVariable('edit')->value['proxy_group'],'str'=>$_smarty_tpl->getVariable('bch')->value['id']),$_smarty_tpl->smarty,$_smarty_tpl);?>
><?php echo $_smarty_tpl->getVariable('bch')->value['name'];?>
</option><?php }} ?>
						</select>
						</td>
					</tr>
					<tr>
						<td align="right">电话</td>
						<td><input type="text" name="tel" value="<?php echo $_smarty_tpl->getVariable('edit')->value['tel'];?>
" style="width:250px" /></td>
					</tr>
					<tr>
						<td align="right">QQ</td>
						<td><input type="text" name="QQ" value="<?php echo $_smarty_tpl->getVariable('edit')->value['QQ'];?>
" style="width:250px" /></td>
					</tr>
					<tr>
						<td align="right">电子邮箱</td>
						<td><input type="text" name="mail" value="<?php echo $_smarty_tpl->getVariable('edit')->value['mail'];?>
" style="width:60%" /></td>
					</tr>
					<tr>
						<td align="right">位置</td>
						<td><span id='PROVINCE_CITY'></span></td>
					</tr>
					<tr>
						<td align="right">公司名称</td>
						<td><input type="text" name="company_name" value="<?php echo $_smarty_tpl->getVariable('edit')->value['company_name'];?>
" style="width:60%" /></td>
					</tr>
					<tr>
						<td align="right">公司地址</td>
						<td><input type="text" name="company_address" value="<?php echo $_smarty_tpl->getVariable('edit')->value['company_address'];?>
" style="width:60%" /></td>
					</tr>
					<tr>
						<td align="right">网站</td>
						<td><input type="text" name="home_page" value="<?php echo $_smarty_tpl->getVariable('edit')->value['home_page'];?>
" style="width:60%" /></td>
					</tr>
					<tr>
						<td align="right">品牌名称</td>
						<td><input type="text" name="brand_name" value="<?php echo $_smarty_tpl->getVariable('edit')->value['brand_name'];?>
" style="width:60%" /></td>
					</tr>
					<tr>
						<td align="right" class="Need">产品 加点</td>
						<td><input type="text" name="dot" value="<?php echo smarty_modifier_default($_smarty_tpl->getVariable('edit')->value['dot'],0);?>
" style="width:80px;text-align:center" onfocus="sprintf('%.2f' , this , true)" /> %</td>
					</tr>
					<tr>
						<td align="right" class="Need">产品 服务器IP</td>
						<td>
							<input type="text" name="product_ip" value="<?php if ($_smarty_tpl->getVariable('edit')->value['product_ip']){?><?php echo smarty_function_unserialize_to_string(array('str'=>$_smarty_tpl->getVariable('edit')->value['product_ip']),$_smarty_tpl->smarty,$_smarty_tpl);?>
<?php }?>" style="width:90%" />
							<div class="Hint">注：多个IP请用 , 隔开,每项最多5个IP</div>
						</td>
					</tr>
					<tr>
						<td align="right" class="Need">产品明细 服务器IP</td>
						<td><input type="text" name="detail_ip" value="<?php if ($_smarty_tpl->getVariable('edit')->value['detail_ip']){?><?php echo smarty_function_unserialize_to_string(array('str'=>$_smarty_tpl->getVariable('edit')->value['detail_ip']),$_smarty_tpl->smarty,$_smarty_tpl);?>
<?php }?>" style="width:90%" /></td>
					</tr>
					<tr>
						<td align="right" class="Need">国际报价 服务器IP</td>
						<td><input type="text" name="INTbid_ip" value="<?php if ($_smarty_tpl->getVariable('edit')->value['INTbid_ip']){?><?php echo smarty_function_unserialize_to_string(array('str'=>$_smarty_tpl->getVariable('edit')->value['INTbid_ip']),$_smarty_tpl->smarty,$_smarty_tpl);?>
<?php }?>" style="width:90%" /></td>
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