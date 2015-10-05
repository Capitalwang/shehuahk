<?php /* Smarty version Smarty3-b8, created on 2011-05-28 22:18:51
         compiled from "D:\web\vhosts\shehua.hk\backadmin/Template/orders_show.html" */ ?>
<?php /*%%SmartyHeaderCode:229494de1044b7ea564-39305114%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fb34aa0636483a0454cc6ed4bf5742665f86617f' => 
    array (
      0 => 'D:\\web\\vhosts\\shehua.hk\\backadmin/Template/orders_show.html',
      1 => 1277375690,
    ),
  ),
  'nocache_hash' => '229494de1044b7ea564-39305114',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_write_url')) include 'D:\web\vhosts\shehua.hk\smarty\plugins\function.write_url.php';
if (!is_callable('smarty_function_brite_spot')) include 'D:\web\vhosts\shehua.hk\smarty\plugins\function.brite_spot.php';
if (!is_callable('smarty_modifier_date_format')) include 'D:\web\vhosts\shehua.hk\smarty\plugins\modifier.date_format.php';
if (!is_callable('smarty_function_selected')) include 'D:\web\vhosts\shehua.hk\smarty\plugins\function.selected.php';
?>
<style type="text/css" media="screen">#print{display:none}</style>
<style type="text/css" media="print">
div{display:none}
#print{display:block}
#print div{display:block}
#print h1{font-size:36px;font-family:"黑体"}
#print th,#print td{height:30px}
#print .Ord{border-bottom:1px #000 solid;border-right:1px #000 solid;margin:1em 0 0 0}
#print .Ord th , #print .Ord td{border-top:1px #000 solid;border-left:1px #000 solid;height:22px;padding:0 0.5em}
#print .Products{border:1px #000 solid;border-right:2px #000 solid}
#print .Products th , #print .Products td{border-bottom:1px #000 solid;border-left:1px #000 solid}
#print .Products th{border-top:none}
#print .Elses , #print .Elses div{margin:1em 0 0 0}
#print .Elses span b{font-weight:300}
</style>

<div class="show">
	<form action="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'del'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" method="post">
		<table width="100%" border="0" cellspacing="1" cellpadding="0" id="tab_show">
			<tr>
				<th>订单号</th>
				<th>订单状态</th>
				<th>购买人</th>
				<th>业务</th>
				<th>客服</th>
				<th>总价</th>
				<th>下单时间</th>
				<th>操作</th>
				<th width="5%">短信</th>
				<th width="5%">打印</th>
				<th width="5%">详情</th>
				<th width="5%">删除</th>
			</tr>
			<?php  $_smarty_tpl->tpl_vars['pso'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('list_text')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['pso']->key => $_smarty_tpl->tpl_vars['pso']->value){
?>
			<tr align="center">
				<td><?php echo smarty_function_brite_spot(array('query'=>$_smarty_tpl->getVariable('get')->value['info'],'str'=>$_smarty_tpl->getVariable('pso')->value['orders_id']),$_smarty_tpl->smarty,$_smarty_tpl);?>
</td>
				<td><?php echo $_smarty_tpl->getVariable('status')->value[$_smarty_tpl->getVariable('pso')->value['status']];?>
</td>
				<td><?php echo smarty_function_brite_spot(array('query'=>$_smarty_tpl->getVariable('get')->value['info'],'str'=>$_smarty_tpl->getVariable('pso')->value['account']),$_smarty_tpl->smarty,$_smarty_tpl);?>
</td>
				<td><?php echo smarty_function_brite_spot(array('query'=>$_smarty_tpl->getVariable('get')->value['info'],'str'=>$_smarty_tpl->getVariable('pso')->value['salesman_name']),$_smarty_tpl->smarty,$_smarty_tpl);?>
</td>
				<td><?php echo smarty_function_brite_spot(array('query'=>$_smarty_tpl->getVariable('get')->value['info'],'str'=>$_smarty_tpl->getVariable('pso')->value['service_name']),$_smarty_tpl->smarty,$_smarty_tpl);?>
</td>
				<td><?php echo $_smarty_tpl->getVariable('pso')->value['price'];?>
</td>
				<td><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('pso')->value['time'],"%Y-%m-%d %H:%M:%S");?>
</td>
				<td>
				<?php if ($_smarty_tpl->getVariable('pso')->value['status']=='null'){?>
					<?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['audit']){?><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'audit','orders_id'=>$_smarty_tpl->getVariable('pso')->value['orders_id']),$_smarty_tpl->smarty,$_smarty_tpl);?>
">审核订单</a><?php }?>
				<?php }elseif(($_smarty_tpl->getVariable('pso')->value['status']=='audit'||$_smarty_tpl->getVariable('pso')->value['status']=='earnest')){?>
					<a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'edit_orders','orders_id'=>$_smarty_tpl->getVariable('pso')->value['orders_id']),$_smarty_tpl->smarty,$_smarty_tpl);?>
">更改订单</a>
					<a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'count_deposit','orders_id'=>$_smarty_tpl->getVariable('pso')->value['orders_id']),$_smarty_tpl->smarty,$_smarty_tpl);?>
">计算定金</a>
					<?php if ($_smarty_tpl->getVariable('pso')->value['status']=='earnest'){?><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'recoup_deposit','orders_id'=>$_smarty_tpl->getVariable('pso')->value['orders_id']),$_smarty_tpl->smarty,$_smarty_tpl);?>
">扣除定金</a><?php }?>
				<?php }elseif($_smarty_tpl->getVariable('pso')->value['status']=='deploy'){?>
					<a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'deploy','orders_id'=>$_smarty_tpl->getVariable('pso')->value['orders_id']),$_smarty_tpl->smarty,$_smarty_tpl);?>
">更改到货情况</a>
					<a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'dispatch','orders_id'=>$_smarty_tpl->getVariable('pso')->value['orders_id']),$_smarty_tpl->smarty,$_smarty_tpl);?>
">更改物流状态</a>
				<?php }elseif($_smarty_tpl->getVariable('pso')->value['status']=='balance'){?>
					<a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'deploy','orders_id'=>$_smarty_tpl->getVariable('pso')->value['orders_id']),$_smarty_tpl->smarty,$_smarty_tpl);?>
">更改到货情况</a>
					<a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'balance','orders_id'=>$_smarty_tpl->getVariable('pso')->value['orders_id']),$_smarty_tpl->smarty,$_smarty_tpl);?>
">扣除余款</a>
					<a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'dispatch','orders_id'=>$_smarty_tpl->getVariable('pso')->value['orders_id']),$_smarty_tpl->smarty,$_smarty_tpl);?>
">更改物流状态</a>
				<?php }elseif($_smarty_tpl->getVariable('pso')->value['status']=='dispatch'){?>
					<a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'dispatch','orders_id'=>$_smarty_tpl->getVariable('pso')->value['orders_id']),$_smarty_tpl->smarty,$_smarty_tpl);?>
">更改物流状态</a>
					<a href="javascript:;" onclick="receiving(this , '<?php echo $_smarty_tpl->getVariable('pso')->value['orders_id'];?>
' , 12)">收到货物</a>
				<?php }elseif($_smarty_tpl->getVariable('pso')->value['status']=='receiving'){?>
					<b style="color:#093">已完成的订单</b>
				<?php }elseif($_smarty_tpl->getVariable('pso')->value['status']=='returned'){?>
					<span style="color:#999">取消的订单</span>
				<?php }?>
				<?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['cancel']&&$_smarty_tpl->getVariable('pso')->value['status']!='returned'&&$_smarty_tpl->getVariable('pso')->value['status']!='receiving'){?><a href="javascript:;" onclick="cancel(this , '<?php echo $_smarty_tpl->getVariable('pso')->value['orders_id'];?>
' , 12)">取消订单</a><?php }?>
				</td>
				<td class="action"><?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['sms']){?><a href="javascript:;" onclick="sms(this , '<?php echo $_smarty_tpl->getVariable('pso')->value['proxy_id'];?>
' , 12 , false , '<?php echo $_smarty_tpl->getVariable('pso')->value['orders_id'];?>
')" class="act_1_13" title="短信"></a><?php }?></td>
				<td class="action"><?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['prints']){?><a href="javascript:;" onclick="Prints('<?php echo $_smarty_tpl->getVariable('pso')->value['orders_id'];?>
')" class="act_1_8" title="打印"></a><?php }?></td>
				<td class="action"><?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['detail']){?><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'detail','orders_id'=>$_smarty_tpl->getVariable('pso')->value['orders_id']),$_smarty_tpl->smarty,$_smarty_tpl);?>
" class="act_3_10" title="详情"></a><?php }?></td>
				<td class="action"><?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['del']){?><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'del','orders_id'=>$_smarty_tpl->getVariable('pso')->value['orders_id']),$_smarty_tpl->smarty,$_smarty_tpl);?>
" class="act_1_5" title="删除"></a><?php }?></td>
			</tr>
			<?php }} else { ?>
			<tr><td colspan="12" class="else"><?php if ($_smarty_tpl->getVariable('get')->value['go']=='query'){?>你查询的订单不存在<?php }else{ ?>当前没有订单<?php }?></td></tr>
			<?php } ?>
		</table>
		<div class="select"> </div>
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
>按 下单时间 (↑) 排序</option>
			<option value="ORDER=time_Dn" <?php echo smarty_function_selected(array('val'=>$_smarty_tpl->getVariable('get')->value['ORDER'],'str'=>'time_Dn'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>按 下单时间 (↓) 排序</option>
			<option value="ORDER=prxy_UP" <?php echo smarty_function_selected(array('val'=>$_smarty_tpl->getVariable('get')->value['ORDER'],'str'=>'prxy_UP'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>按 购买人 (↑) 排序</option>
			<option value="ORDER=prxy_Dn" <?php echo smarty_function_selected(array('val'=>$_smarty_tpl->getVariable('get')->value['ORDER'],'str'=>'prxy_Dn'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>按 购买人 (↓) 排序</option>
		</select>
	</div>
	<?php }?>
	</div>