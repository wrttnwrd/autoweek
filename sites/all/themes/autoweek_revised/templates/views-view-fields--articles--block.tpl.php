<?php
foreach($fields as $key=>$field) {
    if($field->class=='title') $title = $field->content;
    if($field->class=='aw-image-img') $img = strip_tags($field->content,"<img>");
    if($field->class=='aw-article-primary-tag') $tag = strip_tags($field->content);
    if($field->class=='nid') $nid = strip_tags($field->content);
    if($field->class=='created') $date = strip_tags($field->content);
}?>
<article class="story center">
            <?php if($img!='') { ?>
                <a href="/<?php echo drupal_get_path_alias('node/'.$nid);?>" class="img-wrap"><?php echo $img;?></a>
            <?php }?>
            <div class="excerpt" style="position: absolute; top: 50%; margin-top: -23px;">
                <h2><?php echo $tag;?></h2>
                <p><?php echo strip_tags($title);?><span class="author">by <a href="#">Editors - <?php echo $date;?></a></span></p>
            </div>
            <div class="clear"></div>
</article>