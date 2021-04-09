<?php
$class = $args['class'] ?? null;
$title = $args['title'] ?? null;
?>


<div class="form form--primary <?= $class ?? null ?>">
	<?php if ( $title ) : ?>
			<h4 class="form__title title title--third"><?= GlobalVars::$order_massage ?></h4>
	<?php endif; ?>

	<div class="form__inner">
	  <?= do_shortcode( '[contact-form-7 id="123" title="Форма заказа"]' ) ?>
	</div>


</div>
