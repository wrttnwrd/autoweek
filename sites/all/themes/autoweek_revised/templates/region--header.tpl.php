<?php

/**
 * @file
 * Default theme implementation to display a region.
 *
 * Available variables:
 * - $content: The content for this region, typically blocks.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the following:
 *   - region: The current template type, i.e., "theming hook".
 *   - region-[name]: The name of the region with underscores replaced with
 *     dashes. For example, the page_top region would have a region-page-top class.
 * - $region: The name of the region variable as defined in the theme's .info file.
 *
 * Helper variables:
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $is_admin: Flags true when the current user is an administrator.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 *
 * @see template_preprocess()
 * @see template_preprocess_region()
 * @see template_process()
 *
 * @ingroup themeable
 */
?>


<?php
    global $base_url;
?>
<div class="header-wrap">

<header class="main-header">

<div class="header-top">
        <a class="nav-btn" href="#"></a> 
        <a class="logo" href="<?php echo $base_url; ?>"><img src="<?php print theme_get_setting('logo'); ?>" alt="Autoweek Logo" height="45" /></a>
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
            <a href="<?php echo $base_url; ?>"><img src="<?php print theme_get_setting('logo'); ?>" alt="Autoweek Logo" height="24px" /></a>
        </div>


        <a class="subscribe-top" href="#">
            <span>Subscribe Today!</span>
            <img src="sites/all/themes/autoweek_revised/img/subscribe-top1.png" alt="Subscribe Today!" />
        </a>


        <?php

            print theme('links__system_main_menu', array(
                        'links' =>  menu_navigation_links('main-menu'),
                        'attributes' => array(
                        'id' => 'main-menu-links',
                        'class' => array('top-nav'),
                        ),
                        'heading' => array(
                        'text' => t('Main menu'),
                        'level' => 'h2',
                        'class' => array('element-invisible'),
                        ),
                )); 
        ?>

        <div class="clear"></div>

    </div>

    </nav><!-- main-nav -->

</header><!-- main-header -->

</div><!-- header-wrap -->



<div class="outer-wrap">

<?php 

$current_path = current_path();
$item = menu_get_item($current_path);

$children = $item['below'];


if(count($children) > 0){
    echo  '<div class="side-nav-wrap">
            <div>
                <ul class="side-nav">';

			foreach($children as $child){
				if($child['link']['href'] == $path_alias)
					$child_active = 'current-page-item';
				else
					$child_active = '';
                                
				if($child['link']['hidden'] != 1){
					$childname = $child['link']['title'];
					$childname = htmlspecialchars($childname);
					echo "<li><a href='".$child['link']['href']."' class='".$child_active."'>".$childname."</a></li>";
				}
			}
    echo "</ul></div></div>";
		}

if(drupal_is_front_page()) { ?>

<div class="side-nav-wrap">
    <div>
        <ul class="side-nav">
            <li><a class="current-page-item" href="#">Top News</a></li>
            <li><a href="#">Auto Shows</a></li>
            <li><a href="#">Technology</a></li>
            <li><a href="#">Eco/Green</a></li>
            <li><a href="#">Lifestyle</a></li>
            <li><a href="#">Section</a></li>
        </ul>
    </div>
</div><!--side-nav-wrap-->

<?php } ?>