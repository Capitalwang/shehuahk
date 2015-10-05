<?php /* Smarty version Smarty3-b8, created on 2011-08-06 10:19:33
         compiled from "D:\web\vhosts\shehua.hk\backadmin/Template/product_to_CSV.html" */ ?>
<?php /*%%SmartyHeaderCode:11054e3ca4b534c0e2-99364976%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '541b2275c7f1f10248d445f1772cd61f52c54775' => 
    array (
      0 => 'D:\\web\\vhosts\\shehua.hk\\backadmin/Template/product_to_CSV.html',
      1 => 1305853533,
    ),
  ),
  'nocache_hash' => '11054e3ca4b534c0e2-99364976',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_write_url')) include 'D:\web\vhosts\shehua.hk\smarty\plugins\function.write_url.php';
if (!is_callable('smarty_function_CLASS_COLOR')) include 'D:\web\vhosts\shehua.hk\smarty\plugins\function.CLASS_COLOR.php';
if (!is_callable('smarty_function_brite_spot')) include 'D:\web\vhosts\shehua.hk\smarty\plugins\function.brite_spot.php';
if (!is_callable('smarty_function_Goto_diploma')) include 'D:\web\vhosts\shehua.hk\smarty\plugins\function.Goto_diploma.php';
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
			<ul>
			<?php if ($_smarty_tpl->getVariable('BTP')->value['product']['show']){?><li><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'open'=>'product','DEL'=>'ALL'),$_smarty_tpl->smarty,$_smarty_tpl);?>
">继续添加产品</a></li><?php }?>
			<?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['del']){?><li><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'del','DEL'=>'ALL'),$_smarty_tpl->smarty,$_smarty_tpl);?>
">清空缓存</a></li><?php }?>
			<?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['show']){?><li><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'show','DEL'=>'ALL'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('show'=>$_smarty_tpl->getVariable('get')->value['action'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>产品导出CSV</a></li><?php }?>
			</ul>
			<span class="clear"></span>
		</div>
		<?php if ($_smarty_tpl->getVariable('get')->value['action']=='choose'){?>
		<div class="append">
			<form action="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'write'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" method="post">
			<table width="100%" border="0" cellspacing="1" cellpadding="0">
				<tr><th colspan="2">选择导出的属性</th></tr>
				<tr>
					<td width="35%" align="right" class="Need">产品属性</td>
					<td>
						<ul class="attribute">
						<?php  $_smarty_tpl->tpl_vars['pso'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('attribute')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['pso']->key => $_smarty_tpl->tpl_vars['pso']->value){
?>
							<li><label for="att_<?php echo $_smarty_tpl->getVariable('pso')->value['value'];?>
"><input type="checkbox" id="att_<?php echo $_smarty_tpl->getVariable('pso')->value['value'];?>
" name="attribute[]" value="<?php echo $_smarty_tpl->getVariable('pso')->value['value'];?>
" <?php if ($_smarty_tpl->getVariable('pso')->value['checked']){?>checked="checked"<?php }?> /> <?php echo $_smarty_tpl->getVariable('pso')->value['name'];?>
</label></li>
						<?php }} ?>
						</ul>
					</td>
				</tr>
				<tr>
					<td align="right">排序</td>
					<td>
						<ul class="purview">
							<li>
								<b>产品编号</b>
								<label for="ProID_asc"><input name="taxis[ProID]" type="radio" value="asc" id="ProID_asc" /> 升序</label>
								<label for="ProID_desc"><input name="taxis[ProID]" type="radio" value="desc" id="ProID_desc" /> 降序</label>
								<a href="javasrcipt:;" onclick="cancel(this)">取消</a>
							</li>
							<li>
								<b>数量</b>
								<label for="amount_asc"><input name="taxis[amount]" type="radio" value="asc" id="amount_asc" /> 升序</label>
								<label for="amount_desc"><input name="taxis[amount]" type="radio" value="desc" id="amount_desc" /> 降序</label>
								<a href="javasrcipt:;" onclick="cancel(this)">取消</a>
							</li>
							<li>
								<b>形状</b>
								<label for="shape_asc"><input name="taxis[shape]" type="radio" value="asc" id="shape_asc" /> 升序</label>
								<label for="shape_desc"><input name="taxis[shape]" type="radio" value="desc" id="shape_desc" /> 降序</label>
								<a href="javasrcipt:;" onclick="cancel(this)">取消</a>
							</li>
							<li>
								<b>重量</b>
								<label for="weight_asc"><input name="taxis[weight]" type="radio" value="asc" id="weight_asc" /> 升序</label>
								<label for="weight_desc"><input name="taxis[weight]" type="radio" value="desc" id="weight_desc" checked="checked" /> 降序</label>
								<a href="javasrcipt:;" onclick="cancel(this)">取消</a>
							</li>
							<li>
								<b>颜色</b>
								<label for="color_asc"><input name="taxis[color]" type="radio" value="asc" id="color_asc" /> 升序</label>
								<label for="color_desc"><input name="taxis[color]" type="radio" value="desc" id="color_desc" checked="checked" /> 降序</label>
								<a href="javasrcipt:;" onclick="cancel(this)">取消</a>
							</li>
							<li>
								<b>净度</b>
								<label for="clarity_asc"><input name="taxis[clarity]" type="radio" value="asc" id="clarity_asc" /> 升序</label>
								<label for="clarity_desc"><input name="taxis[clarity]" type="radio" value="desc" id="clarity_desc" /> 降序</label>
								<a href="javasrcipt:;" onclick="cancel(this)">取消</a>
							</li>
							<li>
								<b>切工</b>
								<label for="cut_asc"><input name="taxis[cut]" type="radio" value="asc" id="cut_asc" /> 升序</label>
								<label for="cut_desc"><input name="taxis[cut]" type="radio" value="desc" id="cut_desc" /> 降序</label>
								<a href="javasrcipt:;" onclick="cancel(this)">取消</a>
							</li>
							<li>
								<b>抛光</b>
								<label for="buffing_asc"><input name="taxis[buffing]" type="radio" value="asc" id="buffing_asc" /> 升序</label>
								<label for="buffing_desc"><input name="taxis[buffing]" type="radio" value="desc" id="buffing_desc" /> 降序</label>
								<a href="javasrcipt:;" onclick="cancel(this)">取消</a>
							</li>
							<li>
								<b>对称</b>
								<label for="symmetry_asc"><input name="taxis[symmetry]" type="radio" value="asc" id="symmetry_asc" /> 升序</label>
								<label for="symmetry_desc"><input name="taxis[symmetry]" type="radio" value="desc" id="symmetry_desc" /> 降序</label>
								<a href="javasrcipt:;" onclick="cancel(this)">取消</a>
							</li>
							<li>
								<b>退点</b>
								<label for="agio_asc"><input name="taxis[agio]" type="radio" value="asc" id="agio_asc" /> 升序</label>
								<label for="agio_desc"><input name="taxis[agio]" type="radio" value="desc" id="agio_desc" checked="checked" /> 降序</label>
								<a href="javasrcipt:;" onclick="cancel(this)">取消</a>
							</li>
						</ul>
					</td>
				</tr>
				<tr>
					<td align="right" class="Need">价格体系</td>
					<td>
						<ul>
						<?php  $_smarty_tpl->tpl_vars['pso'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('proxy_group')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['pso']->key => $_smarty_tpl->tpl_vars['pso']->value){
?>
							<li><label for="money_<?php echo $_smarty_tpl->getVariable('pso')->value['id'];?>
" style="margin:0 1em 0 0"><input name="money" type="radio" value="<?php echo $_smarty_tpl->getVariable('pso')->value['is_offer'];?>
<?php echo $_smarty_tpl->getVariable('pso')->value['rebate'];?>
" id="money_<?php echo $_smarty_tpl->getVariable('pso')->value['id'];?>
" /> <?php echo $_smarty_tpl->getVariable('pso')->value['name'];?>
 (<?php echo $_smarty_tpl->getVariable('pso')->value['rebate'];?>
%)</label></li>
						<?php }} ?>
						</ul>
					</td>
				</tr>
				<tr><th colspan="2" align="center"><input type="submit" value=" 提 交 " /></th></tr>
			</table>
			</form>
		</div>
		<?php }elseif($_smarty_tpl->getVariable('get')->value['action']=='write'){?>
			<div align="center" style="padding:100px 0">
				<a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'down','DEL'=>'ALL'),$_smarty_tpl->smarty,$_smarty_tpl);?>
"><b style="color:#F00; display:block; margin:1em;">设定完成,请点击下载</b></a>
				<a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'DEL'=>'ALL'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" style="margin:0 1em">返回到 产品导出CSV 程序</a>
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
 元</td>
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
					<td class="action"><?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['detail']){?><a href="javascript:;" onclick="show_pro_detail(this , '<?php echo $_smarty_tpl->getVariable('pso')->value['id'];?>
' , 17)" class="act_3_10" title="产品详情"></a><?php }?></td>
					<td class="action"><?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['del']){?><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'del','id'=>$_smarty_tpl->getVariable('pso')->value['id']),$_smarty_tpl->smarty,$_smarty_tpl);?>
" class="act_1_5" title="删除"></a><?php }?></td>
				</tr>
				<?php }} else { ?>
				<tr><td colspan="17" class="else">购物车中没有产品 , <a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'open'=>'product','DEL'=>'ALL'),$_smarty_tpl->smarty,$_smarty_tpl);?>
">点击添加产品</a></td></tr>
				<?php } ?>
			</table>
			<div class="select" style="text-align:center"><input value="下 一 步" type="button" style="padding:0.5em" onclick="window.location = '<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'choose'),$_smarty_tpl->smarty,$_smarty_tpl);?>
'" /></div>
		</div>		
		<?php }?>
	</div>
	<b class="clear"></b>
</div>
</body>
</html>