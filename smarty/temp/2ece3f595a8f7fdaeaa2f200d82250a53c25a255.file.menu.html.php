<?php /* Smarty version Smarty3-b8, created on 2012-04-30 15:13:23
         compiled from "D:\APMServ5.2.6\www\htdocs\shehuahk\backadmin/Template/menu.html" */ ?>
<?php /*%%SmartyHeaderCode:176084f9e3b932d00b2-43646640%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2ece3f595a8f7fdaeaa2f200d82250a53c25a255' => 
    array (
      0 => 'D:\\APMServ5.2.6\\www\\htdocs\\shehuahk\\backadmin/Template/menu.html',
      1 => 1306315990,
    ),
  ),
  'nocache_hash' => '176084f9e3b932d00b2-43646640',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_write_url')) include 'D:\APMServ5.2.6\www\htdocs\shehuahk\smarty\plugins\function.write_url.php';
if (!is_callable('smarty_function_CLASS_COLOR')) include 'D:\APMServ5.2.6\www\htdocs\shehuahk\smarty\plugins\function.CLASS_COLOR.php';
?><ul>
	<?php if ($_smarty_tpl->getVariable('BTP')->value['home']['show']){?><li><a href="<?php echo smarty_function_write_url(array('open'=>'home'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('home'=>$_smarty_tpl->getVariable('get')->value['open'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>首页</a></li><?php }?>
	<?php if ($_smarty_tpl->getVariable('BTP')->value['customSMS']['show']){?><li><a href="<?php echo smarty_function_write_url(array('open'=>'customSMS'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('customSMS'=>$_smarty_tpl->getVariable('get')->value['open'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>自定义群发手机短信 <?php if (count($_smarty_tpl->getVariable('back')->value['customSMS'])){?><b style="color:#09F">(<?php echo count($_smarty_tpl->getVariable('back')->value['customSMS']);?>
)</b><?php }?></a></li><?php }?>
	<?php if ($_smarty_tpl->getVariable('BTP')->value['sms_log']['show']){?><li><a href="<?php echo smarty_function_write_url(array('open'=>'sms_log'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('sms_log'=>$_smarty_tpl->getVariable('get')->value['open'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>短信发送记录</a></li><?php }?>
	<?php if ($_smarty_tpl->getVariable('BTP')->value['administrators']['show']){?><li><a href="<?php echo smarty_function_write_url(array('open'=>'administrators'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('administrators'=>$_smarty_tpl->getVariable('get')->value['open'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>管理员列表</a></li><?php }?>
	<?php if ($_smarty_tpl->getVariable('BTP')->value['service']['show']){?><li><a href="<?php echo smarty_function_write_url(array('open'=>'service'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('service'=>$_smarty_tpl->getVariable('get')->value['open'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>客服管理</a></li><?php }?>
	<?php if ($_smarty_tpl->getVariable('BTP')->value['proxy']['show']){?><li><a href="<?php echo smarty_function_write_url(array('open'=>'proxy'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('proxy'=>$_smarty_tpl->getVariable('get')->value['open'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>代理管理</a></li><?php }?>
	<?php if ($_smarty_tpl->getVariable('BTP')->value['proxy_group']['show']){?><li><a href="<?php echo smarty_function_write_url(array('open'=>'proxy_group'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('proxy_group'=>$_smarty_tpl->getVariable('get')->value['open'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>代理组管理</a></li><?php }?>
	<?php if ($_smarty_tpl->getVariable('BTP')->value['role']['show']){?><li><a href="<?php echo smarty_function_write_url(array('open'=>'role'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('role'=>$_smarty_tpl->getVariable('get')->value['open'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>角色管理</a></li><?php }?>
	<?php if ($_smarty_tpl->getVariable('BTP')->value['bid']['show']){?><li><a href="<?php echo smarty_function_write_url(array('open'=>'bid'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('bid'=>$_smarty_tpl->getVariable('get')->value['open'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>国际报价管理</a></li><?php }?>
	<?php if ($_smarty_tpl->getVariable('BTP')->value['product']['show']){?><li><a href="<?php echo smarty_function_write_url(array('open'=>'product'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('product'=>$_smarty_tpl->getVariable('get')->value['open'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>产品管理</a></li><?php }?>
	<?php if ($_smarty_tpl->getVariable('BTP')->value['orders']['show']){?><li><a href="<?php echo smarty_function_write_url(array('open'=>'orders'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('orders'=>$_smarty_tpl->getVariable('get')->value['open'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>订单管理</a></li><?php }?>
	<?php if ($_smarty_tpl->getVariable('BTP')->value['stock']['show']){?><li><a href="<?php echo smarty_function_write_url(array('open'=>'stock'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('stock'=>$_smarty_tpl->getVariable('get')->value['open'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>库存地址管理</a></li><?php }?>
	<?php if ($_smarty_tpl->getVariable('BTP')->value['logistics']['show']){?><li><a href="<?php echo smarty_function_write_url(array('open'=>'logistics'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('logistics'=>$_smarty_tpl->getVariable('get')->value['open'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>物流状态管理</a></li><?php }?>
	<?php if ($_smarty_tpl->getVariable('BTP')->value['exchange']['show']){?><li><a href="<?php echo smarty_function_write_url(array('open'=>'exchange'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('exchange'=>$_smarty_tpl->getVariable('get')->value['open'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>汇率管理</a></li><?php }?>
	<?php if ($_smarty_tpl->getVariable('BTP')->value['import']['show']){?><li><a href="<?php echo smarty_function_write_url(array('open'=>'import'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('import'=>$_smarty_tpl->getVariable('get')->value['open'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>数据导入</a></li><?php }?>
	<?php if ($_smarty_tpl->getVariable('BTP')->value['news']['show']){?><li><a href="<?php echo smarty_function_write_url(array('open'=>'news'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('news'=>$_smarty_tpl->getVariable('get')->value['open'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>新闻管理</a></li><?php }?>
	<?php if ($_smarty_tpl->getVariable('BTP')->value['API']['show']){?><li><a href="<?php echo smarty_function_write_url(array('open'=>'API'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('API'=>$_smarty_tpl->getVariable('get')->value['open'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>API管理</a></li><?php }?>
	<?php if ($_smarty_tpl->getVariable('back')->value['account']=='simon'){?>
	<li><a href="<?php echo smarty_function_write_url(array('open'=>'city'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('city'=>$_smarty_tpl->getVariable('get')->value['open'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>城市管理(System)</a></li>
	<li><a href="<?php echo smarty_function_write_url(array('open'=>'proxy_purview'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('proxy_purview'=>$_smarty_tpl->getVariable('get')->value['open'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>代理权限表(System)</a></li>
	<li><a href="<?php echo smarty_function_write_url(array('open'=>'service_purview'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('service_purview'=>$_smarty_tpl->getVariable('get')->value['open'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>客服权限表(System)</a></li>
	<li><a href="<?php echo smarty_function_write_url(array('open'=>'back_purview'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('back_purview'=>$_smarty_tpl->getVariable('get')->value['open'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>后台权限表(System)</a></li>
	<?php }?>
	<li><a href="<?php echo smarty_function_write_url(array('open'=>'Quit'),$_smarty_tpl->smarty,$_smarty_tpl);?>
">退出系统</a></li>
</ul>
