<?php 
if( $_SERVER['REQUEST_METHOD'] == 'POST' )
{
	global $d;
	$data['SoTienVay'] = $_POST['SoTienVay'];
	$data['ThoiHanVay'] = $_POST['ThoiHanVay'];
	$data['TaiSanTheChap'] = $_POST['TaiSanTheChap'];
	$data['ThuongHieu'] = $_POST['ThuongHieu'];
	$data['NamSanXuat'] = $_POST['NamSanXuat'];
	$data['MoTaTaiSan'] = $_POST['MoTaTaiSan'];
	$data['Ten'] = $_POST['Ten'];
	$data['GioiTinh'] = $_POST['GioiTinh'];
	$data['TinhThanh'] = $_POST['TinhThanh'];
	$data['DienThoai'] = $_POST['DienThoai'];
	$data['Email'] = $_POST['Email'];
	$d->setTable('vaytien');
	$d->insert($data);
	
	// add content to email
	$str_noidung ="THÔNG TIN ĐĂNG KÝ CẦM ĐỒ CỦA KHÁCH HÀNG";
	$str_noidung .="<br/>";
	$str_noidung .="<br/>";
	
	$str_noidung .="- Họ tên: ";
	$str_noidung .= $data['Ten'];
	$str_noidung .="<br/>";
	
	$str_noidung .="- Email liên hệ: ";
	$str_noidung .= $data['Email'];
	$str_noidung .="<br/>";
	
	$str_noidung .="- Điện thoại: ";
	$str_noidung .= $data['DienThoai'];
	$str_noidung .="<br/><br/>";
	
	$str_noidung .="- Giới tính: ";
	$str_noidung .= $data['GioiTinh'];
	$str_noidung .="<br/>";
	
	//==
	$str_noidung .="- Số tiền muốn vay: ";
// 	$str_noidung .= $data['SoTienVay'];
	$sotien = number_format ($data['SoTienVay'],0,",",".");
	$str_noidung .= $sotien;
	$str_noidung .=" VNĐ<br/>";
	
	$str_noidung .="- Thời hạn muốn vay: ";
	$str_noidung .= $data['ThoiHanVay'];
	$str_noidung .=" Ngày<br/>";
	
	$str_noidung .="- Tài sản thế chấp: ";
	$str_noidung .= $data['TaiSanTheChap'];
	$str_noidung .="<br/>";
	
	$str_noidung .="- Thương hiệu: ";
	$str_noidung .= $data['ThuongHieu'];
	$str_noidung .="<br/><br/>";
	
	//==
	$str_noidung .="- Nội dung đăng ký: ";
	$str_noidung .= $data['MoTaTaiSan'];
	$str_noidung .="<br/><br/>";
	
// 	$str_noidung .="*** Thông tin mua hàng: ";
// 	$str_noidung .="<br/><br/>";
	//-- add content to email
	
}
?>
<?php
	include_once "phpmailer/class.phpmailer.php";
	include_once "phpmailer/class.smtp.php";
	
	if( $_SERVER['REQUEST_METHOD'] == 'POST' )
	{
		$str = "";
		if(!empty($data['Ten']) && $data['DienThoai']!="" )
		{
    		$subject = "Thông tin đăng ký cầm đồ online.";
    		//$from = "shopnana.info@gmail.com";
//     		$from = "dichvudi.shopper@gmail.com";
    		$from = "dichvudicho24h@gmail.com";
    		$from_name = $data['Ten'];
    		$from_name_shop = 'Home | S-Fund';
    
    		$body = $str_noidung.$str;
//     		echo '<pre style="color:red">';
//     			print_r($body);
//     			echo  '</pre>';
//     			die();
    		$to = 'dichvudicho24h@gmail.com';
    		//$to = "ngoisaoleloi@gmail.com";
    		//$to = $txt_email;
    		
    		global $error;
    		$mail = new PHPMailer();  // tạo một đối tượng mới từ class PHPMailer
		    $mail->IsSMTP(); // bật chức năng SMTP
//     		$mail->IsSMTP(); // bật chức năng SMTP
    		$mail->SMTPDebug = 0;  // kiểm tra lỗi : 1 là  hiển thị lỗi và thông báo cho ta biết, 2 = chỉ thông báo lỗi
    		$mail->SMTPAuth = true;  // bật chức năng đăng nhập vào SMTP này
    		$mail->SMTPSecure = 'ssl'; // sử dụng giao thức SSL vì gmail bắt buộc dùng cái này
    		
    		$mail->Host = 'smtp.gmail.com';
    		$mail->Port = 465; 
//     		$mail->Username = "dichvudi.shopper@gmail.com";
//     		$mail->Password = "Kcdagtemyatpxh1";
    		$mail->Username = "dichvudicho24h@gmail.com";
    		$mail->Password = "tp123!@#";
    		$mail->SetFrom($from, $from_name_shop);
    		$mail->From = $from;		
    
    		$mail->Subject = $subject;
    		$mail->Body = $body;
    		$mail->AddAddress($to);
    		
    		$mail->AddCC('dichvudicho24h@gmail.com',"Thông tin đơn hàng khách đặt.");// Ấn định email sẽ nhận khi người dùng reply lại.
//     		$mail->AddReplyTo('dichvudichogiare@gmail.com',"Thông tin đơn hàng khách đặt.");// Ấn định email sẽ nhận khi người dùng reply lại.
//     		$mail->AddReplyTo('Thief4s1@gmail.com ',"Thông tin đơn hàng khách đặt.");// Ấn định email sẽ nhận khi người dùng reply lại.
    		$mail->AddCC('Thief4s1@gmail.com ',"Thông tin đơn hàng khách đặt.");// Ấn định email sẽ nhận khi người dùng reply lại.
//     		$mail->AddCC('cvtam2003@gmail.com ',"Thông tin đơn hàng khách đặt.");// Ấn định email sẽ nhận khi người dùng reply lại.
    		
    		$mail->WordWrap = 50; // set word wrap   
    		$mail->IsHTML(true); // send as HTML
    		//Thiết lập định dạng font chữ
    		$mail->CharSet = "utf-8";
    		
    		//==
    		move_uploaded_file($_FILES['file1']['tmp_name'], 'upload/vaytien_success/'.$_FILES['file1']['name']);
    		$img_url = 'upload/vaytien_success/'.$_FILES['file1']['name'];
    		$mail->AddEmbeddedImage($img_url, 11,$_FILES['file1']['name']);
    		
    		if(!$mail->Send()) {
    		$error = 'Gởi mail bị lỗi: '.$mail->ErrorInfo; 
    		//return false;
    		} else {
    		$error = 'Thư của bạn đã được gởi đi ';
    		$ketqua = "Đơn hàng của quý khách đã được tiếp nhận , xin kiểm tra đơn hàng qua mail";
    		//return true;
    		}
		}
	
?>
<script>
	//alert("<?php echo $error; ?>");
	location.href="success.html";
</script>

<?php
	}
?>

<section id="contact-page">
	<div class="container border">
	<div class="section-title section-title-contact wow fadeInDown"> <span class="tag tag-colored">Đăng Ký Cầm Đồ</span>
    	<p style="text-align: center;">Bạn vui lòng nhập đầy đủ thông tin để chúng tôi có thể hỗ trợ bạn tốt nhất</p>
	</div>
	<div class="row contact-wrap">
		<div class="status alert alert-success" style="display: none"></div>
		<form method="post" name="frm" action="vay-tien.html" enctype="multipart/form-data">
		<p class="lead" style="text-align: center;">&nbsp; 01. Thiết lập khoản vay cầm đồ</p>
        <div class="col-sm-5 col-sm-offset-1">
			<div class="form-group">
			<label>Bạn muốn vay bao nhiêu ? *</label>
			<input type="number" name="SoTienVay" class="form-control" required="required">
			<span style="color: red">VNĐ</span>
			</div>
            <div class="form-group">
			<label>Bạn muốn vay bao lâu ? *</label>
			<input type="number" name="ThoiHanVay" class="form-control" required="required">
			<span style="color: red">Ngày</span>
			</div>
			
			<div class="form-group">
			<label>Mô tả tài sản cầm cố: *</label>
			<textarea name="MoTaTaiSan" id="message" required class="form-control" rows="5"></textarea>
			</div>
		</div>
		<div class="col-sm-5">
			<div class="form-group">
			<label>Tài sản thế chấp *</label>
			<select class="form-control" id="TaiSanTheChap" name="TaiSanTheChap" required="required">
				<option value="" >Vui lòng chọn</option>
				<option value="Ô tô" >Ô tô </option>
				<option value="Điện thoại" >Điện thoại</option>
				<option value="Laptop" >Laptop</option>
				<option value="Xe máy" >Xe máy</option>
				<option value="Trang sức" >Trang sức</option>
				<option value="Nhà đất" >Nhà đất</option>
				<option value="Tài sản khác" >Tài sản khác</option>
			</select>
			</div>
			<div class="form-group">
			<label>Thương hiệu </label>
			<input type="text" name="ThuongHieu" class="form-control" >
			</div>
			<div class="form-group">
			<label>Tháng sản xuất </label>
			<select class="form-control" id="ID_month" name="ID_month">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
			</select>
            
            <label>Năm sản xuất </label>
			<select class="form-control" id="ID_Year" name="NamSanXuat">
				<option value="2006">2006</option>
				<option value="2007">2007</option>
				<option value="2008">2008</option>
				<option value="2009">2009</option>
				<option value="2010">2010</option>
				<option value="2011">2011</option>
				<option value="2012">2012</option>
				<option value="2013">2013</option>
				<option value="2014">2014</option>
				<option value="2015" selected="selected">2015</option>
				<option value="2016">2016</option>
				<option value="2017">2017</option>
			</select>
            
			</div>
			<div class="form-group">
			<label>Đính kèm hình ảnh sản phẩm </label>
				<input type="file" id="file1" name="file1" class="form-control">
			</div>
		</div>
		<div class="col-sm-12">
			<p class="lead" style="text-align: center;">&nbsp; 02. Thông tin khách hàng</p>
		</div>
		<div class="col-sm-5 col-sm-offset-1">
			<div class="form-group">
			<label>Họ tên *</label>
			<input type="text" name="Ten" class="form-control" required="required">
			</div>
			<div class="form-group">
			<label>Điện thoại *</label>
			<input type="number" name="DienThoai" class="form-control" required="required">
			</div>
			<div class="form-group">
			<label>Giới tính </label>
			<select class="form-control" id="ID_Gender" name="GioiTinh">
				<option value="Nam">Nam</option>
				<option value="Nữ">Nữ</option>
				<option value="Khác">Khác</option>
			</select>
			</div>
		</div>
		<div class="col-sm-5">
			<div class="form-group">
			<label>Chọn tỉnh thành </label>
			<select class="form-control required" id="ID_Province" name="TinhThanh">
				<option value="">--Chọn--</option>
				<option value="TP HCM">TP HCM</option>
				<option value="Hà Nội">Hà Nội</option>
			</select>
			</div>
			<div class="form-group">
			<label>Email </label>
			<input type="text" name="Email" class="form-control" >
			</div>
			<div class="form-group">
			<button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Đăng ký</button>
			</div>
		</div>
		</form>
	</div>
	<!--/.row-->
	</div>
	<!--/.container-->
</section>
<!--/#contact-page-->
<section id="contact-info"> </section>
<!--/gmap_area -->
