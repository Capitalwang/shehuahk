<?php /* Smarty version Smarty3-b8, created on 2012-04-30 15:34:30
         compiled from "D:\APMServ5.2.6\www\htdocs\shehuahk\backadmin/Template/product_detail.html" */ ?>
<?php /*%%SmartyHeaderCode:249994f9e40869a98b2-07464578%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8dd8a00973e140e8a3c9d59b5b4ae34e231c3c14' => 
    array (
      0 => 'D:\\APMServ5.2.6\\www\\htdocs\\shehuahk\\backadmin/Template/product_detail.html',
      1 => 1305857078,
    ),
  ),
  'nocache_hash' => '249994f9e40869a98b2-07464578',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_brite_spot')) include 'D:\APMServ5.2.6\www\htdocs\shehuahk\smarty\plugins\function.brite_spot.php';
if (!is_callable('smarty_modifier_cat')) include 'D:\APMServ5.2.6\www\htdocs\shehuahk\smarty\plugins\modifier.cat.php';
if (!is_callable('smarty_function_Goto_diploma')) include 'D:\APMServ5.2.6\www\htdocs\shehuahk\smarty\plugins\function.Goto_diploma.php';
if (!is_callable('smarty_modifier_date_format')) include 'D:\APMServ5.2.6\www\htdocs\shehuahk\smarty\plugins\modifier.date_format.php';
?><table border="0" cellspacing="1" cellpadding="0" width="100%">
	<tr>
		<td width="10%" align="right" class="Need">编号</td>
		<td><?php echo smarty_function_brite_spot(array('query'=>$_smarty_tpl->getVariable('get')->value['info'],'str'=>$_smarty_tpl->getVariable('show')->value['ProID']),$_smarty_tpl->smarty,$_smarty_tpl);?>
</td>
		<td width="10%" align="right">原编号</td>
		<td><?php echo smarty_function_brite_spot(array('query'=>$_smarty_tpl->getVariable('get')->value['info'],'str'=>$_smarty_tpl->getVariable('show')->value['previousNO']),$_smarty_tpl->smarty,$_smarty_tpl);?>
</td>
	</tr>
	<tr>
		<td align="right" class="Need">状态</td>
		<td><?php echo $_smarty_tpl->getVariable('status')->value[$_smarty_tpl->getVariable('show')->value['status']];?>
 (<?php echo $_smarty_tpl->getVariable('show')->value['status'];?>
)</td>
		<td align="right">数量</td>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['amount'];?>
</td>
	</tr>
	<tr>
		<td align="right">形状</td>
		<td><?php echo $_smarty_tpl->getVariable('shape')->value[$_smarty_tpl->getVariable('show')->value['shape']];?>
 (<?php echo $_smarty_tpl->getVariable('show')->value['shape'];?>
)</td>
		<td align="right">重量</td>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['weight'];?>
</td>
	</tr>
	<tr>
		<td align="right">颜色</td>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['color'];?>
</td>
		<td align="right">净度</td>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['clarity'];?>
</td>
	</tr>
	<tr>
		<td align="right">切工</td>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['cut'];?>
</td>
		<td align="right">抛光</td>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['buffing'];?>
</td>
	</tr>
	<tr>
		<td align="right">对称</td>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['symmetry'];?>
</td>
		<td align="right">荧光强度</td>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['Fent_Isity'];?>
</td>
	</tr>
	<tr>
		<td align="right">荧光颜色</td>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['Fent_color'];?>
</td>
		<td align="right">测量值</td>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['scalar_value'];?>
</td>
	</tr>
	<tr>
		<td align="right">全身比</td>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['body_ratio'];?>
 %</td>
		<td align="right">台宽比</td>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['table_width'];?>
 %</td>
	</tr>
	<tr>
		<td align="right">证书</td>
		<td colspan="3">
			<?php ob_start();?><?php echo smarty_function_brite_spot(array('query'=>$_smarty_tpl->getVariable('get')->value['info'],'str'=>smarty_modifier_cat(smarty_modifier_cat($_smarty_tpl->getVariable('show')->value['diploma'],' - '),$_smarty_tpl->getVariable('show')->value['diplomaNO'])),$_smarty_tpl->smarty,$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php echo smarty_function_Goto_diploma(array('diploma'=>$_smarty_tpl->getVariable('show')->value['diploma'],'weight'=>$_smarty_tpl->getVariable('show')->value['weight'],'NO'=>$_smarty_tpl->getVariable('show')->value['diplomaNO'],'show'=>$_tmp1),$_smarty_tpl->smarty,$_smarty_tpl);?>

			<?php if ($_smarty_tpl->getVariable('show')->value['diplomaPhoto']){?><a style="margin:0 0 0 2em" href="<?php echo $_smarty_tpl->getVariable('show')->value['diplomaPhoto'];?>
" target="_<?php echo $_smarty_tpl->getVariable('show')->value['ProID'];?>
">证书图</a><?php }?>
		</td>
	</tr>
	<tr>
		<td align="right">产品来源</td>
		<td>
			<?php echo $_smarty_tpl->getVariable('proSource')->value[$_smarty_tpl->getVariable('show')->value['proSource']];?>

			<?php if ($_smarty_tpl->getVariable('show')->value['proSource']!='self'){?><span style="margin:0 0 0 2em">商家ID：<?php echo $_smarty_tpl->getVariable('show')->value['sellerID'];?>
</span><?php }?>
		</td>
		<td align="right">库存地点</td>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['stockAddress'];?>
</td>
	</tr>
	<tr>
		<td align="right">是否促销</td>
		<td colspan="3">
			<?php if ($_smarty_tpl->getVariable('show')->value['is_promotion']=='N'||$_smarty_tpl->getVariable('show')->value['promotion_start']>time()||time()>$_smarty_tpl->getVariable('show')->value['promotion_stop']){?>否<?php }else{ ?>
				是
				<span style="margin:0 0 0 2em">开始日期 <?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('show')->value['promotion_start'],"%Y-%m-%d %H:%M");?>
</span>
				<span style="margin:0 0 0 2em">结束日期 <?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('show')->value['promotion_stop'],"%Y-%m-%d %H:%M");?>
</span>
				<span style="margin:0 0 0 2em">促销点 <?php echo $_smarty_tpl->getVariable('show')->value['promotion_dot'];?>
 %</span>
			<?php }?>
		</td>
	</tr>
	<tr>
		<td align="right">国家</td>
		<td><?php echo $_smarty_tpl->getVariable('country')->value[$_smarty_tpl->getVariable('show')->value['country']];?>
 (<?php echo $_smarty_tpl->getVariable('show')->value['country'];?>
)</td>
		<td align="right">&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td align="right">进货价</td>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['infml'];?>
 元</td>
		<td align="right">国际报价</td>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['INTbid'];?>
 元 / ct</td>
	</tr>
	<tr>
		<td align="right">退点</td>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['agio'];?>
 %</td>
		<td align="right">基准退点</td>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['baseAgio'];?>
 %</td>
	</tr>
	<tr>
		<td align="right">产品添加日期</td>
		<td> <?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('show')->value['time'],"%Y-%m-%d %H:%M:%S");?>
</td>
		<td align="right">最后修改日期</td>
		<td> <?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('show')->value['edit_time'],"%Y-%m-%d %H:%M:%S");?>
</td>
	</tr>
	<tr>
		<td align="right">外部备注</td>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['userRemark'];?>
</td>
		<td align="right">内部备注</td>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['backRemark'];?>
</td>
	</tr>
</table>