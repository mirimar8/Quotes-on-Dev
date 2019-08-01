<?php
/**
 * The template for displaying all pages.
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<div class="home-quotes">

			<?php
				$args = array(
				'posts_per_page'   => 1,
				'post_type' => 'post',
				);
			?> 

			<?php $query = new WP_Query( $args ); ?>
			<?php if ( $query->have_posts() ) : ?>
				<?php while ( $query->have_posts() ) : $query->the_post(); ?>
			<div class="entry-content">
				<?php the_content('<div class="quote-para"></div>'); ?>
			</div>

			<div class="entry-meta">
				<?php the_title('<div class="quote-author"></div>'); ?>
				<span class="quote-source"></span>
				
			</div>
					
				
				<?php endwhile; ?>
					
				
				<?php wp_reset_postdata(); ?>
				
			<?php else : ?>
				<h2>Nothing found!</h2>
			<?php endif; ?>

		</div>


			<button type="button" class="new-quote-button">Show Me Another!</button>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
