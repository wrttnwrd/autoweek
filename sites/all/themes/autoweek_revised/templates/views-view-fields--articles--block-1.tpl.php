<?php
foreach($fields as $key=>$field) {
    if($field->class=='title') $title = strip_tags($field->content);
    if($field->class=='aw-image-img') $img = strip_tags($field->content,"<img>");
    if($field->class=='aw-article-primary-tag') $tag = strip_tags($field->content);
    if($field->class=='nid') $nid = strip_tags($field->content);
    if($field->class=='created') $date = strip_tags($field->content);
}?>
<div>
    <div class="excerpt">
        <?php if($img!='') { ?>
            <a href="/<?php echo drupal_get_path_alias('node/'.$nid);?>" class="img-wrap"><?php echo $img;?></a>
        <?php }?>
        <h2><?php echo $tag;?></h2>
        <p><?php echo $title?></p>
    </div>
    <div class="clear"></div>
 </div>