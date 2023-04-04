<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}
//https://www.hostinger.com/tutorials/how-to-create-custom-widget-in-wordpress
function wpfunos_register_widgetdirectorio() {
  register_widget( 'wpfunoswidgetdirectorio' );
}
add_action( 'widgets_init', 'wpfunos_register_widgetdirectorio' );

class wpfunoswidgetdirectorio extends WP_Widget {
  function __construct() {
    parent::__construct(
      // widget ID
      'wpfunoswidgetdirectorio',
      // widget name
      __('Funos directorio', 'wpfunos'),
      // widget description
      array( 'description' => __( 'Funos navegación directorio', 'wpfunos' ), )
    );
  }
  public function widget( $args, $instance ) {
    $title = apply_filters( 'widget_title', $instance['title'] );
    echo $args['before_widget'];
    //if title is present
    if ( ! empty( $title ) )
    echo $args['before_title'] . $title . $args['after_title'];
    //output


    echo __( 'Resultado widget directorio', 'wpfunos' );



    echo $args['after_widget'];
  }
  public function form( $instance ) {
    if ( isset( $instance[ 'title' ] ) )
    $title = $instance[ 'title' ];
    else
    $title = __( 'Default Title', 'wpfunos' );
    ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>
    <?php
  }
  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    return $instance;
  }
}
