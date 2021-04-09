<a href="<? $link ?? null ?>" class="social <?= $class ?? null ?>">
    <?php
    if (isset($icon)) :
        echo file_get_contents($icon) ?? null;
    endif;
    ?>
</a>
