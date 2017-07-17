<?php 
			$d->reset();
			$id =  addslashes($_GET['id']);
			$sql_tinl="select * from #_tinloai1_1 where hienthi =1 order by id desc";
			$d->query($sql_tinl);	
			$result_tinl=$d->result_array();		
			$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
			$url=getCurrentPageURL();
			$maxR=2;
			$maxP=5;
			$paging=paging_home($result_tinl , $url, $curPage, $maxR, $maxP);
			$result_tinl=$paging['source'];
			
			
			$sql_tinll="select * from #_tinloai1_1_list where hienthi =1 order by stt asc";
			$d->query($sql_tinll);	
			$result_tinll=$d->result_array();	
			
			$sql_tinll_name="select * from #_tinloai1_1_list where id='".$id."'";
			$d->query($sql_tinll_name);	
			$result_tinll_name=$d->fetch_array();	
?>
<section>
	<div class="container">
	<div class="col-lg-12">
		<div class="col-lg-8 col-sm-8 col-md-6 col-xs-12">
		<h2 class="box-header">TIN TỨC </h2>
		<?php
					 for($i=0;$i<count($result_tinl);$i++)
					 { 
					 ?>
		<div class="media tintuc wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;">
			<div class="pull-left"> <img class="img-responsive" src="upload/tinloai1_1/<?=$result_tinl[$i]['thumb']?>" alt="<?=$result_tinl[$i]['ten_vi']?>" alt="<?=$result_tinl[$i]["ten_vi"]?>" "> </div>
			<div class="media-body"><a href="tin-tuc-detail/<?=$result_tinl[$i]['tenkhongdau']?>-<?=$result_tinl[$i]['id']?>.html">
			<h3 class="media-heading">
				<?=$result_tinl[$i]['ten_vi']?>
			</h3>
			<span>
			<?=$result_tinl[$i]['mota_vi']?>
			</span></a> </div>
		</div>
		<?php
					 } 
						?>
		<div class="pagination">
			<nav aria-label="Page navigation">
			<div class="pagination-container">
				<ul class="pagination">
				<?php echo $paging['paging'];?>
				</ul>
			</div>
			</nav>
		</div>
		</div>
		<?php include _template."layout/content_right.php"; ?>
	</div>
	</div>
</section>
<div class=" clearfix"></div>
