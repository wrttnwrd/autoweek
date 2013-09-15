<?php

/**
 * Implements hook_field_group_info().
 */
function awr_driver_field_group_info() {
  $field_groups = array();
  
  //Define group_awr_driver_field_group_info field group
  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_awr_driver_field_group_info|node|awr_driver|form';
  $field_group->group_name = 'group_awr_driver_field_group_info';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'awr_driver';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Driver Info',
    'weight' => '0',
    'children' => array(
      0 => 'title',
      1 => 'awr_driver_bio_ref',
      2 => 'awr_driver_class',
      3 => 'awr_driver_taxonomy',
      4 => 'awr_driver_number',
      5 => 'awr_driver_season',
      6 => 'awr_driver_team',
        
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'Driver Info',
      'instance_settings' => array(
        'required_fields' => 1,
        'classes' => '',
        'description' => '',
      ),
      'formatter' => 'collapsible',
    ),
  );
  $field_groups['group_awr_driver_field_group_info|node|awr_driver|form'] = $field_group;
  
  //Define group_awr_driver_bio_field_group_stats field group
  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_awr_driver_bio_field_group_stats|node|awr_driver|form';
  $field_group->group_name = 'group_awr_driver_bio_field_group_stats';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'awr_driver';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Career Stats',
    'weight' => '1',
    'children' => array(
      0 => 'awr_driver_finals',
      1 => 'awr_driver_semifinals',
      2 => 'awr_driver_quarterfinals',
      3 => 'awr_driver_record',
      4 => 'awr_driver_poles',
      5 => 'awr_driver_wins',
      6 => 'awr_driver_recent_finish',
      7 => 'awr_driver_best_champ_finish',
      8 => 'awr_driver_recent_champ_finish',
      9 => 'awr_driver_best_career_finish',
      10 => 'awr_driver_top_qualifier',
      11 => 'awr_driver_career_round_record',
      12 => 'awr_driver_career_best_speed',
      13 => 'awr_driver_career_best_time',
        
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'Career Stats',
      'instance_settings' => array(
        'required_fields' => 1,
        'classes' => '',
        'description' => '',
      ),
      'formatter' => 'collapsible',
    ),
  );
  $field_groups['group_awr_driver_bio_field_group_stats|node|awr_driver|form'] = $field_group;
  
  //Define group_awr_driver_bio_field_group_hidden field group
  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_awr_driver_bio_field_group_hidden|node|awr_driver|form';
  $field_group->group_name = 'group_awr_driver_bio_field_group_hidden';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'awr_driver';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Legacy',
    'weight' => '2',
    'children' => array(
      0 => 'awr_driver_legacy_id',
      1 => 'awr_driver_legacy_taxid',
      2 => 'awr_driver_legacy_seriesid',
      3 => 'awr_driver_legacy_classid',
        
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'Legacy',
      'instance_settings' => array(
        'required_fields' => 1,
        'classes' => '',
        'description' => '',
      ),
      'formatter' => 'collapsed',
    ),
  );
  $field_groups['group_awr_driver_bio_field_group_hidden|node|awr_driver|form'] = $field_group;
  
  //Define group_awr_driver_bio_field_group_hidden_calc field group
  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_awr_driver_bio_field_group_hidden_calc|node|awr_driver|form';
  $field_group->group_name = 'group_awr_driver_bio_field_group_hidden_calc';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'awr_driver';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Calculated Stats',
    'weight' => '3',
    'children' => array(
      0 => 'awr_driver_calc_rank',
      1 => 'awr_driver_calc_rank_change',
      2 => 'awr_driver_calc_points',
      3 => 'awr_driver_calc_points_behind',
      4 => 'awr_driver_calc_starts',
      5 => 'awr_driver_calc_poles',
      6 => 'awr_driver_calc_wins',
      7 => 'awr_driver_calc_top3',
      8 => 'awr_driver_calc_top5',
      9 => 'awr_driver_calc_top10',
      10 => 'awr_driver_calculated_finals',
      11 => 'awr_driver_calculated_sf',
      12 => 'awr_driver_calculated_qf',
  
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'Calculated Stats',
      'instance_settings' => array(
        'required_fields' => 1,
        'classes' => '',
        'description' => '',
      ),
      'formatter' => 'collapsed',
    ),
  );
  $field_groups['group_awr_driver_bio_field_group_hidden_calc|node|awr_driver|form'] = $field_group;
  
  return $field_groups;
}