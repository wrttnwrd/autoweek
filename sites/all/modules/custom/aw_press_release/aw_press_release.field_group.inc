<?php

/**
 * Implements hook_field_group_info().
 */
function aw_press_release_field_group_info() {
  $field_groups = array();
  
  //Define group_aw_press_release_field_group_content field group
  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_aw_press_release_field_group_content|node|aw_press_release|form';
  $field_group->group_name = 'group_aw_press_release_field_group_content';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'aw_press_release';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Press Release Content',
    'weight' => '0',
    'children' => array(
      0 => 'title',
      1 => 'body',
      2 => 'aw_press_release_attachments',
      3 => 'aw_press_release_author',      
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'Press Release Content',
      'instance_settings' => array(
        'required_fields' => 1,
        'classes' => '',
        'description' => '',
      ),
      'formatter' => 'collapsible',
    ),
  );
  $field_groups['group_aw_press_release_field_group_content|node|aw_press_release|form'] = $field_group;
  
  //Define group_aw_press_release_field_group_racing field group
  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_aw_press_release_field_group_racing|node|aw_press_release|form';
  $field_group->group_name = 'group_aw_press_release_field_group_racing';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'aw_press_release';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Racing Press Release Fields',
    'weight' => '0',
    'children' => array(
      0 => 'aw_press_release_class',
      1 => 'aw_press_release_email',      
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'Racing Press Release Fields',
      'instance_settings' => array(
        'required_fields' => 1,
        'classes' => '',
        'description' => '',
      ),
      'formatter' => 'collapsed',
    ),
  );
  $field_groups['group_aw_press_release_field_group_racing|node|aw_press_release|form'] = $field_group;
  
  return $field_groups;
}