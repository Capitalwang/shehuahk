<?php /* Smarty version Smarty3-b8, created on 2015-09-24 17:07:17
         compiled from "D:\www\shehuahk\wholesale/Template/me_info.html" */ ?>
<?php /*%%SmartyHeaderCode:323575603bd458f7660-34468728%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9fa07e80bdc2d8b9912dce7a6d3df294ea6104c1' => 
    array (
      0 => 'D:\\www\\shehuahk\\wholesale/Template/me_info.html',
      1 => 1443085576,
    ),
  ),
  'nocache_hash' => '323575603bd458f7660-34468728',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
﻿<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<title>奢华</title>
<link href="css/me1.css" rel="stylesheet" type="text/css" />
<link href="css/kh-index.css" rel="stylesheet" type="text/css" />

<script src="http://libs.baidu.com/jquery/1.10.2/jquery.min.js"></script>


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
					<tr><th colspan="2" class="te">我的资讯</th></tr>
					<tr><th width="45%">编号</th><td><?php echo $_smarty_tpl->getVariable('show')->value['number'];?>
</th></tr>
					<tr><th>账号</th><td><?php echo $_smarty_tpl->getVariable('show')->value['account'];?>
</td></tr>
					<tr><th>*真实姓名</th><td><?php echo $_smarty_tpl->getVariable('show')->value['name'];?>
</td></tr>
					<tr><th>*昵称</th><td><?php echo $_smarty_tpl->getVariable('show')->value['nickname'];?>
</td></tr>
					<tr><th>余款</th><td><?php echo $_smarty_tpl->getVariable('show')->value['money'];?>
 元</td></tr>
					<!--<tr>
						<th>手机短信</th>
						<td><?php if ($_smarty_tpl->getVariable('show')->value['is_SMS']=='Y'){?>开启<span style="color:#09F;margin:0 0 0 2em"><?php echo $_smarty_tpl->getVariable('proxy')->value['sms_price'];?>
 / 条</span><?php }else{ ?>关闭<?php }?></td>
					</tr>-->
				   
					<tr><th>Logo</th><td><img style="width:80px;height:50px;"  src="<?php echo $_smarty_tpl->getVariable('show')->value['company_logo'];?>
" /><br/>*建议高宽：140*320px<br/><?php echo $_smarty_tpl->getVariable('show')->value['company_logo'];?>
</td></tr>
					<tr><th>*公司名称</th><td><?php echo $_smarty_tpl->getVariable('show')->value['company_name'];?>
</td></tr>
					<tr><th>*公司地址</th><td><?php echo $_smarty_tpl->getVariable('show')->value['company_address'];?>
</td></tr>
					<tr><th>*倍率</th><td><?php echo $_smarty_tpl->getVariable('show')->value['mag'];?>
</td></tr>
					<tr>
						<th>*通讯</th>
						<td>
							<ul class="NAB" id="NAB">
								<?php  $_smarty_tpl->tpl_vars['nB'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('Nab')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['nB']->key => $_smarty_tpl->tpl_vars['nB']->value){
?>
								<li><?php echo $_smarty_tpl->getVariable('nB')->value['type_name'];?>
 - <?php echo $_smarty_tpl->getVariable('nB')->value['content'];?>
 <?php if ($_smarty_tpl->getVariable('nB')->value['is_default']=='Y'){?><span style="color:#F00"><br>接收 手机短信 号码</span><?php }?></li>
								<?php }} ?>
							</ul>
						</td>
					</tr>
					<tr><th>品牌名称</th><td><?php echo $_smarty_tpl->getVariable('show')->value['brand_name'];?>
</td></tr>
					<tr><th>职务名称</th><td><?php echo $_smarty_tpl->getVariable('show')->value['position'];?>
</td></tr>
					<tr><th>经营区域</th><td><?php echo $_smarty_tpl->getVariable('show')->value['business_zone'];?>
</td></tr>
					<tr><th>经营范围</th><td><?php echo $_smarty_tpl->getVariable('show')->value['business_scope'];?>
</td></tr>
					<tr><th>上级业务</th><td><?php echo $_smarty_tpl->getVariable('show')->value['salesman_write'];?>
</td></tr>
					<tr><th>上级客服</th><td><?php echo $_smarty_tpl->getVariable('show')->value['service_write'];?>
</td></tr>
					<tr><th>网站</th><td><?php echo $_smarty_tpl->getVariable('show')->value['home_page'];?>
</td></tr>
					<tr><th>开户日期</th><td><?php echo date('Y-m-d',$_smarty_tpl->getVariable('show')->value['start_date']);?>
</td></tr>
					<tr><th>位置</th><td><?php echo $_smarty_tpl->getVariable('show')->value['province'];?>
<?php if ($_smarty_tpl->getVariable('show')->value['city']){?> - <?php echo $_smarty_tpl->getVariable('show')->value['city'];?>
<?php }?></td></tr>
					<tr><th>性别</th><td><?php if ($_smarty_tpl->getVariable('show')->value['sex']=='privacy'){?>保密<?php }elseif($_smarty_tpl->getVariable('show')->value['sex']=='man'){?>男<?php }else{ ?>女<?php }?></td></tr>
					<tr><th>上次登录时间</th><td><?php echo date('Y-m-d',$_smarty_tpl->getVariable('show')->value['login_time']);?>
</td></tr>
					
					<!--<tr><td>备注</td><td><?php echo $_smarty_tpl->getVariable('show')->value['remark'];?>
</td></tr>-->
				</table>
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