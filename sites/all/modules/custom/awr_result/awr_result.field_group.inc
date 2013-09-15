<?php

/**
 * Implements hook_field_group_info().
 */
function awr_result_field_group_info() {
  $field_groups = array();
  
  //Define group_awr_result_field_group_hidden field group
  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_awr_result_field_group_hidden|node|awr_result|form';
  $field_group->group_name = 'group_awr_result_field_group_hidden';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'awr_result';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Hidden Fields',
    'weight' => '0',
    'children' => array(
      0 => 'title',
      1 => 'awr_result_legacy_result_id',   
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'Hidden Fields',
      'instance_settings' => array(
        'required_fields' => 1,
        'classes' => '',
        'description' => '',
      ),
      'formatter' => 'collapsed',
    ),
  );
  $field_groups['group_awr_result_field_group_hidden|node|awr_result|form'] = $field_group;
  
//Define group_awr_result_field_group_hidden_calc field group
  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_awr_result_field_group_hidden_calc|node|awr_result|form';
  $field_group->group_name = 'group_awr_result_field_group_hidden_calc';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'awr_result';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Hidden Calculated Fields',
    'weight' => '1',
    'children' => array(
      0 => 'awr_result_driver',
      1 => 'awr_result_event',
      2 => 'awr_result_race_rank',
      3 => 'awr_result_time',
      4 => 'awr_result_laps',
      5 => 'awr_result_points',
      6 => 'awr_result_starting',
      7 => 'awr_result_status',
      8 => 'awr_result_round',
      9 => 'awr_result_speed',
      10 => 'awr_result_round_record',
      11 => 'awr_result_standing',
      12 => 'awr_result_position',
      13 => 'awr_result_season',      
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'Hidden Calculated Fields',
      'instance_settings' => array(
        'required_fields' => 1,
        'classes' => '',
        'description' => '',
      ),
      'formatter' => 'collapsed',
    ),
  );
  $field_groups['group_awr_result_field_group_hidden_calc|node|awr_result|form'] = $field_group;
  
  return $field_groups;
}