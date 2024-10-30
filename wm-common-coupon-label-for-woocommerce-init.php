<?php
/**
 * Plugin Name: WM Common Coupon Label for WooCommerce
 * Plugin URI: http://plugins.web-mumbai.com/
 * Description: "Coupon Label for WooCommerce" is use for Common coupon code. This is just a title for coupon code. This display after coupon code applied.
 * Version: 1.0.1
 * Author: Web Mumbai
 * Author URI: http://plugins.web-mumbai.com/
 * License: GPL version 2 or later - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * Last Update Date: 17 September, 2015
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
require_once("includes/wm-common-coupon-label-for-woocommerce.php");
$wm_common_coupon_label_for_woocommerce = new wm_common_coupon_label_for_woocommerce(array('plugin_file_path' => __FILE__));