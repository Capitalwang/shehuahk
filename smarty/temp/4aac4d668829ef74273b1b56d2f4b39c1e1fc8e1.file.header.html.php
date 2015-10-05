<?php /* Smarty version Smarty3-b8, created on 2015-07-20 11:10:35
         compiled from "D:\WWW\shehua_hk\backadmin/Template/header.html" */ ?>
<?php /*%%SmartyHeaderCode:1379855ac66ab4cebf1-51034906%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4aac4d668829ef74273b1b56d2f4b39c1e1fc8e1' => 
    array (
      0 => 'D:\\WWW\\shehua_hk\\backadmin/Template/header.html',
      1 => 1437359489,
    ),
  ),
  'nocache_hash' => '1379855ac66ab4cebf1-51034906',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_write_url')) include 'D:\WWW\shehua_hk\smarty\plugins\function.write_url.php';
?><div class="header">
	<b class="title"><?php echo @Site_Name;?>
</b>
	<?php if (($_smarty_tpl->getVariable('BTP')->value['cart']['show']&&count($_smarty_tpl->getVariable('back')->value['cart']))||($_smarty_tpl->getVariable('BTP')->value['product_to_CSV']['show']&&count($_smarty_tpl->getVariable('back')->value['product_to_CSV']))||($_smarty_tpl->getVariable('BTP')->value['product_sms']['show']&&count($_smarty_tpl->getVariable('back')->value['P_SMS']['pro']))||($_smarty_tpl->getVariable('BTP')->value['proxy_sms']['show']&&count($_smarty_tpl->getVariable('back')->value['Pxy_SMS']))){?>
	<?php if ($_smarty_tpl->getVariable('BTP')->value['cart']['show']&&count($_smarty_tpl->getVariable('back')->value['cart'])){?><span class="car"><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'open'=>'cart','DEL'=>'ALL'),$_smarty_tpl->smarty,$_smarty_tpl);?>
"><span class="act_4_1"></span>购物车 (<b><?php echo count($_smarty_tpl->getVariable('back')->value['cart']);?>
</b>)</a></span><?php }?>
	<?php if ($_smarty_tpl->getVariable('BTP')->value['product_to_CSV']['show']&&count($_smarty_tpl->getVariable('back')->value['product_to_CSV'])){?><span class="car"><a href="<?php echo smarty_function_write_url(array('open'=>'product_to_CSV'),$_smarty_tpl->smarty,$_smarty_tpl);?>
"><span class="act_5_1"></span>产品导出CSV (<b><?php echo count($_smarty_tpl->getVariable('back')->value['product_to_CSV']);?>
</b>)</a></span><?php }?>
	<?php if ($_smarty_tpl->getVariable('BTP')->value['product_sms']['show']&&count($_smarty_tpl->getVariable('back')->value['P_SMS']['pro'])){?><span class="car"><a href="<?php echo smarty_function_write_url(array('open'=>'product_sms'),$_smarty_tpl->smarty,$_smarty_tpl);?>
"><span class="act_1_13"></span>代理群发产品短信 (<b><?php echo count($_smarty_tpl->getVariable('back')->value['P_SMS']['pro']);?>
 , <?php echo count($_smarty_tpl->getVariable('back')->value['P_SMS']['proxy']);?>
</b>)</a></span><?php }?>
	<?php if ($_smarty_tpl->getVariable('BTP')->value['proxy_sms']['show']&&count($_smarty_tpl->getVariable('back')->value['Pxy_SMS'])){?><span class="car"><a href="<?php echo smarty_function_write_url(array('open'=>'proxy_sms'),$_smarty_tpl->smarty,$_smarty_tpl);?>
"><span class="act_1_12"></span>代理群发手机短信 (<b><?php echo count($_smarty_tpl->getVariable('back')->value['Pxy_SMS']);?>
</b>)</a></span><?php }?>
	<span class="clear"></span>
	<?php }else{ ?>
	<div style="height:2em"></div>
	<?php }?>
</div>
