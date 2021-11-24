//Depoimentos:
var swiperDepoimento2 = new Swiper(".mySwiper2", {
    speed: 2000,
    slidesPerView: 1,
    spaceBetween: 30,
    loop: true,
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
      },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    //Responsive breakpoints:
    breakpoints: {
        // when window width is >= 480px
        768: {
          slidesPerView: 2
        },
        // when window width is >= 640px
        980: {
          slidesPerView: 3
        }
      }
});