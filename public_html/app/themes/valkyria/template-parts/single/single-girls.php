<section class="section single">
    <div class="single__container container">
        <div class="single__column">

            <?php tpl::render(
                'blocks/sliders/slider-with-thumb',
                [
                 'photos' => get_field('gallery_girl'),
                 'class'  => 'slider--with-thumb-vertical single__slider'
                ]
            ) ?>

            <div class="videos">
                <?php foreach (get_field('videos') as $key => $video): ?>
                    <?php $video['number'] = $key; ?>
                    <?php tpl::render(
                        'components/video_girls', [
                        'video'          => $video,
                        'poster_default' => get_the_post_thumbnail_url($post->ID)
                    ]
                    ) ?>
                <?php endforeach; ?>
            </div>

        </div>

        <div class="single__column">
            <h1 class="single__title title title--main">
                <?= get_the_title() . (get_field('params_girl')['age'] ? ', ' . get_field('params_girl')['age'] : ''); ?>
            </h1>

            <?php
            get_template_part(
                'components/params', '', ['params' => [
                ['name'    => get_field('params_girl')['growth'],
                 'subname' => __('[:ru]Рост[:en]Growth[:]')
                ],
                ['name'    => get_field('params_girl')['weight'],
                 'subname' => __('[:ru]Вес[:en]Weight[:]')
                ],
                ['name'    => get_field('params_girl')['bust'],
                 'subname' => __('[:ru]Бюст[:en]Bust[:]')
                ]
            ],
            ]
            );
            tpl::render(
                'template-parts/forms/form-order',
                ['class' => 'single__form',
                 'title' => true
                ]
            );
            ?>

        </div>
    </div>
</section>

<?php
$terms_array = get_the_terms($post->ID, 'main-taxonomies');

$terms_name = wp_list_pluck($terms_array, 'slug');

tpl::render(
    'blocks/sliders/slider-cards', [
    'category'  => $terms_name,
    'class'     => 'slider--cards-primary',
    'post_type' => get_post_type(),
    'title'     => Site::getParam('slider_girls_title', 'trans')
]);

get_template_part(
    'template-parts/sections/slider', '', [
    'title'          => Site::getParam('recommended_programs_cards', 'trans'),
    'class'          => 'slider--float',
    'post_type'      => 'programs',
    'category_name'  => 'recommended',
    'post_category'  => 'programs-taxonomies',
    'arrow_position' => 'top'
]);

get_template_part('template-parts/sections/contact');
