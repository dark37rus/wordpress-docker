<?php
add_action('form_order', 'form_init');

function form_init()
{
    if (function_exists('dynamic_sidebar'))
        dynamic_sidebar('form-order');
}
