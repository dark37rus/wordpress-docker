<?php
$time = $args['time'];
$class = $args['class'];

?>

<div class="time <?= $class ?>">
	<?= $time . ' ' . GlobalVars::$minute ?>
</div>
