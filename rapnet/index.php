<?php
//echo date("Y年m月j日 G:i+5:s");
//echo $_SERVER["REMOTE_ADDR"];
include('conn.php');
if($_POST[user]!="")
{
$sql= "select * from admin where user='$_POST[user]' and psw='".md5($_POST[psw])."'";
//echo $sql."</br>";
$row= mysql_query($sql);
if(@ mysql_num_rows($row)==1)
{
$da =date("Y-m-j");
$sql="update admin set redd= '".$da."',reip = '".$_SERVER["REMOTE_ADDR"]."'where user='$_POST[user]'";
mysql_query($sql);
setcookie("user",$_POST[user],time()+1500);
setcookie("psw",md5($_POST[psw]),time()+1500);
//echo "<script>alert(\"登陆成功\")</script>";
header("location:admin.php");
}
else
{
echo "<script>alert(\"账号或密码错误\")</script>";

}
}


?>


<html>
<head>
<title>后台登陆</title>
<style type="text/css">
#bg
{
background-image:url(image/bg.gif);
background-repeat:no-repeat;
width:600px;
height:500px;

position:fixed;top:25%;left:35%;margin-left:width/2;margin-top:height/2;
text-align:20%;
}
#bg1
{
margin-top:130px;
margin-left:50px;

}
#bu
{

margin-top:10px;
margin-left:167px;
}
#zc
{
margin-top:100px;
margin-left:250px;


}
</style>
</head>
<body background="image/h.jpg">
<script  language="javascript">
function Checklogin(f)
{
if (f.user.value=="")
	{
		alert("请填写登录名");
		f.user.focus();
		return false;
	}
		if (f.psw.value=="")
	{
		alert("密码不能为空");
		f.psw.focus();
		return false;
	}


}


</script>


<div id="bg">
<div id="bg1">
<form method="post" name="form1"  onsubmit="return Checklogin(this);">
输入帐号：<input type="text"/ name="user"></br></br>
输入密码：<input type="password" name="psw"> </br>
<input type="submit"  value="确认登录" id="bu"  />
</form>
</div>
<div id="zc">
技术支持：小软工作室

</div>
</div>
</body >
</html>