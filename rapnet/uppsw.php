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
echo "<script>alert(\"�޸�����ɹ�\")</script>";
}
else
{
echo "<script>alert(\"�޸�����ʧ��\")</script>";
}
}
else
{
echo "<script>alert(\"�������\")</script>";

}

}



?>
<script language="javascript">
function sub1(f)
{
if(f.psw1.value=="")
{
alert("�����벻��Ϊ��");
return false;
}
if(f.psw2.value=="")
{
alert("�����벻��Ϊ��");
return false;
}
if(f.psw2.value != f.psw3.value)
{
alert("���벻һ��");
return false;
}

}


</script>
<body style="background:transparent;">
<center>
<table border=1  cellspacing=0 cellpadding=4>
<form method="get" onsubmit="return sub1(this);">
<tr>
<td align="center">�޸�����</td>
</tr>
<tr>
<td>������: <input type="password" name="psw1"></td>
</tr>
<tr>
<td>������: <input type="password" name="psw2"></td>
</tr>
<tr>
<td>������: <input type="password" name="psw3"></td>
</tr>
<tr>
<td align="center"><input type="submit" value="ȷ���޸�"></td>
</tr>
</table>
</form>
</center>
</body>