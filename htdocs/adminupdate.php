<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link  href="style.css" rel="stylesheet">
<title>Ӧ��mysql_fetch_array()���������������л�ȡ��Ϣ</title>
</head>
<body background="images/02.jpg">
<table width="1044" height="438"  border="0" cellpadding="0" cellspacing="0" bgcolor=" 	#FFFFFF" align="center"> 
	 <form name="myform" method="post" action="">
    <tr> 
	  <td width="312" height="500" bgcolor=" 	#FFFFFF"><div align="center">
	    <p>�û�����
	      <input name="id" type="text" id="txt_book" size="25" > </p>
	    <p>���룺
          <input name="ps" type="text" id="txt_book" size="25" >
	    </p>
	    
	    <p>
	      Ȩ�ޣ���ѯ
	      <input type="checkbox" name="checkbox" id="checkbox">
	      <label for="checkbox"></label>
        ���
        <input type="checkbox" name="checkbox2" id="checkbox2">
        �޸�
        <input type="checkbox" name="checkbox3" id="checkbox4">
        ɾ��
<input type="checkbox" name="checkbox4" id="checkbox3">
        
        
        </p>
	    
          
	    <p>
	      <input type="submit" name="Submit" value="�޸�">
        &nbsp;&nbsp;&nbsp;</p>
      </div></td>
	  <td width="291" bgcolor=" 	#FFFFFF"><table width="572"  border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#625D59">
	    <tr align="center" bgcolor="#CC99FF">
	      <td width="25" height="20">�û���</td>
	      <td width="25">����</td>
	      <td width="20">��ѯȨ��</td>
          <td width="20">���Ȩ��</td>
          <td width="20">�޸�Ȩ��</td>
          <td width="20">ɾ��Ȩ��</td>
          
	      </tr>
	    <?php
				error_reporting(0);
				$link=mysql_connect("localhost","root","root") or die("���ݿ�����ʧ

��".mysql_error());
				mysql_select_db("test",$link);
				mysql_query("set names gb2312");
				$sql=mysql_query("select * from user");
				$info=mysql_fetch_array($sql);
				$numss=mysql_num_rows($sql);
				
				
				
				
				
				
				
				
				/**
				*ʵ�ֲ��빦��
				*
				*/
				
					
				if ($_POST[Submit]=="�޸�"){
					
					$id=$_POST[id];
					$ps=$_POST[ps];
					$s=$_POST[checkbox];
					$a=$_POST[checkbox2];
					$u=$_POST[checkbox3];
					$d=$_POST[checkbox4];
					
					if($ps!="")
					mysql_query("update user set Password='$ps' where User='$id' ");
					if($s!="")
					{
						mysql_query("update user set Select_priv='Y' where User='$id'");
					}
					else mysql_query("update user set Select_priv='N' where User='$id'");
					if($a!="")
					{
						mysql_query("update user set Insert_priv='Y' where User='$id'");
					}
					else mysql_query("update user set Insert_priv='N' where User='$id'");if($u!="")
					{
						mysql_query("update user set Update_priv='Y' where User='$id'");
					}
					else mysql_query("update user set Update_priv='N' where User='$id'");if($d!="")
					{
						mysql_query("update user set Delete_priv='Y' where User='$id'");
					}
					else mysql_query("update user set Delete_priv='N' where User='$id'");
					 echo "<div align='center' style='color:#FF0000; font-size:12px'>�޸ĳɹ� !

</div>";
					
					$sql=mysql_query("select * from user");
				$info=mysql_fetch_array($sql);
				$numss=mysql_num_rows($sql);
					
					
					}

				
					
					
					
					/**
					*��ҳ
					*
					*/
				$w=$_GET[page];
				$page=1;
				if($w!=""){$page=$w;}
					   if (is_numeric($page)){
						$page_size=10;     								//ÿҳ��ʾ4����¼
						$query="select count(*) as total from user ";   
						$result=mysql_query($query);      					//��ѯ���������ļ�¼������
						$message_count=mysql_result($result,0,"total");		//Ҫ��ʾ���ܼ�¼��
						$page_count=ceil($message_count/$page_size);	  	//���ݼ�¼��������ÿҳ��ʾ�ļ�¼��������ֵ�ҳ��
						$offset=($page-1)*$page_size;						//������һҳ�ӵڼ������ݿ�ʼѭ��  
						$sqll=mysql_query("select * from user  limit $offset, $page_size");
						
						$row=mysql_fetch_array($sqll);
						if(!$row){
							echo "<font color='red'>������Ա��Ϣ!</font>";
						}
						
				
				 do{
			  ?>
	    <tr align="left" bgcolor="#FFFFFF">
	      <td >&nbsp;<?php echo $row[User]; ?></td>
	      <td align="center"><?php echo $row[Password]; ?></td>
          <td align="center"><?php echo $row[Select_priv]; ?></td>
	      <td align="center"><?php echo $row[Insert_priv]; ?></td>
          <td align="center"><?php echo $row[Update_priv]; ?></td>
          <td align="center"><?php echo $row[Delete_priv]; ?></td>
          
          
          
          
          
          
          
          
          
          
          
          
	      <?php
				}
				while($row=mysql_fetch_array($sqll));
				
				
				}
				
				?>
      </table><br>
      <table width="550" align="center" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <!--  ��ҳ�� -->
							<td width="37%" align="center">&nbsp;&nbsp;ҳ�Σ�<?php echo $page;?>/<?php echo $page_count;?>ҳ&nbsp;��¼��<?php echo $message_count;?> ��&nbsp; </td>
							<td width="63%" align="center">
							<?php
							/*  �����ǰҳ������ҳ  */
							if($page!=1){
							/*  ��ʾ����ҳ��������  */
							echo  "<a href=main.php?page=1>��ҳ</a>&nbsp;";
							/*  ��ʾ����һҳ��������  */
							echo "<a href=main.php?page=".($page-1).">��һҳ</a>&nbsp;";
							}
							/*  �����ǰҳ����βҳ  */
							if($page<$page_count){
							/*  ��ʾ����һҳ��������  */
							echo "<a href=main.php?page=".($page+1).">��һҳ</a>&nbsp;";
							/*  ��ʾ��βҳ��������  */
							echo  "<a href=main.php?page=".$page_count.">βҳ</a>";
							}
							?>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
              </tr>
            </table>		
      </td>
	  </tr>
  <tr valign="top" bgcolor="#FFFFFF"> 
    <td height="81" colspan="2"><br></td> 
  </tr> 
</table>
</body>
</html>
