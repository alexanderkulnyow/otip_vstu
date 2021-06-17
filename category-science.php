<?php
get_header();
?>

    <main class="container mt-5 mb-5">

        <div class="row">
            <div class="col-12 col-md-9">
	            <?php
	            while ( have_posts() ) :
		            the_post(); ?>
                    otip_science_item()

	            <?php
	            endwhile; // End of the loop.
	            ?>

	            <?php if ( $wp_query->max_num_pages > 1 ) : ?>
                    <script>
                        var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
                        var true_posts = '<?php echo serialize( $wp_query->query_vars ); ?>';
                        var current_page = <?php echo ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; ?>;
                        var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
                    </script>
                    <button id="true_loadmore" class="center-block pr-5 pl-5">Загрузить ещё</button>
	            <?php endif; ?>
            </div>
            <div class="col-12 col-md-3">
                <?php get_sidebar();?>
            </div>

        </div>


    </main>

<?php
get_footer();
