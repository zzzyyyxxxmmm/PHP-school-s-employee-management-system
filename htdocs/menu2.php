<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<head>
    <Script language="javascript">   
    function GetRequest() {   
       var url = location.search; //��ȡurl��"?"������ִ�   
       document.getElementById('txt1').value="2333";
       return url;   
    }   
    </script>  
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>jQuery��ֱ���۵��ַ��ٲ˵� - վ���ز�</title>
<link rel=stylesheet type=text/css href="css/zzsc.css">
<script type=text/javascript src="js/jquery.min.js"></script>
</head>

<body background="images/02.jpg">
<!-- ���� ��ʼ -->
 <div id="firstpane" class="menu_list">
 
    <p class="menu_head current">��Ϣ���</p>
    <div style="display:block" class=menu_body >
      <a href="select.php" target="233">��Ա��ѯ</a>
       <a href="selectpart.php" target="233">���Ų�ѯ</a>
       <a href="selectcourse.php" target="233">ҵ���ѯ</a>
    </div>
    <p class="menu_head">����</p>
    <div style="display:none" class=menu_body >
      <a href="add.php" target="233">���</a>
      <a href="update.php" target="233">�޸�</a>
      <a href="delete.php" target="233">ɾ��</a>
    </div>
    <p class="menu_head">����</p>
    <div style="display:none" class=menu_body >
      <a href="people.php"target="233">������Ա</a>
      <a href="comm.php">��ϵ����</a>
    </div>
<script type=text/javascript>
$(document).ready(function(){
	$("#firstpane .menu_body:eq(0)").show();
	$("#firstpane p.menu_head").click(function(){
		$(this).addClass("current").next("div.menu_body").slideToggle(300).siblings("div.menu_body").slideUp("slow");
		$(this).siblings().removeClass("current");
	});
	$("#secondpane .menu_body:eq(0)").show();
	$("#secondpane p.menu_head").mouseover(function(){
		$(this).addClass("current").next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
		$(this).siblings().removeClass("current");
	});
	
});
</script>

</body>
</html>