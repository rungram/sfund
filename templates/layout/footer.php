<?php 
	$d->reset();
	$sql_chinhsach ="select * from #_product where chinhsach = 1 order by stt asc limit 0,5";
	$d->query($sql_chinhsach);
	$chinhsach=$d->result_array();
	
	$d->reset();
	$sql_list ="select *	from #_product_list where hienthi=1 order by stt asc limit 0,8";
	$d->query($sql_list);
	$list =$d->result_array();
?>
<section id="bottom">
	<div class="container wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
	<div class="row">
		<!--/.col-md-3-->
		<div class="col-md-4 col-sm-6">
		<div class="col-lg-12">
			<div class="widget">
			<h3 class="page-head-line">THÔNG TIN LIÊN HỆ</h3>
			<h4> Công ty Cổ phần S-FUND</h4>
			<address>
			<p>95 Hùng Vương, P4, Q5, TP. HCM</p>
			<p>Phone: 1900 0074 <br>
				0908 04 27 40 <br>
				Email: info@sfund.vn<br>
				sfund.vn@gmail.com</p>
			</address>
			</div>
		</div>
		<div class="col-lg-12">
			<div class="social">
			<ul class="social-share">
				<li><a href="#"><i class="fa fa-facebook"></i></a></li>
				<li><a href="#"><i class="fa fa-twitter"></i></a></li>
				<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
				<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
				<li><a href="#"><i class="fa fa-skype"></i></a></li>
			</ul>
			<div class="search">
				<form role="form">
				<input type="text" class="search-form" autocomplete="off" placeholder="Search">
				<i class="fa fa-search"></i>
				</form>
			</div>
			</div>
		</div>
		</div>
		<!--/.col-md-3-->
		<div class="col-md-2 col-sm-6">
		<div class="widget">
			<h3 class="page-head-line">DANH MỤC</h3>
			<ul>
			<?php for($i=0,$count_l=count($list);$i<$count_l;$i++){
			$d->reset();
			$sql_cat ="select *	from #_product_cat where id_list='".$list[$i]["id"]."' order by stt asc";
			$d->query($sql_cat);
			$cat =$d->result_array();
			$child = 'class="dropdown"';
			$taga	= '<i class="fa fa-angle-down"></i>';
			$href = '#';
			$toggle ='class="dropdown-toggle" data-toggle="dropdown"';
			if(count($cat)<1)
			{
			$href = 'danh-muc-list/'.$list[$i]["tenkhongdau"].'-'.$list[$i]["id"].'.html';	
			$child = "";
			$taga = "";
			$toggle='';
			}
		 ?>
			<li <?php echo $child;?>> <a href="<?php echo $href;?>" <?php echo $toggle;?>>
				<?=$list[$i]["ten_vi"]?>
				<?php echo $taga;?></a>
				<?php
							if(count($cat)>0)
							{
							?>
				<ul class="dropdown-menu">
				<?php for($j=0,$count_c=count($cat);$j<$count_c;$j++){ 
//				$d->reset();
//				$sql_item ="select *	from #_product_item where id_list='".$list[$i]["id"]."' and	id_cat='".$cat[$j]["id"]."' order by stt asc";
//				$d->query($sql_item);
//				$item =$d->result_array();
//				$child1 = 'class="dropdown-submenu"';
//				$child2 = '<em class="arr-mb-mn"></em>';
//				if(count($item)<1)
//				{
//					$child1 = "";
//					$child2 = "";
//					}
				 ?>
				<li><a href="danh-muc-cat/<?=$cat[$j]["tenkhongdau"]?>-<?=$cat[$j]["id"]?>.html">
					<?=$cat[$j]["ten_vi"]?>
					</a></li>
				<?php
								} 
								?>
				</ul>
				<?php 
							}
							?>
			</li>
			<?php }?>
			<!--<li><a href="portfolio.html">Portfolio</a></li>-->
			<li><a href="tin-tuc.html">Tin tức</a></li>
			</ul>
		</div>
		</div>
		<!--/.col-md-2-->
		
		<div class="col-md-6 col-sm-6">
		<div class="widget">
			<h3 class="page-head-line"> Hệ thống hỗ trợ tài chính của Sfund đều có chứng nhận</h3>
			<ul>
			<li class="banquyen"><a class="pull-left" href="#">Cho vay cầm đồ/thế chấp</a><img class="pull-right img-responsive" src="images/logo1.png"></li>
			<li class="banquyen"><a class="pull-left"	href="#">Phòng cháy chữa cháy</a><img class="pull-right img-responsive" src="images/logo2.png"></li>
			<li class="banquyen no-bor-bot" ><a	class="pull-left" href="#">An ninh trật tự</a> <img class="pull-right img-responsive" src="images/logo3.png"> </li>
			</ul>
            <h1 style="font-size:10px"> <a href="giao-dich-ngan-hang-rut-tien-mat-the-tin-dung.html">rut the tien mat, rut tien the tin dung, rút thẻ tiền mặt, rút tiền thẻ tín dụng</a> </h1>
		</div>
		</div>
		<!--/.col-md-3-->
		
	</div>
	</div>
</section>
<!--/#bottom-->
<footer id="footer" class="midnight-blue">
	<div class="container">
	<ul class="list-inline">
		<li> <a href="#"> <span> <img src="images/icon_dieukhoandieukien.png" alt=""> </span>Điều Kiện Và Điều Khoản </a> </li>
		<li> <a href="#"> <span> <img src="images/icon_chinhsachbaomat.png" alt=""> </span>Chính Sách Bảo Mật Thông Tin </a> </li>
		<li> <a href="danh-muc-list/bao-quan-tai-san-15.html"> <span> <img src="images/icon_chinhsachbaoquan.png" alt=""> </span>Chính Sách Bảo Quản Tài Sản </a> </li>
		<li> <a href="#"> <span> <img src="images/icon_danhsachcuahang.png" alt=""> </span>Các Cửa Hàng Của S-Fund </a> </li>
		<li> <a href="#"> <span> <img src="images/icon_tuyendung.png" alt=""> </span>Tuyển dụng </a> </li>
	</ul>
	</div>
</footer>
<!--/#footer-->
