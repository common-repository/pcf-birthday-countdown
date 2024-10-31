<?php
function pcfcb_register_widgets() {
	register_widget( 'pcfcb_Widget');
}
add_action( 'widgets_init', 'pcfcb_register_widgets' );

class pcfcb_Widget extends WP_Widget {

	function pcfcb_Widget() {
		// Instantiate the parent object
		parent::__construct(
	            'pcfcb_widget', // Base ID
        	    __('Birthday Countdown', 'text_domain'), // Name
 	           array( 'description' => __( 'Birthday Countdown', 'text_domain' ), ) // Args
		);
	}
    
    function form($instance){
        $type = '';
        $id = '';
        
        if($instance){
            $type = esc_attr($instance['type']);
            $id = esc_attr($instance['id']);
        }
?>
        <p>
            <label for="<?php echo $this->get_field_id('type');?>">Type: </label>
            <input class="widefat" id="<?php echo $this->get_field_id('type');?>" name="<?php echo $this->get_field_name('type');?>" type="text" value="<?php echo $type ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('id');?>">ID: </label>
            <input class="widefat" id="<?php echo $this->get_field_id('id');?>" name="<?php echo $this->get_field_name('id');?>" type="text" value="<?php echo $id ?>">
        </p>
<?php
    }

	function widget($args, $instance) {
		echo $args['before_widget'];
        pcfcb_countdown($instance['id'], $instance['type']);
        echo $args['after_widget'];
	}
    
    function update($new_instance, $old_instance){
        $instance = $old_instance;
        
        $instance['type'] = strip_tags($new_instance['type']);
        $instance['id'] = strip_tags($new_instance['id']);
        
        return $instance;
    }
}
?>