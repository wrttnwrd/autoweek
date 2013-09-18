<?php



function autoweek_revised_preprocess_html(&$vars) {

  if(drupal_is_front_page())
    $vars['classes_array'][] = 'home';
    elseif(in_array('node-type-aw-article',$vars['classes_array'])) {
        $vars['classes_array'][] = 'article';  
    }

}


function autoweek_revised_links__system_main_menu($variables) {
	
  $html = "<ul class='top-nav'>\n"; 

  global $base_url;
  
  $c = 1;
  $all_menu = menu_tree_all_data('main-menu');
  
  $active = ''; $child_active = '';
  
  $current_path = current_path();

  /* Case:  View/Node */
  if(strpos($current_path, 'node') !== false){
	$path_alias = $base_url.'/'.drupal_lookup_path('alias',$current_path);
  }
  else{
	$path_alias = $base_url.'/'.$current_path;
  }
  /* //Case:  View/Node */
  
  /* Case:  Taxonomy */
  if( strpos($path_alias,'taxonomy/term') !== false ){
        $pos = strpos($path_alias,'taxonomy/term');
        $current_tid = substr($path_alias,$pos+14);
        $path_alias =  $base_url.'/'.drupal_lookup_path('alias', 'taxonomy/term/'.$current_tid);
  }
   /* //Case:  Taxonomy */
  
  foreach ($all_menu as $item) {
	$link = $item['link'];

	if($link['href'] == $path_alias || strpos($path_alias,$link['href']) !== false )
		$active = 'current-page-item';
	else
		$active = '';   
        
	$children = $item['below'];
	
	$catalog_tree = array();
	$main_path = str_replace($base_url.'/', '', $link['href']);
	$catalog = taxonomy_vocabulary_machine_name_load($main_path);
	
	if( isset($catalog) && $catalog !== false ){
		$catalog_tree = taxonomy_get_tree($catalog->vid, 0, NULL, FALSE);
		
		$ok = false;
		$content_type = '';		
	}
	
	if( count($catalog_tree) > 0 || count($children) > 0){
		if(count($children) > 0){
			$html .= "<li><a href='".$link['href']."' class='".$active."'>".$link['title']."</a>".
					  "<ul class='sub-menu' style='display:none'>";

			foreach($children as $child){
				if($child['link']['href'] == $path_alias)
					$child_active = 'current-page-item';
				else
					$child_active = '';
                                
				if($child['link']['hidden'] != 1){
					$childname = $child['link']['title'];
					$childname = htmlspecialchars($childname);
					$html .= "<li><a href='".$child['link']['href']."' class='".$child_active."'>".$childname."</a></li>";
				}
			}
			$html .=    "</ul>
					   </li>";
		}
		/*if(count($catalog_tree) > 0 ){
			$cat_menu = '';

			$html .= "<li><a href='".$link['href']."' class='".$active."'>".$link['title']."</a>";
			
			$html .= "<ul class='sub-menu' style='display:none'>";
			
			foreach($catalog_tree as $cat){

				$out_alias = drupal_lookup_path('alias', 'taxonomy/term/'.$cat->tid);
				$cat_path = $base_url.'/'.$out_alias;
				
				if($cat_path == $path_alias || strpos($path_alias,$cat_path) !== false )
					$child_active = 'current-page-item';
				else
					$child_active = '';
							
				if($ok === true){
					
					$nodes = array();
					$query = new EntityFieldQuery();
					$query->entityCondition('entity_type', 'node')
						->propertyCondition('status', 1)
						->propertyCondition('type', array($content_type))
						->fieldCondition($ref_field, 'tid', $cat->tid)
						->propertyOrderBy('created', 'DESC')
						->range(0, 1);
					$result = $query->execute();
					if($result){
						
						$catname = $cat->name;
						$catname = htmlspecialchars($catname);
					
						$html .= "<li><a href='".$cat_path."' class='".$child_active."'>".$catname."</a></li>";
					}
					
				}
				else{
					$catname = $cat->name;
					$catname = htmlspecialchars($catname);
						
					$html .= "<li><a href='".$cat_path."' class='".$child_active."'>".$catname."</a></li>";
				}
				
			}

			$html .= "</ul>";
			
			$html .=    "</li>";

		}*/
	}
	else{
		$html .= "<li><a href='".$link['href']."' class='".$active."'>".$link['title']."</a></li>";
	}
	
	$c++;
	
  }


  $html .= "  </ul>\n";

  return $html;
	
}

/*
function autoweek_revised_links__system_main_menu($variables) {
  $html = "";
  $html .= "<ul class='top-nav'>\n"; 

  global $base_url;
  
  foreach ($variables['links'] as $link) {

        $item_path = $link['href'];
	$parent = menu_link_get_preferred($item_path);
	$parameters = array(
		'active_trail' => array($parent['plid']),
		'only_active_trail' => FALSE,
		'min_depth' => $parent['depth']+1,
		'max_depth' => $parent['depth']+1,
		'conditions' => array('plid' => $parent['mlid']),
	  );

	$children = menu_build_tree($parent['menu_name'], $parameters);

	if(count($children) > 0){
		$html .= "<li>".l($link['title'], $link['href'], $link).
				  "<ul><li class='submenu_title'><a href='".$item_path."'>".$link['title']."</a></li>";
                
        foreach($children as $child){
			if($child['link']['hidden'] != 1)
			$html .= "<li><a href='".$child['link']['href']."'>".$child['link']['title']."</a></li>";
		}
		
        $html .=    "</ul>
                    </li>";
	}
      
      else{
        $active = '';
	$item_path = $link['href'];
        $path = current_path();
        $path_alias = drupal_lookup_path('alias',$path);
        
        if($item_path == $path_alias)
            $active = 'current-page-item';
        
        if($item_path == $base_url && drupal_is_front_page())
             $active = 'current-page-item';
	
	$html .= "<li><a href='".$link['href']."' class='".$active."'>".$link['title']."</a></li>";
      }
  }
  $html .= "  </ul>\n";

  return $html;
}
 * */
 