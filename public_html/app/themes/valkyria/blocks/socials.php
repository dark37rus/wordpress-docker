<?php
	$socials = get_field( 'socials', 'options' );
?>

<?php if ( isset($socials) ) ?>
<div class="socials <?=$class ?? null?>" <?php dataSet($data ?? null)?>>
	<?php
		foreach ( $socials as $social ) :
            tpl::render('components/social', [ 'class' => "socials__item " . isset($class_child) ?? null, 'icon' => $social['icon'], 'link' => $social['link'] ] );
		endforeach;
	?>
</div>
