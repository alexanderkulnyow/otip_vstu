<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Otip_Theme
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo( 'name' ); ?></title>
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png"/>
	<?php wp_enqueue_script( "jquery" ); ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >

<?php //the_header_image_tag(); ?>
<div id="page" class="site container-fluid">

    <header id="masthead" class="site-header" role="banner">
		<?php otip__topper(); ?>
        <!--main navigatino-->
        <div class="navbar navbar-default" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <nav class="navbar navbar-expand-md navbar-light bg-light" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
				<?php
				university_logo();
				wp_nav_menu( array(
					'theme_location'  => 'primary',
					'depth'           => 2,
					'container'       => 'div',
					'container_class' => 'collapse navbar-collapse justify-content-end bg-white',
					'container_id'    => 'bs-example-navbar-collapse-1',
					'menu_class'      => 'nav navbar-nav',
					'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
					'walker'          => new WP_Bootstrap_Navwalker(),
				) );
				?>
            </nav>

        </div>
        <!-- Все страницы кроме заглавной-->
<div class="row">
		<?php if ( ! is_front_page() ):
			if ( function_exists( 'dds_breadcrumbs' ) ):
				dds_breadcrumbs( ' / ' );
			endif;
		else:?>
            <img class="img-fluid w-100 p-0" src="<?php echo get_header_image(); ?>"
                 alt="<?php echo get_bloginfo( 'title' ); ?>">
		<?php endif;
		//		    ?>
</div>
    </header><!-- #masthead -->
    <div id="sitecontent" class="">


