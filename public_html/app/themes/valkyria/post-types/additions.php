<?php
// хук для регистрации
add_action( 'init', 'create_taxonomy' );
function create_taxonomy(){

    // список параметров: wp-kama.ru/function/get_taxonomy_labels
    register_taxonomy( 'cat_additions', [ 'additions' ], [
        'label'                 => '', // определяется параметром $labels->name
        'labels'                => [
            'name'              => 'Категории',
            'singular_name'     => 'Категории',
            'search_items'      => 'Найти категорию',
            'all_items'         => 'Все категории',
            'view_item '        => 'Посмотреть категорию',
            'parent_item'       => 'Родительская категория',
            'parent_item_colon' => 'Родительская категория:',
            'edit_item'         => 'Изменить категорию',
            'update_item'       => 'Обновить категорию',
            'add_new_item'      => 'Добавить категорию',
            'new_item_name'     => 'Новая категория',
            'menu_name'         => 'Категории',
        ],
        'description'           => '', // описание таксономии
        'public'                => true,
        // 'publicly_queryable'    => null, // равен аргументу public
        // 'show_in_nav_menus'     => true, // равен аргументу public
        // 'show_ui'               => true, // равен аргументу public
        // 'show_in_menu'          => true, // равен аргументу show_ui
        // 'show_tagcloud'         => true, // равен аргументу show_ui
        // 'show_in_quick_edit'    => null, // равен аргументу show_ui
        'hierarchical'          => true,

        'rewrite'               => true,
        //'query_var'             => $taxonomy, // название параметра запроса
        'capabilities'          => array(),
        'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
        'show_admin_column'     => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
        'show_in_rest'          => null, // добавить в REST API
        'rest_base'             => null, // $taxonomy
        // '_builtin'              => false,
        //'update_count_callback' => '_update_post_term_count',
    ] );
}



add_action( 'init', 'register_post_type_additions' );
function register_post_type_additions(){
    register_post_type( 'additions', [
        'label'  => null,
        'labels' => [
            'name'               => 'Дополнения', // основное название для типа записи
            'singular_name'      => 'Дополнения', // название для одной записи этого типа
            'add_new'            => 'Добавить дополнение', // для добавления новой записи
            'add_new_item'       => 'Добавление дополнения', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование дополнения', // для редактирования типа записи
            'new_item'           => 'Новое дополнение', // текст новой записи
            'view_item'          => 'Смотреть дополнение', // для просмотра записи этого типа.
            'search_items'       => 'Искать дополнение', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Дополнения', // название меню
        ],
        'description'         => '',
        'public'              => true,
        // 'publicly_queryable'  => null, // зависит от public
        // 'exclude_from_search' => null, // зависит от public
        // 'show_ui'             => null, // зависит от public
        // 'show_in_nav_menus'   => null, // зависит от public
        'show_in_menu'        => null, // показывать ли в меню адмнки
        // 'show_in_admin_bar'   => null, // зависит от show_in_menu
        'show_in_rest'        => null, // добавить в REST API. C WP 4.7
        'rest_base'           => null, // $post_type. C WP 4.7
        'menu_position'       => null,
        'menu_icon'           => null,
        //'capability_type'   => 'post',
        //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
        //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
        'hierarchical'        => false,
        'supports'            => [ 'title', 'editor', 'thumbnail' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies'          => ['cat_additions'],
        'has_archive'         => true,
        'rewrite'             => true,
        'query_var'           => true,
    ] );
}
