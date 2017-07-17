<?php 
		$d->reset();
		$id =	addslashes($_GET['id']);
		$sql_tinl="select * from #_tinloai1_1 where hienthi =1 and id_list='".$id."' order by id desc";
		$d->query($sql_tinl); 
		$result_tinl=$d->result_array();	
		$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
		$url=getCurrentPageURL();
		$maxR=10;
		$maxP=5;
		$paging=paging_home($result_tinl , $url, $curPage, $maxR, $maxP);
		$result_tinl=$paging['source'];
		
		
		$sql_tinll="select * from #_tinloai1_1 where id_list='".$id."' and hienthi =1 order by stt asc";
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
		<h2 class="box-header">
			<?=$result_tinll_name["ten_vi"]?>
		</h2>
		<div class="panel-group border" id="accordion">
		<?php
		 for ($i=0;$i<count($result_tinll);$i++)
		 {
		?>
			<div class="panel panel-default">
			<div class="panel-heading"> <a	href="tin-tuc-detail/<?=$result_tinll[$i]['tenkhongdau']?>-<?=$result_tinll[$i]['id']?>.html">
				<h4 class="panel-title">
				<?=$result_tinll[$i]["ten_vi"]?>
				</h4>
				</a> </div>
			<div id="collapse<?=$i?>" class="panel-collapse collapse in">
				<div class="panel-body">
				<?=$result_tinll[$i]["mota_vi"]?>
				</div>
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
