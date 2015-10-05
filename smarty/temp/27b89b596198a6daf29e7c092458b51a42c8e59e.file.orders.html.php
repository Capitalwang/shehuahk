<?php /* Smarty version Smarty3-b8, created on 2011-05-26 12:22:30
         compiled from "D:\htdocs\yulog.net.shehua\backadmin/Template/orders.html" */ ?>
<?php /*%%SmartyHeaderCode:173604dddd5865646a3-63018837%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '27b89b596198a6daf29e7c092458b51a42c8e59e' => 
    array (
      0 => 'D:\\htdocs\\yulog.net.shehua\\backadmin/Template/orders.html',
      1 => 1305853533,
    ),
  ),
  'nocache_hash' => '173604dddd5865646a3-63018837',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_write_url')) include 'D:\htdocs\yulog.net.shehua\smarty\plugins\function.write_url.php';
if (!is_callable('smarty_function_selected')) include 'D:\htdocs\yulog.net.shehua\smarty\plugins\function.selected.php';
if (!is_callable('smarty_modifier_default')) include 'D:\htdocs\yulog.net.shehua\smarty\plugins\modifier.default.php';
if (!is_callable('smarty_function_CLASS_COLOR')) include 'D:\htdocs\yulog.net.shehua\smarty\plugins\function.CLASS_COLOR.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo @Site_Name;?>
</title>
<link href="css/public.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="Js/string.js"></script>
<script type="text/javascript" src="Js/menu.js"></script>
<script type="text/javascript" src="Js/orders.js"></script>
<script type="text/javascript" src="Js/exec.js"></script>
</head>

<body>
<?php if ($_smarty_tpl->getVariable('get')->value['action']=='show'){?>
<div id="print">
	<table width="100%" border="0" cellspacing="1" cellpadding="0">
		<tr>
			<th width="120"><img src="images/logo.jpg" width="120" height="83" /></th>
			<th colspan="3"><h1>广利网 出货单</h1></th>
		</tr>
	</table>
	<table width="100%" class="Ord" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td align="right">单位名称</td>
			<td colspan="3"></td>
		</tr>
		<tr>
			<td align="right">联系人</td>
			<td></td>
			<td align="right">下单时间</td>
			<td></td>
		</tr>
		<tr>
			<td align="right">订单编号</td>
			<td></td>
			<td align="right">打印时间</td>
			<td></td>
		</tr>
	</table>
	<table width="100%" class="Products" border="0" cellspacing="0" cellpadding="0">
		<thead>
			<tr>
				<th>商品编号</th>
				<th>证书</th>
				<th>证书号</th>
				<th>产品详情</th>
				<th>数量</th>
				<th>重量</th>
				<th>单价</th>
				<th>销售价</th>
			</tr>
		</thead>
		<tbody align="center"></tbody>
	</table>
	<div class="Elses">
		<span style="margin:0 15em 0 0">经手人：</span>
		<span style="margin:0 25em 0 0">仓库：</span>
		<span>收货人：</span>
		<div>*白色：留底 红色：收货人 绿色：财务 黄色：留底</div>
	</div>
</div>
<?php }?>

<?php $_template = new Smarty_Internal_Template("header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

<div class="center">
	<div class="left"><?php $_template = new Smarty_Internal_Template("menu.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
</div>
	<div class="right">
		<div class="Nav">
			<div>
				订单状态
				<select onchange="page_Local(this,0 , '<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'show','DEL'=>'status'),$_smarty_tpl->smarty,$_smarty_tpl);?>
')">
					<option value="">全部订单</option>
					<?php  $_smarty_tpl->tpl_vars['us'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['uy'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('status')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['us']->key => $_smarty_tpl->tpl_vars['us']->value){
 $_smarty_tpl->tpl_vars['uy']->value = $_smarty_tpl->tpl_vars['us']->key;
?>
					<option value="status=<?php echo $_smarty_tpl->getVariable('uy')->value;?>
" <?php echo smarty_function_selected(array('val'=>$_smarty_tpl->getVariable('get')->value['status'],'str'=>$_smarty_tpl->getVariable('uy')->value),$_smarty_tpl->smarty,$_smarty_tpl);?>
><?php echo $_smarty_tpl->getVariable('us')->value;?>
</option>
					<?php }} ?>
				</select>
				订单查询
				<form method="get">
					<input name="open" type="hidden" value="<?php echo $_smarty_tpl->getVariable('get')->value['open'];?>
" />
					<input name="action" type="hidden" value="show" />
					<input name="go" type="hidden" value="query" />
					<input name='info' type="text" style="width:280px" value="<?php echo smarty_modifier_default($_smarty_tpl->getVariable('get')->value['info'],'订单号/代理|业务|客服(账号/编号/真实姓名)');?>
" onfocus="Pro_query(this,'订单号/代理|业务|客服(账号/编号/真实姓名)')" />
					<input type="submit" value="查询" class="submit" />
				</form>
				<?php if ($_smarty_tpl->getVariable('get')->value['go']=='query'){?><a style="color:#093" href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'DEL'=>'go,page,ORDER,info'),$_smarty_tpl->smarty,$_smarty_tpl);?>
">返回列表</a><?php }?>
			</div>
			<ul>
				<?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['to_csv']){?><li><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'to_csv','DEL'=>'ALL'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('to_csv'=>$_smarty_tpl->getVariable('get')->value['action'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>订单导出CSV</a></li><?php }?>
				<?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['show']){?><li><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'show','DEL'=>'id'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('show'=>$_smarty_tpl->getVariable('get')->value['action'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>订单管理</a></li><?php }?>
			</ul>
			<span class="clear"></span>
		</div>
		<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('get')->value['open'])."_".($_smarty_tpl->getVariable('get')->value['action']).".html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

	</div>
	<b class="clear"></b>
</div>
</body>
</html>