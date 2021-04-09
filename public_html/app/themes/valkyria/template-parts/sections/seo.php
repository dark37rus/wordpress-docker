<?php
$section_field = get_field('seo_section', get_option('page_on_front'));
$group = get_field('section_order', 'options');
?>

<section class="section seo pv-100">
	<div class="seo__container container">
		<div class="seo__part" data-aos="fade-right">
			<h2 class="seo__title title title--third"  ><?= $section_field['title'] ?></h2>
		</div>
		<div class="seo__part" data-aos="fade-left">
			<div class="seo__description">
		  <?= $section_field['description'] ?>
			</div>
		</div>
	</div>

	<div class="seo__image container" data-aos="zoom-out-up">
		<img src="<?= $section_field['image']['sizes']['large'] ?>" alt="Seo image">
	</div>

    <?php
    $quiz = get_field( 'quiz', 'options' );
    ?>

    <section class="section quiz" id="quiz">
        <?php if ( $_COOKIE['coupon'] && $_COOKIE['coupon'] === $quiz['coupon'] ) : ?>
            <div class="quiz__container container">
                <h2 class="quiz__title title title--primary"><?= __( '[:ru]Спасибо за пройденный опрос![:en]Thank you for taking the survey![:]' ) ?></h2>
                <p class="quiz__text"><?= __( '[:ru]Ваша скидка[:en]Your discount[:]' ) ?> <?= $quiz['stock'] ?>%</p>
                <p
                        class="quiz__text"><?= __( '[:ru]Скопируйте этот промокод и вставьте в форму записи[:en]Copy this promo code and paste it into the registration form[:]' ) ?></p>

                <div class="coupon">
                    <input type="text" class="coupon__output input" value="<?= $quiz['coupon']; ?>" readonly>

                    <button class="button button--transparent button--with-icon">
                        <span class="button__icon icon icon--copy"></span>
                        <?= __( '[:ru]Скопировать[:en]Copy[:]' ) ?>
                    </button>
                </div>
            </div>
        <?php endif; ?>
    </section>


    <div class="order__container container">
        <h2 class="order__title title title--primary"><?= $group['title']; ?></h2>

        <div class="order__inner" >
            <div class="order__form" data-aos="zoom-in">
                <?php get_template_part('template-parts/forms/form', 'base') ?>
            </div>
        </div>
    </div>
</section>
