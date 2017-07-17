<?php
	$d->reset();
	$sql_list ="select *	from #_product_list where hienthi=1 order by stt asc limit 0,8";
	$d->query($sql_list);
	$list =$d->result_array();
?>

<ul id="mobileMenu">
	<li><a class="glyphicon glyphicon-menu-hamburger Button"></a>
	<ul class="roboto hide">
		<li><a href="index.html"> Trang Chủ</a></li>
	<?php
		for($i=0,$count_l=count($list);$i<$count_l;$i++)
		{
			if($list[$i]["ten_cn"]!="")
			{
	?>
	<li><a href="<?php echo $list[$i]["ten_cn"]?>" target="_blank"><strong style="color: ;"><?=$list[$i]["ten_vi"]?></strong></a></li>
	<?php
			}
		else {
			?>
			<li><a href="danh-muc/<?=$list[$i]["tenkhongdau"]?>-<?=$list[$i]["id"]?>.html">
	<?=$list[$i]["ten_vi"]?>
	</a></li>
	<?php } }?>
		<?php
	$d->reset();
	$sql_list ="select *	from #_tinloai1_1_list where hienthi=1 order by stt asc limit 0,8";
	$d->query($sql_list);
// 	$list =$d->result_array();
	$cat =$d->result_array();
?>
	<li class="dropdown"><a href="tin-tuc.html" class="dropdown-toggle" data-toggle="dropdown">Tin tức
	<i class="fa fa-angle-down"></i></a>
	
	<?php
		if(count($cat)>0)
		{
		?>
		<ul class="dropdown-menu">
		<?php
			for($j=0,$count_c=count($cat);$j<$count_c;$j++){ 
		?>
		<li><a href="tin-tuc-list/<?=$cat[$j]["tenkhongdau"]?>-<?=$cat[$j]["id"]?>.html">
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
		<li><a href="lien-he.html"> Liên hệ</a></li>
	</ul>
	</li>
</ul>