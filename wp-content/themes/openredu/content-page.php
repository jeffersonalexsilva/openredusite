<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	?>

	<header class="entry-header">
		<?php	if ( has_post_thumbnail() ) {?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
			   <?php the_post_thumbnail(); ?>
			</a>
		<?php }
				the_title( sprintf( '<h1 class="title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' );
		?>
	</header><!-- .entry-header -->
	<div class="entry-content">	
		<?php
			/* translators: %s: Name of current post */
			the_content('Continue lendo', false) ;

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Páginas:', 'ja' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( '', 'ja' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>
	</div><!-- .entry-content -->


</article><!-- #post-## -->
