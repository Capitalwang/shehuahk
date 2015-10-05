<?php /* Smarty version Smarty3-b8, created on 2015-09-24 14:19:49
         compiled from "D:\www\shehuahk\wholesale/Template/SP.html" */ ?>
<?php /*%%SmartyHeaderCode:169355603960560faf0-50687636%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd2ff2327e4963125d686a0caacccb9c5a3227c01' => 
    array (
      0 => 'D:\\www\\shehuahk\\wholesale/Template/SP.html',
      1 => 1443075436,
    ),
  ),
  'nocache_hash' => '169355603960560faf0-50687636',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_write_url')) include 'D:\www\shehuahk\smarty\plugins\function.write_url.php';
if (!is_callable('smarty_function_CLASS_COLOR')) include 'D:\www\shehuahk\smarty\plugins\function.CLASS_COLOR.php';
if (!is_callable('smarty_function_Goto_diploma')) include 'D:\www\shehuahk\smarty\plugins\function.Goto_diploma.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<title>奢华</title>
<link href="css/kh-index.css" rel="stylesheet" type="text/css" />
<link href="css/sp.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="Js/default.js"></script>
<script src="http://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>

</head>
<body>
<header>
    <div class="box head-box">
        <img class="index-img" src="images/logo1.jpg" alt="奢华国际钻石集团"/>
        <span id="heid" style="background:url(images/anniu.png);"></span>
        <div class="head">
            <?php $_template = new Smarty_Internal_Template("nav.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

       </div>
   </div>
</header>

 <div class="Pe">

	<form action="<?php echo smarty_function_write_url(array('open'=>'cart','action'=>'add'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" method="post">
	<div class="gray">
		<ul style="height=30px; color:#dbdbdb;"><li></li></ul>
		<ul class="sp_nav">
			<li id="left" <?php echo smarty_function_CLASS_COLOR(array('03'=>$_smarty_tpl->getVariable('get')->value['weight'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
><a href="<?php echo smarty_function_write_url(array('open'=>'SP','weight'=>'03'),$_smarty_tpl->smarty,$_smarty_tpl);?>
">0.3ct</a></li>
			<li <?php echo smarty_function_CLASS_COLOR(array('04'=>$_smarty_tpl->getVariable('get')->value['weight'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
><a href="<?php echo smarty_function_write_url(array('open'=>'SP','weight'=>'04'),$_smarty_tpl->smarty,$_smarty_tpl);?>
">0.4ct</a></li>
			<li <?php echo smarty_function_CLASS_COLOR(array('05'=>$_smarty_tpl->getVariable('get')->value['weight'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
><a href="<?php echo smarty_function_write_url(array('open'=>'SP','weight'=>'05'),$_smarty_tpl->smarty,$_smarty_tpl);?>
">0.5ct</a></li>
			<li <?php echo smarty_function_CLASS_COLOR(array('06'=>$_smarty_tpl->getVariable('get')->value['weight'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
><a href="<?php echo smarty_function_write_url(array('open'=>'SP','weight'=>'06'),$_smarty_tpl->smarty,$_smarty_tpl);?>
">0.6ct</a></li>
			<li <?php echo smarty_function_CLASS_COLOR(array('07'=>$_smarty_tpl->getVariable('get')->value['weight'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
><a href="<?php echo smarty_function_write_url(array('open'=>'SP','weight'=>'07'),$_smarty_tpl->smarty,$_smarty_tpl);?>
">0.7ct</a></li>
			<li <?php echo smarty_function_CLASS_COLOR(array('08'=>$_smarty_tpl->getVariable('get')->value['weight'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
><a href="<?php echo smarty_function_write_url(array('open'=>'SP','weight'=>'08'),$_smarty_tpl->smarty,$_smarty_tpl);?>
">0.8ct</a></li>
			<li <?php echo smarty_function_CLASS_COLOR(array('09'=>$_smarty_tpl->getVariable('get')->value['weight'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
><a href="<?php echo smarty_function_write_url(array('open'=>'SP','weight'=>'09'),$_smarty_tpl->smarty,$_smarty_tpl);?>
">0.9ct</a></li>
			<li id="right" <?php echo smarty_function_CLASS_COLOR(array('010'=>$_smarty_tpl->getVariable('get')->value['weight'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
><a href="<?php echo smarty_function_write_url(array('open'=>'SP','weight'=>'010'),$_smarty_tpl->smarty,$_smarty_tpl);?>
">&gt;1.0ct</a></li>
		</ul>
		<table width="100%" border="0" cellspacing="0" cellpadding="0" class="SP" align=center>
			<tbody>
			<tr class="tp">
				<th class="z sp-h"></th><td class="sp-h">选择</td><th></th>
				<td>编号</td><th></th>
				<td class="sp-h1">形状</td><th></th>
				<td>
					<?php if ($_smarty_tpl->getVariable('get')->value['orders']=='asc'){?>
					<a href="<?php echo smarty_function_write_url(array('open'=>'SP','weight'=>$_smarty_tpl->getVariable('get')->value['weight'],'px'=>'weight','orders'=>'desc'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('weight'=>$_smarty_tpl->getVariable('get')->value['px'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>重量 ↑</a>
					<?php }else{ ?>
					<a href="<?php echo smarty_function_write_url(array('open'=>'SP','weight'=>$_smarty_tpl->getVariable('get')->value['weight'],'px'=>'weight','orders'=>'asc'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('weight'=>$_smarty_tpl->getVariable('get')->value['px'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>重量 ↓</a>
					<?php }?>
				</td><th></th>
				<td>
					<?php if ($_smarty_tpl->getVariable('get')->value['orders']=='asc'){?>
					<a href="<?php echo smarty_function_write_url(array('open'=>'SP','weight'=>$_smarty_tpl->getVariable('get')->value['weight'],'px'=>'color','orders'=>'desc'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('color'=>$_smarty_tpl->getVariable('get')->value['px'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>颜色 ↑</a>
					<?php }else{ ?>
					<a href="<?php echo smarty_function_write_url(array('open'=>'SP','weight'=>$_smarty_tpl->getVariable('get')->value['weight'],'px'=>'color','orders'=>'asc'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('color'=>$_smarty_tpl->getVariable('get')->value['px'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>颜色 ↓</a>
					<?php }?>
				</td><th></th>
				<td>
					<?php if ($_smarty_tpl->getVariable('get')->value['orders']=='asc'){?>
					<a href="<?php echo smarty_function_write_url(array('open'=>'SP','weight'=>$_smarty_tpl->getVariable('get')->value['weight'],'px'=>'clarity','orders'=>'desc'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('clarity'=>$_smarty_tpl->getVariable('get')->value['px'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>净度 ↑</a>
					<?php }else{ ?>
					<a href="<?php echo smarty_function_write_url(array('open'=>'SP','weight'=>$_smarty_tpl->getVariable('get')->value['weight'],'px'=>'clarity','orders'=>'asc'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('clarity'=>$_smarty_tpl->getVariable('get')->value['px'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>净度 ↓</a>
					<?php }?>
				</td><th></th>
				<td class="sp-h">切工</td><th class="sp-h"></th>
				<td class="sp-h">抛光</td><th class="sp-h"></th>
				<td class="sp-h">对称</td><th class="sp-h"></th>
				<td class="sp-h">荧光</td><th class="sp-h"></th>
				<td class="sp-h">测量值</td><th class="sp-h"></th>
				<td>证书</td><th></th>
				<td class="sp-h">¥/每卡</td><th class="sp-h"></th>
				<td>
					<?php if ($_smarty_tpl->getVariable('get')->value['orders']=='asc'){?>
					<a href="<?php echo smarty_function_write_url(array('open'=>'SP','weight'=>$_smarty_tpl->getVariable('get')->value['weight'],'px'=>'agio','orders'=>'desc'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('agio'=>$_smarty_tpl->getVariable('get')->value['px'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>退点% ↑</a>
					<?php }else{ ?>
					<a href="<?php echo smarty_function_write_url(array('open'=>'SP','weight'=>$_smarty_tpl->getVariable('get')->value['weight'],'px'=>'agio','orders'=>'asc'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('agio'=>$_smarty_tpl->getVariable('get')->value['px'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>退点% ↓</a>
					<?php }?>
				</td><th></th>
				<td>¥/每颗</td><th></th>
				<td>详情</td><th class="y"></th>
			</tr>
			<tr class="x"><th colspan="33"></th></tr>
			<?php if ($_smarty_tpl->getVariable('get')->value['weight']){?>
			<?php if ($_smarty_tpl->getVariable('list_text')->value){?>
			<?php  $_smarty_tpl->tpl_vars['pso'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('list_text')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['pso']->key => $_smarty_tpl->tpl_vars['pso']->value){
?>
			<tr align="center">
				<th class="zx sp-h"></th>
				<td class="sp-h"><input type="checkbox" name="id[]" value="<?php echo $_smarty_tpl->getVariable('pso')->value['id'];?>
" /></td><th></th>
				<td align="left"><?php echo $_smarty_tpl->getVariable('pso')->value['ProID'];?>
</td><th></th>
				<td  class="sp-h1"><?php echo $_smarty_tpl->getVariable('shape')->value[$_smarty_tpl->getVariable('pso')->value['shape']];?>
</td><th></th>
				<td><?php echo $_smarty_tpl->getVariable('pso')->value['weight'];?>
</td><th></th>
				<td><?php echo $_smarty_tpl->getVariable('pso')->value['color'];?>
</td><th></th>
				<td><?php echo $_smarty_tpl->getVariable('pso')->value['clarity'];?>
</td><th></th>
				<td class="sp-h"><?php echo $_smarty_tpl->getVariable('pso')->value['cut'];?>
</td><th class="sp-h"></th>
				<td class="sp-h"><?php echo $_smarty_tpl->getVariable('pso')->value['buffing'];?>
</td><th class="sp-h"></th>
				<td class="sp-h"><?php echo $_smarty_tpl->getVariable('pso')->value['symmetry'];?>
</td><th class="sp-h"></th>
				<td class="sp-h"><?php echo $_smarty_tpl->getVariable('pso')->value['Fent_Isity'];?>
</td><th class="sp-h"></th>
				<td class="sp-h"><?php echo $_smarty_tpl->getVariable('pso')->value['scalar_value'];?>
</td><th class="sp-h"></th>
				<td ><?php echo smarty_function_Goto_diploma(array('diploma'=>$_smarty_tpl->getVariable('pso')->value['diploma'],'weight'=>$_smarty_tpl->getVariable('pso')->value['weight'],'NO'=>$_smarty_tpl->getVariable('pso')->value['diplomaNO'],'show'=>$_smarty_tpl->getVariable('pso')->value['diploma']),$_smarty_tpl->smarty,$_smarty_tpl);?>
</td><th ></th>
				<td class="sp-h"><?php echo sprintf('%.2f',$_smarty_tpl->getVariable('pso')->value['INTbid']*(100+$_smarty_tpl->getVariable('pso')->value['agio'])/100);?>
</td><th class="sp-h"></th>
				<td><?php echo $_smarty_tpl->getVariable('pso')->value['agio'];?>
</td><th></th>
				<td><?php echo sprintf('%.2f',$_smarty_tpl->getVariable('pso')->value['INTbid']*$_smarty_tpl->getVariable('pso')->value['weight']*(100+$_smarty_tpl->getVariable('pso')->value['agio'])/100);?>
</td><th></th>
				<th><a href="javascript:;" onclick="show_detail(this,'<?php echo $_smarty_tpl->getVariable('pso')->value['id'];?>
',31)"></a></th>
				<th class="yx"></th>
			</tr>
			<?php }} ?>
			<?php }else{ ?>
			<tr class="No_info"><th class="zx"></th><td colspan="31"><?php echo sprintf('%.1f',$_smarty_tpl->getVariable('get')->value['weight']/10);?>
 ct 系列 今日没有特价</td><th class="yx"></th></tr>
			<?php }?>
			<?php }else{ ?>
			<?php if ($_smarty_tpl->getVariable('list_text')->value){?>
			<?php  $_smarty_tpl->tpl_vars['pso'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('list_text')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['pso']->key => $_smarty_tpl->tpl_vars['pso']->value){
?>
			<tr align="center">
				<th class="zx sp-h"></th>
				<td class="sp-h"><input type="checkbox" name="id[]" value="<?php echo $_smarty_tpl->getVariable('pso')->value['id'];?>
" /></td><th></th>
				<td align="left"><?php echo $_smarty_tpl->getVariable('pso')->value['ProID'];?>
</td><th></th>
				<td class="sp-h1"><?php echo $_smarty_tpl->getVariable('shape')->value[$_smarty_tpl->getVariable('pso')->value['shape']];?>
</td><th></th>
				<td><?php echo $_smarty_tpl->getVariable('pso')->value['weight'];?>
</td><th></th>
				<td><?php echo $_smarty_tpl->getVariable('pso')->value['color'];?>
</td><th></th>
				<td><?php echo $_smarty_tpl->getVariable('pso')->value['clarity'];?>
</td><th></th>
				<td class="sp-h"><?php echo $_smarty_tpl->getVariable('pso')->value['cut'];?>
</td><th class="sp-h"></th>
				<td class="sp-h"><?php echo $_smarty_tpl->getVariable('pso')->value['buffing'];?>
</td><th class="sp-h"></th>
				<td class="sp-h"><?php echo $_smarty_tpl->getVariable('pso')->value['symmetry'];?>
</td><th class="sp-h"></th>
				<td class="sp-h"><?php echo $_smarty_tpl->getVariable('pso')->value['Fent_Isity'];?>
</td><th class="sp-h"></th>
				<td class="sp-h"><?php echo $_smarty_tpl->getVariable('pso')->value['scalar_value'];?>
</td><th class="sp-h"></th>
				<td><?php echo smarty_function_Goto_diploma(array('diploma'=>$_smarty_tpl->getVariable('pso')->value['diploma'],'weight'=>$_smarty_tpl->getVariable('pso')->value['weight'],'NO'=>$_smarty_tpl->getVariable('pso')->value['diplomaNO'],'show'=>$_smarty_tpl->getVariable('pso')->value['diploma']),$_smarty_tpl->smarty,$_smarty_tpl);?>
</td><th></th>
				<td class="sp-h"><?php echo sprintf('%.2f',$_smarty_tpl->getVariable('pso')->value['INTbid']*(100+$_smarty_tpl->getVariable('pso')->value['agio'])/100);?>
</td><th class="sp-h"></th>
				<td><?php echo $_smarty_tpl->getVariable('pso')->value['agio'];?>
</td><th></th>
				<td><?php echo sprintf('%.2f',$_smarty_tpl->getVariable('pso')->value['INTbid']*$_smarty_tpl->getVariable('pso')->value['weight']*(100+$_smarty_tpl->getVariable('pso')->value['agio'])/100);?>
</td><th></th>
				<th><a href="javascript:;" onclick="show_detail(this,'<?php echo $_smarty_tpl->getVariable('pso')->value['id'];?>
',31)"></a></th>
				<th class="yx"></th>
			</tr>
			<?php }} ?>
			<?php }else{ ?>
			<tr class="No_info"><th class="zx"></th><td colspan="31">今日没有特价</td><th class="yx"></th></tr>
			<?php }?>
			<?php }?>
			<tr class="x"><th colspan="33"></th></tr>
			</tbody>
		</table>
		<?php if ($_smarty_tpl->getVariable('list_text')->value){?>
		<div class="Page">
			<!-- <input type="submit" value="" /> -->
			<ul>
				<li><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'page'=>$_smarty_tpl->getVariable('list_page')->value['up']),$_smarty_tpl->smarty,$_smarty_tpl);?>
">上一页</a></li>
				<?php  $_smarty_tpl->tpl_vars['Npc'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('list_page')->value['PageCode']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['Npc']->key => $_smarty_tpl->tpl_vars['Npc']->value){
?><li><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'page'=>$_smarty_tpl->getVariable('Npc')->value),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php if ($_smarty_tpl->getVariable('Npc')->value==$_smarty_tpl->getVariable('get')->value['page']){?>class="this"<?php }?>><?php echo $_smarty_tpl->getVariable('Npc')->value;?>
</a></li><?php }} ?>
				<li><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'page'=>$_smarty_tpl->getVariable('list_page')->value['down']),$_smarty_tpl->smarty,$_smarty_tpl);?>
">下一页</a></li>
			</ul>
			<i class="clear"></i>
		</div>
		<?php }?>
	</div>
	</form>
</div> 



<footer>
    <?php $_template = new Smarty_Internal_Template("foot.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
   
</footer>
<script type="text/javascript" src="Js/hk.js"></script>
</body>
</html>
