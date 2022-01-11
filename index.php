<?php
/*
Plugin Name: ePDQ Payment Gateway for WooCommerce
Plugin URI: https://github.com/Ruman-Hossain/ePDQ-Payment-Gateway-for-WooCommerce
Description: Extends WooCommerce with an barkley bank epdq gateway.
Version: 1.0.0
Author: MD RUMAN HOSSAIN
Author URI: https://www.fiverr.com/ruman_hossain
Developer: MD RUMAN HOSSAIN
Developer URI: https://www.fiverr.com/ruman_hossain
Copyright: © 2022 WooCommerce.
*/


if( !defined('RUMAN_EPDQ_DIR') )
	define('RUMAN_EPDQ_DIR', dirname(__FILE__) . '/' );

add_action('plugins_loaded', 'woocommerce_ruman_epdq_init', 0);

function woocommerce_ruman_epdq_init() {

	if ( !class_exists( 'WC_Payment_Gateway' ) ) return;

	/**
 	 * Localisation
	 */
	load_plugin_textdomain('woocommerce', false, dirname( plugin_basename( __FILE__ ) ) . '/languages');

	/**
 	 * Gateway class
 	 */

	require_once RUMAN_EPDQ_DIR . 'class.epdq.php';


	/**
 	* Add the Gateway to WooCommerce
 	**/
	function woocommerce_add_ruman_epdq_gateway($methods) {
		$methods[] = 'WC_Ruman_EPDQ';
		return $methods;
	}

	add_filter('woocommerce_payment_gateways', 'woocommerce_add_ruman_epdq_gateway' );
}