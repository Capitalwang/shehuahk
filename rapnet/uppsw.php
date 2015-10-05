<?php
include('conn.php');
include('iflogin.php');
if($_GET[psw1]!="")
{
$sql="select * from admin where user='$_COOKIE[user]' and psw='".md5($_GET[psw1])."'";
//echo $sql;
$re = mysql_query($sql);
if(mysql_num_rows($re)!= 0)
{
$psw = md5($_GET["psw2"]);
$sql ="update admin set psw = '$psw' where user='$_COOKIE[user]'";
if(mysql_query($sql))
{
echo "<script>alert(\"修改密码成功\")</script>";
}
else
{
echo "<script>alert(\"修改密码失败\")</script>";
}
}
else
{
echo "<script>alert(\"密码错误\")</script>";

}

}



?>
<script language="javascript">
function sub1(f)
{
if(f.psw1.value=="")
{
alert("旧密码不能为空");
return false;
}
if(f.psw2.value=="")
{
alert("新密码不能为空");
return false;
}
if(f.psw2.value != f.psw3.value)
{
alert("密码不一致");
return false;
}

}


</script>
<body style="background:transparent;">
<center>
<table border=1  cellspacing=0 cellpadding=4>
<form method="get" onsubmit="return sub1(this);">
<tr>
<td align="center">修改密码</td>
</tr>
<tr>
<td>旧密码: <input type="password" name="psw1"></td>
</tr>
<tr>
<td>新密码: <input type="password" name="psw2"></td>
</tr>
<tr>
<td>新密码: <input type="password" name="psw3"></td>
</tr>
<tr>
<td align="center"><input type="submit" value="确认修改"></td>
</tr>
</table>
</form>
</center>
</body>