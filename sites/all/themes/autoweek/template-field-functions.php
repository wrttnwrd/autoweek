<?php
/**
 * Override field output for related content
 */
function autoweek_field__aw_article_content($variables) {
	$article_content = '';	
	//var_dump($variables['element']['#items']);	
	
	foreach ($variables['element']['#items'] as $i => $media) {
		$lang = $media['entity']->language;
		
		if ($media['entity']->type == "aw_paragraph") {
			$article_content .= "<p>" . $media['entity']->aw_paragraph_text[$lang][0]['value'] . "</p>";
			
		} else if ($media['entity']->type == "aw_gallery") {
//			krumo($media['entity']);//node_load($target_id);
			$article_content .= '<div class="featured-gallery royalSlider rsDefault">';
			$temp_slides = $media['entity']->aw_gallery_slides[$lang];
			$num_slides = sizeof($temp_slides);
			for ($j = 0; $j < $num_slides; $j++) {
				$temp_slide = node_load($temp_slides[$j]['target_id']);
				$temp_slide_img = $temp_slide->aw_image_img[$lang][0];
//				krumo($temp_slide);		
				$temp_slide_img_alt = $temp_slide_img['alt'];
				$temp_slide_img_url = file_create_url($temp_slide_img['uri']);
				$temp_slide_img_caption = $temp_slide->aw_image_caption[$lang][0]['value'];	
				$temp_slide_img_width = $temp_slide_img['width'];	
				$temp_slide_img_height = $temp_slide_img['height'];
				$temp_slide_image_author = "";
				$temp_slide_image_author_url = "";
				$temp_slide_author = "";
				if (isset($temp_slide_image_author) && strlen($temp_slide_image_author) > 0) {
					if (isset($temp_slide_image_author_url) && strlen($temp_slide_image_author_url) > 0)
						$temp_slide_author = ' <span class="author">Photo by <a href="' . $temp_slide_image_author_url . '">' . $temp_slide_image_author . '</a></span>';
					else
						$temp_slide_author = ' <span class="author">Photo by ' . $temp_slide_image_author . '</span>';
				}				
				if (isset($temp_slide_img_url) && strlen($temp_slide_img_url) > 0) {
					$article_content .= '
						<div>
							<a class="rsImg bugaga" href="' . $temp_slide_img_url . '"><img width="' . $temp_slide_img_width . '" height="' . $temp_slide_img_height . '" class="rsTmb" src="' . $temp_slide_img_url . '" /></a>
							<figure class="rsCaption"><span class="slidenumber">' . ($j + 1) . ' of ' . sizeof($temp_slides) . '</span> ' . $temp_slide_img_caption . ' ' . $temp_slide_author . '</figure>
						</div>';
				}
			}
			$article_content .= '</div>';
			$article_content .= '<div class="clear"></div>';

		} else if ($media['entity']->type == "aw_image") {
			//var_dump($media);exit;
			//krumo($media['entity']);
		
			// ignore top media embed as it is used as article feature image
			if ($i > 1) {			
				$temp_article_image_alt = $media['entity']->aw_image_img[$lang][0]['alt'];
				$temp_article_image_url = file_create_url($media['entity']->aw_image_img[$lang][0]['uri']);
				$temp_article_image_caption = $media['entity']->aw_image_caption[$lang][0]['value'];
				//$temp_article_image_author = "";
				//$temp_article_image_author_url = "";
				$temp_article_author = "";
				if (isset($temp_article_image_author) && strlen($temp_article_image_author) > 0) {
					if (isset($temp_article_image_author_url) && strlen($temp_article_image_author_url) > 0)
						$temp_article_author = ' <span class="author">Photo by <a href="' . $temp_article_image_author_url . '">' . $temp_article_image_author . '</a></span>';
					else
						$temp_article_author = ' <span class="author">Photo by ' . $temp_article_image_author . '</span>';
				}
			
				if (isset($temp_article_image_url) && strlen($temp_article_image_url) > 0) {
					$article_content .= '
						<article class="story featured">
							<div class="article-wrap">
							<a href="#"><img class="thumb" src="' . $temp_article_image_url . '" alt="' . $temp_article_image_alt . '" /></a>

							<div class="excerpt nobg"><div>
								<p class="tiny">' . $temp_article_image_caption . $temp_article_author . '</p>
							</div></div><!--excerpt-->
							<div class="clear"></div>
							</div><!--article-wrap-->
						</article>';
				}
			}
			
		} else if ($media['entity']->type == "aw_video") {
			//var_dump($media['entity']->aw_video_type);
			$article_video_type = $media['entity']->aw_video_type[$lang][0]['value'];
			$article_video_id = $media['entity']->aw_video_ext_id[$lang][0]['value'];
			
			if ($article_video_type == "youtube")
				$article_video_url = "http://www.youtube.com/watch?v=" . $article_video_id;
			else if ($article_video_type == "vimeo")
				$article_video_url = "http://vimeo.com/" . $article_video_id;
			else if ($article_video_type == "brightcove")
				$article_video_url = "";
				
			$article_video_title = $media['entity']->title;
			$article_video_caption = $media['entity']->aw_video_caption[$lang][0]['value'];
			$article_video_image_url = file_create_url($media['entity']->aw_video_img[$lang][0]['uri']);
			
			$article_content .= '
				<article class="story featured">
					<div class="article-wrap">
					
					<div class="royalSlider video-gallery rsDefault">
						<a class="rsImg"  data-rsVideo="' . $article_video_url . '" href="' . $article_video_image_url . '"></a>
					</div>
					
					<div class="excerpt"><div>
						<h2><a href="#">Video:</a> ' . $article_video_title . '</h2>
						<p class="tiny">' . $article_video_caption . '</p>
					</div></div><!--excerpt-->
					<div class="clear"></div>
					</div><!--article-wrap-->
				</article>';
		} else {
			// something else?
			echo "Need to implement: ".$media['entity']->type;
			
		}
	}	
	
	return $article_content;
}

/**
 * Override field output for author override
 */
function autoweek_field__aw_article_author_override($variables) {
	$output = '';
	
	foreach ($variables['element']['#items'] as $i => $item) {
		$output .= '<p>' . $item['value'] . '</p>';
	}
	
	return $output;
}

/**
 * Override field output for author reference
 */
function autoweek_field__aw_article_author_ref($variables) {
	$output = '';
	//var_dump($variables['element']['#items']);
	
	$options = array('absolute' => TRUE);
	foreach ($variables['element']['#items'] as $i => $item) {
		$lang = $item['entity']->language;
		if ($lang == "")
			$lang = 'und';
		
		$author_name = $item['entity']->field_user_full_name[$lang][0]['value'];
		$author_desc = $item['entity']->field_user_short_description[$lang][0]['value'];
		
		if (sizeof($item['entity']->field_user_thumbnail_image) > 0) {
			$author_image_url = file_create_url($item['entity']->field_user_thumbnail_image[$lang][0]['uri']);
			$output .= '<img src="' . $author_image_url . '" alt="' . $author_name . '" />';
		}
		
		$author_url = url('user/' . $item['entity']->uid, $options);
		$output .= '<p><a href="' . $author_url . '">' . $author_name . ' - </a>' . $author_desc . ' <a class="semour" href="' . $author_url . '">See more by this author <span>&raquo;</span></a></p>';
	}
	
	return $output;
}

/**
 * Override field output for related content
 */
function autoweek_field__aw_article_related($variables) {
	$output = '';
	//var_dump($variables['element']['#items']);
	
	$output .= '<ul>';
	$options = array('absolute' => TRUE);
	foreach ($variables['element']['#items'] as $i => $item) {
		$url = url('node/' . $item['entity']->vid, $options);
		$output .= '<li><a href="' . $url . '">LOREM</a> ' . $item['entity']->title . '</li>';
	}
	$output .= '</ul>';
	
	return $output;
}