<?php virtual('/Connections/dbconnect.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form")) {
  $insertSQL = sprintf("INSERT INTO alumni (name, sex, birth, tel, zodiac, address, qq, weibo, weixin, nickname, hobby, code, profession, moto, ourhobby, msg) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['name'], "text"),
                       GetSQLValueString($_POST['sex'], "text"),
                       GetSQLValueString($_POST['birth'], "text"),
                       GetSQLValueString($_POST['tel'], "text"),
                       GetSQLValueString($_POST['zodiac'], "text"),
                       GetSQLValueString($_POST['address'], "text"),
                       GetSQLValueString($_POST['qq'], "text"),
                       GetSQLValueString($_POST['weibo'], "text"),
                       GetSQLValueString($_POST['weixin'], "text"),
                       GetSQLValueString($_POST['nickname'], "text"),
                       GetSQLValueString($_POST['hobby'], "text"),
                       GetSQLValueString($_POST['code'], "text"),
                       GetSQLValueString($_POST['profession'], "text"),
                       GetSQLValueString($_POST['moto'], "text"),
                       GetSQLValueString($_POST['ourhobby'], "text"),
                       GetSQLValueString($_POST['msg'], "text"));

  mysql_select_db($database_dbconnect, $dbconnect);
  $Result1 = mysql_query($insertSQL, $dbconnect) or die(mysql_error());

  $insertGoTo = "/upload.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<!DOCTYPE html>
<html>
<head>
<title>点点记忆,有我铭记</title>
<link href="css/style.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Pink Contact Form ,Login Forms,Sign up Forms,Registration Forms,News latter Forms,Elements"./>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<!--webfonts-->
<link href='http://fonts.useso.com/css?family=Lato:100,300,400,700,100italic,300italic,400italic|Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.useso.com/css?family=Raleway:400,200,300,500,600,800,700,900' rel='stylesheet' type='text/css'>
<style type="text/css">
body {
	background-image: url(/bg.jpg);
	
}
</style>
<!--//webfonts-->
</head>
<body>
<h1>点点记忆,有我铭记</h1>
<center><a href="http://www.umview.com">由UMVIEW.COM强力驱动</a></center>
	<div class="login-01">
			<form action="<?php echo $editFormAction; ?>" method="POST" name="form" target="_blank">
				<ul>
				<li class="first">
					<input name="name" type="text" class="text" id="name" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = '我叫..';}" value="我叫.." >
					必填
					<div class="clear"></div>
				</li>
				<li class="first">
					</a><input name="sex" type="text" class="text" id="sex" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = '我是男生/女生';}" value="我是男生/女生" >
					必填
					<div class="clear"></div>
				</li>
				<li class="first">
					</a><input name="birth" type="text" class="text" id="birth" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = '我出生于某年某月某日';}" value="我出生于某年某月某日" >
					必填
					<div class="clear"></div>
				</li>
                <li class="first">
					<input name="tel" type="text" class="text" id="tel" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = '联系电话';}" value="联系电话" >
					重要
				  <div class="clear"></div>
				</li>
                <li class="first">
					<input name="zodiac" type="text" class="text" id="zodiac" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = '星座';}" value="星座" >
					必填
				  <div class="clear"></div>
				</li>
                <li class="first">
					<input name="address" type="text" class="text" id="address" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = '告诉我你家住哪';}" value="告诉我你家住哪？" >
					必填
                  <div class="clear"></div>
				</li>
				
                <li class="first">
				            <input name="qq" type="text" class="text" id="qq" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'QQ';}" value="QQ" >
		              必填</li>
                <li class="first">
					<input name="weibo" type="text" class="text" id="weibo" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = '微博';}" value="微博" >
					<div class="clear"></div>
				</li>
                <li class="first">
					<input name="weixin" type="text" class="text" id="weixin" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = '微信';}" value="微信" >
					<div class="clear"></div>
				</li>
                <li class="first">
					<input name="nickname" type="text" class="text" id="nickname" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = '昵称';}" value="昵称" >
					<div class="clear"></div>
				</li>
                <li class="first">
					<input name="hobby" type="text" class="text" id="hobby" onFocus="this.value = '';" onBlur="if (this.value == 'hobby') {this.value = "爱好";}" value="爱好" >
					<div class="clear"></div>
				</li>
                <li class="first">
					<input name="code" type="text" class="text" id="code" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = '邮编';}" value="邮编" >
					<div class="clear"></div>
				</li>
                <li class="first">
					<input name="profession" type="text" class="text" id="profession" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = '想学的专业';}" value="想学的专业" >
					<div class="clear"></div>
				</li>
                <li class="first">
					<input name="moto" type="text" class="text" id="moto" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = '人生格言';}" value="人生格言" >
					<div class="clear"></div>
				</li>
                <li class="first">
					<input name="ourhobby" type="text" class="text" id="ourhobby" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = '我们的交集';}" value="我们的交集" >
					<div class="clear"></div>
				</li>
                <li class="second">
				</a><textarea name="msg" id="msg" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = '相对我说什么？';}" value="相对我说什么？">相对我说什么？</textarea>
				<div class="clear"></div>
				</li>
			</ul>
			<input type="submit" onClick="location.href='/upload.php'" value="提交" >
           
			<div class="clear"></div>
			<input type="hidden" name="MM_insert" value="form">
	    </form>
</div>
	<!--start-copyright-->
   		<div class="copy-right">
   			<div class="wrap">
				<p>点点记忆--致我们终将失去的青春<a target="_blank" href="http://www.umview.com/"></p>
		</div>
	</div>
	<!--//end-copyright-->
</body>
</html>
