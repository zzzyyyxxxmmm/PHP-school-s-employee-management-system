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
	    <p>用户名：
	      <input name="id" type="text" id="txt_book" size="25" > </p>
	    <p>密码：
          <input name="ps" type="text" id="txt_book" size="25" >
	    </p>
	    
	    <p>
	      权限：查询
	      <input type="checkbox" name="checkbox" id="checkbox">
	      <label for="checkbox"></label>
        添加
        <input type="checkbox" name="checkbox2" id="checkbox2">
        修改
        <input type="checkbox" name="checkbox3" id="checkbox4">
        删除
<input type="checkbox" name="checkbox4" id="checkbox3">
        
        
        </p>
	    
          
	    <p>
	      <input type="submit" name="Submit" value="修改">
        &nbsp;&nbsp;&nbsp;</p>
      </div></td>
	  <td width="291" bgcolor=" 	#FFFFFF"><table width="572"  border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#625D59">
	    <tr align="center" bgcolor="#CC99FF">
	      <td width="25" height="20">用户名</td>
	      <td width="25">密码</td>
	      <td width="20">查询权限</td>
          <td width="20">添加权限</td>
          <td width="20">修改权限</td>
          <td width="20">删除权限</td>
          
	      </tr>
	    <?php
				error_reporting(0);
				$link=mysql_connect("localhost","root","root") or die("数据库连接失

败".mysql_error());
				mysql_select_db("test",$link);
				mysql_query("set names gb2312");
				$sql=mysql_query("select * from user");
				$info=mysql_fetch_array($sql);
				$numss=mysql_num_rows($sql);
				
				
				
				
				
				
				
				
				/**
				*实现插入功能
				*
				*/
				
					
				if ($_POST[Submit]=="修改"){
					
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
					 echo "<div align='center' style='color:#FF0000; font-size:12px'>修改成功 !

</div>";
					
					$sql=mysql_query("select * from user");
				$info=mysql_fetch_array($sql);
				$numss=mysql_num_rows($sql);
					
					
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
						$query="select count(*) as total from user ";   
						$result=mysql_query($query);      					//查询符合条件的记录总条数
						$message_count=mysql_result($result,0,"total");		//要显示的总记录数
						$page_count=ceil($message_count/$page_size);	  	//根据记录总数除以每页显示的记录数求出所分的页数
						$offset=($page-1)*$page_size;						//计算下一页从第几条数据开始循环  
						$sqll=mysql_query("select * from user  limit $offset, $page_size");
						
						$row=mysql_fetch_array($sqll);
						if(!$row){
							echo "<font color='red'>暂无人员信息!</font>";
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
                          <!--  翻页条 -->
							<td width="37%" align="center">&nbsp;&nbsp;页次：<?php echo $page;?>/<?php echo $page_count;?>页&nbsp;记录：<?php echo $message_count;?> 条&nbsp; </td>
							<td width="63%" align="center">
							<?php
							/*  如果当前页不是首页  */
							if($page!=1){
							/*  显示“首页”超链接  */
							echo  "<a href=main.php?page=1>首页</a>&nbsp;";
							/*  显示“上一页”超链接  */
							echo "<a href=main.php?page=".($page-1).">上一页</a>&nbsp;";
							}
							/*  如果当前页不是尾页  */
							if($page<$page_count){
							/*  显示“下一页”超链接  */
							echo "<a href=main.php?page=".($page+1).">下一页</a>&nbsp;";
							/*  显示“尾页”超链接  */
							echo  "<a href=main.php?page=".$page_count.">尾页</a>";
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
