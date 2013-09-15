<?php

/**
 * Implements hook_field_group_info().
 */
function aw_issue_field_group_info() {
  $field_groups = array();
  
  //Define group_aw_issue_field_group_headlines field group
  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_aw_issue_field_group_headlines|node|aw_issue|form';
  $field_group->group_name = 'group_aw_issue_field_group_headlines';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'aw_issue';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Headlines / PDFs',
    'weight' => '0',
    'children' => array(
      0 => 'aw_issue_headline',
      1 => 'aw_issue_file',        
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'Headlines / PDFs',
      'instance_settings' => array(
        'required_fields' => 1,
        'classes' => '',
        'description' => '',
      ),
      'formatter' => 'collapsible',
    ),
  );
  $field_groups['group_aw_issue_field_group_headlines|node|aw_issue|form'] = $field_group;
  
  return $field_groups;
}