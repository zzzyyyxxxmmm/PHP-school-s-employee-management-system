<html>
<head>
<title>������Ϣ����</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link href="css/style.css" rel="stylesheet">
</head>
<body>
<script language="javascript">
function check(form){
	if(form.txt_title.value==""){
		alert("������ⲻ��Ϊ��!");form.txt_title.focus();return false;
	}
	if(form.txt_content.value==""){
		alert("�������ݲ���Ϊ��!");form.txt_content.focus();return false;
	}
form.submit();
}
</script>
<?php 
$conn=mysql_connect("localhost","root","root") or die("���ݿ���������Ӵ���".mysql_error());
mysql_select_db("db_database18",$conn) or die("���ݿ���ʴ���".mysql_error());
mysql_query("set names gb2312");
$id=$_GET[id];
$sql=mysql_query("select * from tb_affiche where id=$id");
$row=mysql_fetch_object($sql);
?>
<table width="828" height="522" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td background="images/image_01.gif">&nbsp;			</td>
		<td height="140" background="images/image_02.gif">&nbsp;			</td>
	</tr>
	<tr>
		<td width="202" rowspan="3" valign="top"><?php include("menu.php");?></td>
		<td height="34" background="images/image_04.gif">&nbsp;			</td>
	</tr>
	<tr>
		<td height="38" background="images/image_06.gif">&nbsp;			</td>
	</tr>
	<tr>
		<td height="270" valign="top">
			<table width="626" height="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td height="257" align="center" valign="top" background="images/image_08.gif"><table width="600" height="257"  border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td height="22" align="center" valign="top" class="word_orange"><strong>�༭������Ϣ</strong></td>
                  </tr>
                  <tr>
                    <td height="235" align="center" valign="top"><table width="500" height="226"  border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td height="226" align="center" valign="top">
                            <form name="form1" method="post" action="check_modify_ok.php">
                              <table width="520" height="212"  border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                                <tr>
                                  <td width="87" align="center">�������⣺</td>
                                  <td width="433" height="31"><input name="txt_title" type="text" id="txt_title" size="40" value="<?php echo $row->title;?>">
                                  <input name="id" type="hidden" value="<?php echo $row->id;?>"></td>
                                </tr>
                                <tr>
                                  <td height="124" align="center">�������ݣ�</td>
                                  <td><textarea name="txt_content" cols="50" rows="8" id="txt_content"><?php echo $row->content;?></textarea></td>
                                </tr>
                                <tr>
                                  <td height="40" colspan="2" align="center"><input name="Submit" type="submit" class="btn_grey" value="�޸�" onClick="return check(form1);">                                    &nbsp;                                    <input type="reset" name="Submit2" value="����"></td></tr>
                              </table>
                          </form></td>
                        </tr>
                    </table></td>
                  </tr>
                </table></td>
              </tr>
            </table>			</td>
	</tr>
	<tr>
		<td bgcolor="#F0F0F0"></td>
		<td height="43" background="images/image_12.gif"></td>
	</tr>
</table>
</body>
</html>
