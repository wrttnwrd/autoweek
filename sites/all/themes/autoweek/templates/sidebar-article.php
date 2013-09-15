<aside class="sidebar">

	<div class="sb-wrap-one">
    <?php if ($thisPage=="reviews-gallery") { ?>
      <article class="story review-summary">
        <p><span class="review-cat">On Sale: </span>Now</p>
        <p><span class="review-cat">Base Price: </span>$21,675</p>
        <p><span class="review-cat">Drivetrain: </span>2.5-liter, 184-hp, 185-lb-ft 14; FWD, six-speed manual</p>
        <p><span class="review-cat">Curb Weight: </span>3,183 lb</p>
        <p><span class="review-cat">0-60 MPH: </span>8.2 sec (est)</p>
        <p><span class="review-cat">Fuel Economy: </span>25/37/29 mpg <span class="note">(EPA City/Hwy/Combined)</span></p>
        <p class="editor-pick">Editor's Pick</p>
      </article>
    <?php }; ?>

    <article class="story social sb">
      <div class="left">
        <h2>See More In Section <a href="#">Car News</a></h2>
      </div><!-- left -->
	  
      <div class="right">
        <h2>Share This Story</h2>
        <div class="shareThis">
          <span>
              <span class='email st_email_custom' displayText='Email'>Email</span>
              <span class="count" id='emailcount'>(5)</span>
          </span>
          <span>
              <span class='facebook st_facebook_custom' displayText='Facebook'>Facebook</span>
              <span class="count" id='facebookcount'>(20)</span>
          </span>
          <span>
              <span class='twitter st_twitter_custom' displayText='Tweet'>Tweet</span>
              <span class="count" id='twittercount'>(100)</span>
          </span>
          <span>
              <span class='pinterest st_pinterest_custom' displayText='Pinterest'>Pinterest</span>
              <span class="count" id='pinterestcount'>(5)</span>
          </span>
          <span>
              <span class='gplus st_googleplus_custom' displayText='Google +'>Google +</span>
              <span class="count" id='gpluscount'>(13)</span>
          </span>
          <span>
              <span class='comments'>Comments</span>
              <span class="count" id='commentcount'>(35)</span>
          </span>
          <div class="clear"></div>
        </div>
      </div><!-- right -->
      <div class="clear"></div>
    </article>

    <article class="ad one">
        <a href="#"><img src="<?php echo $template_path; ?>img/place-ad-300x250.jpg" alt="Ad spot" /></a>
    </article>
  </div><!-- sb-wrap-one -->

  <div class="sb-wrap-two">
	<?php if (isset($related_articles) && strlen($related_articles) > 0) { ?>
    <article class="story picks sb left">
        <div class="excerpt">
            <h2>Related Stories</h2>
			<?php echo $related_articles; ?>            
        </div>
    </article>
	<?php } ?>

    <article class="story topics sb right">
        <div class="excerpt">
            <h2>Story Topics</h2>
            <p><a class="popular" href="#">Car News</a>, <a class="popular" href="#">ipsum</a>, <a class="popular" href="#">dolor</a>, <a class="popular" href="#">sit</a>, <a href="#">amet</a>, <a href="#">consectetur</a> <a href="#">adipiscing</a> <a href="#">elit</a>. <a href="#">Nunc</a>, <a href="#">non</a>, <a href="#">eros</a>, <a href="#">eros</a>, <a href="#">vel</a>, <a href="#">bibendum</a> <a href="#">metus</a> <a href="#">aliquam</a>. <a href="#">Lorem</a>, <a href="#">ipsum</a>, <a href="#">dolor</a>, <a href="#">sit</a>, <a href="#">amet</a>, <a href="#">consectetur</a> <a href="#">adipiscing</a> <a href="#">elit</a>.  <a href="#">Nunc</a>, <a href="#">non</a>, <a href="#">eros</a>, <a href="#">eros</a>, <a href="#">vel</a>, <a href="#">bibendum</a> <a href="#">metus</a> <a href="#">aliquam</a>. <a href="#">Lorem</a>, <a href="#">ipsum</a>, <a href="#">dolor</a>, <a href="#">sit</a>, <a href="#">amet</a>, <a href="#">consectetur</a> <a href="#">adipiscing</a> <a href="#">elit</a>.</p>
        </div>
    </article>
    <div class="clear"></div>

  </div><!-- sb-wrap-two -->

</aside><!--sidebar-->
<div class="clear"></div>