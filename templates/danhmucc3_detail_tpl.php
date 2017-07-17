<?php 
    $id =  addslashes($_GET['id']);
	$d->reset();
	$sql_tungdanhmuc="select * from #_product where hienthi =1 and id_item='$id'  order by stt asc ";
	//die($sql_tungdanhmuc);
	$d->query($sql_tungdanhmuc);	
	$result_spnam=$d->result_array();	
	
	$d->reset();
	$sql_item="select * from #_product_item where hienthi =1 and id='$id'";
	$d->query($sql_item);	
	$result_item=$d->fetch_array();	
	
	$d->reset();
	$sql_laylist="select * from #_product_list where hienthi =1 and id='".$result_item['id_list']."'";
	$d->query($sql_laylist);	
	$result_laylist=$d->fetch_array();	
	
	$d->reset();
	$sql_laycat="select * from #_product_cat where hienthi =1 and id='".$result_item['id_cat']."'";
	$d->query($sql_laycat);	
	$result_cat=$d->fetch_array();	
	
				
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url=getCurrentPageURL();
	$maxR=30;
	$maxP=5;
	$paging=paging_home($result_spnam , $url, $curPage, $maxR, $maxP);
	$result_spnam=$paging['source'];
    
	
	$total_sp = count($result_spnam);
?>
<div id="pageContent" class="page-width">
    <div id="mainContentPage">
      <div class="project-category">
        <div>
          <h1 class="seo-tag"> Mẫu nhà đẹp </h1>
          <?php //include _template."layout/menu_top_item.php"; ?>
<!--           <a href="/du-an/video-nha-dep-biet-thu.aspx">Video</a>  </div> -->
          </div> 
        <div class="clear"> </div>
        <div class="sep40 sep-menu"> </div>
      </div>
      <div runnat="Window" id="Window1_RD165" apply="yPhM+NHI1I4udJTQGLC2n2iegQtHKvZsLnSU0Biwtp8dMfrYAWuORg==" class="Window list-item">
        <div id="container">
          <input runnat="IntBox" id="cboCategory_RD168" class="IntBox cboCategory hide" />
          <div runnat="DataList" class="DataList" id="listProject_RD171">
            <div class="paging paging-top"></div>
            <div class="datalist-content">
              <?php for($i=0,$count_spnam=count($result_spnam);$i<$count_spnam;$i++) { 
              ?>
              <div class="element-item" data-category="2">
                <div class="p10">
                  <div class="rel"> <a href="chi-tiet-san-pham/<?=$result_spnam[$i]['tenkhongdau']?>-<?=$result_spnam[$i]['id']?>.html"> <img src="upload/sanpham/<?php if($result_spnam[$i]["tc_big"]==1) echo $result_spnam[$i]["thumb"]; else echo $result_spnam[$i]["thumb"] ?>" alt="<?=$result_spnam[$i]["ten_vi"]?>" />
                    <div class="title-element utm"><?=$result_spnam[$i]["ten_vi"]?></div>
                    <div class="tip clearP">
                      <p><?=$result_spnam[$i]["mota_vi"]?></p>
                    </div>
                    </a> </div>
                </div>
              </div>
              <?php } ?>
            </div>
            <div class="paging paging-bottom"></div>
          </div>
        </div>
        <div class="clear"> </div>
      </div>
      <script id="script-server">$("#txtSearch_RD150").textbox();$("#txtSearch_RD150").unbind("keypress");$("#txtSearch_RD150").onEnter("Search");$("#Button1_RD153").unbind("click");$("#Button1_RD153").click(function(){$("#Button1_RD153").actionComponent("Search")});$("#cboCategory_RD168").intbox();$("#cboCategory_RD168").unbind("change");$("#cboCategory_RD168").change(function(){$("#cboCategory_RD168").actionComponent("ChangeCategory")});$("#listProject_RD171").data("DisplayCount",36);$("#listProject_RD171").data("PagingParam","p");$("#listProject_RD171").data("CurrentPage",1);$("#listProject_RD171").data("QueryEncode","YeCMcHuknMWMGDS7PyYbWavqExsq/oyGj1g718jHSzz2LBajGfrTdmslpVUfI8Lcez7Z7zWONsWXQVZGYH9XuiZnfdBDLz1K7Dm5D/KGTZoyv3f/Qb0y9Cfo6s9bhjNFMeLMZOMWLDsy2LbVzhe5Y9iA7U9e2qYlnHbGvzugFaUuXdEuUAvFQudN0f4Le8IyzPHjWVraxGvFd3QqOKlxu07LZJJHmGmm+yr6yLIY+2uk/oLw3KVbi16OPLUI2bst5716z3bPrTZWUBNQSYwr2JPUOLixwaWuKJh9BXaUAM1Z69lkNwlNBbirVOaGe2ikz+heLP4XOsaWWMWRnQMdWBA7gJHfIeM40wB6KqtWP7pmo/w+1Rd01Gt4uyjvGUMDenbrFXNbaqVLF4Mag79kTPz8IQff/62zKTnoFVAwoylgFZc2RHEaUUduwnBdMWpvOl63yLMF6T5gt0QBS1qbCNsVFg4oT72vEWKykVn4rpY7pl4ZsDdL2v5d6PKIp5g1wegRHpIZpHvOk5w4nVafnbN0MgMJCZbvfdzpqEmYO3Ay4/dnHpI/490VqW/NNjMOk5QzL8v+y2e62uJU6VvAEUBwJ6SCkJOmZS6CN8gsx+9DpucSqyQlYPTVwonKZMmXrroYO6nidf1HptbgvjNSMOAQs88V5CFxRNSbZ+Ndl+mHWk2YVs2djNtE3iG5U57nH2usDws9iWZmq8edLC15Sb+UWpr1FGozxpXbt6gueDTvEv8JKTxAYzm9HhTUl81zHTH62AFrjkY=");$("#listProject_RD171").data("Template","<div class=\"element-item\" data-category=\"@{ProjectCategory}\">                    
		<div class=\"p10\">                        
			<div class=\"rel\"> 
				<a href=\"@{GetDetailUrl}\">                                
					<img src=\"@{Media}.ashx?w=330&h=330&mode=crop\" alt=\"@{Name}\" />                                
					<div class=\"title-element utm\">@{Name}                                
					</div>                                
					<div class=\"tip clearP\">@{Description}
					</div>                            
				</a>                        
			</div>                    
		</div>                
	</div>");$("#listProject_RD171").data("PageCount",2.0);$("#listProject_RD171").datalist().reloadPaging();$("#Window1_RD165").data("paramPage","lang=vi");
    </script> 
    </div>
  </div>
  <div class="sep20"> </div>	