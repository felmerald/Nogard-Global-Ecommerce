<?php
/**
 * WCFM plugin view
 *
 * WCFM WC German Market Product Manage View
 *
 * @author 		WC Lovers
 * @package 	wcfm/views/integrations
 * @version   6.4.8
*/

global $wp, $WCFM, $WCFMu, $post, $woocommerce;

$product_id = 0;
		
$min_qty = 1;
$_unit_regular_price_per_unit = '';
$_auto_ppu_complete_product_quantity = '';
$_unit_regular_price_per_unit_mult = '';

if( isset( $wp->query_vars['wcfm-products-manage'] ) && !empty( $wp->query_vars['wcfm-products-manage'] ) ) {
	$product_id = absint( $wp->query_vars['wcfm-products-manage'] );
	
	if( $product_id ) {
		
		$_unit_regular_price_per_unit = get_post_meta( $product_id, '_unit_regular_price_per_unit', true );
		$_auto_ppu_complete_product_quantity = get_post_meta( $product_id, '_auto_ppu_complete_product_quantity', true );
		$_unit_regular_price_per_unit_mult = get_post_meta( $product_id, '_unit_regular_price_per_unit_mult', true );
	}
}

$regular_price_units = array();

$default_product_attributes = WGM_Defaults::get_default_product_attributes();
$attribute_taxonomy_name    = wc_attribute_taxonomy_name( $default_product_attributes[ 0 ][ 'attribute_name' ] );
$terms                      = get_terms( $attribute_taxonomy_name, 'orderby=name&hide_empty=0' );

// fallback to depcracted bug
if ( empty( $terms ) || is_wp_error( $terms ) ) {
	$attribute_taxonomy_name    = 'pa_masseinheit';
	$terms                      = get_terms( $attribute_taxonomy_name, 'orderby=name&hide_empty=0' );
}
if ( is_array( $terms ) && ! empty( $terms ) ) {
	foreach ( $terms as $value ) {
		$regular_price_units[esc_attr( $value->name )] = ! empty( $value->description ) ? esc_attr( $value->description ) : esc_attr( __( 'Fill in attribute description!', 'woocommerce-german-market' ) );
	}
}

?>
<div class="page_collapsible products_manage_wc_german_market simple" id="wcfm_products_manage_form_wc_german_markethead"><label class="wcfmfa fa-dollar-sign"></label><?php _e( 'Price per Unit', 'woocommerce-german-market' ); ?><span></span></div>
<div class="wcfm-container simple variable">
	<div id="wcfm_products_manage_form_wc_german_market_expander" class="wcfm-content">
		<?php
		 $wcfm_wc_german_market_fields = apply_filters( 'wcfm_wc_german_market_fields', array(  
				"_unit_regular_price_per_unit" => array('label' => __( 'Scale Unit', 'woocommerce-german-market' ) , 'type' => 'select', 'options' => $regular_price_units, 'class' => 'wcfm-select wcfm_ele simple variable', 'label_class' => 'wcfm_title simple variable', 'value' => $_unit_regular_price_per_unit ),
				"_auto_ppu_complete_product_quantity" => array('label' => __( 'Complete product quantity', 'woocommerce-german-market' ) , 'type' => 'number', 'class' => 'wcfm-text wcfm_ele simple variable wcfm_non_negative_input', 'label_class' => 'wcfm_title simple variable', 'value' => $_auto_ppu_complete_product_quantity ),
				"_unit_regular_price_per_unit_mult" => array('label' => __( 'Quantity to display', 'woocommerce-german-market' ) , 'type' => 'number', 'class' => 'wcfm-text wcfm_ele simple variable wcfm_non_negative_input', 'label_class' => 'wcfm_title simple variable', 'value' => $_unit_regular_price_per_unit_mult ),
																													), $product_id );
		 
		 $WCFM->wcfm_fields->wcfm_generate_form_field(	$wcfm_wc_german_market_fields );																								
		?>
		<div class="wcfm-clearfix"></div><br />
	</div>
</div>