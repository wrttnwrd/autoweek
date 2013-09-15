<?php

/**
 * Implements hook_field_group_info().
 */
function aw_image_field_group_info() {
  $field_groups = array();
  
  //Define aw_image_field_group_img field group
  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_aw_image_field_group_img|node|aw_image|form';
  $field_group->group_name = 'group_aw_image_field_group_img';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'aw_image';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Image',
    'weight' => '0',
    'children' => array(
      0 => 'title',
      1 => 'aw_image_img',
      2 => 'aw_image_caption',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'Image fields',
      'instance_settings' => array(
        'required_fields' => 1,
        'classes' => '',
        'description' => '',
      ),
      'formatter' => 'collapsible',
    ),
  );
  $field_groups['group_aw_image_field_group_img|node|aw_image|form'] = $field_group;

//Define aw_image_field_group_author field group
  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_aw_image_field_group_author|node|aw_image|form';
  $field_group->group_name = 'group_aw_image_field_group_author';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'aw_image';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Taxonomy',
    'weight' => '1',
    'children' => array(
      0 => 'aw_image_author_ref',
      1 => 'aw_image_author_override',
      2 => 'aw_image_taxonomy',
      3 => 'aw_image_driver',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'Author fields',
      'instance_settings' => array(
        'required_fields' => 1,
        'classes' => '',
        'description' => '',
      ),
      'formatter' => 'collapsible',
    ),
  );
  $field_groups['group_aw_image_field_group_author|node|aw_image|form'] = $field_group;
  
  //Define aw_image_field_group_legacy field group
  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_aw_image_field_group_legacy|node|aw_image|form';
  $field_group->group_name = 'group_aw_image_field_group_legacy';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'aw_image';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Legacy',
    'weight' => '2',
    'children' => array(
      0 => 'aw_image_legacy_url',
      1 => 'aw_image_source_id',
      2 => 'aw_image_legacy_order',
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
  $field_groups['group_aw_image_field_group_legacy|node|aw_image|form'] = $field_group;
  
  return $field_groups;
}