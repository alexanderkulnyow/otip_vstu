<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Otip_Theme
 */

get_header(); ?>

<?php if ( is_front_page() ) { ?>
	<?php
	include 'front-page.php' ?>
<?php } ?>
    <div id="primary" class="content-area container">
        <main id="main" class="site-main" role="main">
			<?php
			if ( have_posts() ) :
				/*красная лента с хлебными крошками*/
				if ( is_home() && ! is_front_page() ) : ?>
                    <header>
                        <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                    </header>
				<?php
				endif;
				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content', get_post_format() );
				endwhile;
				the_posts_navigation();
			else :
				get_template_part( 'template-parts/content', 'none' );
			endif; ?>
        </main><!-- #main -->
    </div><!-- #primary -->
<?php
get_footer();
