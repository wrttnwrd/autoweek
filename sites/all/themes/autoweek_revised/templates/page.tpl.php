<?php

drupal_add_js('var $ = jQuery.noConflict();','inline');
drupal_add_css('http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,700,700italic|Oswald:400,700,300');
drupal_add_js('var thisPage = "home";','inline');

echo render($page['pre_header']);?>

<div class="header-wrap">

<header class="main-header">



<div class="header-top">



            <a class="nav-btn" href="#"></a>

        <a class="logo" href="/"><img src="<?php echo $logo;?>" alt="Autoweek Logo" height="45" /></a>



</div>



<div class="clear"></div>





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

        <a href="#"><img src="<?php echo $logo;?>" alt="Autoweek Logo" height="24px" /></a>

    </div>



    <a class="subscribe-top" href="#">

        <span>Subscribe Today!</span>

        <img src="sites/all/themes/autoweek_revised/img/subscribe-top1.png" alt="Subscribe Today!" />

    </a>



    <ul class="top-nav">

        <li><a class="current-page-item" href="#">News</a></li>

        <li><a href="#">TV</a></li>

        <li><a href="#">Reviews</a></li>

        <li><a href="#">Shop</a></li>

        <li><a href="#">Racing</a></li>

        <li><a href="#">Classics</a></li>

        <li><a href="#">Store</a></li>

    </ul>



    <div class="clear"></div>



</div>

</nav><!-- main-nav -->





</header><!-- main-header -->

</div><!-- header-wrap -->





<div class="outer-wrap">

<?php echo render($page['content']);?>



<div class="clear"></div>

</div><!-- outer-wrap -->



<section class="footer">



    

    <article class="subscribe">

    <div class="wrap">



        <h3>Subscribe To Autoweek</h3>



        <div>



            <img src="sites/all/themes/autoweek_revised/img/place-footer-01.png" alt="Subscribe" />



            <h4><a href="#">Printed Edition</a></h4>



            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>



            <a class="btn" href="#">Subscribe Today</a>



        </div>



        <div>



            <img src="sites/all/themes/autoweek_revised/img/place-footer-02.png" alt="Subscribe" />



            <h4><a href="#">Digital Subscription</a></h4>



            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>



            <a class="btn" href="#">Subscribe Today</a>



        </div>



        <div>



            <img src="sites/all/themes/autoweek_revised/img/place-footer-03x.png" alt="Subscribe" />



            <h4><a href="#">Weekly Newsletters</a></h4>



            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>



            <a class="btn" href="#">Subscribe Today</a>



        </div>



    </div>

    <div class="clear"></div>

    </article>



    

    <article class="bottom">

    <div class="wrap">



        <ul>



            <li><a href="#">Your Magazine Subscription</a></li>

            <li><a href="#">Press and Media</a></li>

            <li><a href="#">Content Licensing</a></li>

            <br>

            <li><a href="#">Privacy Policy and Terms of Use</a></li>

            <li><a href="#">Contact Customer Service</a></li>

            <li><a href="#">Send Us Your Tips</a></li>



        </ul>



        <a href="#"><img class="logo" src="sites/all/themes/autoweek_revised/img/logo-autoweek-white.png" alt="Autoweek Logo" /></a>

        <p class="copyright">All Content &copy; 2013 Crain Communications, Inc.</p>



    </div>

    </article>



</section>