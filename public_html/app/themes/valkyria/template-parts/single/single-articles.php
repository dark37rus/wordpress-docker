<div class="single-articles">
    <div class="single-articles__caption" style="background-image: url(<?= get_the_post_thumbnail_url()?>);">
        <div class="single-articles__overlay"></div>
        <?php tpl::render('components/breadcrumbs'); ?>

        <div class="container">
            <div class="single-articles__date"></div>
            <div class="row">
                <h1 class="single-articles__title col-12 col-md-8"><?php the_title() ?></h1>
                <div class="single-articles__short-desc pb-80 col-12 col-md-8">
                    <?= get_field('blog_short_desc') ?>
                </div>
            </div>
        </div>

    </div>

    <div class="single-articles__body mv-50">
        <div class="container">
             <?php the_content() ?>
        </div>
    </div>
</div>
