<?php
// Logo customization support
	function theme_prefix_setup()
	{
		add_theme_support('custom-logo', array(
				'width' => 1000,
				'height' => 159,
				'flex-width' => true,
		));
	}

// Support thumbnail for posts
	if (function_exists('add_theme_support')) {
		add_theme_support('post-thumbnails');
	}

// Support menu
	function register_my_menu()
	{
		register_nav_menu('header-menu', __('Основное меню'));
	}

	add_action('init', 'register_my_menu');

// Delete ID from all menu items on the site
	add_filter('nav_menu_item_id', '__return_empty_string');


// Change menu item css classes
//	add_filter('nav_menu_css_class', 'change_menu_item_css_classes', 10, 4);

	function change_menu_item_css_classes($classes, $item, $args, $depth)
	{

		if ($args) {

			$classes = ['menu__item'];

		} else {

			$classes = [];

		}

		return $classes;

	}


// Add classes to links
	add_filter('nav_menu_link_attributes', 'filter_nav_menu_link_attributes', 10, 4);

	function filter_nav_menu_link_attributes($atts, $item, $args, $depth)
	{

		if ($args) {

			$atts['class'] = 'link menu__link';

		}

		return $atts;

	}

	// Allow downloading prohibited file types
	function my_myme_types($mime_types)
	{
		$mime_types['svg'] = 'image/svg+xml'; //Adding svg extension
		$mime_types['psd'] = 'image/vnd.adobe.photoshop'; //Adding photoshop files
		$mime_types['woff'] = 'font/woff';
		$mime_types['woff2'] = 'font/woff2';
		$mime_types['xml'] = 'image/xml';
		return $mime_types;
	}

	add_filter('upload_mimes', 'my_myme_types', 1, 1);

/**
 * @param $phone
 * @return string|string[]|null
 */
function phone_format($phone)
{
    $phone = trim($phone);

    $res = preg_replace(
        array(
            '/[\+]?([7|8])[-|\s]?\([-|\s]?(\d{3})[-|\s]?\)[-|\s]?(\d{3})[-|\s]?(\d{2})[-|\s]?(\d{2})/',
            '/[\+]?([7|8])[-|\s]?(\d{3})[-|\s]?(\d{3})[-|\s]?(\d{2})[-|\s]?(\d{2})/',
            '/[\+]?([7|8])[-|\s]?\([-|\s]?(\d{4})[-|\s]?\)[-|\s]?(\d{2})[-|\s]?(\d{2})[-|\s]?(\d{2})/',
            '/[\+]?([7|8])[-|\s]?(\d{4})[-|\s]?(\d{2})[-|\s]?(\d{2})[-|\s]?(\d{2})/',
            '/[\+]?([7|8])[-|\s]?\([-|\s]?(\d{4})[-|\s]?\)[-|\s]?(\d{3})[-|\s]?(\d{3})/',
            '/[\+]?([7|8])[-|\s]?(\d{4})[-|\s]?(\d{3})[-|\s]?(\d{3})/',
        ),
        array(
            '+7 ($2) $3-$4-$5',
            '+7 ($2) $3-$4-$5',
            '+7 ($2) $3-$4-$5',
            '+7 ($2) $3-$4-$5',
            '+7 ($2) $3-$4',
            '+7 ($2) $3-$4',
        ),
        $phone
    );

    return $res;
}

/**
 * Add custom background
 */
$defaults = array(
    'default-color'          => '#695976',
    'default-image'          => '',
    'wp-head-callback'       => '_custom_background_cb',
    'admin-head-callback'    => '',
    'admin-preview-callback' => ''
);
add_theme_support( 'custom-background', $defaults );


/**
 * Включает поддержку html5 разметки для списка комментариев,
 * формы комментариев, формы поиска, галереи и т.д. Где нужно включить разметку указывается во втором параметре:
 */
add_theme_support( 'html5', array(
    'comment-list',
    'comment-form',
    'search-form',
    'gallery',
    'caption',
    'script',
    'style',
) );

/**
 * Поддержка тега title
 */
add_theme_support( 'title-tag' );

/**
 * Add support logo
 *
 * get: the_custom_logo() or get_custom_logo()
 */
add_theme_support( 'custom-logo', [
    'height'      => 50,
    'width'       => 265,
    'flex-width'  => true,
    'flex-height' => true,
    'header-text' => '',
    'unlink-homepage-logo' => true, // WP 5.5
] );
