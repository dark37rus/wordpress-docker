<div class="form form--primary <?= $class ?? null ?>">
	<?php if ( isset($title) ) : ?>
		<h4 class="form__title title title--third"><?= GlobalVars::$order_massage?></h4>
	<?php endif; ?>

	<div class="form__inner">
		<?php do_action('form_order') ?>
	</div>
</div>
