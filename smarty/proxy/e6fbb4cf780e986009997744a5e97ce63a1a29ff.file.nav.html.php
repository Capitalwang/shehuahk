<?php /* Smarty version Smarty3-b8, created on 2015-09-24 14:32:56
         compiled from "D:\www\shehuahk\wholesale/Template/nav.html" */ ?>
<?php /*%%SmartyHeaderCode:534356039918232131-86299464%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e6fbb4cf780e986009997744a5e97ce63a1a29ff' => 
    array (
      0 => 'D:\\www\\shehuahk\\wholesale/Template/nav.html',
      1 => 1443076351,
    ),
  ),
  'nocache_hash' => '534356039918232131-86299464',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_write_url')) include 'D:\www\shehuahk\smarty\plugins\function.write_url.php';
if (!is_callable('smarty_function_CLASS_COLOR')) include 'D:\www\shehuahk\smarty\plugins\function.CLASS_COLOR.php';
?>
<link href="css/default1.css" rel="stylesheet" type="text/css" />
<?php if ($_smarty_tpl->getVariable('proxy')->value['id']){?>
<span id="display_none">
    <span style="color:#fff;"><?php if ($_smarty_tpl->getVariable('proxy')->value['name']){?><?php echo $_smarty_tpl->getVariable('proxy')->value['name'];?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('proxy')->value['account'];?>
<?php }?> , 欢迎您! </span>
	<!--<a href="../diamind/?open=home&action=search&page=1&token=<?php echo $_smarty_tpl->getVariable('proxy')->value['id'];?>
&nid=<?php echo $_smarty_tpl->getVariable('proxy')->value['number'];?>
" target="_blank">前往前台</a> -->
	<a class="red" href="<?php echo smarty_function_write_url(array('open'=>'Quit'),$_smarty_tpl->smarty,$_smarty_tpl);?>
">退出系统</a>
</span>
<?php }else{ ?>
<?php }?>
<ul class="company_nav">
	<li><a href="<?php echo smarty_function_write_url(array('open'=>'home'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('home'=>$_smarty_tpl->getVariable('get')->value['open'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>首页</a></li>
	<li><a href="<?php echo smarty_function_write_url(array('open'=>'LD'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('LD'=>$_smarty_tpl->getVariable('get')->value['open'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>LD集团</a></li>
	<li><a href="<?php echo smarty_function_write_url(array('open'=>'news'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('news'=>$_smarty_tpl->getVariable('get')->value['open'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>全球资讯</a></li>
	<li><a id="ch" href="<?php echo smarty_function_write_url(array('open'=>'Quote'),$_smarty_tpl->smarty,$_smarty_tpl);?>
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
	<li><a href="../diamind/?open=home&action=search&page=1&token=<?php echo $_smarty_tpl->getVariable('proxy')->value['id'];?>
&nid=<?php echo $_smarty_tpl->getVariable('proxy')->value['number'];?>
" target="_blank">前往前台</a></li>
</ul>