<?php 
wp_enqueue_style( 'style', get_template_directory_uri().'/style.css' );
wp_enqueue_style( 'responsive', get_template_directory_uri().'/css/responsive.css' );
wp_enqueue_script( 'custom', get_stylesheet_directory_uri() . '/js/custom.js', array( 'jquery' ) );
add_theme_support( 'automatic-feed-links' );
function menus() {
  register_nav_menus(
    array(
      'menu-top' => __( 'Header Menu' ),
      'menu-category' => __( 'Categories Menu' )
    )
  );
}
add_action( 'init', 'menus' );
/**
 * Add HTML5 theme support.
 */
function after_setup() {
    add_theme_support( 'html5');
    //remove_meta_box( "yuzo_related_post_metabox", "post", "normal" );
}
add_action( 'after_setup_theme', 'after_setup' );
add_theme_support( 'post-formats', array( 'aside', 'gallery' ,'video') );
add_theme_support( 'post-thumbnails' ); 

function add_custom_sizes() {
	add_image_size( 'blog-intro-thumb', 300, 200, true );
}
add_action('after_setup_theme','add_custom_sizes');

//exclude a category in home
/*function exclude_category( $query ) {
    if ( $query->is_home() && $query->is_main_query() ) {
        $query->set( 'cat', '-5' );
    }
}
add_action( 'pre_get_posts', 'exclude_category' );*/

//exclude more link scroll #more
function remove_more_link_scroll( $link ) {
	$link = preg_replace( '|#more-[0-9]+|', '', $link );
	return $link;
}
add_filter( 'the_content_more_link', 'remove_more_link_scroll' );

//modify a more link text
// function modify_read_more_link() {
    // return '<a class="more-link" href="' . get_permalink() . '">Continue lendo</a>';
// }
// add_filter( 'the_content_more_link', 'modify_read_more_link' );

//register sidebar
//add_filter('the_content', 'wpautop');
add_filter('widget_text','do_shortcode');
function theme_widgets_init() {
	register_sidebar( array(
        'name' => __( 'Barra Rodapé', 'barra-inferior-rodape' ),
        'id' => 'barra-inferior-rodape',
        'description' => __( 'Conteúdo inferior', 'barra-inferior-rodape' ),
        'before_widget' => '<address id="%1$s" class="widget more %2$s">',
		'after_widget'  => '</address>',
		'before_title'  => '<h4 class="side-title">',
		'after_title'   => '</h4>',
		) );
	register_sidebar( array(
			'name' => __( 'Barra Rodapé de Contato', 'barra-inferior-contato' ),
			'id' => 'barra-inferior-contato',
			'description' => __( 'Conteúdo do Contato', 'barra-inferior-contato' ),
			'before_widget' => '<aside id="contato-%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="side-title">',
			'after_title'   => '</h3>',
	) );
	register_sidebar( array(
			'name' => __( 'Copyright Footer', 'copyright-footer' ),
			'id' => 'copyright-footer',
			'description' => __( 'Conteúdo do Contato', 'copyright-footer' ),
			'before_widget' => '<section id="copy-%1$s" class="copyright %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="side-title">',
			'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
			'name' => __( 'Banner', 'sidebar-banner' ),
			'id' => 'barra-banner',
			'description' => __( 'Área de banner', 'sidebar-banner' ),
			'before_widget' => '<aside id="%1$s" class="widget banner %2$s">',
			'after_widget'  => '</aside>'
	) );
	register_sidebar( array(
			'name' => __( 'Área de transição 1', 'transicao1' ),
			'id' => 'transicao1',
			'description' => __( 'Área para conteúdo de transição', 'transicao1' ),
			'before_widget' => '<aside id="%1$s" class="parallax transicao side %2$s">',
			'after_widget'  => '</aside>'
	) );
	register_sidebar( array(
			'name' => __( 'Área icones sociais', 'social-area' ),
			'id' => 'social-area',
			'description' => __( 'Área dos ícones sociais', 'social-area' ),
			'before_widget' => '<div id="%1$s" class="social widget side %2$s">',
			'after_widget'  => '</div>'
	) );
	register_sidebar( array(
			'name' => __( 'Breadcrumbs', 'breadcrumbs' ),
			'id' => 'breadcrumbs',
			'description' => __( 'Área do caminho de navegação', 'breadcrumbs' ),
			'before_widget' => '<nav id="%1$s" class="breadcrumbs nav %2$s">',
			'after_widget'  => '</nav>'
	) );
	register_sidebar( array(
			'name' => __( 'Sidebar Blog', 'sidebar-blog' ),
			'id' => 'sidebar-blog',
			'description' => __( 'Área de apoio ao conteúdo do Blog', 'sidebar-blog' ),
			'before_widget' => '<aside id="%1$s" class="sidebar %2$s">',
			'after_widget'  => '</aside>'
	) );
}
add_action( 'widgets_init', 'theme_widgets_init' );

?>