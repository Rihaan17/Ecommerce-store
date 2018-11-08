<?php
  if ( !class_exists( 'Kirki' ) ) {
    return;
  }
  if ( class_exists( 'WooCommerce' ) && get_option( 'show_on_front' ) != 'page' ) {
  	Kirki::add_section( 'ecommerce_store_woo_demo_section', array(
  		'title'		 => __( 'WooCommerce Homepage Demo', 'ecommerce-store' ),
  		'priority'	 => 10,
  	) );
  }
  
  Kirki::add_field( 'ecommerce_store_settings', array(
  	'type'			 => 'switch',
  	'settings'		 => 'ecommerce_store_demo_front_page',
  	'label'			 => __( 'Enable Demo Homepage?', 'ecommerce-store' ),
  	'description'	 => sprintf( __( 'When the theme is first installed and WooCommerce plugin activated, the demo mode would be turned on. This will display some sample/example content to show you how the website can be possibly set up. When you are comfortable with the theme options, you should turn this off. You can create your own unique homepage - Check the %s page for more informations.', 'ecommerce-store' ), '<a href="' . esc_url( admin_url( 'themes.php?page=maxstore-welcome' ) ) . '"><strong>' . __( 'Theme info', 'ecommerce-store' ) . '</strong></a>' ),
  	'section'		 => 'ecommerce_store_woo_demo_section',
  	'default'		 => 1,
  	'priority'		 => 10,
  ) );
  Kirki::add_field( 'ecommerce_store_settings', array(
  	'type'				 => 'radio-buttonset',
  	'settings'			 => 'ecommerce_store_front_page_demo_style',
  	'label'				 => esc_html__( 'Homepage Demo Styles', 'ecommerce-store' ),
  	'description'		 => sprintf( __( 'The demo homepage is enabled. You can choose from some predefined layouts or make your own %s.', 'ecommerce-store' ), '<a href="' . esc_url( admin_url( 'themes.php?page=maxstore-welcome' ) ) . '"><strong>' . __( 'custom homepage template', 'ecommerce-store' ) . '</strong></a>' ),
  	'section'			 => 'ecommerce_store_woo_demo_section',
  	'default'			 => 'style-one',
  	'priority'			 => 10,
  	'choices'			 => array(
  		'style-one'	 => __( 'Layout one', 'ecommerce-store' ),
  		'style-two'	 => __( 'Layout two', 'ecommerce-store' ),
  	),
  	'active_callback'	 => array(
  		array(
  			'setting'	 => 'ecommerce_store_demo_front_page',
  			'operator'	 => '==',
  			'value'		 => 1,
  		),
  	),
  ) );
  Kirki::add_field( 'ecommerce_store_settings', array(
  	'type'				 => 'switch',
  	'settings'			 => 'ecommerce_store_front_page_demo_carousel',
  	'label'				 => __( 'Homepage top section', 'ecommerce-store' ),
  	'description'		 => esc_html__( 'Enable or disable demo homepage top section with random category and the products.', 'ecommerce-store' ),
  	'section'			 => 'ecommerce_store_woo_demo_section',
  	'default'			 => 1,
  	'priority'			 => 10,
  	'active_callback'	 => array(
  		array(
  			'setting'	 => 'ecommerce_store_demo_front_page',
  			'operator'	 => '==',
  			'value'		 => 1,
  		),
  	),
  ) );
  
  
  Kirki::add_field( 'ecommerce_store_settings', array(
  	'type'				 => 'custom',
  	'settings'			 => 'ecommerce_store_demo_page_intro',
  	'label'				 => __( 'Products', 'ecommerce-store' ),
  	'section'			 => 'ecommerce_store_woo_demo_section',
  	'description'		 => esc_html__( 'If you dont see any products or categories on your homepage, you dont have any products probably. Create some products and categories first.', 'ecommerce-store' ),
  	'priority'			 => 10,
  	'active_callback'	 => array(
  		array(
  			'setting'	 => 'demo_front_page',
  			'operator'	 => '==',
  			'value'		 => 1,
  		),
  	),
  ) );
  Kirki::add_field( 'ecommerce_store_settings', array(
  	'type'			 => 'custom',
  	'settings'		 => 'ecommerce_store_demo_dummy_content',
  	'label'			 => __( 'Need Dummy Products?', 'ecommerce-store' ),
  	'section'		 => 'ecommerce_store_woo_demo_section',
  	'description'	 => sprintf( esc_html__( 'When the theme is first installed, you dont have any products probably. You can easily import dummy products with only few clicks. Check %s tutorial.', 'ecommerce-store' ), '<a href="' . esc_url( 'https://docs.woocommerce.com/document/importing-woocommerce-dummy-data/' ) . '" target="_blank"><strong>' . __( 'THIS', 'ecommerce-store' ) . '</strong></a>' ),
  	'priority'		 => 10,
  ) );
  Kirki::add_field( 'ecommerce_store_settings', array(
  	'type'			 => 'custom',
  	'settings'		 => 'ecommerce_store_demo_pro_features',
  	'label'			 => __( 'Need More Features?', 'ecommerce-store' ),
  	'section'		 => 'ecommerce_store_woo_demo_section',
  	'description'	 => '<a href="' . esc_url( 'http://themes4wp.com/product/maxstore-pro/' ) . '" target="_blank" class="button button-primary">' . sprintf( esc_html__( 'Learn more about %s PRO', 'ecommerce-store' ), 'MaxStore' ) . '</a>',
  	'priority'		 => 10,
  ) );