<?php

/**
 * Implements hook_field_group_info().
 */
function awr_location_field_group_info() {
  $field_groups = array();
  
  //Define awr_location_field_group_info field group
  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_awr_location_field_group_info|node|awr_location|form';
  $field_group->group_name = 'group_awr_location_field_group_info';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'awr_location';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Location Information',
    'weight' => '0',
    'children' => array(
      0 => 'title',
      1 => 'awr_location_description',
      2 => 'awr_location_address',
      3 => 'awr_location_city',
      4 => 'awr_location_state',
      5 => 'awr_location_zip',
      6 => 'awr_location_country',
      7 => 'awr_location_phone',
      8 => 'awr_location_website',
      9 => 'awr_location_opened',
      10 => 'awr_location_main_image',
      11 => 'awr_location_simple_image',
      12 => 'awr_location_weather_station',
      13 => 'awr_location_latitude',
      14 => 'awr_location_longitude',
        
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
  $field_groups['group_awr_location_field_group_info|node|awr_location|form'] = $field_group;
  
  //Define awr_location_field_group_tech_info field group
  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_awr_location_field_group_tech_info|node|awr_location|form';
  $field_group->group_name = 'group_awr_location_field_group_tech_info';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'awr_location';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Technical Information',
    'weight' => '1',
    'children' => array(
      0 => 'awr_location_num_stages',
      1 => 'awr_location_distance',
      2 => 'awr_location_configuration',
      3 => 'awr_location_banking',
      4 => 'awr_location_front_stretch',
      5 => 'awr_location_back_stretch',
      6 => 'awr_location_direction',
      7 => 'awr_location_num_turns',
      8 => 'awr_location_elevation_change',
      9 => 'awr_location_surface',
      10 => 'awr_location_altitude',
      11 => 'awr_location_seating',
        
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'Technical Information',
      'instance_settings' => array(
        'required_fields' => 0,
        'classes' => '',
        'description' => '',
      ),
      'formatter' => 'collapsible',
    ),
  );
  $field_groups['group_awr_location_field_group_tech_info|node|awr_location|form'] = $field_group;
  
  //Define awr_location_field_group_hidden field group
  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_awr_location_field_group_hidden|node|awr_location|form';
  $field_group->group_name = 'group_awr_location_field_group_hidden';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'awr_location';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Hidden',
    'weight' => '2',
    'children' => array(
      0 => 'awr_location_legacy_location_id',
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
  $field_groups['group_awr_location_field_group_hidden|node|awr_location|form'] = $field_group;
  
    return $field_groups;
}