<?php
/**
 * Reset base elements wp
 */

require get_template_directory() . '/classes/class-site.php';
Site::init();

/**
 * Include style and js
 */
require Site::$theme['path'] . '/inc/include-assets.php';

require Site::$theme['path'] . '/inc/functions.php';

require Site::$theme['path'] . '/inc/reset-elements-wp.php';

/**
 * Support acf
 */
require Site::$theme['path'] . '/inc/acf.php';

/**
 * Add support functions wp
 */
require Site::$theme['path'] . '/inc/add-support-function-wp.php';

/**
 * Add custom size images
 */
require Site::$theme['path'] . '/inc/custom-size-image.php';

/**
 * Add register post type
 */
require Site::$theme['path'] . '/inc/register-post-type.php';

require Site::$theme['path'] . '/post-types/_index.php';


/**
 * Global variables
 */
require Site::$theme['path'] . '/classes/classGlobalVars.php';
require Site::$theme['path'] . '/classes/classLang.php';

require Site::$theme['path'] . '/classes/class-ACF_Archive.php';

GlobalVars::set_domains();
if (function_exists('get_field')) {
    GlobalVars::set_whatsapp(get_field('whatsapp_number', 'options'));
}
Site::setParams(
    [
        'minute'                     => __('[:ru]минут[:en]minute[:]'),
        'descr_program_list'         => __('[:ru]В данную программу входит[:en]This program includes[:]'),
        'order'                      => __('[:ru]Записаться[:en]Sign up[:]'),
        'order_massage'              => __('[:ru]Записаться на массаж[:en]Sign up for a massage[:]'),
        'more_photo'                 => __('[:ru]Больше фото[:en]More photos[:]'),
        'slider_girls_title'         => __('[:ru]Девушки в этом образе[:en]Girls in this look[:]'),
        'get_stock'                  => __('[:ru]Получить скидку[:en]Get a discount[:]'),
        'recommended_programs_cards' => __('[:ru]Рекомендуемые программы:[:en]Recommended programs:[:]'),
        'recommended_programs'       => __('[:ru]Рекомендуемые программы в этом [:en]Recommended programs in this:[:]'),
        'see_all'                    => __('[:ru]Смотреть все [:en]See all [:]'),
        'interior_caption'           => __('[:ru]Интерьер салона[:en]Salon interior[:]'),
        'contacts_caption'           => __('[:ru]Контакты[:en]Contacts[:]'),
    ], 'trans');

require Site::$theme['path'] . '/classes/classVarJS.php';

/**
 * Rest api
 */
require Site::$theme['path'] . '/inc/rest-api.php';

/**
 * Translates
 */
require Site::$theme['path'] . '/inc/translates.php';

require Site::$theme['path'] . '/classes/classTemplator.php';
tpl::getPathTheme(Site::$theme['path']);
tpl::getUrlTheme(Site::$theme['url']);

// Contact Form 7 remove auto added p tags
add_filter('wpcf7_autop_or_not', '__return_false');
require Site::$theme['path'] . '/setting-wordpress/svg-include.php';


require Site::$theme['path'] . '/template-parts/header/hooks.php';

require Site::$theme['path'] . '/template-parts/footer/hooks.php';

/**
 * Widgets
 */
require Site::$theme['path'] . '/inc/regist-widgets.php';

require Site::$theme['path'] . '/template-parts/forms/form-init.php';

function get_bg_pages(){

    $bg = null;
    $size = 'large';
    global $post;

    if (is_single())
        $bg = get_field('bg_item', get_post_type());
    elseif(is_archive())
        $bg = get_field('bg_archive', get_post_type());
    elseif(is_page())
        $bg = get_field('bg-page', $post->ID)['sizes'][$size];

    return $bg;
}
