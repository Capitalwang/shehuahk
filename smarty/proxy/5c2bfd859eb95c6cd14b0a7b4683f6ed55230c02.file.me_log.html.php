<?php /* Smarty version Smarty3-b8, created on 2015-10-10 15:10:23
         compiled from "D:\www\shehuahk\wholesale/Template/me_log.html" */ ?>
<?php /*%%SmartyHeaderCode:218015618b9df974c18-31999094%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5c2bfd859eb95c6cd14b0a7b4683f6ed55230c02' => 
    array (
      0 => 'D:\\www\\shehuahk\\wholesale/Template/me_log.html',
      1 => 1443075338,
    ),
  ),
  'nocache_hash' => '218015618b9df974c18-31999094',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\www\shehuahk\smarty\plugins\modifier.date_format.php';
if (!is_callable('smarty_function_write_url')) include 'D:\www\shehuahk\smarty\plugins\function.write_url.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<title>奢华</title>
<link href="css/me1.css" rel="stylesheet" type="text/css" />
<link href="css/kh-index.css" rel="stylesheet" type="text/css" />

<script src="http://libs.baidu.com/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="Js/string.js"></script>
<script type="text/javascript" src="Js/default.js"></script>
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

<div class="me_home">
	<div class="me_gray">
    	<span id="left_hied"></span>
		<div class="me_let">
        <div>您好！欢迎进入在线库存中心</div>
			<?php $_template = new Smarty_Internal_Template("me_nav.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

		</div>
		
		<div class="me_Ys">
			<div class="me_foe">
				<table width="100%" border="0" cellspacing="0" cellpadding="0" class="me_log">
					<tr>
						<td style="text-align:center">时间</td>
						<td style="text-align:center">说明</td>
					</tr>
					<?php  $_smarty_tpl->tpl_vars['pso'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('list_text')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['pso']->key => $_smarty_tpl->tpl_vars['pso']->value){
?>
					<tr>
						<td align="center"><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('pso')->value['time'],"%Y-%m-%d %H:%M:%S");?>
</td>
						<td><?php echo $_smarty_tpl->getVariable('pso')->value['show'];?>
</td>
					</tr>
					<?php }} else { ?>
					<tr class="No_info"><td colspan="2">当前代理没有日志</td></tr>
					<?php } ?>
				</table>
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
		<i class="clear"></i>
	</div>

</div>
<footer>
    <?php $_template = new Smarty_Internal_Template("foot.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

</footer>
<script type="text/javascript" src="Js/hk.js"></script>
</body>
</html>
