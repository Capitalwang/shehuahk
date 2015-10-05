<?php /* Smarty version Smarty3-b8, created on 2015-07-07 10:10:54
         compiled from "D:\www\shehuahk\backadmin/Template/API_log.html" */ ?>
<?php /*%%SmartyHeaderCode:14728559b352e0ef776-36205446%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '87ba658a9565e98950cdbc7ec59ebcdd4e403088' => 
    array (
      0 => 'D:\\www\\shehuahk\\backadmin/Template/API_log.html',
      1 => 1305853533,
    ),
  ),
  'nocache_hash' => '14728559b352e0ef776-36205446',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_write_url')) include 'D:\www\shehuahk\smarty\plugins\function.write_url.php';
if (!is_callable('smarty_function_CLASS_COLOR')) include 'D:\www\shehuahk\smarty\plugins\function.CLASS_COLOR.php';
if (!is_callable('smarty_function_selected')) include 'D:\www\shehuahk\smarty\plugins\function.selected.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo @Site_Name;?>
</title>
<link href="css/public.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="Js/menu.js"></script>
<script type="text/javascript" src="Js/exec.js"></script>
</head>

<body>
<?php $_template = new Smarty_Internal_Template("header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

<div class="center">
	<div class="left"><?php $_template = new Smarty_Internal_Template("menu.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
</div>
	<div class="right">
		<div class="Nav">
			<ul>
				<?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['log']){?><li><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'log','DEL'=>'ALL'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('log'=>$_smarty_tpl->getVariable('get')->value['action'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>API日志</a></li><?php }?>
				<?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['add']){?><li><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'add','DEL'=>'ALL'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('add'=>$_smarty_tpl->getVariable('get')->value['action'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>添加API用户</a></li><?php }?>
				<?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['show']){?><li><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'show','DEL'=>'ALL'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('show'=>$_smarty_tpl->getVariable('get')->value['action'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>API用户列表</a></li><?php }?>
			</ul>
			<span class="clear"></span>
		</div>
		<div class="show">
			<form action="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'del'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" method="post">
				<table width="100%" border="0" cellspacing="1" cellpadding="0" id="tab_show">
					<tr>
						<th>标识码</th>
						<th>联系人</th>
						<th>类型</th>
						<th>年份</th>
						<th>月份</th>
						<th>请求量</th>
					</tr>
					<?php  $_smarty_tpl->tpl_vars['pso'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('list_text')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['pso']->key => $_smarty_tpl->tpl_vars['pso']->value){
?>
					<tr align="center">
						<td height="25"><?php echo $_smarty_tpl->getVariable('pso')->value['api_key'];?>
</td>
						<td align="left"><?php echo $_smarty_tpl->getVariable('pso')->value['name'];?>
</td>
						<td><?php if ($_smarty_tpl->getVariable('pso')->value['type']=='product'){?>产品<?php }elseif($_smarty_tpl->getVariable('pso')->value['type']=='detail'){?>产品明细<?php }else{ ?>国际报价<?php }?></td>
						<td><?php echo $_smarty_tpl->getVariable('pso')->value['year'];?>
</td>
						<td><?php echo $_smarty_tpl->getVariable('pso')->value['month'];?>
</td>
						<td><?php echo $_smarty_tpl->getVariable('pso')->value['amount'];?>
</td>
					</tr>
					<?php }} else { ?>
					<tr><td colspan="6" class="else">当前没有短信发送记录</td></tr>
					<?php } ?>
				</table>
				<div class="select">
				<!--
				<?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['del']){?>
					选择：
					<input value="全部选择" type="button" onclick="select_all('id[]');" />
					<input value="全部取消" type="button" onclick="select_out('id[]');" />
					<input value="反向选择" type="button" onclick="select_agt('id[]');" />
					<input value="删除选择" type="button" onclick="select_del('id[]' , this);" />
				<?php }?>
				-->
				</div>
			</form>
			<?php if ($_smarty_tpl->getVariable('list_page')->value['Record']>0){?>
			<div class="page">
				每页
				<select onchange="page_Local(this,0 , '<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'DEL'=>'PNS'),$_smarty_tpl->smarty,$_smarty_tpl);?>
')">
					<option value="PNS=10" <?php echo smarty_function_selected(array('val'=>$_smarty_tpl->getVariable('get')->value['PNS'],'str'=>'10'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>10</option>
					<option value="PNS=25" <?php echo smarty_function_selected(array('val'=>$_smarty_tpl->getVariable('get')->value['PNS'],'str'=>'25'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>25</option>
					<option value="PNS=50" <?php echo smarty_function_selected(array('val'=>$_smarty_tpl->getVariable('get')->value['PNS'],'str'=>'50'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>50</option>
					<option value="PNS=100" <?php echo smarty_function_selected(array('val'=>$_smarty_tpl->getVariable('get')->value['PNS'],'str'=>'100'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>100</option>
				</select>
				条数据
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
				至 <input type="text" value="<?php echo $_smarty_tpl->getVariable('list_page')->value['NowPage'];?>
" onkeydown="go_page(event , this , '<?php echo $_smarty_tpl->getVariable('thisurl')->value;?>
')" /> 页
				排序:
				<select onchange="page_Local(this,0 , '<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'DEL'=>'ORDER'),$_smarty_tpl->smarty,$_smarty_tpl);?>
')">
					<option value="ORDER=time_UP" <?php echo smarty_function_selected(array('val'=>$_smarty_tpl->getVariable('get')->value['ORDER'],'str'=>'time_UP'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>按 时间 (↑) 排序</option>
					<option value="ORDER=time_Dn" <?php echo smarty_function_selected(array('val'=>$_smarty_tpl->getVariable('get')->value['ORDER'],'str'=>'time_Dn'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>按 时间 (↓) 排序</option>
				</select>
			</div>
			<?php }?>
		</div>		
	</div>
	<b class="clear"></b>
</div>
</body>
</html>