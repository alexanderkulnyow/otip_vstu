<?php
get_header();
?>
    <main class="container">
        <div class="row">
            <div class="col-12 col-md-9">
                <section class="row">

                    <h2 class="text-left bb"><span class="underline">Пр</span>еподавательский состав</h2>
					<?php
					// параметры по умолчанию
					$args = array(
						'numberposts'      => 0,
						'category_name'    => 'staff',
						'orderby'          => 'date',
						'order'            => 'DESC',
						'include'          => array(),
						'exclude'          => array( 19 ),
						'meta_key'         => '',
						'meta_value'       => '',
						'post_type'        => 'post',
						'include_children' => 'false',
						'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
					);

					$posts = get_posts( $args );
					foreach ( $posts as $post ) {
						setup_postdata( $post ); ?>
                        <div class="col-12 col-sm-6 col-md-12">

                            <div class="card mb-4 w-80">
                                <!--                                <a href="-->
								<?php //echo esc_url( get_permalink() ); ?><!--" style="text-decoration: none"   rel="bookmark">-->
                                <div class="row align-items-center g-0 staff__card">
                                    <div class="col-md-3">
	                                        <?php
	                                        if ( has_post_thumbnail() ) { ?>
                                                <a href="<?php echo the_permalink(); ?>"
                                                   title="<?php the_title_attribute(); ?>" class="card-img-wrapper">
			                                        <?php
			                                        $default_attr = array(
//				                                        'src'   => $src,
				                                        'class' => "img-fluid",
//				                                        'alt'   => trim( strip_tags( $wp_postmeta->_wp_attachment_image_alt ) ),
			                                        );
			                                        the_post_thumbnail( 'medium', $default_attr );
			                                        ?>

                                                </a>
		                                        <?php
	                                        }
	                                        ?>

                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body ">
                                            <a href="<?php echo the_permalink(); ?>"
                                               title="<?php the_title_attribute(); ?>" style="text-decoration: none;">

                                                <h4 class="card-title"><?php the_title(); ?></h4>
                                            </a>
                                            <div class="card-meta pt-2">


												<?php
												if ( get_post_meta( $post->ID, 'menu-cost', true ) ) :
													echo '<p class="p-0 m-1">Должность: ' . get_post_meta( $post->ID, 'menu-cost', true ) . '</p>';
												endif;
												if ( get_post_meta( $post->ID, 'menu-weight', true ) ) :
													echo '<p class="p-0 m-1">Ученая степень: ' . get_post_meta( $post->ID, 'menu-weight', true ) . '</p>';
												endif;
												if ( get_post_meta( $post->ID, 'menu-elib', true ) ) :
													echo '<a href="' . get_post_meta( $post->ID, 'menu-elib', true ) . '"> 
													<img src=" ' . get_template_directory_uri() . '/img/elibrary.jpg " alt=" "> </a>';
												endif;
												?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--                                </a>-->
                            </div>
                        </div>

					<?php }
					wp_reset_postdata();
					unset($args, $posts, $post );
					?>
                </section>
                <section class="">

<!--                    <h2 class="text-center bb"><span class="underline">Ла</span>борантский состав</h2>-->
                    <div class="row justify-content-center">

						<?php
						// параметры по умолчанию
						$args = array(
//							'numberposts'      => -1,
							'category_name'    => 'labs',
							'orderby'          => 'date',
							'order'            => 'ASC',
//							'include'          => array(),
//							'exclude'          => array( 19 ),
							'meta_key'         => ' ',
							'meta_value'       => ' ',
							'post_type'        => 'post',
							'include_children' => 'false',
							'suppress_filters' => true // подавление работы фильтров изменения SQL запроса
						);

						$posts = get_posts( $args );
						foreach ( $posts as $post ) {
							setup_postdata( $post ); ?>
                            <div class="col-sm-6 col-md-4 staff_prepodlist">

                                <div class="card" style="border: none">
									<?php the_post_thumbnail( 'thumbnail', array(
										200,
										'class' => 'img-fluid mx-auto'
									) ); ?>
                                    <div class="card-body mx-auto">
                                        <h4 class="img-fluid text-center" itemprop="name"
                                            style="width: 170px;"><?php the_title(); ?></h4>
                                        <span class="text-center mx-auto d-block"><?php echo get_post_meta( $post->ID, 'staff_post', true ); ?></span>

                                    </div>
                                </div>

                            </div>

						<?php }

//						var_dump($args);
//						var_dump($posts);
						wp_reset_postdata();
						?>

                    </div>


                </section>
            </div>
            <aside class="col-12 col-md-3">
				<?php get_sidebar(); ?>

            </aside>
        </div>


        </div>

    </main>

<?php
get_footer();
