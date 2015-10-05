<?php /* Smarty version Smarty3-b8, created on 2015-07-20 11:50:07
         compiled from "D:\WWW\shehua_hk\backadmin/Template/cart.html" */ ?>
<?php /*%%SmartyHeaderCode:1113355ac6fefc17025-37425147%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9d528f5529be09ce4926b38a4a833176aea86620' => 
    array (
      0 => 'D:\\WWW\\shehua_hk\\backadmin/Template/cart.html',
      1 => 1437359489,
    ),
  ),
  'nocache_hash' => '1113355ac6fefc17025-37425147',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_write_url')) include 'D:\WWW\shehua_hk\smarty\plugins\function.write_url.php';
if (!is_callable('smarty_function_CLASS_COLOR')) include 'D:\WWW\shehua_hk\smarty\plugins\function.CLASS_COLOR.php';
if (!is_callable('smarty_function_brite_spot')) include 'D:\WWW\shehua_hk\smarty\plugins\function.brite_spot.php';
if (!is_callable('smarty_function_Goto_diploma')) include 'D:\WWW\shehua_hk\smarty\plugins\function.Goto_diploma.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo @Site_Name;?>
</title>
<link href="css/public.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="Js/string.js"></script>
<script type="text/javascript" src="Js/menu.js"></script>
<script type="text/javascript" src="Js/cart.js"></script>
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
			<ul>
			<?php if ($_smarty_tpl->getVariable('BTP')->value['product']['show']){?><li><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'open'=>'product','DEL'=>'ALL'),$_smarty_tpl->smarty,$_smarty_tpl);?>
">继续添加产品</a></li><?php }?>
			<?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['del']){?><li><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'del','DEL'=>'ALL'),$_smarty_tpl->smarty,$_smarty_tpl);?>
">清空购物车</a></li><?php }?>
			<?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['show']){?><li><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'show','DEL'=>'ALL'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('show'=>$_smarty_tpl->getVariable('get')->value['action'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>购物车</a></li><?php }?>
			</ul>
			<span class="clear"></span>
		</div>
		<?php if ($_smarty_tpl->getVariable('get')->value['action']=='orders_info'){?>
		<div class="append">
			<form action="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'make_orders'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" method="post">
			<table width="100%" border="0" cellspacing="1" cellpadding="0">
				<tr><th colspan="2">填写订单</th>	</tr>
				<tr>
					<td width="35%" align="right">代理身份</td>
					<td>
						<input type="hidden" name="proxy_id" value="<?php echo $_smarty_tpl->getVariable('post')->value['proxy_id'];?>
" />
						<input type="hidden" name="proxy_value" value="<?php echo $_smarty_tpl->getVariable('post')->value['proxy_value'];?>
" />
						<?php echo $_smarty_tpl->getVariable('post')->value['proxy_value'];?>

					</td>
				</tr>
				<tr>
					<td align="right">业务</td>
					<td>
						<input type="hidden" name="salesman_id" value="<?php echo $_smarty_tpl->getVariable('post')->value['salesman_id'];?>
" />
						<input type="hidden" name="salesman_write" value="<?php echo $_smarty_tpl->getVariable('post')->value['salesman_write'];?>
" />
						<?php echo $_smarty_tpl->getVariable('post')->value['salesman_write'];?>

					</td>
				</tr>
				<tr>
					<td align="right">客服</td>
					<td>
						<input type="hidden" name="service_id" value="<?php echo $_smarty_tpl->getVariable('post')->value['service_id'];?>
" />
						<input type="hidden" name="service_write" value="<?php echo $_smarty_tpl->getVariable('post')->value['service_write'];?>
" />
						<?php echo $_smarty_tpl->getVariable('post')->value['service_write'];?>

					</td>
				</tr>
				<tr>
					<td align="right">代理退点</td>
					<td><?php echo $_smarty_tpl->getVariable('post')->value['rebate'];?>
<input type="hidden" id="rebate" name="rebate" value="<?php echo $_smarty_tpl->getVariable('post')->value['rebate'];?>
" /></td>
				</tr>
				<tr>
					<td align="right">代理组</td>
					<td><?php echo $_smarty_tpl->getVariable('post')->value['group'];?>
<input type="hidden" id="group" name="group" value="<?php echo $_smarty_tpl->getVariable('post')->value['group'];?>
" /></td>
				</tr>
				<tr>
					<td align="right">促销价</td>
					<td><?php if ($_smarty_tpl->getVariable('post')->value['is_offer']=='Y'){?>支持<?php }else{ ?>不支持<?php }?><input type="hidden" id="is_offer" name="is_offer" value="<?php echo $_smarty_tpl->getVariable('post')->value['is_offer'];?>
" /></td>
				</tr>
				<tr>
					<td align="right">总原价</td>
					<td><b id="Z_price" style="color:#03F"><?php echo $_smarty_tpl->getVariable('price')->value;?>
</b></td>
				</tr>
				<tr>
					<td align="right">总售价</td>
					<td><b id="S_price" style="color:#090"><?php echo $_smarty_tpl->getVariable('price')->value;?>
</b></td>
				</tr>
				<tr>
					<td align="right">备注</td>
					<td><?php echo $_smarty_tpl->getVariable('post')->value['remark'];?>
<input type="hidden" name="remark" value="<?php echo $_smarty_tpl->getVariable('post')->value['remark'];?>
" /></td>
				</tr>
				<tr class="">
					<td colspan="2">
					<table width="100%" border="0" cellspacing="1" cellpadding="0" id="tab_show">
						<tr>
							<th>编号</th>
							<th>形状</th>
							<th>重量</th>
							<th>颜色</th>
							<th>净度</th>
							<th>荧光</th>
							<th>证书</th>
							<th>国际报价</th>
							<th>退点</th>
							<th>基准退点</th>
							<th>原售价</th>
							<th>数量</th>
							<th>购买量</th>
							<th>售价 / 颗</th>
						</tr>
						<?php  $_smarty_tpl->tpl_vars['pso'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('list_cart')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['pso']->key => $_smarty_tpl->tpl_vars['pso']->value){
?>
						<tr align="center">
							<td><?php echo smarty_function_brite_spot(array('query'=>$_smarty_tpl->getVariable('get')->value['info'],'str'=>$_smarty_tpl->getVariable('pso')->value['ProID']),$_smarty_tpl->smarty,$_smarty_tpl);?>
</td>
							<td><?php echo $_smarty_tpl->getVariable('shape')->value[$_smarty_tpl->getVariable('pso')->value['shape']];?>
</td>
							<td><?php echo $_smarty_tpl->getVariable('pso')->value['weight'];?>
 / ct</td>
							<td><?php echo $_smarty_tpl->getVariable('pso')->value['color'];?>
</td>
							<td><?php echo $_smarty_tpl->getVariable('pso')->value['clarity'];?>
</td>
							<td><?php echo $_smarty_tpl->getVariable('pso')->value['Fent_Isity'];?>
</td>
							<td><?php echo smarty_function_Goto_diploma(array('diploma'=>$_smarty_tpl->getVariable('pso')->value['diploma'],'weight'=>$_smarty_tpl->getVariable('pso')->value['weight'],'NO'=>$_smarty_tpl->getVariable('pso')->value['diplomaNO'],'show'=>$_smarty_tpl->getVariable('pso')->value['diploma']),$_smarty_tpl->smarty,$_smarty_tpl);?>
</td>
							<td><?php echo $_smarty_tpl->getVariable('pso')->value['INTbid'];?>
 / ct</td>
							<?php if ($_smarty_tpl->getVariable('post')->value['is_offer']=='Y'&&$_smarty_tpl->getVariable('pso')->value['is_promotion']=='Y'&&$_smarty_tpl->getVariable('pso')->value['promotion_start']<=mktime()&&$_smarty_tpl->getVariable('pso')->value['promotion_stop']>=mktime()){?>
							<td class="promotion"><?php echo $_smarty_tpl->getVariable('pso')->value['agio']+$_smarty_tpl->getVariable('pso')->value['baseAgio']+$_smarty_tpl->getVariable('pso')->value['promotion_dot'];?>
 %</td>
							<td class="promotion">促销</td>
							<td class="promotion"><b style="color:red"><?php echo sprintf('%.2f',$_smarty_tpl->getVariable('pso')->value['INTbid']*$_smarty_tpl->getVariable('pso')->value['weight']*(100+$_smarty_tpl->getVariable('pso')->value['agio']+$_smarty_tpl->getVariable('pso')->value['baseAgio']+$_smarty_tpl->getVariable('pso')->value['promotion_dot'])/100);?>
</b></td>
							<td><?php echo $_smarty_tpl->getVariable('pso')->value['amount'];?>
</td>
							<td><input type="text" name="amount[<?php echo $_smarty_tpl->getVariable('pso')->value['id'];?>
]" value="1" style="width:40px;text-align:center" onfocus="C_price(this , 1 , <?php echo $_smarty_tpl->getVariable('pso')->value['amount'];?>
)" /></td>
							<td>
								<input type="text" name="price[<?php echo $_smarty_tpl->getVariable('pso')->value['id'];?>
]" value="<?php echo sprintf('%.2f',$_smarty_tpl->getVariable('pso')->value['INTbid']*$_smarty_tpl->getVariable('pso')->value['weight']*(100+$_smarty_tpl->getVariable('pso')->value['agio']+$_smarty_tpl->getVariable('pso')->value['baseAgio']+$_smarty_tpl->getVariable('pso')->value['promotion_dot'])/100);?>
" style="width:80px;text-align:center" onfocus="set_price(this)" />
								<input type="hidden" name="Yprice[<?php echo $_smarty_tpl->getVariable('pso')->value['id'];?>
]" value="<?php echo sprintf('%.2f',$_smarty_tpl->getVariable('pso')->value['INTbid']*$_smarty_tpl->getVariable('pso')->value['weight']*(100+$_smarty_tpl->getVariable('pso')->value['agio']+$_smarty_tpl->getVariable('pso')->value['baseAgio']+$_smarty_tpl->getVariable('pso')->value['promotion_dot'])/100);?>
" />
							</td>
							<?php }else{ ?>
							<td><?php echo $_smarty_tpl->getVariable('pso')->value['agio'];?>
 %</td>
							<td><?php echo $_smarty_tpl->getVariable('pso')->value['baseAgio'];?>
 %</td>
							<td><b style="color:red"><?php echo sprintf('%.2f',$_smarty_tpl->getVariable('pso')->value['weight']*$_smarty_tpl->getVariable('pso')->value['INTbid']/100*(100+$_smarty_tpl->getVariable('pso')->value['agio']+$_smarty_tpl->getVariable('pso')->value['baseAgio']+$_smarty_tpl->getVariable('post')->value['rebate']));?>
</b></td>
							<td><?php echo $_smarty_tpl->getVariable('pso')->value['amount'];?>
</td>
							<td><input type="text" name="amount[<?php echo $_smarty_tpl->getVariable('pso')->value['id'];?>
]" value="1" style="width:40px;text-align:center" onfocus="C_price(this , 1 , <?php echo $_smarty_tpl->getVariable('pso')->value['amount'];?>
)" /></td>
							<td>
								<input type="text" name="price[<?php echo $_smarty_tpl->getVariable('pso')->value['id'];?>
]" value="<?php echo sprintf('%.2f',$_smarty_tpl->getVariable('pso')->value['weight']*$_smarty_tpl->getVariable('pso')->value['INTbid']/100*(100+$_smarty_tpl->getVariable('pso')->value['agio']+$_smarty_tpl->getVariable('pso')->value['baseAgio']+$_smarty_tpl->getVariable('post')->value['rebate']));?>
" style="width:80px;text-align:center" onfocus="set_price(this)" />
								<input type="hidden" name="Yprice[<?php echo $_smarty_tpl->getVariable('pso')->value['id'];?>
]" value="<?php echo sprintf('%.2f',$_smarty_tpl->getVariable('pso')->value['weight']*$_smarty_tpl->getVariable('pso')->value['INTbid']/100*(100+$_smarty_tpl->getVariable('pso')->value['agio']+$_smarty_tpl->getVariable('pso')->value['baseAgio']+$_smarty_tpl->getVariable('post')->value['rebate']));?>
" />
							</td>
							<?php }?>
						</tr>
						<?php }} else { ?>
						<tr><td colspan="14" class="else">购物车中没有产品 , <a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'open'=>'product','DEL'=>'ALL'),$_smarty_tpl->smarty,$_smarty_tpl);?>
">点击添加产品</a></td></tr>
						<?php } ?>
					</table>
					</td>
				</tr>
				<tr><th colspan="2" align="center"><input type="submit" value=" 生 成 订 单 " /></th></tr>
			</table>
			</form>
		</div>
		<?php }else{ ?>
		<div class="show">
			<table width="100%" border="0" cellspacing="1" cellpadding="0" id="tab_show">
				<tr>
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
					<th>退点</th>
					<th>基准退点</th>
					<th>¥/每颗</th>
					<th>数量</th>
					<th width="5%">价格</th>
					<th width="5%">详情</th>
					<th width="5%">删除</th>
				</tr>
				<?php  $_smarty_tpl->tpl_vars['pso'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('list_cart')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['pso']->key => $_smarty_tpl->tpl_vars['pso']->value){
?>
				<tr align="center">
					<td><?php echo smarty_function_brite_spot(array('query'=>$_smarty_tpl->getVariable('get')->value['info'],'str'=>$_smarty_tpl->getVariable('pso')->value['ProID']),$_smarty_tpl->smarty,$_smarty_tpl);?>
</td>
					<td><?php echo $_smarty_tpl->getVariable('shape')->value[$_smarty_tpl->getVariable('pso')->value['shape']];?>
</td>
					<td><?php echo $_smarty_tpl->getVariable('pso')->value['weight'];?>
 / ct</td>
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
					<?php if ($_smarty_tpl->getVariable('pso')->value['is_promotion']=='Y'&&$_smarty_tpl->getVariable('pso')->value['promotion_start']<=mktime()&&$_smarty_tpl->getVariable('pso')->value['promotion_stop']>=mktime()){?>
					<td class="promotion"><?php echo $_smarty_tpl->getVariable('pso')->value['agio']+$_smarty_tpl->getVariable('pso')->value['baseAgio']+$_smarty_tpl->getVariable('pso')->value['promotion_dot'];?>
 %</td>
					<td class="promotion">促销</td>
					<td class="promotion"><?php echo sprintf('%.2f',$_smarty_tpl->getVariable('pso')->value['INTbid']*$_smarty_tpl->getVariable('pso')->value['weight']*(100+$_smarty_tpl->getVariable('pso')->value['agio']+$_smarty_tpl->getVariable('pso')->value['baseAgio']+$_smarty_tpl->getVariable('pso')->value['promotion_dot'])/100);?>
</td>
					<?php }else{ ?>
					<td><?php echo $_smarty_tpl->getVariable('pso')->value['agio'];?>
 %</td>
					<td><?php echo $_smarty_tpl->getVariable('pso')->value['baseAgio'];?>
 %</td>
					<td><?php echo $_smarty_tpl->getVariable('pso')->value['infml'];?>
</td>
					<?php }?>
					<td><?php echo $_smarty_tpl->getVariable('pso')->value['amount'];?>
</td>
					<td class="action"><?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['view_price']){?><a href="javascript:;" onclick="view_price(this , '<?php echo $_smarty_tpl->getVariable('pso')->value['id'];?>
' , 18)" class="act_3_2" title="查看价格"></a><?php }?></td>
					<td class="action"><?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['detail']){?><a href="javascript:;" onclick="show_pro_detail(this , '<?php echo $_smarty_tpl->getVariable('pso')->value['id'];?>
' , 18)" class="act_3_10" title="产品详情"></a><?php }?></td>
					<td class="action"><?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['del']){?><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'del','id'=>$_smarty_tpl->getVariable('pso')->value['id']),$_smarty_tpl->smarty,$_smarty_tpl);?>
" class="act_1_5" title="删除"></a><?php }?></td>
				</tr>
				<?php }} else { ?>
				<tr><td colspan="18" class="else">购物车中没有产品 , <a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'open'=>'product','DEL'=>'ALL'),$_smarty_tpl->smarty,$_smarty_tpl);?>
">点击添加产品</a></td></tr>
				<?php } ?>
			</table>
			<?php if ($_smarty_tpl->getVariable('list_cart')->value){?>
			<form action="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'orders_info'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" method="post" style="margin:1em 0 0 0">
			<table width="100%" border="0" cellspacing="1" cellpadding="0">
				<tr><th colspan="2">填写订单</th>	</tr>
				<tr>
					<td width="35%" align="right">代理身份</td>
					<td class="AjaxShow">
						<input type="hidden" name="proxy_id" id="proxy_id" />
						<input type="text" name="proxy_value" value="账号,编号,姓名" onfocus="get_proxy(this , false)" />
						<b></b>
					</td>
				</tr>
				<tr>
					<td align="right">业务</td>
					<td class="AjaxShow">
						<input type="hidden" name="salesman_id" id="salesman_id" />
						<input type="text" name="salesman_write" id="salesman_write" value="账号,编号,姓名" onfocus="change_id(this , 'proxy')" />
						<b></b>
					</td>
				</tr>
				<tr>
					<td align="right">客服</td>
					<td class="AjaxShow">
						<input type="hidden" name="service_id" id="service_id" />
						<input type="text" name="service_write" id="service_write" value="账号,编号,姓名" onfocus="change_id(this , 'service')" />
						<b></b>
					</td>
				</tr>
				<tr>
					<td align="right">代理退点</td>
					<td><span id="rebate_value"></span><input type="hidden" name="rebate" id="rebate" /></td>
				</tr>
				<tr>
					<td align="right">代理组</td>
					<td><span id="group_info"></span><input type="hidden" name="group" id="group" /></td>
				</tr>
				<tr>
					<td align="right">促销价</td>
					<td><span id="is_offer_info"></span><input type="hidden" name="is_offer" id="is_offer" /></td>
				</tr>
				<tr>
					<td align="right">备注</td>
					<td><textarea name="remark" style="width:95%; height:120px;"></textarea></td>
				</tr>
				<tr id="subMIT" style="display:none"><th colspan="2" align="center" class="select"><input value="下 一 步" type="submit" style="padding:0.5em" /></th></tr>
			</table>
			</form>
			<?php }?>
		</div>		
		<?php }?>
	</div>
	<b class="clear"></b>
</div>
</body>
</html>