<?php

drupal_add_js('var $ = jQuery.noConflict();','inline');
drupal_add_css('http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,700,700italic|Oswald:400,700,300');
drupal_add_js('var thisPage = "home";','inline');

echo render($page['pre_header']);?>

<?php echo render($page['header']);?>



<?php echo render($page['content']);?>

<div class="clear"></div>



 <?php echo render($page['primary_footer']);?>