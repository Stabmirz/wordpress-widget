<?php
/*
Plugin Name: New Widget
Plugin URI: http://wordpress.org/extend/plugins/#
Description: This is an example plugin
Author: Abida Mirza
Version: 1.0.0
Author URI: http://amirza.techlaunch.online
*/

// register New_Widget
add_action('widgets_init', function(){
   register_widget( 'New_Widget' );
});

class New_Widget extends WP_Widget {
 /**
 * To create the example widget all four methods will be
 * nested inside this single instance of the WP_Widget class.
 **/
 public function __construct() {
   $widget_options = array(
     'classname' => 'new_widget',
     'description' => 'This is a new Widget example for WP class',
   );
   parent::__construct( 'new_widget', 'New Widget', $widget_options );
 }

public function widget( $args, $instance ) {
   $title = apply_filters( 'widget_title', $instance[ 'title' ] );
   $blog_title = get_bloginfo( 'name' );
   $tagline = get_bloginfo( 'description' );
   echo $args['before_widget'] . $args['before_title'] . $title . $args['after_title']; ?>

   <p><strong>Site Name:</strong> <?php echo $blog_title ?></p>
   <p><strong>Tagline:</strong> <?php echo $tagline ?></p>

   <?php echo $args['after_widget'];
 }

 public function form( $instance ) {
   $title = ! empty( $instance['title'] ) ? $instance['title'] : ''; ?>
   <p>
     <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
     <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
   </p><?php
 }

 public function update( $new_instance, $old_instance ) {
   $instance = $old_instance;
   $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
   return $instance;
 }
}