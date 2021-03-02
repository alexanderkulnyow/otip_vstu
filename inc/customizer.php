<?php
/**
 * Otip_Theme Theme Customizer
 *
 * @package Otip_Theme
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function otip_theme_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$dds_transport = 'postMessage';

	$wp_customize->add_section(
		'otip__contacts', // id секции, должен прописываться во всех настройках, которые в неё попадают
		array(
			'title'       => 'Контакты',
			'priority'    => 600, // приоритет расположения относительно других секций
			'description' => 'Контакты' // описание не обязательное
		)
	);
//Адрес
	$wp_customize->add_control(
		'otip__contacts-adress', //id
		array(
			'type'     => 'text',
			'label'    => 'Адрес', // title
			'settings' => 'otip__contacts-adress-s', // id настроек
			'section'  => 'otip__contacts' // id секции
		)
	);
	//описание гайда
	$wp_customize->add_setting(
		'otip__contacts-adress-s', // id
		array(
			'default'   => 'Московский пр-т д.72', // значение по умолчанию
			'transport' => $dds_transport
		)
	);






	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'uni_italy_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'uni_italy_customize_partial_blogdescription',
			)
		);
//		$wp_customize->selective_refresh->add_partial( 'lyuba__guiede-bg', array(
//			'selector'        => '.lyuba__guiede-bg',
//			'render_callback' => function () use ( $day ) {
//				return nl2br( esc_html( get_theme_mod( $day ) ) );
//			}
//		) );
	}
}
add_action( 'customize_register', 'otip_theme_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function otip_theme_customize_preview_js() {
	wp_enqueue_script( 'otip_theme_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'otip_theme_customize_preview_js' );
