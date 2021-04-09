<?php
$base_info = get_field('program-info');
do_action('changeNameGirls', $base_info['count_girls']);
?>
    <section class="section single">
        <div class="single__container container">
            <div class="single__column">
                <div class="single__image">
                    <img src="<?= get_the_post_thumbnail_url(); ?>" alt="<?= get_the_title(); ?>">
                </div>
            </div>

            <div class="single__column">
                <h1 class="single__title title title--main">
                    <?= get_the_title(); ?>
                </h1>

                <div class="single__description">
                    <?= get_field('program-description') ?>
                </div>

                <div class="single__group-value">
                    <?php

                    get_template_part(
                        'components/params', '',
                        [
                            'params' => [
                                [
                                    'name'    => $base_info['count_girls'],
                                    'subname' => __(setChangeNameGirls($base_info['count_girls']))
                                ],
                                [
                                    'name'    => $base_info['time'],
                                    'subname' => Site::getParam('minute', 'trans'),
                                ]
                            ]
                        ]
                    );

                    if ($base_info['price']) {
                        get_template_part(
                            'components/price', '', [
                            'class' => 'single__price price--large',
                            'price' => $base_info['price']
                        ]
                        );
                    }
                    ?>
                </div>

                <?php
                $base_services = get_field('services');
                if ($base_services) :
                    ?>
                    <div class="single__information information">
                        <h3 class="information__title title title--third"><?= Site::$lang['descr_program_list'] ?></h3>

                        <ul class="information__list list list--base">
                            <?php
                            if (have_rows('services')) :
                                while (have_rows('services')) : the_row(); ?>
                                    <li class="list__item"><?= get_sub_field('item'); ?></li>
                                <?php
                                endwhile;
                            endif;
                            ?>

                        </ul>
                        <?php tpl::render(
                            'components/button', [
                            'class'     => 'information__button button--primary',
                            'text'      => Site::getParam('order', 'trans'),
                            'icon'      => 'whatsapp',
                            'icon_size' => 'large'
                        ]
                        ); ?>
                    </div>

                    <?php
                    $addon_program = get_field('extend');

                    if ($addon_program && have_rows('extend')) :
                        while (have_rows('extend')) : the_row();
                            ?>
                            <div class="single__information information">
                                <h3 class="information__title title title--third"><?= get_sub_field('title'); ?></h3>

                                <ul class="information__list list list--base">
                                    <?php
                                    if (have_rows('services')) :
                                        while (have_rows('services')) : the_row();
                                            ?>
                                            <li class="list__item"><?= get_sub_field('service'); ?></li>
                                        <?php
                                        endwhile;
                                    endif;
                                    ?>

                                </ul>

                                <div class="single__group-value">
                                    <?php
                                    get_template_part(
                                        'components/params', '',
                                        [
                                            'params' => [
                                                [
                                                    'name'    => get_sub_field('prices')['count_girls'],
                                                    'subname' => __(setChangeNameGirls(get_sub_field('prices')['count_girls']))
                                                ],
                                                [
                                                    'name'    => get_sub_field('prices')['time'],
                                                    'subname' => Site::getParam('minute', 'trans'),
                                                ]
                                            ]
                                        ]
                                    );

                                    if ($base_info['price']) {
                                        get_template_part(
                                            'components/price', '', [
                                            'class' => 'single__price price--large',
                                            'price' => $base_info['price']
                                        ]
                                        );
                                    }
                                    ?>
                                </div>
                            </div>
                        <?php
                        endwhile;
                    endif;
                endif;
                ?>
            </div>
        </div>
    </section>

<?php
get_template_part(
    'template-parts/sections/slider', '', [
    'title'          => Site::getParam('recommended_programs_cards', 'trans'),
    'class'          => 'slider--float',
    'post_type'      => 'programs',
    'category_name'  => 'recommended',
    'post_category'  => 'programs-taxonomies',
    'arrow_position' => 'top'
]
);
get_template_part('template-parts/sections/contact');
