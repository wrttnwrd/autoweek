<div class="grid">

    <div class="offset">
    <?php echo $rows;?>
    <div class="clear"></div>
    </div><!-- offset -->
</div><!-- grid -->

  <?php if ($more): ?>
    <?php print $more; ?>
  <?php endif; ?>
  <?php if ($pager): ?>
    <?php print $pager; ?>
  <?php endif; ?>