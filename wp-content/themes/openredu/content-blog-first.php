<article id="post-<?php the_ID(); ?>" <?php post_class('blog first'); ?>>
	<header class="entry-header">
		<?php	if ( has_post_thumbnail() ) {?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
			   <?php the_post_thumbnail(); ?>
			</a>
		<?php }
				the_title( sprintf( '<h2 class="sub-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
		?>
	</header><!-- .entry-header -->
	<div class="meta-area">
		Publicado em <?php the_date('d F, Y','<span class="tag-date">','</span>'); ?>
	</div>
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

	<footer class="entry-footer">
		<?php
		// Author bio.
			if ( is_single() && get_the_author_meta( 'description' ) ) :
				get_template_part( 'author-bio' );
			endif;
		?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
