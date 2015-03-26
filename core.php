<?php
/**
 * Plugin Name: Caldera Forms - Increment Value
 * Plugin URI:  
 * Description: Adds an increment value to the form capture.
 * Version:     1.0.0
 * Author:      David Cramer
 * Author URI:  
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */



// add filters
add_filter('caldera_forms_get_form_processors', 'cf_increment_register_processor');


function cf_increment_register_processor($pr){
	$pr['increment-capture'] = array(
		"name"              =>  __('Increment', 'cf-increment-capture'),
		"description"       =>  __("Increment value per entry.", 'cf-increment-capture'),
		"author"            =>  'David Cramer',
		"author_url"        =>  'http://cramer.co.za',
		"processor"     	=>  'cf_increment_value',
		"template"          =>  plugin_dir_path(__FILE__) . "config.php",
		"single"			=>	true,
		"conditionals"		=>	false,
		"magic_tags"    =>  array(
			'increment_value'
		)
	);

	return $pr;
}


function cf_increment_value($config, $form){
	
	// get increment value;
	$increment_value = get_option('_increment_' . $config['processor_id'], $config['start'] );

	update_option( '_increment_' . $config['processor_id'], $increment_value + 1 );

	Caldera_Forms::set_field_data( $config['field'], $increment_value, $form );

	return array('increment_value' => $increment_value );
}