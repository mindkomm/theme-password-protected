<?php

if ( ! defined( 'ABSPATH' ) ) {
	return;
}

/**
 * Use specific template for password protected posts.
 *
 * By default, this will use the `password-protected.php` template file. If you want password
 * templates specific to a post type, use `password-protected-$posttype.php`.
 */
add_filter( 'template_include', function( $template ) {
	global $post;

	if ( ! empty( $post ) && post_password_required( $post->ID ) ) {
		$template = locate_template( [
			'password-protected.php',
			"password-protected-{$post->post_type}.php",
		] ) ?: $template;
	}

	return $template;
}, 99 );
