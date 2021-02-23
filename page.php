<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Otip_Theme
 */

get_header(); ?>
<?php if ( is_front_page() ) { ?>
	<?php
	include 'front-page.php' ?>
<?php } else { ?>
    <div id="primary" class="content-area container">
        <main id="main" class="site-main" role="main">
			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', 'page' );
				// If comments are open or we have at least one comment, load up the comment template.
			endwhile; // End of the loop.
			?>
        </main><!-- #main -->
    </div><!-- #primary -->
<?php } ?>

<?php
get_footer();