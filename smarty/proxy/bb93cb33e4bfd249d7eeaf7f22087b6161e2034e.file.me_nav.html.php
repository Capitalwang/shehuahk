<?php /* Smarty version Smarty3-b8, created on 2011-05-25 16:18:33
         compiled from "D:\htdocs\yulog.net.shehua\proxy/Template/me_nav.html" */ ?>
<?php /*%%SmartyHeaderCode:98484ddcbb5955fb34-68143732%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bb93cb33e4bfd249d7eeaf7f22087b6161e2034e' => 
    array (
      0 => 'D:\\htdocs\\yulog.net.shehua\\proxy/Template/me_nav.html',
      1 => 1306295871,
    ),
  ),
  'nocache_hash' => '98484ddcbb5955fb34-68143732',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_write_url')) include 'D:\htdocs\yulog.net.shehua\smarty\plugins\function.write_url.php';
if (!is_callable('smarty_function_CLASS_COLOR')) include 'D:\htdocs\yulog.net.shehua\smarty\plugins\function.CLASS_COLOR.php';
?><ul>
	<li>
		<strong><a href="javascript:;">我的设置</a><b>+</b></strong>
		<span>
			<a href="<?php echo smarty_function_write_url(array('open'=>'me','action'=>'info'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('info'=>$_smarty_tpl->getVariable('get')->value['action'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>我的资讯</a>
			<a href="<?php echo smarty_function_write_url(array('open'=>'me','action'=>'password'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('password'=>$_smarty_tpl->getVariable('get')->value['action'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>修改密码</a>
			<a href="<?php echo smarty_function_write_url(array('open'=>'me','action'=>'edit'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('edit'=>$_smarty_tpl->getVariable('get')->value['action'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>修改资料</a>
		</span>
	</li>
	<li>
		<strong><a href="javascript:;">我的订单</a><b>+</b></strong>
		<span>
			<?php  $_smarty_tpl->tpl_vars['pso'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['ss'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('status')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['pso']->key => $_smarty_tpl->tpl_vars['pso']->value){
 $_smarty_tpl->tpl_vars['ss']->value = $_smarty_tpl->tpl_vars['pso']->key;
?>
			<a href="<?php echo smarty_function_write_url(array('open'=>'me','action'=>'orders','status'=>$_smarty_tpl->getVariable('ss')->value),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php if ($_smarty_tpl->getVariable('ss')->value==$_smarty_tpl->getVariable('get')->value['status']){?>class="this"<?php }?>><?php echo $_smarty_tpl->getVariable('pso')->value;?>
</a>
			<?php }} ?>
		</span>
	</li>
	<li><strong><a href="<?php echo smarty_function_write_url(array('open'=>'me','action'=>'log'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('log'=>$_smarty_tpl->getVariable('get')->value['action'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>现金日志</a></strong></li>
	<li><strong><a href="<?php echo smarty_function_write_url(array('open'=>'Quit'),$_smarty_tpl->smarty,$_smarty_tpl);?>
">安全退出</a></strong></li>
</ul>