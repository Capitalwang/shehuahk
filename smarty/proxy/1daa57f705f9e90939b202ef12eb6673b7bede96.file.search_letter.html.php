<?php /* Smarty version Smarty3-b8, created on 2015-09-30 17:50:02
         compiled from "D:\www\shehuahk\wholesale/Template/search_letter.html" */ ?>
<?php /*%%SmartyHeaderCode:10223560bb04a46b0b0-92389927%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1daa57f705f9e90939b202ef12eb6673b7bede96' => 
    array (
      0 => 'D:\\www\\shehuahk\\wholesale/Template/search_letter.html',
      1 => 1443606538,
    ),
  ),
  'nocache_hash' => '10223560bb04a46b0b0-92389927',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_write_url')) include 'D:\www\shehuahk\smarty\plugins\function.write_url.php';
if (!is_callable('smarty_function_CLASS_COLOR')) include 'D:\www\shehuahk\smarty\plugins\function.CLASS_COLOR.php';
if (!is_callable('smarty_function_brite_spot')) include 'D:\www\shehuahk\smarty\plugins\function.brite_spot.php';
if (!is_callable('smarty_function_Goto_diploma')) include 'D:\www\shehuahk\smarty\plugins\function.Goto_diploma.php';
?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<title>奢华</title>
<link href="css/kh-index.css" rel="stylesheet" type="text/css" />
<link href="css/quer.css" rel="stylesheet" type="text/css" />
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
	<div class="gray search">
		<ul class="top">
			<li><a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'st'=>'l'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('l'=>$_smarty_tpl->getVariable('get')->value['st'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>搜索条件</a></li>
			
		</ul>
		<form class="form1" action="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'go'=>'query'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" method="post">
			<div class="ler">
				<strong>形状：</strong>
				<dl>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('round'=>$_smarty_tpl->getVariable('post')->value['shape'][0],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'round')">圆形</a><input type="hidden" name="shape[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['shape'][0];?>
" /></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('princess'=>$_smarty_tpl->getVariable('post')->value['shape'][1],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'princess')">公主方</a><input type="hidden" name="shape[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['shape'][1];?>
" /></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('heart'=>$_smarty_tpl->getVariable('post')->value['shape'][2],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'heart')">心形</a><input type="hidden" name="shape[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['shape'][2];?>
" /></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('pear'=>$_smarty_tpl->getVariable('post')->value['shape'][3],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'pear')">梨形</a><input type="hidden" name="shape[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['shape'][3];?>
" /></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('emerald'=>$_smarty_tpl->getVariable('post')->value['shape'][4],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'emerald')">祖母绿</a><input type="hidden" name="shape[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['shape'][4];?>
" /></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('marquise'=>$_smarty_tpl->getVariable('post')->value['shape'][5],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'marquise')">马眼形</a><input type="hidden" name="shape[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['shape'][5];?>
" /></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('cushion'=>$_smarty_tpl->getVariable('post')->value['shape'][6],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'cushion')">垫形</a><input type="hidden" name="shape[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['shape'][6];?>
" /></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('oval'=>$_smarty_tpl->getVariable('post')->value['shape'][7],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'oval')">椭圆形</a><input type="hidden" name="shape[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['shape'][7];?>
" /></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('radiant'=>$_smarty_tpl->getVariable('post')->value['shape'][8],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'radiant')">明亮形</a><input type="hidden" name="shape[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['shape'][8];?>
" /></dd>
				</dl>
			</div>
			<div class="ler">
				<strong>净度：</strong>
				<dl>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('IF'=>$_smarty_tpl->getVariable('post')->value['clarity'][0],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
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
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('I3'=>$_smarty_tpl->getVariable('post')->value['clarity'][10],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'I3')">I3</a><input type="hidden" name="clarity[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['clarity'][10];?>
" /></dd>
				</dl>
			</div>
			<div class="ler">
				<strong>颜色：</strong>
				<dl>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('D'=>$_smarty_tpl->getVariable('post')->value['color'][0],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
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
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('N'=>$_smarty_tpl->getVariable('post')->value['color'][10],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'N')">N</a><input type="hidden" name="color[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['color'][10];?>
" /></dd>
				</dl>
			</div>
			<div class="ler">
				<strong>抛光：</strong>
				<dl>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('ID'=>$_smarty_tpl->getVariable('post')->value['buffing'][0],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'ID')">ID</a><input type="hidden" name="buffing[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['buffing'][0];?>
" /></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('EX'=>$_smarty_tpl->getVariable('post')->value['buffing'][1],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'EX')">EX</a><input type="hidden" name="buffing[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['buffing'][1];?>
" /></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('VG'=>$_smarty_tpl->getVariable('post')->value['buffing'][2],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'VG')">VG</a><input type="hidden" name="buffing[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['buffing'][2];?>
" /></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('G'=>$_smarty_tpl->getVariable('post')->value['buffing'][3],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'G')">G</a><input type="hidden" name="buffing[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['buffing'][3];?>
" /></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('FR'=>$_smarty_tpl->getVariable('post')->value['buffing'][4],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'FR')">FR</a><input type="hidden" name="buffing[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['buffing'][4];?>
" /></dd>
				</dl>
			</div>
			<div class="ler">
				<strong>对称：</strong>
				<dl>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('ID'=>$_smarty_tpl->getVariable('post')->value['symmetry'][0],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'ID')">ID</a><input type="hidden" name="symmetry[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['symmetry'][0];?>
" /></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('EX'=>$_smarty_tpl->getVariable('post')->value['symmetry'][1],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'EX')">EX</a><input type="hidden" name="symmetry[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['symmetry'][1];?>
" /></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('VG'=>$_smarty_tpl->getVariable('post')->value['symmetry'][2],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'VG')">VG</a><input type="hidden" name="symmetry[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['symmetry'][2];?>
" /></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('G'=>$_smarty_tpl->getVariable('post')->value['symmetry'][3],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'G')">G</a><input type="hidden" name="symmetry[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['symmetry'][3];?>
" /></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('FR'=>$_smarty_tpl->getVariable('post')->value['symmetry'][4],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'FR')">FR</a><input type="hidden" name="symmetry[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['symmetry'][4];?>
" /></dd>
				</dl>
			</div>
			<div class="ler">
				<strong>切工：</strong>
				<dl>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('ID'=>$_smarty_tpl->getVariable('post')->value['cut'][0],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'ID')">ID</a><input type="hidden" name="cut[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['cut'][0];?>
" /></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('EX'=>$_smarty_tpl->getVariable('post')->value['cut'][1],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'EX')">EX</a><input type="hidden" name="cut[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['cut'][1];?>
" /></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('VG'=>$_smarty_tpl->getVariable('post')->value['cut'][2],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'VG')">VG</a><input type="hidden" name="cut[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['cut'][2];?>
" /></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('G'=>$_smarty_tpl->getVariable('post')->value['cut'][3],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'G')">G</a><input type="hidden" name="cut[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['cut'][3];?>
" /></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('FR'=>$_smarty_tpl->getVariable('post')->value['cut'][4],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'FR')">FR</a><input type="hidden" name="cut[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['cut'][4];?>
" /></dd>
				</dl>
			</div>
			<div class="ler">
				<strong>证书: </strong>
				<dl>
					<!-- <dd><a <?php echo smarty_function_CLASS_COLOR(array('Blue'=>$_smarty_tpl->getVariable('post')->value['Fent_color'][0],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
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
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('White'=>$_smarty_tpl->getVariable('post')->value['Fent_color'][5],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'White')">White</a><input type="hidden" name="Fent_color[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['Fent_color'][5];?>
" /></dd> -->
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
			</div>
			<div class="ler">
				<strong>荧光强度：</strong>
				<dl>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('N'=>$_smarty_tpl->getVariable('post')->value['Fent_Isity'][0],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
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
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('VS'=>$_smarty_tpl->getVariable('post')->value['Fent_Isity'][4],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'VS')">VS</a><input type="hidden" name="Fent_Isity[]" value="<?php echo $_smarty_tpl->getVariable('post')->value['Fent_Isity'][4];?>
" /></dd>
				</dl>
			</div>
			<div class="ler cow">
				<strong>钻重：</strong>
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
<!-- 				<?php if ($_smarty_tpl->getVariable('list_text')->value){?>
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
				<?php }?> -->
				<i class="clear"></i>
			</div>
		
			<table width="100%" border="0" cellspacing="0" cellpadding="0" class="SP">
				<tr class="tp">
					<th class="z sp-h"></th><td class="sp-h">选择</td><th></th>
					<td class="sp-h1">编号</td><th></th>
					<td>形状</td><th></th>
					<td>
						<?php if ($_smarty_tpl->getVariable('get')->value['orders']=='asc'){?>
						<a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'px'=>'weight','orders'=>'desc'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('weight'=>$_smarty_tpl->getVariable('get')->value['px'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>重量 <span class="sp-h1">↑</span></a>
						<?php }else{ ?>
						<a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'px'=>'weight','orders'=>'asc'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('weight'=>$_smarty_tpl->getVariable('get')->value['px'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>重量<span class="sp-h1">↓</span></a>
						<?php }?>
					</td><th></th>
					<td>
						<?php if ($_smarty_tpl->getVariable('get')->value['orders']=='asc'){?>
						<a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'px'=>'color','orders'=>'desc'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('color'=>$_smarty_tpl->getVariable('get')->value['px'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>颜色 <span class="sp-h1">↑</span></a>
						<?php }else{ ?>
						<a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'px'=>'color','orders'=>'asc'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('color'=>$_smarty_tpl->getVariable('get')->value['px'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>颜色<span class="sp-h1">↓</span></a>
						<?php }?>
					</td><th></th>
					<td>
						<?php if ($_smarty_tpl->getVariable('get')->value['orders']=='asc'){?>
						<a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'px'=>'clarity','orders'=>'desc'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('clarity'=>$_smarty_tpl->getVariable('get')->value['px'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>净度<span class="sp-h1">↑</span></a>
						<?php }else{ ?>
						<a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'px'=>'clarity','orders'=>'asc'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('clarity'=>$_smarty_tpl->getVariable('get')->value['px'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>净度<span class="sp-h1">↓</span></a>
						<?php }?>
					</td><th></th>
					<td class="sp-h">切工</td><th class="sp-h"></th>
					<td class="sp-h">抛光</td><th class="sp-h"></th>
					<td class="sp-h">对称</td><th class="sp-h"></th>
					<td class="sp-h">荧光</td><th class="sp-h"></th>
					<td class="sp-h">测量值</td><th class="sp-h"></th>
					<td>证书</td><th></th>
					<td class="sp-h">¥/每卡</td><th class="sp-h"></th>
					<td class="sp-h">
						<?php if ($_smarty_tpl->getVariable('get')->value['orders']=='asc'){?>
						<a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'px'=>'agio','orders'=>'desc'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('agio'=>$_smarty_tpl->getVariable('get')->value['px'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>退点% <span class="sp-h1">↑</span></a>
						<?php }else{ ?>
						<a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'px'=>'agio','orders'=>'asc'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('agio'=>$_smarty_tpl->getVariable('get')->value['px'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>退点%<span class="sp-h1">↓</span></a>
						<?php }?>
					</td><th class="sp-h"></th>
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
					<th class="zx sp-h""></th>
					
					<td class="sp-h"><input type="checkbox" name="id[]" value="<?php echo $_smarty_tpl->getVariable('pso')->value['id'];?>
" /></td><th></th>
					<td class="sp-h1"><?php echo smarty_function_brite_spot(array('query'=>$_smarty_tpl->getVariable('get')->value['info'],'str'=>$_smarty_tpl->getVariable('pso')->value['ProID']),$_smarty_tpl->smarty,$_smarty_tpl);?>
</td><th></th>
					<td ><?php echo $_smarty_tpl->getVariable('shape')->value[$_smarty_tpl->getVariable('pso')->value['shape']];?>
</td><th></th>
					<td><?php echo $_smarty_tpl->getVariable('pso')->value['weight'];?>
</td><th></th>
					<td><?php echo $_smarty_tpl->getVariable('pso')->value['color'];?>
</td><th></th>
					<td><?php echo $_smarty_tpl->getVariable('pso')->value['clarity'];?>
</td><th></th>
					<td class="sp-h"><?php echo $_smarty_tpl->getVariable('pso')->value['cut'];?>
</td><th class="sp-h"></th>
					<td class="sp-h"><?php echo $_smarty_tpl->getVariable('pso')->value['buffing'];?>
</td><th class="sp-h"></th>
					<td class="sp-h"><?php echo $_smarty_tpl->getVariable('pso')->value['symmetry'];?>
</td><th class="sp-h"></th>
					<td class="sp-h"><?php echo $_smarty_tpl->getVariable('pso')->value['Fent_Isity'];?>
</td><th class="sp-h"></th>
					<td class="sp-h"><?php echo $_smarty_tpl->getVariable('pso')->value['scalar_value'];?>
</td><th class="sp-h"></th>
					<td><?php echo smarty_function_Goto_diploma(array('diploma'=>$_smarty_tpl->getVariable('pso')->value['diploma'],'weight'=>$_smarty_tpl->getVariable('pso')->value['weight'],'NO'=>$_smarty_tpl->getVariable('pso')->value['diplomaNO'],'show'=>$_smarty_tpl->getVariable('pso')->value['diploma']),$_smarty_tpl->smarty,$_smarty_tpl);?>
</td><th></th>
					<?php if ($_smarty_tpl->getVariable('proxy')->value['is_offer']=='Y'&&$_smarty_tpl->getVariable('pso')->value['is_promotion']=='Y'&&$_smarty_tpl->getVariable('pso')->value['promotion_start']<=mktime()&&$_smarty_tpl->getVariable('pso')->value['promotion_stop']>=mktime()){?>
					<td class="sp-h"><?php echo sprintf('%.2f',$_smarty_tpl->getVariable('pso')->value['INTbid']*$_smarty_tpl->getVariable('proxy')->value['mag']*(100+$_smarty_tpl->getVariable('pso')->value['agio']+$_smarty_tpl->getVariable('pso')->value['baseAgio']+$_smarty_tpl->getVariable('pso')->value['promotion_dot'])/100);?>
</td><th></th>
					<td class="sp-h"><?php echo sprintf('%.2f',$_smarty_tpl->getVariable('pso')->value['agio']+$_smarty_tpl->getVariable('pso')->value['baseAgio']+$_smarty_tpl->getVariable('pso')->value['promotion_dot']);?>
</td><th></th>
					
					<td class="sp-h"><?php echo sprintf('%.2f',$_smarty_tpl->getVariable('pso')->value['INTbid']*$_smarty_tpl->getVariable('pso')->value['weight']*$_smarty_tpl->getVariable('proxy')->value['mag']*(100+$_smarty_tpl->getVariable('pso')->value['agio']+$_smarty_tpl->getVariable('pso')->value['baseAgio']+$_smarty_tpl->getVariable('pso')->value['promotion_dot'])/100);?>
</td><th></th>
					<?php }else{ ?>
					<td class="sp-h"><?php echo sprintf('%.2f',$_smarty_tpl->getVariable('pso')->value['INTbid']*$_smarty_tpl->getVariable('proxy')->value['mag']*(100+$_smarty_tpl->getVariable('pso')->value['agio']+$_smarty_tpl->getVariable('pso')->value['baseAgio']+$_smarty_tpl->getVariable('proxy')->value['rebate'])/100);?>
</td><th class="sp-h"></th>
					<td class="sp-h"><?php echo sprintf('%.2f',$_smarty_tpl->getVariable('pso')->value['agio']+$_smarty_tpl->getVariable('pso')->value['baseAgio']+$_smarty_tpl->getVariable('proxy')->value['rebate']);?>
</td><th class="sp-h"></th>
					
					<td><?php echo sprintf('%.2f',$_smarty_tpl->getVariable('pso')->value['INTbid']*$_smarty_tpl->getVariable('pso')->value['weight']*$_smarty_tpl->getVariable('proxy')->value['mag']*(100+$_smarty_tpl->getVariable('pso')->value['agio']+$_smarty_tpl->getVariable('pso')->value['baseAgio']+$_smarty_tpl->getVariable('proxy')->value['rebate'])/100);?>
</td><th></th>
					<?php }?>
					<th><a href="javascript:;" onclick="show_detail(this,'<?php echo $_smarty_tpl->getVariable('pso')->value['id'];?>
',31)"></a></th>
					<th class="yx"></th>
				</tr>
				<?php }} ?>
				<?php }else{ ?>
				<tr class="No_info"><th class="zx"></th><td colspan="31">当前没有你搜索的产品 , <a href="<?php echo smarty_function_write_url(array('open'=>'Query'),$_smarty_tpl->smarty,$_smarty_tpl);?>
">点击重新查询</a></td><th class="yx"></th></tr>
				<?php }?>
				<tr class="x"><th colspan="33"></th></tr>
			</table>
		
			<div class="Page">
				<input class="sp-h" type="submit" value="">
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
</div>

<footer>
    <?php $_template = new Smarty_Internal_Template("foot.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

</footer>
<script type="text/javascript" src="Js/hk.js"></script>
</body>
</html>
