<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if(!class_exists('wm_common_coupon_label_for_woocommerce')){
	class wm_common_coupon_label_for_woocommerce{
		
		var $vars = array();
		
		function __construct($vars = array()){
			$this->vars = $vars;			
			//Admin
			add_action('edit_form_after_title', 				array($this, 'set_edit_form_after_title'),9);
			add_action('woocommerce_coupon_options_save', 		array($this, 'set_woocommerce_coupon_options_save'),9);
			
			//Front
			add_filter('woocommerce_cart_totals_coupon_label', 	array($this, 'get_woocommerce_cart_totals_coupon_label'),50,2);
		}
		
		function set_edit_form_after_title($post = array()){
			if ( 'shop_coupon' === $post->post_type ) {
				$common_coupon_code = get_post_meta($post->ID, '_common_coupon_code', true);?>
				<input type="text" id="common_coupon_code" name="common_coupon_code" placeholder="<?php esc_attr_e( 'Common Coupon Code (optional)', 'testdomain_wmcclforwc' ); ?>" value="<?php echo $common_coupon_code; ?>" />
				<style type="text/css">#common_coupon_code {padding: 3px 8px;font-size: 1.7em;line-height: 100%;height: 1.7em;width: 100%;outline: 0;margin: 0 0 3px;background-color: #fff;margin-top:10px;}</style><?php
			}
		}
		
		function set_woocommerce_coupon_options_save($post = array()){
			global $post;
			if (isset($_REQUEST['common_coupon_code'])) {
				$coupon_id = isset($post->ID) ? $post->ID : 0;
				update_post_meta($coupon_id, '_common_coupon_code', stripslashes(trim($_REQUEST['common_coupon_code'])));
			}
		}
		
		function get_woocommerce_cart_totals_coupon_label($applied_coupon_code_label = '', $coupon = NULL){
			$coupon_id 			= isset($coupon->id) ? $coupon->id : 0;
			$common_coupon_code = get_post_meta($coupon_id, '_common_coupon_code', true);
			if(!empty($common_coupon_code)){
				$applied_coupon_code_label = __( $common_coupon_code, 'testdomain_wmcclforwc' );
			}			
			return $applied_coupon_code_label;
		}
		
		
	}//End Class
}//End Class