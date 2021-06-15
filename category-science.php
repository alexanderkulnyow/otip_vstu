<?php
get_header();
?>

    <main class="container mt-5 mb-5">

        <div class="row">
            <div class="col-12 col-md-9">
	            <?php
	            while ( have_posts() ) :
		            the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'list_post' ); ?>>
                        <header class="entry-header">
				            <?php
				            if ( is_single() ) :
//			the_title( '<h1 class="entry-title">', '</h1>' );
				            else :
					            the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				            endif;
				            //		?>
                        </header><!-- .entry-header -->
                        <div class="entry-content">

				            <?php
				            if ( has_post_thumbnail() ) { ?>
                                <a href="<?php echo get_the_permalink(); ?>"
                                   title="<?php the_title_attribute(); ?>" class="card-img-wrapper">
						            <?php
						            $default_attr = array(
//							            'src'   => $src,
							            'class' => "img-fluid w-100",
//							            'alt'   => trim( strip_tags( $wp_postmeta->_wp_attachment_image_alt ) ),
						            );
						            the_post_thumbnail( 'full', $default_attr );
						            ?>

                                </a>
					            <?php
				            } else {
					            the_excerpt();
				            }
				            ?>
                        </div><!-- .entry-content -->
                        <!--	<footer class="entry-footer">-->
                        <a href="<?php echo get_permalink(); ?>">
                            <button class="btn_readmore right">Читать далее</button>
                        </a>
                    </article><!-- #post-## -->
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
