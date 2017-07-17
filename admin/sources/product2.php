<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
$urlsanpham ="";
$urlsanpham.= (isset($_REQUEST['id_list'])) ? "&id_list=".addslashes($_REQUEST['id_list']) : "";
$urlsanpham.= (isset($_REQUEST['id_cat'])) ? "&id_cat=".addslashes($_REQUEST['id_cat']) : "";
$urlsanpham.= (isset($_REQUEST['id_item'])) ? "&id_item=".addslashes($_REQUEST['id_item']) : "";

$id=$_REQUEST['id'];
switch($act){

	case "man":
		get_items();
		$template = "product2/items";
		break;
	case "add":		
		$template = "product2/item_add";
		break;
	case "edit":		
		get_item();
		$template = "product2/item_add";
		break;
	case "save":
		save_item();
		break;
	case "delete":
		delete_item();
		break;
	#===================================================	
	case "man_item":
		get_loais();
		$template = "product2/loais";
		break;
	case "add_item":		
		$template = "product2/loai_add";
		break;
	case "edit_item":		
		get_loai();
		$template = "product2/loai_add";
		break;
	case "save_item":
		save_loai();
		break;
	case "delete_item":
		delete_loai();
		break;
		
	#===================================================	
	case "man_cat":
		get_cats();
		$template = "product2/cats";
		break;
	case "add_cat":		
		$template = "product2/cat_add";
		break;
	case "edit_cat":		
		get_cat();
		$template = "product2/cat_add";
		break;
	case "save_cat":
		save_cat();
		break;
	case "delete_cat":
		delete_cat();
		break;
	#===================================================	
	case "man_list":
		get_lists();
		$template = "product2/lists";
		break;
	case "add_list":		
		$template = "product2/list_add";
		break;
	case "edit_list":		
		get_list();
		$template = "product2/list_add";
		break;
	case "save_list":
		save_list();
		break;
	case "delete_list":
		delete_list();
		break;
	default:
		$template = "index";
}

#====================================
function fns_Rand_digit($min,$max,$num)
	{
		$result='';
		for($i=0;$i<$num;$i++){
			$result.=rand($min,$max);
		}
		return $result;	
	}

function get_items(){
	global $d, $items, $paging,$urlsanpham;
	#----------------------------------------------------------------------------------------
	if($_REQUEST['spdc']!='')
	{
	$id_up = $_REQUEST['spdc'];
	$spdc=time();
	$sql_sp = "SELECT id,spdc FROM table_product2 where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$spdc1=$cats[0]['spdc'];
	if($spdc1==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_product2 SET spdc ='".$spdc."' WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_product2 SET spdc =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	#----------------------------------------------------------------------------------------
	if($_REQUEST['noibat']!='')
	{
	$id_up = $_REQUEST['noibat'];
	$sql_sp = "SELECT id,noibat FROM table_product2 where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$time=time();
	$hienthi=$cats[0]['noibat'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_product2 SET noibat ='$time' WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_product2 SET noibat =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	#-------------------------------------------------------------------------------
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_product2 where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_product2 SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_product2 SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	#-------------------------------------------------------------------------------
	$sql = "select * from #_product2";	
	if((int)$_REQUEST['id_list']!='')
	{
	$sql.=" where  	id_list=".$_REQUEST['id_list']."";
	}
	if((int)$_REQUEST['id_cat']!='')
	{
	$sql.=" and	id_cat=".$_REQUEST['id_cat']."";
	}
	if((int)$_REQUEST['id_item']!='')
	{
	$sql.=" and	id_item=".$_REQUEST['id_item']."";
	}
	
	if($_REQUEST['keyword']!='')
	{
	$keyword=addslashes($_REQUEST['keyword']);
	$sql.=" where ten LIKE '%$keyword%'";
	}
	$sql.=" order by stt,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=product2&act=man".$urlsanpham;
	$maxR=20;
	$maxP=20;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
	
}

function get_item(){
	global $d, $item,$ds_tags;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=product2&act=man");	
	$sql = "select * from #_product2 where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=product2&act=man");
	$item = $d->fetch_array();	
}

function save_item(){
	global $d;
	$file_name=fns_Rand_digit(0,9,12);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=product2&act=man");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	
	
	if($id){
		$id =  themdau($_POST['id']);
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_sanpham2,$file_name)){
			$data['photo'] = $photo;	
			$data['thumb'] = create_thumb($data['photo'], 215, 185, _upload_sanpham2,$file_name,2);		
			$data['thumb2'] = create_thumb($data['photo'], 290, 285, _upload_sanpham2,$file_name,2);	
			$d->setTable('product2');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_sanpham2.$row['photo']);	
				delete_file(_upload_sanpham2.$row['thumb']);
				delete_file(_upload_sanpham2.$row['thumb2']);				
			}
		}					 	
		$data['id_list'] = (int)$_POST['id_list'];			
		$data['id_cat'] = (int)$_POST['id_cat'];	
		$data['id_item'] = (int)$_POST['id_item'];		
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		$data['ten_cn'] = $_POST['ten_cn'];
		$data['soluong'] = $_POST['soluong'];
		$data['baohanh'] = $_POST['baohanh'];
		$data['trinhtrang'] = $_POST['trinhtrang'];
		$data['xuatxu'] = $_POST['xuatxu'];
		$data['vanchuyen'] = $_POST['vanchuyen'];
		$data['masp'] = $_POST['masp'];	
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);	
		$data['gia'] = (int)$_POST['gia'];					
		$data['mota_vi'] = $_POST['mota_vi'];
		$data['mota_en'] = $_POST['mota_en'];
		$data['mota_cn'] = $_POST['mota_cn'];		
		$data['thongso'] = $_POST['thongso'];		
		$data['noidung_vi'] = $_POST['noidung_vi'];			
		$data['noidung_en'] = $_POST['noidung_en'];	
		$data['noidung_cn'] = $_POST['noidung_cn'];									
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		$d->setTable('product2');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=product2&act=man&curPage=".$_REQUEST['curPage']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product2&act=man");
	}else{
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_sanpham2,$file_name)){
			$data['photo'] = $photo;		
			$data['thumb'] = create_thumb($data['photo'], 215, 185, _upload_sanpham2,$file_name,2);		
			$data['thumb2'] = create_thumb($data['photo'], 290, 285, _upload_sanpham2,$file_name,2);	
		}		
		
		$data['id_list'] = (int)$_POST['id_list'];			
		$data['id_cat'] = (int)$_POST['id_cat'];	
		$data['id_item'] = (int)$_POST['id_item'];		
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		$data['ten_cn'] = $_POST['ten_cn'];
		$data['soluong'] = $_POST['soluong'];
		$data['baohanh'] = $_POST['baohanh'];
		$data['trinhtrang'] = $_POST['trinhtrang'];
		$data['xuatxu'] = $_POST['xuatxu'];
		$data['vanchuyen'] = $_POST['vanchuyen'];
		$data['masp'] = $_POST['masp'];	
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);	
		
		$data['gia'] = (int)$_POST['gia'];			
		$data['mota_vi'] = $_POST['mota_vi'];
		$data['mota_en'] = $_POST['mota_en'];
		$data['mota_cn'] = $_POST['mota_cn'];		
		$data['thongso'] = $_POST['thongso'];		
		$data['noidung_vi'] = $_POST['noidung_vi'];			
		$data['noidung_en'] = $_POST['noidung_en'];	
		$data['noidung_cn'] = $_POST['noidung_cn'];	
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		$d->setTable('product2');
		if($d->insert($data))
		{			
			redirect("index.php?com=product2&act=man");
		}
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=product2&act=man");
	}
}

function delete_item(){
	global $d;
	if($_REQUEST['id_cat']!='')
	{ $id_catt="&id_cat=".$_REQUEST['id_cat'];
	}
	if($_REQUEST['curPage']!='')
	{ $id_catt.="&curPage=".$_REQUEST['curPage'];
	}
	
	
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->reset();
		$sql = "select id,thumb, photo from #_product2 where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_sanpham2.$row['photo']);
				delete_file(_upload_sanpham2.$row['thumb']);
				delete_file(_upload_sanpham2.$row['thumb2']);			
			}
		$sql = "delete from #_product2 where id='".$id."'";
		$d->query($sql);
		}
		if($d->query($sql))
			redirect("index.php?com=product2&act=man".$id_catt."");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=product2&act=man");
	}else transfer("Không nhận được dữ liệu", "index.php?com=product2&act=man");
}

#====================================
function get_cats(){
	global $d, $items, $paging;
	
	$sql = "select * from #_product2_cat";
		
	if((int)$_REQUEST['id_list']!='')
	{
	$sql.=" where id_list=".$_REQUEST['id_list']."";
	}
	$sql.=" order by stt";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=product2&act=man_cat";
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_cat(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=product2&act=man_cat");
	
	$sql = "select * from #_product2_cat where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=product2&act=man_cat");
	$item = $d->fetch_array();
}

function save_cat(){
	global $d;
	$file_name=fns_Rand_digit(0,9,12);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=product2&act=man_cat");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){		
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		$data['ten_cn'] = $_POST['ten_cn'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);		
		$data['id_list'] = $_POST['id_list'];			
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		
		$d->setTable('product2_cat');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=product2&act=man_cat&curPage=".$_REQUEST['curPage']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product2&act=man_cat");
	}else{		
		$data['id_list'] = $_POST['id_list'];
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		$data['ten_cn'] = $_POST['ten_cn'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);	
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		
		$d->setTable('product2_cat');
		if($d->insert($data))
			redirect("index.php?com=product2&act=man_cat");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=product2&act=man_cat");
	}
}

function delete_cat(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);		
		$d->reset();		
		
			$sql = "delete from #_product2_cat where id='".$id."'";
			$d->query($sql);
		
		
		if($d->query($sql))
			redirect("index.php?com=product2&act=man_cat");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=product2&act=man_cat");
	}else transfer("Không nhận được dữ liệu", "index.php?com=product2&act=man_cat");
}
/*---------------------------------*/
function get_loais(){
	global $d, $items, $paging;
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_product2_item where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_product2_item SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_product2_item SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	
	$sql = "select * from #_product2_item";
		
	if((int)$_REQUEST['id_list']!='')
	{
	$sql.=" where id_list=".$_REQUEST['id_list']."";
	}
	$sql.=" order by stt";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=product2&act=man_item";
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_loai(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=product2&act=man_item");
	
	$sql = "select * from #_product2_item where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=product2&act=man_item");
	$item = $d->fetch_array();
}

function save_loai(){
	global $d;
	$file_name=fns_Rand_digit(0,9,12);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=product2&act=man_item");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){		
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		$data['ten_cn'] = $_POST['ten_cn'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);		
		$data['id_list'] = $_POST['id_list'];	
		$data['id_cat']= $_POST['id_cat'];			
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		
		$d->setTable('product2_item');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=product2&act=man_item&curPage=".$_REQUEST['curPage']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product2&act=man_item");
	}else{		
		$data['id_list'] = $_POST['id_list'];
		$data['id_cat']= $_POST['id_cat'];	
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		$data['ten_cn'] = $_POST['ten_cn'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);	
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		
		$d->setTable('product2_item');
		if($d->insert($data))
			redirect("index.php?com=product2&act=man_item");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=product2&act=man_item");
	}
}

function delete_loai(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);		
		$d->reset();		
		
			$sql = "delete from #_product2_item where id='".$id."'";
			$d->query($sql);
		
		
		if($d->query($sql))
			redirect("index.php?com=product2&act=man_item");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=product2&act=man_item");
	}else transfer("Không nhận được dữ liệu", "index.php?com=product2&act=man_item");
}
/*---------------------------------*/
function get_lists(){
	global $d, $items, $paging;
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_product2_list where id='".$id_up."'";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_product2_list SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_product2_list SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	
	$sql = "select * from #_product2_list";			
	$sql.=" order by stt,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=product2&act=man_list";
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_list(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=product2&act=man_list");	
	$sql = "select * from #_product2_list where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=product2&act=man_list");
	$item = $d->fetch_array();	
}

function save_list(){
	global $d;
	$file_name=fns_Rand_digit(0,9,12);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=product2&act=man_list");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){					
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		$data['ten_cn'] = $_POST['ten_cn'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		
		$d->setTable('product2_list');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=product2&act=man_list&curPage=".$_REQUEST['curPage']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product2&act=man_list");
	}else{				
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		$data['ten_cn'] = $_POST['ten_cn'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		
		$d->setTable('product2_list');
		if($d->insert($data))
			redirect("index.php?com=product2&act=man_list");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=product2&act=man_list");
	}
}

function delete_list(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);		
		$d->reset();		
		
			$sql = "delete from #_product2_list where id='".$id."'";
			$d->query($sql);
		
		
		if($d->query($sql))
			redirect("index.php?com=product2&act=man_list");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=product2&act=man_list");
	}else transfer("Không nhận được dữ liệu", "index.php?com=product2&act=man_list");
}
?>