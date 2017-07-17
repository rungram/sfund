<?php 
            $id =  addslashes($_GET['id']);
			$d->reset();
			$sql_tungdanhmuc="select * from #_product where hienthi =1 and id_cat='$id'  order by stt asc ";
			$d->query($sql_tungdanhmuc);	
			$result_spnam=$d->result_array();	
			
			$d->reset();
			$sql_laycat="select * from #_product_cat where hienthi =1 and id='$id'";
			$d->query($sql_laycat);	
			$result_cat=$d->fetch_array();
			$id_list = $result_cat["id_list"];
			$d->reset();
			$sql_laylq="select * from #_product_cat where hienthi =1 and id<>'$id' and id_list='$id_list' limit 0,6";
			$d->query($sql_laylq);	
			$result_laylq=$d->result_array();
			$d->reset();
			$sql_laylist="select * from #_product_list where hienthi =1 and id='$id_list'";
			$d->query($sql_laylist);
			$result_list=$d->fetch_array();
						
			$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
			$url=getCurrentPageURL();
			$maxR=5;
			$maxP=5;
			$paging=paging_home($result_spnam , $url, $curPage, $maxR, $maxP);
			$result_spnam=$paging['source'];
            
			
			$total_sp = count($result_spnam);
?>
<section id="content">

		  
			  <!-- end divider -->
  <div class="row">
			    
		<div class="col-lg-12">
             <div class=" container content">
			     <div class="col-lg-9">
                        	<div class="info_detail">
                              <h2>Giới thiệu</h2>
                                  <div class="caption">
                                          <p><?php echo $result_cat["mota_vi"]?></p>
                                  </div>
                                  <div class="row">
                                    <div class="like-fb">
                            <!-- AddThis Button BEGIN -->
							<div class="box-social pull-left chiase">
                        <!-- AddThis Button BEGIN -->
                        <div class="addthis_toolbox addthis_default_style text-center">
                            <a class="addthis_button_ketnooi addthis_button_preferred_1 at300b" target="_blank" title="Ketnooi" href="#"><span class="at-icon-wrapper" style="line-height: 16px; padding:15px 5px 0 10px; background-color: rgb(24, 136, 185);"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" title="Ketnooi" alt="Ketnooi" style="height: 25px;" class="at-icon at-icon-ketnooi"><g><path d="M21.6 21.135a18.77 18.77 0 0 0-.695-1.17l-1.93-3.035c1.02-.98 2.172-2.403 2.172-4.24 0-1.35-.53-2.6-1.496-3.524-.935-.892-2.13-1.365-3.456-1.365-.84 0-1.64.194-2.35.565v-.037c0-1.547-.438-2.842-1.302-3.846C11.575 3.36 10.2 2.74 8.666 2.74c-1.653 0-3.088.71-4.038 2.002-.74 1.002-1.113 2.275-1.113 3.785v14.51c0 1.527.43 2.806 1.283 3.804.96 1.12 2.334 1.735 3.87 1.735 1.374 0 2.68-.56 3.675-1.578.185-.188.378-.42.564-.692.275.375.525.672.77.918.618.617 1.712 1.354 3.415 1.354 1.426 0 2.734-.55 3.686-1.553.635-.672 1.393-1.853 1.393-3.662 0-.768-.195-1.52-.57-2.227zm-3.343 3.502c-.295.312-.682.467-1.164.467-.416 0-.736-.11-.96-.336-.224-.225-.53-.63-.91-1.22l-3.004-4.937-1.847 1.747v2.703c0 .655-.172 1.162-.517 1.516-.345.352-.74.53-1.19.53-.523 0-.936-.177-1.234-.524-.3-.35-.448-.865-.448-1.545V8.527c0-.756.146-1.33.437-1.725.29-.395.707-.594 1.247-.594.523 0 .94.18 1.246.537.308.357.46.885.46 1.582v8.252l3.827-4.015c.475-.498.836-.84 1.085-1.02.25-.185.553-.276.91-.276.424 0 .778.134 1.06.405.28.27.422.607.422 1.016 0 .5-.46 1.163-1.382 1.995l-1.808 1.658 3.49 5.484c.258.405.44.717.553.928.113.21.17.414.17.604 0 .538-.148.965-.443 1.277z"/></g></svg></span></a>
                            
                            <a class="addthis_button_facebook addthis_button_preferred_2 at300b" title="Facebook" href="#"><span class="at-icon-wrapper" style="line-height: 16px; background-color: rgba(0,65,204,1.00);padding:15px 5px 0 5px;"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" title="Facebook" alt="Facebook" style="height: 25px;" class="at-icon at-icon-facebook"><g><path d="M22 5.16c-.406-.054-1.806-.16-3.43-.16-3.4 0-5.733 1.825-5.733 5.17v2.882H9v3.913h3.837V27h4.604V16.965h3.823l.587-3.913h-4.41v-2.5c0-1.123.347-1.903 2.198-1.903H22V5.16z" fill-rule="evenodd"/></g></svg></span></a>
                            
                            <a class="addthis_button_twitter addthis_button_preferred_3 at300b" title="Tweet" href="#"><span class="at-icon-wrapper" style="line-height: 16px; height: 16px; width: 16px; background-color: rgb(29, 161, 242);padding:15px 5px 0 5px;"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" title="Twitter" alt="Twitter" style="height: 25px;" class="at-icon at-icon-twitter"><g><path d="M27.996 10.116c-.81.36-1.68.602-2.592.71a4.526 4.526 0 0 0 1.984-2.496 9.037 9.037 0 0 1-2.866 1.095 4.513 4.513 0 0 0-7.69 4.116 12.81 12.81 0 0 1-9.3-4.715 4.49 4.49 0 0 0-.612 2.27 4.51 4.51 0 0 0 2.008 3.755 4.495 4.495 0 0 1-2.044-.564v.057a4.515 4.515 0 0 0 3.62 4.425 4.52 4.52 0 0 1-2.04.077 4.517 4.517 0 0 0 4.217 3.134 9.055 9.055 0 0 1-5.604 1.93A9.18 9.18 0 0 1 6 23.85a12.773 12.773 0 0 0 6.918 2.027c8.3 0 12.84-6.876 12.84-12.84 0-.195-.005-.39-.014-.583a9.172 9.172 0 0 0 2.252-2.336" fill-rule="evenodd"/></g></svg></span></a>
                            
                            <a class="addthis_button_print addthis_button_preferred_4 at300b" title="In" href="#"><span class="at-icon-wrapper" style="line-height: 16px; height: 16px; width: 16px; background-color: rgb(115, 138, 141);padding:15px 5px 0 5px;"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" title="Print" alt="Print" style="height: 25px;" class="at-icon at-icon-print"><g><path d="M24.67 10.62h-2.86V7.49H10.82v3.12H7.95c-.5 0-.9.4-.9.9v7.66h3.77v1.31L15 24.66h6.81v-5.44h3.77v-7.7c-.01-.5-.41-.9-.91-.9zM11.88 8.56h8.86v2.06h-8.86V8.56zm10.98 9.18h-1.05v-2.1h-1.06v7.96H16.4c-1.58 0-.82-3.74-.82-3.74s-3.65.89-3.69-.78v-3.43h-1.06v2.06H9.77v-3.58h13.09v3.61zm.75-4.91c-.4 0-.72-.32-.72-.72s.32-.72.72-.72c.4 0 .72.32.72.72s-.32.72-.72.72zm-4.12 2.96h-6.1v1.06h6.1v-1.06zm-6.11 3.15h6.1v-1.06h-6.1v1.06z"/></g></svg></span></a>
                            
                            <a class="addthis_button_compact at300m" href="#"><span class="at-icon-wrapper" style="line-height: 16px; height: 16px; width: 16px; background-color: rgb(255, 101, 80);padding:15px 5px 0 5px;"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" title="More" alt="More" style="height: 25px;" class="at-icon at-icon-addthis"><g><path d="M18 14V8h-4v6H8v4h6v6h4v-6h6v-4h-6z" fill-rule="evenodd"/></g></svg></span></a>
                            <a class="atc_s addthis_button_compact"><span></span></a>
                        <div class="atclear"></div></div>
                        <!-- AddThis Button END -->
                    </div>
							
                            <!-- AddThis Button END -->
                    </div>
                                  </div>
                                  
                                  <div class="news">
                        <h2 >Bài viết liên quan</h2>
                        
                        <div class="col-lg-12 listnews">
                            <?php
                            foreach ($result_laylq as $item)
                            {
                            ?>
                             <div class="row">
                             <h4><?=$item["ten_vi"]?></h4>
                                <img class="img-responsive pull-left" alt="" src="img/2.jpg">
                                <p>
                                     <?=$item["ten_vi"]?>
                                </p>
                                <div><i class="fa fa-fast-forward" aria-hidden="true"><a href="<?php echo $result_list["ten_en"]?>-cat/<?=$item["tenkhongdau"]?>-<?=$item["id"]?>.html">Chi tiết</a></i></div>                                       
                            </div>
                            <?php
                            } 
                            ?>
                           
                        </div>                        
                        
                        </div>
                    		</div>
            </div>
            <div class="col-lg-3">
                 <div class="box">
                        	<h1>Video</h1>
                         	<div class=" boxed">
                            	<?php 
                                   global $d, $item;
                                   $sql = "select * from #_video where hienthi='1' order by stt";
                                   $d->query($sql);
                                   $items = $d->result_array();
                                ?>
                                <?php for($i=0, $count=count($items); $i<$count; $i++){?>
                                  <iframe class="video" width="100%" height="120" src="https://www.youtube.com/embed/<?php echo $items[$i]['url'] ?>" frameborder="1" allowfullscreen></iframe>
                                <?php }?>
                            </div>
                  </div>
                  <div class="box">
                        	<h1>Thư viện</h1>
                         	<div class=" boxed">
                            	<div class="content-img">
                            	   <?php 
                                   global $d, $item;
                                   $sql = "select * from #_thuvienanhcapcha where hienthi='1' order by stt";
                                   $d->query($sql);
                                   $items = $d->result_array();
                                ?>
                                <?php for($i=0, $count=count($items); $i<$count; $i++){//thumb
                                ?>
                                  <div class="padding5 item-img-left col-md-6"> <a href="chi-tiet-anh/<?=$items[$i]["thumb"]?>-<?=$items[$i]["id"]?>.html"><img src="golhar/<?=_upload_thuvienanhcapcha.$items[$i]['photo']?>"><h5><?=$items[$i]["thumb"]?></h5></a> </div>
                                  <?php }?>
                                </div>
                            </div>
                  </div>
        
            </div>
           </div>
           <div class="hr-style1"></div>
 
    		<div class="  clear"></div>
            <div class=" container support">
                        	<div class=" col-md-4 col-sm-4 col-xsm-6 col-xs-12 text-center">
                            	 <div class="progress">
                                      <div class="block">
                                      	<h1>Hotline</h1>
                                        <h3 class="title_1">Bộ phận kinh doanh</h3>
                                        <span class=" fa-3x">(+84.8) 903610327</span>
                                        <h3 class="title_1">Bộ phận hỗ trợ kỹ thuật</h3>
                                        <span class="fa-3x">(+84.8) 903610327</span>
                                        
                                      </div>
                                  </div>
                                
                            </div>
                            <div class=" col-md-4 col-sm-4 col-xsm-6 col-xs-12">
                            	 <div class="progress">
                                      <div class="block">
                                      	 <h1>Suport online</h1>
                                         <h3 class="title_1"></h3>
                                        <div class="httt">
                                        <img src="img/index_32.png" width="49"><span class="httt1">Bộ phận kinh doanh</span>
                                        </div>
                                        <div class="httt">
                                        <img src="img/index_32.png" alt="" width="49"><span class="httt1">Bộ phận hỗ trợ kỹ thuật</span>
                                        </div>
                                        
                                      </div>
                                  </div>                                
                            </div>
                            <div class=" col-md-4 col-sm-4 col-xsm-6 col-xs-12">
                            	 <div class="progress">
                                      <div class="block block-lineket">
                                      	 <h1>Mạng xã hội</h1>
                                         
                                        <div class=" httt">
                                            <ul class="social-network fa-3x text-center">
                                                <li><a href="#" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="#" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="#" data-placement="top" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                                                <li><a href="#" data-placement="top" title="Google plus"><i class="fa fa-google-plus"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="httt">
                                            <select onchange="window.open(this.value,'_blank')" class="block-lineket" name="select">
                                              <option value="" selected="selected">Liên kết website</option>
                                              <option value="https://www.google.com.vn/">Bộ nông nghiệp</option>
                                              <option value="https://www.google.com.vn/">Đại học nông nghiệp</option>
                                            </select>
                                        </div>
                                        
                                      </div>                               
                            </div>                     

			        	</div>
	          </div>
            </div>
            </div>
		  <!-- divider -->
			  
	  </section>