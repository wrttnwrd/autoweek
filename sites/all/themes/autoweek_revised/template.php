<?php



function autoweek_revised_preprocess_html(&$vars) {

  $body_classes = array($vars['body_classes']);

  if(drupal_is_front_page())
    $vars['classes_array'][] = 'home';
    elseif(in_array('node-type-aw-article',$vars['classes_array'])) {
        $vars['classes_array'][] = 'article';  
    }

}