<?php /* Smarty version Smarty3-b8, created on 2011-05-25 16:16:36
         compiled from "D:\htdocs\yulog.net.shehua\proxy/Template/news_view.html" */ ?>
<?php /*%%SmartyHeaderCode:300104ddcbae46c77c2-41742674%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd65fee4ecd21abccb8d82fa4b0fe18d6a3568770' => 
    array (
      0 => 'D:\\htdocs\\yulog.net.shehua\\proxy/Template/news_view.html',
      1 => 1305863993,
    ),
  ),
  'nocache_hash' => '300104ddcbae46c77c2-41742674',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_Reverts')) include 'D:\htdocs\yulog.net.shehua\smarty\plugins\function.Reverts.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>奢华</title>
<link href="css/default.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="Pe">
	<div class="head">
		<img src="images/logo.jpg" />
		<?php $_template = new Smarty_Internal_Template("nav.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

	</div>
	<div class="gray News">
		<strong class="t"><?php echo $_smarty_tpl->getVariable('show')->value['title'];?>
</strong>
		<p class="s"><?php echo $_smarty_tpl->getVariable('show')->value['bewrite'];?>
</p>
		<div class="content"><?php echo smarty_function_Reverts(array('str'=>$_smarty_tpl->getVariable('show')->value['content']),$_smarty_tpl->smarty,$_smarty_tpl);?>
</div>
	</div>
	<?php $_template = new Smarty_Internal_Template("foot.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

</div>
</body>
</html>
