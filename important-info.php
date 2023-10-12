<?php
/*
Plugin Name: Display WordPress Version
Description: This plugin displays the current WordPress version in the footer.
Version: 1.0
Author: Your Name
*/


function display_wordpress_version_shortcode() {
    // Include basic.php
    include plugin_dir_path( __FILE__ ) . 'basic.php';

    // Get WordPress version
    $wp_version = get_wp_version();

    // Get PHP version
    $php_version = phpversion();

    // Get theme info
    $theme = wp_get_theme();
    $theme_name = $theme->get('Name');
    $theme_version = $theme->get('Version');

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
}
add_shortcode('wp_version', 'display_wordpress_version_shortcode');

function display_data_display_page(){
     // Include basic.php
     include plugin_dir_path( __FILE__ ) . 'basic.php';

     // Get WordPress version
     $wp_version = get_wp_version();
 
     // Get PHP version
     $php_version = phpversion();
 
     // Get theme info
     $theme = wp_get_theme();
     $theme_name = $theme->get('Name');
     $theme_version = $theme->get('Version');
 
     // Get all installed plugins
     $all_plugins = get_plugins();
 
     // Get active plugins
     $active_plugins = get_option('active_plugins');
 
     // Start output
     $output = ' Active Plugins: ';
 
     // Loop through all plugins
     foreach ($all_plugins as $plugin_path => $plugin_info) {
         // Check if plugin is active
         if (in_array($plugin_path, $active_plugins)) {
             $output .= $plugin_info['Name'] . ' (active), ';
         } else {
             $output .= $plugin_info['Name'] . ', ';
         }
     } ?>
     <!DOCTYPE html>
     <html>
     <head>
         <title>Bootstrap Form</title>
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
     </head>
     <body>
     <table class="table">
        <h1>Basic Info</h1>
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Version</th>
      <th scope="col">Other</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>WordPress Version</td>
      <td><?php echo $wp_version  ?></td>
      <td></td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>PHP Version</td>
      <td><?php echo $php_version  ?></td>
      <td></td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Current Theme</td>
      <td><?php echo $theme_version  ?></td>
      <td><?php echo $theme_name  ?></td>
      
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>PHP Version</td>
      <td><?php echo $php_version  ?></td>
      <td></td>
    </tr>
   
  </tbody>
</table>
<table class="table">
    <h1>Plugin Info</h1>
    <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Version</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
<?php
    $counter = 1;
     foreach ($all_plugins as $plugin_path => $plugin_info) {
        
        // Check if plugin is active
        if (in_array($plugin_path, $active_plugins)) {
            
            // $output .= $plugin_info['Name'] . ' (active), ';
            ?>
            <tr>
            <th scope="row"><?php echo $counter ?></th>
                <td><?php echo $plugin_info['Name'] ?></td>
                <td><?php echo $plugin_info['Version'] ?></td>
                <td><?php echo "ACTIVE"  ?></td>
               
            </tr>
            <?php
        } else { 
            
            ?>
        <tr>
            <th scope="row"><?php echo $counter ?></th>
                <td><?php echo $plugin_info['Name'] ?></td>
                <td><?php echo $plugin_info['Version'] ?></td>
                <td><?php echo "INACTIVE"  ?></td>
                </tr>
                <?php  
        }
        $counter = $counter+1;
        
    }
   
    ?>
    </tbody>
</table>
     </body>
     </html>
     
   
    <?php 
}
function memory_increases_add_menu_item()
{
    add_menu_page('Display Data', 'Display Data', 'manage_options', 'display_data', 'display_data_display_page', 'dashicons-admin-generic', 7);
}
add_action('admin_menu', 'memory_increases_add_menu_item');
