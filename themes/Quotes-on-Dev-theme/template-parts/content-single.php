<?php
/**
 * Template part for displaying single posts.
 *
 * @package QOD_Starter_Theme
 */

?>

<div class="home-quotes">
		<div class="quote-para">
			<?php the_content('<div class="quote-para"></div>'); ?>
		</div>

		<div class="entry-meta">
			<?php the_title('<div class="quote-author">- </div>'); ?>
			
			<?php if ( get_post_meta(get_the_ID(),'_qod_quote_source',true) !== '' ) {
				echo ', ';
				} ?>

			<?php if ( get_post_meta(get_the_ID(),'_qod_quote_source_url',true) === '' ) { ?>
				<span class="quote-source"><?php echo get_post_meta(get_the_ID(),'_qod_quote_source',true)?></span>
			<?php } else { ?>
				<a href="<?php echo get_post_meta(get_the_ID(),'_qod_quote_source_url',true)?>">
				<span class="quote-source"><?php echo get_post_meta(get_the_ID(),'_qod_quote_source',true)?></span></a>
			<?php } ?>

		</div>
					
</div>
					
				
	
	

	
