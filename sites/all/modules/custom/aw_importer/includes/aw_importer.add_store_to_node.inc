<?php

/*
 * @file
 * Custom functionality for Autoweek Importer.
 * Defines function for adding store to node.
 */

/**
 * Add a store taxonomy term to a given node.
 * @param type $nodeType
 * @param type $storeTxtField
 * @param type $taxonomyField - Field that stores the taxonomy word
 * @return string
 */
function _aw_importer_addStoreToNode($nodeType, $storeTxtField, $taxonomyField) {
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
                    <th>Store</th>
                    <th>Matched Taxonomy ID</th>
                    <th>Status</th>
                </tr>';

        foreach ($npointers as $npointer) {

            $node = node_load($npointer->nid, $npointer->vid);
            $lang = $node->language;
            $lStore = _aw_importer_retprop($node->$storeTxtField, $lang, 'value');
            $currTax = _aw_importer_retprop($node->$taxonomyField, $lang, 'tid');


            $storeQuery = new EntityFieldQuery();
            $storeQuery->entityCondition('entity_type', 'taxonomy_term');
            $storeQuery->entityCondition('bundle', 'store');  //Limit to the vocabulary 'store'
            $storeQuery->propertyCondition('name', $lStore);  //Look for SEMA Term
            $stores = $storeQuery->execute();
            $storeID = array_shift($stores['taxonomy_term'])->tid;


            $ep = $ep .
                    '<tr>
                    <td>' . $npointer->nid . '</td>
                    <td>' . $npointer->vid . '</td>
                    <td>' . $node->title . '</td>
                    <td>' . $lang . '</td>
                    <td>' . $lStore . '</td>
                    <td>' . $storeID . '</td>
                    ';

            if ($currTax != $storeID) {
                $ep = $ep . '<td>Updated</td>';
            } else {
                $ep = $ep . '<td>Skipped</td>';
            }

            $ep = $ep . '</tr>';

            if ($currTax != $storeID) {
                $node->revision = 1;
                $node->log = 'AW_Importer added Store Taxonomy.';
                $node->$taxonomyField =
                        array(
                            $lang => array(
                                array(
                                    'tid' => $storeID,
                                )
                            )
                );
                node_save($node);
            }
        }
         
         
        $ep = $ep . '</table>';
        $ep = $ep . theme('pager');
    }

    return $ep;
}


