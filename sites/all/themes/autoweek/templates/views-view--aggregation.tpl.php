<?php
	//krumo($page);
	// this variable will need to be defined on all page templates. will possibly have to put in https logic
	$template_path = "http://" . $_SERVER['SERVER_NAME'] . $GLOBALS['base_path'] . path_to_theme() . "/";
	$thisPage = "aggregation";
	
	$bi = $view->build_info;
	$subs = $bi["substitutions"];
	$title = $subs["%1"];
	
	$articles = $view->result;
	$featured = false;
	if (sizeof($articles)) {
		$featured_article = getArticleData($articles[0]->nid);
		if (isset($featured_article["image_url"]))
			$featured = true;
	}
?>

<?php include('header-nav.php'); ?>

<div class="side-nav-wrap">
	<div>
		<h1><?php print $title; ?></h1>
	</div>
</div> 

<section class="main-body">

	<?php if ($featured) { ?>
	    <article class="story featured center">
	        <div class="article-wrap">
		        <a href="#"><img class="thumb" src="<?php echo $featured_article["image_url"]; ?>" alt="<?php echo $featured_article["image_alt"]; ?>" /></a>
		        <div class="excerpt"><div>
		        	<h2><a href="#"><?php echo $featured_article["primary_tag"] ?></a></h2>
		        	<p><?php echo $featured_article["title"] ?></p>
		            <p class="tiny"><span class="author">By <?php echo $featured_article["author"] ?> - <?php echo $featured_article["date"] ?> - (blurb? first para?)</span></p>
		        </div></div><!--excerpt-->
		        <div class="clear"></div>
	        </div><!--article-wrap-->
	        <div class="clear"></div>
	    </article>
	<?php } ?>

    <div class="wrap-content one">
    
    <?php for ($i = 0; $i < sizeof($articles); $i++) {
    	if ($featured && $i == 0)
    		continue;
    	if ($i == 7) {
	?>
		</div><!-- wrap-content -->
	    <article class="ad two">
	        <a href="#asdf"><img src="<?php echo $template_path; ?>img/place-ad-730x90.png" alt="Ad spot alt" /></a>
	    </article>
	    <div class="wrap-content two">
	<?php
		}
    	$article = getArticleData($articles[$i]->nid);
    ?>
	    <article class="story center">	
            <a href="#"><img class="thumb" src="<?php echo $article["image_url"]; ?>" alt="<?php echo $article["image_alt"]; ?>" /></a>
            <div class="excerpt">
                <h2><a href="#"><?php echo $article["primary_tag"] ?></a></h2>
                <p><?php echo $article["title"] ?></p>
                <br />
                <span class="author">By <?php echo $featured_article["author"] ?> - <?php echo $featured_article["date"] ?> -</span>
                <p class="body-copy">(blurb? first para?)</p>
            </div>
            <div class="clear"></div>
	    </article>
    <?php
    	}
		if ($i == 15) {
	?>
		<div class="see-more">
	        <a href="#">See More Stories</a>
	    </div>
	<?php } ?>
	</div><!-- wrap-content -->
	
</section><!-- main-body -->

<?php include('sidebar-article.php'); ?>

</div><!-- outer-wrap -->

<?php include('footer.php'); ?>

