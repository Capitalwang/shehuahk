<?php /* Smarty version Smarty3-b8, created on 2011-06-20 11:06:01
         compiled from "D:\web\vhosts\shehua.hk\backadmin/Template/orders_sms.html" */ ?>
<?php /*%%SmartyHeaderCode:285904dfeb919032e59-91926066%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd28bf257fd1c8c099c621869a0ed30627ae7299e' => 
    array (
      0 => 'D:\\web\\vhosts\\shehua.hk\\backadmin/Template/orders_sms.html',
      1 => 1277375690,
    ),
  ),
  'nocache_hash' => '285904dfeb919032e59-91926066',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div style="text-align:center;padding:2em 0" id="sms_<?php echo $_smarty_tpl->getVariable('get')->value['orders'];?>
">
<?php if ($_smarty_tpl->getVariable('proxy')->value){?>
	<?php if ($_smarty_tpl->getVariable('proxy')->value['tel']){?>
	<table width="70%" border="0" cellspacing="1" cellpadding="0" align="center">
		<tr><th colspan="2">发送关于订单的手机短信</th></tr>
		<tr>
			<td width="30%" align="right">代理</td>
			<td align="left"><?php echo $_smarty_tpl->getVariable('proxy')->value['name'];?>
</td>
		</tr>
		<tr>
			<td align="right">编号</td>
			<td align="left"><?php echo $_smarty_tpl->getVariable('proxy')->value['number'];?>
</td>
		</tr>
		<tr>
			<td align="right">手机号码</td>
			<td align="left"><?php echo $_smarty_tpl->getVariable('proxy')->value['tel'];?>
</td>
		</tr>
		<tr>
			<td align="right">公司</td>
			<td align="left"><?php echo $_smarty_tpl->getVariable('proxy')->value['company_name'];?>
</td>
		</tr>
		<tr>
			<td align="right">短信内容</td>
			<td align="left">
				<textarea id="message_<?php echo $_smarty_tpl->getVariable('get')->value['orders'];?>
" style="width:95%;height:100px" onkeyup="Calculation(this , 'show_<?php echo $_smarty_tpl->getVariable('get')->value['orders'];?>
');"></textarea>
				<div id="show_<?php echo $_smarty_tpl->getVariable('get')->value['orders'];?>
" style="margin:0.5em 0 0 0"></div>
			</td>
		</tr>
		<tr align="center">
			<td colspan="2"><input type="button" value=" 发 送 短 信 " class="send" onClick="sms_send('<?php echo $_smarty_tpl->getVariable('get')->value['orders'];?>
','<?php echo $_smarty_tpl->getVariable('proxy')->value['name'];?>
','<?php echo $_smarty_tpl->getVariable('proxy')->value['tel'];?>
')" /></td>
		</tr>
	</table>
	<?php }else{ ?>
	该代理没有填写手机号码,或者手机错误
	<?php }?>
<?php }else{ ?>
	不存在的代理
<?php }?>
</div>