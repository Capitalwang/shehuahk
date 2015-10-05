<?php /* Smarty version Smarty3-b8, created on 2015-09-24 14:19:37
         compiled from "D:\www\shehuahk\wholesale/Template/news_list.html" */ ?>
<?php /*%%SmartyHeaderCode:12786560395f9692fc6-03479753%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '984445d7e1f10693e09cf2bf246773e7153de54a' => 
    array (
      0 => 'D:\\www\\shehuahk\\wholesale/Template/news_list.html',
      1 => 1443075452,
    ),
  ),
  'nocache_hash' => '12786560395f9692fc6-03479753',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_write_url')) include 'D:\www\shehuahk\smarty\plugins\function.write_url.php';
if (!is_callable('smarty_modifier_date_format')) include 'D:\www\shehuahk\smarty\plugins\modifier.date_format.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<title>全球钻石资讯-奢华国际钻石集团-专业的钻石批发商,全球最大的GIA,IGI,HRD裸钻数据库！</title>
<meta name="keywords" content="全球钻石资讯,LD钻石资讯" />
<meta name="description" content="全球专业的钻石资讯集合于LD国际钻石集团，为您提供更便捷、更直观的钻石资讯通道!让你第一时间和国际钻石接轨！" />
<!-- <link href="css/default.css" rel="stylesheet" type="text/css" /> -->
<link href="css/kh-index.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="Js/string.js"></script>
<script type="text/javascript" src="Js/default.js"></script>
<script src="http://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>

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

	<div class="gray">
		<ul class="N_lt">
		<?php  $_smarty_tpl->tpl_vars['pso'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('list_text')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['pso']->key => $_smarty_tpl->tpl_vars['pso']->value){
?>
			<li>
				<a href="<?php echo smarty_function_write_url(array('open'=>'news','action'=>'view','id'=>$_smarty_tpl->getVariable('pso')->value['id']),$_smarty_tpl->smarty,$_smarty_tpl);?>
"><?php echo $_smarty_tpl->getVariable('pso')->value['title'];?>
</a>[<?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('pso')->value['uptime'],'%Y-%m-%d');?>
]
				<span><?php echo $_smarty_tpl->getVariable('pso')->value['bewrite'];?>
</span>
			</li>
		<?php }} ?>
		</ul>
		<?php if ($_smarty_tpl->getVariable('list_page')->value['Record']>0){?>
		<div class="Page">
			<span>
				当前第<?php echo $_smarty_tpl->getVariable('list_page')->value['NowPage'];?>
页 / 共<?php echo $_smarty_tpl->getVariable('list_page')->value['count'];?>
页
				<?php if ($_smarty_tpl->getVariable('list_page')->value['NowPage']>1){?><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'page'=>'1'),$_smarty_tpl->smarty,$_smarty_tpl);?>
">首页</a><?php }else{ ?>首页<?php }?>
				<?php if ($_smarty_tpl->getVariable('list_page')->value['NowPage']>1){?><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'page'=>$_smarty_tpl->getVariable('list_page')->value['up']),$_smarty_tpl->smarty,$_smarty_tpl);?>
">上一页</a><?php }else{ ?>上一页<?php }?>
				<?php if ($_smarty_tpl->getVariable('list_page')->value['NowPage']<$_smarty_tpl->getVariable('list_page')->value['count']){?><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'page'=>$_smarty_tpl->getVariable('list_page')->value['down']),$_smarty_tpl->smarty,$_smarty_tpl);?>
">下一页</a><?php }else{ ?>下一页<?php }?>
				<?php if ($_smarty_tpl->getVariable('list_page')->value['NowPage']<$_smarty_tpl->getVariable('list_page')->value['count']){?><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'page'=>$_smarty_tpl->getVariable('list_page')->value['count']),$_smarty_tpl->smarty,$_smarty_tpl);?>
">尾页</a><?php }else{ ?>尾页<?php }?>
				至<input type="text" value="<?php echo $_smarty_tpl->getVariable('list_page')->value['NowPage'];?>
" onkeydown="go_page(event , this , '<?php echo $_smarty_tpl->getVariable('thisurl')->value;?>
' , <?php echo $_smarty_tpl->getVariable('list_page')->value['count'];?>
)" />页
			</span>
		</div>
		<?php }?>
	</div>
</div>

<footer>
    <?php $_template = new Smarty_Internal_Template("foot.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
   
</footer>
<script type="text/javascript" src="Js/hk.js"></script>
</body>
</html>
