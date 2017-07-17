<?php
if(isset($_GET['id']))
{	
	$id =  addslashes($_GET['id']);
	
	$d->reset();
	$sql_tanglx="update  #_product set luotxem=luotxem+1 where id='$id'";
	$d->query($sql_tanglx);
	
	$d->reset();
	$sql_chitietsp="select *  from #_product where hienthi= 1 and id='$id'";
	$d->query($sql_chitietsp);
	$chitiet_sp=$d->fetch_array();
	//list
	$d->reset();
	$sql_l="select * from #_product_list where hienthi= 1 and id='".$chitiet_sp['id_list']."'";
	$d->query($sql_l);
	$result_l=$d->fetch_array();
	//
	$id_cat = $chitiet_sp['id_cat'];
	$d->reset();
	$sql_laylq="select * from #_product where hienthi =1 and id<>'$id' and id_cat='$id_cat' limit 0,6";
	$d->query($sql_laylq);
	$result_laylq=$d->result_array();
	//cat
	$d->reset();
	$sql_c="select * from #_product_cat where hienthi= 1 and id='".$chitiet_sp['id_cat']."'";
	$d->query($sql_c);
	$result_c=$d->fetch_array();
	//item
	$d->reset();
	$sql_i="select * from #_product_item where hienthi= 1 and id='".$chitiet_sp['id_item']."'";
	$d->query($sql_i);
	$result_i=$d->fetch_array();
	$id_list = $chitiet_sp['id_list'];
	$d->reset();
	$sql_spkhac="select id,ten_$lang,tenkhongdau,thumb,gia,masp,luotxem,mota_vi  from #_product where hienthi= 1 and id_list ='$id_list' and id<>'$id' order by stt asc limit 0,12";
	$d->query($sql_spkhac);
	$result_spkhac=$d->result_array();
		
	$url=getCurrentPageURL();
}
?>

				<!--xu ly lay màu-->
                <?php
				$mau_chinh = $chitiet_sp['id_mau'];
				$d->reset();
				$sql_laymau = "select ten_vi,ten_en from #_tinloai2_2 where id='$mau_chinh'";
				$d->query($sql_laymau);
				$result_laymau = $d->fetch_array();
				
				
				//lay ds mau khac
				
				$d->reset();
				$sql_maukhac  = "select * from table_hinh_cungsp";
			    $sql_maukhac .= " left join table_tinloai2_2 on table_tinloai2_2.id = table_hinh_cungsp.chon_mau";
				
				$sql_maukhac .= " where table_hinh_cungsp.id_sp='".$id."' and  table_hinh_cungsp.chon_mau<> '".$mau_chinh."'";
				$sql_maukhac .= " group by table_hinh_cungsp.chon_mau";
				$d->query($sql_maukhac);
				$result_maukhac = $d->result_array();
				
				//lay hinh cung mau
				$d->reset();
				$sql_cungmauc = "select thumb,photo from #_hinh_cungsp where id_sp='$id' and chon_mau='$mau_chinh'";
				$d->query($sql_cungmauc);
				$result_cungmauc = $d->result_array();
				
				?>
<section>
    	<div class="container">
            <div class="col-lg-12">
            
              <div class="col-lg-8 col-sm-8 col-md-6 col-xs-12">
                <h2 class="box-header"><?=$chitiet_sp["ten_vi"]?></h2>
                 <div class="panel-group border" id="accordion">
      <div class="panel panel-default">
        <div class="panel-heading">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
          <h4 class="panel-title">
             <?=$chitiet_sp["ten_vi"]?> <i class="fa fa-caret-down" aria-hidden="true"></i>
          </h4>
           </a>
        </div>
        <div id="collapseOne" class="panel-collapse collapse in">
          <div class="panel-body">
             <?=$chitiet_sp["mota_vi"]?></div>
        </div>
      </div>
      
      
    </div>
                  
              </div>
                <?php include _template."layout/content_right.php"; ?>
              </div>  
        </div>
    </section>
    <div class=" clearfix"></div>