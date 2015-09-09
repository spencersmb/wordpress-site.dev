<?php
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.me/
 *
 * @package site.dev
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function site_dev_slug_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'site_dev_slug_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function site_dev_slug_jetpack_setup
add_action( 'after_setup_theme', 'site_dev_slug_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function site_dev_slug_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function site_dev_slug_infinite_scroll_render
