<?php /* Smarty version Smarty3-b8, created on 2011-05-28 18:44:54
         compiled from "D:\web\vhosts\shehua.hk\backadmin/Template/API.html" */ ?>
<?php /*%%SmartyHeaderCode:23934de0d22648dcd7-22852234%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '60116fec9cd78037d6d5d5e20b60570d1a79d0c6' => 
    array (
      0 => 'D:\\web\\vhosts\\shehua.hk\\backadmin/Template/API.html',
      1 => 1305853532,
    ),
  ),
  'nocache_hash' => '23934de0d22648dcd7-22852234',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_write_url')) include 'D:\web\vhosts\shehua.hk\smarty\plugins\function.write_url.php';
if (!is_callable('smarty_function_CLASS_COLOR')) include 'D:\web\vhosts\shehua.hk\smarty\plugins\function.CLASS_COLOR.php';
if (!is_callable('smarty_function_selected')) include 'D:\web\vhosts\shehua.hk\smarty\plugins\function.selected.php';
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
						<th width="5%">选择</th>
						<th>标识码</th>
						<th>联系人</th>
						<th>代理组</th>
						<th>电话</th>
						<th>电子邮箱</th>
						<th>QQ</th>
						<th>公司名称</th>
						<th>地区</th>
						<th>网站</th>
						<th width="5%">编辑</th>
						<th width="5%">删除</th>
					</tr>
					<?php  $_smarty_tpl->tpl_vars['pso'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('list_text')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['pso']->key => $_smarty_tpl->tpl_vars['pso']->value){
?>
					<tr align="center">
						<td><?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['del']){?><input type="checkbox" name="key[]" value="<?php echo $_smarty_tpl->getVariable('pso')->value['key'];?>
" /><?php }?></td>
						<td><?php echo $_smarty_tpl->getVariable('pso')->value['key'];?>
</td>
						<td align="left"><?php echo $_smarty_tpl->getVariable('pso')->value['name'];?>
</td>
						<td align="left"><?php echo $_smarty_tpl->getVariable('pso')->value['group'];?>
</td>
						<td><?php echo $_smarty_tpl->getVariable('pso')->value['tel'];?>
</td>
						<td align="left"><?php echo $_smarty_tpl->getVariable('pso')->value['mail'];?>
</td>
						<td><?php echo $_smarty_tpl->getVariable('pso')->value['QQ'];?>
</td>
						<td align="left"><?php echo $_smarty_tpl->getVariable('pso')->value['company_name'];?>
</td>
						<td align="left"><?php echo $_smarty_tpl->getVariable('pso')->value['province'];?>
 <?php if ($_smarty_tpl->getVariable('pso')->value['city']){?>- <?php echo $_smarty_tpl->getVariable('pso')->value['city'];?>
<?php }?></td>
						<td><?php echo $_smarty_tpl->getVariable('pso')->value['home_page'];?>
</td>
						<td class="action"><?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['edit']){?><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'edit','key'=>$_smarty_tpl->getVariable('pso')->value['key']),$_smarty_tpl->smarty,$_smarty_tpl);?>
" class="act_5_8" title="编辑"></a><?php }?></td>
						<td class="action"><?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['del']){?><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'del','key'=>$_smarty_tpl->getVariable('pso')->value['key']),$_smarty_tpl->smarty,$_smarty_tpl);?>
" class="act_1_5" title="删除"></a><?php }?></td>
					</tr>
					<?php }} else { ?>
					<tr><td colspan="12" class="else">当前没有API用户 , <a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'add','DEL'=>'ALL'),$_smarty_tpl->smarty,$_smarty_tpl);?>
">点击添加API用户</a></td></tr>
					<?php } ?>
				</table>
				<div class="select">
				<?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['del']){?>
					选择：
					<input value="全部选择" type="button" onclick="select_all('key[]');" />
					<input value="全部取消" type="button" onclick="select_out('key[]');" />
					<input value="反向选择" type="button" onclick="select_agt('key[]');" />
					<input value="删除选择" type="button" onclick="select_del('key[]' , this);" />
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
>按 注册时间 (↑) 排序</option>
					<option value="ORDER=time_Dn" <?php echo smarty_function_selected(array('val'=>$_smarty_tpl->getVariable('get')->value['ORDER'],'str'=>'time_Dn'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>按 注册时间 (↓) 排序</option>
					<option value="ORDER=name_UP" <?php echo smarty_function_selected(array('val'=>$_smarty_tpl->getVariable('get')->value['ORDER'],'str'=>'name_UP'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>按 联系人 (↑) 排序</option>
					<option value="ORDER=name_Dn" <?php echo smarty_function_selected(array('val'=>$_smarty_tpl->getVariable('get')->value['ORDER'],'str'=>'name_Dn'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>按 联系人 (↓) 排序</option>
				</select>
			</div>
			<?php }?>
	</div>		
	</div>
	<b class="clear"></b>
</div>
</body>
</html>