<?php /* Smarty version Smarty3-b8, created on 2015-09-24 14:18:38
         compiled from "D:\www\shehuahk\wholesale/Template/home.html" */ ?>
<?php /*%%SmartyHeaderCode:9121560395be4ac7b2-79947741%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e7d403f71be50bb7b98b992c21b8421d1b840205' => 
    array (
      0 => 'D:\\www\\shehuahk\\wholesale/Template/home.html',
      1 => 1443075465,
    ),
  ),
  'nocache_hash' => '9121560395be4ac7b2-79947741',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_write_url')) include 'D:\www\shehuahk\smarty\plugins\function.write_url.php';
?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<title>奢华国际钻石集团-专业的钻石批发商,全球最大的GIA,IGI,HRD裸钻数据库！</title>
<!-- <link href="css/default.css" rel="stylesheet" type="text/css" /> -->
<link href="css/kh-index.css" rel="stylesheet" type="text/css" />
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

<!-- <div class="Pe">

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
			<div class="KUG">
				<div class="Te"><b></b><i></i><span><strong>最新资讯 / </strong>News</span><a href="<?php echo smarty_function_write_url(array('open'=>'news'),$_smarty_tpl->smarty,$_smarty_tpl);?>
">More...</a></div>
				<div class="Ct">
					<ul>
					<?php  $_smarty_tpl->tpl_vars['pso'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('NEWS')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['pso']->key => $_smarty_tpl->tpl_vars['pso']->value){
?>
						<li><a href="<?php echo smarty_function_write_url(array('open'=>'news','action'=>'view','id'=>$_smarty_tpl->getVariable('pso')->value['id']),$_smarty_tpl->smarty,$_smarty_tpl);?>
"><?php echo $_smarty_tpl->getVariable('pso')->value['title'];?>
</a><span><?php echo $_smarty_tpl->getVariable('pso')->value['bewrite'];?>
</span></li>
					<?php }} ?>
					</ul>
				</div>
			</div>
		</div>
		<div class="Y">
			<div class="KUG">
				<div class="Te"><b></b><i></i><span><strong>每日特价 / </strong>Diamond Specials</span><a href="<?php echo smarty_function_write_url(array('open'=>'SP'),$_smarty_tpl->smarty,$_smarty_tpl);?>
">More...</a></div>
				<div class="Ct">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr><th>编号</th><th>重量</th><th>颜色</th><th>净度</th><th>切工</th><th>抛光</th><th>对称</th><th>退点</th><th>促销价格</th></tr>
						<?php  $_smarty_tpl->tpl_vars['pso'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['sy'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('special_price')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['pso']->key => $_smarty_tpl->tpl_vars['pso']->value){
 $_smarty_tpl->tpl_vars['sy']->value = $_smarty_tpl->tpl_vars['pso']->key;
?>
						<tr <?php if ($_smarty_tpl->getVariable('sy')->value%2==0){?>class="bg"<?php }?>>
							<td><?php echo $_smarty_tpl->getVariable('pso')->value['ProID'];?>
</td><td><?php echo $_smarty_tpl->getVariable('pso')->value['weight'];?>
</td><td><?php echo $_smarty_tpl->getVariable('pso')->value['color'];?>
</td><td><?php echo $_smarty_tpl->getVariable('pso')->value['clarity'];?>
</td><td><?php echo $_smarty_tpl->getVariable('pso')->value['cut'];?>
</td><td><?php echo $_smarty_tpl->getVariable('pso')->value['buffing'];?>
</td><td><?php echo $_smarty_tpl->getVariable('pso')->value['symmetry'];?>
</td><td><?php echo sprintf('%.2f',$_smarty_tpl->getVariable('pso')->value['agio']);?>
</td><td><?php echo sprintf('%.2f',$_smarty_tpl->getVariable('pso')->value['INTbid']*$_smarty_tpl->getVariable('pso')->value['weight']*(100+$_smarty_tpl->getVariable('pso')->value['agio'])/100);?>
元</td>
						</tr>
						<?php }} ?>
					</table>
				</div>
			</div>
		</div>
	</div>
</div> -->

<center>
	<div class="home_pto">
    <img src="images/home_pto1.jpg" alt=""/>
    </div>
	<div class="Home_ZHU">    
			<div class="right">
				<div class="Te">
                	<b></b><i></i>
                    <span><strong>每日特价 / </strong>Diamond Specials</span>
                   	<a href="<?php echo smarty_function_write_url(array('open'=>'SP'),$_smarty_tpl->smarty,$_smarty_tpl);?>
">More...</a>
                </div>
				<div class="Ct">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr><th>编号</th><th>重量</th><th>颜色</th><th class="ct-h1">净度</th><th class="ct-h1">切工</th><th class="ct-h1">抛光</th><th class="ct-h1">对称</th><th>退点</th><th>促销价格</th></tr>
						<?php  $_smarty_tpl->tpl_vars['pso'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['sy'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('special_price')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['pso']->key => $_smarty_tpl->tpl_vars['pso']->value){
 $_smarty_tpl->tpl_vars['sy']->value = $_smarty_tpl->tpl_vars['pso']->key;
?>
						<tr <?php if ($_smarty_tpl->getVariable('sy')->value%2==0){?>class="bg"<?php }?>>
							<td><?php echo $_smarty_tpl->getVariable('pso')->value['ProID'];?>
</td>
                            <td><?php echo $_smarty_tpl->getVariable('pso')->value['weight'];?>
</td>
                            <td><?php echo $_smarty_tpl->getVariable('pso')->value['color'];?>
</td>
                            <td class="ct-h1"><?php echo $_smarty_tpl->getVariable('pso')->value['clarity'];?>
</td>
                            <td class="ct-h1"><?php echo $_smarty_tpl->getVariable('pso')->value['cut'];?>
</td>
                            <td class="ct-h1"><?php echo $_smarty_tpl->getVariable('pso')->value['buffing'];?>
</td>
                            <td class="ct-h1"><?php echo $_smarty_tpl->getVariable('pso')->value['symmetry'];?>
</td>
                            <td><?php echo sprintf('%.2f',$_smarty_tpl->getVariable('pso')->value['agio']);?>
</td>
                            <td><?php echo sprintf('%.2f',$_smarty_tpl->getVariable('pso')->value['INTbid']*$_smarty_tpl->getVariable('pso')->value['weight']*(100+$_smarty_tpl->getVariable('pso')->value['agio'])/100);?>
元</td>
						</tr>
						<?php }} ?>						
					</table>
				</div>
		</div>
	
			<div class="left">
				<div class="Te"><b></b><i></i><span><strong>公司简介 / </strong>Introduce</span>
                </div>
				<div class="Ct">
					<p >奢华国际钻石集团公司，依托南非及国际钻石矿产资源，集钻石毛坯开采、收购、切割、批发于一身，打造了完善、高效、专业的钻石产业链。本公司拥有众多优秀的钻石珠宝专业人才和先进的加工设备，以及完善的经营体系和科学的管理模式。</p>
					<p>我们分别在比利时、印度、纽约、香港、上海、广州、深圳等地设有钻石、首饰等专业大型的加工基地和批发中心。</p>
					<p>欢迎您加入LD国际钻石机构，我们将为您提供专业、专心、诚信、高效的钻石供应服务，使你可以分享到全球优秀钻石商家的钻石资源，为您的珠宝事业开创美好的明天。</p>
				</div>
                
                <div class="news" style="margin-top:20px;">
                
				<div class="Te"><b></b><i></i><span><strong>最新资讯 / </strong>News</span><a href="<?php echo smarty_function_write_url(array('open'=>'news'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" >More...</a>
                </div>
				<div class="Ct">
					<ul>
					<?php  $_smarty_tpl->tpl_vars['pso'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('NEWS')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['pso']->key => $_smarty_tpl->tpl_vars['pso']->value){
?>
						<li style="list-style-type:none;"><a href="<?php echo smarty_function_write_url(array('open'=>'news','action'=>'view','id'=>$_smarty_tpl->getVariable('pso')->value['id']),$_smarty_tpl->smarty,$_smarty_tpl);?>
"><?php echo $_smarty_tpl->getVariable('pso')->value['title'];?>
</a><span><?php echo $_smarty_tpl->getVariable('pso')->value['bewrite'];?>
</span></li>
					<?php }} ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</center>

<footer>
    <?php $_template = new Smarty_Internal_Template("foot.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
   
</footer>
<script type="text/javascript" src="Js/hk.js"></script>
</body>
</html>
