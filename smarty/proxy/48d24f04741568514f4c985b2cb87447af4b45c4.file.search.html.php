<?php /* Smarty version Smarty3-b8, created on 2015-07-23 16:51:41
         compiled from "D:\WWW\shehua_hk\diamind/Template/search.html" */ ?>
<?php /*%%SmartyHeaderCode:277855b0ab1d2f8a88-76454983%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '48d24f04741568514f4c985b2cb87447af4b45c4' => 
    array (
      0 => 'D:\\WWW\\shehua_hk\\diamind/Template/search.html',
      1 => 1437641499,
    ),
  ),
  'nocache_hash' => '277855b0ab1d2f8a88-76454983',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_write_url')) include 'D:\WWW\shehua_hk\smarty\plugins\function.write_url.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>奢华国际钻石集团-专业的钻石批发商,全球最大的GIA,IGI,HRD裸钻数据库！</title>
<link href="css/default.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="Pe">
	<div class="head">
		<img src="images/logo.jpg" />
		<span>公司电话<br/>公司地址</span>
	    <span class="company_name"><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'open'=>'home'),$_smarty_tpl->smarty,$_smarty_tpl);?>
"> 首页</a></span>	
	</div>

	<div class="home_pto"><img src="images/home_pto.jpg" /></div>

	<div class="Home_ZHU">
		
		<div class="Z">
			<div class="KUG">
				<div class="Te"><b></b><i></i><span><strong>公司简介 / </strong>Introduce</span></div>
				<div class="Ct">
					<p>奢华国际钻石集团公司，依托南非及国际钻石矿产资源，集钻石毛坯开采、收购、切割、批发于一身，打造了完善、高效、专业的钻石产业链。本公司拥有众多优秀的钻石珠宝专业人才和先进的加工设备，以及完善的经营体系和科学的管理模式。</p>
					<p>我们分别在比利时、印度、纽约、香港、上海、广州、深圳等地设有钻石、首饰等专业大型的加工基地和批发中心。</p>
					<p>欢迎您加入LD国际钻石机构，我们将为您提供专业、专心、诚信、高效的钻石供应服务，使你可以分享到全球优秀钻石商家的钻石资源，为您的珠宝事业开创美好的明天。</p>
				</div>
			</div>
			<i class="clear H10"></i>
			
		</div>
		<div class="Y">
			<div class="KUG">
				<div class="Te"><b></b><i></i><span><strong>钻石代理 / </strong>Diamond Proxy</span><div align="right"> <form action="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'open'=>'home','go'=>'query'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" method="post">
				<input type="text" name="company_name" placeholder="公司名称"/>
		        <input type="text" name="name" placeholder="代理名称" value="" />
				<input type="submit" value="搜索" />
			    </form></div></div>
				<div class="Ct">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr><th>代理名称</th><th>代理编号</th><th>详情</th></tr>
						<?php if ($_smarty_tpl->getVariable('sap_text')->value){?>
						<?php  $_smarty_tpl->tpl_vars['ap'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('sap_text')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['ap']->key => $_smarty_tpl->tpl_vars['ap']->value){
?>
						<tr>
							<td><?php if ($_smarty_tpl->getVariable('ap')->value['company_name']){?><?php echo $_smarty_tpl->getVariable('ap')->value['company_name'];?>
-<?php echo $_smarty_tpl->getVariable('ap')->value['name'];?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('ap')->value['name'];?>
<?php }?></td>
							<td><?php echo $_smarty_tpl->getVariable('ap')->value['number'];?>
</td>
							<td><a href="<?php echo $_smarty_tpl->getVariable('ap')->value['number'];?>
">进入代理页</a></td>
						</tr>
						<?php }} ?>
						<?php }else{ ?>
						<tr class="No_info"><th class="zx"></th><td colspan="31">当前没有你搜索的代理 , <a href="<?php echo smarty_function_write_url(array('open'=>'search'),$_smarty_tpl->smarty,$_smarty_tpl);?>
">点击重新查询</a></td><th class="yx"></th></tr>
						<?php }?>
					</table>
				</div>
				
			</div>
		</div>
	</div>
	<?php $_template = new Smarty_Internal_Template("footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

</div>
</body>
</html>
