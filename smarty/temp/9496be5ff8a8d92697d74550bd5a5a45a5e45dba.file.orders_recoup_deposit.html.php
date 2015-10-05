<?php /* Smarty version Smarty3-b8, created on 2012-05-23 15:50:48
         compiled from "D:\APMServ5.2.6\www\htdocs\shehuahk\backadmin/Template/orders_recoup_deposit.html" */ ?>
<?php /*%%SmartyHeaderCode:272574fbc96d83a3c44-75628993%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9496be5ff8a8d92697d74550bd5a5a45a5e45dba' => 
    array (
      0 => 'D:\\APMServ5.2.6\\www\\htdocs\\shehuahk\\backadmin/Template/orders_recoup_deposit.html',
      1 => 1277022853,
    ),
  ),
  'nocache_hash' => '272574fbc96d83a3c44-75628993',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_write_url')) include 'D:\APMServ5.2.6\www\htdocs\shehuahk\smarty\plugins\function.write_url.php';
if (!is_callable('smarty_function_brite_spot')) include 'D:\APMServ5.2.6\www\htdocs\shehuahk\smarty\plugins\function.brite_spot.php';
if (!is_callable('smarty_modifier_date_format')) include 'D:\APMServ5.2.6\www\htdocs\shehuahk\smarty\plugins\modifier.date_format.php';
?><div class="append">
	<form action="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'go'=>'append'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" method="post">
	<table width="100%" border="0" cellspacing="1" cellpadding="0">
		<tr><th colspan="4">扣除定金</th></tr>
		<tr>
			<td width="15%" align="right">订单编号</td>
			<td><?php echo smarty_function_brite_spot(array('query'=>$_smarty_tpl->getVariable('get')->value['info'],'str'=>$_smarty_tpl->getVariable('orders')->value['orders_id']),$_smarty_tpl->smarty,$_smarty_tpl);?>
</td>
			<td width="15%" align="right">订单状态</td>
			<td><?php echo $_smarty_tpl->getVariable('status')->value[$_smarty_tpl->getVariable('orders')->value['status']];?>
</td>
		</tr>
		<tr>
			<td align="right" class="Need">购买人</td>
			<td><?php echo smarty_function_brite_spot(array('query'=>$_smarty_tpl->getVariable('get')->value['info'],'str'=>$_smarty_tpl->getVariable('orders')->value['account']),$_smarty_tpl->smarty,$_smarty_tpl);?>
<input name="proxy_id" type="hidden" value="<?php echo $_smarty_tpl->getVariable('orders')->value['proxy_id'];?>
" /></td>
			<td align="right">组退点</td>
			<td><?php echo $_smarty_tpl->getVariable('orders')->value['rebate'];?>
 %</td>
		</tr>
		<tr>
			<td align="right">业务</td>
			<td><?php echo smarty_function_brite_spot(array('query'=>$_smarty_tpl->getVariable('get')->value['info'],'str'=>$_smarty_tpl->getVariable('orders')->value['salesman_name']),$_smarty_tpl->smarty,$_smarty_tpl);?>
</td>
			<td align="right">客服</td>
			<td><?php echo smarty_function_brite_spot(array('query'=>$_smarty_tpl->getVariable('get')->value['info'],'str'=>$_smarty_tpl->getVariable('orders')->value['service_name']),$_smarty_tpl->smarty,$_smarty_tpl);?>
</td>
		</tr>
		<tr>
			<td align="right" class="Need">总价</td>
			<td><?php echo $_smarty_tpl->getVariable('orders')->value['price'];?>
 元</td>
			<td align="right">下单时间</td>
			<td><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('orders')->value['time'],"%Y-%m-%d %H:%M:%S");?>
</td>
		</tr>
		<tr>
			<td align="right">外部备注</td>
			<td colspan="3"><?php echo $_smarty_tpl->getVariable('orders')->value['remark'];?>
</td>
		</tr>
		<tr>
			<td align="right" class="Need">定金</td>
			<td><?php echo $_smarty_tpl->getVariable('orders')->value['earnest'];?>
 元</td>
			<td align="right" class="Need">购买人金额</td>
			<td><?php echo $_smarty_tpl->getVariable('proxy')->value['money'];?>
 元</td>
		</tr>
		<tr>
			<th colspan="4" align="center">
			<?php if ($_smarty_tpl->getVariable('proxy')->value['money']>=$_smarty_tpl->getVariable('orders')->value['earnest']){?>
				<input type="submit" value=" 确 认 扣除定金 " />
			<?php }else{ ?>
				<b style="color:#F00">购买人金额 不足支付 订单的定金</b>
			<?php }?>
			</th>
		</tr>
		<tr>
			<td colspan="4">
				<table width="100%" border="0" cellspacing="1" cellpadding="0" id="tab_show" style="margin:0.5em 0 0 0">
					<tr>
						<th>产品编号</th>
						<th>形状</th>
						<th>重量</th>
						<th>颜色</th>
						<th>净度</th>
						<th>进货价</th>
						<th>数量</th>
						<th>实际售价</th>
						<th>产品状态</th>
						<th width="5%">详情</th>
					</tr>
					<?php  $_smarty_tpl->tpl_vars['pso'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('product')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['pso']->key => $_smarty_tpl->tpl_vars['pso']->value){
?>
					<tr align="center">
						<td><?php echo $_smarty_tpl->getVariable('pso')->value['info']['ProID'];?>
</td>
						<td><?php echo $_smarty_tpl->getVariable('shape')->value[$_smarty_tpl->getVariable('pso')->value['info']['shape']];?>
</td>
						<td><?php echo $_smarty_tpl->getVariable('pso')->value['info']['weight'];?>
</td>
						<td><?php echo $_smarty_tpl->getVariable('pso')->value['info']['color'];?>
</td>
						<td><?php echo $_smarty_tpl->getVariable('pso')->value['info']['clarity'];?>
</td>
						<td><?php echo $_smarty_tpl->getVariable('pso')->value['info']['infml'];?>
</td>
						<td><?php echo $_smarty_tpl->getVariable('pso')->value['amount'];?>
</td>
						<td><?php echo $_smarty_tpl->getVariable('pso')->value['price'];?>
</td>
						<td><?php if ($_smarty_tpl->getVariable('pso')->value['status']=='Y'){?>通过审核<?php }else{ ?>取消<?php }?></td>
						<td class="action"><a href="javascript:;" onclick="show_detail(this , '<?php echo $_smarty_tpl->getVariable('pso')->value['id'];?>
' , 10)" class="act_3_10" title="产品详情"></a></td>
					</tr>
					<?php }} ?>
				</table>
			</td>
		</tr>
	</table>
	</form>
</div>
