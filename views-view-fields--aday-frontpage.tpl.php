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
<div class="aday-promoted-profile col-xs-6 col-sm-3 col-md-3 p-l-10 p-r-10 m-b-15">
    <div class="product rotationn">
        <div class="default z-depth-1 rounded-b-3">
            <div class="col-profile-photo tiles transparent">
              <?php print $fields['field_photo']->content;?>
            </div>
            <div class="col-text tiles white p-all-5 ">
                <h5 class="no-overflow text-center p-t-30 no-margin semi-bold"><?php print $fields['title']->content;?></h5>
                <p class="text-center">
                    <span class="semi-bold small-text"><?php print $fields['term_node_tid_1']->content;?></span><br/> 
                    <span class="muted small-text">Milletvekili <?php print $fields['field_status']->content;?></span>
                </p>
                 <?php
                $party = $fields['term_node_tid']->content;
                $clean = strtolower(str_replace(' ', '-', $party));
                $clean = preg_replace('/[^A-Za-z0-9\-]/', '', $clean);
                ?>
                <div class="party-logo-wrapper">
                    <a href="#" class="party-logo party-<?php print $clean; ?>"><?php print $party; ?></a>
                </div>
            </div>
        </div>
        <div class="product-hover z-depth-1 tiles bg-red rounded-t-3 rounded-b-3">
            <div class="tiles bg-red rounded-t-3 rounded-b-3 p-all-15">
                <p>Detay</p>
            </div>
        </div>
    </div>
</div>
