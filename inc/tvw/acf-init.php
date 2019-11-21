<?php

add_filter('acf/settings/load_json', 'parent_theme_field_groups');

if (!function_exists('parent_theme_field_groups')) {
  function parent_theme_field_groups($paths) {
    $path = get_template_directory().'/acf-json';
    $paths[] = $path;
    return $paths;
  }
}

?>
