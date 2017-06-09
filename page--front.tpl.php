<?php include_once('templates/header.tpl.php');?>

<div id="home-banner">
    <div class="container" id="home-banner-wrapper">
        
    </div>
</div>


<div id="content" class="page-content p-t-15 p-b-30">
    <div id="content-wrapper" class="container">
        
        <div class="row m-b-10">
            
            <div id="col-left" class="col-md-8">
            	
            	<div class="m-b-20">
	           		<h3 class="text-center"><i class="fa fa-star"></i>  ÖNE ÇIKAN ADAYLAR  <i class="fa fa-star"></i></h3>
	                <hr/>
	                <div id="featured-list" class="row">
	                    <?php  print views_embed_view('aday_frontpage', 'default'); ?>
	                </div>	
            	</div>
		        
		        <div id="col-aday-mostview" class="tiles-container simple z-depth-1 m-b-20">
                    <div class="tiles grey p-t-15 p-b-15 p-l-25 rounded-t-2">
                      <h4 class="text-black"><span class="semi-bold">POPÜLER</span> ADAYLAR</h4>
                    </div>
                    <div class="tiles white p-r-15 p-l-15 p-b-25 rounded-b-2">
                        <div>
                            <?php  print views_embed_view('aday_mostlike', 'default'); ?>
                        </div>
                    </div>
                </div>
                
               	<div class="m-b-20 adbox"> 
		            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
					<ins class="adsbygoogle"
					     style="display:block"
					     data-ad-client="ca-pub-6110380568008517"
					     data-ad-slot="3009311549"
					     data-ad-format="auto"></ins>
					<script>
					(adsbygoogle = window.adsbygoogle || []).push({});
					</script>
		        </div>
		        
                <div id="latest-articles-box" class="tiles-container simple z-depth-1 m-b-20">
                    <div class="tiles grey p-t-15 p-b-15 p-l-25 rounded-t-2">
                        <h4 class="text-black">SEÇİM <span class="semi-bold">REHBERİ</span></h4>
                    </div>
                    <div class="tiles white p-r-15 p-l-15 p-b-25 rounded-b-2">
                        <div>
                            <?php  print views_embed_view('articles_latest', 'default'); ?>
                        </div>
                    </div>
                </div>
		        
            </div>
            
            <div id="col-right" class="col-md-4">
            	
            	<div class="m-t-15 m-b-20 adbox">
            		<a href="/uyelikler" title="Adaylara ozel uyelikle paketleri">
                		<img src="/static/secim-2015/promo/ozeluyelik.jpg" alt="Adaylara ozel uyelik paketleri" style="width: 100%; height: auto;"/>
                	</a>
            	</div>
            	
            	<div class="adbox no-padding z-depth-1 m-b-15">
                	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
					<ins class="adsbygoogle"
					     style="display:inline-block;width:300px;height:250px"
					     data-ad-client="ca-pub-6110380568008517"
					     data-ad-slot="6102378740"></ins>
					<script>
					(adsbygoogle = window.adsbygoogle || []).push({});
					</script>
               </div>
            	
                <div id="forum-box" class="tiles-container simple z-depth-1 m-b-20">
                    <div class="tiles grey p-t-15 p-b-15 p-l-25 rounded-t-2">
                      <h4 class="text-black"><span class="semi-bold">SEÇMENİN</span> SESİ</h4>
                    </div>
                    <div class="tiles white p-all-15 rounded-b-2">
                        <div>
                            <?php
                            $block = module_invoke('disqus', 'block_view', 'disqus_combination_widget');
                            print render($block['content']);
                            ?>
                        </div>
                    </div>
                </div>
           
                
                <div id="col-aday-latest" class="tiles-container simple z-depth-1 m-b-20">
                    <div class="tiles grey p-t-15 p-b-15 p-l-25 rounded-t-2">
                      <h4 class="text-black"><span class="semi-bold">YENİ</span> ADAYLAR </h4>
                    </div>
                    <div class="tiles white p-r-15 p-l-15 p-b-25 rounded-b-2">
                        <div>
                            <?php  print views_embed_view('aday_latest', 'block'); ?>
                        </div>
                    </div>
                </div>
            	
            </div>
            
        </div>
       
        
    </div>
</div>    

<?php include_once('templates/footer.tpl.php');?>