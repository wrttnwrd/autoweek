<?php
if (isset($node->nodesinblock)&& drupal_is_front_page() ) {

    if(isset($node->aw_article_main_image['und'][0]['entity']->aw_image_img['und'][0]['uri'])) {
        $image = theme(
          'image_style',
          array(
            'path' => $node->aw_article_main_image['und'][0]['entity']->aw_image_img['und'][0]['uri'],
            'style_name' => 'w730',
            'alt' => $node->aw_article_main_image['und'][0]['entity']->aw_image_img['und'][0]['alt'],
            'title' => $node->aw_article_main_image['und'][0]['entity']->aw_image_img['und'][0]['title'],
          )
        );
        
    } ?>
    <article class="story featured">

        <div class="article-wrap">
        <?php 
//        echo $node->aw_article_main_image['und'][0]['entity']->aw_image_img['und'][0]['uri'];
        if(isset($image)&&!empty($image)) { ?> 
            <a href="<?php echo drupal_get_path_alias('node/'.$node->nid);?>"><?php echo $image;?></a>
        <?php } ?>
        <div class="excerpt"><div>

            <h2><a href="<?php echo drupal_get_path_alias('node/'.$node->nid);?>"><?php echo $title;?></a></h2>

            <p><?php if(isset($node->aw_article_headline['und'][0]['value'])) echo $node->aw_article_headline['und'][0]['value'];?>
            <span class="author"><!--by <a href="#">Graham Kozak - </a>--?><?php echo date('m/d/Y',$node->created);?></span></p>

        </div></div><!--excerpt-->
        </div><!--article-wrap-->
        <div class="clear"></div>

    </article>
<?php
} elseif($node->type=='aw_article'&&1==0) { ?>

<div class="story-header"><div>

    <h1><?php echo $title;?></h1>
    <p><?php echo date("F dS, Y",$node->created);?></p>

</div></div>

<section class="main-body">

    <article class="story featured baseline">

        <div class="article-wrap">
        <?php
        if(isset($node->aw_article_main_image['und'][0]['entity']->aw_image_img['und'][0]['uri'])) {
            $image = theme(
              'image_style',
              array(
                'path' => $node->aw_article_main_image['und'][0]['entity']->aw_image_img['und'][0]['uri'],
                'style_name' => 'w730',
                'alt' => $node->aw_article_main_image['und'][0]['entity']->aw_image_img['und'][0]['alt'],
                'title' => $node->aw_article_main_image['und'][0]['entity']->aw_image_img['und'][0]['title'],
              )
            );
            echo $image;   
        }
        ?>

        <div class="excerpt first-on-page"><div>

            <p class="tiny"><?php echo $node->aw_article_main_image['und'][0]['entity']->aw_image_caption['und'][0]['value'];?><span class="author">Photo by <a href="#">Anton Maka</a></span></p>

        </div></div><!--excerpt-->
        <div class="clear"></div>
        </div><!--article-wrap-->

    </article>

    <div class="wrap-content one">

    <article class="story contents">


        <?php
        foreach($node->aw_article_content['und'] as $key=>$entity) {
            if($entity['entity']->type=='aw_paragraph')
                echo $entity['entity']->aw_paragraph_text['und'][0]['value'];
        }?>

    </article>
    <div class="clear"></div>
    </div><!-- wrap-content -->

    <article class="ad two"><a class="img-wrap" href="#"><img src="img/place-ad-300x250.jpg" alt="Ad spot"></a></article>

    <div class="wrap-content two recommended">

    <h2>Recommended Stories</h2>

    <!-- offset -->

    </div><!-- wrap-content -->
</section><!-- main-body -->

<aside class="sidebar">


  <!-- sb-wrap-one -->

  <!-- sb-wrap-two -->




<div class="clear"></div>
<div class="sb-wrap-one">


    <article class="story social sb">

      <div class="left">

        <h2>See More In Section <a href="#">Car News</a></h2>

      </div><!-- left -->

      <div class="right">

        <h2>Share This Story</h2>

        <div class="shareThis">
          <span>
              <span st_processed="yes" class="email st_email_custom" displaytext="Email">Email</span>
              <span class="count" id="emailcount">(5)</span>
          </span>
          <span>
              <span st_processed="yes" class="facebook st_facebook_custom" displaytext="Facebook">Facebook</span>
              <span class="count" id="facebookcount">(20)</span>
          </span>
          <span>
              <span st_processed="yes" class="twitter st_twitter_custom" displaytext="Tweet">Tweet</span>
              <span class="count" id="twittercount">(100)</span>
          </span>
          <span>
              <span st_processed="yes" class="pinterest st_pinterest_custom" displaytext="Pinterest">Pinterest</span>
              <span class="count" id="pinterestcount">(5)</span>
          </span>
          <span>
              <span st_processed="yes" class="gplus st_googleplus_custom" displaytext="Google +">Google +</span>
              <span class="count" id="gpluscount">(13)</span>
          </span>
          <span>
              <span class="comments">Comments</span>
              <span class="count" id="commentcount">(35)</span>
          </span>
          <div class="clear"></div>
        </div>

      </div><!-- right -->
      <div class="clear"></div>

    </article>

    

  </div><div class="sb-wrap-two">

    <article class="story picks sb left">

        <div class="excerpt">

            <h2>Related Stories</h2>


        </div>

    </article>

    <article class="story topics sb right">

        <div class="excerpt">

            <h2>Story Topics</h2>

            <p><a class="popular" href="#">Car News</a>, <a class="popular" href="#">ipsum</a>, <a class="popular" href="#">dolor</a>, <a class="popular" href="#">sit</a>, <a href="#">amet</a>, <a href="#">consectetur</a> <a href="#">adipiscing</a> <a href="#">elit</a>. <a href="#">Nunc</a>, <a href="#">non</a>, <a href="#">eros</a>, <a href="#">eros</a>, <a href="#">vel</a>, <a href="#">bibendum</a> <a href="#">metus</a> <a href="#">aliquam</a>. <a href="#">Lorem</a>, <a href="#">ipsum</a>, <a href="#">dolor</a>, <a href="#">sit</a>, <a href="#">amet</a>, <a href="#">consectetur</a> <a href="#">adipiscing</a> <a href="#">elit</a>.  <a href="#">Nunc</a>, <a href="#">non</a>, <a href="#">eros</a>, <a href="#">eros</a>, <a href="#">vel</a>, <a href="#">bibendum</a> <a href="#">metus</a> <a href="#">aliquam</a>. <a href="#">Lorem</a>, <a href="#">ipsum</a>, <a href="#">dolor</a>, <a href="#">sit</a>, <a href="#">amet</a>, <a href="#">consectetur</a> <a href="#">adipiscing</a> <a href="#">elit</a>.</p>

        </div>

    </article>
    <div class="clear"></div>

  </div></aside><!--sidebar-->

<div class="clear"></div>

<?php } else { ?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <?php print render($title_prefix); ?>
  <?php if (!$page): ?>
    <h2<?php print $title_attributes; ?>>
      <a href="<?php print $node_url; ?>"><?php print $title; ?></a>
    </h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>

  <?php if ($display_submitted): ?>
    <div class="meta submitted">
      <?php print $user_picture; ?>
      <?php print $submitted; ?>
    </div>
  <?php endif; ?>

  <div class="content clearfix"<?php print $content_attributes; ?>>
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      print render($content);
    ?>
  </div>

  <?php
    // Remove the "Add new comment" link on the teaser page or if the comment
    // form is being displayed on the same page.
    if ($teaser || !empty($content['comments']['comment_form'])) {
      unset($content['links']['comment']['#links']['comment-add']);
    }
    // Only display the wrapper div if there are links.
    $links = render($content['links']);
    if ($links):
  ?>
    <div class="link-wrapper">
      <?php print $links; ?>
    </div>
  <?php endif; ?>

  <?php print render($content['comments']); ?>

</div>
<?php } ?>