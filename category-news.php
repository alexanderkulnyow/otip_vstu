<?php
get_header();
?>

    <main class="container mt-5 mb-5">

        <div class="row news__block">
			<?php
			while ( have_posts() ) :
				the_post();
				otip_news_card( 'col-md-4');

			endwhile; // End of the loop.
			?>
        </div>

		<?php if ( $wp_query->max_num_pages > 1 ) : ?>
            <script>
                var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
                var true_posts = '<?php echo serialize( $wp_query->query_vars ); ?>';
                var current_page = <?php echo ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; ?>;
                var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
            </script>
            <button id="true_loadmore" class="center-block m-auto" style="padding: 10px 25px">Загрузить ещё</button>
		<?php endif; ?>
    </main>

<?php
get_footer();
