<?php /* Smarty version Smarty3-b8, created on 2012-05-07 09:49:25
         compiled from "D:\APMServ5.2.6\www\htdocs\shehuahk\backadmin/Template/orders_deploy.html" */ ?>
<?php /*%%SmartyHeaderCode:249464fa72a2511af71-14539800%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd0620877a4e9b60dd0d9094ba984b5f5d53acf59' => 
    array (
      0 => 'D:\\APMServ5.2.6\\www\\htdocs\\shehuahk\\backadmin/Template/orders_deploy.html',
      1 => 1277022851,
    ),
  ),
  'nocache_hash' => '249464fa72a2511af71-14539800',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_write_url')) include 'D:\APMServ5.2.6\www\htdocs\shehuahk\smarty\plugins\function.write_url.php';
if (!is_callable('smarty_function_brite_spot')) include 'D:\APMServ5.2.6\www\htdocs\shehuahk\smarty\plugins\function.brite_spot.php';
if (!is_callable('smarty_modifier_date_format')) include 'D:\APMServ5.2.6\www\htdocs\shehuahk\smarty\plugins\modifier.date_format.php';
if (!is_callable('smarty_function_checked')) include 'D:\APMServ5.2.6\www\htdocs\shehuahk\smarty\plugins\function.checked.php';
if (!is_callable('smarty_modifier_default')) include 'D:\APMServ5.2.6\www\htdocs\shehuahk\smarty\plugins\modifier.default.php';
?><div class="append">
	<form action="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'go'=>'append'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" method="post">
	<input name="status" type="hidden" value="<?php echo $_smarty_tpl->getVariable('orders')->value['status'];?>
" />
	<table width="100%" border="0" cellspacing="1" cellpadding="0">
		<tr><th colspan="4">更改到货情况</th></tr>
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
			<td align="right" class="Need">定金</td>
			<td><?php echo $_smarty_tpl->getVariable('orders')->value['earnest'];?>
 元</td>
		</tr>
		<tr>
			<td align="right">下单时间</td>
			<td><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('orders')->value['time'],"%Y-%m-%d %H:%M:%S");?>
</td>
			<td align="right" class="Need">已付定金</td>
			<td><?php echo $_smarty_tpl->getVariable('orders')->value['gotten_money'];?>
 元</td>
		</tr>
		<tr>
			<td align="right">外部备注</td>
			<td colspan="3"><?php echo $_smarty_tpl->getVariable('orders')->value['remark'];?>
</td>
		</tr>
		<tr><td colspan="4" align="center" style="color:#0C6">注意:当 到货情况 全部选中后,那么这张订单将自动变成 [<?php echo $_smarty_tpl->getVariable('status')->value['balance'];?>
] 状态</td></tr>
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
						<th>快递类型</th>
						<th>快递单号</th>
						<th>产品状态</th>
						<th>到货情况</th>
						<th width="5%">详情</th>
					</tr>
					<?php  $_smarty_tpl->tpl_vars['pso'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('product')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['pso']->key => $_smarty_tpl->tpl_vars['pso']->value){
?>
					<tr align="center">
						<td><?php echo $_smarty_tpl->getVariable('pso')->value['info']['ProID'];?>
<input name="ProID[<?php echo $_smarty_tpl->getVariable('pso')->value['id'];?>
]" type="hidden" value="<?php echo $_smarty_tpl->getVariable('pso')->value['info']['ProID'];?>
" /></td>
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
						<?php if ($_smarty_tpl->getVariable('pso')->value['status']=='Y'){?>
						<td>
							<label for="ems_<?php echo $_smarty_tpl->getVariable('pso')->value['id'];?>
" style="display:block"><input type="radio" name="express_type[<?php echo $_smarty_tpl->getVariable('pso')->value['id'];?>
]" value="EMS" id="ems_<?php echo $_smarty_tpl->getVariable('pso')->value['id'];?>
" <?php echo smarty_function_checked(array('val'=>$_smarty_tpl->getVariable('pso')->value['express_type'],'str'=>'EMS'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 /> EMS</label>
							<label for="shunfen_<?php echo $_smarty_tpl->getVariable('pso')->value['id'];?>
" style="display:block"><input type="radio" name="express_type[<?php echo $_smarty_tpl->getVariable('pso')->value['id'];?>
]" value="顺丰" id="shunfen_<?php echo $_smarty_tpl->getVariable('pso')->value['id'];?>
" <?php echo smarty_function_checked(array('val'=>$_smarty_tpl->getVariable('pso')->value['express_type'],'str'=>'顺丰'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 /> 顺丰</label>
						</td>
						<td><input name="express_ID[<?php echo $_smarty_tpl->getVariable('pso')->value['id'];?>
]" type="text" style="width:120px" value="<?php echo $_smarty_tpl->getVariable('pso')->value['express_ID'];?>
" /></td>
						<td>通过审核</td>
						<td>
							<input name="Y_is_arrival[<?php echo $_smarty_tpl->getVariable('pso')->value['id'];?>
]" type="hidden" value="<?php echo smarty_modifier_default($_smarty_tpl->getVariable('pso')->value['is_arrival'],'N');?>
" />
							<label for="de_<?php echo $_smarty_tpl->getVariable('pso')->value['id'];?>
"><input name="is_arrival[<?php echo $_smarty_tpl->getVariable('pso')->value['id'];?>
]" id="de_<?php echo $_smarty_tpl->getVariable('pso')->value['id'];?>
" <?php echo smarty_function_checked(array('val'=>$_smarty_tpl->getVariable('pso')->value['is_arrival'],'str'=>'Y'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 type="checkbox" value="Y" /> 到货</label>
						</td>
						<?php }else{ ?>
						<td></td>
						<td></td>
						<td>取消</td>
						<td></td>
						<?php }?>
						<td class="action"><a href="javascript:;" onclick="show_detail(this , '<?php echo $_smarty_tpl->getVariable('pso')->value['id'];?>
' , 13)" class="act_3_10" title="产品详情"></a></td>
					</tr>
					<?php }} ?>
				</table>
			</td>
		</tr>
		<tr><th colspan="4" align="center"><input type="submit" value=" 确 认 " /></th></tr>
	</table>
	</form>
</div>
