<?php

/**
 * Implements hook_field_group_info().
 */
function awr_driver_bio_field_group_info() {
  $field_groups = array();
  
  //Define awr_driver_bio_field_group_info field group
  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_awr_driver_bio_field_group_info|node|awr_driver_bio|form';
  $field_group->group_name = 'group_awr_driver_bio_field_group_info';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'awr_driver_bio';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Driver Info',
    'weight' => '0',
    'children' => array(
      0 => 'title',
      1 => 'awr_driver_bio_first_name',
      2 => 'awr_driver_bio_last_name',
      3 => 'awr_driver_bio_main_img',
      4 => 'awr_driver_bio_card_img',
      5 => 'awr_driver_bio_website',
      6 => 'awr_driver_bio_fb',
      7 => 'awr_driver_bio_twitter',
      8 => 'awr_driver_bio_twitter_widget',
        
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
  $field_groups['group_awr_driver_bio_field_group_info|node|awr_driver_bio|form'] = $field_group;
  
  //Define awr_driver_bio_field_group_bio field group
  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_awr_driver_bio_field_group_bio|node|awr_driver_bio|form';
  $field_group->group_name = 'group_awr_driver_bio_field_group_bio';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'awr_driver_bio';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Driver Bio',
    'weight' => '1',
    'children' => array(
      0 => 'awr_driver_bio_birthdate',
      1 => 'awr_driver_bio_hometown',
      2 => 'awr_driver_bio_residence',
      3 => 'awr_driver_bio_debut',
      4 => 'awr_driver_bio_summary',
      5 => 'awr_driver_bio_full',
        
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'Driver Bio',
      'instance_settings' => array(
        'required_fields' => 1,
        'classes' => '',
        'description' => '',
      ),
      'formatter' => 'collapsible',
    ),
  );
  $field_groups['group_awr_driver_bio_field_group_bio|node|awr_driver_bio|form'] = $field_group;
  
  //Define awr_driver_bio_field_group_hidden field group
  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_awr_driver_bio_field_group_hidden|node|awr_driver_bio|form';
  $field_group->group_name = 'group_awr_driver_bio_field_group_hidden';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'awr_driver_bio';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Legacy',
    'weight' => '2',
    'children' => array(
      0 => 'awr_driver_bio_legacy_driver_id',
      1 => 'awr_driver_bio_saxid',
        
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
  $field_groups['group_awr_driver_bio_field_group_hidden|node|awr_driver_bio|form'] = $field_group;
  
  return $field_groups;
}