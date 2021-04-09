
<div class="<?=$class??null?> switcher switcher--lang">
	<button class="switcher__select">
	  <?= qtrans_getLanguage() ?><span class="icon-accord"></span>
	</button>
	<?php
	the_widget( 'qTranslateXWidget', array(
		'type'           => 'both',
		'hide-title'     => true,
		'format'         => '$n',
		'widget-css-off' => true
	) );
	?>

</div>
