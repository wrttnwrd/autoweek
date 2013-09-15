<?php

/**
 * Implements hook_field_group_info().
 */
function aws_company_field_group_info() {
  $field_groups = array();
  
  //Define group_aws_company_info field group
  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_aws_company_info|node|aws_company|form';
  $field_group->group_name = 'group_aws_company_info';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'aws_company';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Company Information',
    'weight' => '0',
    'children' => array(
      0 => 'title',
      1 => 'aws_company_address',
      2 => 'aws_company_city',
      3 => 'aws_company_state',
      4 => 'aws_company_zip',
      5 => 'aws_company_country',
      6 => 'aws_company_website',
      7 => 'aws_company_description',
      8 => 'aws_company_store',
      9 => 'aws_company_legacy_store',
      10 => 'aws_company_logo',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'Company Information',
      'instance_settings' => array(
        'required_fields' => 1,
        'classes' => '',
        'description' => '',
      ),
      'formatter' => 'collapsible',
    ),
  );
  $field_groups['group_aws_company_info|node|aws_company|form'] = $field_group;
  
  //Define group_aws_company_sema field group
  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_aws_company_sema|node|aws_company|form';
  $field_group->group_name = 'group_aws_company_sema';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'aws_company';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'SEMA Company Information',
    'weight' => '0',
    'children' => array(
      0 => 'aws_company_nforgid',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'SEMA Company Information',
      'instance_settings' => array(
        'required_fields' => 1,
        'classes' => '',
        'description' => '',
      ),
      'formatter' => 'collapsed',
    ),
  );
  $field_groups['group_aws_company_sema|node|aws_company|form'] = $field_group;
  
  
    return $field_groups;
}