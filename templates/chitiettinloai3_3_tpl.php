<?php 
	 
	$id = addslashes($_GET['id']);
	
	$d->reset();
	$sql_tanglx="update #_tinloai1_1 set luotxem=luotxem+1 where id='$id'";
	$d->query($sql_tanglx);
	$result_detail="select * from #_tinloai1_1 where id='$id'";
	$d->query($result_detail);	
	$result_detail=$d->fetch_array();


	$sql_tinll="select * from #_tinloai1_1_list where hienthi =1 order by stt asc";
	$d->query($sql_tinll);	
	$result_detaill=$d->result_array(); 
	
	
	$d->reset();
	$result_detailq="select * from #_tinloai1_1 where id<>'$id' limit 0,3";
	$d->query($result_detailq); 
	$result_detailq=$d->result_array();

?>

<section>
	<div class="container">
	<div class="col-lg-12">
		<div class="col-lg-8 col-sm-12 col-md-12 col-xs-12">
		<h2 class="box-header">
			<?=$result_detail["ten_vi"]?>
		</h2>
		<div class="panel-body border">
			<p align="center"><img src="upload/tinloai1_1/<?=$result_detail['thumb']?>" width="250px"></p>
			<p align="center" style="font-weight: bold;"><?=$result_detail['mota_vi']?></p>
			<?=$result_detail["noidung_vi"]?>
			<div class="text-center">
			<!-- Facebook -->
			<a href="http://www.facebook.com/sharer.php?u=https://simplesharebuttons.com" target="_blank"> <img src="images/shareFB.png" alt="Facebook" /> </a>
			<!-- Google+ -->
			<a href="https://plus.google.com/share?url=https://simplesharebuttons.com" target="_blank"> <img src="images/shareGmail.png" alt="Google" /> </a> </div>
		</div>
		<div class="border mar-top">
			<h2 class="box-header">BÀI VIẾT LIÊN QUAN</h2>
			<div class="col-xs-12 col-sm-12 wow fadeInDown border	animated" style="visibility: visible; animation-name: fadeInDown;">
			<?php
					 for($i=0;$i<count($result_detailq);$i++)
					 { 
					 ?>
			<div class="testimonial padd">
				<div class="media testimonial-inner"> <a href="tin-tuc-detail/<?=$result_detailq[$i]['tenkhongdau']?>-<?=$result_detailq[$i]['id']?>.html">
				<div class="pull-left"> <img class="img-responsive thum" src="upload/tinloai1_1/<?=$result_detailq[$i]['thumb']?>"> </div>
				<div class="media-body">
					<h2>
					<?=$result_detailq[$i]['ten_vi']?>
					</h2>
					<p class="pull-left">
					<?=$result_detailq[$i]['mota_vi']?>
					</p>
					<span class="pull-right text-muted small"><em>
					<?=$result_detailq[$i]['ngaytao']?>
					</em> </span> </div>
				</a> </div>
			</div>
			<?php
					 } 
					 ?>
			</div>
		</div>
		</div>
		<?php include _template."layout/content_right.php"; ?>
	</div>
	</div>
</section>
<div class=" clearfix"></div>
