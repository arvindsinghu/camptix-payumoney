<?php
/**
 * Plugin Name: CampTix PayU Money Payment Gateway
 * Plugin URI: https://github.com/arvindsinghu/camptix-payumoney/
 * Description: PayU Paisa Payment Gateway for CampTix
 * Author: arvindsinghu
 * Author URI: http://www.newwayenter.com/
 * Version: 1.1.0
 * License: GPLv2 or later
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Add ZAR currency
add_filter( 'camptix_currencies', 'camptix_add_inr_currency' );
function camptix_add_inr_currency( $currencies ) {
	$currencies['INR'] = array(
		'label' => __( 'Indian Rupees', 'camptix' ),
		'format' => 'Rs. %s',
	);
	return $currencies;
}

// Load the PayU Paisa Payment Method
add_action( 'camptix_load_addons', 'camptix_payupaisa_load_payment_method' );
function camptix_payupaisa_load_payment_method() {
	if ( ! class_exists( 'CampTix_Payment_Method_PayuPaisa' ) )
		require_once plugin_dir_path( __FILE__ ) . 'classes/class-camptix-payment-method-payupaisa.php';
	camptix_register_addon( 'CampTix_Payment_Method_PayuPaisa' );
}

?>
