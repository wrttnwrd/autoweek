<?php
foreach($fields as $key=>$field) {
    if($field->class=='title') $title = strip_tags($field->content);
    if($field->class=='aw-image-img') $img = strip_tags($field->content,"<img>");
    if($field->class=='aw-article-primary-tag') $tag = strip_tags($field->content);
    if($field->class=='nid') $nid = strip_tags($field->content);
    if($field->class=='created') $date = strip_tags($field->content);
}

global $randcounter1;
$randcounter1++;

?>
    <article class="story center">

        <?php if($img!='') { ?>
            <a href="/<?php echo drupal_get_path_alias('node/'.$nid);?>" class="img-wrap"><?php echo $img;?></a>
        <?php }?>

        <div class="excerpt">

            <h2><?php echo $tag;?></h2>
            <p><?php echo $title; echo $randcounter1;?></p>
                
				<span class="author">by <a href="#">Editors - <?php echo $date;?></a></span>
        </div>
        <div class="clear"></div>

    </article>

<?php 
        if($randcounter1 == 3)
            echo '<div class="clear"></div>';    
?>