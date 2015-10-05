<?php /* Smarty version Smarty3-b8, created on 2015-09-30 18:02:37
         compiled from "D:\www\shehuahk\wholesale/Template/cart.html" */ ?>
<?php /*%%SmartyHeaderCode:5108560bb33d6ee1e6-39837857%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4af1ec4f849b356ec0f590bfe1bb75cb782650f0' => 
    array (
      0 => 'D:\\www\\shehuahk\\wholesale/Template/cart.html',
      1 => 1443607354,
    ),
  ),
  'nocache_hash' => '5108560bb33d6ee1e6-39837857',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_write_url')) include 'D:\www\shehuahk\smarty\plugins\function.write_url.php';
if (!is_callable('smarty_function_Goto_diploma')) include 'D:\www\shehuahk\smarty\plugins\function.Goto_diploma.php';
?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>奢华</title>
<!-- <link href="css/default.css" rel="stylesheet" type="text/css" /> -->
<link href="css/kh-index.css" rel="stylesheet" type="text/css" />
<link href="css/sp.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="Js/string.js"></script>
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
	<!-- <div class="head">
		<img src="images/logo.jpg" />
		
	</div> -->
	<div class="gray search">
		<div class="Page">
			<div>
				您的购物车中共有 <b><?php echo count($_smarty_tpl->getVariable('proxy')->value['cart']);?>
</b> 颗钻石
				<a href="<?php echo smarty_function_write_url(array('open'=>'cart','action'=>'del'),$_smarty_tpl->smarty,$_smarty_tpl);?>
">清空</a>
				<a href="<?php echo smarty_function_write_url(array('open'=>'Query'),$_smarty_tpl->smarty,$_smarty_tpl);?>
">继续添加</a>
			</div>
		</div>
		<form action="<?php echo smarty_function_write_url(array('open'=>'cart','action'=>'make_orders'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" method="post">
			<table width="100%" border="0" cellspacing="0" cellpadding="0" class="SP">
				<tr class="tp">
					<th class="z"></th>
					<td>编号</td><th></th>
					<td  class="sh-1">形状</td><th  class="sh-1"></th>
					<td  class="sh-1">重量</td><th  class="sh-1"></th>
					<td class="sh-1">颜色</td><th class="sh-1"></th>
					<td class="sh-1">净度</td><th class="sh-1"></th>
					<td class="sh-1">切工</td><th class="sh-1"></th>
					<td class="sh-1">抛光</td><th class="sh-1"></th>
					<td class="sh-1">对称</td><th class="sh-1"></th>
					<td class="sh-1">荧光</td><th class="sh-1"></th>
					<td class="sh-1">测量值</td><th class="sh-1"></th>
					<td  class="sh-1">证书</td><th  class="sh-1"></th>
					<td  class="sh-1">数量</td><th  class="sh-1"></th>
					<td class="sh-1">购买量</td><th class="sh-1"></th>
					<td class="sh-1">退点%</td><th class="sh-1"></th>
 					<td >¥/每颗</td><th></th> 
					<td>详情</td><th></th>
					<td>删除</td><th class="y"></th>
				</tr>
				<tr class="x"><th colspan="35"></th></tr>
				<?php if ($_smarty_tpl->getVariable('list_cart')->value){?>
				<?php  $_smarty_tpl->tpl_vars['pso'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('list_cart')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['pso']->key => $_smarty_tpl->tpl_vars['pso']->value){
?>
				<tr align="center">
					<th class="zx"></th>
					<td><?php echo $_smarty_tpl->getVariable('pso')->value['ProID'];?>
</td><th></th>
					<td  class="sh-1"><?php echo $_smarty_tpl->getVariable('shape')->value[$_smarty_tpl->getVariable('pso')->value['shape']];?>
</td><th  class="sh-1"></th>
					<td  class="sh-1"><?php echo $_smarty_tpl->getVariable('pso')->value['weight'];?>
</td><th  class="sh-1"></th>
					<td class="sh-1"><?php echo $_smarty_tpl->getVariable('pso')->value['color'];?>
</td><th class="sh-1"></th>
					<td class="sh-1"><?php echo $_smarty_tpl->getVariable('pso')->value['clarity'];?>
</td><th class="sh-1"></th>
					<td class="sh-1"><?php echo $_smarty_tpl->getVariable('pso')->value['cut'];?>
</td><th class="sh-1"></th>
					<td class="sh-1"><?php echo $_smarty_tpl->getVariable('pso')->value['buffing'];?>
</td><th class="sh-1"></th>
					<td class="sh-1"><?php echo $_smarty_tpl->getVariable('pso')->value['symmetry'];?>
</td><th class="sh-1"></th>
					<td class="sh-1"><?php echo $_smarty_tpl->getVariable('pso')->value['Fent_Isity'];?>
</td><th class="sh-1"></th>
					<td class="sh-1"><?php echo $_smarty_tpl->getVariable('pso')->value['scalar_value'];?>
</td><th class="sh-1"></th>
					<td  class="sh-1"><?php echo smarty_function_Goto_diploma(array('diploma'=>$_smarty_tpl->getVariable('pso')->value['diploma'],'weight'=>$_smarty_tpl->getVariable('pso')->value['weight'],'NO'=>$_smarty_tpl->getVariable('pso')->value['diplomaNO'],'show'=>$_smarty_tpl->getVariable('pso')->value['diploma']),$_smarty_tpl->smarty,$_smarty_tpl);?>
</td><th  class="sh-1"></th>
					<td  class="sh-1"><?php echo $_smarty_tpl->getVariable('pso')->value['amount'];?>
</td><th  class="sh-1"></th>
					<td class="sh-1"><input type="text" name="amount[<?php echo $_smarty_tpl->getVariable('pso')->value['id'];?>
]" value="1" style="width:40px;text-align:center" onfocus="C_price(this,1,<?php echo $_smarty_tpl->getVariable('pso')->value['amount'];?>
)" /></td><th class="sh-1"></th>
					<?php if ($_smarty_tpl->getVariable('proxy')->value['is_offer']=='Y'&&$_smarty_tpl->getVariable('pso')->value['is_promotion']=='Y'&&$_smarty_tpl->getVariable('pso')->value['promotion_start']<=mktime()&&$_smarty_tpl->getVariable('pso')->value['promotion_stop']>=mktime()){?>
					<td class="sh-1"><?php echo $_smarty_tpl->getVariable('pso')->value['agio']+$_smarty_tpl->getVariable('pso')->value['baseAgio']+$_smarty_tpl->getVariable('pso')->value['promotion_dot'];?>
</td><th class="sh-1"></th>
					<td class="sh-1"><?php echo sprintf('%.2f',$_smarty_tpl->getVariable('pso')->value['INTbid']*$_smarty_tpl->getVariable('pso')->value['weight']*$_smarty_tpl->getVariable('proxy')->value['mag']*(100+$_smarty_tpl->getVariable('pso')->value['agio']+$_smarty_tpl->getVariable('pso')->value['baseAgio']+$_smarty_tpl->getVariable('pso')->value['promotion_dot'])/100);?>
</td><th class="sh-1"></th>
					<?php }else{ ?>
					<td class="sh-1"><?php echo sprintf('%.2f',$_smarty_tpl->getVariable('pso')->value['agio']+$_smarty_tpl->getVariable('pso')->value['baseAgio']+$_smarty_tpl->getVariable('proxy')->value['rebate']);?>
</td><th class="sh-1"></th>
	                                <td><?php echo sprintf('%.2f',$_smarty_tpl->getVariable('pso')->value['INTbid']*$_smarty_tpl->getVariable('pso')->value['weight']*$_smarty_tpl->getVariable('proxy')->value['mag']*(100+$_smarty_tpl->getVariable('pso')->value['agio']+$_smarty_tpl->getVariable('pso')->value['baseAgio']+$_smarty_tpl->getVariable('proxy')->value['rebate'])/100);?>
</td><th></th>
					<?php }?>
					<td><a href="javascript:;" onclick="show_detail(this,'<?php echo $_smarty_tpl->getVariable('pso')->value['id'];?>
',33)">查看</a></td><th></th>
					<td><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'del','id'=>$_smarty_tpl->getVariable('pso')->value['id']),$_smarty_tpl->smarty,$_smarty_tpl);?>
">删除</a></td>
					<th class="yx"></th>
				</tr>
				<?php }} ?>
				<tr class="x"><th colspan="35"></th></tr>
				<tr>
					<th class="zx"></th>
					<td align="right">备注：</td>
					<td colspan="32"><textarea name="remark" style="width:99%;height:120px; margin:10px 0"></textarea></td>
					<th class="yx"></th>
				</tr>
				<?php }else{ ?>
				<tr class="No_info"><th class="zx"></th><td colspan="33">当前购物车中没有产品 , <a href="<?php echo smarty_function_write_url(array('open'=>'Query'),$_smarty_tpl->smarty,$_smarty_tpl);?>
">点击添加</a></td><th class="yx"></th></tr>
				<?php }?>
				<tr class="x"><th colspan="35"></th></tr>
				<tr>
					<!-- <th class="zx"></th>
					<th colspan="33" class="Js_cars"><input type="submit" value="" /></th>
					<th class="yx"></th> -->
				</tr>
				<tr class="x"><th colspan="35"></th></tr>
			</table>
		</form>
	</div>
</div>
<script type="text/javascript" src="Js/hk.js"></script>
</body>
</html>
