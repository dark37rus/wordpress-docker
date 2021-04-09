<?php

	$link = isset($args['link']) ? $args['link'] : get_permalink();
	$class = $args['class'] ?? null;
	$text = isset($args['text']) ? $args['text'] : term_description();
	$image = $args['image'] ?? null;;
	$title = isset($args['title']) ? $args['title'] : single_term_title();
	$title_class = $args['title_class'] ?? null;;
	$price = isset($args['price']) ? $args['price'] : get_field('price');
	$data = dataGet($args['data'] ?? null);
?>

<?= isset($link) ? "<a href='$link' class='card link $class' $data>" : "<div class='card $class' $data >"; ?>

	<div class="card__image">
		<img src="<?= $image ?>" alt="<?= $title ?>">
	</div>

	<div class="card__content">
		<h3 class="card__title title title--small <?= $title_class ?>"><?= $title ?></h3>

		<div class="card__description">
            <?php  ?>
			<?= isset($text) ?  wp_trim_words($text, 15, '...') : null?>
		</div>

	  <?php
	  if ( $price ) :
		  get_template_part( 'components/price', '', [
			  'class' => 'card__price',
			  'price' => $price
		  ] );
	  endif;
	  ?>
	</div>

<?= $link ? "</a>" : "</div>"; ?>
