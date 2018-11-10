<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php	if ( has_post_thumbnail() ) {?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="img-intro" >
			   <?php the_post_thumbnail(); ?>
			</a>
		<?php }
			if ( is_single() ) :
				the_title( '<h1 class="title">', '</h1>' );
			else :
				the_title( sprintf( '<h4 class="sub-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' );
			endif;
		?>
		<div class="entry-content">
		<?php the_content("Mais..."); ?>
		</div>
</article><!-- #post-## -->
