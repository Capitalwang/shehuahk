<?php
include('conn.php');
include('iflogin.php');
//include('iflogin.php');
if($_GET[user]!="")
{
if($_GET[user]!=$_COOKIE[user])
{
$sql = "delete from admin where user='$_GET[user]'";
if(mysql_query($sql))
{
echo "<script>alert(\"删除成功\")</script>";
}
}
else
{
echo "<script>alert(\"自己不能删除自己\")</script>";
}

}

$sql = "select * from admin";
$reule = mysql_query($sql);



?>
<body style="background:transparent;">
<table border=1 align="center" cellspacing=0 cellpadding=4>
<tr><td colspan=6 align="center" >系统管理信息</td></tr>
<tr>
<td width=80 align="center">序号</td><td width=150 align="center">管理帐号</td><td align="center" width=180>注册时间</td><td width=180 align="center">最后登录时间</td><td align="center">最后登录IP</td><td align="center" width=80>操作</td>
</tr>
<?php
$url ="?from=admin&user=";
while($row= mysql_fetch_array($reule))
{
echo "<tr align=\"center\">&nbsp";
echo "<td align=\"center\">&nbsp".$row[id]."</td>";
echo "<td align=\"center\">&nbsp".$row[user]."</td>";
echo "<td align=\"center\">&nbsp".$row[redate]."</td>";
echo "<td align=\"center\">&nbsp".$row[redd]."</td>";
echo "<td align=\"center\">&nbsp".$row[reip]."</td>";
echo "<td align=\"center\"><a href=\"".$url. $row[user]."\">删除</a></td>";
echo "</tr>";


}




?>

</table>
</body>