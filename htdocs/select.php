<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link  href="style.css" rel="stylesheet">
<title>应用mysql_fetch_array()函数从数组结果集中获取信息</title>
</head>


<body background="images/02.jpg">
<table width="1044" height="438"  border="0" cellpadding="0" cellspacing="0" bgcolor=" 	#FFFFFF" align="center"> 
	 <form name="myform" method="post" action="">
    <tr> 
	  <td width="312" height="500" bgcolor=" 	#FFFFFF"><div align="center">
	    <p>编号：
	      <input name="id" type="text" id="txt_book" size="25" > </p>
	    <p>教师名称：
          <input name="txt_book" type="text" id="txt_book" size="25" >
	    </p>
	    <p>请选择性别&nbsp;&nbsp;&nbsp;男：
          <input type="radio" name="sex" id="sex" value="男">
  &nbsp;&nbsp; 女：
  <input type="radio" name="sex" id="sex2" value="女">
        </p>
	    <p>年龄区间：&nbsp;
	      <input name="old1" type="text" id="txt_book2" size="5" >&nbsp;-&nbsp;
          <input name="old2" type="text" id="txt_book2" size="5" >
	    </p>
	    <p>教授课程： 
	      <input name="course" type="text" id="txt_book3" size="25" >
	    </p>
	    <p>薪水区间：&nbsp;
          <input name="wage1" type="text" id="txt_book4" size="5" >
          &nbsp;-&nbsp;
          <input name="wage2" type="text" id="txt_book4" size="5" >
	    </p>
	    <p>部门：
          <input name="part" type="text" id="txt_book5" size="25" >
	    </p>
	    <p>职称：
          <input name="back" type="text" id="txt_book6" size="25" >
</p>
	    <p>学历：
          <input name="rank" type="text" id="txt_book7" size="25" >
</p>
	    <p>工作岗位：
          <input name="post" type="text" id="txt_book8" size="25" >
	    </p>
	    <p>&nbsp;&nbsp;&nbsp; 
	      <input type="submit" name="Submit" value="查询">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
      </div></td>
	  <td width="291" bgcolor=" 	#FFFFFF"><table width="572"  border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#625D59">
	    <tr align="center" bgcolor="#CC99FF">
	      <td width="25" height="20">编号</td>
	      <td width="25">教师姓名</td>
	      <td width="20">性别</td>
          <td width="20">出生日期</td>
          <td width="25">部门</td>
          <td width="20">职称</td>
          <td width="20">学历</td>
          <td width="20">岗位</td>
          
	      </tr>
	    <?php
		session_start();
				error_reporting(0);
				$link=mysql_connect("localhost","root","root") or die("数据库连接失

败".mysql_error());
				mysql_select_db("test",$link);
				mysql_query("set names gb2312");
				$sql=mysql_query("select * from teacher");
				$info=mysql_fetch_array($sql);
				$numss=mysql_num_rows($sql);
		
				$time=time();
				$y="20".date("y",$time);
				
					$na=$_SESSION['name'];
					
					/**
					*查看select权限
					*
					*/
					$sq=mysql_query("select * from user where User='$na' AND  Select_priv='Y'");
					$nu=mysql_num_rows($sq);
				if ($_POST[Submit]=="查询"){
					
					
					if($nu==0)
					{
					
					echo "<div align='center' style='color:#FF0000; font-size:12px'> 对不起，您不具有对应的权限</div>";
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
				//如果检索的信息不存在，则输出相应的提示信息
				    echo "<div align='center' style='color:#FF0000; font-size:12px'>对不起，您查询教师select * from teacher where '1'='1' $ss

信息不存在!</div>";
				}
				else{
					echo "<div align='center' style='color:#FF0000; font-size:12px'> 查询语句为：select * from teacher where '1'='1' $ss   查询成功

共有'$nums'条记录!</div>";
					
					}
					
					}
					
					
					
					/**
					*分页
					*
					*/
				$w=$_GET[page];
				$page=1;
				if($w!=""){$page=$w;}
					   if (is_numeric($page)){
						$page_size=10;     								//每页显示4条记录
						$query="select count(*) as total from teacher  where '1'='1' $ss";   
						$result=mysql_query($query);      					//查询符合条件的记录总条数
						$message_count=mysql_result($result,0,"total");		//要显示的总记录数
						$page_count=ceil($message_count/$page_size);	  	//根据记录总数除以每页显示的记录数求出所分的页数
						$offset=($page-1)*$page_size;						//计算下一页从第几条数据开始循环  
						$sqll=mysql_query("select * from teacher where '1'='1' $ss order by id asc limit $offset, $page_size");
						
						$row=mysql_fetch_array($sqll);
						if(!$row){
							echo "<font color='red'>暂无人员信息!</font>";
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
                          <!--  翻页条 -->
							<td width="37%" align="center">&nbsp;&nbsp;页次：<?php echo $page;?>/<?php echo $page_count;?>页&nbsp;记录：<?php echo $message_count;?> 条&nbsp; </td>
							<td width="63%" align="center">
							<?php
							/*  如果当前页不是首页  */
							if($page!=1){
							/*  显示“首页”超链接  */
							echo  "<a href=select.php?page=1>首页</a>&nbsp;";
							/*  显示“上一页”超链接  */
							echo "<a href=select.php?page=".($page-1).">上一页</a>&nbsp;";
							}
							/*  如果当前页不是尾页  */
							if($page<$page_count){
							/*  显示“下一页”超链接  */
							echo "<a href=select.php?page=".($page+1).">下一页</a>&nbsp;";
							/*  显示“尾页”超链接  */
							echo  "<a href=select.php?page=".$page_count.">尾页</a>";
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
