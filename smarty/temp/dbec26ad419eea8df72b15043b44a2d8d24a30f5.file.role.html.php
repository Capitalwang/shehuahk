<?php /* Smarty version Smarty3-b8, created on 2012-04-30 10:19:10
         compiled from "D:\APMServ5.2.6\www\htdocs\2011best\shehuahk\backadmin/Template/role.html" */ ?>
<?php /*%%SmartyHeaderCode:57424f9df69e59b701-94889815%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dbec26ad419eea8df72b15043b44a2d8d24a30f5' => 
    array (
      0 => 'D:\\APMServ5.2.6\\www\\htdocs\\2011best\\shehuahk\\backadmin/Template/role.html',
      1 => 1305853533,
    ),
  ),
  'nocache_hash' => '57424f9df69e59b701-94889815',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_write_url')) include 'D:\APMServ5.2.6\www\htdocs\2011best\shehuahk\smarty\plugins\function.write_url.php';
if (!is_callable('smarty_function_CLASS_COLOR')) include 'D:\APMServ5.2.6\www\htdocs\2011best\shehuahk\smarty\plugins\function.CLASS_COLOR.php';
if (!is_callable('smarty_modifier_date_format')) include 'D:\APMServ5.2.6\www\htdocs\2011best\shehuahk\smarty\plugins\modifier.date_format.php';
if (!is_callable('smarty_function_selected')) include 'D:\APMServ5.2.6\www\htdocs\2011best\shehuahk\smarty\plugins\function.selected.php';
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
				<?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['add']){?><li><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'add','DEL'=>'ALL'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('add'=>$_smarty_tpl->getVariable('get')->value['action'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>添加角色</a></li><?php }?>
				<?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['show']){?><li><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'show','DEL'=>'ALL'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('show'=>$_smarty_tpl->getVariable('get')->value['action'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>角色管理</a></li><?php }?>
			</ul>
			<span class="clear"></span>
		</div>
		<div class="show">
			<form action="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'del'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" method="post">
				<table width="100%" border="0" cellspacing="1" cellpadding="0" id="tab_show">
					<tr>
						<th width="5%">选择</th>
						<th>角色名</th>
						<th>说明</th>
						<th>是否工作</th>
						<th>更新时间</th>
						<th width="5%">权限</th>
						<th width="5%">编辑</th>
						<th width="5%">删除</th>
					</tr>
					<?php  $_smarty_tpl->tpl_vars['pso'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('list_text')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['pso']->key => $_smarty_tpl->tpl_vars['pso']->value){
?>
					<tr align="center">
						<td><?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['del']){?><input type="checkbox" name="id[]" value="<?php echo $_smarty_tpl->getVariable('pso')->value['id'];?>
" /><?php }?></td>
						<td><?php echo $_smarty_tpl->getVariable('pso')->value['name'];?>
</td>
						<td align="left"><?php echo $_smarty_tpl->getVariable('pso')->value['show'];?>
</td>
						<td><?php if ($_smarty_tpl->getVariable('pso')->value['is_work']=='Y'){?>是<?php }else{ ?>否<?php }?></td>
						<td><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('pso')->value['time'],"%Y-%m-%d %H:%M:%S");?>
</td>
						<td class="action"><?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['purview']){?><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'purview','id'=>$_smarty_tpl->getVariable('pso')->value['id']),$_smarty_tpl->smarty,$_smarty_tpl);?>
" class="act_3_12" title="设定权限"></a><?php }?></td>
						<td class="action"><?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['edit']){?><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'edit','id'=>$_smarty_tpl->getVariable('pso')->value['id']),$_smarty_tpl->smarty,$_smarty_tpl);?>
" class="act_5_8" title="编辑"></a><?php }?></td>
						<td class="action"><?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['del']){?><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'del','id'=>$_smarty_tpl->getVariable('pso')->value['id']),$_smarty_tpl->smarty,$_smarty_tpl);?>
" class="act_1_5" title="删除"></a><?php }?></td>
					</tr>
					<?php }} else { ?>
					<tr><td colspan="8" class="else">当前没有角色 , <a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'add','DEL'=>'id'),$_smarty_tpl->smarty,$_smarty_tpl);?>
">点击添加角色</a></td></tr>
					<?php } ?>
				</table>
				<div class="select">
				<?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['del']){?>
					选择：
					<input value="全部选择" type="button" onclick="select_all('id[]');" />
					<input value="全部取消" type="button" onclick="select_out('id[]');" />
					<input value="反向选择" type="button" onclick="select_agt('id[]');" />
					<input value="删除选择" type="button" onclick="select_del('id[]' , this);" />
				<?php }?>
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
					<option value="ORDER=role_UP" <?php echo smarty_function_selected(array('val'=>$_smarty_tpl->getVariable('get')->value['ORDER'],'str'=>'role_UP'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>按 角色名 (↑) 排序</option>
					<option value="ORDER=role_Dn" <?php echo smarty_function_selected(array('val'=>$_smarty_tpl->getVariable('get')->value['ORDER'],'str'=>'role_Dn'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>按 角色名 (↓) 排序</option>
				</select>
			</div>
			<?php }?>
		</div>		
	</div>
	<b class="clear"></b>
</div>
</body>
</html>