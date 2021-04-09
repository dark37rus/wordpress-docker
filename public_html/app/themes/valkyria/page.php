<?php
/**
 * The template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Valkyria
 * @since 1.0.0
 */

defined('ABSPATH') || exit;
get_header();
if (have_posts()) :
    while (have_posts()) :
        the_post();
        if (get_the_content()):?>

            <section class="section section--single">
                <div class="container">
                    <div class="row">

                        <div class="single">
                            <h1 class="single__title title--primary"><?php the_title(); ?></h1>
                            <?php the_content(); ?>
                        </div>

                    </div>
                </div>
            </section>

        <?php
        endif;
    endwhile;
endif;
get_footer();
