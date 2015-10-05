<?php /* Smarty version Smarty3-b8, created on 2011-05-31 12:27:12
         compiled from "D:\web\vhosts\shehua.hk\wholesale/Template/orders.html" */ ?>
<?php /*%%SmartyHeaderCode:90814de46e2035a2d4-54834382%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '398b4c08f4bdfd17ef49dc3b3281eff8ff485041' => 
    array (
      0 => 'D:\\web\\vhosts\\shehua.hk\\wholesale/Template/orders.html',
      1 => 1306305602,
    ),
  ),
  'nocache_hash' => '90814de46e2035a2d4-54834382',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\web\vhosts\shehua.hk\smarty\plugins\modifier.date_format.php';
if (!is_callable('smarty_function_write_url')) include 'D:\web\vhosts\shehua.hk\smarty\plugins\function.write_url.php';
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
				<table width="100%" border="0" cellspacing="1" cellpadding="0" id="tab_show" class="SP">
					<tr>
						<th height="35">订单号</th>
						<th>订单状态</th>
						<th>业务</th>
						<th>客服</th>
						<th>总价</th>
						<th>下单时间</th>
						<th>详情</th>
					</tr>
					<?php if ($_smarty_tpl->getVariable('list_text')->value){?>
					<?php  $_smarty_tpl->tpl_vars['pso'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('list_text')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['pso']->key => $_smarty_tpl->tpl_vars['pso']->value){
?>
					<tr align="center">
						<td><?php echo $_smarty_tpl->getVariable('pso')->value['orders_id'];?>
</td>
						<td><?php echo $_smarty_tpl->getVariable('status')->value[$_smarty_tpl->getVariable('pso')->value['status']];?>
</td>
						<td><?php echo $_smarty_tpl->getVariable('pso')->value['salesman_name'];?>
</td>
						<td><?php echo $_smarty_tpl->getVariable('pso')->value['service_name'];?>
</td>
						<td><?php echo $_smarty_tpl->getVariable('pso')->value['price'];?>
</td>
						<td><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('pso')->value['time'],"%Y-%m-%d %H:%M:%S");?>
</td>
						<td><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'orders_detail','orders_id'=>$_smarty_tpl->getVariable('pso')->value['orders_id']),$_smarty_tpl->smarty,$_smarty_tpl);?>
">查看</a></td>
					</tr>
					<?php }} ?>
					<?php }else{ ?>
					<tr class="NO_TAB_SHOW"><td align="center" colspan="7" style="padding:10em 0;color:#333">当前你没有订单</td></tr>
					<?php }?>
				</table>
				<?php if ($_smarty_tpl->getVariable('list_page')->value['Record']>0){?>
				<div class="Page">
					<span>
						当前第<?php echo $_smarty_tpl->getVariable('list_page')->value['NowPage'];?>
页 / 共<?php echo $_smarty_tpl->getVariable('list_page')->value['count'];?>
页
						<?php if ($_smarty_tpl->getVariable('list_page')->value['NowPage']>1){?><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'page'=>'1'),$_smarty_tpl->smarty,$_smarty_tpl);?>
">首页</a><?php }else{ ?>首页<?php }?>
						<?php if ($_smarty_tpl->getVariable('list_page')->value['NowPage']>1){?><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'page'=>$_smarty_tpl->getVariable('list_page')->value['up']),$_smarty_tpl->smarty,$_smarty_tpl);?>
">上一页</a><?php }else{ ?>上一页<?php }?>
						<?php if ($_smarty_tpl->getVariable('list_page')->value['NowPage']<$_smarty_tpl->getVariable('list_page')->value['count']){?><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'page'=>$_smarty_tpl->getVariable('list_page')->value['down']),$_smarty_tpl->smarty,$_smarty_tpl);?>
">下一页</a><?php }else{ ?>下一页<?php }?>
						<?php if ($_smarty_tpl->getVariable('list_page')->value['NowPage']<$_smarty_tpl->getVariable('list_page')->value['count']){?><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'page'=>$_smarty_tpl->getVariable('list_page')->value['count']),$_smarty_tpl->smarty,$_smarty_tpl);?>
">尾页</a><?php }else{ ?>尾页<?php }?>
						至<input type="text" value="<?php echo $_smarty_tpl->getVariable('list_page')->value['NowPage'];?>
" onkeydown="go_page(event , this , '<?php echo $_smarty_tpl->getVariable('thisurl')->value;?>
' , <?php echo $_smarty_tpl->getVariable('list_page')->value['count'];?>
)" />页
					</span>
				</div>
				<?php }?>
			</div>
		</div>
		<i class="clear"></i>
	</div>
	<?php $_template = new Smarty_Internal_Template("foot.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

</div>
</body>
</html>
