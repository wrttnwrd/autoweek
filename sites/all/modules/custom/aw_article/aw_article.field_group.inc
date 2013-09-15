<?php

/**
 * Implements hook_field_group_info().
 */
function aw_article_field_group_info() {
  $field_groups = array();
  
  //Define aw_article_field_group_titles field group
  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_aw_article_field_group_titles|node|aw_article|form';
  $field_group->group_name = 'group_aw_article_field_group_titles';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'aw_article';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Article Content',
    'weight' => '0',
    'children' => array(
      0 => 'title',
      1 => 'aw_article_alt_title',
      2 => 'aw_article_headline',
      3 => 'aw_article_sub_headline',
      4 => 'aw_article_super_headline',
      5 => 'aw_article_main_image',
      6 => 'aw_article_content',
      7 => 'aw_article_attachments',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'Title/Headline fields',
      'instance_settings' => array(
        'required_fields' => 1,
        'classes' => '',
        'description' => '',
      ),
      'formatter' => 'collapsible',
    ),
  );
  $field_groups['group_aw_article_field_group_titles|node|aw_article|form'] = $field_group;

//Define aw_article_field_group_tax field group
  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_article_field_group_tax|node|aw_article|form';
  $field_group->group_name = 'group_article_field_group_tax';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'aw_article';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Taxonomy/Keyword fields',
    'weight' => '1',
    'children' => array(
      0 => 'aw_article_keywords',
      1 => 'aw_article_primary_tag',
      2 => 'aw_article_secondary_tag',
      3 => 'aw_article_vehicle',
      4 => 'aw_article_author_ref',
      5 => 'aw_article_author_override',
      6 => 'aw_article_track_ref',
      7 => 'aw_article_related',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'Taxonomy/Keyword fields',
      'instance_settings' => array(
        'required_fields' => 1,
        'classes' => '',
        'description' => '',
      ),
      'formatter' => 'collapsible',
    ),
  );
  $field_groups['group_article_field_group_tax|node|aw_article|form'] = $field_group;
  
  //Define aw_article_field_group_review field group
  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_aw_article_field_group_review|node|aw_article|form';
  $field_group->group_name = 'group_aw_article_field_group_review';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'aw_article';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Vehicle Review fields',
    'weight' => '4',
    'children' => array(
      0 => 'aw_article_review_sale_date',
      1 => 'aw_article_review_base_price',
      2 => 'aw_article_review_tested_price',
      3 => 'aw_article_review_drivetrain',
      4 => 'aw_article_review_output',
      5 => 'aw_article_review_curb_weight',
      6 => 'aw_article_review_zero_to_sixty',
      7 => 'aw_article_review_fuel_economy',
      8 => 'aw_article_review_obs_fuel_eco',
      9 => 'aw_article_review_options',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'Vehicle Review fields',
      'instance_settings' => array(
        'required_fields' => 1,
        'classes' => '',
        'description' => '',
      ),
      'formatter' => 'collapsed',
    ),
  );
  $field_groups['group_aw_article_field_group_review|node|aw_article|form'] = $field_group;
  
  //Define aw_article_field_group_legacy field group
  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_aw_article_field_group_legacy|node|aw_article|form';
  $field_group->group_name = 'group_aw_article_field_group_legacy';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'aw_article';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Legacy fields',
    'weight' => '5',
    'children' => array(
      0 => 'aw_article_legacy_slug',
      1 => 'aw_article_legacy_linked_video_1',
      2 => 'aw_article_legacy_linked_video_2',
      3 => 'aw_article_legacy_linked_video_3',
      4 => 'aw_article_legacy_article_id',
      5 => 'aw_article_legacy_category',
      6 => 'aw_article_legacy_url',
      7 => 'aw_article_legacy_seo_title',
      8 => 'aw_article_legacy_seo_label',
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
  $field_groups['group_aw_article_field_group_legacy|node|aw_article|form'] = $field_group;
  
  
  return $field_groups;
}