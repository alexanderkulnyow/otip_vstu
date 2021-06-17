<?php
get_header(); ?>
    <div id="primary" class="container content-area">
        <main id="main" class="site-main row" role="main">
			<?php
			if ( ! is_category( 'news' ) ) {
				echo '<div class="col-12 col-md-9">';
			} else {
				echo '<div class="col-12 mt-5 mb-5">';
			}

			if ( in_category( 'staff' ) ) {
				include 'template-parts/archive-staff.php';
			}

			if ( in_category( 'courses' ) ) {
				include 'template-parts/archive-courses.php';
			}

			if ( in_category( 'news' ) ) {
				include 'template-parts/archive-news.php';
			}

			if ( in_category( 'science' ) ) {
				include 'template-parts/archive-science.php';
			}

			echo '</div>';
			if ( ! is_category( 'news' ) ) {
				echo '<div class="col-12 col-md-3">';
				get_sidebar();
				echo '</div>';
			} ?>
        </main><!-- #main -->
    </div><!-- #primary -->
<?php

get_footer();
