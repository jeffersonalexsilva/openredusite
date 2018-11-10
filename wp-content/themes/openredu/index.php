<?php

get_header(); ?>
	<?php dynamic_sidebar( 'barra-banner' ); ?>
	<div id="principal" class="content-area center">
		<section class="more-info" id="more-about">
			<div class="central">
				<?php $post   = get_post(19);	?>
				<h1 class="title-section"><?= apply_filters('the_title', $post->post_title);?></h1>
				<div class="intro-sobre">
					<p class="apresentacao"><?=  apply_filters('the_content', $post->post_content);?></p>
				</div>
			</div>			
		</section>
		<section class="area-conheca" id="conheca">
				<?php dynamic_sidebar( 'transicao1' ); ?>
		</section>
		<section class="area-use" id="use">
			<div class="central">
			<?php $post   = get_post(36);	?>
				<h3 class="title-section"><?= apply_filters('the_title', $post->post_title);?></h3>
				<?=  apply_filters('the_content', $post->post_content);?>
			</div>			
		</section>
		<section class="area-colabore" id="colabore">
			<div class="central">
			<?php $post   = get_post(43);	?>
				<h3 class="title-section"><?= apply_filters('the_title', $post->post_title);?></h3>
				<?=  apply_filters('the_content', $post->post_content);?>
			</div>			
		</section>
		<section class="area-ajuda" id="ajuda">
			<div class="central">
			<?php $post   = get_post(46);	?>
				<h3 class="title-section"><?= apply_filters('the_title', $post->post_title);?></h3>
				<?=  apply_filters('the_content', $post->post_content);?>
			</div>			
		</section>
	</div><!-- .content-area -->
	

<?php get_footer(); ?>
