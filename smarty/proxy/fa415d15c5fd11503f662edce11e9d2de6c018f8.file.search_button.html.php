<?php /* Smarty version Smarty3-b8, created on 2011-05-25 16:20:22
         compiled from "D:\htdocs\yulog.net.shehua\proxy/Template/search_button.html" */ ?>
<?php /*%%SmartyHeaderCode:315594ddcbbc62ef953-23512133%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fa415d15c5fd11503f662edce11e9d2de6c018f8' => 
    array (
      0 => 'D:\\htdocs\\yulog.net.shehua\\proxy/Template/search_button.html',
      1 => 1306311547,
    ),
  ),
  'nocache_hash' => '315594ddcbbc62ef953-23512133',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_write_url')) include 'D:\htdocs\yulog.net.shehua\smarty\plugins\function.write_url.php';
if (!is_callable('smarty_function_CLASS_COLOR')) include 'D:\htdocs\yulog.net.shehua\smarty\plugins\function.CLASS_COLOR.php';
if (!is_callable('smarty_function_brite_spot')) include 'D:\htdocs\yulog.net.shehua\smarty\plugins\function.brite_spot.php';
if (!is_callable('smarty_function_Goto_diploma')) include 'D:\htdocs\yulog.net.shehua\smarty\plugins\function.Goto_diploma.php';
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
		<img src="images/logo.jpg" />
		<?php $_template = new Smarty_Internal_Template("nav.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

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
					<li class="t1"><a <?php echo smarty_function_CLASS_COLOR(array('round'=>$_smarty_tpl->getVariable('post')->value['shape'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'shape' , 'round')"></a></li>
					<li class="t2"><a <?php echo smarty_function_CLASS_COLOR(array('princesse'=>$_smarty_tpl->getVariable('post')->value['shape'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'shape' , 'princesse')"></a></li>
					<li class="t3"><a <?php echo smarty_function_CLASS_COLOR(array('emerald'=>$_smarty_tpl->getVariable('post')->value['shape'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'shape' , 'emerald')"></a></li>
					<li class="t4"><a <?php echo smarty_function_CLASS_COLOR(array('oval'=>$_smarty_tpl->getVariable('post')->value['shape'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'shape' , 'oval')"></a></li>
					<li class="t5"><a <?php echo smarty_function_CLASS_COLOR(array('marquise'=>$_smarty_tpl->getVariable('post')->value['shape'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'shape' , 'marquise')"></a></li>
					<li class="t6"><a <?php echo smarty_function_CLASS_COLOR(array('cushion'=>$_smarty_tpl->getVariable('post')->value['shape'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'shape' , 'cushion')"></a></li>
					<li class="t7"><a <?php echo smarty_function_CLASS_COLOR(array('pear'=>$_smarty_tpl->getVariable('post')->value['shape'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'shape' , 'pear')"></a></li>
					<li class="t8"><a <?php echo smarty_function_CLASS_COLOR(array('heart'=>$_smarty_tpl->getVariable('post')->value['shape'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'shape' , 'heart')"></a></li>
					<li class="t9"><a href="javascript:;"></a></li>
					<li class="t10"><a href="javascript:;"></a></li>
				</ul>
				<input type="hidden" name="shape" id="shape" value="<?php echo $_smarty_tpl->getVariable('post')->value['shape'];?>
" />
			</div>
			<div class="bon">
				<strong>净度</strong>
				<dl class="v1">
					<dd class="t"><a <?php echo smarty_function_CLASS_COLOR(array('IF'=>$_smarty_tpl->getVariable('post')->value['clarity'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'clarity' , 'IF')">IF</a></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('VVS1'=>$_smarty_tpl->getVariable('post')->value['clarity'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'clarity' , 'VVS1')">VVS1</a></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('VVS2'=>$_smarty_tpl->getVariable('post')->value['clarity'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'clarity' , 'VVS2')">VVS2</a></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('VS1'=>$_smarty_tpl->getVariable('post')->value['clarity'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'clarity' , 'VS1')">VS1</a></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('VS2'=>$_smarty_tpl->getVariable('post')->value['clarity'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'clarity' , 'VS2')">VS2</a></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('SI1'=>$_smarty_tpl->getVariable('post')->value['clarity'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'clarity' , 'SI1')">SI1</a></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('SI2'=>$_smarty_tpl->getVariable('post')->value['clarity'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'clarity' , 'SI2')">SI2</a></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('SI3'=>$_smarty_tpl->getVariable('post')->value['clarity'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'clarity' , 'SI3')">SI3</a></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('I1'=>$_smarty_tpl->getVariable('post')->value['clarity'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'clarity' , 'I1')">I1</a></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('I2'=>$_smarty_tpl->getVariable('post')->value['clarity'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'clarity' , 'I2')">I2</a></dd><dt></dt>
					<dd class="w"><a <?php echo smarty_function_CLASS_COLOR(array('I3'=>$_smarty_tpl->getVariable('post')->value['clarity'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'clarity' , 'I3')">I3</a></dd>
				</dl>
				<input type="hidden" name="clarity" id="clarity" value="<?php echo $_smarty_tpl->getVariable('post')->value['clarity'];?>
" />
				<strong>切工</strong>
				<dl class="v2">
					<dd class="t"><a <?php echo smarty_function_CLASS_COLOR(array('ID'=>$_smarty_tpl->getVariable('post')->value['cut'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'cut' , 'ID')">ID</a></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('EX'=>$_smarty_tpl->getVariable('post')->value['cut'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'cut' , 'EX')">EX</a></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('VG'=>$_smarty_tpl->getVariable('post')->value['cut'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'cut' , 'VG')">VG</a></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('G'=>$_smarty_tpl->getVariable('post')->value['cut'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'cut' , 'G')">GD</a></dd><dt></dt>
					<dd class="w"><a <?php echo smarty_function_CLASS_COLOR(array('FR'=>$_smarty_tpl->getVariable('post')->value['cut'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'cut' , 'FR')">FR</a></dd>
				</dl>
				<input type="hidden" name="cut" id="cut" value="<?php echo $_smarty_tpl->getVariable('post')->value['cut'];?>
" />
			</div>
			<div class="bon">
				<strong>颜色</strong>
				<dl class="v1">
					<dd class="t"><a <?php echo smarty_function_CLASS_COLOR(array('D'=>$_smarty_tpl->getVariable('post')->value['color'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'color' , 'D')">D</a></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('E'=>$_smarty_tpl->getVariable('post')->value['color'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'color' , 'E')">E</a></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('F'=>$_smarty_tpl->getVariable('post')->value['color'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'color' , 'F')">F</a></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('G'=>$_smarty_tpl->getVariable('post')->value['color'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'color' , 'G')">G</a></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('H'=>$_smarty_tpl->getVariable('post')->value['color'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'color' , 'H')">H</a></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('I'=>$_smarty_tpl->getVariable('post')->value['color'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'color' , 'I')">I</a></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('J'=>$_smarty_tpl->getVariable('post')->value['color'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'color' , 'J')">J</a></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('K'=>$_smarty_tpl->getVariable('post')->value['color'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'color' , 'K')">K</a></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('L'=>$_smarty_tpl->getVariable('post')->value['color'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'color' , 'L')">L</a></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('M'=>$_smarty_tpl->getVariable('post')->value['color'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'color' , 'M')">M</a></dd><dt></dt>
					<dd class="w"><a <?php echo smarty_function_CLASS_COLOR(array('N'=>$_smarty_tpl->getVariable('post')->value['color'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'color' , 'N')">N</a></dd>
				</dl>
				<input type="hidden" name="color" id="color" value="<?php echo $_smarty_tpl->getVariable('post')->value['color'];?>
" />
				<strong>抛光</strong>
				<dl class="v2">
					<dd class="t"><a <?php echo smarty_function_CLASS_COLOR(array('ID'=>$_smarty_tpl->getVariable('post')->value['buffing'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'buffing' , 'ID')">ID</a></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('EX'=>$_smarty_tpl->getVariable('post')->value['buffing'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'buffing' , 'EX')">EX</a></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('VG'=>$_smarty_tpl->getVariable('post')->value['buffing'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'buffing' , 'VG')">VG</a></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('G'=>$_smarty_tpl->getVariable('post')->value['buffing'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'buffing' , 'G')">GD</a></dd><dt></dt>
					<dd class="w"><a <?php echo smarty_function_CLASS_COLOR(array('FR'=>$_smarty_tpl->getVariable('post')->value['buffing'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'buffing' , 'FR')">FR</a></dd>
				</dl>
				<input type="hidden" name="buffing" id="buffing" value="<?php echo $_smarty_tpl->getVariable('post')->value['buffing'];?>
" />
			</div>
			<div class="bon">
				<strong>证书</strong>
				<dl class="v1">
					<dd class="t"><a <?php echo smarty_function_CLASS_COLOR(array('GIA'=>$_smarty_tpl->getVariable('post')->value['diploma'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'diploma' , 'GIA')">GIA</a></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('HRD'=>$_smarty_tpl->getVariable('post')->value['diploma'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'diploma' , 'HRD')">HRD</a></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('IGI'=>$_smarty_tpl->getVariable('post')->value['diploma'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'diploma' , 'IGI')">IGI</a></dd><dt></dt>
					<dd class="w"><a <?php echo smarty_function_CLASS_COLOR(array('Other'=>$_smarty_tpl->getVariable('post')->value['diploma'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'diploma' , 'Other')">国检</a></dd>
				</dl>
				<input type="hidden" name="diploma" id="diploma" value="<?php echo $_smarty_tpl->getVariable('post')->value['diploma'];?>
" />
				<strong>对称</strong>
				<dl class="v2">
					<dd class="t"><a <?php echo smarty_function_CLASS_COLOR(array('ID'=>$_smarty_tpl->getVariable('post')->value['symmetry'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'symmetry' , 'ID')">ID</a></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('EX'=>$_smarty_tpl->getVariable('post')->value['symmetry'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'symmetry' , 'EX')">EX</a></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('VG'=>$_smarty_tpl->getVariable('post')->value['symmetry'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'symmetry' , 'VG')">VG</a></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('G'=>$_smarty_tpl->getVariable('post')->value['symmetry'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'symmetry' , 'G')">GD</a></dd><dt></dt>
					<dd class="w"><a <?php echo smarty_function_CLASS_COLOR(array('FR'=>$_smarty_tpl->getVariable('post')->value['symmetry'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'symmetry' , 'FR')">FR</a></dd>
				</dl>
				<input type="hidden" name="symmetry" id="symmetry" value="<?php echo $_smarty_tpl->getVariable('post')->value['symmetry'];?>
" />
			</div>
			<div class="bon sis">
				<strong>荧光颜色</strong>
				<dl class="v3">
					<dd class="t"><a <?php echo smarty_function_CLASS_COLOR(array('Blue'=>$_smarty_tpl->getVariable('post')->value['Fent_color'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'Fent_color' , 'Blue')">Blue</a></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('Yellow'=>$_smarty_tpl->getVariable('post')->value['Fent_color'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'Fent_color' , 'Yellow')">Yellow</a></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('Green'=>$_smarty_tpl->getVariable('post')->value['Fent_color'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'Fent_color' , 'Green')">Green</a></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('Red'=>$_smarty_tpl->getVariable('post')->value['Fent_color'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'Fent_color' , 'Red')">Red</a></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('Orange'=>$_smarty_tpl->getVariable('post')->value['Fent_color'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'Fent_color' , 'Orange')">Orange</a></dd><dt></dt>
					<dd class="w"><a <?php echo smarty_function_CLASS_COLOR(array('White'=>$_smarty_tpl->getVariable('post')->value['Fent_color'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'Fent_color' , 'White')">White</a></dd>
				</dl>
				<input type="hidden" name="Fent_color" id="Fent_color" value="<?php echo $_smarty_tpl->getVariable('post')->value['Fent_color'];?>
" />
				<strong>荧光强度</strong>
				<dl class="v2">
					<dd class="t"><a <?php echo smarty_function_CLASS_COLOR(array('N'=>$_smarty_tpl->getVariable('post')->value['Fent_Isity'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'Fent_Isity' , 'N')">N</a></dd><dt></dt>
					<dd><a <?php if ($_smarty_tpl->getVariable('post')->value['Fent_Isity']=='F/SL'){?>class='this'<?php }?> href="javascript:;" onclick="sbon(this , 'Fent_Isity' , 'F/SL')">F</a></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('M'=>$_smarty_tpl->getVariable('post')->value['Fent_Isity'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'Fent_Isity' , 'M')">M</a></dd><dt></dt>
					<dd><a <?php echo smarty_function_CLASS_COLOR(array('S'=>$_smarty_tpl->getVariable('post')->value['Fent_Isity'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'Fent_Isity' , 'S')">S</a></dd><dt></dt>
					<dd class="w"><a <?php echo smarty_function_CLASS_COLOR(array('VS'=>$_smarty_tpl->getVariable('post')->value['Fent_Isity'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
 href="javascript:;" onclick="sbon(this , 'Fent_Isity' , 'VS')">VS</a></dd>
				</dl>
				<input type="hidden" name="Fent_Isity" id="Fent_Isity" value="<?php echo $_smarty_tpl->getVariable('post')->value['Fent_Isity'];?>
" />
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
					<th class="z"></th><td>选择</td><th></th>
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
					<td>¥/每卡</td><th></th>
					<td>
						<?php if ($_smarty_tpl->getVariable('get')->value['orders']=='asc'){?>
						<a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'px'=>'agio','orders'=>'desc'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('agio'=>$_smarty_tpl->getVariable('get')->value['px'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>退点% ↑</a>
						<?php }else{ ?>
						<a href="<?php echo smarty_function_write_url(array('url'=>$_smarty_tpl->getVariable('thisurl')->value,'px'=>'agio','orders'=>'asc'),$_smarty_tpl->smarty,$_smarty_tpl);?>
" <?php echo smarty_function_CLASS_COLOR(array('agio'=>$_smarty_tpl->getVariable('get')->value['px'],'CLASS'=>'this'),$_smarty_tpl->smarty,$_smarty_tpl);?>
>退点% ↓</a>
						<?php }?>
					</td><th></th>
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
					
					<td><input type="checkbox" name="id[]" value="<?php echo $_smarty_tpl->getVariable('pso')->value['id'];?>
" /></td><th></th>
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
					<td><?php echo sprintf('%.2f',$_smarty_tpl->getVariable('pso')->value['INTbid']*(100+$_smarty_tpl->getVariable('pso')->value['agio']+$_smarty_tpl->getVariable('pso')->value['baseAgio']+$_smarty_tpl->getVariable('pso')->value['promotion_dot'])/100);?>
</td><th></th>
					<td><?php echo sprintf('%.2f',$_smarty_tpl->getVariable('pso')->value['agio']+$_smarty_tpl->getVariable('pso')->value['baseAgio']+$_smarty_tpl->getVariable('pso')->value['promotion_dot']);?>
</td><th></th>
					<td><?php echo sprintf('%.2f',$_smarty_tpl->getVariable('pso')->value['INTbid']*$_smarty_tpl->getVariable('pso')->value['weight']*(100+$_smarty_tpl->getVariable('pso')->value['agio']+$_smarty_tpl->getVariable('pso')->value['baseAgio']+$_smarty_tpl->getVariable('pso')->value['promotion_dot'])/100);?>
</td><th></th>
					<?php }else{ ?>
					<td><?php echo sprintf('%.2f',$_smarty_tpl->getVariable('pso')->value['INTbid']*(100+$_smarty_tpl->getVariable('pso')->value['agio']+$_smarty_tpl->getVariable('pso')->value['baseAgio']+$_smarty_tpl->getVariable('proxy')->value['rebate'])/100);?>
</td><th></th>
					<td><?php echo sprintf('%.2f',$_smarty_tpl->getVariable('pso')->value['agio']+$_smarty_tpl->getVariable('pso')->value['baseAgio']+$_smarty_tpl->getVariable('proxy')->value['rebate']);?>
</td><th></th>
					<td><?php echo sprintf('%.2f',$_smarty_tpl->getVariable('pso')->value['INTbid']*$_smarty_tpl->getVariable('pso')->value['weight']*(100+$_smarty_tpl->getVariable('pso')->value['agio']+$_smarty_tpl->getVariable('pso')->value['baseAgio']+$_smarty_tpl->getVariable('proxy')->value['rebate'])/100);?>
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
				<input type="submit" value="" />
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
