<?php
/*
Plugin Name: Mro Events Divi Extention
Plugin URI:  https://shorifullislamratan.me/projects/mro-events
Description: A simple Divi Extention to show custom events posts
Version:     1.0.0
Author:      Ratan Mia
Author URI:  https://shorifullislamratan.me
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: mro-mro-events-divi-extention
Domain Path: /languages

Mro Events Divi Extention is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Mro Events Divi Extention is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Mro Events Divi Extention. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/


if ( ! function_exists( 'mro_initialize_extension' ) ):
/**
 * Creates the extension's main class instance.
 *
 * @since 1.0.0
 */

// add javascript and css
function mro_events_divi_extention_scripts() {
    wp_enqueue_style( 'mro-events-divi-extention-style', plugin_dir_url( __FILE__ ) . '/styles/swiper.css', array(), '1.0.0', 'all' );
    wp_enqueue_script( 'mro-events-swiper', plugin_dir_url( __FILE__ ) . '/scripts/swiper-bundle.min.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_style( 'mro-event-carousel', plugin_dir_url( __FILE__ ) . '/includes/modules/BlogCarousel/style.css', array(), '1.0.0', 'all' );
    wp_enqueue_script( 'mro-event-carousel', plugin_dir_url( __FILE__ ) . '/includes/modules/BlogCarousel/frontend.min.js', array( 'mro-events-swiper' ), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'mro_events_divi_extention_scripts' );


function mro_initialize_extension() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/MroEventsDiviExtention.php';
}
add_action( 'divi_extensions_init', 'mro_initialize_extension' );
endif;
