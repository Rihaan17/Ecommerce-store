<?php
$second_cat		 = get_post_meta( get_the_ID(), 'maxstore_category_cat', true );
$term			 = get_term_by( 'id', $second_cat, 'product_cat' );
if ( ! empty( $term ) && ! is_wp_error( $term ) ) :
	$term_name		 = $term->name;
	$term_id		 = $term->term_id;
	$term_slug		 = $term->slug;
	$desc			 = $term->description;
	$category_link	 = get_term_link( $term );
	$thumb_id		 = get_term_meta( $term_id, 'thumbnail_id', true );
	$term_img		 = wp_get_attachment_image( $thumb_id, 'ecommerce-store-cat' );
	?>
	<div class="top-area row no-gutter">      
		<div class="topfirst-img col-sm-6">       
			<a href="<?php echo esc_url( $category_link ); ?>"> 
				<div class="top-grid-img">
					<?php
					if ( $term_img )
						echo $term_img;
					else
						echo '<img src="' . woocommerce_placeholder_img_src() . '" alt="Placeholder" width="600px" height="600px" />';
					?>
				</div>
				<div class="top-grid-heading">
					<h2>
						<?php if ( $term_name ) echo esc_attr( $term_name ); ?>
					</h2>
					<p>
						<?php if ( $desc ) echo substr( $desc, 0, 50 ), '&hellip;'; ?>
					</p>
				</div>
			</a> 
		</div>
		<div class="topsecond-img col-sm-6">
			<div class="top-grid-products">
				<?php
				$args	 = array( 'post_type' => 'product', 'posts_per_page' => 2, 'product_cat' => $term_slug );
				$loop	 = new WP_Query( $args );
				$i		 = 1;
				while ( $loop->have_posts() ) : $loop->the_post();
					global $product;
					?>
					<div class="top-category-products-line">
						<div class="col-xs-6 top-category-description <?php if ( $i == 2 ) { echo 'col-xs-push-6'; } ?>">    
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
						<div class="col-xs-6 <?php if ( $i == 2 ) { echo 'col-xs-pull-6'; } ?>">
							<a href="<?php echo get_permalink( $loop->post->ID ) ?>" title="<?php the_title_attribute(); ?>">
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
					<?php
					$i++;
				endwhile;
				wp_reset_query();
				?>
			</div>    
		</div>   
	</div>
<?php endif; ?>
