<div class="row news__block ">
	<?php
	$args  = array(
		'numberposts'      => 0,
		'category_name'    => 'news',
		'orderby'          => 'date',
		'order'            => 'DESC',
		'include'          => array(),
		'exclude'          => array(),
		'meta_key'         => '',
		'meta_value'       => '',
		'post_type'        => 'post',
		'include_children' => 'false',
		'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
	);
	$query = new WP_Query( $args );
	while ( $query->have_posts() ) {
		$query->the_post();

        otip_news_card( 'col-md-4');

	} ?>
</div>

<?php
dds_loadmore_button('news');
