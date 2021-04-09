<?php
if ( isset($link) ){
    $tag = 'a';
    $class.= ' link';
}else{
    $tag = 'button';
}
?>

<<?=$tag?> <?=isset($link)?"href='$link'": null?> class="button <?=$class ?? null?>" <?=isset($target)?"target='$target'": null?>" <?php dataSet($data ?? null)?>>
    <?php if (isset($icon)) : ?>
        <span class="button__icon icon icon-<?=$icon?> icon_size_<?=$icon_size ?? null ?>"></span>
    <?php endif;?>
    <?=$text ?? null?>
</<?=$tag?>>


