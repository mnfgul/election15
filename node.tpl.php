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
        <?php
            $party = $content['field_aday_party'][0]['#markup'];
            $clean = strtolower(str_replace(' ', '-', $party));
            $clean = preg_replace('/[^A-Za-z0-9\-]/', '', $clean);
        ?>
        <a href="#" class="party-logo party-<?php print $clean; ?>"><?php print $party; ?></a>
    </div>
</div>

<?php } else{?>
<div id="n-<?php print $node->nid; ?>" class="<?php print $classes; ?>">
  <?php print render($title_prefix); ?>
  <?php if (!$page): ?>
    <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>

  <?php if ($display_submitted): ?>
    <span class="submitted"><?php print $submitted ?></span>
  <?php endif; ?>

  <div class="clearfix"<?php print $content_attributes; ?>>
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      print render($content);
    //print_r($content);
    ?>
  </div>

</div>
<?php } ?>


