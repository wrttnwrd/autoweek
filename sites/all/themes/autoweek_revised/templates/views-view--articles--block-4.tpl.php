<?php print render($title_prefix); ?>
  <?php if ($title): ?>
    <?php print $title; ?>
  <?php endif; ?>
  <?php print render($title_suffix); ?>
<div class="grid">

    <div class="offset">
    <?php echo $rows;?>
    <div class="clear"></div>
    </div><!-- offset -->
</div><!-- grid -->