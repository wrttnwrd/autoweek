<?php

/*
 * @file
 * Custom functionality for Autoweek Importer.
 * Defines function for adding racing series to node.
 */


/**
 * Add a taxonomy term to a given node.
 * @param type $nodeType
 * @param type $seriesIDField
 * @param type $classIDField
 * @param type $taxonomyField - Field that stores the taxonomy word
 * @return string
 */
function _aw_importer_addRacingSeriesToNode($nodeType, $seriesIDField, $classIDField, $taxonomyField) {
    $ep = ''; //Racing Taxonomy Page HTML

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
                    <th>Series</th>
                    <th>Class</th>
                    <th>Matched Taxonomy</th>
                    <th>Status</th>
                </tr>';

        foreach ($npointers as $npointer) {
            //$event->nid
            //$event->vid
            //$node->title
            //$node->language
            //awr_event_legacy_series_id
            //awr_event_legacy_class_id

            $node = node_load($npointer->nid, $npointer->vid);
            $lang = $node->language;
            $lSeries = _aw_importer_retprop($node->$seriesIDField, $lang, 'value');
            $lClass = _aw_importer_retprop($node->$classIDField, $lang, 'value');
            $classSeries = _aw_importer_getSeriesClass($lSeries, $lClass);
            $currTax = _aw_importer_retprop($node->$taxonomyField, $lang, 'tid');


            $classQuery = new EntityFieldQuery();
            $classQuery->entityCondition('entity_type', 'taxonomy_term');
            $classQuery->propertyCondition('vid', 4);  //Limit to the vocabulary 'Racing Series'
            $classes = $classQuery->execute();
            $taxonomy = array();

            foreach ($classes['taxonomy_term'] as $class) {
                $classTaxonomy = taxonomy_term_load($class->tid);
                $taxonomy[$classTaxonomy->name] = $class->tid;
            }


            $ep = $ep .
                    '<tr>
                    <td>' . $npointer->nid . '</td>
                    <td>' . $npointer->vid . '</td>
                    <td>' . $node->title . '</td>
                    <td>' . $lang . '</td>
                    <td>' . $lSeries . '</td>
                    <td>' . $lClass . '</td>
                    <td>' . $classSeries . '</td>
                    ';

            if ($currTax != $taxonomy[$classSeries] && $taxonomy[$classSeries]) {
                $ep = $ep . '<td>Updated</td>';
            } else {
                $ep = $ep . '<td>Skipped</td>';
            }

            $ep = $ep . '</tr>';

            if ($currTax != $taxonomy[$classSeries] && $taxonomy[$classSeries]) {
                $node->revision = 1;
                $node->log = 'AW_Importer added Series - Class Taxonomy.';
                $node->$taxonomyField =
                        array(
                            $lang => array(
                                array(
                                    'tid' => $taxonomy[$classSeries]
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

/**
 * Return a Class - Series for a given legacy series and legacy class.
 * @param type $lSeries
 * @param type $lClass
 * @return string
 */
function _aw_importer_getSeriesClass($lSeries, $lClass) {
    $classSeries = '';

    switch ($lClass) {
        case 1:
            $classSeries = 'NASCAR - Sprint Cup';
            break;
        case 2:
            $classSeries = 'NASCAR - Nationwide';
            break;
        case 3:
            $classSeries = 'NASCAR - Camping World Truck';
            break;
        case 4:
            $classSeries = 'IndyCar';
            break;
        case 5:
            $classSeries = 'ALMS - LMP1';
            break;
        case 6:
            $classSeries = 'ALMS - LMP2';
            break;
        case 7:
            $classSeries = 'GRAND-AM - GT';
            break;
        case 8:
            $classSeries = 'GRAND-AM - DP';
            break;
        case 9:
            $classSeries = 'NHRA - Top Fuel';
            break;
        case 10:
            $classSeries = 'NHRA - Funny Car';
            break;
        case 11:
            $classSeries = 'NHRA - Pro Stock';
            break;
        case 12:
            $classSeries = 'ALMS - GT';
            break;
        case 13:
            $classSeries = 'ALMS - LMPC';
            break;
        case 14:
            $classSeries = 'ALMS - GTC';
            break;
        case 15:
            $classSeries = 'GRAND-AM - GX';
            break;
        default:
            if ($lSeries == '2') {
                $classSeries = 'IndyCar';
            } elseif ($lSeries == '3') {
                $classSeries = 'Formula One';
            } elseif ($lSeries == '4') {
                $classSeries = 'ALMS';
            } elseif ($lSeries == '5') {
                $classSeries = 'GRAND-AM';
            } elseif ($lSeries == '6') {
                $classSeries = 'NHRA';
            } elseif ($lSeries == '7') {
                $classSeries = 'World Rally';
            }
            break;
    }
    return $classSeries;
}


