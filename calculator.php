
<?php

/*
Plugin Name: Revenue Interest Calculator
Plugin URI: http://jakir.me
Description: Revenue Interest Calculator WordPress Widget.
Author: Jakir Hossain
Version: 1
Author URI: http://jakir.me
*/

?>
<?php
/**
 * Example Widget Class
 */
class example_widget extends WP_Widget {
 
 
    /** constructor -- name this the same as the class above */
    function example_widget() {
        parent::WP_Widget(false, $name = 'Revenue Interest Calculator');	
    }
 
    /** @see WP_Widget::widget -- do not rename this */
    function widget($args, $instance) {	
        extract( $args );
        $title 		= apply_filters('widget_title', $instance['title']);
        
        ?>
              <?php echo $before_widget; ?>
                  <?php if ( $title )
                        echo $before_title . $title . $after_title; ?>
					
 <div class="">
 
 How much do you want to earn each month?
<br />
 <input id="monthly_income_wanted" name="monthly_income_wanted" type="text" value="2500" style="width: 50%;">
 <br />
 Currency:
  <br />
 <select id="currency" class="currency" name="currency" style="width: 50%;margin: 5px 0;">
  <option value="USD">USD</option>
  <option value="AUD">AUD</option>
  <option value="EUR">EUR</option>
  <option value="GBP">GBP</option>
  <option value="INR ">INR </option>
  <option value="CAD">CAD</option>
  <option value="SGD">SGD</option>
  <option value="JPY">JPY</option>
  <option value="CNY">CNY</option>
</select>
 
 <br />
 What is the interest rate?
 <input id="interest_rate" name="interest_rate" type="text" value="3.2" style="width: 50%;">
 
 <input name="commit" id="commit" type="submit" value="Calculate" style="width: 50%;margin: 5px 0;">
 
 <div id="answer-mid" class="answer-header" style="border: 1px solid #ccc; padding: 5px;"> </div>
 </div>
              <?php echo $after_widget; ?>
        <?php
    }
 
    /** @see WP_Widget::update -- do not rename this */
    function update($new_instance, $old_instance) {		
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		 
        return $instance;
    }
 
    /** @see WP_Widget::form -- do not rename this */
    function form($instance) {	
 
        $title 		= esc_attr($instance['title']);
        
        ?>
         <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
	 
        <?php 
    }
 
 
} // end class example_widget
add_action('widgets_init', create_function('', 'return register_widget("example_widget");'));
?>

<?php

function my_scripts_method() {
	wp_enqueue_script(
		'custom-script',
		plugins_url() . '/revenue-interest-calculator/revenue-interest-calculator.js',
		array( 'jquery' )
	);
}

add_action( 'wp_enqueue_scripts', 'my_scripts_method' );

?>