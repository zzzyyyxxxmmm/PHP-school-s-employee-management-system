<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
		<meta charset="utf-8">
		<link href="css/style(1).css" rel='stylesheet' type='text/css' />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
</head>
<body>


	 <!-----start-main---->
	 <div class="main">
		<div class="login-form">
			<h1>教职工管理系统</h1>
					<div class="head">
					
					</div>
				<form method="post" action="">
						<input type="text" name="id"    class="text" value="USERNAME" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'USERNAME';}" >
						<input type="password" name="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}">
							<input type="submit" name="submit" value="LOGIN" >
                    
                    
                    
                   
</form>
 <?php   

 session_start();
error_reporting(0);
if($_POST["submit"]=="LOGIN")
{
 
	$link=mysql_connect("localhost","root","root") or die("数据库连接失

败".mysql_error());
				mysql_select_db("test",$link);
				mysql_query("set names gb2312");
                
                
$id=$_POST[id];
$ps=$_POST[password];
 
 $sql=mysql_query("select * from user where User='$id' and Password='$ps' ");
 $numss=mysql_num_rows($sql);
 $_SESSION['name']=$id;
 if($numss!=0)
 {
	 
 	if($id=="root")
    {        	header("Location: index1.php"); 
//确保重定向后，后续代码不会被执行 
exit;
    }
    else
    {
        	header("Location: index2.php"); 
			exit;
    
    }
 }
 else
 {
	 

 	echo "账号或密码错";
 }



}



?>

			</div>
			<!--//End-login-form-->
			 <!-----start-copyright---->
   					<div class="copy-right"> </div>
				<!-----//end-copyright---->
		</div>
			 <!-----//end-main---->
		 		
</body>
</html>