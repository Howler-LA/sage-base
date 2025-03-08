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