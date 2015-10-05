<?php
include('conn.php');
$jqm = $_GET[m];
if(strpos($jqm,"'") == false)
{
$sql = "select * from zcuser where jiqm ='".$jqm."'";
$re= mysql_query($sql);
$row =@ mysql_fetch_array($re);
//echo count($row);
if(count($row) > 1)
{
echo $row[user]."<>";
echo $row[psw];
$da =date("Y-m-j");
$sql="update zcuser set redd= '".$da."',reip = '".$_SERVER["REMOTE_ADDR"]."'where jiqm='".$jqm."'";
mysql_query($sql);
}
}



?>