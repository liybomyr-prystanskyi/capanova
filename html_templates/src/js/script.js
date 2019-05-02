(function(jQuery) {

  $(function() { 
    // Document ready

    var windowWidth = $(window).width();

    // $('.header').stick_in_parent();

    if(windowWidth < 992) {
      if($('.btn--burger').hasClass('active')) {
        $('.main-nav').slideDown(300);
        $('.header').addClass('active');
      } else {
        $('.main-nav').slideUp(300);
        $('.header').removeClass('active');
      }
    }    

    $('.btn--burger').on('click', function(e) {
      e.preventDefault();
      $(this).toggleClass('active');      
      if($(this).hasClass('active')) {
        $('.main-nav').slideDown(300);
        $('.header').addClass('active');
      } else {
        $('.main-nav').slideUp(300);
        $('.header').removeClass('active');
      }
    });

    $(window).on('resize', function () {
      windowWidth = $(this).width();
      if(windowWidth > 991) {
        $('.main-nav').removeAttr('style');
        $('.btn--burger').removeClass('active');
        $('.header').removeClass('active');
      }
    });

    $(window).on('scroll', function() {
      if($(this).scrollTop() <= 5) $('.header').removeClass('is_stuck');
      else $('.header').addClass('is_stuck');
    });

    $('.counter__ctrl').on('click', function(e) {
      e.preventDefault();
      var currentItemCount = $(this).parent().find('input').val();
      if($(this).hasClass('counter__ctrl--less') && currentItemCount > 1) --currentItemCount; 
      else if($(this).hasClass('counter__ctrl--more')) ++currentItemCount;
      $(this).parent().find('input').val(currentItemCount);
    });

    $('.carousel').slick({
      slidesToShow: 4,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: $(this).attr('data-carousel-speed') || 4000,
      prevArrow: '<a href="#" class="carousel__arrow carousel__arrow--prev"></a>',
      nextArrow: '<a href="#" class="carousel__arrow carousel__arrow--next"></a>',
      dots: false,
      responsive: [
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 3
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1
          }
        }
      ]
    });

  });
  //scroll-Down//
  
  $(".btn--down").on('click', function (e) {
    e.preventDefault();
    var offset = $(this).parent().outerHeight() + $(this).height();
    $('html, body').animate({
      scrollTop: offset
    }, 1500);
  });

  $('.main-nav ul li a').on('click', function(e) {
    if($(window).width() < 992 && $(this).parent().find('.sub-menu').length > 0) {
      e.preventDefault();
      $(this).parent().toggleClass('hover');
    }
  });

})(jQuery);