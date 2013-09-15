<section class="footer">

    <?php if ($thisPage != "article-instaread") { ?>

    <article class="subscribe">
    <div class="wrap">
        <h3>Subscribe To Autoweek</h3>
        <div>
            <img src="<?php echo $template_path; ?>img/place-footer-01.png" alt="Subscribe" />
            <h4><a href="#">Printed Edition</a></h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
            <a class="btn" href="#">Subscribe Today</a>
        </div>
        <div>
            <img src="<?php echo $template_path; ?>img/place-footer-02.png" alt="Subscribe" />
            <h4><a href="#">Digital Subscription</a></h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
            <a class="btn" href="#">Subscribe Today</a>
        </div>
        <div>
            <img src="<?php echo $template_path; ?>img/place-footer-03.png" alt="Subscribe" />
            <h4><a href="#">Weekly Newsletters</a></h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
            <a class="btn" href="#">Subscribe Today</a>
        </div>
    </div>
    <div class="clear"></div>
    </article>
    <?php }; ?>

    <article class="bottom">
    <div class="wrap">
        <ul>
            <li><a href="#">Your Magazine Subscription</a></li>
            <li><a href="#">Press and Media</a></li>
            <li><a href="#">Content Licensing</a></li>
            <br />
            <li><a href="#">Privacy Policy and Terms of Use</a></li>
            <li><a href="#">Contact Customer Service</a></li>
            <li><a href="#">Send Us Your Tips</a></li>
        </ul>
        <a href="#"><img class="logo" src="<?php echo $template_path; ?>img/logo-autoweek-white.png" alt="Autoweek Logo" /></a>
        <p class="copyright">All Content &copy; 2013 Crain Communications, Inc.</p>
    </div>
    </article>
</section>

<!-- responsive design js -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php echo $template_path; ?>js/vendor/jquery-1.9.0.min.js"><\/script>')</script>

<!-- Get page variable for JS use -->
<script type="text/javascript">
    var thisPage = "<?php echo $thisPage; ?>";
</script>

<script src="<?php echo $template_path; ?>js/plugins-ck.js"></script>
<script src="<?php echo $template_path; ?>js/main.js"></script>

<!-- Google Analytics: UA-XXXXX-X needs to be updated accordingly. -->
<script>
    var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
    g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g,s)}(document,'script'));
</script>

<!-- TODO: move to appropriate place. this is just here for the time being so we can login -->
<?php if ($page['sidebar_first']): ?>
  <div id="sidebar-first" class="column sidebar"><div class="section">
	<?php print render($page['sidebar_first']); ?>
  </div></div> <!-- /.section, /#sidebar-first -->
<?php endif; ?>