<?php

/*
 * @file
 * Used to populate galleries with images after import from saxotech.
 * 
 * Should only be run during initial development.
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
    print_r($mysqli);
    
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }
}else{
    echo "Default database connection is not mysql.  Exiting.";
    exit();
}

//prepare and execute select statement to grab all articles
$gallerySQL = "SELECT * FROM `field_data_aw_gallery_legacy_id`";

if(!$galleryResult = $mysqli->query($gallerySQL)){
    die('There was an error running the gellery query [' . $mysqli->error . ']');
}

//loop through galleries
while($gallery = $galleryResult->fetch_assoc()){
    
    //setup gallery variables
    $galleryImages = array();  //array for gallery media
    $gi = 0;  //gallery media index counter
    $entityId = $gallery['entity_id']; //gallery entity id (drupal id)
    $galleryId = $gallery['aw_gallery_legacy_id_value']; //gallery id (saxotech id)
    
    //build query for images for a given article id
    $imgSQL = "
        SELECT
            `t_order`.`entity_id` as `entity_id`,
            `t_order`.`aw_image_legacy_order_value` as `order`
            
        FROM `field_data_aw_image_source_id` as `t_article_id`
        LEFT JOIN `field_data_aw_image_legacy_order` as `t_order`
            ON `t_article_id`.`entity_id` = `t_order`.`entity_id`
            WHERE `t_article_id`.`aw_image_source_id_value` = '".$galleryId."'
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
            $galleryImages[$gi] = $image;
            $gi++;
        }
    }
    
    //sort gallery images by order and type
    $sort = array();
    foreach($galleryImages as $skey=>$sval){
        $sort['order'][$skey] = $sval['order'];
        $sort['type'][$skey] = $sval['type'];
    }
    
    array_multisort($sort['order'],SORT_ASC,$sort['type'],SORT_ASC,$galleryImages);
    
    //loop through sorted gallery images
    $aindex=0;
    foreach($galleryImages as $media){
    
        //build queries to insert media records into database for given gallery
        $dataSQL = "
            INSERT INTO `field_data_aw_gallery_slides`
                (`entity_type`,
                `bundle`,
                `deleted`,
                `entity_id`,
                `revision_id`,
                `language`,
                `delta`,
                `aw_gallery_slides_target_id`)
            VALUES
                ('node',
                'aw_gallery',
                '0',
                '".$entityId."',
                '".$entityId."',
                'und',
                '".$aindex."',
                '".$media['entity_id']."');";
        $revisionSQL = "
            INSERT INTO `field_revision_aw_gallery_slides`
                (`entity_type`,
                `bundle`,
                `deleted`,
                `entity_id`,
                `revision_id`,
                `language`,
                `delta`,
                `aw_gallery_slides_target_id`)
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