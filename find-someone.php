<?php

/*
Plugin Name: Find Someone
Plugin URI: http://github.com/limikael/find-someone
Description: Find someone on the site.
Version: 0.0.1
*/

function find_someone() {
	wp_enqueue_script("find-someone");

	$s.="<script>";
	$s.="FIND_SOMETHING_RESULT_SCRIPT='".plugins_url()."/find-someone/find-someone-result.php';";
	$s.="</script>";

	$s.="<div class='find-someone'>";
	$s.="<input type='text' class='find-someone-input' placeholder='Find someone...'/><br/>";
	$s.="<div class='find-someone-result-wrapper'>";
	$s.="<div class='find-someone-result'>";
	$s.="hello";
	$s.="</div></div></div>";

	return $s;
}

add_shortcode("find-someone", "find_someone");
add_shortcode("find_someone", "find_someone");

function find_something_enqueue_scripts() {
	wp_register_script("find-someone",plugins_url()."/find-someone/find-someone.js");

	wp_register_style("find-someone",plugins_url()."/find-someone/find-someone.css");
	wp_enqueue_style("find-someone");
}

add_action('wp_enqueue_scripts','find_something_enqueue_scripts');
