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
	    <p>��ţ�
	      <input name="id" type="text" id="txt_book" size="25" > </p>
	    <p>��ʦ���ƣ�
          <input name="txt_book" type="text" id="txt_book" size="25" >
	    </p>
	    <p>��ѡ���Ա�&nbsp;&nbsp;&nbsp;�У�
          <input type="radio" name="sex" id="sex" value="��">
  &nbsp;&nbsp; Ů��
  <input type="radio" name="sex" id="sex2" value="Ů">
        </p>
	    <p>�������ڣ�&nbsp;
	      <input name="old" type="text" id="txt_book2" size="5" >
	      ��
	      <input name="old1" type="text" id="txt_book9" size="5" >
	      ��
	      <input name="old2" type="text" id="txt_book10" size="5" >
	      ��
	      &nbsp;</p>
	    <p>���ţ�
          <input name="part" type="text" id="txt_book5" size="25" >
	    </p>
	    <p>ְ�ƣ�
          <input name="back" type="text" id="txt_book6" size="25" >
</p>
	    <p>ѧ����
          <input name="rank" type="text" id="txt_book7" size="25" >
</p>
	    <p>������λ��
          <input name="post" type="text" id="txt_book8" size="25" >
	    </p>
	    <p>&nbsp;&nbsp;&nbsp;
	      <input type="submit" name="Submit" value="ɾ��">
        &nbsp;&nbsp;&nbsp;</p>
      </div></td>
	  <td width="291" bgcolor=" 	#FFFFFF"><table width="572"  border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#625D59">
	    <tr align="center" bgcolor="#CC99FF">
	      <td width="25" height="20">���</td>
	      <td width="25">��ʦ����</td>
	      <td width="20">�Ա�</td>
          <td width="20">��������</td>
          <td width="30">����</td>
          <td width="20">ְ��</td>
          <td width="20">ѧ��</td>
          <td width="20">��λ</td>
          
	      </tr>
	    <?php
		session_start();
				error_reporting(0);
				$link=mysql_connect("localhost","root","root") or die("���ݿ�����ʧ

��".mysql_error());
				mysql_select_db("test",$link);
				mysql_query("set names gb2312");
				$sql=mysql_query("select * from teacher");
				$info=mysql_fetch_array($sql);
				$numss=mysql_num_rows($sql);
				
				/**
				*ʵ��ɾ������
				*
				*/
				$na=$_SESSION['name'];
				$sq=mysql_query("select * from user where User='$na' AND  Delete_priv='Y'");
				$nu=mysql_num_rows($sq);
				if ($_POST[Submit]=="ɾ��"){
					if($nu==0)
					{
					
					echo "<div align='center' style='color:#FF0000; font-size:12px'> �Բ����������ж�Ӧ��Ȩ��</div>";
					continue;
					}
					$id=$_POST[id];
					$txt_book=$_POST[txt_book];
					$sex=$_POST[sex];
					$old=$_POST[old]."/".$_POST[old1]."/".$_POST[old2];
					$part=$_POST[part];
					$back=$_POST[back];
					$rank=$_POST[rank];
					$post=$_POST[post];
					
					
					
					
					
					
					$ss="";
					if($id!=""){
						$ss=$ss."and id='$id'";
					}
					if($txt_book!=""){
						$ss=$ss."and name='$txt_book'";
					}
					if($sex!=""){
						$ss=$ss."and sex='$sex'";
					}
					if($old1!="")
						$ss=$ss."and old='$old'";
					if($part!="")
						$ss=$ss."and part='$part'";
					if($back!="")
						$ss=$ss."and back='$back'";
					if($rank!="")
						$ss=$ss."and rank='$rank'";
					if($post!="")
						$ss=$ss."and post='$post'";
					
					
					$sql=mysql_query("delete from teacher where '1'='1' $ss" ); 
					
					 echo "<div align='center' style='color:#FF0000; font-size:12px'>ɾ���ɹ�

</div>";
					
					$sql=mysql_query("select * from teacher");
				$info=mysql_fetch_array($sql);
				$numss=mysql_num_rows($sql);
					
					
					}
				
				
				
				
				
				
				
				
				/**
				*ʵ�ֲ��빦��
				*
				*/
				
				if ($_POST[Submit]=="����"){
					$id=$_POST[id];
					$txt_book=$_POST[txt_book];
					$sex=$_POST[sex];
					$old=$_POST[old]."/".$_POST[old1]."/".$_POST[old2];
					$course=$_POST[course];
					$wage=$_POST[wage];
					$part=$_POST[part];
					$back=$_POST[back];
					$rank=$_POST[rank];
					$post=$_POST[post];
					
					$ss1="("."id";
					if($txt_book!="")
						$ss1=$ss1.",name";
					if($sex!="")
						$ss1=$ss1.",sex";
					if($old!="")
						$ss1=$ss1.",old";
					if($part!="")
						$ss1=$ss1.",part";
					if($back!="")
						$ss1=$ss1.",back";
					if($rank!="")
						$ss1=$ss1.",rank";
					if($post!="")
						$ss1=$ss1.",post";
					$ss1=$ss1.")";
					
					
					
					
					
					
					$ss2="("."'$id'";
					if($txt_book!="")
						$ss2=$ss2.",'$txt_book'";
					if($sex!="")
						$ss2=$ss2.",'$sex'";
					if($old!="")
						$ss2=$ss2.",'$old'";
					if($part!="")
						$ss2=$ss2.",'$part'";
					if($back!="")
						$ss2=$ss2.",'$back'";
					if($rank!="")
						$ss2=$ss2.",'$rank'";
					if($post!="")
						$ss2=$ss2.",'$post'";
					$ss2=$ss2.")";
					mysql_query("insert into teacher $ss1 values

$ss2");
					
					 echo "<div align='center' style='color:#FF0000; font-size:12px'>$ss1    $ss2

</div>";
					
					$sql=mysql_query("select * from teacher");
				$info=mysql_fetch_array($sql);
				$numss=mysql_num_rows($sql);
					
					
					}

				
				if ($_POST[Submit]=="��ѯ"){
					$id=$_POST[id];
					$txt_book=$_POST[txt_book];
					$sex=$_POST[sex];
					$ss="";
					if($id!=""){
						$ss=$ss."and id='$id'";
					}
					if($txt_book!=""){
						$ss=$ss."and name='$txt_book'";
					}
					if($sex!=""){
						$ss=$ss."and sex='$sex'";
					}
					$sql=mysql_query("select * from teacher where '1'='1' $ss" ); 
					
					$info=mysql_fetch_array($sql);
					$nums=mysql_num_rows($sql);
					
					
					if($info==false){       
				//�����������Ϣ�����ڣ��������Ӧ����ʾ��Ϣ
				    echo "<div align='center' style='color:#FF0000; font-size:12px'>�Բ�������ʦ

��Ϣ������!</div>";
				}
				else{
					echo "<div align='center' style='color:#FF0000; font-size:12px'>��ѯ�ɹ�  

����'$nums'����¼!</div>";
					
					}
					
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
						$query="select count(*) as total from teacher  order by id asc";   
						$result=mysql_query($query);      					//��ѯ���������ļ�¼������
						$message_count=mysql_result($result,0,"total");		//Ҫ��ʾ���ܼ�¼��
						$page_count=ceil($message_count/$page_size);	  	//���ݼ�¼��������ÿҳ��ʾ�ļ�¼��������ֵ�ҳ��
						$offset=($page-1)*$page_size;						//������һҳ�ӵڼ������ݿ�ʼѭ��  
						$sqll=mysql_query("select * from teacher order by id asc limit $offset, $page_size");
						
						$row=mysql_fetch_array($sqll);
						if(!$row){
							echo "<font color='red'>������Ա��Ϣ!</font>";
						}
						
				
				 do{
			  ?>
	    <tr align="left" bgcolor="#FFFFFF">
	      <td >&nbsp;<?php echo $row[id]; ?></td>
	      <td align="center"><?php echo $row[name]; ?></td>
          <td align="center"><?php echo $row[sex]; ?></td>
	      <td align="center"><?php echo $row[old]; ?></td>
          <td align="center"><?php echo $row[part]; ?></td>
          <td align="center"><?php echo $row[back]; ?></td>
          <td align="center"><?php echo $row[rank]; ?></td>
          <td align="center"><?php echo $row[post]; ?></td>
          
          
          
          
          
          
          
          
          
          
          
          
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
							echo  "<a href=delete.php?page=1>��ҳ</a>&nbsp;";
							/*  ��ʾ����һҳ��������  */
							echo "<a href=delete.php?page=".($page-1).">��һҳ</a>&nbsp;";
							}
							/*  �����ǰҳ����βҳ  */
							if($page<$page_count){
							/*  ��ʾ����һҳ��������  */
							echo "<a href=delete.php?page=".($page+1).">��һҳ</a>&nbsp;";
							/*  ��ʾ��βҳ��������  */
							echo  "<a href=delete.php?page=".$page_count.">βҳ</a>";
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
