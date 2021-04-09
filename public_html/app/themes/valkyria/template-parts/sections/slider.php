<?php
	$title = $args['title'] ?? null;
	$slider_class = $args['slider_class'] ?? null;
	$category_name = $args['category_name'] ?? null;
	$post_type = $args['post_type'] ?? null;
	$post_category = $args['post_category'] ?? null;
	$class = $args['class'] ?? null;
	$arrow_position = $args['arrow_position'] ?? null;
?>

<section class="section section--float">
	<div class="container">
	  <?php get_template_part( 'blocks/sliders/slider', 'small-cards', [
		  'title' => __($title),
		  'class'       => $class,
		  'post_type' => $post_type,
		  'category'  => $category_name,
				'post_category' => $post_category,
				'arrow_position' => $arrow_position
	  ] ); ?>
	</div>
</section>
