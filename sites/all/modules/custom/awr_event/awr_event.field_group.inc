<?php

/**
 * Implements hook_field_group_info().
 */
function awr_event_field_group_info() {
  $field_groups = array();
  
  //Define group_awr_event_field_group_info field group
  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_awr_event_field_group_info|node|awr_event|form';
  $field_group->group_name = 'group_awr_event_field_group_info';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'awr_event';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Event Info',
    'weight' => '0',
    'children' => array(
      0 => 'title',
      1 => 'awr_event_class',
      2 => 'awr_event_channel',
      3 => 'awr_event_start',
      4 => 'awr_event_end',
      5 => 'awr_event_laps',
      6 => 'awr_event_shape',
      7 => 'awr_event_telecast',
      8 => 'awr_event_week',
      9 => 'awr_event_purse',
      10 => 'awr_event_track',
      11 => 'awr_event_season',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'Event Info',
      'instance_settings' => array(
        'required_fields' => 1,
        'classes' => '',
        'description' => '',
      ),
      'formatter' => 'collapsible',
    ),
  );
  $field_groups['group_awr_event_field_group_info|node|awr_event|form'] = $field_group;
  
  //Define group_awr_event_field_group_drivers field group
  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_awr_event_field_group_drivers|node|awr_event|form';
  $field_group->group_name = 'group_awr_event_field_group_drivers';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'awr_event';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Event Drivers',
    'weight' => '1',
    'children' => array(
      0 => 'awr_event_drivers',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'Event Drivers',
      'instance_settings' => array(
        'required_fields' => 1,
        'classes' => '',
        'description' => '',
      ),
      'formatter' => 'collapsed',
    ),
  );
  $field_groups['group_awr_event_field_group_drivers|node|awr_event|form'] = $field_group;
  
  //Define group_awr_event_field_group_hidden field group
  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_awr_event_field_group_hidden|node|awr_event|form';
  $field_group->group_name = 'group_awr_event_field_group_hidden';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'awr_event';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Hidden Fields',
    'weight' => '2',
    'children' => array(
      0 => 'awr_event_legacy_id',
      1 => 'awr_event_legacy_track_id',
      2 => 'awr_event_legacy_series_id',
      3 => 'awr_event_legacy_class_id',
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
  $field_groups['group_awr_event_field_group_hidden|node|awr_event|form'] = $field_group;
  
  //Define group_awr_event_field_group_hidden_calc field group
  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_awr_event_field_group_hidden_calc|node|awr_event|form';
  $field_group->group_name = 'group_awr_event_field_group_hidden_calc';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'awr_event';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Hidden Calculated Fields',
    'weight' => '3',
    'children' => array(
      0 => 'awr_event_avg_speed',
      1 => 'awr_event_avg_speed_gt',
      2 => 'awr_event_lead_changes',
      3 => 'awr_event_cautions',
      //4 => 'awr_event_best_lap_speed',
      //5 => 'awr_event_best_lap_time',
      //6 => 'awr_event_best_lap_driver',
      //7 => 'awr_event_best_lap_driver_gt',
      8 => 'awr_event_margin_victory',
      9 => 'awr_event_race_time',
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
  $field_groups['group_awr_event_field_group_hidden_calc|node|awr_event|form'] = $field_group;
  
  return $field_groups;
}