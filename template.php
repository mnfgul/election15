<?php

/*--------------------------------- HTML Head -------------------------------------*/
function secimin_preprocess_html(&$vars) {
	 
	/*Meta tags*/
	$viewport = array('#tag' => 'meta', 
	'#attributes' => array('name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, user-scalable = no', ), );
	drupal_add_html_head($viewport, 'viewport');
	
	/*Google Site verification*/
	$googletag = array('#tag' => 'meta', '#type' => 'html_tag',
		'#attributes' => array('name' => 'google-site-verification', 'content' => '3W-v2OK813-FV4ERQaP1eo7aTI8XA4haE74B-0IbTW8')
		);
	drupal_add_html_head($googletag, 'google_webmasters_verification');
	
	/*Chrome tag*/
	$xua = array('#tag' => 'meta', '#type' => 'html_tag',
		'#attributes' => array('http-equiv' => 'X-UA-Compatible', 'content' => 'IE=edge,chrome=1')
		);
	drupal_add_html_head($xua, 'html_tag');
	
	// Add conditional CSS for IE8 and below.
	drupal_add_css(path_to_theme() . '/ie.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'lte IE 8', '!IE' => FALSE), 'weight' => 999, 'preprocess' => FALSE));
	// Add conditional CSS for IE7 and below.
	drupal_add_css(path_to_theme() . '/ie7.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'lte IE 7', '!IE' => FALSE), 'weight' => 999, 'preprocess' => FALSE));
	// Add conditional CSS for IE6.
	drupal_add_css(path_to_theme() . '/ie6.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'lte IE 6', '!IE' => FALSE), 'weight' => 999, 'preprocess' => FALSE));
}

 


/*--------------------------------- Breadcrumbs -------------------------------------*/
/* Put Breadcrumbs in a ul li structure */
function secimin_breadcrumb($variables) {
    $breadcrumb = $variables['breadcrumb'];
    $crumbs = "";
    if (!empty($breadcrumb)) {
        $crumbs = '<ul class="breadcrumb no-margin">';

        foreach($breadcrumb as $value) {
           $crumbs .= '<li>'.$value.'</li>';
      }
      $crumbs .= '</ul>';
    }
    return $crumbs;
}


/*--------------------------------- Image Preprocessor ------------------------------*/
function secimin_preprocess_image(&$variables)
{
    $variables['attributes'] = array(
        'property' => 'image',
    );
}

/*---------------------------- Page Specific Themes --------------------------------*/
function secimin_theme() 
{
  $items = array();
    
  $items['user_login'] = array(
    'render element' => 'form',
    'path' => drupal_get_path('theme', 'secimin') . '/templates',
    'template' => 'user-login',
    'preprocess functions' => array(
       'secimin_preprocess_user_login'
    ),
  );
  $items['user_register_form'] = array(
    'render element' => 'form',
    'path' => drupal_get_path('theme', 'secimin') . '/templates',
    'template' => 'user-register-form',
    'preprocess functions' => array(
      'secimin_preprocess_user_register_form'
    ),
  );
  $items['user_pass'] = array(
    'render element' => 'form',
    'path' => drupal_get_path('theme', 'secimin') . '/templates',
    'template' => 'user-pass',
    'preprocess functions' => array(
      'secimin_preprocess_user_pass'
    ),
  );
  return $items;
}

function secimin_preprocess_user_login(&$vars) {
    
}

function secimin_preprocess_user_register_form(&$vars) {
    $args = func_get_args();
    array_shift($args);
    $form_state['build_info']['args'] = $args; 
    $vars['form'] = drupal_build_form('user_register_form', $form_state['build_info']['args']);
    
}

function secimin_preprocess_user_pass(&$vars) {
    
}

/*-------------------------------- Alter Forms -------------------------------------------*/
// FORMS: Switch _hook for different cases defined with field array key $form_id

function secimin_form_alter(&$form, &$form_state, $form_id) {

  switch ($form_id) {
    case 'user_register_form':
      //$form['account']['name']['#title'] = t('Username:');
      $form['account']['name']['#description'] = t('');
      //$form['account']['mail']['#title'] = t('Email Address:');
      $form['account']['mail']['#description'] = t('');
      
      $form['actions']['submit']['#value'] = t('Register');
      $form['actions']['submit']['#attributes']['class'][] = 'btn btn-success btn-block btn-large all-caps';
    break;
    
    case 'user_pass':      
      $form['actions']['submit']['#attributes']['class'][] = 'btn btn-success btn-block btn-large all-caps';
    break;
      
    case 'user_login_form':
    case 'user_login_block':
    case 'user_login':
      $form['name'] = array(
        '#type' => 'textfield', 
        '#title' => t('Email:'),
        '#description' => t(''),
        '#maxlength' => USERNAME_MAX_LENGTH, 
        '#size' => 15, 
        '#required' => TRUE,
      );
      $form['pass'] = array(
        '#type' => 'password', 
        '#title' => t('Password:'),
        '#description' => t(''),        
        '#maxlength' => 60, 
        '#size' => 15, 
        '#required' => TRUE,
      );
      $form['actions']['submit'] = array(
        '#type' => 'submit', 
        '#attributes' => array(
            'class' => array('btn btn-primary btn-block btn-large all-caps')
        ),
        '#value' => t('Log In')
      );
      
      $items = array();    // Create Account & Forgotten Password
      $form['links'] = array(
        array('#markup' => theme('item_list', array('items' => $items))),
        '#weight' => 0,
      );            
	break;
	
	case 'commerce_cart_add_to_cart_form_1':
	case 'commerce_cart_add_to_cart_form_2':
	{
		$form['submit']['#attributes'] = array('class' => array('btn btn-primary btn-large all-caps m-t-20'));
	}break;
	
	case 'poll_view_voting':
	{
		print_r($form);
	}break;
		
		
	  
  }
}


/*------------------------------------- Page Preprocessor -----------------------------------------*/
/**
 * Override or insert variables into the page template.
 */
function secimin_preprocess_page(&$vars) {
    
    /*Need to check*/
    $vars['primary_local_tasks'] = $vars['tabs'];
    unset($vars['primary_local_tasks']['#secondary']);
    $vars['secondary_local_tasks'] = array(
    '#theme' => 'menu_local_tasks',
    '#secondary' => $vars['tabs']['#secondary'],
    );
    
	
	/*Enable Content Type Specific Page.tpl */
	if (isset($vars['node']->type)) {
    	// If the content type's machine name is "my_machine_name" the file
    	// name will be "page--my-machine-name.tpl.php".
    	$vars['theme_hook_suggestions'][] = 'page__' . $vars['node']->type;
  	}
	
    /*Users forms title fixes*/
    if (arg(0) == 'user')
    {
        switch (arg(1)) {
          case NULL:
            if (!user_is_logged_in()) drupal_set_title(t('Log in'));
            break;
          case 'register':
            drupal_set_title(t('Register'));
            break;
          case 'password':
            drupal_set_title(t('Request new password'));
            break;
          case 'login':
            drupal_set_title(t('Log in'));
            break;
        }
    }
    if(arg(0) == 'users')
    {
        drupal_set_title(t('Log in'));
    }
    
}

/*------------------------- Tabs ---------------------------------------------------------------*/
function secimin_menu_local_tasks(&$variables) {
  $output = '';
    
  if (!empty($variables['primary'])) {
    $variables['primary']['#prefix'] = '<div class="btn-group pull-right">
    <button type="button" class="btn btn-primary dropdown-toggle btn-small" data-toggle="dropdown" aria-expanded="false"> <span class="fa fa-edit"> </span>  '.t('Page Actions').' <span class="caret"> </span></button>';
    $variables['primary']['#prefix'] .= '<ul class="dropdown-menu" role="menu">';
    $variables['primary']['#suffix'] = '</ul></div>';
    $output .= drupal_render($variables['primary']);
    /*
    $variables['primary']['#prefix'] = '<h2 class="element-invisible hide">' . t('Primary tabs') . '</h2>';
    $variables['primary']['#prefix'] .= '<ul class="nav nav-pills">';
    $variables['primary']['#suffix'] = '</ul>';
    $output .= drupal_render($variables['primary']);
    */
  }
  if (!empty($variables['secondary'])) {
    $variables['secondary']['#prefix'] = '<h2 class="element-invisible hide">' . t('Secondary tabs') . '</h2>';
    $variables['secondary']['#prefix'] .= '<ul class="tabs secondary">';
    $variables['secondary']['#suffix'] = '</ul>';
    $output .= drupal_render($variables['secondary']);
  }

  return $output;
}


/*------------------------------------ Message Box -----------------------------------------------------------*/
function secimin_status_messages($variables) {
  $display = $variables['display'];
  $output = '';

  $status_heading = array(
    'status' => t('Status message'),
    'error' => t('Error message'),
    'warning' => t('Warning message'),
  );
  foreach (drupal_get_messages($display) as $type => $messages) 
  {
    if($type == 'status') $type = 'info';
    $output .= "<div class=\"alert alert-$type\"><div class=\"p-t-15 p-b-15 container \"><button class=\"close\" data-dismiss=\"alert\"></button>\n";
    if (!empty($status_heading[$type])) {
      $output .= '<h2 class="element-invisible">' . $status_heading[$type] . "</h2>\n";
    }
    if (count($messages) > 1) {
      $output .= " <ul>\n";
      foreach ($messages as $message) {
        $output .= '  <li>' . $message . "</li>\n";
      }
      $output .= " </ul>\n";
    }
    else {
      $output .= $messages[0];
    }
    $output .= "</div></div>\n";
  }
  return $output;
}


/*------------------------------------- Form Elements --------------------------------------------------------*/
function secimin_form_element($variables) {
  $element = &$variables['element'];

  // This function is invoked as theme wrapper, but the rendered form element
  // may not necessarily have been processed by form_builder().
  $element += array(
    '#title_display' => 'before',
  );

  // Add element #id for #type 'item'.
  if (isset($element['#markup']) && !empty($element['#id'])) {
    $attributes['id'] = $element['#id'];
  }
  // Add element's #type and #name as class to aid with JS/CSS selectors.
  $attributes['class'] = array('form-item');
  if (!empty($element['#type'])) {
    $attributes['class'][] = 'form-type-' . strtr($element['#type'], '_', '-');
  }
  if (!empty($element['#name'])) {
    $attributes['class'][] = 'form-item-' . strtr($element['#name'], array(' ' => '-', '_' => '-', '[' => '-', ']' => ''));
  }
  // Add a class for disabled elements to facilitate cross-browser styling.
  if (!empty($element['#attributes']['disabled'])) {
    $attributes['class'][] = 'form-disabled';
  }
    
    //set description var
    $desc = '';
    if (!empty($element['#description'])) {
        $desc = $element['#description'];
		$element['#description'] = "";
    }
    //$output = '<div' . drupal_attributes($attributes) . ' data-toggle="tooltip" data-placement="top" title="'.$desc.'">' . "\n";
	$output = ' ';
	
  // If #title is not set, we don't display any label or required marker.
  if (!isset($element['#title'])) {
    $element['#title_display'] = 'none';
  }
  $prefix = isset($element['#field_prefix']) ? '<span class="field-prefix">' . $element['#field_prefix'] . '</span> ' : '';
  $suffix = isset($element['#field_suffix']) ? ' <span class="field-suffix">' . $element['#field_suffix'] . '</span>' : '';

  switch ($element['#title_display']) {
    case 'before':
    case 'invisible':
      $output .= ' ' . theme('form_element_label', $variables);
      $output .= ' ' . $prefix . $element['#children'] . $suffix . "\n";
      break;

    case 'after':
      $output .= ' ' . $prefix . $element['#children'] . $suffix;
      $output .= ' ' . theme('form_element_label', $variables) . "\n";
      break;

    case 'none':
    case 'attribute':
      // Output no label and no required marker, only the children.
      $output .= ' ' . $prefix . $element['#children'] . $suffix . "\n";
      break;
  }

  if (!empty($element['#description'])) {
    //$output .= '<div class="description">' . $element['#description'] . "</div>\n";
  }

  //$output .= "</div>\n";
 
  return $output;
}


/*------------------------------------ Commerce REview --------------------------------------------------------*/
function secimin_commerce_checkout_review($variables) {
  $form = $variables['form'];

  // Turn the review data array into table rows.
  $rows = array();

  foreach ($form['#data'] as $pane_id => $data) {
    // First add a row for the title.
    $rows[] = array(
      'data' => array(
        array(
          'data' => $data['title'],
          'colspan' => 2,
        ),
      ), 
      'class' => array('pane-title', 'odd'),
    );

    // Next, add the data for this particular section.
    if (is_array($data['data'])) {
      // If it's an array, treat each key / value pair as a 2 column row.
      foreach ($data['data'] as $key => $value) {
        $rows[] = array(
          'data' => array(
            array(
              'data' => $key . ':',
              'class' => array('pane-data-key'),
            ),
            array(
              'data' => $value,
              'class' => array('pane-data-value'),
            ),
          ), 
          'class' => array('pane-data', 'even'),
        );
      }
    }
    else {
      // Otherwise treat it as a block of text in its own row.
      $rows[] = array(
        'data' => array(
          array(
            'data' => $data['data'],
            'colspan' => 2,
            'class' => array('pane-data-full'),
          ),
        ), 
        'class' => array('pane-data', 'even'),
      );
    }
  }

  return theme('table', array('rows' => $rows, 'attributes' => array('class' => array('checkout-review', 'table'))));
}




/**
 * Override or insert variables into the maintenance page template.
 */
function Secimin_preprocess_maintenance_page(&$vars) {
  // While markup for normal pages is split into page.tpl.php and html.tpl.php,
  // the markup for the maintenance page is all in the single
  // maintenance-page.tpl.php template. So, to have what's done in
  // seven_preprocess_html() also happen on the maintenance page, it has to be
  // called here.
  //seven_preprocess_html($vars);
}


/**
 * Display the list of available node types for node creation.
 */
function secim_node_add_list($variables) {
  $content = $variables['content'];
  $output = '';
  if ($content) {
    $output = '<ul class="admin-list">';
    foreach ($content as $item) {
      $output .= '<li class="clearfix">';
      $output .= '<span class="label">' . l($item['title'], $item['href'], $item['localized_options']) . '</span>';
      $output .= '<div class="description">' . filter_xss_admin($item['description']) . '</div>';
      $output .= '</li>';
    }
    $output .= '</ul>';
  }
  else {
    $output = '<p>' . t('You have not created any content types yet. Go to the <a href="@create-content">content type creation page</a> to add a new content type.', array('@create-content' => url('admin/structure/types/add'))) . '</p>';
  }
  return $output;
}

/**
 * Overrides theme_admin_block_content().
 *
 * Use unordered list markup in both compact and extended mode.
 */
function secim_admin_block_content($variables) {
  $content = $variables['content'];
  $output = '';
  if (!empty($content)) {
    $output = system_admin_compact_mode() ? '<ul class="admin-list compact">' : '<ul class="admin-list">';
    foreach ($content as $item) {
      $output .= '<li class="leaf">';
      $output .= l($item['title'], $item['href'], $item['localized_options']);
      if (isset($item['description']) && !system_admin_compact_mode()) {
        $output .= '<div class="description">' . filter_xss_admin($item['description']) . '</div>';
      }
      $output .= '</li>';
    }
    $output .= '</ul>';
  }
  return $output;
}

/**
 * Override of theme_tablesort_indicator().
 *
 * Use our own image versions, so they show up as black and not gray on gray.
 */
function secim_tablesort_indicator($variables) {
  $style = $variables['style'];
  $theme_path = drupal_get_path('theme', 'seven');
  if ($style == 'asc') {
    return theme('image', array('path' => $theme_path . '/images/arrow-asc.png', 'alt' => t('sort ascending'), 'width' => 13, 'height' => 13, 'title' => t('sort ascending')));
  }
  else {
    return theme('image', array('path' => $theme_path . '/images/arrow-desc.png', 'alt' => t('sort descending'), 'width' => 13, 'height' => 13, 'title' => t('sort descending')));
  }
}

/**
 * Implements hook_css_alter().
 */
function secim_css_alter(&$css) {
  // Use Seven's vertical tabs style instead of the default one.
  if (isset($css['misc/vertical-tabs.css'])) {
    $css['misc/vertical-tabs.css']['data'] = drupal_get_path('theme', 'seven') . '/vertical-tabs.css';
    $css['misc/vertical-tabs.css']['type'] = 'file';
  }
  if (isset($css['misc/vertical-tabs-rtl.css'])) {
    $css['misc/vertical-tabs-rtl.css']['data'] = drupal_get_path('theme', 'seven') . '/vertical-tabs-rtl.css';
    $css['misc/vertical-tabs-rtl.css']['type'] = 'file';
  }
  // Use Seven's jQuery UI theme style instead of the default one.
  if (isset($css['misc/ui/jquery.ui.theme.css'])) {
    $css['misc/ui/jquery.ui.theme.css']['data'] = drupal_get_path('theme', 'seven') . '/jquery.ui.theme.css';
    $css['misc/ui/jquery.ui.theme.css']['type'] = 'file';
  }
}


/*--------------------------------------- Poll ------------------------------------------------*/
function secimin_preprocess_poll_vote(&$vars)
{
	
}
