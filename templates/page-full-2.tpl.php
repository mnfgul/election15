<?php include_once('header.tpl.php');?>

<div id="content" class="page-content p-t-40 p-b-30">
    <div id="content-wrapper" class="container">
        
        <div class="row">
            
			<div id="page">
				  <div class="element-invisible"><a id="main-content"></a></div>
				  <?php if ($page['help']): ?>
					<div id="help">
					  <?php print render($page['help']); ?>
					</div>
				  <?php endif; ?>
				
				<?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
				
				<?php print render($page['content']); ?>
			</div>
        </div>
        
    </div>
</div>    

<?php include_once('footer.tpl.php');?>
