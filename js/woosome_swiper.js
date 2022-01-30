
jQuery(function($){


var swipecontainer = $('.products.columns-8').wrap("<div class='swiper-container swiper-container-h'/>");
$('h2.woocommerce-loop-product__title').wrap("<div class='product-slide-title-wrapper'/>");

var nav = '<div class="swiper-button-next"></div><div class="swiper-button-prev"></div><div class="swiper-pagination swiper-pagination-h"></div>';

swipecontainer.addClass('swiper-wrapper');
swipecontainer.parent().append(nav);
swipecontainer.find('.type-product').addClass('swiper-slide');

var swiper = new Swiper(".swiper-container-h", {
  direction: 'horizontal',
  loop: true,
  speed: 600,
  parallax: true,
  navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
  },

  pagination: {
    el: '.swiper-pagination-h',
    //type: 'fraction',
    clickable: true,
  },

  slidesPerView: 1,
  //slidesPerColumn: 2,
  spaceBetween: 0,
  // Responsive breakpoints
  breakpointsInverse: true,
  breakpoints: {
    // when window width is >= 320px
    320: {
      slidesPerView: 1,
      spaceBetween: 0
    },
    // when window width is >= 480px
    560: {
      slidesPerView: 3,
      spaceBetween: 10
    },
    // when window width is >= 640px
    960: {
      slidesPerView: 5,
      spaceBetween: 20
    }
  },

 keyboard: {
    enabled: true,
    onlyInViewport: false,
  },
  /*
  mousewheel: {
  	enabled: false,
  },
  keyboard: {
  	enabled: true,
  },
  */
  });


});
