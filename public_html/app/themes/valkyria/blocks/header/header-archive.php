<?php
	$title = isset($args['title']) ? $args['title'] : post_type_archive_title('', false);
?>

<header class="section archive-header">
	<div class="archive-header__container container">
		<h1 class="archive-header__title title title--secondary"><?= $title  ?? null?></h1>

		<?php get_template_part('blocks/socials'); ?>
	</div>
</header>
