<?php
/**
 * The template for displaying all pages.
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>


			<h2>Quote Authors</h2>
				
			<div class="archives-links">

			<?php
				$args = array(
				'posts_per_page'  => -1,
				'post_type' => 'post',
				);
			?> 

			<?php $query = new WP_Query( $args ); ?>
			<?php if ( $query->have_posts() ) : ?>
				<?php while ( $query->have_posts() ) : $query->the_post(); ?>
				

					<?php the_title( sprintf( '<p class="archives-block"><a class="archives-terms" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></p>' ); ?>
					
				
				<?php endwhile; ?>
					   
   				<?php the_posts_navigation(); ?>
				<?php wp_reset_postdata(); ?>
				  
			<?php else : ?>
      			<h2>Nothing found!</h2>
			<?php endif; ?>
			
			</div>


			
			<h2>Categories</h2>

			<div class="archives-links">
				<?php $terms = get_terms( array(
					'taxonomy' => 'category',
					'hide_empty' => false,
					) );
					if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
						$count = count( $terms );
						$i = 0;
						$term_list = '<p class="archives-block">';
						foreach ( $terms as $term ) {
							$i++;
							$term_list .= '<a class="archives-terms" href="' . esc_url( get_term_link( $term ) ) . '" alt="' . esc_attr( sprintf( __( 'View all post filed under %s', 'my_localization_domain' ), $term->name ) ) . '">' . $term->name . '</a><br>';
						}
						echo $term_list;
					}
				?>

			</div>

					
			<h2>Tags</h2>

			<div class="archives-links">
				<?php $terms = get_terms( array(
					'taxonomy' => 'post_tag',
					'hide_empty' => false,
					) );
					if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
						$count = count( $terms );
						$i = 0;
						$term_list = '<p class="archives-block">';
						foreach ( $terms as $term ) {
							$i++;
							$term_list .= '<a class="archives-terms" href="' . esc_url( get_term_link( $term ) ) . '" alt="' . esc_attr( sprintf( __( 'View all post filed under %s', 'my_localization_domain' ), $term->name ) ) . '">' . $term->name . '</a><br>';
						}
						echo $term_list;
					}
				?>
			</div>


			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
