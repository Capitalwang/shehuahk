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
echo "<script>alert(\"ɾ���ɹ�\")</script>";
}
}
else
{
echo "<script>alert(\"�Լ�����ɾ���Լ�\")</script>";
}

}

$sql = "select * from admin";
$reule = mysql_query($sql);



?>
<body style="background:transparent;">
<table border=1 align="center" cellspacing=0 cellpadding=4>
<tr><td colspan=6 align="center" >ϵͳ������Ϣ</td></tr>
<tr>
<td width=80 align="center">���</td><td width=150 align="center">�����ʺ�</td><td align="center" width=180>ע��ʱ��</td><td width=180 align="center">����¼ʱ��</td><td align="center">����¼IP</td><td align="center" width=80>����</td>
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
echo "<td align=\"center\"><a href=\"".$url. $row[user]."\">ɾ��</a></td>";
echo "</tr>";


}




?>

</table>
</body>