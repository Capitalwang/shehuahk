<?php /* Smarty version Smarty3-b8, created on 2011-05-26 12:03:01
         compiled from "D:\htdocs\yulog.net.shehua\wholesale/Template/nav.html" */ ?>
<?php /*%%SmartyHeaderCode:64124dddd0f5842f18-89299999%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2a7cad35b4f12e154b591730698974f59a16be92' => 
    array (
      0 => 'D:\\htdocs\\yulog.net.shehua\\wholesale/Template/nav.html',
      1 => 1306300147,
    ),
  ),
  'nocache_hash' => '64124dddd0f5842f18-89299999',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_write_url')) include 'D:\htdocs\yulog.net.shehua\smarty\plugins\function.write_url.php';
if (!is_callable('smarty_function_CLASS_COLOR')) include 'D:\htdocs\yulog.net.shehua\smarty\plugins\function.CLASS_COLOR.php';
?><?php if ($_smarty_tpl->getVariable('proxy')->value['id']){?>
<span>
	<?php if ($_smarty_tpl->getVariable('proxy')->value['name']){?><?php echo $_smarty_tpl->getVariable('proxy')->value['name'];?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('proxy')->value['account'];?>
<?php }?> , 欢迎你登录 . 
	<?php $_smarty_tpl->assign('c_cart',count($_smarty_tpl->getVariable('proxy')->value['cart']),null,null);?><?php if ($_smarty_tpl->getVariable('c_cart')->value){?><a href="<?php echo smarty_function_write_url(array('open'=>'cart'),$_smarty_tpl->smarty,$_smarty_tpl);?>
">购物车 (<?php echo $_smarty_tpl->getVariable('c_cart')->value;?>
)</a><?php }?>
	<a href="<?php echo smarty_function_write_url(array('open'=>'Quit'),$_smarty_tpl->smarty,$_smarty_tpl);?>
">退出系统</a>
</span>
<?php }?>
<ul>
	<li><a href="<?php echo smarty_function_write_url(array('open'=>'home'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('home'=>$_smarty_tpl->getVariable('get')->value['open'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>首页</a></li>
	<li><a href="<?php echo smarty_function_write_url(array('open'=>'news'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('news'=>$_smarty_tpl->getVariable('get')->value['open'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>全球资讯</a></li>
	<li><a href="<?php echo smarty_function_write_url(array('open'=>'Quote'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('Quote'=>$_smarty_tpl->getVariable('get')->value['open'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>国际报价</a></li>
	<li><a href="<?php echo smarty_function_write_url(array('open'=>'SP'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('SP'=>$_smarty_tpl->getVariable('get')->value['open'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>每日特价</a></li>
	<li><a href="<?php echo smarty_function_write_url(array('open'=>'Query'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('Query'=>$_smarty_tpl->getVariable('get')->value['open'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>现货查询</a></li>
	<li><a href="<?php echo smarty_function_write_url(array('open'=>'me'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('me'=>$_smarty_tpl->getVariable('get')->value['open'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>我的专区</a></li>
</ul>