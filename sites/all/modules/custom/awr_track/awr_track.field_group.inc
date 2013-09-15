<?php

/**
 * Implements hook_field_group_info().
 */
function awr_track_field_group_info() {
  $field_groups = array();
  
  //Define awr_track_field_group_info field group
  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_awr_track_field_group_info|node|awr_track|form';
  $field_group->group_name = 'group_awr_track_field_group_info';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'awr_track';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Location Information',
    'weight' => '0',
    'children' => array(
      0 => 'title',
      1 => 'awr_track_location',
      2 => 'awr_track_class',
      3 => 'awr_track_main_image',
      4 => 'awr_track_simple_image',
        
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'Location Information',
      'instance_settings' => array(
        'required_fields' => 1,
        'classes' => '',
        'description' => '',
      ),
      'formatter' => 'collapsible',
    ),
  );
  $field_groups['group_awr_track_field_group_info|node|awr_track|form'] = $field_group;
  
  //Define awr_track_field_group_stats field group
  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_awr_track_field_group_stats|node|awr_track|form';
  $field_group->group_name = 'group_awr_track_field_group_stats';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'awr_track';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Track Stats',
    'weight' => '1',
    'children' => array(
      0 => 'awr_track_previous_winner',
      1 => 'awr_track_current_winner',
      2 => 'awr_track_lap_speed_rec',
      3 => 'awr_track_lap_speed_rec_holder',
      4 => 'awr_track_lap_speed_rec_date',
      5 => 'awr_track_lap_time_rec',
      6 => 'awr_track_lap_time_rec_holder',
      7 => 'awr_track_lap_time_rec_date',
        
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'Track Stats',
      'instance_settings' => array(
        'required_fields' => 0,
        'classes' => '',
        'description' => '',
      ),
      'formatter' => 'collapsed',
    ),
  );
  $field_groups['group_awr_track_field_group_stats|node|awr_track|form'] = $field_group;
  
  
  //Define awr_track_field_group_tech_info field group
  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_awr_track_field_group_tech_info|node|awr_track|form';
  $field_group->group_name = 'group_awr_track_field_group_tech_info';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'awr_track';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Override Location Technical Information',
    'weight' => '2',
    'children' => array(
      0 => 'awr_track_num_stages',
      1 => 'awr_track_distance',
      2 => 'awr_track_configuration',
      3 => 'awr_track_banking',
      4 => 'awr_track_front_stretch',
      5 => 'awr_track_back_stretch',
      6 => 'awr_track_direction',
      7 => 'awr_track_num_turns',
      8 => 'awr_track_elevation_change',
      9 => 'awr_track_surface',
      10 => 'awr_track_altitude',
      11 => 'awr_track_seating',
        
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'Technical Information',
      'instance_settings' => array(
        'required_fields' => 0,
        'classes' => '',
        'description' => '',
      ),
      'formatter' => 'collapsed',
    ),
  );
  $field_groups['group_awr_track_field_group_tech_info|node|awr_track|form'] = $field_group;
  
  //Define awr_track_field_group_hidden field group
  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_awr_track_field_group_hidden|node|awr_track|form';
  $field_group->group_name = 'group_awr_track_field_group_hidden';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'awr_track';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Hidden',
    'weight' => '3',
    'children' => array(
      0 => 'awr_track_legacy_location_id',
      1 => 'awr_track_legacy_track_id',      
      2 => 'awr_track_legacy_series_id',        
      3 => 'awr_track_legacy_class_id',          
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'Hidden',
      'instance_settings' => array(
        'required_fields' => 0,
        'classes' => '',
        'description' => '',
      ),
      'formatter' => 'collapsed',
    ),
  );
  $field_groups['group_awr_track_field_group_hidden|node|awr_track|form'] = $field_group;
  
    return $field_groups;
}