<?php

add_action('header_site', 'header_content', 10);
function header_content()
{
    tpl::render('components/hamburger', ['class' => 'header__hamburger']);
    tpl::render('components/logotype', ['class' => 'header__logotype']);
    tpl::render('components/navigation', ['class' => 'header__navigation']);
    tpl::render('components/switcher_lang', ['class' => 'header__switcher']);
    tpl::render('components/phones', [
        'class' => 'header__phone',
        'phone' => $phones = get_field('phones', 'options')[0],
    ]);

}

add_action('wp_head', 'add_preloaders', 5);
function add_preloaders()
{
    tpl::render('template-parts/header/preloaders');
}
