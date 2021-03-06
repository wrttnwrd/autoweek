<?php

drupal_add_js('var $ = jQuery.noConflict();','inline');
drupal_add_css('http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,700,700italic|Oswald:400,700,300');
drupal_add_js('var thisPage = "home";','inline');

echo render($page['pre_header']);?>


<?php echo render($page['header']);?>


<section class="main-body">

    <?php echo render($page['content']);?>

</section><!-- main-body -->



<aside class="sidebar">

  <div class="sb-wrap-one">

    <?php
          echo render($page['main_sidebar']);
    ?>

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

 <?php echo render($page['primary_footer']);?>