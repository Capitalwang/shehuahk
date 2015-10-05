<?php /* Smarty version Smarty3-b8, created on 2015-09-24 15:04:48
         compiled from "D:\www\shehuahk\wholesale/Template/Quote.html" */ ?>
<?php /*%%SmartyHeaderCode:153085603a090a293e5-66697624%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b7a544198a9ad99a1fd62e40b9fc99c5889f6597' => 
    array (
      0 => 'D:\\www\\shehuahk\\wholesale/Template/Quote.html',
      1 => 1443075446,
    ),
  ),
  'nocache_hash' => '153085603a090a293e5-66697624',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_write_url')) include 'D:\www\shehuahk\smarty\plugins\function.write_url.php';
if (!is_callable('smarty_function_CLASS_COLOR')) include 'D:\www\shehuahk\smarty\plugins\function.CLASS_COLOR.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<title>LD国际钻石报价表-奢华国际钻石集团-专业的钻石批发商,全球最大的GIA,IGI,HRD裸钻数据库！</title>
<meta name="keywords" content="国际钻石报价表,钻石报价表" />
<meta name="description" content="LD国际钻石报价表让您第一时间掌握世界钻石价格走向，让钻石价格掌握在自己手上，更方便计算出相应的钻石价格！" />

<script type="text/javascript" src="Js/default.js"></script>
<script type="text/javascript" src="Js/Quote.js"></script>
<link href="css/kh-index.css" rel="stylesheet" type="text/css" />

<script src="http://libs.baidu.com/jquery/1.10.2/jquery.min.js"></script>
<style type="text/css">
	.Pe{
		width: 980px;
		margin: 0 auto;
	}

@media screen and (max-width: 980px) {
	.Pe{
		width:100%;}
	.Pe .dl{
		width:100%;
		margin: 0 auto !important;
	}
	.Pe .gray{
		padding: 0;
	}
}
@media screen and (max-width: 768px) {
	.Pe{
		font-size: 0.8em;
	}
	.Pe dd a{
		padding:5px 5px !important;
	}
	.Pe dt a{
		display: none;
	}
}
@media screen and (max-width: 500px) {
	.Pe .gray{
		width: 500px !important;
	}

}

</style>

</head>

<body>
<header>
    <div class="box head-box">
        <img class="index-img" src="images/logo1.jpg" alt="奢华国际钻石集团"/>
        <span id="heid" style="background:url(images/anniu.png);"></span>
        <div class="head">
            <?php $_template = new Smarty_Internal_Template("nav.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

       </div>
   </div>
</header>

<div class="Pe">

	<div class="gray quote" >
	
		<dl class="dl">

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
</div>
<footer>
    <?php $_template = new Smarty_Internal_Template("foot.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

</footer>
<script type="text/javascript" src="Js/hk.js"></script>
</body>
</html>
