<?php /* Smarty version Smarty3-b8, created on 2015-07-23 11:30:31
         compiled from "D:\WWW\shehua_hk\backadmin/Template/product_append.html" */ ?>
<?php /*%%SmartyHeaderCode:2453455b05fd7999652-80871541%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5b7c6ad20de7d3d62e79d2ab86326a609c141438' => 
    array (
      0 => 'D:\\WWW\\shehua_hk\\backadmin/Template/product_append.html',
      1 => 1437359489,
    ),
  ),
  'nocache_hash' => '2453455b05fd7999652-80871541',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_write_url')) include 'D:\WWW\shehua_hk\smarty\plugins\function.write_url.php';
if (!is_callable('smarty_function_CLASS_COLOR')) include 'D:\WWW\shehua_hk\smarty\plugins\function.CLASS_COLOR.php';
if (!is_callable('smarty_function_selected')) include 'D:\WWW\shehua_hk\smarty\plugins\function.selected.php';
if (!is_callable('smarty_modifier_default')) include 'D:\WWW\shehua_hk\smarty\plugins\modifier.default.php';
if (!is_callable('smarty_function_checked')) include 'D:\WWW\shehua_hk\smarty\plugins\function.checked.php';
if (!is_callable('smarty_modifier_date_format')) include 'D:\WWW\shehua_hk\smarty\plugins\modifier.date_format.php';
if (!is_callable('smarty_function_br_to_null')) include 'D:\WWW\shehua_hk\smarty\plugins\function.br_to_null.php';
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
		<div class="append">
			<form action="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'go'=>'append'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" method="post" enctype="multipart/form-data">
				<table width="100%" border="0" cellspacing="1" cellpadding="0" id="tab_show">
					<tr><th colspan="2"><?php if ($_smarty_tpl->getVariable('get')->value['action']!='edit'){?>添加产品<?php }else{ ?>编辑产品<?php }?></th></tr>
					<tr>
						<td align="right" class="Need">编号</td>
						<td>
						<?php if ($_smarty_tpl->getVariable('get')->value['action']=='add'){?>
							<input type="text" name="ProID" value="<?php echo $_smarty_tpl->getVariable('edit')->value['ProID'];?>
" style="width:30%" />
							<label for="to_NO" style="margin:0 1em"><input type="checkbox" name="to_NO" id="to_NO" value="auto" onclick="sto_NO(this)" />系统生成</label>
							<input type="button" class="Find" value="检测" onclick="check_NO(this)" />
							<span class="Hint">注：编号具有唯一性,不能重复</span>
						<?php }else{ ?><?php echo $_smarty_tpl->getVariable('edit')->value['ProID'];?>
<?php }?>
						</td>
					</tr>
					<tr>
						<td align="right" width="30%">原编号</td>
						<td><input type="text" name="previousNO" value="<?php echo $_smarty_tpl->getVariable('edit')->value['previousNO'];?>
" style="width:250px" /></td>
					</tr>
					<tr>
						<td align="right" class='Need'>状态</td>
						<td>
							<select name="status">
								<option value="0">请选择产品状态</option>
								<?php  $_smarty_tpl->tpl_vars['ts'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['sy'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('status')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['ts']->key => $_smarty_tpl->tpl_vars['ts']->value){
 $_smarty_tpl->tpl_vars['sy']->value = $_smarty_tpl->tpl_vars['ts']->key;
?><option value="<?php echo $_smarty_tpl->getVariable('sy')->value;?>
" <?php echo smarty_function_selected(array('val'=>$_smarty_tpl->getVariable('edit')->value['status'],'str'=>$_smarty_tpl->getVariable('sy')->value),$_smarty_tpl->smarty,$_smarty_tpl);?>
><?php echo $_smarty_tpl->getVariable('ts')->value;?>
</option><?php }} ?>
							</select>
						</td>
					</tr>
					<tr>
						<td align="right" class="Need">形状</td>
						<td>
							<select name="shape">
								<option value="0">请选择产品形状</option>
								<?php  $_smarty_tpl->tpl_vars['ts'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['sy'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('shape')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['ts']->key => $_smarty_tpl->tpl_vars['ts']->value){
 $_smarty_tpl->tpl_vars['sy']->value = $_smarty_tpl->tpl_vars['ts']->key;
?><option value="<?php echo $_smarty_tpl->getVariable('sy')->value;?>
" <?php echo smarty_function_selected(array('val'=>$_smarty_tpl->getVariable('edit')->value['shape'],'str'=>$_smarty_tpl->getVariable('sy')->value),$_smarty_tpl->smarty,$_smarty_tpl);?>
><?php echo $_smarty_tpl->getVariable('ts')->value;?>
</option><?php }} ?>
							</select>
						</td>
					</tr>
					<tr>
						<td align="right" class="Need">重量</td>
						<td><input type="text" name="weight" id="weight" value="<?php echo smarty_modifier_default($_smarty_tpl->getVariable('edit')->value['weight'],0);?>
" style="width:80px;text-align:center" onfocus="sprintf('%.2f' , this , true)" onchange="get_bid('INTbid');get_agio('agio')" /> ct</td>
					</tr>
					<tr>
						<td align="right" class="Need">颜色</td>
						<td>
							<select name="color" id="color" onchange="get_bid('INTbid')">
								<option value="0">请选择产品颜色</option>
								<?php  $_smarty_tpl->tpl_vars['ts'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('color')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['ts']->key => $_smarty_tpl->tpl_vars['ts']->value){
?><option value="<?php echo $_smarty_tpl->getVariable('ts')->value;?>
" <?php echo smarty_function_selected(array('val'=>$_smarty_tpl->getVariable('edit')->value['color'],'str'=>$_smarty_tpl->getVariable('ts')->value),$_smarty_tpl->smarty,$_smarty_tpl);?>
><?php echo $_smarty_tpl->getVariable('ts')->value;?>
</option><?php }} ?>
							</select>
						</td>
					</tr>
					<tr>
						<td align="right" class="Need">净度</td>
						<td class="block_CHECK">
							<select name="clarity" id="clarity" onchange="get_bid('INTbid')">
								<option value="0">请选择产品净度</option>
								<?php  $_smarty_tpl->tpl_vars['ts'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('clarity')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['ts']->key => $_smarty_tpl->tpl_vars['ts']->value){
?><option value="<?php echo $_smarty_tpl->getVariable('ts')->value;?>
" <?php echo smarty_function_selected(array('val'=>$_smarty_tpl->getVariable('edit')->value['clarity'],'str'=>$_smarty_tpl->getVariable('ts')->value),$_smarty_tpl->smarty,$_smarty_tpl);?>
><?php echo $_smarty_tpl->getVariable('ts')->value;?>
</option><?php }} ?>
							</select>
						</td>
					</tr>
					<tr>
						<td align="right" class="Need">切工</td>
						<td>
							<select name="cut">
								<option value="0">请选择产品切工</option>
								<?php  $_smarty_tpl->tpl_vars['ts'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('cut')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['ts']->key => $_smarty_tpl->tpl_vars['ts']->value){
?><option value="<?php echo $_smarty_tpl->getVariable('ts')->value;?>
" <?php echo smarty_function_selected(array('val'=>$_smarty_tpl->getVariable('edit')->value['cut'],'str'=>$_smarty_tpl->getVariable('ts')->value),$_smarty_tpl->smarty,$_smarty_tpl);?>
><?php echo $_smarty_tpl->getVariable('ts')->value;?>
</option><?php }} ?>
							</select>
						</td>
					</tr>
					<tr>
						<td align="right" class="Need">抛光</td>
						<td>
							<select name="buffing">
								<option value="0">请选择产品抛光</option>
								<?php  $_smarty_tpl->tpl_vars['ts'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('cut')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['ts']->key => $_smarty_tpl->tpl_vars['ts']->value){
?><option value="<?php echo $_smarty_tpl->getVariable('ts')->value;?>
" <?php echo smarty_function_selected(array('val'=>$_smarty_tpl->getVariable('edit')->value['buffing'],'str'=>$_smarty_tpl->getVariable('ts')->value),$_smarty_tpl->smarty,$_smarty_tpl);?>
><?php echo $_smarty_tpl->getVariable('ts')->value;?>
</option><?php }} ?>
							</select>
						</td>
					</tr>
					<tr>
						<td align="right" class="Need">对称</td>
						<td>
							<select name="symmetry">
								<option value="0">请选择产品对称</option>
								<?php  $_smarty_tpl->tpl_vars['ts'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('cut')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['ts']->key => $_smarty_tpl->tpl_vars['ts']->value){
?><option value="<?php echo $_smarty_tpl->getVariable('ts')->value;?>
" <?php echo smarty_function_selected(array('val'=>$_smarty_tpl->getVariable('edit')->value['symmetry'],'str'=>$_smarty_tpl->getVariable('ts')->value),$_smarty_tpl->smarty,$_smarty_tpl);?>
><?php echo $_smarty_tpl->getVariable('ts')->value;?>
</option><?php }} ?>
							</select>
						</td>
					</tr>
					<tr>
						<td align="right" class="Need">荧光强度</td>
						<td>
							<select name="Fent_Isity">
								<option value="0">请选择产品荧光强度</option>
								<?php  $_smarty_tpl->tpl_vars['ts'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('Fent_Isity')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['ts']->key => $_smarty_tpl->tpl_vars['ts']->value){
?><option value="<?php echo $_smarty_tpl->getVariable('ts')->value;?>
" <?php echo smarty_function_selected(array('val'=>$_smarty_tpl->getVariable('edit')->value['Fent_Isity'],'str'=>$_smarty_tpl->getVariable('ts')->value),$_smarty_tpl->smarty,$_smarty_tpl);?>
><?php echo $_smarty_tpl->getVariable('ts')->value;?>
</option><?php }} ?>
							</select>
						</td>
					</tr>
					<tr>
						<td align="right">荧光颜色</td>
						<td>
							<select name="Fent_color">
								<option value="0">请选择产品荧光颜色</option>
								<?php  $_smarty_tpl->tpl_vars['ts'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('Fent_color')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['ts']->key => $_smarty_tpl->tpl_vars['ts']->value){
?><option value="<?php echo $_smarty_tpl->getVariable('ts')->value;?>
" <?php echo smarty_function_selected(array('val'=>$_smarty_tpl->getVariable('edit')->value['Fent_color'],'str'=>$_smarty_tpl->getVariable('ts')->value),$_smarty_tpl->smarty,$_smarty_tpl);?>
><?php echo $_smarty_tpl->getVariable('ts')->value;?>
</option><?php }} ?>
							</select>
						</td>
					</tr>
					<tr>
						<td align="right">国家</td>
						<td>
							<select name="country">
								<option value="0">请选择国家</option>
								<?php  $_smarty_tpl->tpl_vars['ts'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['sy'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('country')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['ts']->key => $_smarty_tpl->tpl_vars['ts']->value){
 $_smarty_tpl->tpl_vars['sy']->value = $_smarty_tpl->tpl_vars['ts']->key;
?><option value="<?php echo $_smarty_tpl->getVariable('sy')->value;?>
" <?php echo smarty_function_selected(array('val'=>$_smarty_tpl->getVariable('edit')->value['country'],'str'=>$_smarty_tpl->getVariable('sy')->value),$_smarty_tpl->smarty,$_smarty_tpl);?>
><?php echo $_smarty_tpl->getVariable('ts')->value;?>
</option><?php }} ?>
							</select>
						</td>
					</tr>
					<tr>
						<td align="right" class="Need">证书类型</td>
						<td>
							<select name="diploma" onchange="to_check_Dip()">
								<option value="0">请选择产品证书类型</option>
								<?php  $_smarty_tpl->tpl_vars['ts'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('diploma')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['ts']->key => $_smarty_tpl->tpl_vars['ts']->value){
?><option value="<?php echo $_smarty_tpl->getVariable('ts')->value;?>
" <?php echo smarty_function_selected(array('val'=>$_smarty_tpl->getVariable('edit')->value['diploma'],'str'=>$_smarty_tpl->getVariable('ts')->value),$_smarty_tpl->smarty,$_smarty_tpl);?>
><?php echo $_smarty_tpl->getVariable('ts')->value;?>
</option><?php }} ?>
							</select>
						</td>
					</tr>
					<tr>
						<td align="right">证书编号</td>
						<td>
							<input type="text" name="diplomaNO" onchange="to_check_Dip()" value="<?php echo $_smarty_tpl->getVariable('edit')->value['diplomaNO'];?>
" style="width:250px" />
							<span id="autos" style="display:<?php if ($_smarty_tpl->getVariable('edit')->value['diploma']!='GIA'){?>none<?php }?>"><a href="Javascript:;" onclick="auto_tab(this)">自动填表</a><b></b></span>
						</td>
					</tr>
					<tr>
						<td align="right">证书图像</td>
						<td>
							<input type="file" name="diplomaPhoto" size="40" style="width:300px;height:23px" />
							<?php if ($_smarty_tpl->getVariable('edit')->value['diplomaPhoto']){?><span class="Hint"><b>不选择文件表示不改变原来的文件</b></span><?php }?>
							<div class="Hint">注：当前支持的文件大小为5M,文件类型 图片:jpg , gif , bmp , png</div>
						</td>
					</tr>
					<tr>
						<td align="right" class="Need">产品来源</td>
						<td>
							<select name="proSource" onchange="show_proSource(this , 'tab_show' , 'seller');">
								<option value="0">请选择产品来源</option>
								<?php  $_smarty_tpl->tpl_vars['ts'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['sy'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('proSource')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['ts']->key => $_smarty_tpl->tpl_vars['ts']->value){
 $_smarty_tpl->tpl_vars['sy']->value = $_smarty_tpl->tpl_vars['ts']->key;
?><option value="<?php echo $_smarty_tpl->getVariable('sy')->value;?>
" <?php echo smarty_function_selected(array('val'=>$_smarty_tpl->getVariable('edit')->value['proSource'],'str'=>$_smarty_tpl->getVariable('sy')->value),$_smarty_tpl->smarty,$_smarty_tpl);?>
><?php echo $_smarty_tpl->getVariable('ts')->value;?>
</option><?php }} ?>
							</select>
						</td>
					</tr>
					<tr class="seller" style="<?php if ($_smarty_tpl->getVariable('edit')->value['proSource']&&$_smarty_tpl->getVariable('edit')->value['proSource']!='self'){?>display:table-row<?php }?>">
						<td align="right" class="Need">商家ID</td>
						<td><input type="text" name="sellerID" value="<?php echo $_smarty_tpl->getVariable('edit')->value['sellerID'];?>
" style="width:250px" /></td>
					</tr>
					<tr class="seller" style="<?php if ($_smarty_tpl->getVariable('edit')->value['proSource']){?>display:table-row<?php }?>">
						<td align="right" class="Need">库存地点</td>
						<td id="Address">
							<input type="text" name="stockAddress_String" value="<?php echo $_smarty_tpl->getVariable('edit')->value['stockAddress'];?>
" style="width:60%;display:<?php if ($_smarty_tpl->getVariable('edit')->value['proSource']&&$_smarty_tpl->getVariable('edit')->value['proSource']!='self'){?>block<?php }else{ ?>none<?php }?>" />
							
							<select name="stockAddress_Select" style="display:<?php if ($_smarty_tpl->getVariable('edit')->value['proSource']&&$_smarty_tpl->getVariable('edit')->value['proSource']=='self'){?>block<?php }else{ ?>none<?php }?>">
								<option value="0">请选择库存地点</option>
								<?php  $_smarty_tpl->tpl_vars['ts'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('stockAddress')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['ts']->key => $_smarty_tpl->tpl_vars['ts']->value){
?><option value="<?php echo $_smarty_tpl->getVariable('ts')->value['address'];?>
" <?php echo smarty_function_selected(array('val'=>$_smarty_tpl->getVariable('edit')->value['stockAddress'],'str'=>$_smarty_tpl->getVariable('ts')->value['address']),$_smarty_tpl->smarty,$_smarty_tpl);?>
><?php echo $_smarty_tpl->getVariable('ts')->value['address'];?>
</option><?php }} ?>
							</select>
						</td>
					</tr>
					<tr>
						<td align="right">测量值</td>
						<td><input type="text" name="scalar_value" value="<?php echo $_smarty_tpl->getVariable('edit')->value['scalar_value'];?>
" style="width:150px;" /></td>
					</tr>
					<tr>
						<td align="right">全身比</td>
						<td><input type="text" name="body_ratio" value="<?php echo $_smarty_tpl->getVariable('edit')->value['body_ratio'];?>
" style="width:80px;text-align:center" onfocus="sprintf('%.2f' , this , true)" /> %</td>
					</tr>
					<tr>
						<td align="right">台宽比</td>
						<td><input type="text" name="table_width" value="<?php echo $_smarty_tpl->getVariable('edit')->value['table_width'];?>
" style="width:80px;text-align:center" onfocus="sprintf('%.2f' , this , true)" /> %</td>
					</tr>
					<tr>
						<td align="right" class="Need">进货价</td>
						<td><input type="text" name="infml" id="infml" value="<?php echo smarty_modifier_default($_smarty_tpl->getVariable('edit')->value['infml'],0);?>
" style="width:80px;text-align:center" onfocus="sprintf('%.2f' , this );" onpropertychange="get_agio('agio')" onchange="get_agio('agio')" /> 元</td>
					</tr>
					<tr>
						<td align="right" class="Need">数量</td>
						<td><input type="text" name="amount" value="<?php echo smarty_modifier_default($_smarty_tpl->getVariable('edit')->value['amount'],1);?>
" style="width:80px;text-align:center" onfocus="sprintf('%d' , this)" /></td>
					</tr>
					<tr>
						<td align="right" class="Need">国际报价</td>
						<td><span id="INTbid">人民币 <?php echo smarty_modifier_default($_smarty_tpl->getVariable('edit')->value['INTbid'],0);?>
 / ct</span><input id="INTbid_value" type="hidden" value="<?php echo smarty_modifier_default($_smarty_tpl->getVariable('edit')->value['INTbid'],0);?>
" /></td>
					</tr>
					<tr>
						<td align="right" class="Need">退点</td>
						<td><span id="agio"><?php echo smarty_modifier_default($_smarty_tpl->getVariable('edit')->value['agio'],0);?>
</span> %</td>
					</tr>
					<tr>
						<td align="right" class="Need">基准退点</td>
						<td><input type="text" name="baseAgio" value="<?php echo smarty_modifier_default($_smarty_tpl->getVariable('edit')->value['baseAgio'],0);?>
" style="width:80px;text-align:center" onfocus="sprintf('%.2f' , this , true)" /> %</td>
					</tr>
					<tr>
						<td align="right" class="Need">促销</td>
						<td class="promotion">
							<input name="is_promotion" type="radio" value="Y" <?php echo smarty_function_checked(array('val'=>$_smarty_tpl->getVariable('edit')->value['is_promotion'],'str'=>'Y'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 onclick="click_promotion(this)" /> 是
							<input name="is_promotion" type="radio" value="N" <?php if ($_smarty_tpl->getVariable('get')->value['action']=='add'){?>checked="checked"<?php }else{ ?><?php echo smarty_function_checked(array('val'=>$_smarty_tpl->getVariable('edit')->value['is_promotion'],'str'=>'N'),$_smarty_tpl->smarty,$_smarty_tpl);?>
<?php }?> onclick="click_promotion(this)" /> 否
							<ul style="display:<?php if ($_smarty_tpl->getVariable('edit')->value['is_promotion']=='Y'){?>block<?php }else{ ?>none<?php }?>">
								<li>
									开始时间 <input name='promotion_start' type="text" class="FM_date" onclick="Calendar(this)" value="<?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('edit')->value['promotion_start'],'%Y-%m-%d');?>
" readonly />
									<a href="javascript:;" class="DELDAY" onclick="DELDAY('promotion_start');">删除</a>
								</li>
								<li>
									结束时间 <input name='promotion_stop' type="text" class="FM_date" onclick="Calendar(this)" value="<?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('edit')->value['promotion_stop'],'%Y-%m-%d');?>
" readonly />
									<a href="javascript:;" class="DELDAY" onclick="DELDAY('promotion_stop');">删除</a>
								</li>
								<li>促销点 <input type="text" name="promotion_dot" value="<?php echo $_smarty_tpl->getVariable('edit')->value['promotion_dot'];?>
" style="width:40px;text-align:center; margin:0 0 0 1em" maxlength="5" onfocus="sprintf('%.2f' , this , true)" /> %</li>
							</ul>
						</td>
					</tr>
					<tr>
						<td align="right">外部备注</td>
						<td><textarea name="userRemark" style="width:95%;height:120px"><?php echo smarty_function_br_to_null(array('str'=>$_smarty_tpl->getVariable('edit')->value['userRemark']),$_smarty_tpl->smarty,$_smarty_tpl);?>
</textarea></td>
					</tr>
					<tr>
						<td align="right">内部备注</td>
						<td><textarea name="backRemark" style="width:95%;height:120px"><?php echo smarty_function_br_to_null(array('str'=>$_smarty_tpl->getVariable('edit')->value['backRemark']),$_smarty_tpl->smarty,$_smarty_tpl);?>
</textarea></td>
					</tr>
					<tr><th colspan="2" align="center"><input type="submit" value=" 提 交 " /> <input type="reset" value=" 重 填 " /></th></tr>
				</table>
			</form>
		</div>
	</div>
	<b class="clear"></b>
</div>
</body>
</html>