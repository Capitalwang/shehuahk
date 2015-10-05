<?php /* Smarty version Smarty3-b8, created on 2012-10-17 10:14:14
         compiled from "D:\APMServ5.2.6\www\htdocs\shehuahk\backadmin/Template/product_advanced.html" */ ?>
<?php /*%%SmartyHeaderCode:20572507e14765560b9-43930818%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '898ca1ebf3da249fbbfe92cf3e0a49bd5909ad9d' => 
    array (
      0 => 'D:\\APMServ5.2.6\\www\\htdocs\\shehuahk\\backadmin/Template/product_advanced.html',
      1 => 1305853533,
    ),
  ),
  'nocache_hash' => '20572507e14765560b9-43930818',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_write_url')) include 'D:\APMServ5.2.6\www\htdocs\shehuahk\smarty\plugins\function.write_url.php';
if (!is_callable('smarty_function_CLASS_COLOR')) include 'D:\APMServ5.2.6\www\htdocs\shehuahk\smarty\plugins\function.CLASS_COLOR.php';
if (!is_callable('smarty_function_brite_spot')) include 'D:\APMServ5.2.6\www\htdocs\shehuahk\smarty\plugins\function.brite_spot.php';
if (!is_callable('smarty_function_Goto_diploma')) include 'D:\APMServ5.2.6\www\htdocs\shehuahk\smarty\plugins\function.Goto_diploma.php';
if (!is_callable('smarty_function_math')) include 'D:\APMServ5.2.6\www\htdocs\shehuahk\smarty\plugins\function.math.php';
if (!is_callable('smarty_function_selected')) include 'D:\APMServ5.2.6\www\htdocs\shehuahk\smarty\plugins\function.selected.php';
if (!is_callable('smarty_function_checked')) include 'D:\APMServ5.2.6\www\htdocs\shehuahk\smarty\plugins\function.checked.php';
if (!is_callable('smarty_modifier_date_format')) include 'D:\APMServ5.2.6\www\htdocs\shehuahk\smarty\plugins\modifier.date_format.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo @Site_Name;?>
</title>
<link href="css/public.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="Js/menu.js"></script>
<script type="text/javascript" src="Js/string.js"></script>
<script type="text/javascript" src="Js/product.js"></script>
<script type="text/javascript" src="Js/exec.js"></script>
<script type="text/javascript" src="Js/Calendar.js"></script>
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
			<?php if ($_smarty_tpl->getVariable('get')->value['go']){?>
			<div>
				产品状态
				<a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'DEL'=>'status'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php if ($_smarty_tpl->getVariable('get')->value['status']==''){?>class='red'<?php }?>>全部</a>
				<?php  $_smarty_tpl->tpl_vars['us'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['uy'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('status')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['us']->key => $_smarty_tpl->tpl_vars['us']->value){
 $_smarty_tpl->tpl_vars['uy']->value = $_smarty_tpl->tpl_vars['us']->key;
?>
				<a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'status'=>$_smarty_tpl->getVariable('uy')->value),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php if ($_smarty_tpl->getVariable('get')->value['status']==$_smarty_tpl->getVariable('uy')->value){?>class='red'<?php }?>><?php echo $_smarty_tpl->getVariable('us')->value;?>
</a>
				<?php }} ?>
			</div>
			<?php }?>
			<ul>
			<?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['advanced']){?><li><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'advanced','DEL'=>'ALL'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('advanced'=>$_smarty_tpl->getVariable('get')->value['action'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>高级查询</a></li><?php }?>
			<?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['add']){?><li><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'add','DEL'=>'ALL'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('add'=>$_smarty_tpl->getVariable('get')->value['action'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>添加产品</a></li><?php }?>
			<?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['show']){?><li><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'show','DEL'=>'ALL'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('show'=>$_smarty_tpl->getVariable('get')->value['action'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>产品管理</a></li><?php }?>
			</ul>
			<span class="clear"></span>
		</div>
		<?php if ($_smarty_tpl->getVariable('get')->value['go']){?>
		<div class="show">
			<form action="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'del'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" method="post">
				<table width="100%" border="0" cellspacing="1" cellpadding="0" id="tab_show">
					<tr>
						<th width="5%">选择</th>
						<th>编号</th>
						<th>形状</th>
						<th>重量</th>
						<th>颜色</th>
						<th>净度</th>
						<th>切工</th>
						<th>抛光</th>
						<th>对称</th>
						<th>荧光</th>
						<th>测量值</th>
						<th>证书</th>
						<th>¥/每卡</th>
						<th>退点%</th>
						<th>¥/每颗</th>
						<th width="5%">价格</th>
						<th width="5%">详情</th>
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
						<td><?php echo smarty_function_brite_spot(array('query'=>$_smarty_tpl->getVariable('get')->value['info'],'str'=>$_smarty_tpl->getVariable('pso')->value['ProID']),$_smarty_tpl->smarty,$_smarty_tpl);?>
</td>
						<td><?php echo $_smarty_tpl->getVariable('shape')->value[$_smarty_tpl->getVariable('pso')->value['shape']];?>
</td>
						<td><?php echo $_smarty_tpl->getVariable('pso')->value['weight'];?>
</td>
						<td><?php echo $_smarty_tpl->getVariable('pso')->value['color'];?>
</td>
						<td><?php echo $_smarty_tpl->getVariable('pso')->value['clarity'];?>
</td>
						<td><?php echo $_smarty_tpl->getVariable('pso')->value['cut'];?>
</td>
						<td><?php echo $_smarty_tpl->getVariable('pso')->value['buffing'];?>
</td>
						<td><?php echo $_smarty_tpl->getVariable('pso')->value['symmetry'];?>
</td>
						<td><?php echo $_smarty_tpl->getVariable('pso')->value['Fent_Isity'];?>
</td>
						<td><?php echo $_smarty_tpl->getVariable('pso')->value['scalar_value'];?>
</td>
						<td><?php echo smarty_function_Goto_diploma(array('diploma'=>$_smarty_tpl->getVariable('pso')->value['diploma'],'weight'=>$_smarty_tpl->getVariable('pso')->value['weight'],'NO'=>$_smarty_tpl->getVariable('pso')->value['diplomaNO'],'show'=>$_smarty_tpl->getVariable('pso')->value['diploma']),$_smarty_tpl->smarty,$_smarty_tpl);?>
</td>
						<td><?php echo smarty_function_math(array('equation'=>"x / y",'x'=>$_smarty_tpl->getVariable('pso')->value['infml'],'y'=>$_smarty_tpl->getVariable('pso')->value['weight'],'format'=>"%.2f"),$_smarty_tpl->smarty,$_smarty_tpl);?>
</td>
						<?php if ($_smarty_tpl->getVariable('pso')->value['is_promotion']=='Y'&&$_smarty_tpl->getVariable('pso')->value['promotion_start']<=mktime()&&$_smarty_tpl->getVariable('pso')->value['promotion_stop']>=mktime()){?>
						<td class="promotion">促销</td>
						<td class="promotion"><?php echo sprintf('%.2f',$_smarty_tpl->getVariable('pso')->value['INTbid']*$_smarty_tpl->getVariable('pso')->value['weight']*(100+$_smarty_tpl->getVariable('pso')->value['agio']+$_smarty_tpl->getVariable('pso')->value['baseAgio']+$_smarty_tpl->getVariable('pso')->value['promotion_dot'])/100);?>
 元</td>
						<?php }else{ ?>
						<td><?php echo $_smarty_tpl->getVariable('pso')->value['agio'];?>
</td>
						<td><?php echo $_smarty_tpl->getVariable('pso')->value['infml'];?>
</td>
						<?php }?>
						<td class="action"><?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['view_price']){?><a href="javascript:;" onclick="view_price(this , '<?php echo $_smarty_tpl->getVariable('pso')->value['id'];?>
' , 19)" class="act_3_2" title="查看价格"></a><?php }?></td>
						<td class="action"><?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['detail']){?><a href="javascript:;" onclick="show_pro_detail(this , '<?php echo $_smarty_tpl->getVariable('pso')->value['id'];?>
' , 19)" class="act_3_10" title="产品详情"></a><?php }?></td>
						<td class="action"><?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['edit']){?><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'edit','id'=>$_smarty_tpl->getVariable('pso')->value['id']),$_smarty_tpl->smarty,$_smarty_tpl);?>
" class="act_5_8" title="编辑"></a><?php }?></td>
						<td class="action"><?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['del']){?><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'del','id'=>$_smarty_tpl->getVariable('pso')->value['id']),$_smarty_tpl->smarty,$_smarty_tpl);?>
" class="act_1_5" title="删除"></a><?php }?></td>
					</tr>
					<?php }} else { ?>
					<tr><td colspan="19" class="else">当前没有你搜索的产品 , <a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'add','DEL'=>'ALL'),$_smarty_tpl->smarty,$_smarty_tpl);?>
">点击添加产品</a></td></tr>
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
				<?php if ($_smarty_tpl->getVariable('BTP')->value['cart']['add']){?><input value="加入购物车" type="button" onclick="add_cart('id[]',this,'<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'open'=>'cart','action'=>'add','DEL'=>'ALL'),$_smarty_tpl->smarty,$_smarty_tpl);?>
')" /><?php }?>
				<?php if ($_smarty_tpl->getVariable('BTP')->value['product_to_CSV']['add']){?><input value="导出CSV" type="button" onclick="add_cart('id[]',this,'<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'open'=>'product_to_CSV','action'=>'add','DEL'=>'ALL'),$_smarty_tpl->smarty,$_smarty_tpl);?>
')" /><?php }?>
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
					<option value="ORDER=agio_UP" <?php echo smarty_function_selected(array('val'=>$_smarty_tpl->getVariable('get')->value['ORDER'],'str'=>'agio_UP'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>按 退点 (↑) 排序</option>
					<option value="ORDER=agio_Dn" <?php echo smarty_function_selected(array('val'=>$_smarty_tpl->getVariable('get')->value['ORDER'],'str'=>'agio_Dn'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>按 退点 (↓) 排序</option>
					<option value="ORDER=nber_UP" <?php echo smarty_function_selected(array('val'=>$_smarty_tpl->getVariable('get')->value['ORDER'],'str'=>'nber_UP'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>按 编号 (↑) 排序</option>
					<option value="ORDER=nber_Dn" <?php echo smarty_function_selected(array('val'=>$_smarty_tpl->getVariable('get')->value['ORDER'],'str'=>'nber_Dn'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>按 编号 (↓) 排序</option>
					<option value="ORDER=inml_UP" <?php echo smarty_function_selected(array('val'=>$_smarty_tpl->getVariable('get')->value['ORDER'],'str'=>'inml_UP'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>按 价格 (↑) 排序</option>
					<option value="ORDER=inml_Dn" <?php echo smarty_function_selected(array('val'=>$_smarty_tpl->getVariable('get')->value['ORDER'],'str'=>'inml_Dn'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>按 价格 (↓) 排序</option>
				</select>
			</div>
			<?php }?>
		</div>
		<?php }else{ ?>
		<div class="append">
			<form action="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'go'=>'query'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" method="post">
				<table width="100%" border="0" cellspacing="1" cellpadding="0">
					<tr>
						<th>形状</th>
						<th>颜色</th>
						<th>净度</th>
						<th>切工</th>
						<th>抛光</th>
						<th>对称</th>
						<th>荧光强度</th>
						<th>荧光颜色</th>
						<th>证书</th>
						<th>产品来源</th>
					</tr>
					<tr class="Advanced">
						<td>
							<?php  $_smarty_tpl->tpl_vars['ts'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['sy'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('shape')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['ts']->key => $_smarty_tpl->tpl_vars['ts']->value){
 $_smarty_tpl->tpl_vars['sy']->value = $_smarty_tpl->tpl_vars['ts']->key;
?>
							<label for="shape_<?php echo $_smarty_tpl->getVariable('sy')->value;?>
"><input name="shape[]" type="checkbox" id="shape_<?php echo $_smarty_tpl->getVariable('sy')->value;?>
" value="<?php echo $_smarty_tpl->getVariable('sy')->value;?>
" <?php echo smarty_function_checked(array('val'=>$_smarty_tpl->getVariable('sy')->value,'str'=>$_smarty_tpl->getVariable('get')->value['shape']),$_smarty_tpl->smarty,$_smarty_tpl);?>
 /> <?php echo $_smarty_tpl->getVariable('ts')->value;?>
</label>
							<?php }} ?>
						</td>
						<td>
							<?php  $_smarty_tpl->tpl_vars['ts'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('color')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['ts']->key => $_smarty_tpl->tpl_vars['ts']->value){
?>
							<label for="color_<?php echo $_smarty_tpl->getVariable('ts')->value;?>
"><input name="color[]" type="checkbox" id="color_<?php echo $_smarty_tpl->getVariable('ts')->value;?>
" value="<?php echo $_smarty_tpl->getVariable('ts')->value;?>
" <?php echo smarty_function_checked(array('val'=>$_smarty_tpl->getVariable('ts')->value,'str'=>$_smarty_tpl->getVariable('get')->value['color']),$_smarty_tpl->smarty,$_smarty_tpl);?>
 /> <?php echo $_smarty_tpl->getVariable('ts')->value;?>
</label>
							<?php }} ?>
						</td>
						<td>
							<?php  $_smarty_tpl->tpl_vars['ts'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('clarity')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['ts']->key => $_smarty_tpl->tpl_vars['ts']->value){
?>
							<label for="clarity_<?php echo $_smarty_tpl->getVariable('ts')->value;?>
"><input name="clarity[]" type="checkbox" id="clarity_<?php echo $_smarty_tpl->getVariable('ts')->value;?>
" value="<?php echo $_smarty_tpl->getVariable('ts')->value;?>
" <?php echo smarty_function_checked(array('val'=>$_smarty_tpl->getVariable('ts')->value,'str'=>$_smarty_tpl->getVariable('get')->value['clarity']),$_smarty_tpl->smarty,$_smarty_tpl);?>
 /> <?php echo $_smarty_tpl->getVariable('ts')->value;?>
</label>
							<?php }} ?>
						</td>
						<td>
							<?php  $_smarty_tpl->tpl_vars['ts'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('cut')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['ts']->key => $_smarty_tpl->tpl_vars['ts']->value){
?>
							<label for="cut_<?php echo $_smarty_tpl->getVariable('ts')->value;?>
"><input name="cut[]" type="checkbox" id="cut_<?php echo $_smarty_tpl->getVariable('ts')->value;?>
" value="<?php echo $_smarty_tpl->getVariable('ts')->value;?>
" <?php echo smarty_function_checked(array('val'=>$_smarty_tpl->getVariable('ts')->value,'str'=>$_smarty_tpl->getVariable('get')->value['cut']),$_smarty_tpl->smarty,$_smarty_tpl);?>
 /> <?php echo $_smarty_tpl->getVariable('ts')->value;?>
</label>
							<?php }} ?>
						</td>
						<td>
							<?php  $_smarty_tpl->tpl_vars['ts'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('cut')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['ts']->key => $_smarty_tpl->tpl_vars['ts']->value){
?>
							<label for="buffing_<?php echo $_smarty_tpl->getVariable('ts')->value;?>
"><input name="buffing[]" type="checkbox" id="buffing_<?php echo $_smarty_tpl->getVariable('ts')->value;?>
" value="<?php echo $_smarty_tpl->getVariable('ts')->value;?>
" <?php echo smarty_function_checked(array('val'=>$_smarty_tpl->getVariable('ts')->value,'str'=>$_smarty_tpl->getVariable('get')->value['buffing']),$_smarty_tpl->smarty,$_smarty_tpl);?>
 /> <?php echo $_smarty_tpl->getVariable('ts')->value;?>
</label>
							<?php }} ?>
						</td>
						<td>
							<?php  $_smarty_tpl->tpl_vars['ts'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('cut')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['ts']->key => $_smarty_tpl->tpl_vars['ts']->value){
?>
							<label for="symmetry_<?php echo $_smarty_tpl->getVariable('ts')->value;?>
"><input name="symmetry[]" type="checkbox" id="symmetry_<?php echo $_smarty_tpl->getVariable('ts')->value;?>
" value="<?php echo $_smarty_tpl->getVariable('ts')->value;?>
" <?php echo smarty_function_checked(array('val'=>$_smarty_tpl->getVariable('ts')->value,'str'=>$_smarty_tpl->getVariable('get')->value['symmetry']),$_smarty_tpl->smarty,$_smarty_tpl);?>
 /> <?php echo $_smarty_tpl->getVariable('ts')->value;?>
</label>
							<?php }} ?>
						</td>
						<td>
							<?php  $_smarty_tpl->tpl_vars['ts'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('Fent_Isity')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['ts']->key => $_smarty_tpl->tpl_vars['ts']->value){
?>
							<label for="Fent_Isity_<?php echo $_smarty_tpl->getVariable('ts')->value;?>
"><input name="Fent_Isity[]" type="checkbox" id="Fent_Isity_<?php echo $_smarty_tpl->getVariable('ts')->value;?>
" value="<?php echo $_smarty_tpl->getVariable('ts')->value;?>
" <?php echo smarty_function_checked(array('val'=>$_smarty_tpl->getVariable('ts')->value,'str'=>$_smarty_tpl->getVariable('get')->value['Fent_Isity']),$_smarty_tpl->smarty,$_smarty_tpl);?>
 /> <?php echo $_smarty_tpl->getVariable('ts')->value;?>
</label>
							<?php }} ?>
						</td>
						<td>
							<?php  $_smarty_tpl->tpl_vars['ts'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('Fent_color')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['ts']->key => $_smarty_tpl->tpl_vars['ts']->value){
?>
							<label for="Fent_color_<?php echo $_smarty_tpl->getVariable('ts')->value;?>
"><input name="Fent_color[]" type="checkbox" id="Fent_color_<?php echo $_smarty_tpl->getVariable('ts')->value;?>
" value="<?php echo $_smarty_tpl->getVariable('ts')->value;?>
" <?php echo smarty_function_checked(array('val'=>$_smarty_tpl->getVariable('ts')->value,'str'=>$_smarty_tpl->getVariable('get')->value['Fent_color']),$_smarty_tpl->smarty,$_smarty_tpl);?>
 /> <?php echo $_smarty_tpl->getVariable('ts')->value;?>
</label>
							<?php }} ?>
						</td>
						<td>
							<?php  $_smarty_tpl->tpl_vars['ts'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('diploma')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['ts']->key => $_smarty_tpl->tpl_vars['ts']->value){
?>
							<label for="diploma_<?php echo $_smarty_tpl->getVariable('ts')->value;?>
"><input name="diploma[]" type="checkbox" id="diploma_<?php echo $_smarty_tpl->getVariable('ts')->value;?>
" value="<?php echo $_smarty_tpl->getVariable('ts')->value;?>
" <?php echo smarty_function_checked(array('val'=>$_smarty_tpl->getVariable('ts')->value,'str'=>$_smarty_tpl->getVariable('get')->value['diploma']),$_smarty_tpl->smarty,$_smarty_tpl);?>
 /> <?php echo $_smarty_tpl->getVariable('ts')->value;?>
</label>
							<?php }} ?>
						</td>
						<td>
							<?php  $_smarty_tpl->tpl_vars['ts'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['sy'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('proSource')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['ts']->key => $_smarty_tpl->tpl_vars['ts']->value){
 $_smarty_tpl->tpl_vars['sy']->value = $_smarty_tpl->tpl_vars['ts']->key;
?>
							<label for="proSource_<?php echo $_smarty_tpl->getVariable('sy')->value;?>
"><input name="proSource[]" type="checkbox" id="proSource_<?php echo $_smarty_tpl->getVariable('sy')->value;?>
" value="<?php echo $_smarty_tpl->getVariable('sy')->value;?>
" <?php echo smarty_function_checked(array('val'=>$_smarty_tpl->getVariable('sy')->value,'str'=>$_smarty_tpl->getVariable('get')->value['proSource']),$_smarty_tpl->smarty,$_smarty_tpl);?>
 /> <?php echo $_smarty_tpl->getVariable('ts')->value;?>
</label>
							<?php }} ?>
						</td>
					</tr>
					<tr>
						<td colspan="4" align="right">促销</td>
						<td colspan="6" class="promotion">
							<ul style="display:block">
								<li>
									开始时间 <input name='promotion_start' type="text" class="FM_date" onclick="Calendar(this)" value="<?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('get')->value['promotion_start'],'%Y-%m-%d');?>
" readonly />
									<a href="javascript:;" class="DELDAY" onclick="DELDAY('promotion_start');">删除</a>
								</li>
								<li>
									结束时间 <input name='promotion_stop' type="text" class="FM_date" onclick="Calendar(this)" value="<?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('get')->value['promotion_stop'],'%Y-%m-%d');?>
" readonly />
									<a href="javascript:;" class="DELDAY" onclick="DELDAY('promotion_stop');">删除</a>
								</li>
							</ul>
						</td>
					</tr>
					<tr>
						<td colspan="4" align="right">退点</td>
						<td colspan="6">
							<input name="agio[]" type="text" style="width:80px;text-align:center" onfocus="sprintf('%.2f' , this , true)" /> % -
							<input name="agio[]" type="text" style="width:80px;text-align:center" onfocus="sprintf('%.2f' , this , true)" /> %
						</td>
					</tr>
					<tr>
						<td colspan="4" align="right">重量</td>
						<td colspan="6">
							<input name="weight[]" type="text" style="width:80px;text-align:center" onfocus="sprintf('%.2f' , this , true)" /> ct -
							<input name="weight[]" type="text" style="width:80px;text-align:center" onfocus="sprintf('%.2f' , this , true)" /> ct
						</td>
					</tr>
					<tr>
						<td colspan="4" align="right">全身比</td>
						<td colspan="6">
							<input name="body_ratio[]" type="text" style="width:80px;text-align:center" onfocus="sprintf('%.2f' , this , true)" /> % -
							<input name="body_ratio[]" type="text" style="width:80px;text-align:center" onfocus="sprintf('%.2f' , this , true)" /> %
						</td>
					</tr>
					<tr>
						<td colspan="4" align="right">台宽比</td>
						<td colspan="6">
							<input name="table_width[]" type="text" style="width:80px;text-align:center" onfocus="sprintf('%.2f' , this , true)" /> % -
							<input name="table_width[]" type="text" style="width:80px;text-align:center" onfocus="sprintf('%.2f' , this , true)" /> %
						</td>
					</tr>
					<tr><th colspan="10" align="center"><input type="submit" value=" 查 询 " /> <input type="reset" value=" 重 填 " /></th></tr>
				</table>
			</form>
		</div>
		<?php }?>
	</div>
	<b class="clear"></b>
</div>
</body>
</html>