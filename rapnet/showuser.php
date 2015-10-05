<?php
include('conn.php');
include('iflogin.php');
//include('iflogin.php');
if($_GET[user]!="")
{

$sql = "delete from zcuser where id='$_GET[user]'";
if(mysql_query($sql))
{
echo "<script>alert(\"删除成功\")</script>";
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
<option value="user">帐号</option>
<option value="jqm">机器码</option>
</select>查找内容
<input type="text" size=50 name="seac"><input type="submit" name="chao" value="查找">
<input type="submit" name="showall" value="显示全部">
</form>
</center>
<table border=2 align="center" cellpadding=4 cellspacing=0>
<tr><td>编号</td><td>账号</td><td>机器码</td><td>注册日期</td><td>最后登陆日期</td><td>最后登录Ip</td><td width=100 align="center">备注</td><td>操作</td></tr>
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
echo "<tr><td id=\"show\" colspan=8 align=\"center\">共有".$count."条数据 共有".$p1."页 第".$paeg."页 <a href=\"?p=".($paeg-1)."\">上一页</a> <a href=\"?p=".($paeg+1)."\">下一页</a> <a href=\"?p=".(1)."\">到首页</a> <a href=\"?p=".$p1."\">到尾页</a></td></tr>";

?>
</table>
</body>