const reviewSlider = new Swiper('.review-slider', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,
    // If we need pagination
    pagination: {
      el: '.swiper-pagination',
    },
  
    // Navigation arrows
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  
});

const portfolioSlider = new Swiper('.portfolio-slider', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,
    slidesPerView: 3,
    // If we need pagination
    pagination: {
        el: '.swiper-pagination',
    },

    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },

});