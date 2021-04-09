const $ = require('jquery');

window.jQuery = $;
require('@fancyapps/fancybox');

$.fancybox.defaults.animationEffect = 'fade';
$.fancybox.defaults.transitionEffect = 'fade';

$().fancybox({
  selector: '.slider__gallery .swiper-slide:not(.swiper-slide-duplicate)',
  backFocus: false,
});
