<?php /* Smarty version Smarty3-b8, created on 2014-12-30 10:45:33
         compiled from "D:\www\shehuahk\backadmin/Template/orders_product_detail.html" */ ?>
<?php /*%%SmartyHeaderCode:2836054a211cd50e3d0-21939324%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '69e24159316fb092e6eb22746f69a3d1d45519a8' => 
    array (
      0 => 'D:\\www\\shehuahk\\backadmin/Template/orders_product_detail.html',
      1 => 1277022853,
    ),
  ),
  'nocache_hash' => '2836054a211cd50e3d0-21939324',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\www\shehuahk\smarty\plugins\modifier.date_format.php';
if (!is_callable('smarty_function_Goto_diploma')) include 'D:\www\shehuahk\smarty\plugins\function.Goto_diploma.php';
?><table border="0" cellspacing="1" cellpadding="0" width="100%">
	<tr>
		<td width="10%" align="right" class="Need">产品编号</td>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['info']['ProID'];?>
</td>
		<td width="10%" align="right">原编号</td>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['info']['previousNO'];?>
</td>
	</tr>
	<tr>
		<td align="right" class="Need">产品状态</td>
		<td><?php if ($_smarty_tpl->getVariable('show')->value['status']=='Y'){?>通过审核<?php }elseif($_smarty_tpl->getVariable('show')->value['status']=='C'){?>取消<?php }else{ ?>未审核<?php }?></td>
		<td align="right">审核时间</td>
		<td><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('show')->value['time'],"%Y-%m-%d %H:%M:%S");?>
</td>
	</tr>
	<tr>
		<td align="right">快递类型</td>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['express_type'];?>
</td>
		<td align="right">快递单号</td>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['express_ID'];?>
</td>
	</tr>
	<tr>
		<td align="right" class="Need">售价</td>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['price'];?>
 元</td>
		<td align="right">数量</td>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['amount'];?>
</td>
	</tr>
	<tr>
		<td align="right">促销</td>
		<td><?php if ($_smarty_tpl->getVariable('show')->value['is_promotion']=='N'){?>否<?php }else{ ?>是<span style="margin:0 0 0 2em">促销点 <?php echo $_smarty_tpl->getVariable('show')->value['info']['promotion_dot'];?>
 %</span><?php }?></td>
		<td align="right">国家</td>
		<td><?php echo $_smarty_tpl->getVariable('country')->value[$_smarty_tpl->getVariable('show')->value['info']['country']];?>
 (<?php echo $_smarty_tpl->getVariable('show')->value['info']['country'];?>
)</td>
	</tr>
	<tr>
		<td align="right" class="Need">进货价</td>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['info']['infml'];?>
 元</td>
		<td align="right" class="Need">国际报价</td>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['info']['INTbid'];?>
 元 / ct</td>
	</tr>
	<tr>
		<td align="right" class="Need">退点</td>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['info']['agio'];?>
 %</td>
		<td align="right" class="Need">基准退点</td>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['baseAgio'];?>
 %</td>
	</tr>
	<tr>
		<td align="right">形状</td>
		<td><?php echo $_smarty_tpl->getVariable('shape')->value[$_smarty_tpl->getVariable('show')->value['info']['shape']];?>
 (<?php echo $_smarty_tpl->getVariable('show')->value['info']['shape'];?>
)</td>
		<td align="right">重量</td>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['info']['weight'];?>
 ct</td>
	</tr>
	<tr>
		<td align="right">颜色</td>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['info']['color'];?>
</td>
		<td align="right">净度</td>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['info']['clarity'];?>
</td>
	</tr>
	<tr>
		<td align="right">切工</td>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['info']['cut'];?>
</td>
		<td align="right">抛光</td>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['info']['buffing'];?>
</td>
	</tr>
	<tr>
		<td align="right">对称</td>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['info']['symmetry'];?>
</td>
		<td align="right">荧光强度</td>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['info']['Fent_Isity'];?>
</td>
	</tr>
	<tr>
		<td align="right">荧光颜色</td>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['info']['Fent_color'];?>
</td>
		<td align="right">测量值</td>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['info']['scalar_value'];?>
</td>
	</tr>
	<tr>
		<td align="right">全身比</td>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['info']['body_ratio'];?>
 %</td>
		<td align="right">台宽比</td>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['info']['table_width'];?>
 %</td>
	</tr>
	<tr>
		<td align="right">证书类型</td>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['info']['diploma'];?>
</td>
		<td align="right">证书编号</td>
		<td><?php echo smarty_function_Goto_diploma(array('diploma'=>$_smarty_tpl->getVariable('show')->value['info']['diploma'],'weight'=>$_smarty_tpl->getVariable('show')->value['info']['weight'],'NO'=>$_smarty_tpl->getVariable('show')->value['info']['diplomaNO'],'show'=>$_smarty_tpl->getVariable('show')->value['info']['diplomaNO']),$_smarty_tpl->smarty,$_smarty_tpl);?>
</td>
	</tr>
	<tr>
		<td align="right">产品来源</td>
		<td>
			<?php echo $_smarty_tpl->getVariable('proSource')->value[$_smarty_tpl->getVariable('show')->value['info']['proSource']];?>

			<?php if ($_smarty_tpl->getVariable('show')->value['info']['proSource']!='self'){?><span style="margin:0 0 0 2em">商家ID：<?php echo $_smarty_tpl->getVariable('show')->value['info']['sellerID'];?>
</span><?php }?>
		</td>
		<td align="right">库存地点</td>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['info']['stockAddress'];?>
</td>
	</tr>
	<tr>
		<td align="right">产品 外部备注</td>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['info']['userRemark'];?>
</td>
		<td align="right">产品 内部备注</td>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['info']['backRemark'];?>
</td>
	</tr>
	<tr>
		<td align="right">产品添加日期</td>
		<td> <?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('show')->value['info']['time'],"%Y-%m-%d %H:%M:%S");?>
</td>
		<td align="right">最后修改日期</td>
		<td> <?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('show')->value['info']['edit_time'],"%Y-%m-%d %H:%M:%S");?>
</td>
	</tr>
	<tr>
		<td align="right">购买时 内部备注</td>
		<td colspan="3"><?php echo $_smarty_tpl->getVariable('show')->value['remark'];?>
</td>
	</tr>
</table>