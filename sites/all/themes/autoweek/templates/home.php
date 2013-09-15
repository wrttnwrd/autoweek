<?php if ($main_menu): ?>
  <div id="main-menu" class="navigation">
	<?php /*print theme('links__system_main_menu', array(
	  'links' => $main_menu,
	  'attributes' => array(
		'id' => 'main-menu-links',
		'class' => array('links', 'clearfix'),
	  ),
	  'heading' => array(
		'text' => t('Main menu'),
		'level' => 'h2',
		'class' => array('element-invisible'),
	  ),
	));*/ ?>
  </div> <!-- /#main-menu -->
<?php endif; ?>

<?php if ($secondary_menu): ?>
  <div id="secondary-menu" class="navigation">
	<?php /*print theme('links__system_secondary_menu', array(
	  'links' => $secondary_menu,
	  'attributes' => array(
		'id' => 'secondary-menu-links',
		'class' => array('links', 'inline', 'clearfix'),
	  ),
	  'heading' => array(
		'text' => t('Secondary menu'),
		'level' => 'h2',
		'class' => array('element-invisible'),
	  ),
	));*/ ?>
  </div> <!-- /#secondary-menu -->
<?php endif; ?>

<?php include('header-nav.php'); ?>

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

<section class="main-body">

    <article class="story featured">

        <div class="article-wrap">
        <a href="#"><img class="thumb" src="<?php echo $template_path; ?>img/place-lamborghini.jpg" alt="Lamborghini Aventador" /></a>

        <div class="excerpt"><div>

            <h2><a href="#">Car News</a></h2>

            <p>2013 Lamborghini Aventador LP 700-4 roadster to be auctioned at Boca Raton Conco urs d'Elegance <span class="author">by <a href="#">Graham Kozak - 2/14/2013</a></span></p>

        </div></div><!--excerpt-->
        </div><!--article-wrap-->
        <div class="clear"></div>

    </article>

    <div class="wrap-content one">
    <div class="left-content">

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

            <a href="#" class="video">
                <div class="play"></div>
                <img class="thumb" src="<?php echo $template_path; ?>img/place-tesla.jpg" alt="Acura ILX" /></a>

            <div class="excerpt">

                <h2><a href="#">Video:</a> <a href="#">Green</a></h2>

                <p>Tesla uses data to refute New York Times report <!-- <span class="author">by <a href="#">Editors</a></span> --></p>

            </div>
            <div class="clear"></div>

        </article>

        <article class="story center">

            <div class="excerpt">

                <h2><a href="#">Auto Show</a></h2>

                <p>Unique Mom-mobiles at the Chicago Auto Show <!-- <span class="author">by <a href="#">Editors</a></span> --></p>

            </div>
            <div class="clear"></div>

        </article>

        <article class="story center">

            <a href="#" class="video">
                <div class="play"></div>
                <img class="thumb" src="<?php echo $template_path; ?>img/place-tesla.jpg" alt="Acura ILX" /></a>

            <div class="excerpt">

                <h2><a href="#">Video:</a> <a href="#">Green</a></h2>

                <p>Tesla uses data to refute New York Times report <!-- <span class="author">by <a href="#">Editors</a></span> --></p>

            </div>
            <div class="clear"></div>

        </article>

        <article class="story last center">

            <a href="#"><img class="thumb" src="<?php echo $template_path; ?>img/place-lamborghini-02.jpg" alt="Acura ILX" /></a>

            <div class="excerpt">

                <h2><a href="#">Auto Show</a></h2>

                <p>Unique Mom-mobiles at the Chicago Auto Show <!-- <span class="author">by <a href="#">Editors</a></span> --></p>

            </div>
            <div class="clear"></div>

        </article>

    </div><!--left-content-->

    <article class="story feed popular">

        <h3>Today's Popular</h3>

        <div class="content">
            <div>
                <a href="#"><img class="thumb" src="<?php echo $template_path; ?>img/place-popular-01.jpg" alt="Placeholder" /></a>
                <div class="excerpt">
                    <h2><a href="#">Car News</a></h2>
                    <p>DB9 is fine</p>
                </div>
                <div class="clear"></div>
            </div>
            <div>
                <div class="excerpt">
                    <h2><a href="#">Racing</a></h2>
                    <p>Ricky Stenhouse Jr. must focus on Daytona 500</p>
                </div>
                <div class="clear"></div>
            </div>
            <div>
                <div class="excerpt">
                    <h2><a href="#">Green</a></h2>
                    <p>2013 Honda Fit EV sales expand to East Coast</p>
                </div>
                <div class="clear"></div>
            </div>
            <div>
                <a href="#"><img class="thumb" src="<?php echo $template_path; ?>img/place-popular-02.jpg" alt="Placeholder" /></a>
                <div class="excerpt">
                    <h2><a href="#">Auto Show</a></h2>
                    <p>2013 Ford Fusion breaks cover at Detroit auto show</p>
                </div>
                <div class="clear"></div>
            </div>
            <div>
                <div class="excerpt">
                    <h2><a href="#">Car News</a></h2>
                    <p>2014 Chevrolet SS revealed</p>
                </div>
                <div class="clear"></div>
            </div>
            <div>
                <div class="excerpt">
                    <h2><a href="#">Car News</a></h2>
                    <p>McLaren P1 basks in Bahrain</p>
                </div>
                <div class="clear"></div>
            </div>
        </div>

    </article>

    <div class="clear"></div>
    </div><!--wrap-content-->

    <div class="wrap-content two">

    <article class="story featured gallery two">

        <div class="article-wrap">

            <div class="content-gallery royalSlider rsDefault">
                <div>
                    <a class="rsImg bugaga" data-rsBigImg="img/place-mercedes" href="<?php echo $template_path; ?>img/place-mercedes.jpg"></a>
                </div>
                <div>
                    <a class="rsImg bugaga" data-rsBigImg="img/place-mercedes" href="<?php echo $template_path; ?>img/place-mercedes.jpg"></a>
                </div>
                <div>
                    <a class="rsImg bugaga" data-rsBigImg="img/place-mercedes" href="<?php echo $template_path; ?>img/place-mercedes.jpg"></a>
                </div>
                <div>
                    <a class="rsImg bugaga" data-rsBigImg="img/place-mercedes" href="<?php echo $template_path; ?>img/place-mercedes.jpg"></a>
                </div>
                <div>
                    <a class="rsImg bugaga" data-rsBigImg="img/place-mercedes" href="<?php echo $template_path; ?>img/place-mercedes.jpg"></a>
                </div>
                <div>
                    <a class="rsImg bugaga" data-rsBigImg="img/place-mercedes" href="<?php echo $template_path; ?>img/place-mercedes.jpg"></a>
                </div>
                <div>
                    <a class="rsImg bugaga" data-rsBigImg="img/place-mercedes" href="<?php echo $template_path; ?>img/place-mercedes.jpg"></a>
                </div>
                <div>
                    <a class="rsImg bugaga" data-rsBigImg="img/place-mercedes" href="<?php echo $template_path; ?>img/place-mercedes.jpg"></a>
                </div>
                <div>
                    <a class="rsImg bugaga" data-rsBigImg="img/place-mercedes" href="<?php echo $template_path; ?>img/place-mercedes.jpg"></a>
                </div>
                <div>
                    <a class="rsImg bugaga" data-rsBigImg="img/place-mercedes" href="<?php echo $template_path; ?>img/place-mercedes.jpg"></a>
                </div>
                <div>
                    <a class="rsImg bugaga" data-rsBigImg="img/place-mercedes" href="<?php echo $template_path; ?>img/place-mercedes.jpg"></a>
                </div>
            </div>

            <div class="excerpt"><div>

                <h2><a href="#">Photos:</a> <a href="#">Car News</a></h2>

                <p>Mercedes-Benz A45 AMG hot hatch</p>

            </div></div><!--excerpt-->
            <div class="clear"></div>
            </div><!--article-wrap-->

    </article>

    <div class="grid">

    <div class="offset">
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

            <p>2013 Lamborghini Aventador LP 700-4 roadster to be auctioned at Boca Raton Concours d'Elegance <!-- <span class="author">by <a href="#">Editors</a></span> --></p>

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

    <article class="story center">

        <a href="#"><img class="thumb" src="<?php echo $template_path; ?>img/place-car-show.jpg" alt="Auto Show" /></a>

        <div class="excerpt">

            <h2><a href="#">Auto Show</a></h2>

            <p>Unique Mom-mobiles at the Chicago Auto Show <!-- <span class="author">by <a href="#">Editors</a></span> --></p>

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

    <article class="story last center">

        <a href="#"><img class="thumb" src="<?php echo $template_path; ?>img/place-lamborghini-02.jpg" alt="Acura ILX" /></a>

        <div class="excerpt">

            <h2><a href="#">Auto Show</a></h2>

            <p>Unique Mom-mobiles at the Chicago Auto Show <!-- <span class="author">by <a href="#">Editors</a></span> --></p>

        </div>
        <div class="clear"></div>

    </article>
    <div class="clear"></div>
    </div><!-- offset -->
    </div><!-- grid -->
    </div><!-- wrap-content -->

    <div class="wrap-content three">
    <article class="story featured three">

        <div class="article-wrap">

        <div class="royalSlider video-gallery rsDefault">
            <a class="rsImg"  data-rsVideo="http://www.youtube.com/watch?v=8KspdU9yc_c" href="<?php echo $template_path; ?>img/place-dodge-dart.jpg"></a>
        </div>

        <div class="excerpt"><div>

            <h2><a href="#">Video:</a> <a href="#">Review</a></h2>

            <p>2013 Dodge Dart long-term sedan review <!-- <span class="author">by <a href="#">Graham Kozak</a></span> --></p>

        </div></div><!--excerpt-->
        </div><!--article-wrap-->
        <div class="clear"></div>

    </article>

    <div class="grid">

    <div class="offset">
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

            <p>2013 Lamborghini Aventador LP 700-4 roadster to be auctioned at Boca Raton Concours d'Elegance <!-- <span class="author">by <a href="#">Editors</a></span> --></p>

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

    <article class="story center">

        <a href="#"><img class="thumb" src="<?php echo $template_path; ?>img/place-car-show.jpg" alt="Auto Show" /></a>

        <div class="excerpt">

            <h2><a href="#">Auto Show</a></h2>

            <p>Unique Mom-mobiles at the Chicago Auto Show <!-- <span class="author">by <a href="#">Editors</a></span> --></p>

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

    <article class="story last center">

        <a href="#"><img class="thumb" src="<?php echo $template_path; ?>img/place-lamborghini-02.jpg" alt="Acura ILX" /></a>

        <div class="excerpt">

            <h2><a href="#">Auto Show</a></h2>

            <p>Unique Mom-mobiles at the Chicago Auto Show <!-- <span class="author">by <a href="#">Editors</a></span> --></p>

        </div>
        <div class="clear"></div>

    </article>
    <div class="clear"></div>
    </div><!-- offset -->
    </div><!-- grid -->
    </div><!-- wrap-content -->

</section><!-- main-body -->

<?php include('sidebar-home.php'); ?>

</div><!-- outer-wrap -->

<?php include('footer.php'); ?>