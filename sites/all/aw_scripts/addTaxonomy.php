<?php

/*
 * @file
 * Used to populate taxonomy after import from saxotech.  Should only be run
 * during initial development.
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
    $artTaxonomy = array();  //array for article taxonomy
    $ai = 0;  //article media index counter
    $entityId = $article['entity_id']; //article entity id (drupal id)
    $articleId = $article['aw_article_legacy_article_id_value']; //article id (saxotech id)
    
    
    //build query for galleries for a given article id
    $taxSQL = "
        SELECT
            `field_data_field_taxid`.`entity_id` as `entity_id`
            
        FROM `z_helper_taxonomy`
        LEFT JOIN `field_data_field_taxid`
            ON `z_helper_taxonomy`.`saxid` = `field_data_field_taxid`.`field_taxid_value`
            WHERE `z_helper_taxonomy`.`artid` = '".$articleId."';";
    
    //check for results of gallery query
    if(!$taxResult = $mysqli->query($taxSQL)){
        die('There was an error running the taxonomy query [' . $mysqli->error . ']');
    }
    
    //loop through galleries
    while($taxonomy = $taxResult->fetch_assoc()){
        
        //if there is an entity_id for the taxonomy then add it to the array
        if($taxonomy['entity_id']){
            $artTaxonomy[$ai] = $taxonomy;
            $ai++;
        }
    }
    
     //loop through article taxonomy
    $aindex=0;
    foreach($artTaxonomy as $tax){
    
        //build queries to insert media records into database for given article
        $dataSQL = "
            INSERT INTO `field_data_aw_article_taxonomy`
                (`entity_type`,
                `bundle`,
                `deleted`,
                `entity_id`,
                `revision_id`,
                `language`,
                `delta`,
                `aw_article_taxonomy_tid`)
            VALUES
                ('node',
                'aw_article',
                '0',
                '".$entityId."',
                '".$entityId."',
                'und',
                '".$aindex."',
                '".$tax['entity_id']."');";
        $revisionSQL = "
            INSERT INTO `field_revision_aw_article_taxonomy`
                (`entity_type`,
                `bundle`,
                `deleted`,
                `entity_id`,
                `revision_id`,
                `language`,
                `delta`,
                `aw_article_taxonomy_tid`)
            VALUES
                ('node',
                'aw_article',
                '0',
                '".$entityId."',
                '".$entityId."',
                'und',
                '".$aindex."',
                '".$tax['entity_id']."');";
        
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