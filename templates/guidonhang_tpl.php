<?php if(!defined('_source')) die("Error");
		
		if(isset($_POST["hoten2"]))
	{
			include_once _lib."C_email.php";
			
			
			//add vo database
			$tennguoidat=$_POST['hoten2'];
			$diachi=$_POST['diachi'];
			$dienthoai=$_POST['dienthoai'];
			$email=$_POST['email'];
			$tinh_tp=$_POST['tinh_tp'];
			$noidung=$_POST['noidung'];	
			if($_SESSION['user_dn'])
			$user=$_SESSION['user_dn'];
			$ngaydathang=lay_thoigian();
			$ngaytim = date('Y-m-d');
			
			$max=count($_SESSION['cart']);	
			for($i=0;$i<$max;$i++)
		
 		   {
			     	$id_sp=$_SESSION['cart'][$i]['productid'];
					$soluong=$_SESSION['cart'][$i]['qty'];					
					$tenmathang=get_product_name($id_sp);
					$hinhmathang=get_hinh($id_sp);
					$pmota=get_mota($id_sp);
					$pkodau=get_kodau($id_sp);
					$masp=get_masp($id_sp);
					$psale=get_giagiam($id_sp);
					if($psale ==0) 
					$giamathang=get_price($id_sp);
					else 
					$giamathang=get_giagiam($id_sp);
					$tenkhongdau=get_kodau($id_sp);
					$size= $_SESSION['size'.$id_sp];
			        $mau= $_SESSION['mau'.$id_sp];
		
	  		 $tonggia=$giamathang*$soluong;
	 		 $d->reset();
	  		 $sql_sendgiohang="insert into #_donhang(tennguoidat,dienthoai,diachi,noidung,tenmathang,giamathang,soluong,ngaydathang,tonggia,hinh,user,tenkhongdau,masp,size,mau,email,tinh_tp,ngaytim)
	values('$tennguoidat','$dienthoai','$diachi','$noidung','$tenmathang','$giamathang','$soluong','$ngaydathang','$tonggia','$hinhmathang','$user','$tenkhongdau','$masp','$size','$mau','$email','$tinh_tp','$ngaytim')";
   	  		 $send_giohang=$d->query($sql_sendgiohang);	
	   		
	 			if($send_giohang) {
					unset($_SESSION['cart']);
					redirect("index.html");
				}
 									
  			 }
			
			
			
   	   //add vo database
	   
		/* //add vo mail	
			
			$body = '<table>';
			$body .= '
				<tr>
					<th colspan="2">&nbsp;</th>
				</tr>
				<tr>
					<th colspan="2">Đơn hàng từ website</th>
				</tr>
				<tr>
					<th colspan="2">&nbsp;</th>
				</tr>
				<tr>
					<th>Họ tên :</th><td>'.$_POST['hoten2'].'</td>
				</tr>
				<tr>
					<th>Tỉnh/TP :</th><td>'.$_POST['tinh_tp'].'</td>
				</tr>
				<tr>
					<th>Địa chỉ :</th><td>'.$_POST['diachi'].'</td>
				</tr>
				<tr>
					<th>Email :</th><td>'.$_POST['email'].'</td>
				</tr>
				<tr>
					<th>Điện thoại :</th><td>'.$_POST['dienthoai'].'</td>
				</tr>
				
				<tr>
					<th>Ghi chú :</th><td>'.$_POST['noidung'].'</td>
				</tr>
				
				';
			
			$body .= '</table>';
			
			
			
			//danh sach san pham
			$body .= '<table border="1" cellpadding="1" cellspacing="1">';
			$body .= 
				'<tr style="border-bottom:1px solid #cecece">
				  <td align="center" width="5%">STT</td>
				  <td align="center">Mã sản phẩm</td>
				  <td align="center">Sản phẩm</td>
				  <td align="center">Size</td>
				  <td align="center">Màu</td>
				  <td align="center">Đơn Giá</td>
			
				  <td align="center">Số lượng</td>
				  <td align="center">Thành Tiền</td>
				</tr>';
		
   			for($i=0;$i<$max;$i++)
				{
					
					$id_sp=$_SESSION['cart'][$i]['productid'];
					$soluong=$_SESSION['cart'][$i]['qty'];					
					$tenmathang=get_product_name($id_sp);
					$hinhmathang=get_hinh($id_sp);
					$pmota=get_mota($id_sp);
					$pkodau=get_kodau($id_sp);
					$psale=get_giagiam($id_sp);
					$pma=get_masp($id_sp);
					$size= $_SESSION['size'.$id_sp];
			        $mau= $_SESSION['mau'.$id_sp];
					if($psale ==0) 
					$giamathang=get_price($id_sp);
					else 
					$giamathang=get_giagiam($id_sp);
					$j=$i+1;
			$body .='<tr>
						<td align="center" width="5%">'.$j.'</td>
					
						<td align="center">'.$pma.'</td>
						<td align="center">'.$tenmathang.'</td>
						<td align="center">'.$size.'</td>
						<td align="center">'.$mau.'</td>
						<td align="center">'. number_format ($giamathang,0,",",".").' VNĐ</td>
						
						<td align="center">'.$soluong.'</td>
						<td align="center">'. number_format(($soluong*$giamathang),0,",",".").' VNĐ</td>
						</tr>';
					
				}
				
			$body .= '</table>';
				
				
			
			 //add vo mail	

include_once "phpmailer/class.phpmailer.php";  
include_once "phpmailer/class.smtp.php";    

//Khởi tạo đối tượng
$mail = new PHPMailer();
//Thiet lap thong tin nguoi gui va email nguoi gui
$mail->IsSMTP(); // Gọi đến class xử lý SMTP
$mail->SMTPAuth   = true;                  // Sử dụng đăng nhập vào account
$mail->Host       = "112.213.84.102";     // Thiết lập thông tin của SMPT
$mail->Username   = 'guimail@huynhgianguyen.com'; // SMTP account username
$mail->Password   = 'huynhgianguyen!@#$';            // SMTP account password
$mail->SetFrom($row_setting['email'],$row_setting['title']);
//Thiết lập thông tin người nhận
$mail->AddAddress($row_setting['email'],$row_setting['title']);

//Thiết lập email nhận email hồi đáp
//nếu người nhận nhấn nút Reply
$mail->AddReplyTo($row_setting['email'],$row_setting['title']);

/*=====================================
 * THIET LAP NOI DUNG EMAIL
 *=====================================*/

//Thiết lập tiêu đề
/*$mail->Subject    = "Có đơn hàng mới từ website";

//Thiết lập định dạng font chữ
$mail->CharSet = "utf-8";

$mail->AltBody = "To view the message, please use an HTML compatible email viewer!";

//Thiết lập nội dung chính của email
$mail->MsgHTML($body);

	if(!$mail->Send()) {
 			transfer("Lỗi - Vui lòng thử lại", "");
						}
 	else {
			  unset($_SESSION['cart']);
			
			  ?>
              <script>
    			alert("Gửi đơn hàng thành công");
				location.href="index.html";
			   </script>
              
              <?php
			
			
		}	
}
*/
}
?>