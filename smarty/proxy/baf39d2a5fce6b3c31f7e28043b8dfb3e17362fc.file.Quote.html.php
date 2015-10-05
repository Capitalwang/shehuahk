<?php /* Smarty version Smarty3-b8, created on 2011-05-26 12:41:47
         compiled from "D:\htdocs\yulog.net.shehua\wholesale/Template/Quote.html" */ ?>
<?php /*%%SmartyHeaderCode:271324dddda0be96688-48816461%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'baf39d2a5fce6b3c31f7e28043b8dfb3e17362fc' => 
    array (
      0 => 'D:\\htdocs\\yulog.net.shehua\\wholesale/Template/Quote.html',
      1 => 1306134264,
    ),
  ),
  'nocache_hash' => '271324dddda0be96688-48816461',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_write_url')) include 'D:\htdocs\yulog.net.shehua\smarty\plugins\function.write_url.php';
if (!is_callable('smarty_function_CLASS_COLOR')) include 'D:\htdocs\yulog.net.shehua\smarty\plugins\function.CLASS_COLOR.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>奢华</title>
<link href="css/default.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="Js/default.js"></script>
<script type="text/javascript" src="Js/Quote.js"></script>
</head>

<body>
<div class="Pe">
	<div class="head">
		<img src="images/logo.jpg" />
		<?php $_template = new Smarty_Internal_Template("nav.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

	</div>
	<div class="gray quote">
		<dl>
			<dt><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'Prints','exchange'=>$_smarty_tpl->getVariable('get')->value['exchange']),$_smarty_tpl->smarty,$_smarty_tpl);?>
" class="Print" target="_<?php echo $_smarty_tpl->getVariable('get')->value['exchange'];?>
">打印 (<?php echo $_smarty_tpl->getVariable('get')->value['exchange'];?>
) 报价</a></dt>
			<dd>
				<a href="<?php echo smarty_function_write_url(array('open'=>'Quote','exchange'=>'USD'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('USD'=>$_smarty_tpl->getVariable('get')->value['exchange'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>美元</a>
				<a href="<?php echo smarty_function_write_url(array('open'=>'Quote','exchange'=>'CNY'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('CNY'=>$_smarty_tpl->getVariable('get')->value['exchange'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>人民币</a>
				<a href="<?php echo smarty_function_write_url(array('open'=>'Quote','exchange'=>'HKD'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('HKD'=>$_smarty_tpl->getVariable('get')->value['exchange'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>港元</a>
				<a href="<?php echo smarty_function_write_url(array('open'=>'Quote','exchange'=>'TWD'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('TWD'=>$_smarty_tpl->getVariable('get')->value['exchange'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>台币</a>
				<a href="<?php echo smarty_function_write_url(array('open'=>'Quote','exchange'=>'JPY'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('JPY'=>$_smarty_tpl->getVariable('get')->value['exchange'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>日元</a>
				<a href="<?php echo smarty_function_write_url(array('open'=>'Quote','exchange'=>'EUR'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('EUR'=>$_smarty_tpl->getVariable('get')->value['exchange'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>欧元</a>
				<a href="<?php echo smarty_function_write_url(array('open'=>'Quote','exchange'=>'GBP'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('GBP'=>$_smarty_tpl->getVariable('get')->value['exchange'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>英镑</a>
			</dd>
		</dl>
		<?php echo $_smarty_tpl->getVariable('html')->value;?>

	</div>
	<?php $_template = new Smarty_Internal_Template("foot.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

</div>
</body>
</html>
