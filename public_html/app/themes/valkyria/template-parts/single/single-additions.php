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
                <?php the_content() ?>
            </div>

            <div class="single__group-value">
                <?php
                if (get_field('add_price')) {
                    get_template_part(
                        'components/price', '',
                        [
                            'class' => 'single__price price--large',
                            'price' => get_field('add_price')
                        ]
                    );
                }
                ?>
            </div>
        </div>
    </div>
</section>
