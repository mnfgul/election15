<?php include_once('templates/header.tpl.php');?>

<div class="container">
    <div class="row m-t-15">
        <div class="col-md-8">
            <?php print $breadcrumb; ?>
        </div>
        <div class="col-md-4">
            <?php if ($tabs): ?>
            <div class="tabs clearfix">
            <?php print render($tabs); ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<div id="content" class="page-content p-t-20 p-b-30">
    <div id="content-wrapper" class="container">
        
        <div class="row">
            <div id="col-left" class="col-md-8 col-xs-12">
                
              <div id="page">
                <div id="content" class="clearfix">
                  <div class="element-invisible"><a id="main-content"></a></div>
                  <?php if ($page['help']): ?>
                    <div id="help">
                      <?php print render($page['help']); ?>
                    </div>
                  <?php endif; ?>
                <?php if ($tabs): ?>
                    <div class="tabs">
                        <?php print render($tabs); ?>
                    </div>
                <?php endif; ?>
                <?php if ($action_links): ?><ul class="nav nav-pills"><?php print render($action_links); ?></ul><?php endif; ?>
                
                <div id="" class="tiles-container simple z-depth-1 m-b-20">
                    <div class="tiles grey p-t-15 p-b-15 p-l-25 rounded-t-2">
                      <h4 class="text-black"><span class="semi-bold all-caps"><?php print $title;?></span></h4>
                    </div>
                    <div class="tiles white p-r-15 p-l-15 p-b-25 p-t-15 rounded-b-2">
                        <div>
                            <?php print render($page['content']); ?>
                        </div>
                    </div>
                </div>
                    
                </div>
              </div>
                
            </div>
            <div id="col-right" class="col-md-4 col-xs-12">
                <?php print render($page['sidebar_second']); ?>
            </div>
        </div>
           
    </div>
</div> 

<?php include_once('templates/footer.tpl.php');?>
