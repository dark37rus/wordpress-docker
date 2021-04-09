<?php
/**
 * The template for displaying page about
 *
 * @package    WordPress
 * @subpackage Valkyria
 * @since      1.0.0
 */

defined('ABSPATH') || exit;

get_header();

if (get_post_type() != 'articles') {
    tpl::render('components/breadcrumbs');
}


if (have_posts()) :

    while (have_posts()) : the_post();

        get_template_part('template-parts/single/single', get_post_type());

    endwhile;

endif;

get_footer();

