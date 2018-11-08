<?php
/**
*
* Metaboxes
*
*/

add_action( 'cmb2_init', 'ecommerce_store_homepage_template_metaboxes' );

function ecommerce_store_homepage_template_metaboxes() {

    $prefix = 'maxstore';
    
    /**
		 * Category
		 */
		$cmb_category	 = new_cmb2_box( array(
			'id'			 => 'homepage_metabox_category',
			'title'			 => __( 'Homepage Options', 'ecommerce-store' ),
			'object_types'	 => array( 'page' ), // Post type 
			'show_on'		 => array( 'key' => 'page-template', 'value' => array( 'template-home-category.php' ) ),
			'context'		 => 'normal',
			'priority'		 => 'high',
			'show_names'	 => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // Keep the metabox closed by default
		) );
		$cmb_category->add_field( array(
			'name'				 => __( 'Category', 'ecommerce-store' ),
			'desc'				 => __( 'Select category', 'ecommerce-store' ),
			'id'				 => $prefix . '_category_cat',
			'type'				 => 'select',
			'show_option_none'	 => true,
			'default'			 => '',
			'options'			 => maxstore_get_cats(),
		) );
}
