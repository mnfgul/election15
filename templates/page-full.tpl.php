<?php include_once('header.tpl.php');?>

<div id="content" class="page-content p-t-40 p-b-30">
    <div id="content-wrapper" class="container">
        
        <div class="row">
            
            <div class="col-md-12 col-xs-12 col-sm-12">
                
                <div id="page">
                      <div class="element-invisible"><a id="main-content"></a></div>
                      <?php if ($page['help']): ?>
                        <div id="help">
                          <?php print render($page['help']); ?>
                        </div>
                      <?php endif; ?>
                    
                    <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>

                    <div id="user-forms" class="tiles-container simple z-depth-1 m-b-20">
                        <div class="tiles grey p-t-10 p-b-10 p-l-25 rounded-t-2 b-b b-grey">
                          <h4 class="text-blue"><span class="semi-bold all-caps"><?php print $title;?></span></h4>
                        </div>
                        <div class="tiles white p-all-15 rounded-b-2">
                            <div>
                                <?php print render($page['content']); ?>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>

        </div>
        
    </div>
</div>    

<?php include_once('footer.tpl.php');?>
