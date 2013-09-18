<?php

global $base_url;

foreach($fields as $key=>$field) {
    if($field->class=='title') $title = $field->content;

    if($field->class=='aw-article-primary-tag') $tag = strip_tags($field->content);
    if($field->class=='nid') $nid = strip_tags($field->content);
    
    if($field->class=='aw-article-secondary-tag') $tag2 = strip_tags($field->content);
    
}

?>


 <li><a href="<?php echo $base_url; ?>/<?php echo drupal_get_path_alias('node/'.$nid);?>"><?php echo $tag2; ?></a> <?php echo $title; ?></li>