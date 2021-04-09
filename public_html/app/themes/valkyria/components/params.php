<?php
$params = $args['params'] ?? null;

$growth = $params['growth'] ?? null;
$weight = $params['weight'] ?? null;
$bust = $params['bust'] ?? null;
$girls = $params['girls'] ?? null;
$time = $params['time'] ?? null;

if ($params) :
    ?>

    <ul class="params list">
        <?php foreach ($params as $param) : ?>
            <li class="params__item">
                <div class="params__name"><?= $param['name'] ?? null; ?></div>
                <div class="params__subname"><?= $param['subname'] ?? null ?></div>
            </li>
        <?php endforeach; ?>
        <!--			--><?php //if ( $weight ) :
        ?>
        <!--				<li class="params__item">-->
        <!--					<div class="params__name">--><? //= $weight;
        ?><!--</div>-->
        <!--					<div class="params__subname">вес</div>-->
        <!--				</li>-->
        <!--			--><?php //endif;
        ?>
        <!--			--><?php //if ( $bust ) :
        ?>
        <!--				<li class="params__item">-->
        <!--					<div class="params__name">--><? //= $bust;
        ?><!--</div>-->
        <!--					<div class="params__subname">бюст</div>-->
        <!--				</li>-->
        <!--			--><?php //endif;
        ?>
    </ul>
<?php endif;
