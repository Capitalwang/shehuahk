<?php
include('conn.php');
include('iflogin.php');
//include('iflogin.php');
if($_GET[user]!="")
{

$sql = "delete from zcuser where id='$_GET[user]'";
if(mysql_query($sql))
{
echo "<script>alert(\"ɾ���ɹ�\")</script>";
}
}
$paeg=1;
$sql="";
if($_GET[p]!=NULL)
{
$paeg=$_GET[p];
}

if ($_GET[showall] != NULl)
{
$sql="select * from zcuser";
}else if($_GET[chao] != NUll )
{
if($_GET[se] == "user")
{
$sql="select * from zcuser where user='".$_GET[seac]."'";
}
if($_GET[se] == "jqm")
{
$sql="select * from zcuser where jiqm='".$_GET[seac]."'";
}
}
else
{
$sql="select * from zcuser";
}

//echo $sql;

$re=mysql_query($sql);
$count = mysql_num_rows($re);
$p1 = ceil($count/10);

if($paeg>=$p1) $paeg=$p1;
if($paeg<=1) $paeg=1;
$start = ($paeg-1)*10;
$sql2= $sql." limit ".$start.",10";
$re= mysql_query($sql2);








?>
<style type="text/css">
#show a{
text-decoration:none;
/*background-image:url("image/p.png");no-repeat;float:right;
width:62;
height:22;
*/


color:#002aff;

}
#show a:hover{
color:#d70d0d;


}

</style>
<body style="background:transparent;" >
<center>
<form method="get">
<select name="se">
<option value="user">�ʺ�</option>
<option value="jqm">������</option>
</select>��������
<input type="text" size=50 name="seac"><input type="submit" name="chao" value="����">
<input type="submit" name="showall" value="��ʾȫ��">
</form>
</center>
<table border=2 align="center" cellpadding=4 cellspacing=0>
<tr><td>���</td><td>�˺�</td><td>������</td><td>ע������</td><td>����½����</td><td>����¼Ip</td><td width=100 align="center">��ע</td><td>����</td></tr>
<?php
while($row = mysql_fetch_array($re))
{
echo "<tr>";
echo "<td>&nbsp$row[id]</td>";
echo "<td>&nbsp$row[user]</td>";
echo "<td>&nbsp$row[jiqm]</td>";
echo "<td>&nbsp$row[redate]</td>";
echo "<td>&nbsp$row[redd]</td>";
echo "<td>&nbsp$row[reip]</td>";
echo "<td>&nbsp$row[bz]</td>";
echo "<td ><a href=\"upinfo.php?uid=$row[id]\"><image style=\"border:0\" src=\"image\up.png\"></a>|<a href=\"?user=$row[id]\"><image style=\"border:0\" src=\"image\del.png\"></a></td>";
echo "</tr>";
}
echo "<tr><td id=\"show\" colspan=8 align=\"center\">����".$count."������ ����".$p1."ҳ ��".$paeg."ҳ <a href=\"?p=".($paeg-1)."\">��һҳ</a> <a href=\"?p=".($paeg+1)."\">��һҳ</a> <a href=\"?p=".(1)."\">����ҳ</a> <a href=\"?p=".$p1."\">��βҳ</a></td></tr>";

?>
</table>
</body>