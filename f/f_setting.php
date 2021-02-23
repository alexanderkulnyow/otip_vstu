<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$contacts_page = 'contacts_parametrs'; // это часть URL страницы, рекомендую использовать строковое значение, т.к. в данном случае не будет зависимости от того, в какой файл вы всё это вставите

/*
 * Функция, добавляющая страницу в пункт меню Настройки
 */
function contacts_options() {
	global $contacts_page;
	add_theme_page( 'Contacts', 'Contacts', 'manage_options', $contacts_page, 'contacts_option_page' );
}

add_action( 'admin_menu', 'contacts_options' );

/**
 * Возвратная функция (Callback)
 */
function contacts_option_page() {
	global $contacts_page;
	?>
    <div class="wrap">
    <h2>Контактные данные</h2>
    <form method="post" enctype="multipart/form-data" action="options.php">
		<?php
		settings_fields( 'contacts_options' ); // меняем под себя только здесь (название настроек)
		do_settings_sections( $contacts_page );
		?>
        <p class="submit">
            <input type="submit" class="button-primary" value="<?php _e( 'Save Changes', 'theme_otip_vstu' ) ?>"/>
        </p>

    </form>
    </div><?php
}

/*
 * Регистрируем настройки
 * Мои настройки будут храниться в базе под названием contacts_options (это также видно в предыдущей функции)
 */
function contacts_option_settings() {
	global $contacts_page;
	// Присваиваем функцию валидации ( contacts_validate_settings() ). Вы найдете её ниже
	register_setting( 'contacts_options', 'contacts_options', 'contacts_validate_settings' ); // contacts_options

	// Добавляем секцию
	add_settings_section( 'contacts_section_1', 'Contacts', '', $contacts_page );

	// Создадим текстовое поле в первой секции
	$contacts_field_params = array(
		'type'      => 'text',
		'id'        => 'my_adres',
		'desc'      => 'Пример обычного текстового поля.',
		'code'      => '<code> echo get_option( \'contacts_options\' )[\'my_adres\']; </code>',
		'label_for' => 'my_adres'
	);
	add_settings_field( 'my_adres_field', 'Адрес', 'contacts_option_display_settings', $contacts_page, 'contacts_section_1', $contacts_field_params );
	// Создадим текстовое поле в первой секции
	$contacts_field_params = array(
		'type'      => 'email', // тип
		'id'        => 'my_mail',
		'desc'      => 'ex@example.com',
		'code'      => '<code> echo get_option( \'contacts_options\' )[\'my_mail\']; </code>',
		'label_for' => 'my_mail'
	);
	add_settings_field( 'my_mail_field1', 'e-mail', 'contacts_option_display_settings', $contacts_page, 'contacts_section_1', $contacts_field_params );
	// Создадим текстовое поле в первой секции
	$contacts_field_params = array(
		'type'      => 'tel',// тип
		'id'        => 'my_tel',
		'desc'      => '333-33-33',
		'code'      => '<code> echo get_option( \'contacts_options\' )[\'my_tel\']; </code>',
		'label_for' => 'my_tel'
	);
	add_settings_field( 'my_tel_field', 'Телефон', 'contacts_option_display_settings', $contacts_page, 'contacts_section_1', $contacts_field_params );
	// Добавляем секцию
	add_settings_section( 'contacts_section_2', 'University Logo', '', $contacts_page );
}

add_action( 'admin_init', 'contacts_option_settings' );

/*
 * Функция отображения полей ввода
 * Здесь задаётся HTML и PHP, выводящий поля
 */
function contacts_option_display_settings( $args ) {
	extract( $args );

	$option_name = 'contacts_options';

	$o = get_option( $option_name );

	switch ( $type ) {
		case 'text':
			$o[ $id ] = esc_attr( stripslashes( $o[ $id ] ) );
			echo "<input class='regular-text' type='text' id='$id' name='" . $option_name . "[$id]' value='$o[$id]' />";
			echo ( $desc != '' ) ? "<br /><span class='description'>$desc</span>" : "";
			echo ( $code != '' ) ? "<br /><span class='description'>Code: $code</span>" : "";
			break;
		case 'email':
			$o[ $id ] = esc_attr( stripslashes( $o[ $id ] ) );
			echo "<input class='regular-text' type='email' id='$id' name='" . $option_name . "[$id]' value='$o[$id]' />";
			echo ( $desc != '' ) ? "<br /><span class='description'>$desc</span>" : "";
			echo ( $code != '' ) ? "<br /><span class='description'>Code: $code</span>" : "";
			break;
		case 'tel':
			$o[ $id ] = esc_attr( stripslashes( $o[ $id ] ) );
			echo "<input class='regular-text' type='tel' id='$id'  name='" . $option_name . "[$id]' value='$o[$id]' />";
			echo ( $desc != '' ) ? "<br /><span class='description'>$desc</span>" : "";
			echo ( $code != '' ) ? "<br /><span class='description'>Code: $code</span>" : "";
			break;
	}
}

/*
 * Функция проверки правильности вводимых полей
 */
function contacts_validate_settings( $input ) {
	foreach ( $input as $k => $v ) {
		$valid_input[ $k ] = trim( $v );

		/* Вы можете включить в эту функцию различные проверки значений, например
		if(! задаем условие ) { // если не выполняется
			$valid_input[$k] = ''; // тогда присваиваем значению пустую строку
		}
		*/
	}

	return $valid_input;
}

$all_options = get_option( 'contacts_options' ); // это массив
