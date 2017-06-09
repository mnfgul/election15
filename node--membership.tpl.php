<?php 
$type = 'silver';
if($node->nid == 554) $type = 'silver';
if($node->nid == 555) $type = 'gold';
if($node->nid == 556) $type = 'platinum';

/*Set Price*/
$price = 0;
if(isset($content['product:commerce_price'][0]))
{
	$price = intval($content['product:commerce_price'][0]["#markup"])/100;
	$price .= ' <i class="fa fa-try"></i>';
}else{
	$price = "Ücretsiz";
}

?>
<?php if($teaser){?>
<div id="n-teaser-<?php print $node->nid; ?>" class="<?php print $classes; ?> membership-<?php print $type; ?> membership clearfix z-depth-1 tiles rounded-t-3 rounded-b-3">
	<div class="">
		<h4<?php print $title_attributes; ?> class="title text-center"><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h4>
	  	<div class="price-box">
			<div class="icon pull-right b-all">
				
			</div>
			<?php if($type == 'silver'){?>
			<span class="muted starting"></span>
			<div class="price text-black"><?php print $price; ?></div>
			<?php }else{?>
			<span class="muted starting">Sadece</span>
			<div class="price text-black"><?php print $price; ?></div>
			<?php }?>
			
	  	</div>
		<div class="membership-content">
			<?php print render($content['body'][0]); ?>
		</div>
		<div class="bottom-box">
			<?php if($type == 'silver'){?>
			<a href="<?php print base_path();?>node/add/aday" class="btn btn-default"><i class="fa fa-plus after"></i>&nbsp;&nbsp;&nbsp;&nbsp;Aday Ekle</a>
			<?php }else{?>
			<a class="btn btn-default btn-large" href="<?php print $node_url; ?>" title="Üyeliği satın al">Satın Al</a>
			<?php }?>
			
		</div>
	</div>
</div>

<?php } else{?>
<div class="col-md-6 col-md-offset-3">
<div id="n-full-<?php print $node->nid; ?>" class="<?php print $classes; ?> membership-<?php print $type; ?> membership tiles white m-t-10 z-depth-1 tiles rounded-t-3 rounded-b-3">
	<div class="text-dark">
		<h4<?php print $title_attributes; ?> class="title text-center"><a href="<?php print $node_url; ?>"><?php print $title; ?> Satın Al</a></h4>
	  	<div class="price-box b-b b-grey">
			<div class="icon pull-right b-all">
				<span class="livicon" data-n="shopping-cart" data-s="32" data-c="#1e1e1e" data-hc="0"></span>
			</div>
			<?php if($type == 'silver'){?>
			<span class="muted starting"></span>
			<div class="price text-black"><?php print $price; ?></div>
			<?php }else{?>
			<span class="muted starting">Sadece</span>
			<div class="price text-black"><?php print $price; ?></div>
			<?php }?>
			
	  	</div>
		<div class="membership-cart p-all-20 m-b-50 b-b b-grey">
			<?php print render($content['field_product']); ?>
		</div>
		<div class="membership-content p-b-30 small-text">
			<h5 class="no-margin p-l-20">Üyelik Detayları:</h5>
			<?php print render($content['body'][0]); ?>
		</div>
	</div>
</div>
</div>

<?php }?>