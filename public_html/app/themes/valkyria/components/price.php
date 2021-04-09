<?php
	$price = $args['price'];
	$class = $args['class'];
?>
<div class="price <?= $class ?>">
	<?= number_format( $price , 0, '', ' ' ) . ' ' . GlobalVars::$currency ?>
</div>
