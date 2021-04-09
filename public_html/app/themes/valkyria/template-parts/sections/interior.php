<?php global $post ?>
<section class="section section--primary">
    <div class="container">
        <h2 class="section__title title title--secondary" data-aos="fade-right"><?= GlobalVars::$interior_caption ?></h2>

        <?php if (get_page_by_path('interior')) : ?>
            <?php
            $images = get_field('gallery', get_page_by_path('interior')->ID);
            $check_page = get_page_by_path('interior')->ID === $post->ID;
            $max_count_image = $check_page ? 99 : 8;
            $count = 0;
            if ($images) :
                ?>
                <div class="grid grid--col-4 gallery section__gallery" data-aos="fade-down">
                    <?php
                    foreach ($images as $image) :
                        if (++$count <= $max_count_image) :
                            ?>
                            <a href="<?= $image['url'] ?? null ?>" class="gallery__item"
                               data-fancybox="gallery">
                                <img data-src="<?= $image['sizes']['large'] ?? null ?>" alt="<?= $image['alt'] ?? null ?>"
                                     class="gallery__image lazy">
                            </a>
                        <?php
                        endif;
                    endforeach;
                    ?>
                </div>
            <?php
            endif;
            ?>
        <?php endif; ?>

        <?php
        if (!$check_page) :
            tpl::render('components/button',
                ['class' => 'button--secondary section__button',
                 'text'  => __('[:ru]Все фотографии[:en]All photos[:]'),
                 'link'  => '/interior']);
        endif;
        ?>

    </div>
</section>
