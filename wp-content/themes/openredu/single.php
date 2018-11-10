<?php


get_header(); ?>

	<section id="content-single" class="content-area center <?= get_the_category()[0]->slug;?>">
		<section class="auxiliar">
			<div class="envelope">
				<?php dynamic_sidebar( 'breadcrumbs' ); 
				get_template_part('searchform', get_post_format());?>
			</div>
		</section>
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
				switch (get_the_category()[0]->slug){
					case 'blog':{get_template_part('content-blog', get_post_format());break;}
					default:{get_template_part('content-single-extra', get_post_format());break;}
				}

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				
					// Previous/next page navigation.
					
				// End the loop.
				endwhile;
				the_posts_pagination( array(
						'prev_text'          => __( '< Anterior'),
						'next_text'          => __( 'Próximo >'),
						'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( '', 'ja' ) . ' </span>',
						'screen_reader_text' => ' ',
				) );
				?>
			</div>
		</main><!-- .site-main -->
	</section><!-- .content-area -->

<?php get_footer(); ?>
