<?php
// Register post type girls
add_action( 'init', 'register_post_type_girls' );

function register_post_type_girls() {
	$labels = array(
		'name'               => __( '[:ru]Мастера[:en]Masters[:]' ),
		'singular_name'      => 'Девушка',
		'add_new'            => 'Добавить девушку',
		'add_new_item'       => 'Добавить новую девушку',
		'edit_item'          => 'Редактировать данные девушки',
		'new_item'           => 'Новая девушка',
		'all_items'          => 'Все девушки',
		'view_item'          => 'Просмотреть девушку на сайте',
		'search_items'       => 'Искать девушку',
		'not_found'          => 'девушки не найдено',
		'not_found_in_trash' => 'В корзине нет девушки',
		'menu_name'          => __( '[:ru]Мастера[:en]Masters[:]' )

	);
	$args   = array(

		'labels'        => $labels,
		'public'        => true,
		'show_ui'       => true,
		'has_archive'   => true,
		'menu_icon'     => 'dashicons-awards',
		'menu_position' => 20,
		'supports'      => array( 'title', 'thumbnail', 'page-attributes', 'comments', 'post-formats' )

	);
	register_post_type( 'girls', $args );
}

// Register post type programs
add_action( 'init', 'register_post_type_programs' );

function register_post_type_programs() {

	$labels = array(

		'name'               => __( '[:ru]Программы[:en]Programs[:]' ),
		'singular_name'      => 'Программа',
		'add_new'            => 'Добавить программу',
		'add_new_item'       => 'Добавить новую программу',
		'edit_item'          => 'Редактировать данные программы',
		'new_item'           => 'Новая программа',
		'all_items'          => 'Все программы',
		'view_item'          => 'Просмотреть программу на сайте',
		'search_items'       => 'Искать программу',
		'not_found'          => 'программ не найдено',
		'not_found_in_trash' => 'В корзине нет программ',
		'menu_name'          => __( '[:ru]Программы[:en]Programs[:]' )

	);

	$args = array(

		'labels'        => $labels,
		'public'        => true,
		'show_ui'       => true,
		'has_archive'   => true,
		'menu_icon'     => 'dashicons-awards',
		'menu_position' => 20,
		'supports'      => array( 'title', 'thumbnail', 'page-attributes', 'comments ' )

	);

	register_post_type( 'programs', $args );

}


//Register taxonomies

function main_taxonomies() {

	register_taxonomy( 'main-taxonomies', array( 'girls', 'programs' ), array(

			'labels' => array(      // ярлыки, нужные при создании UI, если ничего не писать, то использует стандартные
				'name'                       => 'Категории девушек',
				'singular_name'              => 'Категории',
				'search_items'               => 'Найти категорию',
				'popular_items'              => 'Популярные категории',
				'all_items'                  => 'Все категории',
				'parent_item'                => null,
				'parent_item_colon'          => null,
				'edit_item'                  => 'Редактировать категорию',
				'update_item'                => 'Обновить категорию',
				'add_new_item'               => 'Добавить новую категорию',
				'new_item_name'              => 'Название новой категории',
				'separate_items_with_commas' => 'Разделяйте категории запятыми',
				'add_or_remove_items'        => 'Добавить или удалить категорию',
				'choose_from_most_used'      => 'Выбрать из наиболее часто используемых категорий',
				'menu_name'                  => 'Категории девушек'

			),

			'public'                => true,
			// каждый может использовать таксономию, либо только администраторы, по умолчанию - true
			'show_in_nav_menus'     => true,
			// добавить на страницу создания меню
			'show_ui'               => true,
			// добавить интерфейс создания и редактирования
			'show_tagcloud'         => true,
			// нужно ли разрешить облако тегов для этой таксономии ???
			'hierarchical'          => true,
			// true - по типу рубрик, false - по типу меток, по умолчанию - false
			'update_count_callback' => '_update_post_term_count',
			// callback-функция для обновления счетчика $object_type
			'query_var'             => true,
			/* разрешено ли использование query_var, также можно указать строку,
														  которая будет использоваться в качестве него, по умолчанию - имя таксономии */
			'rewrite'               => array( // настройки URL пермалинков

				'slug'         => 'main_taxonomies',  // ярлык
				'hierarchical' => true      // разрешить вложенность

			),
		)
	);
}

;
add_action( 'init', 'main_taxonomies', 2 );

function programs_taxonomies() {

	register_taxonomy( 'programs-taxonomies', array( 'programs' ), array(

			'labels' => array(      // ярлыки, нужные при создании UI, если ничего не писать, то использует стандартные

				'name'                       => 'Категории программ',
				'singular_name'              => 'Категории',
				'search_items'               => 'Найти категорию',
				'popular_items'              => 'Популярные категории',
				'all_items'                  => 'Все категории',
				'parent_item'                => null,
				'parent_item_colon'          => null,
				'edit_item'                  => 'Редактировать категорию',
				'update_item'                => 'Обновить категорию',
				'add_new_item'               => 'Добавить новую категорию',
				'new_item_name'              => 'Название новой категории',
				'separate_items_with_commas' => 'Разделяйте категории запятыми',
				'add_or_remove_items'        => 'Добавить или удалить категорию',
				'choose_from_most_used'      => 'Выбрать из наиболее часто используемых категорий',
				'menu_name'                  => 'Категории программ'

			),

			'public'                => true,
			// каждый может использовать таксономию, либо только администраторы, по умолчанию - true
			'show_in_nav_menus'     => true,
			// добавить на страницу создания меню
			'show_ui'               => true,
			// добавить интерфейс создания и редактирования
			'show_tagcloud'         => true,
			// нужно ли разрешить облако тегов для этой таксономии ???
			'hierarchical'          => true,
			// true - по типу рубрик, false - по типу меток, по умолчанию - false
			'update_count_callback' => '_update_post_term_count',
			// callback-функция для обновления счетчика $object_type
			'query_var'             => true,
			/* разрешено ли использование query_var, также можно указать строку,
														  которая будет использоваться в качестве него, по умолчанию - имя таксономии */
			'rewrite'               => array( // настройки URL пермалинков

				'slug'         => 'programs_taxonomies',  // ярлык
				'hierarchical' => true      // разрешить вложенность

			),
		)
	);
}

;


add_action( 'init', 'programs_taxonomies', 1 );


add_theme_support('post-formats', array('gallery'));
