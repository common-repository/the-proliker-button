<?php

/*
Plugin Name: The Proliker Button
Plugin URI: http://proliker.com
Description: Add the Proliker button to your blog.
Version: 1.0
Author: Michele Bertoli
Author URI: http://michele.berto.li
License: GPL2
*/

add_filter("the_content", "the_proliker_button_the_content_filter");

function the_proliker_button_the_content_filter($the_content) {
	
	if (is_single()) {

		$app_id = get_option("the_proliker_button_app_id");
		$display = get_option("the_proliker_button_display") != null ? get_option("the_proliker_button_display") : "before";
		$action = get_option("the_proliker_button_action") != null ? get_option("the_proliker_button_action") : "love";
		$endpoint_url = get_option("the_proliker_button_endpoint_url");
		
		if (!isset($endpoint_url)) {
			$post = $GLOBALS["post"];
			$endpoint_url = get_permalink($post->ID);
		}
		
		$the_proliker_button = sprintf(
			"<proliker data-action=\"%s\" data-type=\"website\" data-url=\"%s\"></proliker><script>var proliker_appid=\"%s\";</script>",
			$action,
			$the_permalink,
			$app_id
		);
	
		return $display == "before" ? $the_proliker_button . $the_content : $the_content . $the_proliker_button;
	
	}
	
	return $the_content;
}

add_action("wp_enqueue_scripts", "the_proliker_button_wp_enqueue_scripts");

function the_proliker_button_wp_enqueue_scripts() {
	
	if (is_single()) {
		
		wp_enqueue_script(
			"proliker",
			"https://s3.amazonaws.com/cdn.proliker.com/b/b.js",
			array(),
			"",
			true
		);
		
	}
	
}    

add_filter("admin_menu", "the_proliker_button_admin_menu_filter");

function the_proliker_button_admin_menu_filter() {
	
	add_options_page("The Proliker Button", "The Proliker Button", "manage_options", "the-proliker-button-admin", "the_proliker_button_options");

}

function the_proliker_button_options() {
	
	require_once("the-proliker-button-admin.php");

}

?>