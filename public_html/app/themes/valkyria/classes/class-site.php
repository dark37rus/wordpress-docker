<?php

use function Env\env;

class Site {
    /**
     * @var array
     * Params teheme
     */
    public static $theme = [];

    /**
     * @var array
     * Global vars
     */
    public static $vars = [];

    /**
     * @var array
     * Global vars
     */
    public static $lang = [];


    /**
     * Set init params
     */
    public static function init()
    {
        self::setThemeUrl(get_template_directory_uri());
        self::setThemePath(get_template_directory());
        self::setThemeName(env('WP_THEME_NAME'));

        if (function_exists('qtrans_getLanguage')) {
            self::$lang['current'] = qtrans_getLanguage();
        }

    }

    public static function setParams($array = [], $type = 'var')
    {

        if ($type == 'var') {
            if (is_array($array)) {
                foreach ($array as $key => $value) {
                    self::$vars[$key] = $value;
                }
            }
        } elseif ($type == 'trans') {
            if (is_array($array)) {
                foreach ($array as $key => $value) {
                    self::$lang['trans'][$key] = $value;
                }
            }
        }

    }

    public static function getParam($key, $type = 'var')
    {

        if ($type == 'var') {
            return self::$vars[$key];
        } elseif ($type == 'trans') {
            return self::$lang['trans'][$key];
        }

    }

    public static function theParam($key, $type = 'var')
    {
        if ($type == 'var') {
            echo self::$vars[$key];
        } elseif ($type == 'trans') {
            echo self::$lang['trans'][$key];
        }
    }

    /**
     * Get url site
     */
    public static function setThemeUrl($url_site)
    {
        self::$theme['url'] = $url_site;
    }

    /**
     * Get url site
     */
    public static function setThemeName($url_site)
    {
        self::$theme['name'] = env('WP_THEME_NAME');
    }

    /**
     * Get path theme
     */
    public static function setThemePath($path_theme)
    {
        self::$theme['path'] = $path_theme;
    }

    public static function thePosts($post_type, $args = [])
    {
        global $wp_query;
        $tmp_default       = 'template-parts/item/item-' . $post_type;
        $args['post_type'] = $post_type ?? 'post';

        $query = new WP_Query($args);

        while ($query->have_posts()) {
            $query->the_post();
            global $post;

            tpl::render(
                $args['template'] ?? $tmp_default,
                [
                    'post'   => $post,
                    'class'  => $args['class'] ?? 'col-12',
                    'fields' => get_field_objects($post->ID),
                ]
            );
        }
    }

    public static function getPosts($post_type, $args = [])
    {
        $posts             = null;
        $index             = 0;
        $args['post_type'] = $post_type ?? 'post';
        $query             = new WP_Query($args);

        if( empty( $query ) )
            return new WP_Error( 'no_author_posts', 'Записей не найдено', array( 'status' => 404 ) );

        while ($query->have_posts()) {
            $query->the_post();
            global $post;

            $posts[$index]['post']   = $post;                                                                     //Получение поста
            $posts[$index]['fields'] = get_field_objects($post->ID);                                              //Получение всех полей поста
            $posts[$index]['thumb']  = get_the_post_thumbnail_url($post->ID, $args['thumb_size'] ?? 'full'); //Получение изображения поста
            $posts[$index]['url']  = get_permalink($post->ID); //Получение изображения поста

            $index++;
        }

        return $posts;
    }

}

