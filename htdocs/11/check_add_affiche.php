<?php
    $conn=mysql_connect("localhost","root","root") or die("���ݿ���������Ӵ���".mysql_error());
    mysql_select_db("db_database18",$conn) or die("���ݿ���ʴ���".mysql_error());
    mysql_query("set names gb2312");
	$title=$_POST[txt_title];
	$content=$_POST[txt_content];
	$createtime=date("Y-m-d H:i:s");
	$sql=mysql_query("insert into tb_affiche(title,content,createtime)values('$title','$content','$createtime')");
	echo "<script>alert('������Ϣ��ӳɹ�!');window.location.href='add_affiche.php';</script>";
	mysql_free_result($sql);
	mysql_close($conn);
?>
