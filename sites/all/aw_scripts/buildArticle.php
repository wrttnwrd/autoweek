<?php

/*
 * @file
 * Used to populate article media (paragraphs, images, galleries and videos)
 * after import from saxotech.  Should only be run during initial development.
 * File should be moved to /var/www/html/aw_scripts/ before running.
 * 
 * This script is configured to run on a server where the database is running
 * on localhost (meaning that port and socket are not passed to the connection).
 * 
 * NOTICE:  This script assumes that it is working with a blank import of
 * saxotech data.  It will not check for existing references and may cause
 * unpredictable results.  Please backup database before running.
 */

// Report all PHP errors
error_reporting(-1);

//include default drupal config file
include_once '/var/www/html/sites/default/settings.php';

//testing: print databases var
//print_r($databases);

//store default db connection info locally
$dbInfo = $databases['default']['default'];

//connect to database if default type is mysql otherwise exit.
if ($dbInfo['driver'] == 'mysql'){
    $mysqli = new mysqli($dbInfo['host'], $dbInfo['username'], $dbInfo['password'], $dbInfo['database']);
    
    //testing: database connection status
    //print_r($mysqli);
    
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }
}else{
    echo "Default database connection is not mysql.  Exiting.";
    exit();
}

//prepare and execute select statement to grab all articles
$artSQL = "SELECT * FROM `field_data_aw_article_legacy_article_id`";

if(!$artResult = $mysqli->query($artSQL)){
    die('There was an error running the article query [' . $mysqli->error . ']');
}


//loop through articles
while($article = $artResult->fetch_assoc()){
    
    //setup article variables
    $artMedia = array();  //array for article media
    $ai = 0;  //article media index counter
    $entityId = $article['entity_id']; //article entity id (drupal id)
    $articleId = $article['aw_article_legacy_article_id_value']; //article id (saxotech id)
    
    
    //build query for paragraphs for given article id
    $paraSQL = "
        SELECT
            `t_block_id`.`entity_id` as `entity_id`,
            `t_block_id`.`aw_paragraph_legacy_block_id_value` as `block_id`
            
        FROM `field_data_aw_paragraph_legacy_article_id` as `t_article_id`
        LEFT JOIN `field_data_aw_paragraph_legacy_block_id` as `t_block_id`
            ON `t_article_id`.`entity_id` = `t_block_id`.`entity_id`
            WHERE `t_article_id`.`aw_paragraph_legacy_article_id_value` = '".$articleId."'
        ORDER BY `block_id`;";
    
    //check for results of paragraph query
    if(!$paraResult = $mysqli->query($paraSQL)){
        die('There was an error running the paragraph query [' . $mysqli->error . ']');
    }
    
    //loop through paragraphs
    while($paragraph = $paraResult->fetch_assoc()){
        
        //if there is an entity_id for the paragraph then add it to the array
        if($paragraph['entity_id']){
            $paragraph['order'] = substr($paragraph['block_id'],strpos($paragraph['block_id'],"-")+1); //grab the order from block id
            $paragraph['type'] = 4; //1 = video, 2 = gallery, 3 = image, 4 = paragraph
            unset($paragraph['block_id']); //block id isn't needed anymore
            $artMedia[$ai] = $paragraph;
            $ai++;
        }
    }
    
    //build query for images for a given article id
    $imgSQL = "
        SELECT
            `t_order`.`entity_id` as `entity_id`,
            `t_order`.`aw_image_legacy_order_value` as `order`
            
        FROM `field_data_aw_image_source_id` as `t_article_id`
        LEFT JOIN `field_data_aw_image_legacy_order` as `t_order`
            ON `t_article_id`.`entity_id` = `t_order`.`entity_id`
            WHERE `t_article_id`.`aw_image_source_id_value` = '".$articleId."'
        ORDER BY `order`;";
    
    //check for results of image query
    if(!$imgResult = $mysqli->query($imgSQL)){
        die('There was an error running the image query [' . $mysqli->error . ']');
    }
    
    //loop through images
    while($image = $imgResult->fetch_assoc()){
        
        //if there is an entity_id for the images then add it to the array
        if($image['entity_id']){
            $image['type'] = 3; //1 = video, 2 = gallery, 3 = image, 4 = paragraph
            $artMedia[$ai] = $image;
            $ai++;
        }
    }
    
    //build query for videos for a given article id
    $vidSQL = "
        SELECT
            `z_helper_video`.`order` as `order`,
            `field_data_aw_video_ext_id`.`entity_id` as `entity_id`
            
        FROM `z_helper_video`
        LEFT JOIN `field_data_aw_video_ext_id`
            ON `z_helper_video`.`video_id` = `field_data_aw_video_ext_id`.`aw_video_ext_id_value`
            WHERE `z_helper_video`.`article_id` = '".$articleId."'
        ORDER BY `order`;";
    
    //check for results of video query
    if(!$vidResult = $mysqli->query($vidSQL)){
        die('There was an error running the video query [' . $mysqli->error . ']');
    }
    
    //loop through videos
    while($video = $vidResult->fetch_assoc()){
        
        //if there is an entity_id for the video then add it to the array
        if($video['entity_id']){
            $video['type'] = 1; //1 = video, 2 = gallery, 3 = image, 4 = paragraph
            $artMedia[$ai] = $video;
            $ai++;
        }
    }
    
    //build query for galleries for a given article id
    $gallerySQL = "
        SELECT
            `z_helper_gallery`.`order` as `order`,
            `field_data_aw_gallery_legacy_id`.`entity_id` as `entity_id`
            
        FROM `z_helper_gallery`
        LEFT JOIN `field_data_aw_gallery_legacy_id`
            ON `z_helper_gallery`.`gallery_id` = `field_data_aw_gallery_legacy_id`.`aw_gallery_legacy_id_value`
            WHERE `z_helper_gallery`.`article_id` = '".$articleId."'
        ORDER BY `order`;";
    
    //check for results of gallery query
    if(!$galleryResult = $mysqli->query($gallerySQL)){
        die('There was an error running the gallery query [' . $mysqli->error . ']');
    }
    
    //loop through galleries
    while($gallery = $galleryResult->fetch_assoc()){
        
        //if there is an entity_id for the gallery then add it to the array
        if($gallery['entity_id']){
            $gallery['type'] = 2; //1 = video, 2 = gallery, 3 = image, 4 = paragraph
            $artMedia[$ai] = $gallery;
            $ai++;
        }
    }
    
    //sort article media by order and type
    $sort = array();
    foreach($artMedia as $skey=>$sval){
        $sort['order'][$skey] = $sval['order'];
        $sort['type'][$skey] = $sval['type'];
    }
    
    array_multisort($sort['order'],SORT_ASC,$sort['type'],SORT_ASC,$artMedia);
    
    //testing: article media list
    //print_r($artMedia);
    
    //loop through sorted article media
    $aindex=0;
    foreach($artMedia as $media){
    
        //build queries to insert media records into database for given article
        $dataSQL = "
            INSERT INTO `field_data_aw_article_content`
                (`entity_type`,
                `bundle`,
                `deleted`,
                `entity_id`,
                `revision_id`,
                `language`,
                `delta`,
                `aw_article_content_target_id`)
            VALUES
                ('node',
                'aw_article',
                '0',
                '".$entityId."',
                '".$entityId."',
                'und',
                '".$aindex."',
                '".$media['entity_id']."');";
        $revisionSQL = "
            INSERT INTO `field_revision_aw_article_content`
                (`entity_type`,
                `bundle`,
                `deleted`,
                `entity_id`,
                `revision_id`,
                `language`,
                `delta`,
                `aw_article_content_target_id`)
            VALUES
                ('node',
                'aw_article',
                '0',
                '".$entityId."',
                '".$entityId."',
                'und',
                '".$aindex."',
                '".$media['entity_id']."');";
        
        //execute queries
            if(!$dataResult = $mysqli->query($dataSQL)){
                die('There was an error running the data insert query [' . $mysqli->error . ']');
            }
            if(!$revisionResult = $mysqli->query($revisionSQL)){
                die('There was an error running the revision insert query [' . $mysqli->error . ']');
            }
        $aindex++;
    }
    
}


//close mysqli connection
$mysqli->close();