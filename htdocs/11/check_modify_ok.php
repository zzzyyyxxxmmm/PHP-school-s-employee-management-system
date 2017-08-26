<?php
$conn=mysql_connect("localhost","root","root") or die("数据库服务器连接错误".mysql_error());
mysql_select_db("db_database18",$conn) or die("数据库访问错误".mysql_error());
mysql_query("set names gb2312");
$title=$_POST[txt_title];
$content=$_POST[txt_content];
$id=$_POST[id];
$sql=mysql_query("update tb_affiche set title='$title',content='$content' where id=$id");
if($sql){
	echo "<script>alert('公告信息编辑成功！');history.back();window.location.href='modify.php?id=$id';</script>";
}else{
	echo "<script>alert('公告信息编辑失败！');history.back();window.location.href='modify.php?id=$id';</script>";
}
?>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
