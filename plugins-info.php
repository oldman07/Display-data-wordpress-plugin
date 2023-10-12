<?php

 // Get all installed plugins
 $all_plugins = get_plugins();

 // Get active plugins
 $active_plugins = get_option('active_plugins');

 // Start output
 $output = 'WordPress Version: ' . $wp_version . ', PHP Version: ' . $php_version . ', Current Theme: ' . $theme_name . ', Version: ' . $theme_version . ', Active Plugins: ';

 // Loop through all plugins
 foreach ($all_plugins as $plugin_path => $plugin_info) {
     // Check if plugin is active
     if (in_array($plugin_path, $active_plugins)) {
         $output .= $plugin_info['Name'] . ' (active), ';
     } else {
         $output .= $plugin_info['Name'] . ', ';
     }
 }

 // Return all information
 return $output;