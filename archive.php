<?php
get_header(); ?>
    <div id="primary" class="container content-area">
        <main id="main" class="site-main row" role="main">
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) : the_post();
					if ( is_category( 'staff' ) ):
						include 'template-parts/staff/staff-archive.php';

					else:
						get_template_part( 'template-parts/content', get_post_format() );
					endif;

				endwhile;
				if ( is_category( 'staff' ) ) {
					include "template-parts/staff/labs.php";
				} else {
	//				get_template_part( 'template-parts/content', 'none' );
				}
			endif; ?>
        </main><!-- #main -->
    </div><!-- #primary -->
<?php
//get_sidebar();
get_footer();
