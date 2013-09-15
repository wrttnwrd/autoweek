<?php

/*
 * @file
 * Custom functionality for Autoweek Importer.
 * Defines function for adding node to node.
 */
/**
 * 
 * Add a node reference to a node.
 * @param type $baseNodeType
 * @param type $addedNodeType
 * @param type $baseLookupField
 * @param type $baseLookupColumn
 * @param type $addedLookupField
 * @param type $addedLookupColumn
 * @param type $referenceField
 * @return string
 */
function aw_importer_addNodeToNode($baseNodeType, $addedNodeType, $baseLookupField, $baseLookupColumn, $addedLookupField, $addedLookupColumn, $referenceField) {
    $n2n = ''; //Page output
    //Grab list of base nodes to be modified
    $nodeQuery = new EntityFieldQuery();
    $nodeQuery->entityCondition('entity_type', 'node');
    $nodeQuery->propertyCondition('type', array($baseNodeType));
    $nodeQuery->propertyOrderBy('title');
    $nodeQuery->pager(100);
    $nodeResult = $nodeQuery->execute();


    if (sizeOf($nodeResult) > 0) {
        $npointers = $nodeResult['node'];

        $n2n = $n2n . theme('pager');
        $n2n = $n2n . '<table>
                <tr>
                    <th>Node</th>
                    <th>Revision</th>
                    <th>Title</th>
                    <th>Lang</th>
                    <th>Current Reference</th>
                    <th>Matched Node</th>
                    <th>Status</th>
                </tr>';

        //for each base node
        foreach ($npointers as $npointer) {
            $node = node_load($npointer->nid, $npointer->vid);
            $lang = $node->language;
            $currNode = _aw_importer_retprop($node->$referenceField, $lang, 'target_id');

            if ($baseLookupField == 'title' || _aw_importer_retprop($node->$baseLookupField, $lang, $baseLookupColumn)) {

                $addedNodeQuery = new EntityFieldQuery();
                $addedNodeQuery->entityCondition('entity_type', 'node');
                $addedNodeQuery->propertyCondition('type', array($addedNodeType));

                //If we are matching based on title, do a simple property condition.
                if ($baseLookupField == 'title') {
                    $addedNodeQuery->propertyCondition('title', array($node->title));
                } else {
                    $lookupValue = _aw_importer_retprop($node->$baseLookupField, $lang, $baseLookupColumn);
                    $addedNodeQuery->fieldCondition($addedLookupField, $addedLookupColumn, array($lookupValue));
                }

                $addedNodeQuery->range(0, 1);
                $addedNodeResult = $addedNodeQuery->execute();

                $addedNodePointer = reset($addedNodeResult['node']);

                $addedNode = node_load($addedNodePointer->nid, $addedNodePointer->vid);
            } else {
                unset($addedNode);
            }

            $n2n = $n2n .
                    '<tr>
                    <td>' . $npointer->nid . '</td>
                    <td>' . $npointer->vid . '</td>
                    <td>' . $node->title . '</td>
                    <td>' . $lang . '</td>
                    <td>' . $currNode . '</td>';

            //check if there is a node to be added
            if (isset($addedNode)) {
                $n2n = $n2n . '<td>' . $addedNode->title . '</td>';

                //check if node has already been added
                if ($currNode != $addedNode->nid && $addedNode->nid) {
                    $n2n = $n2n . '<td>Updated</td>';

                    //make a new revision and add the node id (replacing any existing node id)
                    $node->revision = 1;
                    $node->log = 'AW_Importer added node reference.';
                    $node->$referenceField =
                            array(
                                $lang => array(
                                    array(
                                        'target_id' => $addedNode->nid
                                    )
                                )
                    );
                    node_save($node);
                } else {
                    $n2n = $n2n . '<td>Skipped</td>';
                }
            } else {
                $n2n = $n2n . '<td></td><td>No Node</td>';
            }

            $n2n = $n2n . '</tr>';
        }

        $n2n = $n2n . '</table>';
        $n2n = $n2n . theme('pager');
    }

    return $n2n;
}
        

