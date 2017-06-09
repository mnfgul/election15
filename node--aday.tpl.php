<?php
    $party = $content['field_aday_party'][0]['#markup'];
    $clean = strtolower(str_replace(' ', '-', $party));
    $clean = preg_replace('/[^A-Za-z0-9\-]/', '', $clean);
	
	/*City*/
	$city = '';
	$city = strtolower($content['field_aday_city'][0]['#markup']);
	
	/*Social*/
	$fb = $youtube = $twitter = $website = '';
	$fb = trim($content['field_facebook'][0]['#markup']);
	$twitter = trim($content['field_twitter'][0]['#markup']);
	$youtube = trim($content['field_youtube'][0]['#markup']);
	$website = trim($content['field_website'][0]['#markup']);
?>

        
<?php if($teaser){?>
<div id="n-teaser-<?php print $node->nid; ?>" class="<?php print $classes; ?> aday-list-row clearfix row b-b b-grey hover-highlight">
    <div class="col-profile-photo col-md-2 col-xs-3">
        <?php print render($content['field_photo'][0]); ?>
    </div>
    <div class="col-text col-md-7 col-xs-6">
        <h4 <?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h4>
        <p class="profile-sub-title">
            <span class="semi-bold"><?php print render($content['field_aday_party'][0]['#markup']); ?></span>
            <span class="semi-bold"><?php print render($content['field_aday_city'][0]['#markup']); ?></span>
            Milletvekili <?php print render($content['field_status'][0]['#markup']); ?>
        </p>
    </div>
    <div class="col-party col-md-3 col-xs-3">
        <a href="#" class="party-logo party-<?php print $clean; ?>" data-toggle="tooltip" data-placement="top" title="<?php print $party; ?>"><?php print $party; ?></a>
    </div>
</div>

<?php } else{?>

<div id="n-<?php print $node->nid; ?>" class="row <?php print $classes; ?>" >
    <div id="col-left-profile" class="col-md-8 col-xs-12" vocab="http://schema.org/" typeof="Person">
        
        <div class="profile-banner z-depth-1 m-b-20  rounded-b-2">
            <div class="profile-photo party-<?php print $clean; ?> rounded-t-2"><?php print render($content['field_photo'][0]); ?> </div>
            
            <div class="profile-title text-center p-t-20 p-b-20">
            	<p class="muted no-margin p-t-10"><?php print render($content['field_title'][0]['#markup']);?></p>
                <h2 <?php print $title_attributes; ?>><a href="<?php print $node_url; ?>" class="semi-bold" property="url"><span property="name"><?php print $title; ?></span></a></h2>
                <h4 class="profile-sub-title">
                    <span class="semi-bold" property="affiliation" typeof="Organization"><span property="name"><?php print render($content['field_aday_party'][0]['#markup']); ?></span></span>
                    <span class="semi-bold"><?php print render($content['field_aday_city'][0]['#markup']); ?></span>
                    <span  property="jobTitle">Milletvekili <?php print render($content['field_status'][0]['#markup']); ?></span>
                </h4>
                <?php if(isset($content['field_slogan'])){?>
                	<h5 class="text-center b-t b-grey p-all-10 m-r-30 m-l-30"><em><?php print render($content['field_slogan'][0]['#markup']); ?></em></h5>
                <?php }?>
            </div>
            
        </div>
        
        <div class="grid simple z-depth-1 profile-contact">
            <div class="tiles white rounded-b-2 rounded-t-2">
                <table class="table no-margin table-no-border">
					<tr>
						<td class="col-md-6 col-xs-5" style="vertical-align: middle;">
							Sosyal Medya ve İletişim Bilgileri:
						</td>
						<td>
							<?php if(empty($fb)){?>
							<a class="profile-links fb" href="#" title="Adayın Facebook adresi bulunmuyor." data-toggle="tooltip" data-placement="top">
								<i class="fa fa-facebook"></i>
							</a>
							<?php }else{?>
							<a class="profile-links fb active" href="<?php print $fb ?>" target="_blank" title="Adayın Facebook adresine git." data-toggle="tooltip" data-placement="top">
								<i class="fa fa-facebook"></i>
							</a>
							<?php }?>
							
							<?php if(empty($twitter)){?>
							<a class="profile-links twitter" href="#" title="Adayın Twitter adresi bulunmuyor." data-toggle="tooltip" data-placement="top">
								<i class="fa fa-twitter"></i>
							</a>
							<?php }else{?>
							<a class="profile-links twitter active" href="<?php print $twitter ?>" target="_blank" title="Adayın Facebook adresine git." data-toggle="tooltip" data-placement="top">
								<i class="fa fa-twitter"></i>
							</a>
							<?php }?>
														
							<?php if(empty($youtube)){?>
							<a class="profile-links youtube" href="#" title="Adayın YouTube adresi bulunmuyor." data-toggle="tooltip" data-placement="top">
								<i class="fa fa-youtube"></i>
							</a>
							<?php }else{?>
							<a class="profile-links youtube active" href="<?php print $youtube ?>" target="_blank" title="Adayın YouTube adresine git." data-toggle="tooltip" data-placement="top">
								<i class="fa fa-youtube"></i>
							</a>
							<?php }?>
																					
							<?php if(empty($website)){?>
							<a class="profile-links website" href="#" title="Adayın websitesi bulunmuyor." data-toggle="tooltip" data-placement="top">
								<i class="fa fa-globe"></i>
							</a>
							<?php }else{?>
							<a class="profile-links website active" href="<?php print $website ?>" target="_blank" title="Adayın websitesine git." data-toggle="tooltip" data-placement="top" property="sameAs">
								<i class="fa fa-globe"></i>
							</a>
							<?php }?>
						</td>
					</tr>
                </table>
            </div>
        </div>
        
        <div class="grid simple z-depth-1 profile-cv">
            <div class="tiles grey p-t-10 p-b-10 p-l-20 rounded-t-2">
              <h4 class="text-green"><i class="fa fa-user fa-1x"></i> HAKKINDA</h4>
            </div>
            <div class="tiles white p-all-20 rounded-b-2">
                <h5 class="semi-bold">Özgeçmiş:</h5>
                <div property="description">
                <?php
                	if(empty($body[0]['value']))
					{
						print '<p class="muted small-text">Adayın özgeçmiş bilgisi bulunmuyor.</p>';
					}
					else {
						print render($body[0]['value']); 
					} 
                	
                ?>
                </div>
                <div class="p-t-5 p-b-5"><hr/></div>
                <h5 class="semi-bold">Geçmiş Görevler:</h5>
                <?php print render($content['field_duties'][0]['#markup']); ?>
            </div>
        </div>
        
        <div class="grid simple z-depth-1 profile-comments">
            <div class="tiles grey p-t-10 p-b-10 p-l-20 rounded-t-2">
              <h4 class="text-green"><i class="fa fa-comments-o fa-1x"></i> YORUMLAR</h4>
            </div>
            <div class="tiles white p-all-20 rounded-b-2">
              <?php print render($content['disqus']); ?>
            </div>
        </div>
        
        <div class="m-t-30 muted x-small-text">
			Aday İstatistikleri: 
        	<?php
            print views_embed_view('aday_stats', 'block_2',$node->nid); 
            ?>	
        </div>
        
    </div>
    
    <div id="col-right-profile" class="col-md-4 col-xs-12 col-right"> 
        
        <div class="adbox no-padding z-depth-1 m-b-20" style="margin-left: -5px; margin-right: -5px;">
			<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
			<ins class="adsbygoogle"
			     style="display:inline-block;width:300px;height:250px"
			     data-ad-client="ca-pub-6110380568008517"
			     data-ad-slot="6102378740"></ins>
			<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
			</script>
        </div>
        
        <div class="row m-b-10">
            <?php
            print views_embed_view('aday_stats', 'block_1',$node->nid); 
            ?>
        </div>
       	<div class="row m-b-20">
           <div class="col-md-12 col-xs-12">
           	<div>
           	<?php
           		print render($content['rate_aday_like']['#markup']);
           	?>
           	</div>
           </div>
        </div>
		
		<div id="social-share" class="grid simple horizontal red z-depth-1 m-b-20">
	        <div class="grid-title no-border rounded-t-2">
	          <h4 class="no-margin all-caps">ADAY PROFİLİ <span class="semi-bold ">PAYLAŞ</span></h4>
	        </div>
	        <div class="grid-body no-border rounded-b-2">
	           <?php print render($content['easy_social_1']); ?>
	        </div>
	    </div>
	    
		<div id="similar-aday" class="grid simple horizontal red z-depth-1 m-b-20">
	        <div class="grid-title no-border rounded-t-2">
	          <h4 class="no-margin all-caps"><span class="semi-bold">RAKİP</span> ADAYLAR</h4>
	        </div>
	        <div class="grid-body no-border rounded-b-2">
	        	<?php print views_embed_view('city_adaylar', 'block_1',$city); ?>
	        </div>
	    </div>
        
    </div>

</div>
<?php }?>