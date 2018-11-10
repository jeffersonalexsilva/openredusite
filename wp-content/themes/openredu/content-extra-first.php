<article id="post-<?php the_ID(); ?>" <?php post_class('first'); ?>>
	<header class="entry-header">
		<?php	if ( has_post_thumbnail() ) {
			the_post_thumbnail();
		}
				the_title('<div class="envelope"><h2 class="sub-title">','</h2></div>' );
		?>
	</header><!-- .entry-header -->
	<section class="entry">
		<div class="entry-content">
			<?php
			the_content(__('Read more...'), false) ;
			?>
		</div>
	</section><!-- .entry-content -->

	<footer class="entry-footer">
		<?php
		// Author bio.
			if ( is_single() && get_the_author_meta( 'description' ) ) :
				get_template_part( 'author-bio' );
			endif;
		?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
