<?php

/**
 * Implements hook_field_group_info().
 */
function aw_video_field_group_info() {
  $field_groups = array();

//Define aw_video_field_group_main field group
  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_aw_video_field_group_main|node|aw_video|form';
  $field_group->group_name = 'group_aw_video_field_group_main';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'aw_video';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Video Info',
    'weight' => '0',
    'children' => array(
      0 => 'title',
      1 => 'aw_video_ext_id',
      2 => 'aw_video_type',
      3 => 'aw_video_img',
      4 => 'aw_video_caption',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'Video Info',
      'instance_settings' => array(
        'required_fields' => 1,
        'classes' => '',
        'description' => '',
      ),
      'formatter' => 'collapsible',
    ),
  );
  $field_groups['group_aw_video_field_group_main|node|aw_video|form'] = $field_group;
  
  //Define group_aw_video_field_group_taxonomy field group
  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_aw_video_field_group_taxonomy|node|aw_video|form';
  $field_group->group_name = 'group_aw_video_field_group_taxonomy';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'aw_video';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Taxonomy',
    'weight' => '1',
    'children' => array(
      0 => 'aw_video_author_ref',
      1 => 'aw_video_author_override',
      2 => 'aw_video_primary_tag',
      3 => 'aw_video_secondary_tag',
      4 => 'aw_video_vehicle',
      5 => 'aw_video_driver',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'Taxonomy',
      'instance_settings' => array(
        'required_fields' => 1,
        'classes' => '',
        'description' => '',
      ),
      'formatter' => 'collapsible',
    ),
  );
  $field_groups['group_aw_video_field_group_taxonomy|node|aw_video|form'] = $field_group;
  
  
  
  
  return $field_groups;
}