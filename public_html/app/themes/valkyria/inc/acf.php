<?php
// Active acf options
	if (function_exists('acf_add_options_page')) {
		acf_add_options_page(array(
				'page_title' => 'Основные настройки',
				'menu_title' => 'Настройки темы',
				'menu_slug' => 'theme-general-settings',
				'capability' => 'edit_posts',
				'redirect' => false
		));

		acf_add_options_sub_page(array(
				'page_title' => 'Основная информация',
				'menu_title' => 'Основная информация',
				'parent_slug' => 'theme-general-settings',
		));

		acf_add_options_sub_page(array(
				'page_title' => 'Настройка секций',
				'menu_title' => 'Настройка секций',
				'parent_slug' => 'theme-general-settings',
		));

		acf_add_options_sub_page(array(
				'page_title' => 'Опросник',
				'menu_title' => 'Опросник',
				'parent_slug' => 'theme-general-settings',
		));

		acf_add_options_sub_page(array(
				'page_title' => 'Футор',
				'menu_title' => 'Футор',
				'parent_slug' => 'theme-general-settings',
		));

	}