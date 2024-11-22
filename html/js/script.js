jQuery(document).ready(function ($) {

  //scroll to block
  $(document).on('click', '.scroll a', function (e) {
    e.preventDefault();
    var id  = $(this).attr('href'),
      top = $(id).offset().top;
    $('body,html').animate({scrollTop: top}, 1000);
  });

    //TABS
  (function($){
    jQuery.fn.lightTabs = function(options){

      var createTabs = function(){
        tabs = this;
        i = 0;

        showPage = function(i){
          $(tabs).find(".tab-content").children("div").hide();
          $(tabs).find(".tab-content").children("div").eq(i).show();
          $(tabs).find(".tabs-menu").children("li").removeClass("is-active");
          $(tabs).find(".tabs-menu").children("li").eq(i).addClass("is-active");
        }

        showPage(0);

        $(tabs).find(".tabs-menu").children("li").each(function(index, element){
          $(element).attr("data-page", i);
          i++;
        });

        $(tabs).find(".tabs-menu").children("li").click(function(){
          showPage(parseInt($(this).attr("data-page")));
        });
      };
      return this.each(createTabs);
    };
  })(jQuery);
  $(".tabs").lightTabs();

  //slider
  var swiperCards1 = new Swiper(".cards-slider-1", {
    slidesPerView: "auto",
    spaceBetween: 16,
    pagination: {
      el: ".cards-pagination-1",
      type: "progressbar",
    },
    navigation: {
      nextEl: ".cards-next-1",
      prevEl: ".cards-prev-1",
    },
  });

  //slider
  var swiperVacancies = new Swiper(".vacancies-slider", {
    slidesPerView: "auto",
    spaceBetween: 16,
    pagination: {
      el: ".vacancies-pagination",
      type: "progressbar",
    },
    navigation: {
      nextEl: ".vacancies-next",
      prevEl: ".vacancies-prev",
    },
  });

  //slider
  var swiperCase = new Swiper(".cases-slider", {
    navigation: {
      nextEl: ".cases-next",
      prevEl: ".cases-prev",
    },

  });

  //dot slider
  $('.cases .nav-wrap .pagination a:first-child').addClass('is-active');

  //dot slider
  $(document).on('click', '.cases .pagination a', function (e){
    e.preventDefault();
    let item = $(this).index();
    $('.cases .pagination a').removeClass('is-active');
    $(this).addClass('is-active');
    swiperCase.slideTo(item);
  });

  //dot slider
  swiperCase.on('slideChange', function (){
    let item = swiperCase.activeIndex + 1
    $('.cases .pagination a').removeClass('is-active');
    $(".cases .pagination a:nth-child("+ item +")").addClass('is-active');
  });


  //slider
  var swiperKnowledge = new Swiper(".knowledge-slider", {
    slidesPerView: "auto",
    spaceBetween: 16,
    pagination: {
      el: ".knowledge-pagination",
      type: "progressbar",
    },
    navigation: {
      nextEl: ".knowledge-next",
      prevEl: ".knowledge-prev",
    },
  });

  //hide fix block
  $(document).on('click', '.close-fix', function (e) {
    e.preventDefault();
    $('.fix-block').slideUp();
  });

  $(".top-line").sticky({
    topSpacing:0
  });


  //mob menu
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

  //sub-menu open/close - mob-menu
  $(document).on('click', '.mob-menu>.menu-item-has-children>a', function (e){
    e.preventDefault();
    let item = $(this).closest('li').find('.sub-menu');
    $(this).toggleClass('is-open');
    if($(this).hasClass('is-open')){
      item.slideDown();
    }else{
      item.slideUp();
    }
  });

  //sub-menu open/close - footer
  $(document).on('click', 'footer .item h6', function (e){
    e.preventDefault();
    let item = $(this).closest('.item').find('ul');
    $(this).toggleClass('is-open');
    if($(this).hasClass('is-open')){
      item.slideDown();
    }else{
      item.slideUp();
    }
  });

  //scroll
  $(document).on('click', '.scroll', function (e) {
    e.preventDefault();
    var id  = $(this).attr('href'),
      top = $(id).offset().top;
    $('body,html').animate({scrollTop: top}, 0);
  });

  //faq
  $(function() {
    $(".accordion > .accordion-item.is-active").children(".accordion-panel").slideDown();
    $(document).on('click', '.accordion > .accordion-item .accordion-thumb', function (e){
      $(this).parent('.accordion-item').siblings(".accordion-item").removeClass("is-active").children(".accordion-panel").slideUp();
      $(this).parent('.accordion-item').toggleClass("is-active").children(".accordion-panel").slideToggle("ease-out");
    })
  });

  //slider
  var swiperImgFull = new Swiper(".img-full-slider", {
    loop:true,
    navigation: {
      nextEl: ".img-full-next",
      prevEl: ".img-full-prev",
    },
  });
});