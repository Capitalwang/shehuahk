<?php /* Smarty version Smarty3-b8, created on 2011-05-31 15:13:54
         compiled from "D:\web\vhosts\shehua.hk\wholesale/Template/orders_product_detail.html" */ ?>
<?php /*%%SmartyHeaderCode:197134de49532f10bd5-14875548%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '24ab32cc6509b409c694e4d8b73268190f82e3bb' => 
    array (
      0 => 'D:\\web\\vhosts\\shehua.hk\\wholesale/Template/orders_product_detail.html',
      1 => 1306308575,
    ),
  ),
  'nocache_hash' => '197134de49532f10bd5-14875548',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\web\vhosts\shehua.hk\smarty\plugins\modifier.date_format.php';
if (!is_callable('smarty_function_Goto_diploma')) include 'D:\web\vhosts\shehua.hk\smarty\plugins\function.Goto_diploma.php';
?><table border="0" cellspacing="1" cellpadding="0" width="100%"  class="dil">
	<tr>
		<th width="10%">产品编号</th>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['info']['ProID'];?>
</td>
		<th width="10%">审核时间</th>
		<td><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('show')->value['time'],"%Y-%m-%d %H:%M:%S");?>
</td>
	</tr>
	<tr>
		<th>售价</th>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['price'];?>
 元</td>
		<th>数量</th>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['amount'];?>
</td>
	</tr>
	<tr>
		<th>促销</th>
		<td><?php if ($_smarty_tpl->getVariable('show')->value['is_promotion']=='N'){?>否<?php }else{ ?>是<?php }?></td>
		<th>国际报价</th>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['info']['INTbid'];?>
 元 / ct</td>
	</tr>
	<tr>
		<th>形状</th>
		<td><?php echo $_smarty_tpl->getVariable('shape')->value[$_smarty_tpl->getVariable('show')->value['info']['shape']];?>
 (<?php echo $_smarty_tpl->getVariable('show')->value['info']['shape'];?>
)</td>
		<th>重量</th>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['info']['weight'];?>
 ct</td>
	</tr>
	<tr>
		<th>颜色</th>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['info']['color'];?>
</td>
		<th>净度</th>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['info']['clarity'];?>
</td>
	</tr>
	<tr>
		<th>切工</th>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['info']['cut'];?>
</td>
		<th>抛光</th>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['info']['buffing'];?>
</td>
	</tr>
	<tr>
		<th>对称</th>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['info']['symmetry'];?>
</td>
		<th>荧光强度</th>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['info']['Fent_Isity'];?>
</td>
	</tr>
	<tr>
		<th>荧光颜色</th>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['info']['Fent_color'];?>
</td>
		<th>测量值</th>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['info']['scalar_value'];?>
</td>
	</tr>
	<tr>
		<th>全身比</th>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['info']['body_ratio'];?>
 %</td>
		<th>台宽比</th>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['info']['table_width'];?>
 %</td>
	</tr>
	<tr>
		<th>证书类型</th>
		<td><?php echo $_smarty_tpl->getVariable('show')->value['info']['diploma'];?>
</td>
		<th>证书编号</th>
		<td><?php echo smarty_function_Goto_diploma(array('diploma'=>$_smarty_tpl->getVariable('show')->value['info']['diploma'],'weight'=>$_smarty_tpl->getVariable('show')->value['info']['weight'],'NO'=>$_smarty_tpl->getVariable('show')->value['info']['diplomaNO'],'show'=>$_smarty_tpl->getVariable('show')->value['info']['diplomaNO']),$_smarty_tpl->smarty,$_smarty_tpl);?>
</td>
	</tr>
</table>