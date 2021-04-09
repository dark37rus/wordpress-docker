
<a href="<?= $link  ?? null ?>" class="link <?= $class ?? null ?>" <?php dataSet($data ?? null)?>>
	<?php if ( isset($icon) ) : ?>
		<span class="link__icon icon-<?=$icon?> <?=$icon_size ? 'icon_size_'.$icon_size : null?>" style="color: <?=$icon_color ?? null?>;">
		</span>
	<?php endif; ?>

	<span class="">
			<?= $text ?? null ?>
	</span>
</a>
