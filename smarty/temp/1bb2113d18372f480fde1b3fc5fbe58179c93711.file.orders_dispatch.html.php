<?php /* Smarty version Smarty3-b8, created on 2012-05-07 10:05:09
         compiled from "D:\APMServ5.2.6\www\htdocs\shehuahk\backadmin/Template/orders_dispatch.html" */ ?>
<?php /*%%SmartyHeaderCode:250524fa72dd56614a6-17259729%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1bb2113d18372f480fde1b3fc5fbe58179c93711' => 
    array (
      0 => 'D:\\APMServ5.2.6\\www\\htdocs\\shehuahk\\backadmin/Template/orders_dispatch.html',
      1 => 1277022852,
    ),
  ),
  'nocache_hash' => '250524fa72dd56614a6-17259729',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_write_url')) include 'D:\APMServ5.2.6\www\htdocs\shehuahk\smarty\plugins\function.write_url.php';
if (!is_callable('smarty_function_brite_spot')) include 'D:\APMServ5.2.6\www\htdocs\shehuahk\smarty\plugins\function.brite_spot.php';
if (!is_callable('smarty_modifier_date_format')) include 'D:\APMServ5.2.6\www\htdocs\shehuahk\smarty\plugins\modifier.date_format.php';
if (!is_callable('smarty_function_selected')) include 'D:\APMServ5.2.6\www\htdocs\shehuahk\smarty\plugins\function.selected.php';
if (!is_callable('smarty_function_checked')) include 'D:\APMServ5.2.6\www\htdocs\shehuahk\smarty\plugins\function.checked.php';
?><div class="append">
	<form action="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'go'=>'append'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" method="post">
	<table width="100%" border="0" cellspacing="1" cellpadding="0">
		<tr><th colspan="4">更改物流状态</th></tr>
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
			<td align="right" class="Need">外部物流状态</td>
			<td>
				<input name="Y_logistics_outer_id" type="hidden" value="<?php echo $_smarty_tpl->getVariable('orders')->value['logistics_outer_id'];?>
" />
				<select name="logistics_outer_id">
					<option value="0">请选择外部物流状态</option>
				<?php  $_smarty_tpl->tpl_vars['pso'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('logistics')->value['outer']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['pso']->key => $_smarty_tpl->tpl_vars['pso']->value){
?>
					<option value="<?php echo $_smarty_tpl->getVariable('pso')->value['id'];?>
" <?php echo smarty_function_selected(array('val'=>$_smarty_tpl->getVariable('pso')->value['id'],'str'=>$_smarty_tpl->getVariable('orders')->value['logistics_outer_id']),$_smarty_tpl->smarty,$_smarty_tpl);?>
><?php echo $_smarty_tpl->getVariable('pso')->value['name'];?>
</option>
				<?php }} ?>
				</select>
			</td>
			<td align="right" class="Need">内部物流状态</td>
			<td>
				<input name="Y_logistics_inner_id" type="hidden" value="<?php echo $_smarty_tpl->getVariable('orders')->value['logistics_inner_id'];?>
" />
				<select name="logistics_inner_id">
					<option value="0">请选择内部物流状态</option>
				<?php  $_smarty_tpl->tpl_vars['pso'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('logistics')->value['inner']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['pso']->key => $_smarty_tpl->tpl_vars['pso']->value){
?>
					<option value="<?php echo $_smarty_tpl->getVariable('pso')->value['id'];?>
" <?php echo smarty_function_selected(array('val'=>$_smarty_tpl->getVariable('pso')->value['id'],'str'=>$_smarty_tpl->getVariable('orders')->value['logistics_inner_id']),$_smarty_tpl->smarty,$_smarty_tpl);?>
><?php echo $_smarty_tpl->getVariable('pso')->value['name'];?>
</option>
				<?php }} ?>
				</select>
			</td>
		</tr>
		<tr>
			<td align="right" class="Need">快递类型</td>
			<td>
				<label for="ems"><input type="radio" name="express_type" value="EMS" id="ems" <?php echo smarty_function_checked(array('val'=>$_smarty_tpl->getVariable('orders')->value['express_type'],'str'=>'EMS'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 /> EMS</label>
				<label for="shunfeng"><input type="radio" name="express_type" value="顺丰" id="shunfeng" <?php echo smarty_function_checked(array('val'=>$_smarty_tpl->getVariable('orders')->value['express_type'],'str'=>'顺丰'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 /> 顺丰</label>
			</td>
			<td align="right" class="Need">快递单号</td>
			<td><input name="express_ID" type="text" style="width:120px" value="<?php echo $_smarty_tpl->getVariable('orders')->value['express_ID'];?>
" /></td>
		</tr>
		<tr><th colspan="4" align="center"><input type="submit" value=" 确 认 " /></th></tr>
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
