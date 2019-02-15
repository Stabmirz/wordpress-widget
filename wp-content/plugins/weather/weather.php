<?php
/*
Plugin Name: Weather Plugin
Plugin URI: http://amirza.techlaunch.online/wordpress-widget/
Author: Abida Mirza
Version: 1.0.0
Author URI: http://amirza.techlaunch.online
License:     GPL2
*/

$plugin_url = WP_PLUGIN_URL . '/weather-plugin';

function plugin_install()
{
    global $wpdb;
    return true;
}

function option_menu()
{
    add_options_page(
        'Weather Plugin',
        'Weather Plugin',
        'manage_options',
        'weather-plugin',
        'option_page'
    );
}

add_action('admin_menu', 'option_menu');

function option_page() {
    
    
    if( !current_user_can( 'manage_options' ) ) {
        
        wp_die( 'You do not have suggicient permissions to access this page.' );
        
    }
    global $plugin_url;
    global $city;
    
    if( isset( $_POST['form_submitted'] ) ) {
        
        $hidden_field = esc_html( $_POST['form_submitted'] );
        
        if( $hidden_field == 'Y' ) {
            
            $city = esc_html( $_POST['city'] );
            
            $weather =  getWeather($city );
            
        }
        
    }
    
    require('inc/weather-plugin.php');


}
function getWeather($city){   
    
    $json_feed_url = 'https://api.openweathermap.org/data/2.5/weather?q=' . $city . '&appid=dc5f7b3695d656163a060520063f2850';
    
    $args = array('timeoute' => 120);
    
    $json_feed = wp_remote_get( $json_feed_url, $args );
    
    $weather_updates = json_decode( $json_feed['body'] );
?>
<div class="postbox">
	<div class="inside">
        <h1 class="head">Weather Updates</h1>
        <article class="weather_widget">
            <div class="weatherData">
                <div class="p1"> <?= $weather_updates->name . ', ' . $weather_updates->sys->country ?> </div>        
                <div class="p3"><?= floor(($weather_updates->main->temp) - 273.15) . '&#8451';?></div>
                <div class="p2">Description : <?= $weather_updates->weather[0]->description;?></div>
            </div>
            <div class="weatherIcon">
                <div id="icon"><img src="http://openweathermap.org/img/w/<?= $weather_updates->weather[0]->icon?>.png" alt="Weather icon"/></div>
                <div class="humidity">Humidity : <?= $weather_updates->main->humidity ; ?> %</div>
                <div class="pressure">Pressure : <?= $weather_updates->main->pressure ; ?>  Pa</div>
                <div class="wind">Wind Speed : <?= $weather_updates->wind->speed ; ?> km/s</div>
                <div class="temp_min">Min. Temparature : <?= floor(($weather_updates->main->temp_min) - 273.15) . '&#8451;' ; ?></div>
                <div class="temp_max">Max. Temperature : <?= floor(($weather_updates->main->temp_max) - 273.15) . '&#8451;' ; ?></div>
            </div>
        </article>
    </div>
</div>
<?php  

}

function plugin_deactivate()
{
    global $wpdb;
    echo "deactivate";
}


function weather_styles() {

	wp_enqueue_style( 'weather_styles', plugins_url( 'weather/main.css' ) );

}


add_action( 'admin_head', 'weather_styles' );
add_action('wp_enqueue_scripts', 'getWeather');

register_activation_hook(__FILE__, 'plugin_install');
register_deactivation_hook(__FILE__, 'plugin_deactivate');



    // add_filter('widget_text','do_shortcode');
    // add_shortcode('weather_widget','getWeather');

    //object(stdClass)#1019 (12) { ["coord"]=> object(stdClass)#1018 (2) { ["lon"]=> float(-80.19) ["lat"]=> float(25.77) } ["weather"]=> array(1) { [0]=> object(stdClass)#1025 (4) { ["id"]=> int(803) ["main"]=> string(6) "Clouds" ["description"]=> string(13) "broken clouds" ["icon"]=> string(3) "04n" } } ["base"]=> string(8) "stations" ["main"]=> object(stdClass)#1023 (5) { ["temp"]=> float(292.28) ["pressure"]=> int(1016) ["humidity"]=> int(88) ["temp_min"]=> float(290.15) ["temp_max"]=> float(295.15) } ["visibility"]=> int(16093) ["wind"]=> object(stdClass)#1026 (2) { ["speed"]=> float(2.1) ["deg"]=> int(350) } ["clouds"]=> object(stdClass)#1027 (1) { ["all"]=> int(75) } ["dt"]=> int(1550210160) ["sys"]=> object(stdClass)#1028 (6) { ["type"]=> int(1) ["id"]=> int(4896) ["message"]=> float(0.0034) ["country"]=> string(2) "US" ["sunrise"]=> int(1550231749) ["sunset"]=> int(1550272455) } ["id"]=> int(4164138) ["name"]=> string(5) "Miami" ["cod"]=> int(200) }
?>
