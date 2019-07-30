<?php
/**
 * The template for displaying all pages.
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area logged-in-form">
		<main id="main" class="site-main" role="main">
		
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->
	

		<?php
			if ( is_user_logged_in() ) {
				echo '<form class="quote-submission-form" name="submit-quote">
						<p>Author of quote</p><input type="text" name="Author of quote"/>
						<p>Quote</p><input type="text" name="Quote"/><br>
						<p>Where did you find this quote? (e.g. book name)</p><input type="text" name="Where was found"/>
						<p>Provide the URL of this quote source, if available.</p><input type="text" name="Quote source"/>
						<input type="button" onclick="check(this.form)" value="Submit Quote"/>
					</form>'; 
			} else { ?>
				echo <?php get_template_part( 'template-parts/content', 'page' );
			} ?>
			
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
