<?php
/**
 * Plugin Name:       Get User ID
 * Plugin URI:        https://example.com/plugins/
 * Description:       Handle the basics with this plugin.
 * Version:           1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Raihan Islam
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       my-basics-plugin
 * Domain Path:       /languages
 */

add_shortcode( 'get_user_id', 'get_current_user_id_func' );
function get_current_user_id_func( $atts ) {
    if ( ! function_exists( 'wp_get_current_user' ) ) {
        return 0;
    }
    $user = wp_get_current_user();
    $uuid36 = wp_generate_uuid4();             
    $uuid32 = str_replace( '-', '', $uuid36 );
    return ( isset( $user->ID ) ? (int) $uuid32 : 0 );
}

?>