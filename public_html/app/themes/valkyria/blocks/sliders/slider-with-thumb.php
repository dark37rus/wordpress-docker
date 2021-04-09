<?php if ( isset($photos) ) : ?>
	<div class="slider--with-thumb <?= $class ?? null ?>">
		<div class="swiper-container slider__gallery">
			<div class="swiper-wrapper">
		  <?php
		  foreach ( $photos as $key => $photo ) :?>
                <a class="swiper-slide" href="<?= $photo['url'] ?>" data-fancybox="gallery" itemprop="contentUrl">
                    <img src="<?= $photo['url'] ?>" alt="<?= 'Photo' . $key ?>">
                </a>
		  <?php endforeach; ?>
			</div>
			<!-- Add Arrows -->
			<div class="swiper-button-next swiper-button-white"></div>
			<div class="swiper-button-prev swiper-button-white"></div>
		</div>
		<div class="swiper-container slider__thumbs">
			<div class="swiper-wrapper">
		  <?php
		  foreach ( $photos as $key => $photo ) :?>
                <div class="swiper-slide" >
                    <img src="<?= $photo['url'] ?>" alt="<?= 'Photo' . $key ?>">
                </div>
		  <?php endforeach; ?>
			</div>
		</div>
	</div>
<?php else : ?>
	<img src="<?= get_the_post_thumbnail_url(); ?>" alt="<?= get_the_title(); ?>">
<?php endif; ?>
