<html>
<head>
<title>������Ϣ����</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link href="css/style.css" rel="stylesheet">
</head>
<body>
<table width="828" height="522" border="0" align="center" cellpadding="0" cellspacing="0" id="__01">
	<tr>
		<td background="images/image_01.gif">&nbsp;			</td>
		<td height="140" background="images/image_02.gif">&nbsp;			</td>
	</tr>
	<tr>
		<td width="202" rowspan="3" valign="top"><table width="202" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><?php include("menu.php");?></td>
          </tr>
        </table></td>
		<td height="34" background="images/image_04.gif">&nbsp;			</td>
	</tr>
	<tr>
		<td height="38" background="images/image_06.gif">&nbsp;			</td>
	</tr>
	<tr>
		<td height="270" valign="top">
			<table width="626" height="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td height="257" align="center" valign="top" background="images/image_08.gif"><table width="600" height="271"  border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td height="22" align="center" valign="top" class="word_orange"><strong>������Ϣ<strong>��ҳ��ʾ</strong></strong></td>
                  </tr>
                  <tr>
                    <td height="249" align="center" valign="top">
					<table width="550" border="1" cellpadding="1" cellspacing="1" bordercolor="#FFFFFF" bgcolor="#999999">
                      <tr align="center" bgcolor="#f0f0f0">
                        <td width="221">�������</td>
                        <td width="329">��������</td>
                      </tr>
					<?php
					$conn=mysql_connect("localhost","root","root") or die("���ݿ���������Ӵ���".mysql_error());
					mysql_select_db("db_database18",$conn) or die("���ݿ���ʴ���".mysql_error());
					mysql_query("set names gb2312");
					/*  $pageΪ��ǰҳ�����$pageΪ�գ����ʼ��Ϊ1  */
					if ($page==""){
						$page=1;}
					   if (is_numeric($page)){
						$page_size=4;     								//ÿҳ��ʾ4����¼
						$query="select count(*) as total from tb_affiche  order by id desc";   
						$result=mysql_query($query);      					//��ѯ���������ļ�¼������
						$message_count=mysql_result($result,0,"total");		//Ҫ��ʾ���ܼ�¼��
						$page_count=ceil($message_count/$page_size);	  	//���ݼ�¼��������ÿҳ��ʾ�ļ�¼��������ֵ�ҳ��
						$offset=($page-1)*$page_size;						//������һҳ�ӵڼ������ݿ�ʼѭ��  
						$sql=mysql_query("select * from tb_affiche order by id desc limit $offset, $page_size");
						$row=mysql_fetch_object($sql);
						if(!$row){
							echo "<font color='red'>���޹�����Ϣ!</font>";
						}
						do{
						?>
                      <tr bgcolor="#FFFFFF">
                        <td><?php echo $row->title;?></td>
                        <td><?php echo $row->content;?></td>
                      </tr>
					<?php
						}while($row=mysql_fetch_object($sql));
					}
					?>
                     </table>
                      <br>
                      <table width="550" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <!--  ��ҳ�� -->
							<td width="37%">&nbsp;&nbsp;ҳ�Σ�<?php echo $page;?>/<?php echo $page_count;?>ҳ&nbsp;��¼��<?php echo $message_count;?> ��&nbsp; </td>
							<td width="63%" align="right">
							<?php
							/*  �����ǰҳ������ҳ  */
							if($page!=1){
							/*  ��ʾ����ҳ��������  */
							echo  "<a href=page_affiche.php?page=1>��ҳ</a>&nbsp;";
							/*  ��ʾ����һҳ��������  */
							echo "<a href=page_affiche.php?page=".($page-1).">��һҳ</a>&nbsp;";
							}
							/*  �����ǰҳ����βҳ  */
							if($page<$page_count){
							/*  ��ʾ����һҳ��������  */
							echo "<a href=page_affiche.php?page=".($page+1).">��һҳ</a>&nbsp;";
							/*  ��ʾ��βҳ��������  */
							echo  "<a href=page_affiche.php?page=".$page_count.">βҳ</a>";
							}
							mysql_free_result($sql);
							mysql_close($conn);
							?>
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