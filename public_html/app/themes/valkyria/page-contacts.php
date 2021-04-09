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

get_template_part( 'template-parts/sections/contact' );

get_footer();
