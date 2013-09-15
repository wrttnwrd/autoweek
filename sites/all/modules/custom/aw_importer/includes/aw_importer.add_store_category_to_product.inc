<?php

/*
 * @file
 * Custom functionality for Autoweek Importer.
 * Defines function for adding store and category(if applicable) to product.
 */

/**
 * Add a store taxonomy term to a given node.
 * @param type $nodeType
 * @param type $storeTxtField
 * @param type $categoryTxtField
 * @param type $taxonomyField - Field that stores the taxonomy word(s)
 * @return string
 */
function _aw_importer_addStoreCategoryToProduct($nodeType, $storeTxtField, $categoryTxtField, $taxonomyField) {
    $ep = ''; //Store Taxonomy Page HTML

    $nodeQuery = new EntityFieldQuery();
    $nodeQuery->entityCondition('entity_type', 'node');
    $nodeQuery->propertyCondition('type', array($nodeType));
    $nodeQuery->pager(100);
    $nodeResult = $nodeQuery->execute();


    if (sizeOf($nodeResult) > 0) {
        $npointers = $nodeResult['node'];

        $ep = $ep . theme('pager');
        $ep = $ep . '<table>
                <tr>
                    <th>Node</th>
                    <th>Revision</th>
                    <th>Title</th>
                    <th>Lang</th>
                    <th>Store/Category</th>
                    <th>Matched Taxonomy IDs</th>
                    <th>Status</th>
                </tr>';

        foreach ($npointers as $npointer) {

            $node = node_load($npointer->nid, $npointer->vid);
            $lang = $node->language;
            $lStore = _aw_importer_retprop($node->$storeTxtField, $lang, 'value');
            $lCategory = _aw_importer_retprop($node->$categoryTxtField, $lang, 'value');
            $currTax = _aw_importer_retprop($node->$taxonomyField, $lang, 'tid');
            
            if(isset($node->aws_product_store_category[$node->language])){
                $testArr = $node->aws_product_store_category[$node->language];
            }
            else{
                $testArr = array();
            }

            $storeQuery = new EntityFieldQuery();
            $storeQuery->entityCondition('entity_type', 'taxonomy_term');
            $storeQuery->entityCondition('bundle', 'store');  //Limit to the vocabulary 'store'
            $storeQuery->propertyCondition('name', $lStore);  //Look for store term
            $stores = $storeQuery->execute();
            $storeID = array_shift($stores['taxonomy_term'])->tid;
            
            $categoryQuery = new EntityFieldQuery();
            $categoryQuery->entityCondition('entity_type', 'taxonomy_term');
            $categoryQuery->entityCondition('bundle', 'store');  //Limit to the vocabulary 'store'
            $categoryQuery->propertyCondition('name', $lCategory);  //Look for Category Term
            $categories = $categoryQuery->execute();
            $categoryID = array_shift($categories['taxonomy_term'])->tid;
            
            $ep = $ep .
                    '<tr>
                    <td>' . $npointer->nid . '</td>
                    <td>' . $npointer->vid . '</td>
                    <td>' . $node->title . '</td>
                    <td>' . $lang. '</td>
                    <td>' . $lStore . '/' . $lCategory . '</td>
                    <td>' . $storeID . '/' . $categoryID . '</td>
                    ';

            if(! (in_array(array('tid'=>$storeID), $testArr)) ) {
                $node->aws_product_store_category[$node->language][]['tid'] = $storeID;
            }
            if(! (in_array(array('tid'=>$categoryID), $testArr)) ) {
                $node->aws_product_store_category[$node->language][]['tid'] = $categoryID;
            }
            
            if(!( (in_array(array('tid'=>$storeID), $testArr)) && (in_array(array('tid'=>$categoryID), $testArr)) )) {
                $ep = $ep . '<td>Updated</td>';
                $node->revision = 1;
                $node->log = 'AW_Importer added Store and/or Category Taxonomy.';
                node_save($node);
            } else {
                $ep = $ep . '<td>Skipped</td>';
            }

            $ep = $ep . '</tr>';
        }
         
         
        $ep = $ep . '</table>';
        $ep = $ep . theme('pager');
    }

    return $ep;
}


