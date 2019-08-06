<?php
/**
 * Template part for displaying results in search pages.
 *
 * @package QOD_Starter_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


			<?php
				$args = array(
				'posts_per_page'   => 10,
				'post_type' => 'post',
				);
			?> 

			<?php $query = new WP_Query( $args ); ?>
			<?php if ( $query->have_posts() ) : ?>
				<?php while ( $query->have_posts() ) : $query->the_post(); ?>
				
				<header class="entry-header">
					<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">',
					 esc_url( get_permalink() ) ), '</a></h2>' ); ?>

				</header><!-- .entry-header -->

				<div class="entry-summary">
					<?php the_excerpt(); ?>
				</div><!-- .entry-summary -->
				
				<?php endwhile; ?>
					

				<?php wp_reset_postdata(); ?>
				
			<?php else : ?>
				<h2>Nothing found!</h2>
			<?php endif; ?>

</article><!-- #post-## -->
