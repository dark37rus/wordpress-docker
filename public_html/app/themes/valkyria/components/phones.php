<?php
if (isset($phone)): ?>
    <a href="tel:<?= $phone['number'] ?>" class="<?= $class ?? null ?>">
        <?= phone_format($phone['number']) ?>
    </a>
<?php
endif;
