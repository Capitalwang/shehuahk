<?php
include('conn.php');
include('iflogin.php');
if("" !=$_POST[add_admin])
{
if($_POST["add_psw"] == $_POST["add_psw1"])
{
$sql ="select * from admin where user='$_POST[add_admin]'";
$re=mysql_query($sql);
if(mysql_num_rows($re)==0)
{

$sql="insert into admin(user,psw,redate) values('".$_POST[add_admin]."','".md5($_POST[add_psw])."',curdate())";
$row = mysql_query($sql);
//echo $sql;

//echo mysql_num_rows($row);
if($row)
{
echo "<script>alert(\"��ӹ���ɹ�\")</script>";


}
else
{

echo "<script>alert(\"��ӹ���ʧ��\")</script>";

}
}
else
{

echo "<script>alert(\"�����Ѵ���\")</script>";
}
}
else
{
echo "<script>alert(\"������������벻һ��\")</script>";

}
}
//echo $_POST["add_admin"];




?>
<style type="text/css">
#in
{
background-color:f4f4f4;
width:155px;
line-height:20px;

}
#adm
{
/*background-image:url("image/bg1.gif");*/
background-color:f8f8f8;
margin��30px;
text-height:1px;
width:350px;
background-color:transparent;
}


</style>
<body  style="background:transparent;">
<center>
<form method="post" >
<table border=1 cellspacing=0 cellpadding=4 >
<tr><td align="center">��ӹ���Ա</td></tr>
<tr><td align="center">�˺ţ�<input type="text" name="add_admin" id="in" ></td></tr>
<tr><td align="center">���룺<input type="password" name="add_psw" id="in" ></td></tr>
<tr><td align="center">ȷ�ϣ�<input type="password" name="add_psw1" id="in"></td></tr>
<tr><td align="center"><input type="submit" value="ȷ�����" style=" padding-right:10px;" name="sub1"></td></tr>
</table>
</form>
</center>
</body>