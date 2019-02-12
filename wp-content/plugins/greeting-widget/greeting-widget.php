<?php
/*
Plugin Name: Greeting Widget
Plugin URI: http://wordpress.org/extend/plugins/#
Description: This is an example plugin
Author: Abida Mirza
Version: 1.0.0
Author URI: http://amirza.techlaunch.online
*/

// register Greeting_Widget
add_action('widgets_init', function(){
  register_widget( 'Greeting_Widget' );
});

class Greeting_Widget extends WP_Widget {
  /**
  * To create the example widget all four methods will be
  * nested inside this single instance of the WP_Widget class.
  **/
  public function __construct() {
    $widget_options = array(
     'classname' => 'greeting_widget',
     'description' => 'This is a Greeting Widget example for WP class',
    );
    parent::__construct( 'greeting_widget', 'Greeting Widget', $widget_options );
  }

  public function widget( $args, $instance ) {
    $title = apply_filters( 'widget_title', $instance[ 'title' ] );
    echo $args['before_widget'];
    echo $args['before_title'];
    echo $title;
    echo $args['after_title'];
    $greetings=array("Hello and Welcome to my Page."=>"one", "Oh, hi there! I make websites that 'function' and 'sparkle'."=>"two","Hi there! I craft beautiful & usable websites."=>"three","Hello, my name is Abida Mirza, I'm a web developer & I love to create beautiful User Interfaces"=>"four","Hi, I'm Abida. I'm a passionate webdesigner who love to create clean websites.Check it out!"=>"one");?>
    <p style="color:red; font-size:24 px; font-style:italic"><?php
      print_r(array_rand($greetings ,1));?>
    </p><?php
    echo $args['after_widget'];
  }

  public function form( $instance ) {
    $title = ! empty( $instance['title'] ) ? $instance['title'] : ''; ?>
    <p>
     <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
     <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
    </p><?php
  }

  public function update( $greeting_instance, $old_instance ) {
    $instance = $old_instance;
    $instance[ 'title' ] = strip_tags( $greeting_instance[ 'title' ] );
    return $instance;
  }
}