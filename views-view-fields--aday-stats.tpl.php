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

 <?php foreach ($fields as $id => $field): ?>
 <?php print $id; ?>
<?php endforeach; ?>

 * disqus_comment_count
 * totalcount

 * 
 * 
 * @ingroup views_templates
 */
?>

<div class="profile-stats">
	
	<div class="col-md-4 col-xs-4 p-r-5">
		<div class="tiles green z-depth-1 rounded-t-2 rounded-b-2">
			<h4 class="text-white text-center">
	            <i class="fa fa-eye fa-2x"></i><br/>
	            <span class="semi-bold"><?php print $fields['totalcount']->content; ?></span><br/>
	            <span class="muted x-small-text text-center">Görüntüleme</span>
	        </h4>
		</div>
	</div>
	
	<div class="col-md-4 col-xs-4 p-l-10 p-r-10">
		<div class="tiles purple z-depth-1 rounded-t-2 rounded-b-2">
			<h4 class="text-white text-center">
	            <i class="fa fa-comment-o fa-2x "></i><br/>
	            <span class="semi-bold"><?php print $fields['disqus_comment_count']->content; ?></span><br/>
	            <span class="muted x-small-text text-center">Yorum</span>
	        </h4>
		</div>
	</div>
	
	<div class="col-md-4 col-xs-4 p-l-5">
		<div class="tiles blue z-depth-1 rounded-t-2 rounded-b-2">
			<h4 class="text-white text-center">
	            <i class="fa fa-thumbs-o-up fa-2x"></i><br/>
	            <span class="semi-bold"><?php print $fields['value']->content; ?></span><br/>
	            <span class="muted x-small-text text-center">Destek</span>
	        </h4>
		</div>
	</div>
</div>