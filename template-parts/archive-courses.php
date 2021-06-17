<?php
$args  = array(
	'numberposts'      => 0,
	'category_name'    => 'courses',
	'orderby'          => 'date',
	'order'            => 'ASC',
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
	?>
    <article id="post-<?php the_ID(); ?>" <?php post_class( 'list_post' ); ?>>
        <header class="entry-header">
            <style>
                .header__link {
                    text-decoration: none;
                }
                .header__link:hover {
                    text-decoration: underline;
                }
            </style>
			<?php
			if ( is_single() ) :
//			the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a class="header__link" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
			//		?>
        </header><!-- .entry-header -->
        <div class="entry-content">
			<?php the_excerpt(); ?>
        </div><!-- .entry-content -->
        <!--	<footer class="entry-footer">-->
<!--        <a href="--><?php //echo get_permalink(); ?><!--">-->
<!--            <button class="btn_readmore right">Читать далее</button>-->
<!--        </a>-->
    </article><!-- #post-## -->
	<?php
}

