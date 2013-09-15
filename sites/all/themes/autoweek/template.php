<?php
/**
 * Tell Drupal 7 to look for a custom page template for each node type. 
 * ie: page--node--custom_node_type.tpl.php
 */
function autoweek_preprocess_page(&$vars, $hook) {
	//krumo($vars);
	if (isset($vars['node'])) {
		$suggest = "page__node__" . $vars['node']->type;
		//krumo($suggest);
		$vars['theme_hook_suggestions'][] = $suggest;
	}
	if (isset($vars['page']['#views_contextual_links_info']) && $vars['page']['#views_contextual_links_info']['views_ui']['view_name'] == "aggregation") {
		/*$variables['classes_array'][] = 'aggregation';
    	$variables['title_attributes_array']['class'][] = 'element-invisible';
    	$breadcrumb = false;*/
	}
}

/**
 * Add body classes if certain regions have content.
 */
function autoweek_preprocess_html(&$variables) {
	if (!empty($variables['page']['featured'])) {
	$variables['classes_array'][] = 'featured';
	}

	if (!empty($variables['page']['triptych_first'])
	|| !empty($variables['page']['triptych_middle'])
	|| !empty($variables['page']['triptych_last'])) {
	$variables['classes_array'][] = 'triptych';
	}

	if (!empty($variables['page']['footer_firstcolumn'])
	|| !empty($variables['page']['footer_secondcolumn'])
	|| !empty($variables['page']['footer_thirdcolumn'])
	|| !empty($variables['page']['footer_fourthcolumn'])) {
	$variables['classes_array'][] = 'footer-columns';
	}

	//krumo($variables);
	$node = menu_get_object();
	if (!empty($variables['is_front']) && $variables['is_front']) {
		$variables['classes_array'][] = 'home';
	} else if (!empty($node) && $node->type == "aw_article") {
		$variables['classes_array'][] = 'article';
	}
	
	if (isset($variables['page']['#views_contextual_links_info']) && $variables['page']['#views_contextual_links_info']['views_ui']['view_name'] == "aggregation") {
		$variables['classes_array'][] = 'aggregation';
		//$variables['title_attributes_array']['class'][] = 'element-invisible';
		//$breadcrumb = false;
	}

	// add js references to header on all pages
	drupal_add_js(path_to_theme() . '/js/vendor/modernizr-2.6.2.min.js');
	drupal_add_js('jQuery(document).ready(function () { var switchTo5x=true; });', 'inline');
	drupal_add_js('http://w.sharethis.com/button/buttons.js');

	// add css references to header on all pages
	drupal_add_css('http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,700,700italic|Oswald:400,700,300', array('group' => CSS_THEME, 'preprocess' => TRUE));

	// Add conditional stylesheets for IE
	drupal_add_css(path_to_theme() . '/css/ie.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'lte IE 7', '!IE' => FALSE), 'preprocess' => FALSE));
	drupal_add_css(path_to_theme() . '/css/ie6.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'IE 6', '!IE' => FALSE), 'preprocess' => FALSE));
}

/**
 * Override or insert variables into the page template for HTML output.
 */
function autoweek_process_html(&$variables) {
  // Hook into color.module.
  if (module_exists('color')) {
    _color_html_alter($variables);
  }
}

/**
 * Override or insert variables into the page template.
 */
function autoweek_process_page(&$variables) {
  // Hook into color.module.
  if (module_exists('color')) {
    _color_page_alter($variables);
  }
  // Always print the site name and slogan, but if they are toggled off, we'll
  // just hide them visually.
  $variables['hide_site_name']   = theme_get_setting('toggle_name') ? FALSE : TRUE;
  $variables['hide_site_slogan'] = theme_get_setting('toggle_slogan') ? FALSE : TRUE;
  if ($variables['hide_site_name']) {
    // If toggle_name is FALSE, the site_name will be empty, so we rebuild it.
    $variables['site_name'] = filter_xss_admin(variable_get('site_name', 'Drupal'));
  }
  if ($variables['hide_site_slogan']) {
    // If toggle_site_slogan is FALSE, the site_slogan will be empty, so we rebuild it.
    $variables['site_slogan'] = filter_xss_admin(variable_get('site_slogan', ''));
  }
  // Since the title and the shortcut link are both block level elements,
  // positioning them next to each other is much simpler with a wrapper div.
  if (!empty($variables['title_suffix']['add_or_remove_shortcut']) && $variables['title']) {
    // Add a wrapper div using the title_prefix and title_suffix render elements.
    $variables['title_prefix']['shortcut_wrapper'] = array(
      '#markup' => '<div class="shortcut-wrapper clearfix">',
      '#weight' => 100,
    );
    $variables['title_suffix']['shortcut_wrapper'] = array(
      '#markup' => '</div>',
      '#weight' => -99,
    );
    // Make sure the shortcut link is the first item in title_suffix.
    $variables['title_suffix']['add_or_remove_shortcut']['#weight'] = -100;
  }
}

/**
 * Implements hook_preprocess_maintenance_page().
 */
function autoweek_preprocess_maintenance_page(&$variables) {
  // By default, site_name is set to Drupal if no db connection is available
  // or during site installation. Setting site_name to an empty string makes
  // the site and update pages look cleaner.
  // @see template_preprocess_maintenance_page
  if (!$variables['db_is_active']) {
    $variables['site_name'] = '';
  }
  drupal_add_css(drupal_get_path('theme', 'autoweek') . '/css/maintenance-page.css');
}

/**
 * Override or insert variables into the maintenance page template.
 */
function autoweek_process_maintenance_page(&$variables) {
  // Always print the site name and slogan, but if they are toggled off, we'll
  // just hide them visually.
  $variables['hide_site_name']   = theme_get_setting('toggle_name') ? FALSE : TRUE;
  $variables['hide_site_slogan'] = theme_get_setting('toggle_slogan') ? FALSE : TRUE;
  if ($variables['hide_site_name']) {
    // If toggle_name is FALSE, the site_name will be empty, so we rebuild it.
    $variables['site_name'] = filter_xss_admin(variable_get('site_name', 'Drupal'));
  }
  if ($variables['hide_site_slogan']) {
    // If toggle_site_slogan is FALSE, the site_slogan will be empty, so we rebuild it.
    $variables['site_slogan'] = filter_xss_admin(variable_get('site_slogan', ''));
  }
}

/**
 * Override or insert variables into the node template.
 */
function autoweek_preprocess_node(&$variables) {
  if ($variables['view_mode'] == 'full' && node_is_page($variables['node'])) {
    $variables['classes_array'][] = 'node-full';
  }
}

/**
 * Override or insert variables into the block template.
 */
function autoweek_preprocess_block(&$variables) {
  // In the header region visually hide block titles.
  if ($variables['block']->region == 'header') {
    $variables['title_attributes_array']['class'][] = 'element-invisible';
  }
}

/**
 * Implements theme_menu_tree().
 */
function autoweek_menu_tree($variables) {
  return '<ul class="menu clearfix">' . $variables['tree'] . '</ul>';
}

/**
 * Implements theme_field__field_type().
 */
function autoweek_field__taxonomy_term_reference($variables) {
  $output = '';

  // Render the label, if it's not hidden.
  if (!$variables['label_hidden']) {
    $output .= '<h3 class="field-label">' . $variables['label'] . ': </h3>';
  }

  // Render the items.
  $output .= ($variables['element']['#label_display'] == 'inline') ? '<ul class="links inline">' : '<ul class="links">';
  foreach ($variables['items'] as $delta => $item) {
    $output .= '<li class="taxonomy-term-reference-' . $delta . '"' . $variables['item_attributes'][$delta] . '>' . drupal_render($item) . '</li>';
  }
  $output .= '</ul>';

  // Render the top-level DIV.
  $output = '<div class="' . $variables['classes'] . (!in_array('clearfix', $variables['classes_array']) ? ' clearfix' : '') . '"' . $variables['attributes'] .'>' . $output . '</div>';

  return $output;
}

function getArticleData($nid) {
	$article = node_load($nid);
	//krumo($article);
	$image_id = field_get_items('node', $article, 'aw_article_main_image')[0]["target_id"];
	if ($image_id) {
		$image = node_load($image_id)->aw_image_img[$article->language][0];
		$ret["image_alt"] = $image['alt'];
		$ret["image_url"] = file_create_url($image['uri']);
	}
	$ret["author"] = "Editors";
	$author = field_get_items('node', $article, 'aw_article_author_override')[0]["value"];
	if ($author) {
		$ret["author"] = $author;
	} else {
		//$author = field_get_items('node', $article, 'aw_article_author_ref')[0]["value"];
	}
	$ret["primary_tag"] = "Article";
	$ptag_id = field_get_items('node', $article, 'aw_article_primary_tag')[0]["tid"];
	if ($ptag_id) {
		$ret["primary_tag"] = taxonomy_term_load($ptag_id)->name;
	}
	$ret["title"] = $article->title;
	$ret["date"] = date("n/j/Y", $article->revision_timestamp);
	return $ret;
}

// functions that manipulate the custom field outputs for the Autoweek theme
include('template-field-functions.php');