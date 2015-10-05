<?php
//include('iflogin.php');
//include('conn.php');
$sql= "select * from admin where user='$_COOKIE[user]' and psw='".$_COOKIE[psw]."'";
//echo $sql."</br>";
$row= mysql_query($sql);
if(@ mysql_num_rows($row)!=1)
{
header('location:index.php');
//echo "<script language=javascript>alert(\"µÇÂ¼³¬Ê±£¬»òÎ´µÇÂ¼£¡\")</script>";
return;
}

?>