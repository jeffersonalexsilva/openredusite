<?php


get_header(); ?>
<div class="blog-area">
	<section id="content-area" class="content-area center <?= get_the_category()[0]->slug;?>">
		<main id="main" class="site-main" role="main">
		<section class="auxiliar">
			<div class="envelope">
				<?php dynamic_sidebar( 'breadcrumbs' ); 
				get_template_part('searchform', get_post_format());?>
			</div>
		</section>
			<header class="blog-header">
				<h1 class="blog-title"><?= get_the_category()[0]->name;?></h1>
			</header><!-- .page-header -->
		<?php if ( have_posts() ) : 
			$first = true;
			// Start the Loop.
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
			switch (get_the_category()[0]->slug){
				case 'blog':{get_template_part($first == true ?'content-blog-first':'content-blog', get_post_format());break;}								
				default:{get_template_part($first == true ?'content-extra-first':'content-extra', get_post_format());break;}
			}
			if($first){?>
				<div id="posts-area">
					<section class="posts">
			<?php }
			$first = false;

			// End the loop.
			endwhile;
			// Previous/next page navigation.
					the_posts_pagination( array(
						'prev_text'          => __( '<-', 'openredu' ),
						'next_text'          => __( '->', 'openredu' ),
						'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( '', 'openredu' ) . ' </span>',
						'screen_reader_text' => ' ',
					) );
		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'content', 'none' );

		endif;
		?>
		</section>
		<?php 
		if(get_the_category()[0]->slug == 'blog'){?>
		<section class="sidebars">
			<?php dynamic_sidebar( 'sidebar-blog' );?>
		</section>
		<?php }	?>
			</div>
		</main><!-- .site-main -->
	</section><!-- .content-area -->
</div>
<?php get_footer(); ?>
