<?php
	$group = get_field('section_order', 'options');
?>
<section class="order">
	<div class="order__container container">
		<h2 class="order__title title title--primary"><?= $group['title']; ?></h2>

		<div class="order__inner" style="background-image: url('<?= $group['background']['url']; ?>')" >
			<div class="order__form" data-aos="zoom-in">
				<?php get_template_part('template-parts/forms/form', 'base') ?>
			</div>
		</div>
	</div>
</section>
