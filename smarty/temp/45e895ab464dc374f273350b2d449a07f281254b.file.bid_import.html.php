<?php /* Smarty version Smarty3-b8, created on 2011-05-30 13:14:50
         compiled from "D:\web\vhosts\shehua.hk\backadmin/Template/bid_import.html" */ ?>
<?php /*%%SmartyHeaderCode:71974de327cac83554-68494745%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '45e895ab464dc374f273350b2d449a07f281254b' => 
    array (
      0 => 'D:\\web\\vhosts\\shehua.hk\\backadmin/Template/bid_import.html',
      1 => 1305853533,
    ),
  ),
  'nocache_hash' => '71974de327cac83554-68494745',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_write_url')) include 'D:\web\vhosts\shehua.hk\smarty\plugins\function.write_url.php';
if (!is_callable('smarty_function_CLASS_COLOR')) include 'D:\web\vhosts\shehua.hk\smarty\plugins\function.CLASS_COLOR.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo @Site_Name;?>
</title>
<link href="css/public.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="Js/exec.js"></script>
</head>

<body>
<?php $_template = new Smarty_Internal_Template("header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

<div class="center">
	<div class="left"><?php $_template = new Smarty_Internal_Template("menu.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
</div>
	<div class="right">
		<div class="Nav">
			<ul>
				<?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['import']){?><li><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'import','DEL'=>'id'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('bid'=>$_smarty_tpl->getVariable('get')->value['open'],'import'=>$_smarty_tpl->getVariable('get')->value['action'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>导入国际报价</a></li><?php }?>
				<?php if ($_smarty_tpl->getVariable('BTP')->value[$_smarty_tpl->getVariable('get')->value['open']]['show']){?><li><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'action'=>'show','DEL'=>'id'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('bid'=>$_smarty_tpl->getVariable('get')->value['open'],'show'=>$_smarty_tpl->getVariable('get')->value['action'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>国际报价管理</a></li><?php }?>
			</ul>
			<span class="clear"></span>
		</div>
		<div class="append">
			<form action="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'go'=>'append'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" method="post" enctype="multipart/form-data">
				<table width="100%" border="0" cellspacing="1" cellpadding="0" id="tab_show">
					<tr><th colspan="2">导入国际报价</th></tr>
					<tr>
						<td align="right" class="Need" width="40%">导入文件</td>
						<td>
							<input name="import" type="file" style="width:60%;height:24px" size="60" />
							<div class="Hint">注：仅支持CSV文件,ASIN格式 列( 净度 , 颜色 , 开始重量 , 结束重量 , 价格[美元] )</div>
						</td>
					</tr>
					<tr><th colspan="2" align="center"><input type="submit" value=" 提 交 " /> <input type="reset" value=" 重 填 " /></th></tr>
				</table>
			</form>
		</div>	
	</div>
	<b class="clear"></b>
</div>
</body>
</html>