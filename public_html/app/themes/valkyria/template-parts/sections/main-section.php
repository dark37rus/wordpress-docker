<section class="section main-section section--cover">
    <div class="main-section__bg" style="background-image: url(<?= get_field('main_section')['image']['url']; ?>)"></div>
    <div class="main-section__circlet"></div>
    <div class="main-section__container container">
        <h1 class="title main-section__title" data-aos="fade-right"><?= get_field('main_section')['title']; ?></h1>

        <div class="main-section__link">
            <?php
            tpl::render('components/link',
                ['class'      => 'link--with-icon link--with-icon-border',
                 'text'       => 'м. Белорусская',
                 'link'       => '#',
                 'icon_size'  => 'large',
                 'icon'       => 'map',
                ])
            ?>
        </div>


        <div class="main-section__text" data-aos="fade-right">
            <p>
                <?= get_field('main_section')['description']; ?>
            </p>
        </div>

        <div class="button-group main-section__button-group">
            <?php
            tpl::render('components/button',
                ['class' => 'button-group__item button--secondary',
                 'text'  => GlobalVars::$order,
                 'data'  => ['aos' => 'fade-right']
                ]);

            tpl::render('components/button',
                ['class' => 'button--outline button-group__item button--section-color',
                 'text'  => GlobalVars::$get_stock,
                 'link'  => '#quiz',
                 'data'  => ['aos' => 'fade-left']
                ]);
            ?>
        </div>
        <?php
        tpl::render('blocks/socials',
            ['class'       => 'main-section__socials',
             'class_child' => 'social--inherit',
            ])
        ?>
    </div>
</section>
