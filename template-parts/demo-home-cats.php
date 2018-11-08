<?php
$second_cat				 = get_terms( 'product_cat' );
if ( ! empty( $second_cat ) && ! is_wp_error( $second_cat ) ) { 
  // Random order.
	shuffle( $second_cat );
	// Get first $max items.
	$terms = array_slice( $second_cat, 0, 1 );
	foreach ( $terms as $term ) {
		$random_term_id[]			       = $term->term_id;
		$random_term_name[]			     = $term->name;
		$random_term_slug[]			     = $term->slug;
		$random_term_desc[]			     = $term->description;
		$random_term_category_link[] = get_term_link( $random_term_id[ 0 ] );
		$random_term_thumb_id[]		   = get_woocommerce_term_meta( $random_term_id[ 0 ], 'thumbnail_id', true );
		$random_term_term_img[]		   = wp_get_attachment_image( $random_term_id[ 0 ], 'maxstore-home-top' );
	}
?> 
	<div class="top-area row no-gutter">       
		<div class="topfirst-img col-sm-6">       
			<a href="<?php echo esc_url( $random_term_category_link[ 0 ] ); ?>"> 
				<div class="top-grid-img">
					<?php
					if ( $random_term_term_img[ 0 ] )
						echo $random_term_term_img[ 0 ];
					else
						echo '<img src="' . woocommerce_placeholder_img_src() . '" alt="Placeholder" width="600px" height="600px" />';
					?>
				</div>
				<div class="top-grid-heading">
					<h2>
						<?php if ( $random_term_name[ 0 ] ) echo esc_html( $random_term_name[ 0 ] ); ?>
					</h2>
					<p>
						<?php if ( $random_term_desc[ 0 ] ) echo substr( $random_term_desc[ 0 ], 0, 50 ), '&hellip;'; ?>
					</p>
				</div>
			</a> 
		</div>

		<div class="topsecond-img col-sm-6">
			<div class="top-grid-products">
				<?php
				$args	 = array( 'post_type' => 'product', 'posts_per_page' => 2, 'product_cat' => $random_term_slug[ 0 ] );
				$loop	 = new WP_Query( $args );
				$i		 = 1;
				while ( $loop->have_posts() ) : $loop->the_post();
					global $product;
					?>
					<div class="top-category-products-line">
					<div class="col-xs-6 top-category-description <?php if ( $i == 2 ) { echo 'col-xs-push-6'; }?>">    
						<div class="top-cat-heading">
							<h2>
                <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
                  <?php the_title(); ?>
                </a>
              </h2>
							<div class="price"><?php echo $product->get_price_html(); ?></div>
							<div class="top-category-button btn btn-primary btn-md outline"><?php woocommerce_template_loop_add_to_cart(); ?></div>
						</div>
					</div>
					<div class="col-xs-6 <?php if ( $i == 2 ) { echo 'col-xs-pull-6'; }?>">
						<a href="<?php echo get_permalink() ?>" title="<?php the_title_attribute(); ?>">
								<?php woocommerce_show_product_sale_flash( $post, $product ); ?>
							<div class="top-cat-img">  
								<?php
								if ( has_post_thumbnail( $loop->post->ID ) )
									echo get_the_post_thumbnail( $loop->post->ID, 'maxstore-home-top' );
								else
									echo '<img src="' . woocommerce_placeholder_img_src() . '" alt="Placeholder" width="600px" height="600px" />';
								?>
							</div>                 
						</a>
					</div>
					</div>	
				<?php $i++;
				endwhile; 
				wp_reset_query(); ?>
			</div>       
		</div>   
	</div>
<?php } ?>
