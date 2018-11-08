<?php
/**
 *
 * Template name: Homepage with Category
 * The template for displaying homepage.
 *
 * @package ecommerce store
 */
get_header();
?>

<?php get_template_part( 'template-part', get_theme_mod( 'header-style', 'head' ) ); ?>

<!-- start content container -->
<div class="row rsrc-fullwidth-home">      
	<div class="rsrc-home" >        
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>                                 
				<div <?php post_class( 'rsrc-post-content' ); ?>>                                                      
					<div class="entry-content"> 
						<?php if ( class_exists( 'WooCommerce' ) ) { ?>
							<?php get_template_part( 'template-part', 'home-category' ); ?>
						<?php } ?>                           
						<?php the_content(); ?>                            
					</div>                                                       
				</div>        
			<?php endwhile; ?>        
		<?php else: ?>            
			<?php get_404_template(); ?>        
		<?php endif; ?>    
	</div>    
</div>
<!-- end content container -->
<?php get_footer(); ?>
