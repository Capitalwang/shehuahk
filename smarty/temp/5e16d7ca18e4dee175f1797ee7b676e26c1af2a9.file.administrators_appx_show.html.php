<?php /* Smarty version Smarty3-b8, created on 2014-07-03 11:16:45
         compiled from "D:\APMServ5.2.6\www\htdocs\shehuahk\backadmin/Template/administrators_appx_show.html" */ ?>
<?php /*%%SmartyHeaderCode:1733453b4cb1d74bd00-12226612%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5e16d7ca18e4dee175f1797ee7b676e26c1af2a9' => 
    array (
      0 => 'D:\\APMServ5.2.6\\www\\htdocs\\shehuahk\\backadmin/Template/administrators_appx_show.html',
      1 => 1305853518,
    ),
  ),
  'nocache_hash' => '1733453b4cb1d74bd00-12226612',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_write_url')) include 'D:\APMServ5.2.6\www\htdocs\shehuahk\smarty\plugins\function.write_url.php';
if (!is_callable('smarty_function_CLASS_COLOR')) include 'D:\APMServ5.2.6\www\htdocs\shehuahk\smarty\plugins\function.CLASS_COLOR.php';
if (!is_callable('smarty_modifier_date_format')) include 'D:\APMServ5.2.6\www\htdocs\shehuahk\smarty\plugins\modifier.date_format.php';
if (!is_callable('smarty_function_selected')) include 'D:\APMServ5.2.6\www\htdocs\shehuahk\smarty\plugins\function.selected.php';
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
>添加管理员</a></li><?php }?>
				<?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['show']){?><li><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'show','DEL'=>'ALL'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('show'=>$_smarty_tpl->getVariable('get')->value['action'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>管理员列表</a></li><?php }?>
			</ul>
			<span class="clear"></span>
		</div>
		<div class="append">
			<table width="100%" border="0" cellspacing="1" cellpadding="0" id="tab_show">
				<tr class="NO_TAB_SHOW"><td colspan="9" class="Need padding">附件</td></tr>
				<tr class="NO_TAB_SHOW">
					<td align="right">管理员账号</td>
					<td><?php echo $_smarty_tpl->getVariable('administrators')->value['account'];?>
</td>
					<td align="right">真实姓名</td>
					<td><?php echo $_smarty_tpl->getVariable('administrators')->value['name'];?>
</td>
					<td align="right">昵称</td>
					<td><?php echo $_smarty_tpl->getVariable('administrators')->value['nickname'];?>
</td>
					<td align="right">编号</td>
					<td><?php echo $_smarty_tpl->getVariable('administrators')->value['number'];?>
</td>
					<td width="20%">
						<div class="Nav" style="margin:0; padding:0">
							<ul>
								<?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['appx_add']){?><li><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'appx_add','DEL'=>'appxid'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('administrators'=>$_smarty_tpl->getVariable('get')->value['open'],'appx_add'=>$_smarty_tpl->getVariable('get')->value['action'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>添加附件</a></li><?php }?>
								<?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['appx_show']){?><li><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'appx_show','DEL'=>'appxid'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('administrators'=>$_smarty_tpl->getVariable('get')->value['open'],'appx_show'=>$_smarty_tpl->getVariable('get')->value['action'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>附件管理</a></li><?php }?>
							</ul>
							<span class="clear"></span>
						</div>
					</td>
				</tr>
				<tr class='NO_TAB_SHOW'>
					<td colspan="9">
						<form action="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'appx_del'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" method="post">
							<table width="100%" border="0" cellspacing="1" cellpadding="0">
								<tr>
									<th width="5%">选择</th>
									<th>附件类型</th>
									<th>名称</th>
									<th>简单介绍</th>
									<th>时间</th>
									<th width="5%">文件</th>
									<th width="5%">编辑</th>
									<th width="5%">删除</th>
								</tr>
								<?php  $_smarty_tpl->tpl_vars['pso'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('list_text')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['pso']->key => $_smarty_tpl->tpl_vars['pso']->value){
?>
								<tr>
									<td align="center"><?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['appx_del']){?><input type="checkbox" name="appxid[]" value="<?php echo $_smarty_tpl->getVariable('pso')->value['id'];?>
" /><?php }?></td>
									<td><?php echo $_smarty_tpl->getVariable('Appendix')->value[$_smarty_tpl->getVariable('pso')->value['type']];?>
</td>
									<td><?php echo $_smarty_tpl->getVariable('pso')->value['name'];?>
</td>
									<td><?php echo $_smarty_tpl->getVariable('pso')->value['into'];?>
</td>
									<td align="center"><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('pso')->value['time'],"%Y-%m-%d %H:%M:%S");?>
</td>
									<td class="action" align="center"><?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['appx_down']){?><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'appx_down','appxid'=>$_smarty_tpl->getVariable('pso')->value['id']),$_smarty_tpl->smarty,$_smarty_tpl);?>
" class="act_4_7" title="附件"></a><?php }?></td>
									<td class="action" align="center"><?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['appx_edit']){?><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'appx_edit','appxid'=>$_smarty_tpl->getVariable('pso')->value['id']),$_smarty_tpl->smarty,$_smarty_tpl);?>
" class="act_5_8" title="编辑"></a><?php }?></td>
									<td class="action" align="center"><?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['appx_del']){?><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'appx_del','appxid'=>$_smarty_tpl->getVariable('pso')->value['id']),$_smarty_tpl->smarty,$_smarty_tpl);?>
" class="act_1_5" title="删除"></a><?php }?></td>
								</tr>
								<?php }} else { ?>
								<tr><td colspan="9" class="else">当前管理员没有附件 , <a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'appx_add'),$_smarty_tpl->smarty,$_smarty_tpl);?>
">点击为该管理员添加附件</a></td></tr>
								<?php } ?>
							</table>
							<div class="select" style="padding:0;border:none; margin:1em auto 0 auto">
								选择：
								<input value="全部选择" type="button" onclick="select_all('appxid[]');" />
								<input value="全部取消" type="button" onclick="select_out('appxid[]');" />
								<input value="反向选择" type="button" onclick="select_agt('appxid[]');" />
								<input value="删除选择" type="button" onclick="select_del('appxid[]' , this);" />
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
							至 <input type="text" style="height:auto;line-height:inherit" value="<?php echo $_smarty_tpl->getVariable('list_page')->value['NowPage'];?>
" onkeydown="go_page(event , this , '<?php echo $_smarty_tpl->getVariable('thisurl')->value;?>
')" /> 页
							排序:
							<select onchange="page_Local(this,0 , '<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'DEL'=>'ORDER'),$_smarty_tpl->smarty,$_smarty_tpl);?>
')">
								<option value="ORDER=time_UP" <?php echo smarty_function_selected(array('val'=>$_smarty_tpl->getVariable('get')->value['ORDER'],'str'=>'time_UP'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>按 时间 (↑) 排序</option>
								<option value="ORDER=time_Dn" <?php echo smarty_function_selected(array('val'=>$_smarty_tpl->getVariable('get')->value['ORDER'],'str'=>'time_Dn'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>按 时间 (↓) 排序</option>
								<option value="ORDER=type_UP" <?php echo smarty_function_selected(array('val'=>$_smarty_tpl->getVariable('get')->value['ORDER'],'str'=>'type_UP'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>按 附件类型 (↑) 排序</option>
								<option value="ORDER=type_Dn" <?php echo smarty_function_selected(array('val'=>$_smarty_tpl->getVariable('get')->value['ORDER'],'str'=>'type_Dn'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>按 附件类型 (↓) 排序</option>
							</select>
						</div>
						<?php }?>
					</td>
				</tr>
			</table>
		</div>	
	</div>
	<b class="clear"></b>
</div>
</body>
</html>