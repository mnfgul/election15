<?php 
$blockid = $block->module.'-'.$block->delta;
$adblocks = array('block-1');
?>
<?php if(in_array($blockid, $adblocks)){?>
	<div id="block-<?php print $blockid?>" class="block no-padding z-depth-1 m-b-15">
		<?php print $content ?>
	</div>
<?php }else{?>
<div id="block-<?php print $block->module .'-'. $block->delta; ?>" class="block block-<?php print $block->module ?> m-b-20">
    <div class="grid simple horizontal red z-depth-1">
        <?php if ($block->subject): ?>
        <div class="grid-title no-border rounded-t-2">
          <h4 class="no-margin"><span class="semi-bold all-caps"><?php print $block->subject ?></span></h4>
        </div>
        <?php endif;?>

        <div class="grid-body no-border rounded-b-2" style="padding: 15px;">
            <?php print $content ?>
        </div>
    </div>
</div>
<?php }?>