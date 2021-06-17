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
    <main class=" ">
        <section class="container mt-5 mb-5">
            <div class="row">
                <h1><span class="underline">Но</span>вости университета</h1>
                <div class="news__block front__news">
					<?php
					global $post;
					$myposts = get_posts( array(
							'numberposts' => 10,
							'category'    => '7',
						)
					);
					foreach ( $myposts as $post ) {
						setup_postdata( $post );
						otip_news_card('');
					}
					?>
                </div>
            </div>
        </section>


        <section class="row prepodback">

            <h2>Преподавательский состав</h2>

            <div class="staff">
				<?php
				global $post;
				$myposts = get_posts( array(
						'numberposts' => 10,
						'category'    => '17',
					)
				);

				foreach ( $myposts as $post ) {
					setup_postdata( $post );
					?>
                    <div class="staff__item">
                        <a href=" <?php echo esc_url( get_permalink() ); ?>">
							<?php the_post_thumbnail( 'thumbnail', array( 'class' => ' rounded-circle center-block ' ) ); ?>
                        </a>

                        <a href=" <?php echo esc_url( get_permalink() ); ?>">
                            <h4 class="text-center mt-2 front__prepod_name"
                                itemprop="name"> <?php echo get_the_title(); ?></h4>
                        </a>
                    </div>
					<?php
				}
				?>

            </div>


        </section>

        <section class="container-fluid googlemap p-0">
            <h1><span class="underline">На</span>ши контакты</h1>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="columntext">
                            <span class="dashicons dashicons-location"></span>
                            <a href="#map">Московский пр.-т д.72</a>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="columntext contwithboarder">
                            <span class="dashicons dashicons-email"></span>
                            <a href="mailto:otip@vstu.by"> otip@vstu.by</a>
                        </div>
                    </div>
                    <!--                <div class="divider"></div>-->
                    <div class="col-12 col-md-4">
                        <div class="columntext ">
                            <span class="dashicons dashicons-phone"></span>
                            <a href="tel: 8(0212)495355"> 8(0212)49-53-55</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-lg-12" id="map">

                    </div>
                </div>
            </div>
            <script async defer
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAUiwQs_PI6PLbOaNM20fVEWqD2upQjNVQ&callback=initMap"></script>
            <script>
                function initMap() {
                    var uluru = {lat: 55.1781968, lng: 30.2351773};
                    var map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 15,
                        center: uluru
                    });
                    var marker = new google.maps.Marker({
                        position: uluru,
                        map: map
                    });
                }
            </script>
        </section>
    </main>
<?php
get_footer();
