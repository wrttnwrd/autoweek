<?php
	// this variable will need to be defined on all page templates. will possibly have to put in https logic
	$template_path = "http://" . $_SERVER['SERVER_NAME'] . $variables['base_path'] . path_to_theme() . "/";
	$thisPage = "article";

	$author_content = '';
	// if article author override, use that
	if (isset($node->aw_article_author_override) && sizeof($node->aw_article_author_override) > 0) {
		$author_content = render($page['content']['system_main']['nodes'][$node->nid]['aw_article_author_override']);
	} else if (isset($node->aw_article_author_ref) && sizeof($node->aw_article_author_ref) > 0) {
	// otherwise, get author reference
		$author_content = render($page['content']['system_main']['nodes'][$node->nid]['aw_article_author_ref']);
	}

	// get the featured image from the aw_article_content field
	$main_image_field = field_get_items('node', $node, 'aw_article_main_image');
	foreach ($main_image_field as $image) {
		//$article_image_title = $image['entity']->aw_image_img[$node->language][0]['title'];
		$article_image_alt = $image['entity']->aw_image_img[$node->language][0]['alt'];
		$article_image_url = file_create_url($image['entity']->aw_image_img[$node->language][0]['uri']);
		$article_image_caption = $image['entity']->aw_image_caption[$node->language][0]['value'];
		
		$article_image_author = '';
		if (sizeof($image['entity']->aw_image_author_ref) > 0) {
			$article_image_author = '';
		} else if (sizeof($image['entity']->aw_image_author_override) > 0) {
			$article_image_author = $image['entity']->aw_image_author_override[$node->language][0]['value'];
		}
	}
	// build the article content based on the media order
	$article_content = render($page['content']['system_main']['nodes'][$node->nid]['aw_article_content']);
	
	// get related articles
	$related_articles = render($page['content']['system_main']['nodes'][$node->nid]['aw_article_related']);
?>

<?php include('header-nav.php'); ?>

<div class="story-header"><div>

    <h1><?php print $title; ?></h1>
    <p><?php print date("F jS, Y", $node->created); ?></p>

</div></div>

<section class="main-body">

	<?php if (isset($article_image_url) && $article_image_url != "") { ?>
    <article class="story featured baseline">
        <div class="article-wrap">
        <a href="#"><img class="thumb" src="<?php echo $article_image_url; ?>" alt="<?php echo $article_image_alt; ?>" /></a>
        <div class="excerpt"><div>
            <p class="tiny"><?php echo $article_image_caption; ?> <?php if (strlen($article_image_author) > 0) { ?><span class="author">Photo by <?php echo $article_image_author; ?></span><?php } ?></p>
        </div></div><!--excerpt-->
        <div class="clear"></div>
        </div><!--article-wrap-->
    </article>
	<?php } ?>

    <div class="wrap-content one">

    <article class="story contents">
		<?php print render($article_content); ?>	
		<?php //print render($page['content']); ?>

        <article class="story featured center">
            <a href="#">
                <img class="thumb" src="<?php echo $template_path; ?>img/place-review-video.jpg" alt="Acura ILX" /></a>

            <div class="excerpt nobg">
                <h2><a href="#">Review</a></h2><h3>Smaller Headline</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc non eros eros, vel bibendum metus.</p>
            </div>
            <div class="clear"></div>
        </article>

        <div class="author-feature">
		<?php if (strlen($author_content) > 0) { ?>
			<?php echo $author_content; ?>
		<?php } ?>
        </div>

    </article>
    <div class="clear"></div>
    </div><!-- wrap-content -->

    <article class="ad two">
        <a href="#"><img src="<?php echo $template_path; ?>img/place-ad-730x90.png" alt="Ad spot" /></a>
    </article>

    <div class="wrap-content two recommended">

    <h2>Recommended Stories</h2>

    <div class="offset">
    <article class="story center">

        <a href="#"><img class="thumb" src="<?php echo $template_path; ?>img/place-lamborghini-02.jpg" alt="Acura ILX" /></a>

        <div class="excerpt">

            <h2><a href="#">Auto Show</a></h2>

            <p>Unique Mom-mobiles at the Chicago Auto Show <!-- <span class="author">by <a href="#">Editors</a></span> --></p>

        </div>
        <div class="clear"></div>

    </article>

    <article class="story center">

        <a href="#"><img class="thumb" src="<?php echo $template_path; ?>img/place-acura.jpg" alt="Acura ILX" /></a>

        <div class="excerpt">

            <h2><a href="#">Review</a></h2>

            <p>2013 Acura ILX Premium review notes <!-- <span class="author">by <a href="#">Editors</a></span> --></p>

        </div>
        <div class="clear"></div>

    </article>

    <article class="story center">

        <a href="#"><img class="thumb" src="<?php echo $template_path; ?>img/place-lamborghini-02.jpg" alt="Acura ILX" /></a>

        <div class="excerpt">

            <h2><a href="#">Review</a></h2>

            <p>2013 Lamborghini Aventador LP 700-4 roadster to be auctioned at Boca Raton Concours d'Elegance  <!-- <span class="author">by <a href="#">Editors</a></span> --></p>

        </div>
        <div class="clear"></div>

    </article>

    <article class="story center">

        <a href="#"><img class="thumb" src="<?php echo $template_path; ?>img/place-tesla.jpg" alt="Acura ILX" /></a>

        <div class="excerpt">

            <h2><a href="#">Green</a></h2>

            <p>Tesla uses data to refute New York Times report <!-- <span class="author">by <a href="#">Editors</a></span> --></p>

        </div>
        <div class="clear"></div>

    </article>
    <div class="clear"></div>
    </div><!-- offset -->

    </div><!-- wrap-content -->

    <article class="story">

    <div class="login-popup">

    <div class="login-header">Login <a class="close" href="#"></a></div>
        <div class="login-icons">
            With your account from:
            <ul>
              <li class="facebook"><a href="#">Facebook</a></li>
              <li class="twitter"><a href="#">Twitter</a></li>
              <li class="gplus"><a href="#">Google +</a></li>
              <li class="outlook"><a href="#">Outlook</a></li>
              <li class="yahoo"><a href="#">Yahoo</a></li>
              <li class="linkedin"><a href="#">LinkedIn</a></li>
              <li class="aol"><a href="#">AOL</a></li>
          </ul>
        </div>
    </div>
        <div class="comment-head"><strong>Comments</strong>

            <div class="link-wrapper">
                  <ul class="links inline"><li class="comment_forbidden first last"><span>To leave a comment you must <a href="/user/login?destination=node/3%23comment-form" class="login">Login</a></span></li>
            </ul>    </div>
        </div>

        <div class="respond" >
            <div class="avatar cell">
            </div><div class="form-textarea-wrapper resizable textarea-processed resizable-textarea"><textarea class="text-full form-textarea required cell" rows="7">Add a comment...</textarea></div>
        </div>

        <div class="link-wrapper">Posting as John Smith <a href="">(Not you?)</a> <input name="submit" type="submit" id="submit" value="Submit"></div>
            <div class="clear"></div>
    <div class="comments">
        <div class="comment">
        <div class="comment-wrapper">
            <div class="avatar cell"></div>
            <div class="comment-wrap cell">
                <div class="attribution">
                    <div class="name-wrap">
                        <p class="commenter-name"><a href="">Commenter Name</a></p>
                        <p class="comment-time">1/23/2013 4:47PM Eastern</p>
                    </div>
                </div>
                    <div class="comment-text">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc non eros eros, vel bibendum metus. Aliquam vel sem pharetra metus tincidunt convallis at in mauris. Proin sit amet elit eu enim consequat consectetur. In feugiat aliquam mi ac vestibulum. Aliquam nec purus in nulla placerat malesuada ac eget felis.</p>
                    </div>

            </div>
            <!-- / comment-wrap -->
                                                    <div class="links-wrap"><ul class="links inline"><li><a href="#">Reply</a></li><li><a href="#">Report</a></li><li><a href="#">Like (5)</a></li><li><a href="#">Dislike (1)</a></li></ul>
                    </div>

            </div>
            <!-- / comment-wrapper -->
        </div>
        <!-- / comment -->
        <div class="comment">
                <div class="comment-wrapper">
                    <div class="avatar cell">
                    </div>
                    <div class="comment-wrap cell">
                        <div class="attribution">
                            <div class="name-wrap">
                                <p class="commenter-name"><a href="">Commenter Name</a></p>
                                <p class="comment-time">1/23/2013 4:47PM Eastern</p>
                            </div>
                        </div>
                            <div class="comment-text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc non eros eros, vel bibendum metus. Aliquam vel sem pharetra metus tincidunt convallis at in mauris. Proin sit amet elit eu enim consequat consectetur. In feugiat aliquam mi ac vestibulum. Aliquam nec purus in nulla placerat malesuada ac eget felis.</p>
                            </div>

                    </div> <!-- / comment-wrap -->
                    <div class="links-wrap"><ul class="links inline"><li><a href="#">Reply</a></li><li><a href="#">Report</a></li><li><a href="#">Like (5)</a></li><li><a href="#">Dislike (1)</a></li></ul>
                            </div>

                </div> <!-- / comment-wrapper -->
                            <div class="comment">
                        <div class="comment-wrapper">
                            <div class="avatar cell">
                                        </div>
                                <div class="comment-wrap cell">
                                    <div class="attribution">

                                        <div class="name-wrap">
                                            <p class="commenter-name"><a href="">Commenter Name</a></p>
                                            <p class="comment-time">1/23/2013 4:47PM Eastern</p>
                                        </div>
                                    </div>
                                        <div class="comment-text">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc non eros eros, vel bibendum metus. Aliquam vel sem pharetra metus tincidunt convallis at in mauris. Proin sit amet elit eu enim consequat consectetur. In feugiat aliquam mi ac vestibulum. Aliquam nec purus in nulla placerat malesuada ac eget felis. </p>
                                        </div>

                                </div> <!-- / comment-wrap -->

                                                                                                                <div class="links-wrap"><ul class="links inline"><li><a href="#">Reply</a></li><li><a href="#">Report</a></li><li><a href="#">Like (5)</a></li><li><a href="#">Dislike (1)</a></li></ul>
                                        </div>

                            </div> <!-- / comment-wrapper -->
                        </div> <!-- / child comment -->
        </div> <!-- / comment -->
        <div class="comment">
                    <div class="comment-wrapper">
                    <div class="avatar cell">
                    </div>
                    <div class="comment-wrap cell">
                        <div class="attribution">

                            <div class="name-wrap">
                                <p class="commenter-name"><a href="">Commenter Name</a></p>
                                <p class="comment-time">1/23/2013 4:47PM Eastern</p>
                            </div>
                        </div>
                            <div class="comment-text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc non eros eros, vel bibendum metus. Aliquam vel sem pharetra metus tincidunt convallis at in mauris. Proin sit amet elit eu enim consequat consectetur. In feugiat aliquam mi ac vestibulum. Aliquam nec purus in nulla placerat malesuada ac eget felis.</p>
                            </div>
                    </div> <!-- / comment-wrap -->

                                                <div class="links-wrap"><ul class="links inline"><li><a href="#">Reply</a></li><li><a href="#">Report</a></li><li><a href="#">Like (5)</a></li><li><a href="#">Dislike (1)</a></li></ul>
                            </div>

                    </div> <!-- / comment-wrapper -->
                        <div class="comment">
                        <div class="comment-wrapper">
                        <div class="avatar cell">
                        </div>
                                <div class="comment-wrap cell">
                                    <div class="attribution">

                                        <div class="name-wrap">
                                            <p class="commenter-name"><a href="">Commenter Name</a></p>
                                            <p class="comment-time">1/23/2013 4:47PM Eastern</p>
                                        </div>
                                    </div>
                                        <div class="comment-text">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc non eros eros, vel bibendum metus. Aliquam vel sem pharetra metus tincidunt convallis at in mauris. Proin sit amet elit eu enim consequat consectetur. In feugiat aliquam mi ac vestibulum. Aliquam nec purus in nulla placerat malesuada ac eget felis.</p>
                                        </div>

                                </div> <!-- / comment-wrap -->

                                                                        <div class="links-wrap"><ul class="links inline"><li><a href="#">Reply</a></li><li><a href="#">Report</a></li><li><a href="#">Like (5)</a></li><li><a href="#">Dislike (1)</a></li></ul>
                                        </div>

                                </div> <!-- / comment-wrapper -->

                            </div>  <!-- / child comment -->

                        </div> <!-- / comment -->

            </div>
            <div class="all-comments"><a href="#">VIEW ALL COMMENTS (36)</a></div>
            <!-- / comments -->
    </article>

</section><!-- main-body -->

<?php include('sidebar-article.php'); ?>

</div><!-- outer-wrap -->

<?php include('footer.php'); ?>

