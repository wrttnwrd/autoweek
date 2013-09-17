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





<?php 
if(drupal_is_front_page()) { ?>



<div class="side-nav-wrap"><div>



    <ul class="side-nav">

        <li><a class="current-page-item" href="#">Top News</a></li>

        <li><a href="#">Auto Shows</a></li>

        <li><a href="#">Technology</a></li>

        <li><a href="#">Eco/Green</a></li>

        <li><a href="#">Lifestyle</a></li>

        <li><a href="#">Section</a></li>

    </ul>



</div></div><!--side-nav-wrap-->

<?php } ?>

<section class="main-body">

    <?php echo render($page['content']);?>

</section><!-- main-body -->



<aside class="sidebar">





  <div class="sb-wrap-one">



    <article class="story picks sb left">



        <div class="excerpt">



            <h2>Editors' Picks</h2>



            <ul>

                <li><a href="#">Review</a> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</li>

                <li><a href="#">Car News</a> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</li>

                <li><a href="#">Green</a> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</li>

                <li><a href="#">Review</a> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</li>

                <li><a href="#">Technology</a> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</li>

            </ul>



        </div>



    </article>



    <article class="story around sb right">



        <div class="excerpt">



            <h2>From Around The Web</h2>



            <ul>

                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod. <a href="#">(www.autonews.com)</a></li>

                <li>Lorem ipsum dolor sit amet, consectetur. <a href="#">(www.websitehere.com)</a></li>

                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod. <a href="#">(www.autonews.com)</a></li>

                <li>Lorem ipsum dolor sit amet, consectetur adipisicing. <a href="#">(www.websitehere.com)</a></li>

                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod. <a href="#">(www.websitehere.com)</a></li>

            </ul>



        </div>



    </article>



  </div><!-- sb-wrap-one -->



  <article class="ad one">



      <a href="#"><img src="sites/all/themes/autoweek_revised/img/place-ad-300x250.jpg" alt="Ad spot" /></a>



  </article>



  <div class="sb-wrap-two">



    <article class="story issue sb left">



        <h2>In This Issue</h2>



        <img src="sites/all/themes/autoweek_revised/img/place-issue.jpg" alt="Autoweek Issue Cover" />

        <div class="excerpt">



            <ul>

                <li><a href="#">Alfa Romeo and Mazda</a></li>

                <li><a class="dl" href="#">2013 Ford Fusion</a></li>

                <li><a href="#">F-150 SVT Raptor</a></li>

                <li><a class="dl" href="#">Chevy Sonic RS</a></li>

                <li><a href="#">Aston Martin History</a></li>

            </ul>



            <a class="btn" href="#">Subscribe Today!</a>

            <div class="clear"></div>



        </div>



    </article>



    <article class="story newsletter sb right">



        <div class="excerpt">



            <h2>Subscribe To Autoweek Newsletters</h2>



            <form action="#">



                <input type="checkbox" id="Autoweek Daily Drive" checked="true" />

                <label for="Autoweek Daily Drive"><span></span>Autoweek Daily Drive</label>

                <input type="checkbox" id="Autoweek TV" />

                <label for="Autoweek TV"><span></span>Autoweek TV</label>

                <input type="checkbox" id="Autoweek Racing Daily" />

                <label for="Autoweek Racing Daily"><span></span>Autoweek Racing Daily</label>

                <input type="checkbox" id="Autoweek Racing Weekend Wrap-Up" />

                <label for="Autoweek Racing Weekend Wrap-Up"><span></span>Autoweek Racing Weekend Wrap-Up</label>

                <input type="checkbox" id="Breaking News" />

                <label for="Breaking News"><span></span>Breaking News</label>



                <input type="text" placeholder="Email Address">

                <input type="submit" value="Submit">



            </form>



        </div>



    </article>



  </div><!-- sb-wrap-two -->



  <article class="ad two">



      <a href="#"><img src="sites/all/themes/autoweek_revised/img/place-ad-300x250.jpg" alt="Ad spot" /></a>



  </article>



  <article class="story social sb">

  <div class="center-offset">



    <h2>Follow Autoweek</h2>



    <ul>

        <li class="facebook"><a href="#">Facebook</a></li>

        <li class="twitter"><a href="#">Twitter</a></li>

        <li class="gplus"><a href="#">Google +</a></li>

        <li class="youtube"><a href="#">YouTube</a></li>

        <li class="pinterest"><a href="#">Pinterest</a></li>

        <li class="instagram"><a href="#">Instagram</a></li>

        <li class="linkedin"><a href="#">LinkedIn</a></li>

        <div class="clear"></div>

    </ul>



    <h2>Autoweek Racing</h2>



    <ul>

        <li class="twitter"><a href="#">Twitter</a></li>

        <li class="gplus"><a href="#">Google +</a></li>

        <div class="clear"></div>

    </ul>



  </div>

  </article>



  <article class="ad three">



      <a href="#"><img src="sites/all/themes/autoweek_revised/img/place-house-ad.png" alt="Ad spot" /></a>



  </article>



  <article class="ad four">



      <a href="#"><img src="sites/all/themes/autoweek_revised/img/place-house-ad.png" alt="Ad spot" /></a>



  </article>











<div class="clear"></div>

</aside><!--sidebar-->



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