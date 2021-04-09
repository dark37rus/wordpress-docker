<?php
add_action( 'widgets_init', 'register_my_widgets' );
function register_my_widgets(){

    register_sidebar( array(
        'name'          => __('Форма заявки на массаж', 'valkyria'),
        'id'            => "form-order",
        'description'   => '',
        'class'         => '',
        'before_widget' => '',
        'after_widget'  => "",
        'before_title'  => '<h4 class="form__title title title--third">',
        'after_title'   => "</h4>\n",
        'before_sidebar' => '', // WP 5.6
        'after_sidebar'  => '', // WP 5.6
    ) );
}
