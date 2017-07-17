<?php 
            $id =  addslashes($_GET['id']);
			$d->reset();
			$sql_tungdanhmuc="select * from #_product where hienthi =1 and id_list='$id'  order by stt asc ";
			$d->query($sql_tungdanhmuc);	
			$result_spnam=$d->result_array();	
			
			$d->reset();
			$sql_laylist="select * from #_product_list where hienthi =1 and id='$id'";
			$d->query($sql_laylist);	
			$result_laylist=$d->fetch_array();	
			
			
						
			$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
			$url=getCurrentPageURL();
			$maxR=30;
			$maxP=5;
			$paging=paging_home($result_spnam , $url, $curPage, $maxR, $maxP);
			$result_spnam=$paging['source'];
            
			
			$total_sp = count($result_spnam);
?>
	<!-- start header -->
	
<section>
    	<div class="container">
            <div class="col-lg-12">
            
              <div class="col-lg-8 col-sm-8 col-md-6 col-xs-12">
                <h2 class="box-header"><?=$result_laylist["ten_vi"]?> </h2>
                 <div class="panel-group border" id="accordion">
     <?php
     for ($i=0;$i<count($result_spnam);$i++)
     {
     ?>
     <div class="panel panel-default">
        <div class="panel-heading">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$i?>">
          <h4 class="panel-title">
             <?=$result_spnam[$i]["ten_vi"]?> <i class="fa fa-caret-down" aria-hidden="true"></i>
          </h4>
           </a>
        </div>
        <div id="collapse<?=$i?>" class="panel-collapse collapse in">
          <div class="panel-body">
            <?=$result_spnam[$i]["mota_vi"]?></div>
        </div>
      </div>
     <?php
     } 
     ?>
      
      
      
    </div>
                  
              </div>
                <?php include _template."layout/content_right.php"; ?>
              </div>  
        </div>
    </section>
    <div class=" clearfix"></div>
 
         <!--/gmap_area -->
    <!-- InstanceEndEditable -->
    