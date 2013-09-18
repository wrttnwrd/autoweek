<?php print render($title_prefix); ?>
  <?php if ($title): ?>
    <?php print $title; ?>
  <?php endif; ?>
  <?php print render($title_suffix); ?>
<article class="story feed popular">

        <h3>Today's Popular</h3>

        <div class="content"> 
            <?php echo $rows;?>
        </div>

</article>
<div class="clear"></div>