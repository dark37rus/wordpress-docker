
<link rel="preload" href="<?=tpl::$theme_url?>/assets/fonts/Spectral/Spectral-Regular.woff2" as="font"
      type="font/woff2" crossorigin="anonymous">
<link rel="preload" href="<?=tpl::$theme_url?>/assets/fonts/Spectral/Spectral-Bold.woff2" as="font"
      type="font/woff2" crossorigin="anonymous">
<link rel="preload" href="<?=tpl::$theme_url?>/assets/fonts/icomoon.woff" as="font"
      type="font/woff" crossorigin="anonymous">
<link rel="preload" href="<?=tpl::$theme_url?>/assets/fonts/icomoon.ttf" as="font"
      type="font/ttf" crossorigin="anonymous">

<? if (is_front_page()): ?>
    <link rel="preload" href="<?= get_field('main_section')['image']['url'] ?>" as="image">
<? endif; ?>
