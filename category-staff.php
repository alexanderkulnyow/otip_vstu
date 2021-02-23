<?php
get_header();
?>
    <main class="container">
        <h2 class="text-center bb"><span class="underline">Пр</span>еподавательский состав</h2>
        <section class="row">
            <div class="row align-content-center justify-content-center">
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
                    <div class="p-5 col-sm-6 col-md-4 staff_prepodlist ">

                        <a href="<?php echo esc_url( get_permalink() ); ?>"
                           rel="bookmark">
                            <div class="card" style="border: none">
								<?php the_post_thumbnail( array( 200, 'class' => 'img-fluid mx-auto' ) ); ?>
                                <div class="card-body mx-auto">
                                    <h4 class="img-fluid text-center" itemprop="name"
                                        style="width: 160px; white-space: normal;"><?php the_title(); ?></h4>
                                </div>
                            </div>
                        </a>

                    </div>

				<?php }
				wp_reset_postdata();
				?>
            </div>
        </section>
        <section class="">
            <!--            TODO переписат вывод лаборантов -->

            <h2 class="text-center bb"><span class="underline">Ла</span>борантский состав</h2>
            <div class="row justify-content-center">

				<?php
				// параметры по умолчанию
				$args = array(
					'numberposts'      => 0,
					'category_name'    => 'labs',
					'orderby'          => 'date',
					'order'            => 'ASC',
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
                    <div class="col-sm-6 col-md-4 staff_prepodlist">

                        <div class="card" style="border: none">
							<?php the_post_thumbnail( array( 200, 'class' => 'img-fluid mx-auto' ) ); ?>
                            <div class="card-body mx-auto">
                                <h4 class="img-fluid text-center" itemprop="name"
                                    style="width: 170px;"><?php the_title(); ?></h4>
                                <span class="text-center mx-auto d-block" ><?php echo get_post_meta( $post->ID, 'staff_post', true ); ?></span>

                            </div>
                        </div>

                    </div>

				<?php }
				wp_reset_postdata();
				?>

            </div>
        </section>

    </main>

<?php
get_footer();
