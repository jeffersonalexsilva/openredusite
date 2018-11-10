<div class="search">
	<form role="search" method="get" class="searchform group" action="<?php echo home_url( '/' ); ?>">
	 <input type="search" class="search-field" placeholder="Busque por aqui..." value="<?php echo get_search_query() ?>" name="s" title="Buscar no Blog" />
	 <input type="image" class="search-submit" src="<?php bloginfo('template_url');?>/img/search.svg" alt="Submit">
	</form>
</div>