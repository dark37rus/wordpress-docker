<?php
$field_id = 'term_' . $category_id ?? null;
isset($title) ? $title : $title = (get_field('cat_title', $field_id) ? get_field('cat_title', $field_id) : get_term($category_id)->name);
isset($description) ? $description : $description = get_term($category_id)->description;
?>

    <section class="section section--cover category-section">
        <div class="category-section__bg lazy" style="background-image: url('<?= get_field('cat_girl_background', $field_id)['url'] ?>');"></div>
        <div class="category-section__container container">
            <div class="category-section__header">
                <h2 class="category-section__title title title--secondary" data-aos="fade-right"><?= $title ?></h2>

                <div class="category-section__description" data-aos="fade-right">
                    <?= $description ?>
                </div>
            </div>
            <?php get_template_part(
                'blocks/sliders/slider', 'small-cards', [
                'description' => GlobalVars::$recommended_programs,
                'class'       => 'slider--small-cards slider--secondary slider--fade category-section__addon',
                'post_type'   => 'programs',
                'category'    => $category_name ?? null,
                'term_id'     => $category_id,
                'data'        => [
                    'aos' => 'fade-right',
                ]
            ]
            ); ?>
        </div>
    </section>

<?php
tpl::render(
    'blocks/sliders/slider-cards', [
    'category'  => $category_name ?? null,
    'class'     => 'slider--cards-primary ',
    'post_type' => 'girls',
    'title'     => GlobalVars::$slider_girls_title,
    'term_id'   => $category_id,
    'data'      => [
        'aos'        => 'fade-zoom-in',
        'aos-easing' => 'ease-in-back',
        'aos-delay'  => '300',
        'aos-offset' => '0',
    ]
]
);
