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
 
 * @ingroup views_templates
 */
?>

<div class="city-list-row clearfix row b-b b-grey hover hover-highlight p-t-10 p-b-10" vocab="http://schema.org/" typeof="City">
    <div class="col-city-code col-md-2 col-xs-3">
        <span class="x-large-text city-code semi-bold"><?php print $fields['field_city_code']->content;?></span>
    </div>
    <div class="col-text col-md-8 col-xs-6">
        <h4 property="name"><?php print $fields['name']->content;?></h4>
    </div>
    <div class="col-counter col-md-2 col-xs-3">
        <p class="text-center no-margin" property="interactionCount">
            <span class="x-large-text semi-bold label label-success" data-toggle="tooltip" data-placement="top" title="Aday Profil Sayısı"> 
            	<?php print $fields['nid']->content;?>
            	<span class="fa fa-user m-l-5 hide animated bounce show-on-hover"></span>
            </span><br/>
            <span class="x-small-text muted hide">Aday Profil</span>
        </p>
    </div>
</div>