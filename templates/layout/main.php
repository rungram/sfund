<?php
	
	$d->reset();
	$sql_qc_slide ="select * from #_linhvuc where hienthi = 1 and taisan = 1 order by stt asc limit 0,12";
	$d->query($sql_qc_slide);
	$qc_slide=$d->result_array();
	
	$d->reset();
	$sql_tungdanhmuc="select * from #_product where hienthi = 1 order by stt asc limit 12";
	$d->query($sql_tungdanhmuc);
	$result_spnam=$d->result_array();
	
	$d->reset();
	$sql_linhvuc="select * from #_linhvuc where hienthi = 1 and linhvuc = 1 order by stt asc limit 4";
	$d->query($sql_linhvuc);
	$result_linhvuc=$d->result_array();
	
	$d->reset();
	$result_detailq="select * from #_tinloai1_1 order by id limit 0,2";
	$d->query($result_detailq);
	$result_detailq=$d->result_array();
	$tg=date('Y-m-d H:i:s');
	$tgout=900;
	$tgnew=$tg - $tgout;
	$ipaddress = '';
	if (isset($_SERVER['HTTP_CLIENT_IP']))
	    $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
	else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
	    $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
	else if(isset($_SERVER['HTTP_X_FORWARDED']))
	    $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
	else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
	    $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
	else if(isset($_SERVER['HTTP_FORWARDED']))
	    $ipaddress = $_SERVER['HTTP_FORWARDED'];
	else if(isset($_SERVER['REMOTE_ADDR']))
	    $ipaddress = $_SERVER['REMOTE_ADDR'];
	else
	    $ipaddress = 'UNKNOWN';
	$local = $_SERVER['PHP_SELF'];
// 	$sql_insert = "INSERT INTO #_useronline (Tgtmp, Ip, Local) VALUES ('$tg', '$ipaddress', '$local')";                  
// 	$d->query($sql_insert);
// 	$next30 = strtotime( '-900 seconds' );
// 	$tgnew =  date('Y-m-d H:i:s',$next30 );
// 	$d->reset();
// 	$sql_delete = "DELETE FROM #_useronline WHERE Tgtmp < '$tgnew'";
// 	$d->query($sql_delete);
// 	$d->reset();
// 	$result_detail="select DISTINCT ip from #_useronline where Local='$local'";
// 	$d->query($result_detail);
// 	$result_detail=$d->fetch_array();
// 	$useronline = count($result_detail);
?>
	
<section id="main-slider" class="no-margin">
	<div class="carousel slide" data-ride="carousel">
	<ol class="carousel-indicators">
		<li data-target="#main-slider" data-slide-to="0" class="active"></li>
		<li data-target="#main-slider" data-slide-to="1"></li>
		<li data-target="#main-slider" data-slide-to="2"></li>
	</ol>
	<div class="carousel-inner">
    	<!--/.item-->
        
		<div class="item active" style="cursor:pointer; background-image: url(images/slider/bg1.jpg)" onclick="window.location.href ='http://sfund.vn/giao-dich-ngan-hang-rut-tien-mat-the-tin-dung.html'">        
		<div class="container"></div>
		</div>
		
		<!--/.item-->
		<div class="item" style="background-image: url(images/slider/bg3.jpg)">
		<div class="container">
		</div>
		</div>
		<!--/.item-->
		<div class="item" style="background-image: url(images/slider/bg4.jpg)">
		<div class="container">
		</div>
		</div>
		<!--/.item-->
	</div>
	<!--/.carousel-inner-->
	</div>
	<!--/.carousel-->
	<a class="prev hidden-xs" href="#main-slider" data-slide="prev"> <i class="fa fa-chevron-left"></i> </a> <a class="next hidden-xs" href="#main-slider" data-slide="next"> <i class="fa fa-chevron-right"></i> </a> </section>
<!--/#main-slider-->
	
<section id="feature" >
	<div class="container bg_feature">
	<div class="wow fadeInDown"> <span class="chat-widget-left ">Vì sao chọn S-Fund</span>
		<p class="lead">Lãi suất/Phí thấp nhất thị trường – Yên tâm tài sản được niêm phong đúng quy trình – Có tiền ngay </p>
	</div>
	<div class="row">
		<div class="features why">
		<div class="col-md-3 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
			<div class="feature-wrap"> <img class="img-responsive" src="images/1.png">
			<h2>Lãi suất cạnh tranh </h2>
			<h3>Sfund luôn có đội ngũ điều tra thị trường nên lãi suất lúc nào cũng tốt nhất</h3>
			</div>
		</div>
		<!--/.col-md-3-->
		<div class="col-md-3 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
			<div class="feature-wrap"> <img class="img-responsive" src="images/2.png">
			<h2>Yên tâm tài sản</h2>
			<h3>Tài sản được kiểm tra xác nhận kỹ - Cho vào nơi bảo mật – Niêm phong bằng tem dưới sự chứng kiến của khách hàng – Được lưu giữ tuyệt đối an toàn</h3>
			</div>
		</div>
		<!--/.col-md-4-->
		<div class="col-md-3 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
			<div class="feature-wrap"> <img class="img-responsive" src="images/3.png">
			<h2>Phục vụ thân thiện </h2>
			<h3>Thái độ làm việc của đội ngũ S-Fund luôn khiến bạn hài lòng</h3>
			</div>
		</div>
		<!--/.col-md-4-->
		<div class="col-md-3 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
			<div class="feature-wrap"> <img class="img-responsive " src="images/4.png">
			<h2>Nhanh lấy tiền </h2>
			<h3>Thủ tục đơn giản, nhận tiền nhanh chóng, </h3>
			</div>
		</div>
		<!--/.col-md-4-->
		</div>
		<!--/.services-->
	</div>
	<!--/.row-->
	</div>
	<!--/.container-->
</section>
<!--/#feature-->
<section id="services" class="service-item">
	<div class="container">
	<div class="wow fadeInDown"> <span class="chat-widget-left">Lĩnh vực hoạt động</span>
		<p class="lead">SFund hỗ trợ tài chính linh hoạt Cầm cố/Thế chấp tất cả tài sản có giá trị quy đổi và Cung cấp các dịch vụ tài chính chất lượng cao </p>
	</div>
	<div class="row">
		<?php for($i=0,$count_qcsl=count($result_linhvuc);$i<$count_qcsl;$i++)
		{
		?>
		<div class="col-sm-6 col-md-6">
		<div class="media services-wrap wow fadeInDown">
			<div class="pull-left"> <img class="img-responsive" src="upload/linhvuc/<?=$result_linhvuc[$i]["thumb"]?>"> </div>
			<div class="media-body"> <a href="chi-tiet/<?=$result_linhvuc[$i]["tenkhongdau"]?>-<?=$result_linhvuc[$i]["id"]?>.html">
			<h3 class="media-heading"><?php echo $result_linhvuc[$i]['ten_vi']?> </h3>
			<span><?php echo $result_linhvuc[$i]['mota_vi']?> </span> </a> </div>
		</div>
		</div>
		<?php }
			?>
	</div>
	<!--/.row-->
	</div>
	<!--/.container-->
</section>
<div class="clearfix"></div>
<section id="recent-works">
	<div class="container">
	<div class="wow fadeInDown"> <span class="chat-widget-left">S-Fund nhận cầm những gì?</span>
		<p class="lead">Tất cả tài sản đều có giá trị quy đổi, hãy liên hệ ngay cho chúng tôi!</p>
	</div>
	<div class="row">
		<?php for($i=0,$count_qcsl=count($qc_slide);$i<$count_qcsl;$i++){ 
?>
		<div class="col-xs-12 col-sm-2 col-md-2">
		<div class="recent-work-wrap" onclick="window.location.href ='chi-tiet/<?=$qc_slide[$i]["tenkhongdau"]?>-<?=$qc_slide[$i]["id"]?>.html'"> <img class="img-responsive" src="upload/linhvuc/<?=$qc_slide[$i]["thumb"]?>" alt="">
			<div class="overlay">
			<div class="recent-work-inner" >
				<h3><a href="chi-tiet/<?=$qc_slide[$i]["tenkhongdau"]?>-<?=$qc_slide[$i]["id"]?>.html">
				<?=$qc_slide[$i]["ten_vi"]?>
				</a> </h3>
				<a class="preview" href="chi-tiet/<?=$qc_slide[$i]["tenkhongdau"]?>-<?=$qc_slide[$i]["id"]?>.html" ><i class="fa fa-eye"></i> View</a> </div>
			</div>
		</div>
		</div>
		<?php }?>
	</div>
	<!--/.row-->
	</div>
	<!--/.container-->
</section>

<!--/#middle-->
<section id="content" class="bg_xam">
	<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-8 wow fadeInDown">
		<h2 class="chat-widget-right">Ý kiến khách hàng</h2>
		<div class="tab-wrap">
			<div class="media">
			<div class="parrent pull-left">
				<ul class="nav nav-tabs nav-stacked">
				<li class=""><a href="#tab1" data-toggle="tab" class="analistic-01">Trang Kim Oanh</a></li>
				<li class="active"><a href="#tab2" data-toggle="tab" class="analistic-02">Nguyễn Thành Trung</a></li>
				<li class=""><a href="#tab3" data-toggle="tab" class="tehnical">Trần Bằng Kiều</a></li>
				<li class=""><a href="#tab4" data-toggle="tab" class="tehnical">Vũ Phương Ngân</a></li>
				<li class=""><a href="#tab5" data-toggle="tab" class="tehnical">Thái Minh Phước</a></li>
				</ul>
			</div>
			<div class="parrent media-body">
				<div class="tab-content">
				<div class="tab-pane fade" id="tab1">
					<div class="media">
					<div class="pull-left"> <img class="img-responsive" src="images/tab2.png"> </div>
					<div class="media-body">
						<h2>Nguyễn Thành Trung, chủ doanh nghiệp</h2>
						<p>Thực sự trước khi vào cửa hàng cầm đồ S-Fund tôi chỉ nghĩ rằng cầm đồ ở Việt Nam toàn thành phần xăm trổ, thiếu thiện cảm, dân anh chị. Nhưng khi đến cửa hàng S-Fund tôi thấy cửa hàng to đẹp, nhân viên thân thiện ăn mặc như ngân hàng tôi rất có thiện cảm. Lần đầu tiên tôi thấy một dịch vụ cầm đồ lại thân thiện như vậy.</p>
					</div>
					</div>
				</div>
				<div class="tab-pane fade active in" id="tab2">
					<div class="media">
					<div class="media-body">
						<h2>Nguyễn Thành Trung, chủ doanh nghiệp</h2>
						<p>Thực sự trước khi vào cửa hàng cầm đồ S-Fund tôi chỉ nghĩ rằng cầm đồ ở Việt Nam toàn thành phần xăm trổ, thiếu thiện cảm, dân anh chị. Nhưng khi đến cửa hàng S-Fund tôi thấy cửa hàng to đẹp, nhân viên thân thiện ăn mặc như ngân hàng tôi rất có thiện cảm. Lần đầu tiên tôi thấy một dịch vụ cầm đồ lại thân thiện như vậy.</p>
					</div>
					</div>
				</div>
				<div class="tab-pane fade" id="tab3">
					<h2>Nguyễn Thành Trung, chủ doanh nghiệp</h2>
					<p>Thực sự trước khi vào cửa hàng cầm đồ S-Fund tôi chỉ nghĩ rằng cầm đồ ở Việt Nam toàn thành phần xăm trổ, thiếu thiện cảm, dân anh chị. Nhưng khi đến cửa hàng S-Fund tôi thấy cửa hàng to đẹp, nhân viên thân thiện ăn mặc như ngân hàng tôi rất có thiện cảm. Lần đầu tiên tôi thấy một dịch vụ cầm đồ lại thân thiện như vậy.</p>
				</div>
				<div class="tab-pane fade" id="tab4">
					<h2>Nguyễn Thành Trung, chủ doanh nghiệp</h2>
					<p>Thực sự trước khi vào cửa hàng cầm đồ S-Fund tôi chỉ nghĩ rằng cầm đồ ở Việt Nam toàn thành phần xăm trổ, thiếu thiện cảm, dân anh chị. Nhưng khi đến cửa hàng S-Fund tôi thấy cửa hàng to đẹp, nhân viên thân thiện ăn mặc như ngân hàng tôi rất có thiện cảm. Lần đầu tiên tôi thấy một dịch vụ cầm đồ lại thân thiện như vậy.</p>
				</div>
				<div class="tab-pane fade" id="tab5">
					<h2>Nguyễn Thành Trung, chủ doanh nghiệp</h2>
					<p>Thực sự trước khi vào cửa hàng cầm đồ S-Fund tôi chỉ nghĩ rằng cầm đồ ở Việt Nam toàn thành phần xăm trổ, thiếu thiện cảm, dân anh chị. Nhưng khi đến cửa hàng S-Fund tôi thấy cửa hàng to đẹp, nhân viên thân thiện ăn mặc như ngân hàng tôi rất có thiện cảm. Lần đầu tiên tôi thấy một dịch vụ cầm đồ lại thân thiện như vậy.</p>
				</div>
				</div>
				<!--/.tab-content-->
			</div>
			<!--/.media-body-->
			</div>
			<!--/.media-->
		</div>
		<!--/.tab-wrap-->
		<p class="pull-right"><a href="#">Xem thêm</a></p>
		</div>
		<!--/.col-sm-6-->
		<div class="col-xs-12 col-sm-4 wow fadeInDown">
		<div class="testimonial border mar-top">
			<h2 class="chat-widget-right">TIN TỨC MỚI NHẤT</h2>
			<?php
			 for($i=0;$i<count($result_detailq);$i++)
			 { 
			 ?>
			<div class="media testimonial-inner">
			<div class="pull-left"> <img class="img-responsive thum" src="upload/tinloai1_1/<?=$result_detailq[$i]['thumb']?>"> </div>
			<div class="media-body"> <a href="tin-tuc-detail/<?=$result_detailq[$i]['tenkhongdau']?>-<?=$result_detailq[$i]['id']?>.html">
				<h2>
				<?=$result_detailq[$i]['ten_vi']?>
				</h2>
				<p>
				<?=$result_detailq[$i]['mota_vi']?>
				</p>
				</a> </div>
			</div>
			<?php
			 } 
			 ?>
		</div>
		</div>
	</div>
	<!--/.row-->
	</div>
	<!--/.container-->
</section>

