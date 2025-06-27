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

// Populate Themes
function acf_load_themes( $field ) {
  $field['choices'] = array();
  if( get_field('colors', 'option')['color_modes'] ) {
    foreach(get_field('colors', 'option')['color_modes'] as $mode){
      $value = $mode['name'];
      $label = $mode['name'];
      $field['choices'][ $value ] = $label;
    }
  }
  return $field; 
}

add_filter('acf/load_field/name=themes',  __NAMESPACE__ . '\\acf_load_themes');