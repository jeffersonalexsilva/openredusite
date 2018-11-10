<?php

?>

	</div><!-- .site-content -->

	<footer id="contato" class="site-footer" role="contentinfo">
		<div class="central">	
			<div class="sobre-foot">
				<?php $post   = get_post(52);	?>
				<figure class="img-logo">
					<img class="pb" src="<?php bloginfo('template_url');?>/img/openredu-logo-horizontal-pb.svg" />
				</figure>
				<?=  apply_filters('the_content', $post->post_content);?>		
			</div>
			
			<?php if(!wp_is_mobile()) wp_nav_menu( array( 'theme_location' => 'menu-top' ) ); ?>
			<?php dynamic_sidebar( 'barra-inferior-rodape' ); ?>
		</div><!-- .site-info -->
			<?php dynamic_sidebar( 'copyright-footer' ); ?>
	</footer><!-- .site-footer -->

</div><!-- .site -->

<?php wp_footer(); ?>

</body>
</html>
