// Swiper
import Swiper from 'swiper';

document.addEventListener('DOMContentLoaded', () => {
  const swiperCardsPrimary = document.querySelectorAll('.slider--cards-primary');
  if (swiperCardsPrimary) {
    swiperCardsPrimary.forEach((slide) => {
      if (slide.querySelector('.swiper-container')) {
        new Swiper(slide.querySelector('.swiper-container'), {
          slidesPerView: 1,
          spaceBetween: 24,
          pagination: {
            el: slide.querySelector('.swiper-pagination'),
          },
          navigation: {
            nextEl: slide.querySelector('.navigation-arrow--next'),
            prevEl: slide.querySelector('.navigation-arrow--prev'),
          },
          breakpoints: {
            992: {
              slidesPerView: 2,
              spaceBetween: 30,
            },
            1200: {
              slidesPerView: 3,
              spaceBetween: 48,
            },
          },
        });
      }
    });
  }
  const swiperFloat = document.querySelectorAll('.slider--float');
  if (swiperFloat) {
    swiperFloat.forEach((slide) => {
      if (slide.querySelector('.swiper-container')) {
        new Swiper(slide.querySelector('.swiper-container'), {
          slidesPerView: 1,
          spaceBetween: 24,
          navigation: {
            nextEl: slide.querySelector('.navigation-arrow--next'),
            prevEl: slide.querySelector('.navigation-arrow--prev'),
          },
          breakpoints: {
            768: {
              slidesPerView: 2,
            },
            1200: {
              slidesPerView: 3,
            },
            1600: {
              slidesPerView: 3,
              spaceBetween: 30,
            },
          },
        });
      }
    });
  }
  const swiperCardsSmall = document.querySelectorAll('.slider--secondary');
  if (swiperCardsSmall) {
    swiperCardsSmall.forEach((slide) => {
      if (slide.querySelector('.swiper-container')) {
        new Swiper(slide.querySelector('.swiper-container'), {
          loop: true,
          effect: 'fade',
          autoHeight: true,
          speed: 700,
          autoplay: {
            delay: 15000,
          // disableOnInteraction: true,
          },
          navigation: {
            nextEl: slide.querySelector('.navigation-arrow--next'),
            prevEl: slide.querySelector('.navigation-arrow--prev'),
          },
          pagination: {
            el: slide.querySelector('.swiper-pagination'),
          },
        });
      }
    });
  }

  const sliderWithThumb = document.querySelectorAll('.slider--with-thumb');

  if (sliderWithThumb) {
    sliderWithThumb.forEach((slide) => {
      const galleryThumbs = new Swiper(slide.querySelector('.slider__thumbs'), {
        spaceBetween: 18,
        slidesPerView: 3,
        freeMode: false,
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
        breakpoints: {
          992: {
            direction: 'vertical',
            spaceBetween: 24,
            slidesPerView: 4,
          },
        },
      });
      const galleryTop = new Swiper(slide.querySelector('.slider__gallery'), {
        spaceBetween: 18,
        freeMode: false,
        navigation: {
          nextEl: slide.querySelector('.swiper-button-next'),
          prevEl: slide.querySelector('.swiper-button-prev'),
        },
        thumbs: {
          swiper: galleryThumbs,
        },
        breakpoints: {
          992: {
            spaceBetween: 24,
          },
        },
      });
    });
  }
});
