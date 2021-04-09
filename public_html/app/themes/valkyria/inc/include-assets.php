<?php
    // JS
	function load_scripts_frontend()
	{
		wp_enqueue_script('jquery');
	}

	add_action('wp_enqueue_scripts', 'load_scripts_frontend');

    // Files before compiletion webpack
	function webpack_scripts()
	{
		// Style
		wp_enqueue_style('vendors_css', get_template_directory_uri() . '/assets/css/vendors.css', null, 1.2);
		wp_enqueue_style('main_css', get_template_directory_uri() . '/assets/css/app.css', null, 1.2);

		// Script
		wp_enqueue_script('jquery');
		wp_enqueue_script('vendors_js', get_template_directory_uri() . '/assets/js/vendors.js', array(), 1.2, true);
		wp_enqueue_script('main_js', get_template_directory_uri() . '/assets/js/app.js', array(), 1.2, true);

	}
	add_action('wp_enqueue_scripts', 'webpack_scripts');

    //Передаем данные переменные в JS  -----------------------
    add_action('wp_enqueue_scripts', 'add_global_vars', 99);
    function add_global_vars()
    {
        wp_localize_script('app-js', 'catalog', [

        ]);
    }
