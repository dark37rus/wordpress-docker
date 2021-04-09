<?php

/**
 * The header for our theme
 *
 * @package    WordPress
 * @subpackage Valkyria
 * @since      1.0.0
 */

?>
<!DOCTYPE html>
<html lang="<?php bloginfo('language'); ?>">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title><?=wp_get_document_title(); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class() ?>>
<header class="header header_transparent">
    <div class="header__container container">
        <?php
        /**
         * @see header_content() - 10
         */
            do_action('header_site');
        ?>
    </div>
</header>

<div class="root" style="background-image: url(<?= get_bg_pages() ?>);">

