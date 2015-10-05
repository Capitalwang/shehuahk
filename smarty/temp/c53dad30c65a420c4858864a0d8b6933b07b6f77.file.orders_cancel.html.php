<?php /* Smarty version Smarty3-b8, created on 2011-06-20 11:05:55
         compiled from "D:\web\vhosts\shehua.hk\backadmin/Template/orders_cancel.html" */ ?>
<?php /*%%SmartyHeaderCode:287134dfeb91332b229-91926913%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c53dad30c65a420c4858864a0d8b6933b07b6f77' => 
    array (
      0 => 'D:\\web\\vhosts\\shehua.hk\\backadmin/Template/orders_cancel.html',
      1 => 1277022850,
    ),
  ),
  'nocache_hash' => '287134dfeb91332b229-91926913',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_cat')) include 'D:\web\vhosts\shehua.hk\smarty\plugins\modifier.cat.php';
if (!is_callable('smarty_function_write_url')) include 'D:\web\vhosts\shehua.hk\smarty\plugins\function.write_url.php';
?><div style="text-align:center;padding:2em 0">
<?php if ($_smarty_tpl->getVariable('show')->value){?>
	<?php if ($_smarty_tpl->getVariable('show')->value['status']=='returned'){?>
		订单已取消
	<?php }else{ ?>
		<?php if ($_smarty_tpl->getVariable('show')->value['gotten_money']>0){?>
			<table width="60%" border="0" cellspacing="1" cellpadding="0" align="center" id="tab_<?php echo $_smarty_tpl->getVariable('show')->value['orders_id'];?>
">
				<tr><th colspan="2">取消订单</th></tr>
				<tr>
					<td width="45%" align="right">订单编号</td>
					<td align="left"><?php echo $_smarty_tpl->getVariable('show')->value['orders_id'];?>
</td>
				</tr>
				<tr>
					<td align="right">总售价</td>
					<td align="left"><?php echo smarty_modifier_cat($_smarty_tpl->getVariable('show')->value['price'],' 元');?>
</td>
				</tr>
				<tr>
					<td align="right">定金</td>
					<td align="left"><?php echo smarty_modifier_cat($_smarty_tpl->getVariable('show')->value['earnest'],' 元');?>
</td>
				</tr>
				<tr>
					<td align="right">已收金额</td>
					<td align="left"><?php echo smarty_modifier_cat($_smarty_tpl->getVariable('show')->value['gotten_money'],' 元');?>
</td>
				</tr>
				<tr>
					<td align="right">扣款</td>
					<td align="left"><input type="text" id="check_<?php echo $_smarty_tpl->getVariable('show')->value['orders_id'];?>
" value="<?php echo $_smarty_tpl->getVariable('show')->value['earnest'];?>
" style="width:80px;text-align:center" onfocus="sprintf('%.2f' , this , false , 0 , <?php echo $_smarty_tpl->getVariable('show')->value['gotten_money'];?>
);" /> 元</td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input type="button" value=" 确 认 取 消 " style="height:25px; border:1px solid #CCC;cursor:pointer;padding:0.4em;background-color:#F0F0F0" onClick="cancel_koukuang('<?php echo $_smarty_tpl->getVariable('show')->value['orders_id'];?>
' , 'tab_' , 'check_')" /></td>
				</tr>
			</table>
		<?php }else{ ?>
			<a href="javascript:;" onClick="cancel(this,'<?php echo $_smarty_tpl->getVariable('get')->value['orders_id'];?>
',10,'<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'cancel','go'=>'validation','orders_id'=>$_smarty_tpl->getVariable('show')->value['orders_id']),$_smarty_tpl->smarty,$_smarty_tpl);?>
')">确认取消订单</a>
		<?php }?>
	<?php }?>
<?php }else{ ?>
	订单不存在 ...
<?php }?>
</div>