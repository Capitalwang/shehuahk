<?php /* Smarty version Smarty3-b8, created on 2011-05-31 15:54:16
         compiled from "D:\web\vhosts\shehua.hk\backadmin/Template/orders_audit.html" */ ?>
<?php /*%%SmartyHeaderCode:29554de49ea8a9f8f3-43275657%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '36686fc398c33677454aa5a8b860e937318a5e33' => 
    array (
      0 => 'D:\\web\\vhosts\\shehua.hk\\backadmin/Template/orders_audit.html',
      1 => 1277022850,
    ),
  ),
  'nocache_hash' => '29554de49ea8a9f8f3-43275657',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_write_url')) include 'D:\web\vhosts\shehua.hk\smarty\plugins\function.write_url.php';
if (!is_callable('smarty_function_brite_spot')) include 'D:\web\vhosts\shehua.hk\smarty\plugins\function.brite_spot.php';
if (!is_callable('smarty_modifier_date_format')) include 'D:\web\vhosts\shehua.hk\smarty\plugins\modifier.date_format.php';
if (!is_callable('smarty_function_br_to_null')) include 'D:\web\vhosts\shehua.hk\smarty\plugins\function.br_to_null.php';
?><div class="append">
	<form action="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'go'=>'append'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" method="post">
	<table width="100%" border="0" cellspacing="1" cellpadding="0">
		<tr><th colspan="4">审核订单</th></tr>
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
<input name="proxy_id" type="hidden" value="<?php echo $_smarty_tpl->getVariable('orders')->value['proxy_id'];?>
" /></td>
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
			<td align="right">总价</td>
			<td><?php echo $_smarty_tpl->getVariable('orders')->value['price'];?>
 元</td>
			<td align="right">下单时间</td>
			<td><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('orders')->value['time'],"%Y-%m-%d %H:%M:%S");?>
</td>
		</tr>
		<tr>
			<td align="right">外部备注</td>
			<td colspan="3"><textarea name="remark" style="width:95%;height:120px"><?php echo smarty_function_br_to_null(array('str'=>$_smarty_tpl->getVariable('orders')->value['remark']),$_smarty_tpl->smarty,$_smarty_tpl);?>
</textarea></td>
		</tr>
		<tr><td colspan="4" align="center" style="color:#0C6">注意:如果 审核产品 时,全部都选择取消,那么这张订单将被取消</td></tr>
		<tr>
			<td colspan="4">
				<?php  $_smarty_tpl->tpl_vars['pso'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('product')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['pso']->key => $_smarty_tpl->tpl_vars['pso']->value){
?>
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
						<th>审核产品情况</th>
						<th width="5%">详情</th>
					</tr>
					<tr align="center">
						<td><?php echo $_smarty_tpl->getVariable('pso')->value['info']['ProID'];?>
<input name="ProID[<?php echo $_smarty_tpl->getVariable('pso')->value['info']['id'];?>
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
						<td>
							<input name="Yuan_price[<?php echo $_smarty_tpl->getVariable('pso')->value['info']['id'];?>
]" type="hidden" value="<?php echo $_smarty_tpl->getVariable('pso')->value['price'];?>
" />
							<input type="text" name="price[<?php echo $_smarty_tpl->getVariable('pso')->value['info']['id'];?>
]" value="<?php echo $_smarty_tpl->getVariable('pso')->value['price'];?>
" style="width:80px;text-align:center" onfocus="sprintf('%.2f' , this)" />
						</td>
						<td>
							<label for="Y_<?php echo $_smarty_tpl->getVariable('pso')->value['info']['id'];?>
"><input type="radio" name="status[<?php echo $_smarty_tpl->getVariable('pso')->value['info']['id'];?>
]" id="Y_<?php echo $_smarty_tpl->getVariable('pso')->value['info']['id'];?>
" value="Y" /> 通过审核</label>
							<label for="C_<?php echo $_smarty_tpl->getVariable('pso')->value['info']['id'];?>
"><input type="radio" name="status[<?php echo $_smarty_tpl->getVariable('pso')->value['info']['id'];?>
]" id="C_<?php echo $_smarty_tpl->getVariable('pso')->value['info']['id'];?>
" value="C" /> 取消</label>
						</td>
						<td class="action"><a href="javascript:;" onclick="show_detail(this , '<?php echo $_smarty_tpl->getVariable('pso')->value['id'];?>
' , 10)" class="act_3_10" title="产品详情"></a></td>
					</tr>
					<tr>
						<td align="right">内部备注</td>
						<td align="left" colspan="9"><textarea name="pro_remark[<?php echo $_smarty_tpl->getVariable('pso')->value['info']['id'];?>
]" style="width:95%;height:60px"><?php echo smarty_function_br_to_null(array('str'=>$_smarty_tpl->getVariable('pso')->value['remark']),$_smarty_tpl->smarty,$_smarty_tpl);?>
</textarea></td>
					</tr>
				</table>
					<?php }} ?>
			</td>
		</tr>
		<tr><th colspan="4" align="center"><input type="submit" value=" 确 认 通过审核 " /></th></tr>
	</table>
	</form>
</div>
