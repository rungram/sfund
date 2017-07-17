<?php
	$d->reset();
	$sql_list ="select *	from #_product_list order by stt asc limit 0,5";
	$d->query($sql_list);
	$list =$d->result_array();
	
	$d->reset();
	$sql_tin_l ="select *	from #_tinloai1_1_list order by stt asc limit 0,3";
	$d->query($sql_tin_l);
	$tin_l=$d->result_array();
?>

<header id="header">
	<nav class="navbar navbar-inverse" role="banner">
	<div class="container">
		<div class="navbar-header menu">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
		<a class="navbar-brand" href="index.html"><img class="logo" src="images/logo.png" alt="logo"></a>
		<div class="hidden-lg hidden-md hidden-sm padd-top">
			<div class="col-lg-7 col-md-7 phone-sp"> <i ></i><span style="font-size: 21px;">Hotline: 1900 0074</span> <br/>
			<i class="fa fa-phone-square"></i><span style="font-size: 21px;"> 0908 04 27 40</span> </div>
			<div class="col-lg-5 col-md-5 "> <a href="vay-tien.html" class="btn-cam-do-online"><img src="images/btn_vay_tien_ngay.png" alt=""></a> </div>
		</div>
		</div>
		<?php include _template."layout/menu_top.php"; ?>
		<div class="pull-right">
		<div class="col-lg-7 phone-sp hidden-xs" style="padding-top: 10px;"> <i ></i><span style="font-size: 21px;">Hotline: 1900 0074</span> <br/>
			<i class="fa fa-phone-square"></i><span style="font-size: 21px;"> 0908 04 27 40</span> </div>
		<div class="col-lg-5 hidden-xs vaytien"> <a href="vay-tien.html" class="btn-cam-do-online"><img src="images/btn_vay_tien_ngay.png" alt=""></a> </div>
		</div>
	</div>
	<!--/.container-->
	</nav>
	<!--/nav-->
</header>
<!--/header-->

