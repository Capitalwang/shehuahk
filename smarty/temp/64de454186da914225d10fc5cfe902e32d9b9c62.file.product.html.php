<?php /* Smarty version Smarty3-b8, created on 2011-05-28 22:18:55
         compiled from "D:\web\vhosts\shehua.hk\backadmin/Template/product.html" */ ?>
<?php /*%%SmartyHeaderCode:296964de1044f743bd2-80036439%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '64de454186da914225d10fc5cfe902e32d9b9c62' => 
    array (
      0 => 'D:\\web\\vhosts\\shehua.hk\\backadmin/Template/product.html',
      1 => 1305853533,
    ),
  ),
  'nocache_hash' => '296964de1044f743bd2-80036439',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_write_url')) include 'D:\web\vhosts\shehua.hk\smarty\plugins\function.write_url.php';
if (!is_callable('smarty_modifier_default')) include 'D:\web\vhosts\shehua.hk\smarty\plugins\modifier.default.php';
if (!is_callable('smarty_function_CLASS_COLOR')) include 'D:\web\vhosts\shehua.hk\smarty\plugins\function.CLASS_COLOR.php';
if (!is_callable('smarty_function_brite_spot')) include 'D:\web\vhosts\shehua.hk\smarty\plugins\function.brite_spot.php';
if (!is_callable('smarty_function_Goto_diploma')) include 'D:\web\vhosts\shehua.hk\smarty\plugins\function.Goto_diploma.php';
if (!is_callable('smarty_function_math')) include 'D:\web\vhosts\shehua.hk\smarty\plugins\function.math.php';
if (!is_callable('smarty_function_selected')) include 'D:\web\vhosts\shehua.hk\smarty\plugins\function.selected.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo @Site_Name;?>
</title>
<link href="css/public.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="Js/menu.js"></script>
<script type="text/javascript" src="Js/product.js"></script>
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
			<div>
				产品状态
				<a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'status'=>'promotion'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php if ($_smarty_tpl->getVariable('get')->value['status']=='promotion'){?>class='red'<?php }?>>促销产品</a>
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
				普通查询
				<form method="get">
					<input name="open" type="hidden" value="<?php echo $_smarty_tpl->getVariable('get')->value['open'];?>
" />
					<input name="action" type="hidden" value="<?php echo $_smarty_tpl->getVariable('get')->value['action'];?>
" />
					<input name="go" type="hidden" value="query" />
					<input name='info' type="text" value="<?php echo smarty_modifier_default($_smarty_tpl->getVariable('get')->value['info'],'产品编号/证书编号/原始编号');?>
" onfocus="Pro_query(this,'产品编号/证书编号/原始编号')" />
					<input type="submit" value="查询" class="submit" />
				</form>
				<?php if ($_smarty_tpl->getVariable('get')->value['go']=='query'){?><a style="color:#093" href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'DEL'=>'go,page,ORDER,info'),$_smarty_tpl->smarty,$_smarty_tpl);?>
">返回列表</a><?php }?>
			</div>
			<ul>
			<li><a href="<?php echo smarty_function_write_url(array('open'=>$_smarty_tpl->getVariable('get')->value['open'],'action'=>'clear'),$_smarty_tpl->smarty,$_smarty_tpl);?>
">清空 炒货下架 商品</a></li>
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
</td>
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
					<?php if ($_smarty_tpl->getVariable('get')->value['go']=='query'){?>
					<tr><td colspan="19" class="else">当前没有你搜索的产品 , <a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'add','DEL'=>'ALL'),$_smarty_tpl->smarty,$_smarty_tpl);?>
">点击添加产品</a></td></tr>
					<?php }else{ ?>
					<tr><td colspan="19" class="else">当前没有产品 , <a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'add','DEL'=>'ALL'),$_smarty_tpl->smarty,$_smarty_tpl);?>
">点击添加产品</a></td></tr>
					<?php }?>
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
				<?php if ($_smarty_tpl->getVariable('BTP')->value['cart']['add']){?><input value="加入购物车" type="button" onclick="add_cart('id[]',this,'<?php echo smarty_function_write_url(array('open'=>'cart','action'=>'add'),$_smarty_tpl->smarty,$_smarty_tpl);?>
')" /><?php }?>
				<?php if ($_smarty_tpl->getVariable('BTP')->value['product_to_CSV']['add']){?><input value="导出CSV" type="button" onclick="add_cart('id[]',this,'<?php echo smarty_function_write_url(array('open'=>'product_to_CSV','action'=>'add'),$_smarty_tpl->smarty,$_smarty_tpl);?>
')" /><?php }?>
				<?php if ($_smarty_tpl->getVariable('BTP')->value['product_sms']['add']){?><input value="产品群发手机短信" type="button" onclick="add_cart('id[]',this,'<?php echo smarty_function_write_url(array('open'=>'product_sms','action'=>'add'),$_smarty_tpl->smarty,$_smarty_tpl);?>
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
					<option value="ORDER=weit_UP" <?php echo smarty_function_selected(array('val'=>$_smarty_tpl->getVariable('get')->value['ORDER'],'str'=>'weit_UP'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>按 重量 (↑) 排序</option>
					<option value="ORDER=weit_Dn" <?php echo smarty_function_selected(array('val'=>$_smarty_tpl->getVariable('get')->value['ORDER'],'str'=>'weit_Dn'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>按 重量 (↓) 排序</option>
					<option value="ORDER=time_UP" <?php echo smarty_function_selected(array('val'=>$_smarty_tpl->getVariable('get')->value['ORDER'],'str'=>'time_UP'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>按 添加日期 (↑) 排序</option>
					<option value="ORDER=time_Dn" <?php echo smarty_function_selected(array('val'=>$_smarty_tpl->getVariable('get')->value['ORDER'],'str'=>'time_Dn'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>按 添加日期 (↓) 排序</option>
				</select>
			</div>
			<?php }?>
	</div>		
	</div>
	<b class="clear"></b>
</div>
</body>
</html>