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
	    <p>�������䣺&nbsp;
	      <input name="old1" type="text" id="txt_book2" size="5" >&nbsp;-&nbsp;
          <input name="old2" type="text" id="txt_book2" size="5" >
	    </p>
	    <p>���ڿγ̣� 
	      <input name="course" type="text" id="txt_book3" size="25" >
	    </p>
	    <p>нˮ���䣺&nbsp;
          <input name="wage1" type="text" id="txt_book4" size="5" >
          &nbsp;-&nbsp;
          <input name="wage2" type="text" id="txt_book4" size="5" >
	    </p>
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
	      <input type="submit" name="Submit" value="��ѯ">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
      </div></td>
	  <td width="291" bgcolor=" 	#FFFFFF"><table width="572"  border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#625D59">
	    <tr align="center" bgcolor="#CC99FF">
	      <td width="25" height="20">���</td>
	      <td width="25">��ʦ����</td>
	      <td width="20">�Ա�</td>
          <td width="20">��������</td>
          <td width="25">����</td>
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
		
				$time=time();
				$y="20".date("y",$time);
				
					$na=$_SESSION['name'];
					
					/**
					*�鿴selectȨ��
					*
					*/
					$sq=mysql_query("select * from user where User='$na' AND  Select_priv='Y'");
					$nu=mysql_num_rows($sq);
				if ($_POST[Submit]=="��ѯ"){
					
					
					if($nu==0)
					{
					
					echo "<div align='center' style='color:#FF0000; font-size:12px'> �Բ����������ж�Ӧ��Ȩ��</div>";
					continue;
					}
					$id=$_POST[id];
					$txt_book=$_POST[txt_book];
					$sex=$_POST[sex];
					
					
					$oold=$_POST[old1];
					$old1=$y-$_POST[old1]."/1/1";
					$old2=$y-$_POST[old2]."/1/1";
					$part=$_POST[part];
					$back=$_POST[back];
					$rank=$_POST[rank];
					$post=$_POST[post];
					
					$ss="";
					if($id!=""){
						$ss=$ss." and teacher.id='$id'";
					}
					if($txt_book!=""){
						$ss=$ss." and teacher.name='$txt_book'";
					}
					if($sex!=""){
						$ss=$ss." and teacher.sex='$sex'";
					}
					if($oold!="")
						$ss=$ss." and teacher.old>=$old2 and teacher.old<=$old1";
					
					if($part!="")
						$ss=$ss." and teacher.part='$part'";
					if($back!="")
						$ss=$ss." and teacher.back='$back'";
					if($rank!="")
						$ss=$ss." and teacher.rank='$rank'";
					if($post!="")
						$ss=$ss." and teacher.post='$post'";
						
						$sql=mysql_query("select * from teacher where '1'='1' $ss" ); 
					
					$info=mysql_fetch_array($sql);
					$nums=mysql_num_rows($sql);
					
					if($info==false){       
				//�����������Ϣ�����ڣ��������Ӧ����ʾ��Ϣ
				    echo "<div align='center' style='color:#FF0000; font-size:12px'>�Բ�������ѯ��ʦselect * from teacher where '1'='1' $ss

��Ϣ������!</div>";
				}
				else{
					echo "<div align='center' style='color:#FF0000; font-size:12px'> ��ѯ���Ϊ��select * from teacher where '1'='1' $ss   ��ѯ�ɹ�

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
						$query="select count(*) as total from teacher  where '1'='1' $ss";   
						$result=mysql_query($query);      					//��ѯ���������ļ�¼������
						$message_count=mysql_result($result,0,"total");		//Ҫ��ʾ���ܼ�¼��
						$page_count=ceil($message_count/$page_size);	  	//���ݼ�¼��������ÿҳ��ʾ�ļ�¼��������ֵ�ҳ��
						$offset=($page-1)*$page_size;						//������һҳ�ӵڼ������ݿ�ʼѭ��  
						$sqll=mysql_query("select * from teacher where '1'='1' $ss order by id asc limit $offset, $page_size");
						
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
							echo  "<a href=select.php?page=1>��ҳ</a>&nbsp;";
							/*  ��ʾ����һҳ��������  */
							echo "<a href=select.php?page=".($page-1).">��һҳ</a>&nbsp;";
							}
							/*  �����ǰҳ����βҳ  */
							if($page<$page_count){
							/*  ��ʾ����һҳ��������  */
							echo "<a href=select.php?page=".($page+1).">��һҳ</a>&nbsp;";
							/*  ��ʾ��βҳ��������  */
							echo  "<a href=select.php?page=".$page_count.">βҳ</a>";
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
