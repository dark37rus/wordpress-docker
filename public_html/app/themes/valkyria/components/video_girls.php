<?php if (isset($video['url'])):?>
<?php $video_ext = getExtension($video['url']); ?>
<a href="#video_<?=$video['number']?>" data-fancybox class="video-poster">
    <img src="<?=$video['poster'] ?? $poster_default?>" alt="" width="100px" height="100px">
</a>
<video  controls muted
       id="video_<?=$video['number']?>"
       style="display:none;"
       poster="<?=$video['poster']??null?>"
       preload="metadata">
    <source src="<?=$video['url']?>" type="video/<?=$video_ext?>">
    <?= __('[:ru]Ваш браузер не поддерживает данное видео[:en]Your browser does not support this video[:]')?>
</video>
<?php endif; ?>
