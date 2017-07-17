<?php
  error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED); //bo thonng bao khi cac file chua dinh nghia
  session_start();
  $session=session_id();
  @define ( '_template' , './templates/');
  @define ( '_source' , './sources/');
  @define ( '_lib' , './admin/lib/');
  @define ( _upload_folder , './media/upload/' );

  if(!isset($_SESSION['lang2']))
  {
  $_SESSION['lang2']='vi';
  }
  
  $lang=$_SESSION['lang2']; //Lấy ngỗn ngữ
  require_once _source."lang_$lang.php";  //Lấy các Hằng.

  include_once _lib."config.php";
  include_once _lib."constant.php";
  include_once _lib."functions.php";
  include_once _lib."class.database.php";
  include_once _lib."file_requick.php";
  include_once _source."counter.php";
  include_once _source."useronline.php";  
  
  
  include_once _lib."functions_giohang.php";
  if($_REQUEST['command']=='add' && $_REQUEST['productid']>0){
  
  $pid=$_REQUEST['productid'];  
  $_SESSION['size'.$pid]=$_REQUEST['spsize']; 
  $_SESSION['mau'.$pid]=$_REQUEST['spmau']; 
  $q=isset($_GET['quality']) ? (int)$_GET['quality'] : "1";
  addtocart($pid,$q);
  redirect("http://$config_url/gio-hang.html");
  }
  $config_url='localhost:81/Sfund';
?>
<!DOCTYPE html>
<html lang="en">
<base href="http://<?=$config_url?>/" />
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="">
	<title>S-Fund | Tài chính thông minh</title>
	
	<meta name="description" content="rút thẻ tiền mặt, rut the tien mat, rút tiền thẻ tín dụng, rut tien the tin dung, Cho vay cầm cố/thế chấp tài sản online, rút tiền mặt từ thể tín dụng ngân hàng, Tư vấn sử dụng thẻ tín dụng linh hoạt, Tư vấn, môi giới kinh doanh Bất động sản, Tư vấn vay vốn ngân hàng...." />
	<link rel="icon" href="favicon.ico" type="image/x-icon"/>
	<meta property="og:title" content="Cho vay cầm cố/thế chấp tài sản online, Tư vấn sử dụng thẻ tín dụng linh hoạt, Tư vấn, môi giới kinh doanh Bất động sản, Tư vấn vay vốn ngân hàng...." />
	<meta property="og:description" content="Cho vay cầm cố/thế chấp tài sản online, Tư vấn sử dụng thẻ tín dụng linh hoạt, Tư vấn, môi giới kinh doanh Bất động sản, Tư vấn vay vốn ngân hàng...." />
	<meta property="og:image" content="" />
	<meta property="og:video" content=""/>
	<meta name="keywords" itemprop="keywords" content="rút thẻ tiền mặt, rut the tien mat, rút tiền thẻ tín dụng, rut tien the tin dung, Cho vay cầm cố/thế chấp tài sản online, Tư vấn sử dụng thẻ tín dụng linh hoạt, Tư vấn, môi giới kinh doanh Bất động sản, Tư vấn vay vốn ngân hàng...." />
	<meta name="news_keywords" content="rút thẻ tiền mặt, rut the tien mat, rút tiền thẻ tín dụng, rut tien the tin dung, Cho vay cầm cố/thế chấp tài sản online, Tư vấn sử dụng thẻ tín dụng linh hoạt, Tư vấn, môi giới kinh doanh Bất động sản, Tư vấn vay vốn ngân hàng...." />
<!-- 	<link rel="canonical" href="http://sfund.vn/" /> -->
<!-- 	<link rel="alternate" media="handheld" href="http://sfund.vn/" /> -->
	<meta name="robots" content="index,follow,noodp" />
	<meta name="robots" content="noarchive">
	
	<!-- HOME_INDEX_24H -->
	<!--Snippets Video Google-->
	<!--@meta_googlebot@-->
	<meta name="language" content="vietnamese" />
<!-- 	<link href="https://plus.google.com/+fan24h" rel="publisher" /> -->
	<meta name="copyright" content="Copyright © 2017 by S-Fund, Tài chính thông minh" />
	<meta name="abstract" content="sfund.vn Website S-Fund, Tài chính thông minh" />
	<meta name="distribution" content="Global" />
	<meta name="author" itemprop="author" content="Cho vay cầm cố/thế chấp tài sản online, Tư vấn sử dụng thẻ tín dụng linh hoạt, Tư vấn, môi giới kinh doanh Bất động sản, Tư vấn vay vốn ngân hàng...." />
	<meta http-equiv="refresh" content="1200" />
	<meta name="REVISIT-AFTER" content="1 DAYS" />
	<meta name="RATING" content="GENERAL" /> 
	<meta name="adx:sections" content="S-Fund, Tài chính thông minh" />
	
 	<!-- core CSS -->
  
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/animate.min.css" rel="stylesheet">
	<link href="css/prettyPhoto.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<link href="css/vantam.css" rel="stylesheet">
<!-- 	<link href="css/me.css" rel="stylesheet"> -->
	
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->	   
	<link rel="shortcut icon" href="images/ico/favicon.ico">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
	
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
	  ga('create', 'UA-99856613-1', 'auto');
	  ga('send', 'pageview');
	</script> 
	
	<script src="js/jquery.filer.min.js"></script>
	 <link href="css/jquery.steps.css" rel="stylesheet">
	 <link href="css/jquery-ui.css" rel="stylesheet">
	 <script src="js/jquery.steps.min.js"></script>
     <link href="css/ModifyStyle.css" rel="stylesheet">
     <link href="css/jquery.filer-dragdropbox-theme.css" rel="stylesheet">
     
</head>
<!--/head-->

<body class="homepage">

	<?php include _template."layout/header.php"; ?>
	<?php include _template.$template."_tpl.php"; ?>
   
	<?php include _template."layout/footer.php"; ?>
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.prettyPhoto.js"></script>
	<script src="js/jquery.isotope.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/wow.min.js"></script>
</body>

<script lang="javascript">(function() {var pname = ( (document.title !='')? document.title : document.querySelector('h1').innerHTML );var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async=1; ga.src = '//live.vnpgroup.net/js/web_client_box.php?hash=068b2a03031fb20600a8cd0483b06048&data=eyJzc29faWQiOjQ4NTE5NTAsImhhc2giOiJlY2EwYTlhYWY0M2Y2OTc5NTNmMmE3NDQ0Njg5MTA1NCJ9&pname='+pname;var s = document.getElementsByTagName('script');s[0].parentNode.insertBefore(ga, s[0]);})();</script>	 
</html>