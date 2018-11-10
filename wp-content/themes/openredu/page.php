<?php


get_header(); ?>

	<div id="page-area" class="content-area page">
		<main id="main" class="site-main" role="main">
			<div class="posts">
				<?php
				// Start the loop.
				while ( have_posts() ) : the_post();

					/*
					 * Include the post format-specific template for the content. If you want to
					 * use this in a child theme, then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
					get_template_part( 'content-page', get_post_format() );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				
					// Previous/next page navigation.
					the_posts_pagination( array(
						'prev_text'          => __( '< Anterior', 'ja' ),
						'next_text'          => __( 'Próximo >', 'ja' ),
						'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( '', 'ja' ) . ' </span>',
						'screen_reader_text' => ' ',
					) );
				// End the loop.
				endwhile;
				?>
			</div>
		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
