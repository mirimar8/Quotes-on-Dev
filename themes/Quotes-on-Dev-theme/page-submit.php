<?php
/**
 * The template for displaying all pages.
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->
	

		<?php
			if ( is_user_logged_in() ) : ?>
				<form class="quote-submission-form" name="submit-quote">
					<div class="quote-author">
						<label for="author">Author of quote</label>
						<input id="author" type="text" name="Author of quote">
					</div>
					<div class="quote-text">	
						<label for="quote">Quote</label>
						<textarea id="quote" rows="2"></textarea>
					</div>
					<div class="quote-source">
						<label for="source of quote">Where did you find this quote? (e.g. book name)</label>
						<input id="source" type="text" name="Source">
					</div>
					<div class="quote-source-url">
						<label for="url of quote source">Provide the URL of this quote source, if available.</label>
						<input id="source-url" type="text" name="Quote source">
					</div>
						<input class="submit-quote-button" type="submit" value="Submit Quote">
						<p id="error-message"></p>
						<p id="success-message"></p>

				</form> 

			<?php else : ?>
				<p>Sorry, you must be logged in to submit a quote!</p>

				<a href="<?php echo wp_login_url(); ?>">Click here to login.</a>
			 <?php endif; ?>
			
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
