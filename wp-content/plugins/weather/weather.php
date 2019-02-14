<?php
/*
Plugin Name: Weather Plugin
Plugin URI: http://amirza.techlaunch.online/wordpress-widget/
Author: Abida Mirza
Version: 1.0.0
Author URI: http://amirza.techlaunch.online
*/


function widget_install()
{

global $wpdb;
return true;
}


function widget_style()
{


    wp_register_style('css',plugin_dir_url(__FILE__).'style/style.css');
    wp_enqueue_style('css');



    wp_enqueue_script( 'script1', plugins_url('scripts/jquery-3.2.1.min.js', __FILE__), array('jquery'));

    wp_enqueue_script( 'script', plugins_url('scripts/js.js', __FILE__), array('jquery'));


}



function Widget_plugin()
{

    ob_start();
    $data = include_once('show_weather_widget.php');
    return ob_get_clean();
}



function widget_uninstall()
{
    global $wpdb;
    echo "Uninstall";
}


add_filter('widget_text','do_shortcode');

add_shortcode('weather_widget','Widget_plugin');

register_activation_hook(__FILE__, 'widget_install');

register_deactivation_hook(__FILE__, 'widget_uninstall');



add_action( 'wp_enqueue_scripts', 'widget_style');


?>
