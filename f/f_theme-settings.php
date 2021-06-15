<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

//add theme support logo
add_theme_support( 'custom-logo', array(
	'height'      => 60,
	'width'       => 130,

) );
//nav
add_filter( 'get_custom_logo', 'change_logo_class' );

function change_logo_class( $html ) {

	$html = str_replace( 'custom-logo', 'logo', $html );
	$html = str_replace( 'custom-logo-link', 'navbar-brand', $html );

	return $html;
}

function university_logo(){
	if( has_custom_logo() ):
		// логотип есть выводим его
		echo get_custom_logo();
	else:
		//вывод placeholder
		echo '<a href="/" class="navbar-brand"><img class="header_logo" itemprop="logo"  src="http://placehold.it/108x40&text=NO LOGO" alt=""></a>';
	endif;
}

function otip_redline() {
	if ( is_category() ): ?>
		<div class="container-fluid staff_red">
			<h1> <?php single_cat_title() ?></h1>
			<p>
				<?php if ( function_exists( 'dds_breadcrumbs' ) ):
					dds_breadcrumbs( ' / ' );
				endif; ?>
			</p>
		</div>
	<?php else: ?>
		<div class="container-fluid staff_red">
			<a href="<?php echo get_the_permalink(); ?>">
				<h1><?php the_title(); ?></h1></a>
			<p>
				<?php if ( function_exists( 'dds_breadcrumbs' ) ):
					dds_breadcrumbs( ' / ' );
				endif; ?>
			</p>
		</div>
	<?php
	endif;
}
