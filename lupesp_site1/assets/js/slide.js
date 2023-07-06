/*======================================================*/
/* ------------------ Slider Js */
/*=====================================================*/
var swiper = new Swiper('#sold-container', {
  slidesPerView: 3,
  spaceBetween: 30,
  slidesPerGroup: 3,
  loop: true,
  loopFillGroupWithBlank: true,
  // autoplay: {
  //   delay: 5000,
  //   disableOnInteraction: false,
  // },
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },
  navigation: {
    nextEl: '#swiper-button-next-sold',
    prevEl: '#swiper-button-prev-sold',
  },
});

var swiper = new Swiper('#featured-container', {
  slidesPerView: 3,
  spaceBetween: 30,
  slidesPerGroup: 3,
  loop: true,
  loopFillGroupWithBlank: true,
  // autoplay: {
  //   delay: 5000,
  //   disableOnInteraction: false,
  // },
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },
  navigation: {
    nextEl: '#swiper-button-next',
    prevEl: '#swiper-button-prev',
  },
});

var swiper = new Swiper('#commercial-container', {
  slidesPerView: 3,
  spaceBetween: 30,
  slidesPerGroup: 3,
  loop: true,
  loopFillGroupWithBlank: true,
  // autoplay: {
  //   delay: 5000,
  //   disableOnInteraction: false,
  // },
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },
  navigation: {
    nextEl: '#swiper-button-next-commercial',
    prevEl: '#swiper-button-prev-commercial',
  },
});

var swiper = new Swiper('#carousel-container', {
  slidesPerView: 5,
  spaceBetween: 30,
  // slidesPerGroup: 3,
  loop: true,
  loopFillGroupWithBlank: true,
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },
  navigation: {
    nextEl: '#swiper-button-next-commercial',
    prevEl: '#swiper-button-prev-commercial',
  },
});

var swiper = new Swiper('#testimonial-container', {
  slidesPerView: 1,
  spaceBetween: 30,
  // slidesPerGroup: 3,
  loop: true,
  loopFillGroupWithBlank: true,
  autoplay: {
    delay: 4500,
    disableOnInteraction: false,
  },
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },
  navigation: {
    nextEl: '#swiper-button-next-client',
    prevEl: '#swiper-button-prev-client',
  },
});
