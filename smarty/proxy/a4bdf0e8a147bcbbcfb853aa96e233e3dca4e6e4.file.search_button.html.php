<?php /* Smarty version Smarty3-b8, created on 2015-07-25 18:15:40
         compiled from "D:\WWW\shehua_hk\diamind/Template/search_button.html" */ ?>
<?php /*%%SmartyHeaderCode:2894555b361cc854ba1-07376544%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a4bdf0e8a147bcbbcfb853aa96e233e3dca4e6e4' => 
    array (
      0 => 'D:\\WWW\\shehua_hk\\diamind/Template/search_button.html',
      1 => 1437819300,
    ),
  ),
  'nocache_hash' => '2894555b361cc854ba1-07376544',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_write_url')) include 'D:\WWW\shehua_hk\smarty\plugins\function.write_url.php';
if (!is_callable('smarty_function_CLASS_COLOR')) include 'D:\WWW\shehua_hk\smarty\plugins\function.CLASS_COLOR.php';
if (!is_callable('smarty_function_brite_spot')) include 'D:\WWW\shehua_hk\smarty\plugins\function.brite_spot.php';
if (!is_callable('smarty_function_Goto_diploma')) include 'D:\WWW\shehua_hk\smarty\plugins\function.Goto_diploma.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>奢华</title>
<link href="css/default.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="Js/string.js"></script>
<script type="text/javascript" src="Js/default.js"></script>
</head>

<body>
<div class="Pe">
	<div class="head">
		<img src="<?php if ($_smarty_tpl->getVariable('proxy')->value['company_logo']){?>../wholesale/<?php echo $_smarty_tpl->getVariable('proxy')->value['company_logo'];?>
<?php }else{ ?>images/logo.jpg<?php }?>"  />
		<span class="company_name"><a href="#"> <?php if ($_smarty_tpl->getVariable('proxy')->value['company_name']){?><?php echo $_smarty_tpl->getVariable('proxy')->value['company_name'];?>
<?php }else{ ?>[代理] <?php echo $_smarty_tpl->getVariable('proxy')->value['nickname'];?>
<?php }?></a></span>
		<span class="company_info">	<?php if ($_smarty_tpl->getVariable('proxy')->value['number']){?>  <?php echo $_smarty_tpl->getVariable('proxy')->value['number'];?>
[代号] <br/><?php }?><?php if ($_smarty_tpl->getVariable('proxy')->value['brand_name']){?>  <?php echo $_smarty_tpl->getVariable('proxy')->value['brand_name'];?>
[品牌] <br/><?php }else{ ?><?php }?>
		
        <?php if ($_smarty_tpl->getVariable('proxy')->value['company_address']){?>  <?php echo $_smarty_tpl->getVariable('proxy')->value['company_address'];?>
[地址] <br/><?php }?>
        <?php if ($_smarty_tpl->getVariable('proxy_nab')->value){?>
			<?php  $_smarty_tpl->tpl_vars['prob'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('proxy_nab')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['prob']->key => $_smarty_tpl->tpl_vars['prob']->value){
?>
				<?php echo $_smarty_tpl->getVariable('prob')->value['content'];?>
[<?php echo $_smarty_tpl->getVariable('prob')->value['type_name'];?>
]
			<?php }} ?>
        <?php }?><br/>
        </span>
		
	</div>

	<div class="gray search">
		<ul class="top">
			<li><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'st'=>'b'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('b'=>$_smarty_tpl->getVariable('get')->value['st'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>按钮搜索方式</a></li>
			<li><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'st'=>'l'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('l'=>$_smarty_tpl->getVariable('get')->value['st'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>文字搜索方式</a></li>
		</ul>
		<form action="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'go'=>'query'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" method="post">
			<div class="bon">
				<strong>形状</strong>
				<ul>
					<li class="t1"><a <?php echo smarty_function_CLASS_COLOR(array('round'=>$_smarty_tpl->getVariable('post')->value['shape'][0],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'round')"></a><input type="hidden" name="shape[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['shape'][0];?>
" /></li>
					<li class="t2"><a <?php echo smarty_function_CLASS_COLOR(array('princess'=>$_smarty_tpl->getVariable('post')->value['shape'][1],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'princess')"></a><input type="hidden" name="shape[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['shape'][1];?>
" /></li>
					<li class="t3"><a <?php echo smarty_function_CLASS_COLOR(array('emerald'=>$_smarty_tpl->getVariable('post')->value['shape'][2],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'emerald')"></a><input type="hidden" name="shape[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['shape'][2];?>
" /></li>
					<li class="t4"><a <?php echo smarty_function_CLASS_COLOR(array('oval'=>$_smarty_tpl->getVariable('post')->value['shape'][3],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'oval')"></a><input type="hidden" name="shape[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['shape'][3];?>
" /></li>
					<li class="t5"><a <?php echo smarty_function_CLASS_COLOR(array('marquise'=>$_smarty_tpl->getVariable('post')->value['shape'][4],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'marquise')"></a><input type="hidden" name="shape[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['shape'][4];?>
" /></li>
					<li class="t6"><a <?php echo smarty_function_CLASS_COLOR(array('cushion'=>$_smarty_tpl->getVariable('post')->value['shape'][5],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'cushion')"></a><input type="hidden" name="shape[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['shape'][5];?>
" /></li>
					<li class="t7"><a <?php echo smarty_function_CLASS_COLOR(array('pear'=>$_smarty_tpl->getVariable('post')->value['shape'][6],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'pear')"></a><input type="hidden" name="shape[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['shape'][6];?>
" /></li>
					<li class="t8"><a <?php echo smarty_function_CLASS_COLOR(array('heart'=>$_smarty_tpl->getVariable('post')->value['shape'][7],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'heart')"></a><input type="hidden" name="shape[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['shape'][7];?>
" /></li>
					<li class="t9"><a href="javascript:;"></a></li>
					<li class="t10"><a href="javascript:;"></a></li>
				</ul>
			</div>
			<div class="bon">
				<strong>净度</strong>
				<dl class="v1">
					<dd class="t"><a <?php echo smarty_function_CLASS_COLOR(array('IF'=>$_smarty_tpl->getVariable('post')->value['clarity'][0],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'IF')">IF</a><input type="hidden" name="clarity[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['clarity'][0];?>
" /></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('VVS1'=>$_smarty_tpl->getVariable('post')->value['clarity'][1],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'VVS1')">VVS1</a><input type="hidden" name="clarity[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['clarity'][1];?>
" /></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('VVS2'=>$_smarty_tpl->getVariable('post')->value['clarity'][2],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'VVS2')">VVS2</a><input type="hidden" name="clarity[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['clarity'][2];?>
" /></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('VS1'=>$_smarty_tpl->getVariable('post')->value['clarity'][3],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'VS1')">VS1</a><input type="hidden" name="clarity[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['clarity'][3];?>
" /></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('VS2'=>$_smarty_tpl->getVariable('post')->value['clarity'][4],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'VS2')">VS2</a><input type="hidden" name="clarity[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['clarity'][4];?>
" /></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('SI1'=>$_smarty_tpl->getVariable('post')->value['clarity'][5],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'SI1')">SI1</a><input type="hidden" name="clarity[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['clarity'][5];?>
" /></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('SI2'=>$_smarty_tpl->getVariable('post')->value['clarity'][6],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'SI2')">SI2</a><input type="hidden" name="clarity[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['clarity'][6];?>
" /></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('SI3'=>$_smarty_tpl->getVariable('post')->value['clarity'][7],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'SI3')">SI3</a><input type="hidden" name="clarity[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['clarity'][7];?>
" /></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('I1'=>$_smarty_tpl->getVariable('post')->value['clarity'][8],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'I1')">I1</a><input type="hidden" name="clarity[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['clarity'][8];?>
" /></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('I2'=>$_smarty_tpl->getVariable('post')->value['clarity'][9],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'I2')">I2</a><input type="hidden" name="clarity[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['clarity'][9];?>
" /></dd><dt></dt>
					<dd class="w"><a <?php echo smarty_function_CLASS_COLOR(array('I3'=>$_smarty_tpl->getVariable('post')->value['clarity'][10],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'I3')">I3</a><input type="hidden" name="clarity[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['clarity'][10];?>
" /></dd>
				</dl>
				<strong>切工</strong>
				<dl class="v2">
					<dd class="t"><a <?php echo smarty_function_CLASS_COLOR(array('ID'=>$_smarty_tpl->getVariable('post')->value['cut'][0],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'ID')">ID</a><input type="hidden" name="cut[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['cut'][0];?>
" /></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('EX'=>$_smarty_tpl->getVariable('post')->value['cut'][1],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'EX')">EX</a><input type="hidden" name="cut[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['cut'][1];?>
" /></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('VG'=>$_smarty_tpl->getVariable('post')->value['cut'][2],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'VG')">VG</a><input type="hidden" name="cut[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['cut'][2];?>
" /></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('G'=>$_smarty_tpl->getVariable('post')->value['cut'][3],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'G')">GD</a><input type="hidden" name="cut[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['cut'][3];?>
" /></dd><dt></dt>
					<dd class="w"><a <?php echo smarty_function_CLASS_COLOR(array('FR'=>$_smarty_tpl->getVariable('post')->value['cut'][4],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'FR')">FR</a><input type="hidden" name="cut[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['cut'][4];?>
" /></dd>
				</dl>
			</div>
			<div class="bon">
				<strong>颜色</strong>
				<dl class="v1">
					<dd class="t"><a <?php echo smarty_function_CLASS_COLOR(array('D'=>$_smarty_tpl->getVariable('post')->value['color'][0],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'D')">D</a><input type="hidden" name="color[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['color'][0];?>
" /></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('E'=>$_smarty_tpl->getVariable('post')->value['color'][1],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'E')">E</a><input type="hidden" name="color[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['color'][1];?>
" /></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('F'=>$_smarty_tpl->getVariable('post')->value['color'][2],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'F')">F</a><input type="hidden" name="color[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['color'][2];?>
" /></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('G'=>$_smarty_tpl->getVariable('post')->value['color'][3],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'G')">G</a><input type="hidden" name="color[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['color'][3];?>
" /></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('H'=>$_smarty_tpl->getVariable('post')->value['color'][4],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'H')">H</a><input type="hidden" name="color[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['color'][4];?>
" /></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('I'=>$_smarty_tpl->getVariable('post')->value['color'][5],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'I')">I</a><input type="hidden" name="color[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['color'][5];?>
" /></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('J'=>$_smarty_tpl->getVariable('post')->value['color'][6],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'J')">J</a><input type="hidden" name="color[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['color'][6];?>
" /></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('K'=>$_smarty_tpl->getVariable('post')->value['color'][7],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'K')">K</a><input type="hidden" name="color[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['color'][7];?>
" /></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('L'=>$_smarty_tpl->getVariable('post')->value['color'][8],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'L')">L</a><input type="hidden" name="color[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['color'][8];?>
" /></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('M'=>$_smarty_tpl->getVariable('post')->value['color'][9],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'M')">M</a><input type="hidden" name="color[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['color'][9];?>
" /></dd><dt></dt>
					<dd class="w"><a <?php echo smarty_function_CLASS_COLOR(array('N'=>$_smarty_tpl->getVariable('post')->value['color'][10],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'N')">N</a><input type="hidden" name="color[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['color'][10];?>
" /></dd>
				</dl>
				<strong>抛光</strong>
				<dl class="v2">
					<dd class="t"><a <?php echo smarty_function_CLASS_COLOR(array('ID'=>$_smarty_tpl->getVariable('post')->value['buffing'][0],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'ID')">ID</a><input type="hidden" name="buffing[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['buffing'][0];?>
" /></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('EX'=>$_smarty_tpl->getVariable('post')->value['buffing'][1],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'EX')">EX</a><input type="hidden" name="buffing[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['buffing'][1];?>
" /></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('VG'=>$_smarty_tpl->getVariable('post')->value['buffing'][2],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'VG')">VG</a><input type="hidden" name="buffing[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['buffing'][2];?>
" /></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('G'=>$_smarty_tpl->getVariable('post')->value['buffing'][3],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'G')">GD</a><input type="hidden" name="buffing[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['buffing'][3];?>
" /></dd><dt></dt>
					<dd class="w"><a <?php echo smarty_function_CLASS_COLOR(array('FR'=>$_smarty_tpl->getVariable('post')->value['buffing'][4],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'FR')">FR</a><input type="hidden" name="buffing[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['buffing'][4];?>
" /></dd>
				</dl>
			</div>
			<div class="bon">
				<strong>证书</strong>
				<dl class="v1">
					<dd class="t"><a <?php echo smarty_function_CLASS_COLOR(array('GIA'=>$_smarty_tpl->getVariable('post')->value['diploma'][0],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'GIA')">GIA</a><input type="hidden" name="diploma[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['diploma'][0];?>
" /></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('HRD'=>$_smarty_tpl->getVariable('post')->value['diploma'][1],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'HRD')">HRD</a><input type="hidden" name="diploma[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['diploma'][1];?>
" /></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('IGI'=>$_smarty_tpl->getVariable('post')->value['diploma'][2],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'IGI')">IGI</a><input type="hidden" name="diploma[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['diploma'][2];?>
" /></dd><dt></dt>
					<dd class="w"><a <?php echo smarty_function_CLASS_COLOR(array('Other'=>$_smarty_tpl->getVariable('post')->value['diploma'][3],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'Other')">国检</a><input type="hidden" name="diploma[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['diploma'][3];?>
" /></dd>
				</dl>
				<strong>对称</strong>
				<dl class="v2">
					<dd class="t"><a <?php echo smarty_function_CLASS_COLOR(array('ID'=>$_smarty_tpl->getVariable('post')->value['symmetry'][0],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'ID')">ID</a><input type="hidden" name="symmetry[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['symmetry'][0];?>
" /></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('EX'=>$_smarty_tpl->getVariable('post')->value['symmetry'][1],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'EX')">EX</a><input type="hidden" name="symmetry[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['symmetry'][1];?>
" /></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('VG'=>$_smarty_tpl->getVariable('post')->value['symmetry'][2],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'VG')">VG</a><input type="hidden" name="symmetry[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['symmetry'][2];?>
" /></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('G'=>$_smarty_tpl->getVariable('post')->value['symmetry'][3],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'G')">GD</a><input type="hidden" name="symmetry[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['symmetry'][3];?>
" /></dd><dt></dt>
					<dd class="w"><a <?php echo smarty_function_CLASS_COLOR(array('FR'=>$_smarty_tpl->getVariable('post')->value['symmetry'][4],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'FR')">FR</a><input type="hidden" name="symmetry[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['symmetry'][4];?>
" /></dd>
				</dl>
			</div>
			<div class="bon sis">
				<strong>荧光颜色</strong>
				<dl class="v3">
					<dd class="t"><a <?php echo smarty_function_CLASS_COLOR(array('Blue'=>$_smarty_tpl->getVariable('post')->value['Fent_color'][0],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'Blue')">Blue</a><input type="hidden" name="Fent_color[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['Fent_color'][0];?>
" /></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('Yellow'=>$_smarty_tpl->getVariable('post')->value['Fent_color'][1],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'Yellow')">Yellow</a><input type="hidden" name="Fent_color[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['Fent_color'][1];?>
" /></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('Green'=>$_smarty_tpl->getVariable('post')->value['Fent_color'][2],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'Green')">Green</a><input type="hidden" name="Fent_color[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['Fent_color'][2];?>
" /></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('Red'=>$_smarty_tpl->getVariable('post')->value['Fent_color'][3],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'Red')">Red</a><input type="hidden" name="Fent_color[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['Fent_color'][3];?>
" /></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('Orange'=>$_smarty_tpl->getVariable('post')->value['Fent_color'][4],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'Orange')">Orange</a><input type="hidden" name="Fent_color[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['Fent_color'][4];?>
" /></dd><dt></dt>
					<dd class="w"><a <?php echo smarty_function_CLASS_COLOR(array('White'=>$_smarty_tpl->getVariable('post')->value['Fent_color'][5],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'White')">White</a><input type="hidden" name="Fent_color[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['Fent_color'][5];?>
" /></dd>
				</dl>
				<strong>荧光强度</strong>
				<dl class="v2">
					<dd class="t"><a <?php echo smarty_function_CLASS_COLOR(array('N'=>$_smarty_tpl->getVariable('post')->value['Fent_Isity'][0],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'N')">N</a><input type="hidden" name="Fent_Isity[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['Fent_Isity'][0];?>
" /></dd><dt></dt>
					<dd><a <?php if ($_smarty_tpl->getVariable('post')->value['Fent_Isity'][1]=='F/SL'){?>class='this'<?php }?> href="javascript:;" onclick="sbon(this , 'F/SL')">F</a><input type="hidden" name="Fent_Isity[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['Fent_Isity'][1];?>
" /></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('M'=>$_smarty_tpl->getVariable('post')->value['Fent_Isity'][2],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'M')">M</a><input type="hidden" name="Fent_Isity[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['Fent_Isity'][2];?>
" /></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('S'=>$_smarty_tpl->getVariable('post')->value['Fent_Isity'][3],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'S')">S</a><input type="hidden" name="Fent_Isity[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['Fent_Isity'][3];?>
" /></dd><dt></dt>
					<dd class="w"><a <?php echo smarty_function_CLASS_COLOR(array('VS'=>$_smarty_tpl->getVariable('post')->value['Fent_Isity'][4],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'VS')">VS</a><input type="hidden" name="Fent_Isity[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['Fent_Isity'][4];?>
" /></dd>
				</dl>
			</div>
			<div class="bon cow">
				<strong>钻重</strong>
				<span>
					<input type="text" name="weight[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['weight'][0];?>
" onfocus="sprintf('%.2f' , this , true)" /> ct ~ 
					<input type="text" name="weight[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['weight'][1];?>
" onfocus="sprintf('%.2f' , this , true)" /> ct
				</span>
				<div><input type="submit" class="st" value="查 询" /></div>
			</div>
		</form>
		<?php if ($_smarty_tpl->getVariable('get')->value['go']){?>
		<form action="<?php echo smarty_function_write_url(array('open'=>'cart','action'=>'add','DEL'=>'ALL'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" method="post">
			<div class="Page">
				<div>为您筛选出<b><?php echo $_smarty_tpl->getVariable('list_page')->value['Record'];?>
</b>颗钻石等您选择</div>
				<?php if ($_smarty_tpl->getVariable('list_text')->value){?>
				<ul>
					<li><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'page'=>$_smarty_tpl->getVariable('list_page')->value['up']),$_smarty_tpl->smarty,$_smarty_tpl);?>
">上一页</a></li>
					<?php  $_smarty_tpl->tpl_vars['Npc'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('list_page')->value['PageCode']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['Npc']->key => $_smarty_tpl->tpl_vars['Npc']->value){
?><li><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'page'=>$_smarty_tpl->getVariable('Npc')->value),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php if ($_smarty_tpl->getVariable('Npc')->value==$_smarty_tpl->getVariable('get')->value['page']){?>class="this"<?php }?>><?php echo $_smarty_tpl->getVariable('Npc')->value;?>
</a></li><?php }} ?>
					<li><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'page'=>$_smarty_tpl->getVariable('list_page')->value['down']),$_smarty_tpl->smarty,$_smarty_tpl);?>
">下一页</a></li>
				</ul>
				<?php }?>
				<i class="clear"></i>
			</div>
		
			<table width="100%" border="0" cellspacing="0" cellpadding="0" class="SP">
				<tr class="tp">
					<th class="z"></th><td></td><th></th>
					<td>编号</td><th></th>
					<td>形状</td><th></th>
					<td>
						<?php if ($_smarty_tpl->getVariable('get')->value['orders']=='asc'){?>
						<a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'px'=>'weight','orders'=>'desc'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('weight'=>$_smarty_tpl->getVariable('get')->value['px'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>重量 ↑</a>
						<?php }else{ ?>
						<a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'px'=>'weight','orders'=>'asc'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('weight'=>$_smarty_tpl->getVariable('get')->value['px'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>重量 ↓</a>
						<?php }?>
					</td><th></th>
					<td>
						<?php if ($_smarty_tpl->getVariable('get')->value['orders']=='asc'){?>
						<a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'px'=>'color','orders'=>'desc'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('color'=>$_smarty_tpl->getVariable('get')->value['px'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>颜色 ↑</a>
						<?php }else{ ?>
						<a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'px'=>'color','orders'=>'asc'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('color'=>$_smarty_tpl->getVariable('get')->value['px'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>颜色 ↓</a>
						<?php }?>
					</td><th></th>
					<td>
						<?php if ($_smarty_tpl->getVariable('get')->value['orders']=='asc'){?>
						<a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'px'=>'clarity','orders'=>'desc'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('clarity'=>$_smarty_tpl->getVariable('get')->value['px'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>净度 ↑</a>
						<?php }else{ ?>
						<a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'px'=>'clarity','orders'=>'asc'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('clarity'=>$_smarty_tpl->getVariable('get')->value['px'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>净度 ↓</a>
						<?php }?>
					</td><th></th>
					<td>切工</td><th></th>
					<td>抛光</td><th></th>
					<td>对称</td><th></th>
					<td>荧光</td><th></th>
					<td>测量值</td><th></th>
					<td>证书</td><th></th>
					<td>¥/每颗</td><th></th>
					<td>详情</td><th class="y"></th>
				</tr>
				<tr class="x"><th colspan="33"></th></tr>
				<?php if ($_smarty_tpl->getVariable('list_text')->value){?>
				<?php  $_smarty_tpl->tpl_vars['pso'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('list_text')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['pso']->key => $_smarty_tpl->tpl_vars['pso']->value){
?>
				<tr align="center">
					<th class="zx"></th>
					
					<td></td><th></th>
					<td><?php echo smarty_function_brite_spot(array('query'=>$_smarty_tpl->getVariable('get')->value['info'],'str'=>$_smarty_tpl->getVariable('pso')->value['ProID']),$_smarty_tpl->smarty,$_smarty_tpl);?>
</td><th></th>
					<td><?php echo $_smarty_tpl->getVariable('shape')->value[$_smarty_tpl->getVariable('pso')->value['shape']];?>
</td><th></th>
					<td><?php echo $_smarty_tpl->getVariable('pso')->value['weight'];?>
</td><th></th>
					<td><?php echo $_smarty_tpl->getVariable('pso')->value['color'];?>
</td><th></th>
					<td><?php echo $_smarty_tpl->getVariable('pso')->value['clarity'];?>
</td><th></th>
					<td><?php echo $_smarty_tpl->getVariable('pso')->value['cut'];?>
</td><th></th>
					<td><?php echo $_smarty_tpl->getVariable('pso')->value['buffing'];?>
</td><th></th>
					<td><?php echo $_smarty_tpl->getVariable('pso')->value['symmetry'];?>
</td><th></th>
					<td><?php echo $_smarty_tpl->getVariable('pso')->value['Fent_Isity'];?>
</td><th></th>
					<td><?php echo $_smarty_tpl->getVariable('pso')->value['scalar_value'];?>
</td><th></th>
					<td><?php echo smarty_function_Goto_diploma(array('diploma'=>$_smarty_tpl->getVariable('pso')->value['diploma'],'weight'=>$_smarty_tpl->getVariable('pso')->value['weight'],'NO'=>$_smarty_tpl->getVariable('pso')->value['diplomaNO'],'show'=>$_smarty_tpl->getVariable('pso')->value['diploma']),$_smarty_tpl->smarty,$_smarty_tpl);?>
</td><th></th>
					<?php if ($_smarty_tpl->getVariable('proxy')->value['is_offer']=='Y'&&$_smarty_tpl->getVariable('pso')->value['is_promotion']=='Y'&&$_smarty_tpl->getVariable('pso')->value['promotion_start']<=mktime()&&$_smarty_tpl->getVariable('pso')->value['promotion_stop']>=mktime()){?>
					<!-- <td><?php echo sprintf('%.2f',$_smarty_tpl->getVariable('pso')->value['INTbid']*(100+$_smarty_tpl->getVariable('pso')->value['agio']+$_smarty_tpl->getVariable('pso')->value['baseAgio']+$_smarty_tpl->getVariable('pso')->value['promotion_dot'])/100);?>
</td><th></th>
					<td><?php echo sprintf('%.2f',$_smarty_tpl->getVariable('pso')->value['agio']+$_smarty_tpl->getVariable('pso')->value['baseAgio']+$_smarty_tpl->getVariable('pso')->value['promotion_dot']);?>
</td><th></th> -->
					<td><?php echo sprintf('%.2f',$_smarty_tpl->getVariable('pso')->value['INTbid']*$_smarty_tpl->getVariable('pso')->value['weight']*$_smarty_tpl->getVariable('proxy')->value['mag']*(100+$_smarty_tpl->getVariable('pso')->value['agio']+$_smarty_tpl->getVariable('pso')->value['baseAgio']+$_smarty_tpl->getVariable('pso')->value['promotion_dot'])/100);?>
</td><th></th>
					<?php }else{ ?>
					<!-- <td><?php echo sprintf('%.2f',$_smarty_tpl->getVariable('pso')->value['INTbid']*(100+$_smarty_tpl->getVariable('pso')->value['agio']+$_smarty_tpl->getVariable('pso')->value['baseAgio']+$_smarty_tpl->getVariable('proxy')->value['rebate'])/100);?>
</td><th></th>
					<td><?php echo sprintf('%.2f',$_smarty_tpl->getVariable('pso')->value['agio']+$_smarty_tpl->getVariable('pso')->value['baseAgio']+$_smarty_tpl->getVariable('proxy')->value['rebate']);?>
</td><th></th> -->
					<td><?php echo sprintf('%.2f',$_smarty_tpl->getVariable('pso')->value['INTbid']*$_smarty_tpl->getVariable('pso')->value['weight']*$_smarty_tpl->getVariable('proxy')->value['mag']*(100+$_smarty_tpl->getVariable('pso')->value['agio']+$_smarty_tpl->getVariable('pso')->value['baseAgio']+$_smarty_tpl->getVariable('proxy')->value['rebate'])/100);?>
</td><th></th>
					<?php }?>
					<th><a href="javascript:;" onclick="show_detail(this,'<?php echo $_smarty_tpl->getVariable('pso')->value['id'];?>
',31)"></a></th>
					<th class="yx"></th>
				</tr>
				<?php }} ?>
				<?php }else{ ?>
				<tr class="No_info"><th class="zx"></th><td colspan="31">当前没有你搜索的产品 , <a href="<?php echo smarty_function_write_url(array('open'=>'home','action'=>'search'),$_smarty_tpl->smarty,$_smarty_tpl);?>
">点击重新查询</a></td><th class="yx"></th></tr>
				<?php }?>
				<tr class="x"><th colspan="33"></th></tr>
			</table>
		
			<div class="Page">
				<?php if ($_smarty_tpl->getVariable('list_text')->value){?>
				<ul>
					<li><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'page'=>$_smarty_tpl->getVariable('list_page')->value['up']),$_smarty_tpl->smarty,$_smarty_tpl);?>
">上一页</a></li>
					<?php  $_smarty_tpl->tpl_vars['Npc'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('list_page')->value['PageCode']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['Npc']->key => $_smarty_tpl->tpl_vars['Npc']->value){
?><li><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'page'=>$_smarty_tpl->getVariable('Npc')->value),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php if ($_smarty_tpl->getVariable('Npc')->value==$_smarty_tpl->getVariable('get')->value['page']){?>class="this"<?php }?>><?php echo $_smarty_tpl->getVariable('Npc')->value;?>
</a></li><?php }} ?>
					<li><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'page'=>$_smarty_tpl->getVariable('list_page')->value['down']),$_smarty_tpl->smarty,$_smarty_tpl);?>
">下一页</a></li>
				</ul>
				<?php }?>
				<i class="clear"></i>
			</div>
		</form>
	<?php }?>
	</div>
	<?php $_template = new Smarty_Internal_Template("foot.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

</div>
</body>
</html>
