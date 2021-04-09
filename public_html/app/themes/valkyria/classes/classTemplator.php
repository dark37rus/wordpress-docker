<?php
/**
 * Class tpl
 */

class tpl
{
    public static $theme_path;
    public static $theme_url;

    public static function getPathTheme($path)
    {
        self::$theme_path = $path . '/';
    }

    public static function getUrlTheme($url)
    {
        self::$theme_url = $url;
    }

    /**
     * @param $tmp
     * Принимает строку путь к нужному шаблон отталкиваясь от папки темы
     *
     * @param array $vars
     * Принимает массив переменных, которые передаються в шаблон, доступ к переменым идет в формате ключ -> значение
     *
     * @subcommand Кастомный шаблонизатор позволяющий вывести любой кусок кода и передать в него переменные.
     * В отличии от get_template_part(), все переданные переменные будут иметь свои название в подключенном файле
     * а не args['var_name']
     */
    public static function render($tmp, $vars = array())
    {
        if (file_exists(self::$theme_path . $tmp . '.php')) {
            ob_start();
            extract($vars);
            require self::$theme_path . $tmp . '.php';
            echo ob_get_clean();
        }
    }

    public static function getTemplate($tmp, $vars = array())
    {
        if (file_exists(self::$theme_path . $tmp . '.php')) {
            ob_start();
            extract($vars);
            require self::$theme_path . $tmp . '.php';
            return ob_get_clean();
        }
    }

    public static function getVar($var = null)
    {
        return $var !== '' && $var !== null ? $var : null;
    }
}
