<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>

</head>
<body background="images/02.jpg">
<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
<p>
  <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="400" height="440" align="middle" id="FlashID">
    <param name="movie" value="swf/time.swf">
    <param name="quality" value="high">
    <param name="wmode" value="opaque">
    <param name="swfversion" value="6.0.65.0">
    <!-- �� param ��ǩ��ʾʹ�� Flash Player 6.0 r65 �͸��߰汾���û��������°汾�� Flash Player��������������û���������ʾ���뽫��ɾ���� -->
    <param name="expressinstall" value="Scripts/expressInstall.swf">
    <!-- ��һ�������ǩ���ڷ� IE �����������ʹ�� IECC ����� IE ���ء� -->
    <!--[if !IE]>-->
    <object data="swf/time.swf" type="application/x-shockwave-flash" width="400" height="440" align="middle">
      <!--<![endif]-->
      <param name="quality" value="high">
      <param name="wmode" value="opaque">
      <param name="swfversion" value="6.0.65.0">
      <param name="expressinstall" value="Scripts/expressInstall.swf">
      <!-- ��������������������ʾ��ʹ�� Flash Player 6.0 �͸��Ͱ汾���û��� -->
      <div>
        <h4>��ҳ���ϵ�������Ҫ���°汾�� Adobe Flash Player��</h4>
        <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="��ȡ Adobe Flash Player" width="112" height="33" /></a></p>
      </div>
      <!--[if !IE]>-->
    </object>
    <!--<![endif]-->
  </object>
</p>

<td align="center"><?php session_start();
$name=$_SESSION['name'];
if($name=="root")
	echo "��ӭ�û�"."����Ա"."ʹ�ñ�ϵͳ!!";
else 
	echo "��ӭ�û�".$name."ʹ�ñ�ϵͳ"; ?></td>

<script type="text/javascript">
swfobject.registerObject("FlashID");
</script>
</body>
</html>
