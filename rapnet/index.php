<?php
//echo date("Y��m��j�� G:i+5:s");
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
//echo "<script>alert(\"��½�ɹ�\")</script>";
header("location:admin.php");
}
else
{
echo "<script>alert(\"�˺Ż��������\")</script>";

}
}


?>


<html>
<head>
<title>��̨��½</title>
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
		alert("����д��¼��");
		f.user.focus();
		return false;
	}
		if (f.psw.value=="")
	{
		alert("���벻��Ϊ��");
		f.psw.focus();
		return false;
	}


}


</script>


<div id="bg">
<div id="bg1">
<form method="post" name="form1"  onsubmit="return Checklogin(this);">
�����ʺţ�<input type="text"/ name="user"></br></br>
�������룺<input type="password" name="psw"> </br>
<input type="submit"  value="ȷ�ϵ�¼" id="bu"  />
</form>
</div>
<div id="zc">
����֧�֣�С������

</div>
</div>
</body >
</html>