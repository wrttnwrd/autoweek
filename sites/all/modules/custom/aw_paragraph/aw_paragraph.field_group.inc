<?php

/**
 * Implements hook_field_group_info().
 */
function aw_paragraph_field_group_info() {
  $field_groups = array();

//Define aw_paragraph_field_group_paragraph field group
  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_aw_paragraph_field_group_paragraph|node|aw_paragraph|form';
  $field_group->group_name = 'group_aw_paragraph_field_group_paragraph';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'aw_paragraph';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Paragraph',
    'weight' => '0',
    'children' => array(
      0 => 'title',
      1 => 'aw_paragraph_show_heading',
      2 => 'aw_paragraph_sub_head',
      3 => 'aw_paragraph_text',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'Paragraph',
      'instance_settings' => array(
        'required_fields' => 1,
        'classes' => '',
        'description' => '',
      ),
      'formatter' => 'collapsible',
    ),
  );
  $field_groups['group_aw_paragraph_field_group_paragraph|node|aw_paragraph|form'] = $field_group;

//Define aw_paragraph_field_group_legacy field group
  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_aw_paragraph_field_group_legacy|node|aw_paragraph|form';
  $field_group->group_name = 'group_aw_paragraph_field_group_legacy';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'aw_paragraph';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Legacy',
    'weight' => '0',
    'children' => array(
      0 => 'aw_paragraph_facts',
      1 => 'aw_paragraph_legacy_block_id',
      2 => 'aw_paragraph_legacy_article_id',
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
  $field_groups['group_aw_paragraph_field_group_legacy|node|aw_paragraph|form'] = $field_group;
  
  return $field_groups;
}
