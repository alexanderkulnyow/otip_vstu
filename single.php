<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Otip_Theme
 */

get_header(); ?>

	<div id="primary" class="container content-area mt-5">
        <div class="row">
            <div class="col-12 col-md-9">
                <main id="main" class="site-main" role="main">

		            <?php
		            while ( have_posts() ) : the_post();

			            get_template_part( 'template-parts/content_single', get_post_format() );

//			the_post_navigation();
//
//			// If comments are open or we have at least one comment, load up the comment template.
//			if ( comments_open() || get_comments_number() ) :
//				comments_template();
//			endif;

		            endwhile; // End of the loop.
		            ?>

                </main><!-- #main -->
            </div>
            <div class="col-12 col-md-3">
	            <?php get_sidebar();?>
            </div>
        </div>

	</div><!-- #primary -->

<?php
//
get_footer();
