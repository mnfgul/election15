<?php if($teaser){?>


<?php } else{?>
<div id="n-<?php print $node->nid; ?>" class="<?php print $classes; ?>">
  <?php print render($title_prefix); ?>
  <?php if (!$page): ?>
    <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>

  <div class="clearfix"<?php print $content_attributes; ?>>
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      print render($content);
    ?>
  </div>
  
	<div>
		<a class="hastags" href="/poll" title="Tum Anketler">Tüm Anketler</a>	
	</div>
</div>
<?php } ?>


