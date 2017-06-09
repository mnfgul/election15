<?php if($teaser){?>
<div id="n-teaser-<?php print $node->nid; ?>" class="<?php print $classes; ?> article-list-row row clearfix b-b b-grey p-t-10 p-b-10">
    <div class="media">
        <div class="media-left col-md-4 col-sm-4 col-xs-12">
            <div class="article-photo thumbnail">
                <?php print render($content['field_image'][0]); ?>
            </div>
        </div>
        <div class="media-body col-md-8 col-sm-8 col-xs-12">
            <h4 class="media-heading" <?php print $title_attributes; ?>>
                <a href="<?php print $node_url; ?>"><?php print $title; ?></a>
            </h4>
            <div class="content clearfix"<?php print $content_attributes; ?>>
                <?php
                  // We hide the comments and links now so that we can render them later.
                  hide($content['comments']);
                  hide($content['links']);
                  print render($content['body']);
                  
                ?>
            </div>
            <div class="node-footer muted small-text">
                <i class="fa fa-calendar-o"></i> <?php print date('d/m/Y',$created);?> |
                <?php print render($content['links']);?>
            </div>
        </div>
    </div>
</div>

<?php } else{?>
<div id="n-teaser-<?php print $node->nid; ?>" class="<?php print $classes; ?> article-full-page p-t-10 p-b-10">
    <div class="content clearfix"<?php print $content_attributes; ?>>
        <div class="article-photo thumbnail pull-left">
            <?php print render($content['field_image'][0]); ?>
        </div>
        <?php
          // We hide the comments and links now so that we can render them later.
          hide($content['comments']);
          hide($content['links']);
          print render($content['body']);

        ?>
    </div>
    <div class="node-footer muted small-text" style="display: none;">
        <i class="fa fa-calendar-o"></i> <?php print date('d/m/Y',$created);?> |
        <?php print render($content['links']);?>
    </div>
</div>
<?php } ?>

