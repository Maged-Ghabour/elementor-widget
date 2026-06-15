<?php
/**
 * Plugin Name: Valleys Banner Elementor Widget
 * Description: Custom Elementor Widget for the Valleys full-width banner.
 * Plugin URI:  https://elementor.com/
 * Version:     1.0.0
 * Author:      Antigravity
 * Author URI:  https://elementor.com/
 * Text Domain: valleys-banner
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Register Valleys Banner Widget.
 *
 * Include widget file and register widget class.
 *
 * @since 1.0.0
 * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
 * @return void
 */
function register_valleys_banner_widget( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/banner-widget.php' );
	require_once( __DIR__ . '/widgets/features-widget.php' );
	require_once( __DIR__ . '/widgets/promo-box-widget.php' );

	$widgets_manager->register( new \Valleys_Banner_Widget() );
	$widgets_manager->register( new \Valleys_Features_Widget() );
	$widgets_manager->register( new \Valleys_Promo_Box_Widget() );

}
add_action( 'elementor/widgets/register', 'register_valleys_banner_widget' );

/**
 * Register widget scripts/styles.
 */
function register_valleys_banner_styles() {
	wp_register_style( 'valleys-banner-style', plugins_url( 'assets/css/style.css', __FILE__ ), [], filemtime( plugin_dir_path( __FILE__ ) . 'assets/css/style.css' ) );
}
add_action( 'elementor/frontend/after_enqueue_styles', 'register_valleys_banner_styles' );
