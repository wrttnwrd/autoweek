<?php

/**
 * Implements hook_field_group_info().
 */
function aw_gallery_field_group_info() {
  $field_groups = array();
  
  //Define aw_gallery_field_group_info field group
  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_aw_gallery_field_group_info|node|aw_gallery|form';
  $field_group->group_name = 'group_aw_gallery_field_group_info';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'aw_gallery';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Gallery',
    'weight' => '0',
    'children' => array(
      0 => 'title',
      1 => 'aw_gallery_description',
      2 => 'aw_gallery_multipage',
      3 => 'aw_gallery_slides',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'Gallery',
      'instance_settings' => array(
        'required_fields' => 1,
        'classes' => '',
        'description' => '',
      ),
      'formatter' => 'collapsible',
    ),
  );
  $field_groups['group_aw_gallery_field_group_info|node|aw_gallery|form'] = $field_group;
  
  //Define aw_gallery_field_group_tags field group
  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_aw_gallery_field_group_tags|node|aw_gallery|form';
  $field_group->group_name = 'group_aw_gallery_field_group_tags';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'aw_gallery';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Tags',
    'weight' => '2',
    'children' => array(
      0 => 'aw_gallery_author_ref',
      1 => 'aw_gallery_author_override',        
      2 => 'aw_gallery_primary_tag',
      3 => 'aw_gallery_secondary_tag',
      4 => 'aw_gallery_driver',
      5 => 'aw_gallery_vehicle',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'Tags',
      'instance_settings' => array(
        'required_fields' => 1,
        'classes' => '',
        'description' => '',
      ),
      'formatter' => 'collapsible',
    ),
  );
  $field_groups['group_aw_gallery_field_group_tags|node|aw_gallery|form'] = $field_group;
  
  
  //Define aw_gallery_field_group_legacy field group
  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_aw_gallery_field_group_legacy|node|aw_gallery|form';
  $field_group->group_name = 'group_aw_gallery_field_group_legacy';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'aw_gallery';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Legacy fields',
    'weight' => '4',
    'children' => array(
      0 => 'aw_gallery_legacy_url',
      1 => 'aw_gallery_legacy_id',
      2 => 'aw_gallery_legacy_category',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'Legacy fields',
      'instance_settings' => array(
        'required_fields' => 1,
        'classes' => '',
        'description' => '',
      ),
      'formatter' => 'collapsed',
    ),
  );
  $field_groups['group_aw_gallery_field_group_legacy|node|aw_gallery|form'] = $field_group;
  
  return $field_groups;
}