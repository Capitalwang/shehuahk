<?php /* Smarty version Smarty3-b8, created on 2011-05-25 17:11:30
         compiled from "D:\htdocs\yulog.net.shehua\backadmin/Template/product_view_price.html" */ ?>
<?php /*%%SmartyHeaderCode:178674ddcc7c2b300a3-28720961%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2aedf61418b0097aba467f41ee54b6d957fc0852' => 
    array (
      0 => 'D:\\htdocs\\yulog.net.shehua\\backadmin/Template/product_view_price.html',
      1 => 1277022856,
    ),
  ),
  'nocache_hash' => '178674ddcc7c2b300a3-28720961',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_string_format')) include 'D:\htdocs\yulog.net.shehua\smarty\plugins\modifier.string_format.php';
if (!is_callable('smarty_modifier_date_format')) include 'D:\htdocs\yulog.net.shehua\smarty\plugins\modifier.date_format.php';
?><table border="0" cellspacing="1" cellpadding="0" width="100%">
	<tr>
		<td width="40%" class="Need" align="right">国际报价</td>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['INTbid'];?>
 (元/ct) × <?php echo $_smarty_tpl->getVariable('show')->value['weight'];?>
 (ct) = <?php echo smarty_modifier_string_format(($_smarty_tpl->getVariable('show')->value['INTbid']*$_smarty_tpl->getVariable('show')->value['weight']),"%.2f");?>
 (元)</td>
	</tr>
	<tr>
		<td align="right" class="Need">进货价</td>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['infml'];?>
 (元)</td>
	</tr>
	<tr>
		<td align="right">退点</td>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['agio'];?>
 %</td>
	</tr>
	<tr>
		<td align="right">基准退点</td>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['baseAgio'];?>
 %</td>
	</tr>
	<?php if ($_smarty_tpl->getVariable('show')->value['is_promotion']=='Y'&&$_smarty_tpl->getVariable('show')->value['promotion_start']<=time()&&$_smarty_tpl->getVariable('show')->value['promotion_stop']>=time()){?>
	<tr>
		<td align="right" class="Need">促销价</td>
		<td><?php echo sprintf('%.2f',$_smarty_tpl->getVariable('show')->value['INTbid']*$_smarty_tpl->getVariable('show')->value['weight']*(100+$_smarty_tpl->getVariable('show')->value['agio']+$_smarty_tpl->getVariable('show')->value['baseAgio']+$_smarty_tpl->getVariable('show')->value['promotion_dot'])/100);?>
 (元)</td>
	</tr>
	<tr>
		<td align="right">促销开始日期</td>
		<td><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('show')->value['promotion_start'],"%Y-%m-%d %H:%M");?>
</td>
	</tr>
	<tr>
		<td align="right">促销结束日期</td>
		<td><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('show')->value['promotion_stop'],"%Y-%m-%d %H:%M");?>
</td>
	</tr>
	<?php }?>
	<?php  $_smarty_tpl->tpl_vars['ts'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('show')->value['proxy_group']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['ts']->key => $_smarty_tpl->tpl_vars['ts']->value){
?>
	<tr>
		<td align="right" class="Need"><?php echo $_smarty_tpl->getVariable('ts')->value['name'];?>
</td>
		<td>
			<?php echo smarty_modifier_string_format(($_smarty_tpl->getVariable('show')->value['INTbid']*$_smarty_tpl->getVariable('show')->value['weight']),"%.2f");?>
 (元) × 
			(100% + <?php echo $_smarty_tpl->getVariable('show')->value['agio'];?>
 % + <?php echo $_smarty_tpl->getVariable('show')->value['baseAgio'];?>
 % + <?php echo $_smarty_tpl->getVariable('ts')->value['rebate'];?>
 % ) = 
			<?php ob_start();?><?php echo $_smarty_tpl->getVariable('show')->value['agio'];?>
<?php $_tmp1=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->getVariable('show')->value['baseAgio'];?>
<?php $_tmp2=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->getVariable('ts')->value['rebate'];?>
<?php $_tmp3=ob_get_clean();?><?php echo smarty_modifier_string_format((($_smarty_tpl->getVariable('show')->value['INTbid']*$_smarty_tpl->getVariable('show')->value['weight'])*(100+$_tmp1+$_tmp2+$_tmp3)/100),"%.2f");?>
 (元)
			<div style="margin:0.5em 0 0 0; color:#09F">
			得利：
			<?php ob_start();?><?php echo $_smarty_tpl->getVariable('show')->value['agio'];?>
<?php $_tmp4=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->getVariable('show')->value['baseAgio'];?>
<?php $_tmp5=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->getVariable('ts')->value['rebate'];?>
<?php $_tmp6=ob_get_clean();?><?php echo smarty_modifier_string_format((($_smarty_tpl->getVariable('show')->value['INTbid']*$_smarty_tpl->getVariable('show')->value['weight'])*(100+$_tmp4+$_tmp5+$_tmp6)/100),"%.2f");?>
 (元) - 
			<?php echo $_smarty_tpl->getVariable('show')->value['infml'];?>
 (元) = 
			<?php ob_start();?><?php echo $_smarty_tpl->getVariable('show')->value['agio'];?>
<?php $_tmp7=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->getVariable('show')->value['baseAgio'];?>
<?php $_tmp8=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->getVariable('ts')->value['rebate'];?>
<?php $_tmp9=ob_get_clean();?><?php echo (($_smarty_tpl->getVariable('show')->value['INTbid']*$_smarty_tpl->getVariable('show')->value['weight'])*(100+$_tmp7+$_tmp8+$_tmp9)/100)-smarty_modifier_string_format($_smarty_tpl->getVariable('show')->value['infml'],"%.2f");?>
 (元)
			</div>
		</td>
	</tr>
	<?php }} ?>
</table>