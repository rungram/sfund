<?php
	$d->reset();
	$sql_list ="select *	from #_product_list where hienthi=1 and noibat=1 order by stt asc limit 0,8";
	$d->query($sql_list);
	$list =$d->result_array();
	
	$d->reset();
	$result_detailq="select * from #_tinloai1_1 order by id limit 0,3";
	$d->query($result_detailq);
	$result_detailq=$d->result_array();
?>

<div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
	<h2 class="box-header">TIN TỨC MỚI NHẤT</h2>
	<div class="col-xs-12 col-sm-12 wow fadeInDown border ">
	<div class="testimonial padd">
		<?php
			 for($i=0;$i<count($result_detailq);$i++)
			 { 
			 ?>
		<div class="media testimonial-inner"> <a href="tin-tuc-detail/<?=$result_detailq[$i]['tenkhongdau']?>-<?=$result_detailq[$i]['id']?>.html">
		<div class="pull-left"> <img class="img-responsive thum" src="upload/tinloai1_1/<?=$result_detailq[$i]['thumb']?>"> </div>
		<div class="media-body">
			<h2>
			<?=$result_detailq[$i]['ten_vi']?>
			</h2>
			<p>
			<?=$result_detailq[$i]['mota_vi']?>
			</p>
		</div>
		</a> </div>
		<?php
			 } 
			 ?>
	</div>
	</div>
</div>
