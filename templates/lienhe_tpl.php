<?php 
if( $_SERVER['REQUEST_METHOD'] == 'POST' )
{
	global $d;
	$data['ten'] = $_POST['ten'];
	$data['email'] = $_POST['email'];
	$data['dienthoai'] = $_POST['dienthoai'];
	$data['noidung'] = $_POST['noidung'];
	$data['subject'] = $_POST['subject'];
	$d->setTable('lienhe');
	$d->insert($data);
}
?>

<section id="contact-page">
	<div class="container border">
	<div class="section-title section-title-contact wow fadeInDown"> <span class="tag tag-colored">LIÊN HỆ</span>
		<p class="lead">SFund hỗ trợ tài chính linh hoạt Cầm cố/Thế chấp tất cả tài sản có giá trị quy đổi và Cung cấp các dịch vụ tài chính chất lượng cao </p>
	</div>
	<div class="row contact-wrap">
		<div class="status alert alert-success" style="display: none"></div>
		<form method="post" name="frm" action="lien-he.html">
		<div class="col-sm-5 col-sm-offset-1">
			<div class="form-group">
			<label>Họ tên *</label>
			<input type="text" name="ten" class="form-control" required="required">
			</div>
			<div class="form-group">
			<label>Điện thoại *</label>
			<input type="number" name="dienthoai" class="form-control" required="required">
			</div>
			<div class="form-group">
			<label>Email</label>
			<input type="email" name="email" class="form-control" >
			</div>
			
		</div>
		<div class="col-sm-5">
			<div class="form-group">
			<label>Chủ đề *</label>
			<input type="text" name="subject" class="form-control" required="required">
			</div>
			<div class="form-group">
			<label>Nội dung</label>
			<textarea name="noidung" id="message" class="form-control" rows="5"></textarea>
			</div>
			<div class="form-group">
			<button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Gửi liên hệ</button>
			</div>
		</div>
		</form>
	</div>
	
	<div class=" content-lienhe">
	<br/>
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.6486541115287!2d106.67358001422613!3d10.761537892331626!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ee2717b948f%3A0xff75762058609d3b!2zOTUgSMO5bmcgVsawxqFuZywgcGjGsOG7nW5nIDIsIFF14bqtbiA1LCBI4buTIENow60gTWluaCwgVmlldG5hbQ!5e0!3m2!1sen!2sus!4v1494120829441" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
	</div>
	
	<!--/.row-->
	</div>
	<!--/.container-->
</section>
<!--/#contact-page-->
<section id="contact-info"> </section>
<!--/gmap_area -->
