<?php
	$d->reset();
	$sql_list ="select *	from #_product_list where hienthi=1 order by stt asc limit 0,8";
	$d->query($sql_list);
	$list =$d->result_array();
?>

<div class="collapse navbar-collapse navbar-left">
	<ul class="nav navbar-nav">
	<li><a href="index.html">Trang chủ</a></li>
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
	<li><a href="lien-he.html">Liên hệ</a></li>
	</ul>
</div>
