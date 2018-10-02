
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
	
    <?php
/* * **************************************************************************** 

  参数说明:
  $max_file_size  : 上传文件大小限制, 单位BYTE
  $destination_folder : 上传文件路径
  $watermark   : 是否附加水印(1为加水印,其他为不加水印);

  使用说明:
  1. 将PHP.INI文件里面的"extension=php_gd2.dll"一行前面的;号去掉,因为我们要用到GD库;
  2. 将extension_dir =改为你的php_gd2.dll所在目录;
 * **************************************************************************** */

//上传文件类型列表  
$uptypes = array(
    'image/jpg',
    'image/jpeg',
    'image/png',
    'image/pjpeg',
    'image/gif',
    'image/bmp',
    'image/x-png'
);

$max_file_size = 2000000;     //上传文件大小限制, 单位BYTE  
$destination_folder = "upload/"; //上传文件路径  
$watermark = 2;      //是否附加水印(1为加水印,其他为不加水印);  
$watertype = 1;      //水印类型(1为文字,2为图片)  
$waterposition = 1;     //水印位置(1为左下角,2为右下角,3为左上角,4为右上角,5为居中);  
$waterstring = "http://www.xplore.cn/";  //水印字符串  
$waterimg = "xplore.gif";    //水印图片  
$imgpreview = 2;      //是否生成预览图(1为生成,其他为不生成);  
$imgpreviewsize = 1 / 2;    //缩略图比例  
?>  
<html>  
    <head>  
        <meta charset="UTF-8">
        <title>UMVIEW图片上传程序</title>  

    </head>  

    <body>  
        <form enctype="multipart/form-data" method="post" name="upform">  
            <a>先赏个脸，给张照片？</a><br>
          <input name="upfile" type="file">  
            <input type="submit" value="上传"><br>  
            允许上传的文件类型为:<?= implode(', ', $uptypes) ?>  
      </form>  

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!is_uploaded_file($_FILES["upfile"][tmp_name])) {
            //是否存在文件  
                echo "图片不存在!";
                exit;
            }

            $file = $_FILES["upfile"];
            if ($max_file_size < $file["size"]) {
            //检查文件大小  
                echo "文件太大!";
                exit;
            }

            if (!in_array($file["type"], $uptypes)) {
            //检查文件类型  
                echo "文件类型不符!" . $file["type"];
                exit;
            }

            if (!file_exists($destination_folder)) {
                mkdir($destination_folder);
            }

            $filename = $file["tmp_name"];
            $image_size = getimagesize($filename);
            $pinfo = pathinfo($file["name"]);
            $ftype = $pinfo['extension'];
            $destination = $destination_folder . time() . "." . $ftype;
            if (file_exists($destination) && $overwrite != true) {
                echo "同名文件已经存在了";
                exit;
            }

            if (!move_uploaded_file($filename, $destination)) {
                echo "移动文件出错";
                exit;
            }

            $pinfo = pathinfo($destination);
            $fname = $pinfo[basename];
            echo " <font color=red>已经成功上传</font><br>文件名:  <font color=blue>" . $destination_folder . $fname . "</font><br>";
		}
        ?>  
                   <a href="alumni.php"><h1>发完照片，该填同学录了--戳我<h1></a> 

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