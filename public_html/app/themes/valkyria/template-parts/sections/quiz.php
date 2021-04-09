<?php
$quiz = get_field( 'quiz', 'options' );
?>

<section class="section quiz" id="quiz">
	<?php if ( $_COOKIE['coupon'] && $_COOKIE['coupon'] === $quiz['coupon'] ) : ?>
			<div class="quiz__container container">
				<h2
					class="quiz__title title title--primary"><?= __( '[:ru]Спасибо за пройденный опрос![:en]Thank you for taking the survey![:]' ) ?></h2>
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
