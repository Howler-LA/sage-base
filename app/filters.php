<?php

/**
 * Theme filters.
 */

namespace App;

/**
 * Add "… Continued" to the excerpt.
 *
 * @return string
 */
add_filter('excerpt_more', function () {
    return sprintf(' &hellip; <a href="%s">%s</a>', get_permalink(), __('Continued', 'sage'));
});

add_filter( 'acf/load_attachment',  __NAMESPACE__ . '\\custom_load_attachment', 10, 3);

/**
 * Custom ACF attachment loader to set medium size as icon for images.
 * 
 * @param array $response The attachment response array
 * @param object $attachment The attachment object
 * @param array $meta The attachment meta array
 * @return array Modified response with icon set to medium size for images
 * @since 1.0.0
 */
function custom_load_attachment ($response, $attachment, $meta){
  if ($response['type'] == 'image'){
    $response['icon'] = $response['sizes']['medium'];
  }
  return $response;
}

add_filter('acf/fields/flexible_content/layout_title',  __NAMESPACE__ . '\\my_acf_fields_flexible_content_layout_title', 10, 4);

/**
 * Customize ACF flexible content layout titles with content headline.
 * 
 * @param string $title The original layout title
 * @param array $field The field array
 * @param array $layout The layout array
 * @param int $i The layout index
 * @return string Modified title with headline appended
 * @since 1.0.0
 */
function my_acf_fields_flexible_content_layout_title( $title, $field, $layout, $i ) {
  // Remove layout name from title.
  $new_title = '';

  // load text sub field
  $sub_field = get_sub_field('content');
  if (isset($sub_field['headline']) && $sub_field['headline']) {
    $new_title .= '<span style="font-weight:bold">'.esc_html($title).'</span> <span>— ' . esc_html($sub_field['headline']) . '</span>';
  } else {
    $new_title = esc_html($title); // Fallback to the default with sanitization
  }

  return $new_title;
}

// Populate Themes
/**
 * Populate ACF theme select fields with available color modes.
 * Uses static caching to prevent repeated option queries.
 * 
 * @param array $field The ACF field array
 * @return array Modified field with populated choices
 * @since 1.0.0
 */
function acf_load_themes( $field ) {
  static $cached_choices = null;
  
  if ($cached_choices === null) {
    $cached_choices = [];
    
    // Debug the ACF field value
    if (function_exists('sage_debug_acf_field')) {
        $colors_field = sage_debug_acf_field('colors', 'option');
    } else {
        $colors_field = get_field('colors', 'option');
        if (defined('WP_DEBUG') && WP_DEBUG) {
            error_log("ACF colors field type: " . gettype($colors_field));
            error_log("ACF colors field value: " . print_r($colors_field, true));
        }
    }
    
    if( $colors_field && is_array($colors_field) && isset($colors_field['color_modes']) && is_array($colors_field['color_modes']) ) {
      foreach($colors_field['color_modes'] as $mode){
        if (isset($mode['name'])) {
          $value = $mode['name'];
          $label = $mode['name'];
          $cached_choices[ $value ] = $label;
        }
      }
    } else {
      if (defined('WP_DEBUG') && WP_DEBUG) {
        error_log("ACF colors field is not properly structured for theme loading");
      }
    }
  }
  
  $field['choices'] = $cached_choices;
  return $field; 
}

/**
 * Populate ACF card theme select fields with available color modes.
 * Includes 'inherit' option and uses static caching for performance.
 * 
 * @param array $field The ACF field array
 * @return array Modified field with populated choices
 * @since 1.0.0
 */
function acf_load_card_themes( $field ) {
  static $cached_choices = null;
  
  if ($cached_choices === null) {
    $cached_choices = [];
    // Add default 'inherit' choice
    $cached_choices[''] = 'Inherit theme';
    $colors_field = get_field('colors', 'option');
    if( $colors_field && is_array($colors_field) && isset($colors_field['color_modes']) ) {
      foreach($colors_field['color_modes'] as $mode){
        $value = $mode['name'];
        $label = $mode['name'];
        $cached_choices[ $value ] = $label;
      }
    }
  }
  
  $field['choices'] = $cached_choices;
  return $field; 
}

add_filter('acf/load_field/name=themes',  __NAMESPACE__ . '\\acf_load_themes');
add_filter('acf/load_field/name=themes_secondary',  __NAMESPACE__ . '\\acf_load_themes');
add_filter('acf/load_field/name=themes_cards',  __NAMESPACE__ . '\\acf_load_themes');
add_filter('acf/load_field/name=themes_card',  __NAMESPACE__ . '\\acf_load_card_themes');