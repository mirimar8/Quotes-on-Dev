<?php
/**
 * Template part for displaying results in search pages.
 *
 * @package QOD_Starter_Theme
 */

?>

			<?php
				// $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				// $args = array(
				// 'posts_per_page'   => 10,
				// 'post_type' => 'post',
				// 'paged' => $paged
				// );
			?> 

			 <?php //$query = new WP_Query( $args ); ?>
			<?php //if ( have_posts() ) : ?>
				<?php //while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<header class="entry-header">
					<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">',
					 esc_url( get_permalink() ) ), '</a></h2>' ); ?>

					<?php if ( 'post' === get_post_type() ) : ?>
						
					<?php endif; ?>

				</header><!-- .entry-header -->

				<div class="entry-summary">
					<?php the_excerpt(); ?>
				</div><!-- .entry-summary -->

				
				
				<?php //endwhile; ?>
					

				<?php //wp_reset_postdata(); ?>
				
				<?php //else : ?>
					<!-- <h2>Nothing found!</h2> -->
				<?php //endif; ?>

				</article><!-- #post-## -->


