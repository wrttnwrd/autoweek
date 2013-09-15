<!--[if lt IE 7]>
    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
<![endif]-->

<div class="header-wrap">
<header class="main-header">

<div class="header-top">
    <?php if ($thisPage!="article-instaread") { ?>
        <a class="nav-btn" href="#"></a>
    <?php }; ?>
    <a class="logo" href="#"><img src="<?php echo $template_path; ?>img/logo-autoweek-lg.png" alt="Autoweek Logo" width="341" height="45" /></a>
</div>

<div class="clear"></div>

<?php if ($thisPage!="article-instaread") { ?>
<nav class="main-nav">
<div>
    <a class="search-btn" href="#">Search</a>
    <form class="search">
        <label for="terms">Search For</label>
        <div class="input-wrap"><input name="terms" type="text" placeholder="Search terms"></div>
        <label for="section">In</label>
        <ul class="section">
            <li><a class="current-page-item" href="#">All Sections of Autoweek</a></li>
            <li><a href="#">Lorem</a></li>
            <li><a href="#">Ipsum</a></li>
            <li><a href="#">Dolor</a></li>
            <li><a href="#">Sit</a></li>
            <li><a href="#">Amet</a></li>
        </ul>
        <input type="submit" value="Search">
    </form>

    <div class="minilogo">
        <a href="#"><img src="<?php echo $template_path; ?>img/logo-autoweek-sm.png" alt="Autoweek Logo" /></a>
    </div>

    <a class="subscribe-top" href="#">
        <span>Subscribe Today!</span>
        <img src="<?php echo $template_path; ?>img/subscribe-top.png" alt="Subscribe Today!" />
    </a>

    <ul class="top-nav">
        <li><a <?php if ( ($thisPage=="home") || ($thisPage=="aggregation") || ($thisPage=="article") || ($thisPage=="article-instaread") || ($thisPage=="article-gallery") ) { ?>class="current-page-item"<?php }; ?> href="#">News</a></li>
        <li><a <?php if ( ($thisPage=="article-video") ) { ?>class="current-page-item"<?php }; ?>href="#">TV</a></li>
        <li><a <?php if ( ($thisPage=="reviews-gallery") || ($thisPage=="article-review") || ($thisPage=="article-review-select") ) { ?>class="current-page-item"<?php }; ?>href="#">Reviews</a></li>
        <li><a href="#">Shop</a></li>
        <li><a <?php if ( ($thisPage=="racing-landing") || ($thisPage=="racing-article") || ($thisPage=="series-landing") || ($thisPage=="series-pressroom") ) { ?>class="current-page-item"<?php }; ?>href="#">Racing</a></li>
        <li><a href="#">Classics</a></li>
    </ul>

    <div class="clear"></div>
</div>
</nav><!-- main-nav -->

<?php }; ?>

</header><!-- main-header -->
</div><!-- header-wrap -->

<div class="outer-wrap">