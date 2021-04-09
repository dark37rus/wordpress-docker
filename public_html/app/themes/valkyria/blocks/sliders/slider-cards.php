<section class="slider <?= $class ?? null; ?>" <?php dataSet($data ?? null) ?>>
    <div class="slider__container container">
        <div class="slider__board">
            <h3 class="slider__title title title--primary"><?= $title ?? null; ?></h3>
            <?php tpl::render(
                'components/button',
                [
                    'class'     => 'button--secondary slider__button',
                    'text'      => GlobalVars::$more_photo,
                    'link'      => GlobalVars::$link_whatsapp,
                    'icon'      => 'whatsapp',
                    'icon_size' => 'large',
                    'target'    => '_blank'
                ]
            ); ?>
            <br>
            <?php tpl::render(
                'components/button',
                [
                    'class' => 'button button--outline button-group__item button--section-color link button_icon slider__button',
                    'text'  => __('[:ru]Все мастера[:en]All masters[:]') . "<span class='icon-arrow-right icon_size_medium'></span>",
                    'link'  => '/girls/'
                ]
            ); ?>
        </div>

        <?php
        if (isset($category)) :

            $post_category = 'main-taxonomies';

            $cards = get_posts(
                [
                    'post_type' => $post_type ?? null,
                    'order'     => 'DSC',
                    'orderby'   => 'date',
                    'tax_query' => [
                        [
                            'taxonomy' => $post_category,
                            'field'    => 'slug',
                            'terms'    => $category
                        ]
                    ]
                ]
            );

            ?>
            <div class="slider__swiper swiper-container">
                <div class="swiper-wrapper">
                    <?php
                    if ($cards) :
                        foreach ($cards as $post) :
                            setup_postdata($post);
                            tpl::render(
                                'components/cards/card',
                                [
                                    'category' => $category,
                                    'class'    => 'swiper-slide card--vertical card--with-background p-15',
                                    'post'     => $post,
                                    'type'     => $post->post_type,
                                ]
                            );
                        endforeach;
                    endif; ?>
                </div>
                <div class="slider__arrow slider__arrow-prev navigation-arrow navigation-arrow--primary navigation-arrow--prev"></div>
                <div class="slider__arrow slider__arrow-next navigation-arrow navigation-arrow--primary navigation-arrow--next"></div>
                <div class="slider__counter swiper-pagination"
                     style="position: relative; bottom: 0; left: 0; width: 100%; z-index: 10;"></div>
            </div>
        <?php endif;
        wp_reset_postdata(); ?>
    </div>
</section>
