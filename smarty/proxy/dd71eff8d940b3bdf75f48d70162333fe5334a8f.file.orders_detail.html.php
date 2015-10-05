<?php /* Smarty version Smarty3-b8, created on 2014-08-22 20:20:33
         compiled from "D:\www\shehuahk\wholesale/Template/orders_detail.html" */ ?>
<?php /*%%SmartyHeaderCode:2813353f73591731049-42918398%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dd71eff8d940b3bdf75f48d70162333fe5334a8f' => 
    array (
      0 => 'D:\\www\\shehuahk\\wholesale/Template/orders_detail.html',
      1 => 1306307345,
    ),
  ),
  'nocache_hash' => '2813353f73591731049-42918398',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\www\shehuahk\smarty\plugins\modifier.date_format.php';
if (!is_callable('smarty_function_Goto_diploma')) include 'D:\www\shehuahk\smarty\plugins\function.Goto_diploma.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>奢华</title>
<link href="css/default.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="Js/string.js"></script>
<script type="text/javascript" src="Js/default.js"></script>
</head>

<body>
<div class="Pe">
	<div class="head">
		<img src="images/logo.jpg" />
		<?php $_template = new Smarty_Internal_Template("nav.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

	</div>
	<div class="gray me">
		<div class="let">
			<div>您好！欢迎进入在线库存中心</div>
			<?php $_template = new Smarty_Internal_Template("me_nav.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

		</div>
		
		<div class="Ys">
			<div class="foe">
				<table width="100%" border="0" cellspacing="1" cellpadding="0" class="log">
					<tr><th colspan="4" class="te">订单详情</th></tr>
					<tr>
						<th width="15%">订单编号</th>
						<td><?php echo $_smarty_tpl->getVariable('orders')->value['orders_id'];?>
</td>
						<th width="15%">订单状态</th>
						<td><?php echo $_smarty_tpl->getVariable('status')->value[$_smarty_tpl->getVariable('orders')->value['status']];?>
</td>
					</tr>
					<tr>
						<th>购买人</th>
						<td><?php echo $_smarty_tpl->getVariable('orders')->value['account'];?>
</td>
						<th>下单时间</th>
						<td><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('orders')->value['time'],"%Y-%m-%d %H:%M:%S");?>
</td>
					</tr>
					<tr>
						<th>业务</th>
						<td><?php echo $_smarty_tpl->getVariable('orders')->value['salesman_name'];?>
</td>
						<th>客服</th>
						<td><?php echo $_smarty_tpl->getVariable('orders')->value['service_name'];?>
</td>
					</tr>
					<tr>
						<th>定金</th>
						<td><?php if ($_smarty_tpl->getVariable('orders')->value['earnest']){?><?php echo $_smarty_tpl->getVariable('orders')->value['earnest'];?>
 元<?php }?></td>
						<th>总价</th>
						<td><?php if ($_smarty_tpl->getVariable('orders')->value['price']){?><?php echo $_smarty_tpl->getVariable('orders')->value['price'];?>
 元<?php }?></td>
					</tr>
					<tr>
						<th>订单收到的钱</th>
						<td><?php if ($_smarty_tpl->getVariable('orders')->value['gotten_money']){?><?php echo $_smarty_tpl->getVariable('orders')->value['gotten_money'];?>
 元<?php }?></td>
						<th>物流</th>
						<td><?php echo $_smarty_tpl->getVariable('orders')->value['outers'];?>
</td>
					</tr>
					<tr>
						<th>快递类型</th>
						<td><?php echo $_smarty_tpl->getVariable('orders')->value['express_type'];?>
</td>
						<th>快递单号</th>
						<td><?php echo $_smarty_tpl->getVariable('orders')->value['express_ID'];?>
</td>
					</tr>
					<tr>
						<th>备注</th>
						<td colspan="3"><?php echo $_smarty_tpl->getVariable('orders')->value['remark'];?>
</td>
					</tr>
					<tr>
						<td colspan="4">
							<table width="100%" border="0" cellspacing="1" cellpadding="0" class="cers">
								<tr>
									<th>产品编号</th>
									<th>形状</th>
									<th>重量</th>
									<th>颜色</th>
									<th>荧光</th>
									<th>证书</th>
									<th>数量</th>
									<th>实际售价</th>
									<th>到货情况</th>
									<th>详情</th>
								</tr>
								<?php  $_smarty_tpl->tpl_vars['pso'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('product')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['pso']->key => $_smarty_tpl->tpl_vars['pso']->value){
?>
								<tr align="center">
									<td><?php echo $_smarty_tpl->getVariable('pso')->value['info']['ProID'];?>
</td>
									<?php if ($_smarty_tpl->getVariable('pso')->value['status']=='C'){?>
									<td colspan="8" style="color:#F00">此产品已取消</td>
									<?php }else{ ?>
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
									<td><?php echo $_smarty_tpl->getVariable('pso')->value['amount'];?>
</td>
									<td><?php echo $_smarty_tpl->getVariable('pso')->value['price'];?>
</td>
									<td><?php if ($_smarty_tpl->getVariable('pso')->value['is_arrival']=='Y'){?>到货<?php }else{ ?>未到<?php }?></td>
									<?php }?>
									<td><a href="javascript:;" onclick="show_detail(this,'<?php echo $_smarty_tpl->getVariable('pso')->value['id'];?>
',10,false,'me','product_detail' , true)">查看</a></td>
								</tr>
								<?php }} else { ?>
								<tr><td colspan="10" class="else">当前订单没有产品</td></tr>
								<?php } ?>
							</table>
						</td>
					</tr>
					<tr>
						<td colspan="4">
							<table width="100%" border="0" cellspacing="1" cellpadding="0" class="cers">
							<tr><th colspan="3">订单日志</th></tr>
								<tr align="center">
									<td width="10%">操作人</td>
									<td width="15%">时间</td>
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
									<td style="text-align:left"><?php echo $_smarty_tpl->getVariable('pso')->value['info'];?>
</td>
								</tr>
								<?php }} ?>
							</table>
						</td>
					</tr>
				</table>
			</div>
		</div>
		<i class="clear"></i>
	</div>
	<?php $_template = new Smarty_Internal_Template("foot.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

</div>
</body>
</html>
