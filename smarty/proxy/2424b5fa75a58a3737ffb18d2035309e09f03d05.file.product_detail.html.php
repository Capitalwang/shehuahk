<?php /* Smarty version Smarty3-b8, created on 2011-05-29 23:18:36
         compiled from "D:\web\vhosts\shehua.hk\wholesale/Template/product_detail.html" */ ?>
<?php /*%%SmartyHeaderCode:19144de263ccb32db7-24480234%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2424b5fa75a58a3737ffb18d2035309e09f03d05' => 
    array (
      0 => 'D:\\web\\vhosts\\shehua.hk\\wholesale/Template/product_detail.html',
      1 => 1306305993,
    ),
  ),
  'nocache_hash' => '19144de263ccb32db7-24480234',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_brite_spot')) include 'D:\web\vhosts\shehua.hk\smarty\plugins\function.brite_spot.php';
if (!is_callable('smarty_modifier_cat')) include 'D:\web\vhosts\shehua.hk\smarty\plugins\modifier.cat.php';
if (!is_callable('smarty_function_Goto_diploma')) include 'D:\web\vhosts\shehua.hk\smarty\plugins\function.Goto_diploma.php';
if (!is_callable('smarty_modifier_date_format')) include 'D:\web\vhosts\shehua.hk\smarty\plugins\modifier.date_format.php';
?><table border="0" cellspacing="1" cellpadding="0" width="100%" class="dil">
	<tr>
		<th width="10%">编号</th>
		<td width="45%"><?php echo smarty_function_brite_spot(array('query'=>$_smarty_tpl->getVariable('get')->value['info'],'str'=>$_smarty_tpl->getVariable('show')->value['ProID']),$_smarty_tpl->smarty,$_smarty_tpl);?>
</td>
		<th width="10%">数量</th>
		<td width="35%"><?php echo $_smarty_tpl->getVariable('show')->value['amount'];?>
</td>
	</tr>
	<tr>
		<th>形状</th>
		<td><?php echo $_smarty_tpl->getVariable('shape')->value[$_smarty_tpl->getVariable('show')->value['shape']];?>
 (<?php echo $_smarty_tpl->getVariable('show')->value['shape'];?>
)</td>
		<th>重量</th>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['weight'];?>
</td>
	</tr>
	<tr>
		<th>颜色</th>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['color'];?>
</td>
		<th>净度</th>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['clarity'];?>
</td>
	</tr>
	<tr>
		<th>切工</th>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['cut'];?>
</td>
		<th>抛光</th>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['buffing'];?>
</td>
	</tr>
	<tr>
		<th>对称</th>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['symmetry'];?>
</td>
		<th>测量值</th>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['scalar_value'];?>
</td>
	</tr>
	<tr>
		<th>荧光强度</th>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['Fent_Isity'];?>
</td>
		<th>荧光颜色</th>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['Fent_color'];?>
</td>
	</tr>
	<tr>
		<th>全身比</th>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['body_ratio'];?>
 %</td>
		<th>台宽比</th>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['table_width'];?>
 %</td>
	</tr>
	<tr>
		<th>证书</th>
		<td colspan="3">
			<?php ob_start();?><?php echo smarty_function_brite_spot(array('query'=>$_smarty_tpl->getVariable('get')->value['info'],'str'=>smarty_modifier_cat(smarty_modifier_cat($_smarty_tpl->getVariable('show')->value['diploma'],' - '),$_smarty_tpl->getVariable('show')->value['diplomaNO'])),$_smarty_tpl->smarty,$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php echo smarty_function_Goto_diploma(array('diploma'=>$_smarty_tpl->getVariable('show')->value['diploma'],'weight'=>$_smarty_tpl->getVariable('show')->value['weight'],'NO'=>$_smarty_tpl->getVariable('show')->value['diplomaNO'],'show'=>$_tmp1),$_smarty_tpl->smarty,$_smarty_tpl);?>

			<?php if ($_smarty_tpl->getVariable('show')->value['diplomaPhoto']){?><a style="margin:0 0 0 2em" href="<?php echo $_smarty_tpl->getVariable('Domain')->value;?>
<?php echo $_smarty_tpl->getVariable('show')->value['diplomaPhoto'];?>
" target="_<?php echo $_smarty_tpl->getVariable('show')->value['ProID'];?>
">证书图</a><?php }?>
		</td>
	</tr>
	<tr>
		<th>是否促销</th>
		<td>
			<?php if ($_smarty_tpl->getVariable('show')->value['is_promotion']=='N'||$_smarty_tpl->getVariable('show')->value['promotion_start']>time()||time()>$_smarty_tpl->getVariable('show')->value['promotion_stop']){?>否<?php }else{ ?>
				是
				<span style="margin:0 0 0 2em">开始日期 <?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('show')->value['promotion_start'],"%Y-%m-%d %H:%M");?>
</span>
				<span style="margin:0 0 0 2em">结束日期 <?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('show')->value['promotion_stop'],"%Y-%m-%d %H:%M");?>
</span>
			<?php }?>
		</td>
		<th>国际报价</th>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['INTbid'];?>
 元 / ct</td>
	</tr>
	<tr>
		<th>备注</th>
		<td colspan="3"><?php echo $_smarty_tpl->getVariable('show')->value['userRemark'];?>
</td>
	</tr>
</table>