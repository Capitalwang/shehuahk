<?php /* Smarty version Smarty3-b8, created on 2011-05-31 16:37:03
         compiled from "D:\web\vhosts\shehua.hk\backadmin/Template/proxy_money.html" */ ?>
<?php /*%%SmartyHeaderCode:26524de4a8af7927a3-94773030%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '613d58d2cd74fae044cb9d6f0e13007f0aa3bb6f' => 
    array (
      0 => 'D:\\web\\vhosts\\shehua.hk\\backadmin/Template/proxy_money.html',
      1 => 1305853533,
    ),
  ),
  'nocache_hash' => '26524de4a8af7927a3-94773030',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_write_url')) include 'D:\web\vhosts\shehua.hk\smarty\plugins\function.write_url.php';
if (!is_callable('smarty_function_CLASS_COLOR')) include 'D:\web\vhosts\shehua.hk\smarty\plugins\function.CLASS_COLOR.php';
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
					<tr><th colspan="2">代理的财务</th></tr>
					<tr>
						<td align="right" width="45%">代理账号</td>
						<td><?php echo $_smarty_tpl->getVariable('edit')->value['account'];?>
</td>
					</tr>
					<tr>
						<td align="right">真实姓名</td>
						<td><?php echo $_smarty_tpl->getVariable('edit')->value['name'];?>
<input name="name" type="hidden" value="<?php echo $_smarty_tpl->getVariable('edit')->value['name'];?>
" /></td>
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
					<tr>
						<td align="right" class="Need">当前账号金额</td>
						<td><?php echo smarty_modifier_default($_smarty_tpl->getVariable('edit')->value['money'],0);?>
 元</td>
					</tr>
					<tr>
						<td align="right" class="Need">加/减 金额</td>
						<td><span><?php echo smarty_modifier_default($_smarty_tpl->getVariable('edit')->value['money'],0);?>
</span> 元 + <input type="text" name="money" value="0" style="width:80px;text-align:center" onfocus="sprintf('%.2f' , this);" onchange="proxy_money(this)" /> 元 = <span><?php echo smarty_modifier_default($_smarty_tpl->getVariable('edit')->value['money'],0);?>
</span> 元</td>
					</tr>
					<tr>
						<td align="right" class="Need">操作原因</td>
						<td><textarea name="show" style="width:90%; height:120px"></textarea></td>
					</tr>
					<tr><th colspan="2" align="center"><input type="submit" value=" 确 认 " /></th></tr>
				</table>
			</form>
		</div>	
	</div>
	<b class="clear"></b>
</div>
</body>
</html>