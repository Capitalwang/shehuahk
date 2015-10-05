<?php /* Smarty version Smarty3-b8, created on 2011-05-26 12:46:20
         compiled from "D:\htdocs\yulog.net.shehua\wholesale/Template/me_edit.html" */ ?>
<?php /*%%SmartyHeaderCode:138314ddddb1c371de3-60902391%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2b54e840be287bd1c1788e6ef9914db4a25c7898' => 
    array (
      0 => 'D:\\htdocs\\yulog.net.shehua\\wholesale/Template/me_edit.html',
      1 => 1306301480,
    ),
  ),
  'nocache_hash' => '138314ddddb1c371de3-60902391',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_write_url')) include 'D:\htdocs\yulog.net.shehua\smarty\plugins\function.write_url.php';
if (!is_callable('smarty_function_checked')) include 'D:\htdocs\yulog.net.shehua\smarty\plugins\function.checked.php';
if (!is_callable('smarty_function_selected')) include 'D:\htdocs\yulog.net.shehua\smarty\plugins\function.selected.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>奢华</title>
<link href="css/default.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="Js/default.js"></script>
</head>

<body>
<div class="Pe">
	<div class="head">
		<img src="images/logo.jpg" />
		<?php $_template = new Smarty_Internal_Template("nav.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

	</div>
	<div class="gray me">
		<div class="let">
			<div>您好！欢迎进入在线库存中心</div>
			<?php $_template = new Smarty_Internal_Template("me_nav.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

		</div>
		
		<div class="Ys">
			<div class="foe">
				<form action="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'go'=>'append'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" method="post">
					<table width="100%" border="0" cellspacing="1" cellpadding="0" class="log mes">
						<tr><th colspan="2" class="te">修改资料</th></tr>
						<tr><th width="35%">编号</th><td><?php echo $_smarty_tpl->getVariable('show')->value['number'];?>
</td></tr>
						<tr><th>账号</th><td><?php echo $_smarty_tpl->getVariable('show')->value['account'];?>
</td></tr>
						<!--<tr>
							<th>手机短信</th>
							<td>
								<input name="is_SMS" type="radio" value="Y" <?php echo smarty_function_checked(array('val'=>$_smarty_tpl->getVariable('show')->value['is_SMS'],'str'=>'Y'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 /> 开启
								<input name="is_SMS" type="radio" value="N" <?php echo smarty_function_checked(array('val'=>$_smarty_tpl->getVariable('show')->value['is_SMS'],'str'=>'N'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 /> 关闭
							</td>
						</tr>-->
						<tr><th>真实姓名</th><td><input name="name" type="text" value="<?php echo $_smarty_tpl->getVariable('show')->value['name'];?>
" style="width:50%" /></td></tr>
						<tr><th>昵称</th><td><input name="nickname" type="text" value="<?php echo $_smarty_tpl->getVariable('show')->value['nickname'];?>
" style="width:50%" /></td></tr>
						<tr><th>公司名称</th><td><input name="company_name" type="text" value="<?php echo $_smarty_tpl->getVariable('show')->value['company_name'];?>
" style="width:70%" /></td></tr>
						<tr><th>公司地址</th><td><input name="company_address" type="text" value="<?php echo $_smarty_tpl->getVariable('show')->value['company_address'];?>
" style="width:70%" /></td></tr>
						<tr><th>品牌名称</th><td><input name="brand_name" type="text" value="<?php echo $_smarty_tpl->getVariable('show')->value['brand_name'];?>
" style="width:50%" /></td></tr>
						<tr><th>职务名称</th><td><input name="position" type="text" value="<?php echo $_smarty_tpl->getVariable('show')->value['position'];?>
" style="width:50%" /></td></tr>
						<tr><th>经营区域</th><td><input name="business_zone" type="text" value="<?php echo $_smarty_tpl->getVariable('show')->value['business_zone'];?>
" style="width:70%" /></td></tr>
						<tr><th>经营范围</th><td><input name="business_scope" type="text" value="<?php echo $_smarty_tpl->getVariable('show')->value['business_scope'];?>
" style="width:70%" /></td></tr>
						<tr><th>网站</th><td><input name="home_page" type="text" value="<?php echo $_smarty_tpl->getVariable('show')->value['home_page'];?>
" style="width:70%" /></td></tr>
						<tr class="NO_TAB_SHOW"><th>位置</th><td><span id='PROVINCE_CITY'></span></td></tr>
						<tr>
							<th>性别</th>
							<td>
								<input name="sex" type="radio" value="privacy" <?php echo smarty_function_checked(array('val'=>$_smarty_tpl->getVariable('show')->value['sex'],'str'=>'privacy'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 /> 保密
								<input name="sex" type="radio" value="man" <?php echo smarty_function_checked(array('val'=>$_smarty_tpl->getVariable('show')->value['sex'],'str'=>'man'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 /> 男
								<input name="sex" type="radio" value="woman" <?php echo smarty_function_checked(array('val'=>$_smarty_tpl->getVariable('show')->value['sex'],'str'=>'woman'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 /> 女
							</td>
						</tr>
						<tr class='NO_TAB_SHOW'>
							<th>通讯</th>
							<td>
								<a href="javascript:;" class="AddTX" onclick="Add_NAB('NAB');">添加新的通讯</a>
								<ul class="NAB" id="NAB">
									<?php  $_smarty_tpl->tpl_vars['nB'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('Nab')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['nB']->key => $_smarty_tpl->tpl_vars['nB']->value){
?>
									<li>
										<select name="type[]" onchange="Up_NAB(this);set_default(this);">
											<option value="0">请选择通讯类型</option>
											<?php  $_smarty_tpl->tpl_vars['aon'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['nabKey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('NAB')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['aon']->key => $_smarty_tpl->tpl_vars['aon']->value){
 $_smarty_tpl->tpl_vars['nabKey']->value = $_smarty_tpl->tpl_vars['aon']->key;
?><option value="<?php echo $_smarty_tpl->getVariable('nabKey')->value;?>
" <?php echo smarty_function_selected(array('val'=>$_smarty_tpl->getVariable('nB')->value['type'],'str'=>$_smarty_tpl->getVariable('nabKey')->value),$_smarty_tpl->smarty,$_smarty_tpl);?>
><?php echo $_smarty_tpl->getVariable('aon')->value;?>
</option><?php }} ?>
										</select>
										<input name="type_name[]" type="hidden" value="<?php echo $_smarty_tpl->getVariable('nB')->value['type_name'];?>
" />
										<input name="content[]" type="text" value="<?php echo $_smarty_tpl->getVariable('nB')->value['content'];?>
" onkeyup="set_mobile(this)" />
										<span <?php if ($_smarty_tpl->getVariable('nB')->value['type']!='mobile'){?>style="display:none"<?php }?>><input name="is_default" <?php echo smarty_function_checked(array('val'=>$_smarty_tpl->getVariable('nB')->value['is_default'],'str'=>'Y'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 type="radio" value="<?php echo $_smarty_tpl->getVariable('nB')->value['content'];?>
" style="width:auto" /> 接收 手机短信 号码</span>
										<a href="javascript:;" onclick="Del_NAB('NAB' , this)">删除</a>
									</li>
									<?php }} ?>
								</ul>
							</td>
						</tr>
						<tr><td colspan="2" class="INP" align="center"><input value="修改资料" type="submit" style="height:auto; line-height:normal" /></td></tr>
					</table>
				</form>
			</div>
		</div>
		<i class="clear"></i>
	</div>
	<?php $_template = new Smarty_Internal_Template("foot.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

</div>
<script type="text/javascript" src="Js/city.js"></script>
<script type="text/javascript">set_PROVINCE_CITY('PROVINCE_CITY' , 'province' , 'city' , '<?php echo $_smarty_tpl->getVariable('show')->value['province'];?>
' , '<?php echo $_smarty_tpl->getVariable('show')->value['city'];?>
');</script>
<script type="text/javascript">var NAB_ONE_LI_INNERHTML = '<select name="type[]" onchange="Up_NAB(this);set_default(this);"><option value="0">请选择通讯类型</option><?php  $_smarty_tpl->tpl_vars['aon'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['nabKey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('NAB')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['aon']->key => $_smarty_tpl->tpl_vars['aon']->value){
 $_smarty_tpl->tpl_vars['nabKey']->value = $_smarty_tpl->tpl_vars['aon']->key;
?><option value="<?php echo $_smarty_tpl->getVariable('nabKey')->value;?>
"><?php echo $_smarty_tpl->getVariable('aon')->value;?>
</option><?php }} ?></select><input name="type_name[]" type="hidden" value="" />&nbsp;<input name="content[]" type="text" value="" onkeyup="set_mobile(this)" /> <span style="display:none"><input name="is_default" type="radio" style="width:auto" /> 接收 手机短信 号码</span> &nbsp;<a href="javascript:;" onclick="Del_NAB(\'NAB\' , this)">删除</a>';</script>
</body>
</html>
