<?php
/*
*
Plugin Name: Location Plugin
Plugin URI: http://amirza.techlaunch.online/Wordpress-Widget
Description: This is a Plugin to display locations of a business.
Author: Abida Mirza
Version: 1.0.0
Author URI: http://amirza.techlaunch.online
License: GPL2
* 
*/

$plugin_url = WP_PLUGIN_URL . '/location';

function plugin_install() {

   global $wpdb;
   return true;

}

function option_menu() {

   add_options_page(
       'Location Plugin',
       'Location Plugin',
       'manage_options',
       'Location Plugin',
       'option_page'
   );

}

add_action('admin_menu', 'option_menu');

function option_page() {

   if( !current_user_can( 'manage_options' ) ) {

       wp_die( 'You don\'t have sufficient permissions to access this page.' );

   }

   global $plugin_url;
   global $name;

   if( isset( $_POST['form_submitted'] ) ) {

       $hidden_field = $_POST['form_submitted'] ;

       if( $hidden_field == 'Y' ) {

           $name =  $_POST['name'] ;

           $location =  getLocation($name );

       }

   }

   require('inc/location-plugin.php');
}

function getLocation($name){

    $url = 'https://www.google.com/maps/search/?api=1&amp;query=' . $name;
?>

<div>
    <article>
        <div>
            <h1>Locations of <?= $name; ?></h1>
            <div style=" background-color: white; height: 100px; width: 450px; padding: 20px 20px 20px 20px; font-size:20px;" >
                <a style="color:red; text-decoration:none" href="<?= $url; ?>">Click to see Locations of <?=$name?></a>
            </div>
        </div>
    </article>
</div>

<?php
}
function plugin_deactivate()
{
   global $wpdb;
   echo "deactivate";
}

add_action('wp_enqueue_scripts', 'getLocation');
register_activation_hook(__FILE__, 'plugin_install');
register_deactivation_hook(__FILE__, 'plugin_deactivate');
?>