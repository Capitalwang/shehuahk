<?php /* Smarty version Smarty3-b8, created on 2011-05-25 16:17:59
         compiled from "D:\htdocs\yulog.net.shehua\backadmin/Template/customSMS.html" */ ?>
<?php /*%%SmartyHeaderCode:157564ddcbb3800f255-29499476%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ec20bb9988dde9a7e0a6242ad5bc6c09399cdbc6' => 
    array (
      0 => 'D:\\htdocs\\yulog.net.shehua\\backadmin/Template/customSMS.html',
      1 => 1305853533,
    ),
  ),
  'nocache_hash' => '157564ddcbb3800f255-29499476',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_write_url')) include 'D:\htdocs\yulog.net.shehua\smarty\plugins\function.write_url.php';
if (!is_callable('smarty_function_CLASS_COLOR')) include 'D:\htdocs\yulog.net.shehua\smarty\plugins\function.CLASS_COLOR.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo @Site_Name;?>
</title>
<link href="css/public.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="Js/string.js"></script>
<script type="text/javascript" src="Js/menu.js"></script>
<script type="text/javascript" src="Js/cart.js"></script>
<script type="text/javascript" src="Js/product.js"></script>
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
			<?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['del']){?><li><a href="<?php echo smarty_function_write_url(array('open'=>'customSMS','action'=>'del'),$_smarty_tpl->smarty,$_smarty_tpl);?>
">清空缓存</a></li><?php }?>
			<?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['show']){?><li><a href="<?php echo smarty_function_write_url(array('open'=>'customSMS','action'=>'show'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('show'=>$_smarty_tpl->getVariable('get')->value['action'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>自定义群发手机短信</a></li><?php }?>
			</ul>
			<span class="clear"></span>
		</div>
		<?php if ($_smarty_tpl->getVariable('get')->value['action']=='error'){?>
			<div style="padding:5em 0; text-align:center">
			<?php if ($_smarty_tpl->getVariable('get')->value['code']==-1){?>
				短信发送未成功 , <a href="<?php echo smarty_function_write_url(array('open'=>'customSMS','action'=>'send','go'=>'goto'),$_smarty_tpl->smarty,$_smarty_tpl);?>
">点击重新发送</a>
			<?php }elseif($_smarty_tpl->getVariable('get')->value['code']==1){?>
				手机号码不正确 , <a href="<?php echo smarty_function_write_url(array('open'=>'customSMS'),$_smarty_tpl->smarty,$_smarty_tpl);?>
">请重新添加代理</a>
			<?php }?>
			</div>
		<?php }elseif($_smarty_tpl->getVariable('get')->value['action']=='successful'){?>
			<div style="padding:5em 0; text-align:center">
			<?php if (count($_smarty_tpl->getVariable('back')->value['customSMS'])){?>
				<b style="color:#06F"><?php echo $_smarty_tpl->getVariable('back')->value['customSMS_successful'];?>
</b> 部手机发送成功
				<b style="color:#F00"><?php echo count($_smarty_tpl->getVariable('back')->value['customSMS']);?>
</b> 部手机发送失败<br />
				<a href="<?php echo smarty_function_write_url(array('open'=>'customSMS','action'=>'send','go'=>'goto'),$_smarty_tpl->smarty,$_smarty_tpl);?>
">点击重新发送</a>
			<?php }else{ ?>
				<b style="color:#06F"><?php echo $_smarty_tpl->getVariable('back')->value['customSMS_successful'];?>
</b> 部手机 已经全部 发送成功
			<?php }?>
			</div>
		<?php }else{ ?>
		<div class="show">
				<table width="100%" border="0" cellspacing="1" cellpadding="0">
					<tr><th colspan="2">自定义 添加 手机号码</th></tr>
					<tr>
						<td width="45%" align="right" class="Need">手机号码</td>
						<td>
							<form action="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'add'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" method="post">
								<input type="text" name="phone" style="width:150px;height:22px;line-height:22px" onfocus="sprintf('%d' , this)" maxlength="11" />
								<input type="submit" class="add_or" value="   添  加   " />
							</form>
						</td>
					</tr>
				</table>
				<form action="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'send'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" method="post">
				<table width="100%" border="0" cellspacing="1" cellpadding="0" style="margin:1em 0 0 0">
					<tr align="center">
						<td>代理账号</td>
						<td>真实姓名</td>
						<td>昵称</td>
						<td>编号</td>
						<td>代理组</td>
						<td>公司</td>
						<th>手机号码</th>
						<td width="5%">删除</td>
					</tr>
					<?php  $_smarty_tpl->tpl_vars['pso'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['phone'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('back')->value['customSMS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['pso']->key => $_smarty_tpl->tpl_vars['pso']->value){
 $_smarty_tpl->tpl_vars['phone']->value = $_smarty_tpl->tpl_vars['pso']->key;
?>
					<tr>
						<?php if ($_smarty_tpl->getVariable('pso')->value==$_smarty_tpl->getVariable('proxy_list')->value[$_smarty_tpl->getVariable('phone')->value]['tel']){?>
						<td><?php echo $_smarty_tpl->getVariable('proxy_list')->value[$_smarty_tpl->getVariable('phone')->value]['account'];?>
</td>
						<td><?php echo $_smarty_tpl->getVariable('proxy_list')->value[$_smarty_tpl->getVariable('phone')->value]['name'];?>
</td>
						<td><?php echo $_smarty_tpl->getVariable('proxy_list')->value[$_smarty_tpl->getVariable('phone')->value]['nickname'];?>
</td>
						<td align="center"><?php echo $_smarty_tpl->getVariable('proxy_list')->value[$_smarty_tpl->getVariable('phone')->value]['number'];?>
</td>
						<td><?php echo $_smarty_tpl->getVariable('proxy_list')->value[$_smarty_tpl->getVariable('phone')->value]['group'];?>
</td>
						<td><?php echo $_smarty_tpl->getVariable('proxy_list')->value[$_smarty_tpl->getVariable('phone')->value]['company_name'];?>
</td>
						<th><?php echo $_smarty_tpl->getVariable('proxy_list')->value[$_smarty_tpl->getVariable('phone')->value]['tel'];?>
</th>
						<?php }else{ ?>
						<td colspan="6" align="center" style="background-color:#FFC">自定义 的 手机号码</td>
						<th><?php echo $_smarty_tpl->getVariable('pso')->value;?>
</th>
						<?php }?>
						<td align="center" class="action"><?php if ($_smarty_tpl->getVariable('BTP')->value['customSMS']['del']){?><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'del','phone'=>$_smarty_tpl->getVariable('pso')->value),$_smarty_tpl->smarty,$_smarty_tpl);?>
" class="act_1_5" title="删除"></a><?php }?></td>
					</tr>
					<?php }} ?>
					<?php if (count($_smarty_tpl->getVariable('back')->value['customSMS'])){?>
					
					<tr><td colspan="8" align="center" style="color:#F00; height:25px">注意:如果添加的代理没有手机号码,或者号码不正确将不会被发送短信</td></tr>
					<tr>
						<td colspan="3" align="right" class="Need">短信内容</td>
						<td colspan="5">
							<textarea name="message" style="width:95%; height:100px;" onkeyup="Calculation(this , 'show_info');"></textarea>
							<div id="show_info" style="margin:0.5em 0 0 0"></div>
						</td>
					</tr>
					<tr><td colspan="8" align="center"><input type="submit" class="add_or" value="  发送短信  " /></td></tr>
					<?php }?>
				</table>
				</form>
		</div>
		<?php }?>
	</div>
	<b class="clear"></b>
</div>
</body>
</html>