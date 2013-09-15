<?php

/**
 * Implements hook_field_group_info().
 */
function aws_product_field_group_info() {
  $field_groups = array();
  
  //Define group_aws_product_info field group
  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_aws_product_info|node|aws_product|form';
  $field_group->group_name = 'group_aws_product_info';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'aws_product';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Product Information',
    'weight' => '0',
    'children' => array(
      0 => 'title',
      1 => 'aws_product_description',
      2 => 'aws_product_image',
      3 => 'aws_product_content',
      4 => 'aws_product_id',
      5 => 'aws_product_price',
      6 => 'aws_product_company_ref',
      7 => 'aws_product_store_category',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'Product Information',
      'instance_settings' => array(
        'required_fields' => 1,
        'classes' => '',
        'description' => '',
      ),
      'formatter' => 'collapsible',
    ),
  );
  $field_groups['group_aws_product_info|node|aws_product|form'] = $field_group;
  
  //Define group_aws_product_contact field group
  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_aws_product_contact|node|aws_product|form';
  $field_group->group_name = 'group_aws_product_contact';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'aws_product';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Contact Information',
    'weight' => '1',
    'children' => array(
      0 => 'aws_product_url',
      1 => 'aws_product_contact_name',
      2 => 'aws_product_contact_email',
      3 => 'aws_product_contact_phone',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'Contact Information',
      'instance_settings' => array(
        'required_fields' => 1,
        'classes' => '',
        'description' => '',
      ),
      'formatter' => 'collapsible',
    ),
  );
  $field_groups['group_aws_product_contact|node|aws_product|form'] = $field_group;
  
  //Define group_aws_product_sema field group
  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_aws_product_sema|node|aws_product|form';
  $field_group->group_name = 'group_aws_product_sema';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'aws_product';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'SEMA Product Information',
    'weight' => '2',
    'children' => array(
      0 => 'aws_product_booth',
      1 => 'aws_product_pic_id',
      2 => 'aws_product_bcheckin',
      3 => 'aws_product_nforgid',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'SEMA Product Information',
      'instance_settings' => array(
        'required_fields' => 1,
        'classes' => '',
        'description' => '',
      ),
      'formatter' => 'collapsed',
    ),
  );
  $field_groups['group_aws_product_sema|node|aws_product|form'] = $field_group;
  
  //Define group_aws_product_legacy field group
  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_aws_product_legacy|node|aws_product|form';
  $field_group->group_name = 'group_aws_product_legacy';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'aws_product';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Legacy',
    'weight' => '3',
    'children' => array(
      0 => 'aws_product_legacy_category',
      1 => 'aws_product_legacy_store',
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
  $field_groups['group_aws_product_legacy|node|aws_product|form'] = $field_group;
  
  
    return $field_groups;
}