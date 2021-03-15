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

    <header id="masthead" class="site-header">
		<?php otip__topper(); ?>
        <nav id="site-navigation" class="">
<!--        <nav id="site-navigation" class="main-navigation пошел на хуй">-->
            <div class="site-branding">
				<?php university_logo(); ?>
            </div><!-- .site-branding -->
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                <span id="burger" class="dashicons dashicons-menu-alt3"></span>
            </button>
<!--			--><?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'menu_id'        => 'primary-menu',
				)
			);
//			?>
        </nav><!-- #site-navigation -->
        <div class="row">
		    <?php if ( ! is_front_page() ):
//				echo '<div class="breadcrumbs__wrapper">';
			    if ( is_archive() ) {
//					the_archive_title( '<h1>', '</h1>' );
			    } elseif ( is_single() || is_page() ) {
//					the_title( '<h1>', '</h1>' );
			    }
			    if ( function_exists( 'dds_readline' ) ):
				    dds_readline( ' / ' );
			    endif;
//				echo '</div>';
		    else:?>
                <img class="img-fluid w-100 p-0" src="<?php echo get_header_image(); ?>"
                     alt="<?php echo get_bloginfo( 'title' ); ?>">
		    <?php endif;
		    //		    ?>
        </div>
    </header>




