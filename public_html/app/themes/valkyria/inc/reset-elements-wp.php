<?php

// Load remove
function load_remove() {

    // Remove shortlink
    remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

    // Remove shortlink
    remove_action('template_redirect', 'wp_shortlink_header', 11, 0);

    // Remove JSON API links
    remove_action( 'wp_head', 'rest_output_link_wp_head' );

    // Remove links on RSS categories
    remove_action( 'wp_head','feed_links_extra', 3 );

    // Remove RSS and comments links on the front page
    remove_action( 'wp_head','feed_links', 2 );

    // Remove Really Simple Discovery
    remove_action( 'wp_head','rsd_link' );

    // Hidden Windows Live Writer
    remove_action( 'wp_head','wlwmanifest_link' );

    // Hidden wordpress version
    remove_action( 'wp_head','wp_generator' );

    // Disable wp-embed
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );

    remove_action( 'wp_head', 'wp_oembed_add_host_js' );

}

add_action( 'wp_enqueue_scripts', 'load_remove');


// Disable Emojis in WordPress
if( 'Disable Emojis в WordPress' ){

    // Disable Emojis
    function disable_emojis() {

        remove_action( 'wp_head', 'print_emoji_detection_script', 7 );

        remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );

        remove_action( 'wp_print_styles', 'print_emoji_styles' );

        remove_action( 'admin_print_styles', 'print_emoji_styles' );

        remove_filter( 'the_content_feed', 'wp_staticize_emoji' );

        remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

        remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );

        add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );

        add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 30, 2 );

    }

    add_action( 'init', 'disable_emojis', 30 );


    /**
     * Filter function used to remove the tinymce emoji plugin.
     *
     * @param    array  $plugins
     * @return   array             Difference betwen the two arrays
     */
    function disable_emojis_tinymce( $plugins ) {

        if ( is_array( $plugins ) ) {

            return array_diff( $plugins, array( 'wpemoji' ) );

        }

        return array();

    }

    /**
     * Remove emoji CDN hostname from DNS prefetching hints.
     *
     * @param  array  $urls          URLs to print for resource hints.
     * @param  string $relation_type The relation type the URLs are printed for.
     * @return array                 Difference betwen the two arrays.
     */
    function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {

        if ( 'dns-prefetch' == $relation_type ) {

            // Strip out any URLs referencing the WordPress.org emoji location
            $emoji_svg_url_bit = 'https://s.w.org/images/core/emoji/';

            foreach ( $urls as $key => $url ) {

                if ( strpos( $url, $emoji_svg_url_bit ) !== false ) {

                    unset( $urls[$key] );

                }

            }

        }

        return $urls;

    }

}


// Disable type=text/css
add_filter( 'style_loader_tag', 'clean_style_tag' );

function clean_style_tag( $src ) {

    return str_replace( "type='text/css'", '', $src );

}


// Disable type=text/javascript
add_filter( 'script_loader_tag', 'clean_script_tag' );

function clean_script_tag( $src ) {

    return str_replace( "type='text/javascript'", '', $src );

}
