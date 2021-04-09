<?php
$description = $args['description'] ?? null;
$class = $args['class'] ?? null;
$post_type = $args['post_type'] ?? null;
$category = $args['category'] ?? null;
$title = $args['title'] ?? null;

$arrow_position = isset($args['arrow_position']) ? $args['arrow_position'] : 'center';

if ($category) :

    $post_category = isset($args['post_category']) ? $args['post_category'] : 'main-taxonomies';

    $cards = get_posts([
        'post_type' => $post_type,
        'order'     => 'ASC',
        'orderby'   => 'menu_order',
        'tax_query' => [
            [
                'taxonomy' => $post_category,
                'field'    => 'slug',
                'terms'    => $category
            ]
        ]
    ]);


endif;
?>

<div class="slider <?= $class ?>">
    <div class="slider__header">
        <?php if ($title) : ?>
            <h2 class="slider__title title title--third">
                <?= $title ?>
            </h2>
        <?php endif; ?>
        <?php if ($description) : ?>
            <div class="slider__description"><?= $description ?></div>
        <?php endif; ?>
        <?php if ($arrow_position === 'top') : ?>
            <div class="slider__navigation slider__navigation--column">
                <div class="slider__arrows">
                    <div class="slider__arrow navigation-arrow navigation-arrow--primary navigation-arrow--next"></div>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <div class="slider__inner">
        <div class="swiper-container slider__swiper" data-aos="fade-right">
            <div class="swiper-wrapper pb-30">
                <?php
                if ($cards) :
                    foreach ($cards as $post) :
                        setup_postdata($post);
                        get_template_part('blocks/cards/card', 'small', [
                            'category' => $category,
                            'title'    => get_the_title(),
                            'text'     => get_field('program-description'),
                            'link'     => get_the_permalink(),
                            'price'    => get_field('program-info')['price'],
                            'class'    => 'card--with-background card--small swiper-slide',
                            'image'    => get_the_post_thumbnail_url(),
                        ]);
                    endforeach;
                endif;
                wp_reset_postdata();
                ?>
            </div>
        </div>

        <?php if ($arrow_position === 'center') : ?>
            <div class="slider__navigation slider__navigation--column" data-aos="fade-right">
                <div class="slider__arrows">
                    <div class="slider__arrow navigation-arrow navigation-arrow--primary navigation-arrow--next"></div>
                </div>
            </div>
            <div class="slider__bottom-nav">
                <a href="<?= get_term_link($args['term_id']) ?>" class="text_color_accent show_more">
                    <?= GlobalVars::$see_all ?>
                </a>
                <div class="slider__counter swiper-pagination"></div>
            </div>
        <?php endif; ?>
    </div>
</div>
