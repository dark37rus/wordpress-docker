<?php
/**
 * The template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Valkyria
 * @since 1.0.0
 */

defined( 'ABSPATH' ) || exit;

get_header();

tpl::render('components/breadcrumbs');

get_template_part('template-parts/archive/archive', get_post_type());

tpl::render('template-parts/sections/seo');

get_footer();
