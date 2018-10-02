<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>alumni</title>
</head>

<body>
<?php
$con = mysql_connect("localhost","root","@dgIoHi-mysql");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("alumni", $con);

$result = mysql_query("SELECT * FROM alumni");

while($row = mysql_fetch_array($result))
  {
  echo $row['id'] . " " . $row['name'] . " " . $row['sex'] . " "  . $row['profession'] . " " . $row['ourhobby'] . " " . $row['moto'] . " " . $row['msg'];
  echo "<br />";
  }

mysql_close($con);
?>
</body>
</html>
