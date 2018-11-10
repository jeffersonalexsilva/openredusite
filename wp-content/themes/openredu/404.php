<?php
/**
 * The template for displaying 404 pages (not found)
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title">Ooooopss.. não encontrei.</h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p>Aproveitando que você chegou aqui, pesquisa na página sobre o assunto que procura ou pode navegar pelos links do menu</p>

					<?php get_search_form(); ?>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
