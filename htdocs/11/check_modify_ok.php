<?php
$conn=mysql_connect("localhost","root","root") or die("���ݿ���������Ӵ���".mysql_error());
mysql_select_db("db_database18",$conn) or die("���ݿ���ʴ���".mysql_error());
mysql_query("set names gb2312");
$title=$_POST[txt_title];
$content=$_POST[txt_content];
$id=$_POST[id];
$sql=mysql_query("update tb_affiche set title='$title',content='$content' where id=$id");
if($sql){
	echo "<script>alert('������Ϣ�༭�ɹ���');history.back();window.location.href='modify.php?id=$id';</script>";
}else{
	echo "<script>alert('������Ϣ�༭ʧ�ܣ�');history.back();window.location.href='modify.php?id=$id';</script>";
}
?>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
