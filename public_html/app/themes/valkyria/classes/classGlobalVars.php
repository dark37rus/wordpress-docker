<?php

/**
 * Class GlobalVars
 */
class GlobalVars
{
    public static $currency = '₽';
    public static $time_type;
    public static $minute;
    public static $descr_program_list;
    public static $order;
    public static $order_massage;
    public static $more_photo;
    public static $slider_girls_title;
    public static $get_stock;
    public static $recommended_programs_cards;
    public static $recommended_programs;
    public static $see_all;

//  Whatsapp
    public static $whatsapp;
    public static $start_link_whatsapp;
    public static $link_whatsapp;
    public static $interior_caption;
    public static $contacts_caption;

    public static function set_domains()
    {
        self::$minute                       = __('[:ru]минут[:en]minute[:]');
        self::$descr_program_list           = __('[:ru]В данную программу входит[:en]This program includes[:]');
        self::$order                        = __('[:ru]Записаться[:en]Sign up[:]');
        self::$order_massage                = __('[:ru]Записаться на массаж[:en]Sign up for a massage[:]');
        self::$more_photo                   = __('[:ru]Больше фото[:en]More photos[:]');
        self::$slider_girls_title           = __('[:ru]Девушки в этом образе[:en]Girls in this look[:]');
        self::$get_stock                    = __('[:ru]Получить скидку[:en]Get a discount[:]');
        self::$recommended_programs_cards   = __('[:ru]Рекомендуемые программы:[:en]Recommended programs:[:]');
        self::$recommended_programs         = __('[:ru]Рекомендуемые программы в этом [:en]Recommended programs in this:[:]');
        self::$see_all                      = __('[:ru]Смотреть все [:en]See all [:]');
        self::$interior_caption             = __('[:ru]Интерьер салона[:en]Salon interior[:]');
        self::$contacts_caption             = __('[:ru]Контакты[:en]Contacts[:]');
    }

    public static function set_whatsapp($number){
        self::$start_link_whatsapp  = 'https://api.whatsapp.com/send?phone=';
        self::$whatsapp             = $number;
        self::$link_whatsapp        = self::$start_link_whatsapp . $number;
    }
}
