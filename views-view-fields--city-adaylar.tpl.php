<?php

/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 <?php foreach ($fields as $id => $field): ?>
  <?php if (!empty($field->separator)): ?>
    <?php print $field->separator; ?>
  <?php endif; ?>

  <?php print $field->wrapper_prefix; ?>
    <?php print $field->label_html; ?>
    <?php print $field->content; ?>
  <?php print $field->wrapper_suffix; ?>
<?php endforeach; ?>
 
 * @ingroup views_templates
 */
?>
<?php
	$membership = '';
	if(isset($fields['term_node_tid_2']))
	{
		$membership = $fields['term_node_tid_2']->content;
		$membership = strtolower(str_replace(' ', '-', $membership));
		$membership = preg_replace('/[^A-Za-z0-9\-]/', '', $membership);
	}
?>
<div class="aday-list-row clearfix row b-b b-grey hover hover-highlight <?php print $membership.'-member'?>">
	<?php if(($membership != 'silver') && ($membership != '')){?>
	<a class="member-badge bg-grey" href="#" data-toggle="tooltip" data-placement="top" title="<?php print $fields['term_node_tid_2']->content?> Aday">
	<i class="fa fa-star text-yellow"></i>
	</a>
	<?php }?>
    <div class="col-profile-photo col-md-2 col-xs-2">
        <?php print $fields['field_photo']->content;?>
    </div>
    <div class="col-text col-md-6 col-xs-6">
        <h4><?php print $fields['title']->content;?></h4>
        <p><span class="semi-bold"><?php print $fields['term_node_tid']->content;?></span> Milletvekili <?php print $fields['term_node_tid_1']->content;?></span></p>
	</div>
    <div class="col-counter col-md-2 col-xs-2 p-t-10">
        <p class="text-center no-margin">
            <span class="large-text semi-bold label label-success" data-toggle="tooltip" data-placement="top" title="Görüntüleme Sayısı">
            	<?php print $fields['totalcount']->content;?>
            	<span class="fa fa-eye m-l-3 hide animated fadeIn show-on-hover"></span>
            </span><br/>
            <span class="x-small-text muted hide">Görüntüleme</span>
        </p>
    </div>
    <div class="col-party col-md-2 col-xs-3">
        <?php
            $party = $fields['term_node_tid']->content;
            $clean = strtolower(str_replace(' ', '-', $party));
            $clean = preg_replace('/[^A-Za-z0-9öğıÖĞIÇçüÜ\-]/', '-', $clean);
        ?>
        <a href="#" class="party-logo party-<?php print $clean; ?>" data-toggle="tooltip" data-placement="top" title="<?php print $party; ?>"><?php print $party; ?></a>
    </div>
</div>