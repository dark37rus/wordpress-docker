<?php

$link = get_permalink($post->ID);
$image = get_the_post_thumbnail_url($post->ID);
$post->post_title_class = $args['title_class'] ?? null;

if ($post->post_type === 'girls') {
    $params = get_field('params_girl', $post->ID);
}

if (isset($params)) {
    $age = $params['age'] ?? null;
    $params_card = [
        ['name'    => $params['growth'],
         'subname' => __('[:ru]Рост[:en]Growth[:]')],
        ['name'    => $params['weight'],
         'subname' => __('[:ru]Вес[:en]Weight[:]')],
        ['name'    => $params['bust'],
         'subname' => __('[:ru]Бюст[:en]Bust[:]')]
    ];
}

$description = $args['description'] ?? null;
$price = $args['price'] ?? null;
$time = $args['time'] ?? null;
if (isset($class)): ?>
    <?= isset($link) ? "<a href='$link' class='card link $class'>" : "<div class='card $class'>"; ?>
<?php else: ?>
    <?= isset($link) ? "<a href='$link' class='card link'>" : "<div class='card'>"; ?>
<?php endif; ?>
<div class="card__image">
    <img
            class="lazy"
            data-src="<?= $image ? $image : 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mP8z8BQDwAEhQGAhKmMIQAAAABJRU5ErkJggg=='; ?>"
            alt="<?= $post->post_title ?? null ?>">
</div>


<h3 class="card__title title <?= $post->post_title_class ?>"><?= $post->post_title . (isset($age) ? ', ' . $age : '') ?></h3>

<?php
if (isset($time)) :
    get_template_part('components/time', '', ['class' => 'card__subtitle',
                                              'time'  => $time]);
endif;
?>

<?php
if (isset($params)) :
    get_template_part('components/params', '', ['params' => $params_card]);
endif;
?>

<?php if (isset($description)) : ?>
    <div class="card__description"><?= wp_trim_words($description, 20, '...') ?></div>
<?php endif; ?>

<?php
if (isset($price)) :
    get_template_part('components/price', '', [
        'class' => 'card__price',
        'price' => $price
    ]);
endif;
?>

<?= $link ? "</a>" : "</div>"; ?>
