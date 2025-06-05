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

function custom_load_attachment ($response, $attachment, $meta){
  if ($response['type'] == 'image'){
    $response['icon'] = $response['sizes']['medium'];
  }
  return $response;
}

add_filter('acf/fields/flexible_content/layout_title',  __NAMESPACE__ . '\\my_acf_fields_flexible_content_layout_title', 10, 4);

function my_acf_fields_flexible_content_layout_title( $title, $field, $layout, $i ) {
  // Remove layout name from title.
  $new_title = '';

  // load text sub field
  $sub_field = get_sub_field('content');
  if (isset($sub_field['headline']) && $sub_field['headline']) {
    $new_title .= '<span style="font-weight:bold">'.$title.'</span> <span>— ' . esc_html($sub_field['headline']) . '</span>';
  } else {
    $new_title = $title; // Fallback to the default
  }

  return $new_title;
}

// Populate Themes
function acf_load_themes( $field ) {
  $field['choices'] = array();
  if( get_field('brand', 'option')['modes'] ) {
    foreach(get_field('brand', 'option')['modes'] as $mode){
      $value = $mode['name'];
      $label = $mode['name'];
      $field['choices'][ $value ] = $label;
    }
  }
  return $field; 
}

add_filter('acf/load_field/name=theme',  __NAMESPACE__ . '\\acf_load_themes');
