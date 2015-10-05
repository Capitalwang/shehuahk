<?php /* Smarty version Smarty3-b8, created on 2012-04-30 10:18:47
         compiled from "D:\APMServ5.2.6\www\htdocs\2011best\shehuahk\wholesale/Template/Quote.html" */ ?>
<?php /*%%SmartyHeaderCode:115914f9df6878357e2-00432641%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3a6c9a8d93f74d12a7a0255e4b7557904488b957' => 
    array (
      0 => 'D:\\APMServ5.2.6\\www\\htdocs\\2011best\\shehuahk\\wholesale/Template/Quote.html',
      1 => 1335752284,
    ),
  ),
  'nocache_hash' => '115914f9df6878357e2-00432641',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_write_url')) include 'D:\APMServ5.2.6\www\htdocs\2011best\shehuahk\smarty\plugins\function.write_url.php';
if (!is_callable('smarty_function_CLASS_COLOR')) include 'D:\APMServ5.2.6\www\htdocs\2011best\shehuahk\smarty\plugins\function.CLASS_COLOR.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LD国际钻石报价表-奢华国际钻石集团-专业的钻石批发商,全球最大的GIA,IGI,HRD裸钻数据库！</title>
<meta name="keywords" content="国际钻石报价表,钻石报价表" />
<meta name="description" content="LD国际钻石报价表让您第一时间掌握世界钻石价格走向，让钻石价格掌握在自己手上，更方便计算出相应的钻石价格！" />
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
