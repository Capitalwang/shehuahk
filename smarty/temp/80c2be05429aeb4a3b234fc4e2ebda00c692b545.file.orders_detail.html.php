<?php /* Smarty version Smarty3-b8, created on 2012-05-06 15:26:24
         compiled from "D:\APMServ5.2.6\www\htdocs\shehuahk\backadmin/Template/orders_detail.html" */ ?>
<?php /*%%SmartyHeaderCode:317504fa627a0c4e3d5-42935058%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '80c2be05429aeb4a3b234fc4e2ebda00c692b545' => 
    array (
      0 => 'D:\\APMServ5.2.6\\www\\htdocs\\shehuahk\\backadmin/Template/orders_detail.html',
      1 => 1277022852,
    ),
  ),
  'nocache_hash' => '317504fa627a0c4e3d5-42935058',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_brite_spot')) include 'D:\APMServ5.2.6\www\htdocs\shehuahk\smarty\plugins\function.brite_spot.php';
if (!is_callable('smarty_modifier_date_format')) include 'D:\APMServ5.2.6\www\htdocs\shehuahk\smarty\plugins\modifier.date_format.php';
if (!is_callable('smarty_function_Goto_diploma')) include 'D:\APMServ5.2.6\www\htdocs\shehuahk\smarty\plugins\function.Goto_diploma.php';
if (!is_callable('smarty_function_write_url')) include 'D:\APMServ5.2.6\www\htdocs\shehuahk\smarty\plugins\function.write_url.php';
?><div class="append">
	<table width="100%" border="0" cellspacing="1" cellpadding="0">
		<tr><th colspan="4">订单详情</th></tr>
		<tr>
			<td width="15%" align="right">订单编号</td>
			<td><?php echo smarty_function_brite_spot(array('query'=>$_smarty_tpl->getVariable('get')->value['info'],'str'=>$_smarty_tpl->getVariable('orders')->value['orders_id']),$_smarty_tpl->smarty,$_smarty_tpl);?>
</td>
			<td width="15%" align="right">订单状态</td>
			<td><?php echo $_smarty_tpl->getVariable('status')->value[$_smarty_tpl->getVariable('orders')->value['status']];?>
</td>
		</tr>
		<tr>
			<td align="right">购买人</td>
			<td><?php echo smarty_function_brite_spot(array('query'=>$_smarty_tpl->getVariable('get')->value['info'],'str'=>$_smarty_tpl->getVariable('orders')->value['account']),$_smarty_tpl->smarty,$_smarty_tpl);?>
</td>
			<td align="right" class="Need">组退点</td>
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
			<td align="right">定金</td>
			<td><?php if ($_smarty_tpl->getVariable('orders')->value['earnest']){?><?php echo $_smarty_tpl->getVariable('orders')->value['earnest'];?>
 元<?php }?></td>
			<td align="right">总价</td>
			<td><?php if ($_smarty_tpl->getVariable('orders')->value['price']){?><?php echo $_smarty_tpl->getVariable('orders')->value['price'];?>
 元<?php }?></td>
		</tr>
		<tr>
			<td align="right">订单收到的钱</td>
			<td><?php if ($_smarty_tpl->getVariable('orders')->value['gotten_money']){?><?php echo $_smarty_tpl->getVariable('orders')->value['gotten_money'];?>
 元<?php }?></td>
			<td align="right">下单时间</td>
			<td><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('orders')->value['time'],"%Y-%m-%d %H:%M:%S");?>
</td>
		</tr>
		<tr>
			<td align="right">外部物流</td>
			<td><?php echo $_smarty_tpl->getVariable('orders')->value['outers'];?>
</td>
			<td align="right">内部物流</td>
			<td><?php echo $_smarty_tpl->getVariable('orders')->value['inners'];?>
</td>
		</tr>
		<tr>
			<td align="right">快递类型</td>
			<td><?php echo $_smarty_tpl->getVariable('orders')->value['express_type'];?>
</td>
			<td align="right">快递单号</td>
			<td><?php echo $_smarty_tpl->getVariable('orders')->value['express_ID'];?>
</td>
		</tr>
		<tr>
			<td align="right">备注</td>
			<td colspan="3"><?php echo $_smarty_tpl->getVariable('orders')->value['remark'];?>
</td>
		</tr>
		<tr>
			<td colspan="4">
				<table width="100%" border="0" cellspacing="1" cellpadding="0" id="tab_show">
					<tr>
						<th>产品编号</th>
						<th>形状</th>
						<th>重量</th>
						<th>颜色</th>
						<th>荧光</th>
						<th>证书</th>
						<th>进货价</th>
						<th>数量</th>
						<th>实际售价</th>
						<th>到货情况</th>
						<th>快递类型</th>
						<th>快递单号</th>
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
						<td><?php echo $_smarty_tpl->getVariable('pso')->value['info']['Fent_Isity'];?>
</td>
						<td><?php echo smarty_function_Goto_diploma(array('diploma'=>$_smarty_tpl->getVariable('pso')->value['info']['diploma'],'weight'=>$_smarty_tpl->getVariable('pso')->value['info']['weight'],'NO'=>$_smarty_tpl->getVariable('pso')->value['info']['diplomaNO'],'show'=>$_smarty_tpl->getVariable('pso')->value['info']['diploma']),$_smarty_tpl->smarty,$_smarty_tpl);?>
</td>
						<td><?php echo $_smarty_tpl->getVariable('pso')->value['info']['infml'];?>
</td>
						<td><?php echo $_smarty_tpl->getVariable('pso')->value['amount'];?>
</td>
						<td><?php echo $_smarty_tpl->getVariable('pso')->value['price'];?>
</td>
						<td><?php if ($_smarty_tpl->getVariable('pso')->value['is_arrival']=='Y'){?>到货<?php }else{ ?>未到<?php }?></td>
						<td><?php echo $_smarty_tpl->getVariable('pso')->value['express_type'];?>
</td>
						<td><?php echo $_smarty_tpl->getVariable('pso')->value['express_ID'];?>
</td>
						<td class="action"><a href="javascript:;" onclick="show_detail(this , '<?php echo $_smarty_tpl->getVariable('pso')->value['id'];?>
' , 13)" class="act_3_10" title="产品详情"></a></td>
					</tr>
					<?php }} else { ?>
					<tr><td colspan="13" class="else">当前订单没有产品</td></tr>
					<?php } ?>
				</table>
			</td>
		</tr>
		<tr>
			<th colspan="4" align="center">
				<?php if ($_smarty_tpl->getVariable('orders')->value['status']=='null'){?>
					<?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['audit']){?><input type="button" value="审核订单" onclick="window.location='<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'audit','orders_id'=>$_smarty_tpl->getVariable('orders')->value['orders_id']),$_smarty_tpl->smarty,$_smarty_tpl);?>
'" /><?php }?>
				<?php }elseif(($_smarty_tpl->getVariable('orders')->value['status']=='audit'||$_smarty_tpl->getVariable('orders')->value['status']=='earnest')){?>
					<input type="button" value="更改订单" onclick="window.location='<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'edit_orders','orders_id'=>$_smarty_tpl->getVariable('orders')->value['orders_id']),$_smarty_tpl->smarty,$_smarty_tpl);?>
'" />
					<input type="button" value="计算定金" onclick="window.location='<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'count_deposit','orders_id'=>$_smarty_tpl->getVariable('orders')->value['orders_id']),$_smarty_tpl->smarty,$_smarty_tpl);?>
'" />
					<?php if ($_smarty_tpl->getVariable('orders')->value['status']=='earnest'){?><input type="button" value="扣除定金" onclick="window.location='<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'recoup_deposit','orders_id'=>$_smarty_tpl->getVariable('orders')->value['orders_id']),$_smarty_tpl->smarty,$_smarty_tpl);?>
'" /><?php }?>
				<?php }elseif($_smarty_tpl->getVariable('orders')->value['status']=='deploy'){?>
					<input type="button" value="更改到货情况" onclick="window.location='<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'deploy','orders_id'=>$_smarty_tpl->getVariable('orders')->value['orders_id']),$_smarty_tpl->smarty,$_smarty_tpl);?>
'" />
					<input type="button" value="更改物流状态" onclick="window.location='<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'dispatch','orders_id'=>$_smarty_tpl->getVariable('orders')->value['orders_id']),$_smarty_tpl->smarty,$_smarty_tpl);?>
'" />
				<?php }elseif($_smarty_tpl->getVariable('orders')->value['status']=='balance'){?>
					<input type="button" value="更改到货情况" onclick="window.location='<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'deploy','orders_id'=>$_smarty_tpl->getVariable('orders')->value['orders_id']),$_smarty_tpl->smarty,$_smarty_tpl);?>
'" />
					<input type="button" value="扣除余款" onclick="window.location='<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'balance','orders_id'=>$_smarty_tpl->getVariable('orders')->value['orders_id']),$_smarty_tpl->smarty,$_smarty_tpl);?>
'" />
					<input type="button" value="更改物流状态" onclick="window.location='<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'dispatch','orders_id'=>$_smarty_tpl->getVariable('orders')->value['orders_id']),$_smarty_tpl->smarty,$_smarty_tpl);?>
'" />
				<?php }elseif($_smarty_tpl->getVariable('orders')->value['status']=='dispatch'){?>
					<input type="button" value="更改物流状态" onclick="window.location='<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'dispatch','orders_id'=>$_smarty_tpl->getVariable('orders')->value['orders_id']),$_smarty_tpl->smarty,$_smarty_tpl);?>
'" />
					<input type="button" value="收到货物" onclick="receiving(this , '<?php echo $_smarty_tpl->getVariable('orders')->value['orders_id'];?>
' , 4)" />
				<?php }elseif($_smarty_tpl->getVariable('orders')->value['status']=='receiving'){?>
					<b style="color:#093">已完成的订单</b>
				<?php }elseif($_smarty_tpl->getVariable('orders')->value['status']=='returned'){?>
					<span style="color:#999">取消的订单</span>
				<?php }?>
				<?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['cancel']&&$_smarty_tpl->getVariable('orders')->value['status']!='returned'&&$_smarty_tpl->getVariable('orders')->value['status']!='receiving'){?><input type="button" value="取消订单" onclick="cancel(this , '<?php echo $_smarty_tpl->getVariable('orders')->value['orders_id'];?>
' , 4)" /><?php }?>
			</th>
		</tr>
		<tr>
			<td colspan="4">
				<table width="100%" border="0" cellspacing="1" cellpadding="0">
				<tr><th colspan="3">订单日志</th></tr>
					<tr align="center">
						<td>操作人</td>
						<td>时间</td>
						<td>操作</td>
					</tr>
					<?php  $_smarty_tpl->tpl_vars['pso'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('log')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['pso']->key => $_smarty_tpl->tpl_vars['pso']->value){
?>
					<tr align="center">
						<td><?php echo $_smarty_tpl->getVariable('pso')->value['update_name'];?>
</td>
						<td><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('pso')->value['time'],"%Y-%m-%d %H:%M:%S");?>
</td>
						<td align="left"><?php echo $_smarty_tpl->getVariable('pso')->value['info'];?>
</td>
					</tr>
					<?php }} ?>
				</table>
			</td>
		</tr>
	</table>
</div>
