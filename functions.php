<?php
/**
 * Otip_Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Otip_Theme
 */

remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_generator' );
add_filter( 'get_the_archive_title', function( $title ){
	return preg_replace('~^[^:]+: ~', '', $title );
});

if ( ! function_exists( 'otip_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function otip_theme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Otip_Theme, use a find and replace
		 * to change 'otip_theme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'theme_otip_vstu', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'theme_otip_vstu' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'otip_theme_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
	}
endif;
add_action( 'after_setup_theme', 'otip_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function otip_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'otip_theme_content_width', 640 );
}

add_action( 'after_setup_theme', 'otip_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function otip_theme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'theme_otip_vstu' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'theme_otip_vstu' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}

add_action( 'widgets_init', 'otip_theme_widgets_init' );

function theme_styles() {
//	подключаем стили
	wp_enqueue_style( 'otip_fonts', 'https://fonts.googleapis.com/css?family=Merriweather:300,400,700,900|Open+Sans:400,700' );
	wp_enqueue_style( 'bootstrap.min', get_template_directory_uri() . '/vendor/bootstrap/css/bootstrap.min.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/vendor/font-awesome-4.7.0/css/font-awesome.min.css' );
	wp_enqueue_style( 'slick', get_template_directory_uri() . '/vendor/slick/slick.css' );
	wp_enqueue_style( 'slick-theme', get_template_directory_uri() . '/vendor//slick/slick-theme.css' );
	wp_enqueue_style( 'otip_theme-style', get_stylesheet_uri(), '', '6' );
	wp_enqueue_style( 'dashicons' );
//	подключаем скрипты
	wp_enqueue_script( 'jquery' );

	wp_enqueue_script( 'bootstrap.js',
		get_template_directory_uri() . '/vendor/bootstrap/js/bootstrap.min.js', array(), ' 1', true );
	wp_enqueue_script( 'slick',
		get_template_directory_uri() . '/vendor/slick/slick.js', array(), ' 1', true );
	wp_enqueue_script( 'modernizr-2.8.3.min',
		get_template_directory_uri() . '/vendor/modernizr-2.8.3.min.js', array(), ' 1', true );
	wp_enqueue_script( 'plugins',
		get_template_directory_uri() . '/js/plugins.js', array(), ' 1', true );
	wp_enqueue_script( 'otip_theme-navigation',
		get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'main',
		get_template_directory_uri() . '/js/main.js', array(), ' 1.9', true );
}

add_action( 'wp_enqueue_scripts', 'theme_styles' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

// Register Custom Navigation Walker
require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';


add_filter( 'wpematico_img_src_url', 'myfunction_img_src', 10, 1 );
function myfunction_img_src( $imagen_src_real ) {
// Find only image filenames after the / and before the ? sign
	preg_match( '/[^\/\?]+\.(?:jp[eg]+|png|bmp|giff?|tiff?)/i', $imagen_src_real, $matches );
// First step of urldecode and sanitize the filename
	$imgname = sanitize_file_name( urldecode( basename( $matches[0] ) ) );
// Split the name from the extension
	$parts     = explode( '.', $imgname );
	$name      = array_shift( $parts );
	$extension = array_pop( $parts );
// Join all names splitted by dots
	foreach ( (array) $parts as $part ) {
		$name .= '.' . $part;
	}
// Second step of urldecode and sanitize only the name of the file
	$name = sanitize_title( urldecode( $name ) );
// Join the name with the extension
	$newimgname = dirname( $imagen_src_real ) . '/' . $name . '.' . $extension;

	return $newimgname;
}


//подгрузка постов
function true_load_posts() {

	$args                = unserialize( stripslashes( $_POST['query'] ) );
	$args['paged']       = $_POST['page'] + 1; // следующая страница
	$args['post_status'] = 'publish';

// обычно лучше использовать WP_Query, но не здесь
	query_posts( $args );
// если посты есть
	if ( have_posts() ) :

		?>
        <div class="row">
			<?php
			while ( have_posts() ) :
				the_post(); ?>
                <div class="news__item col-md-4 pl-5 pr-5 pb-5">
                    <a href="<?php echo esc_url( get_permalink() ); ?>">
                        <h3 class="color_coral" itemprop="name"><?php the_title(); ?></h3>
                    </a>
                    <div class="text-justify mt-4"><?php the_excerpt(); ?></div>

                    <a href="<?php echo esc_url( get_permalink() ); ?>" class="news__link"
                       rel="bookmark"> Читать полностью...</a>
                </div>
			<?php
			endwhile; // End of the loop.
			?>
        </div>
	<?php

	endif;
	die();
}

add_action( 'wp_ajax_loadmore', 'true_load_posts' );
add_action( 'wp_ajax_nopriv_loadmore', 'true_load_posts' );


require 'f/f_setting.php';
require 'f/f_theme-settings.php';
require 'f/Kulnyow_Breadcrumbs.php';

function otip__topper() {
 ?>
    <div class="topper row">
        <div class="col">
            <div class="inlinetext topper-dropdown">
                <i class="fa fa-map-marker" aria-hidden="true" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"></i>
                <a class="dropdown-menu1" aria-labelledby="dropdownMenuButton1" href="#location"><?php echo get_option( 'contacts_options' )['my_adres']; ?></a>
            </div>
        </div>
        <div class="col">
            <div class="inlinetext topper-dropdown">
                <i class="fa fa-envelope-o" aria-hidden="true" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false"></i>
                <a class="dropdown-menu1" aria-labelledby="dropdownMenuButton2" href="mailto:<?php echo get_option( 'contacts_options' )['my_mail']; ?>"><?php echo get_option( 'contacts_options' )['my_mail']; ?></a>
            </div>
        </div>
        <div class="col">
            <div class="inlinetext topper-dropdown">
                <i class="fa fa-mobile" aria-hidden="true" id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-expanded="false"></i>
                <a class="dropdown-menu1" aria-labelledby="dropdownMenuButton3" href="tel: <?php echo get_option( 'contacts_options' )['my_tel']; ?>"><?php echo get_option( 'contacts_options' )['my_tel']; ?></a>
            </div>
        </div>
        <div class="col align-self-end d-md-none d-lg-block">
<?php echo do_shortcode('[bvi]')?>
        </div>
    </div>
<?php
}
