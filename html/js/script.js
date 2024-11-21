jQuery(document).ready(function ($) {

  /* mob-menu*/
  $(document).on('click', '.open-menu a', function (e){
    e.preventDefault();

    $.fancybox.open( $('#menu-responsive'), {
      touch:false,
      autoFocus:false,
    });
    setTimeout(function() {
      $('html').addClass('is-menu');
    }, 100);

  });

  /*close mob menu*/
  $(document).on('click', '.close-menu a', function (e){
    e.preventDefault();
    $.fancybox.close();
    $('html').removeClass('is-menu');
  });

  //slider
  var swiperProduct = new Swiper(".product-slider", {
    slidesPerView: "auto",
    spaceBetween: 95,
    navigation: {
      nextEl: ".product-next",
      prevEl: ".product-prev",
    },
    pagination: {
      el: ".product-pagination",
    },
    breakpoints: {
      320: {
        spaceBetween: 20,
      },
      1024: {
        spaceBetween: 95,
      },
    },
  });

  //slider
  var swiperInst = new Swiper(".inst-slider", {
    slidesPerView: "auto",
    spaceBetween: 32,
    navigation: {
      nextEl: ".inst-next",
      prevEl: ".inst-prev",
    },
    pagination: {
      el: ".inst-pagination",
    },
    breakpoints: {
      320: {
        spaceBetween: 20,
      },
      992: {
        spaceBetween: 32,
      },
    },
  });

  /* mob-menu*/
  $(document).on('click', '.open-menu a', function (e){
    e.preventDefault();

    $.fancybox.open( $('#menu-responsive'), {
      touch:false,
      autoFocus:false,
    });
    setTimeout(function() {
      $('html').addClass('is-menu');
    }, 100);

  });

  /*close mob menu*/
  $(document).on('click', '.close-menu a', function (e){
    e.preventDefault();
    $.fancybox.close();
    $('html').removeClass('is-menu');
  });

  //scroll

  $(document).on('click', '.scroll a', function (e) {
    e.preventDefault();
    $.fancybox.close();
    $('html').removeClass('is-menu');
    $('body').removeClass('compensate-for-scrollbar');
    var id  = $(this).attr('href'),
      top = $(id).offset().top;
    $('body,html').animate({scrollTop: top}, 1000);
  });

  //parallax
  var rellax = new Rellax('.rellax');


  //accordion
  $(function() {
    $(".accordion > .accordion-item.is-active").children(".accordion-panel").slideDown();
    $(document).on('click', '.accordion > .accordion-item .accordion-thumb', function (e){
      $(this).parent('.accordion-item').siblings(".accordion-item").removeClass("is-active").children(".accordion-panel").slideUp();
      $(this).parent('.accordion-item').toggleClass("is-active").children(".accordion-panel").slideToggle("ease-out");
    })
  });
});