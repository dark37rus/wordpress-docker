<?php
wp_nav_menu(
    [
        'menu'            => 'Основное меню',
        'menu_class'      => '',
        'container'       => 'div',
        'container_class' => $class . ' menu',
        'items_wrap'      => '<ul class="menu__list list">%3$s</ul>',
        'depth'           => 2,
    ]);
