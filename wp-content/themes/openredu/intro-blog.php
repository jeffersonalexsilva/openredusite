<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php	if ( has_post_thumbnail() ) {?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="img-intro" >
			   <?php the_post_thumbnail(); ?>
			</a>
		<?php }
				the_title( sprintf( '<h3 class="sub-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
		?>
</article><!-- #post-## -->
