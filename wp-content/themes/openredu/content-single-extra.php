<article id="post-<?php the_ID(); ?>" <?php post_class('extra'); ?>>
	<header class="entry-header">
		<?php	if ( has_post_thumbnail() ) {
					the_post_thumbnail();
					the_title('<div class="envelope"><h1 class="title">', '</h1></div>');
				}else{
					the_title('<div class="envelope no-image"><h1 class="title">', '</h1></div>');
				}
		?>
	</header><!-- .entry-header -->
	<section class="entry">
		<div class="entry-content">	
			<?php
				/* translators: %s: Name of current post */
			the_content(__('Read more...'), false) ;
	
				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Páginas:', 'openredu' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
					'pagelink'    => '<span class="screen-reader-text">' . __( '', 'openredu' ) . ' </span>%',
					'separator'   => '<span class="screen-reader-text">, </span>',
				) );
			?>
		</div><!-- .entry-content -->
	</section>

	<footer class="entry-footer">
		<?php
		// Author bio.
			if ( is_single() && get_the_author_meta( 'description' ) ) :
				get_template_part( 'author-bio' );
			endif;
		?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
