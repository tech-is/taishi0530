$(function() {

  var ua = navigator.userAgent
  if (ua.indexOf('Android') !== -1) {
    $('.menu_icon a').addClass('fix');
  }
  if (ua.indexOf('iPhone') !== -1 || ua.indexOf('iPad') !== -1) {
    $('.parallax').addClass('ios');
  }
  var isTouchDevice = (function(d) {
    var iframe = d.createElement('iframe');
    d.body.appendChild(iframe);
    var result = ('ontouchstart' in iframe.contentWindow);
    d.body.removeChild(iframe);
    return result;
  })(document);
  if (!isTouchDevice) {
    $('body').addClass('touch-disabled');
  }

  // scrollbar
  var scrollbarWidth = window.innerWidth - document.body.clientWidth;

  // sp gnav
  $('.menu_icon a').on('click', function(e) {
    e.preventDefault();
    $(this).toggleClass('close').parent().prev().slideToggle(function() {
      $('body').removeClass('down').addClass('up');
      $(this).closest('header').toggleClass('menu_open');
    });
  });

  // pagetop
  $('.pagetop a').on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({scrollTop: 0});
  });

  // swipebox
  $('.swipebox').swipebox();

  // wow
  if (typeof window.WOW !== 'undefined') {
    new WOW().init();
  }

  // slider
  var sliderDefaults = {
    center: {
      width: 1000,
      height: 450,
      slideDistance: 0,
      visibleSize: '100%',
      arrows: true,
      fadeArrows: false,
      autoScaleLayers: false,
      breakpoints: {}
    },
    wide: {
      width: '100%',
      autoHeight: true,
      slideDistance: 0,
      arrows: true,
      fadeArrows: false,
      fade: true,
      autoScaleLayers: false,
      breakpoints: {}
    },
    thumb: {
      width: 1600,
      height: 600,
      orientation: 'vertical',
      loop: false,
      slideDistance: 0,
      arrows: false,
      buttons: false,
      // fade: true,
      autoScaleLayers: false,
      thumbnailsPosition: 'right',
      thumbnailWidth: 320,
      thumbnailHeight: 200,
      breakpoints: {
        1600: {
          width: 1350,
          height: 510,
          thumbnailWidth: 250,
          thumbnailHeight: 170
        },
        1200: {
          width: 1000,
          height: 450,
          thumbnailWidth: 200,
          thumbnailHeight: 150
        },
        1000: {
          orientation: 'horizontal',
          thumbnailsPosition: 'bottom',
          thumbnailWidth: 100,
          thumbnailHeight: 60
        }
      }
    },
    contents: {
      width: 450,
      height: 300,
      aspectRatio: 1.5,
      slideDistance: 10,
      visibleSize: '100%',
      arrows: true,
      fadeArrows: false,
      buttons: false,
      fadeCaption: false,
      breakpoints: {}
    }
  };
  $('.slider-pro').each(function() {
    var opt = $(this).data();
    var number_of_slide = $(this).find('.sp-slide').length;
    $(this).addClass(opt.type || 'center');
    if (!this.hasAttribute('data-type')) {
      return true;
    }
    var options = $.extend(true, (sliderDefaults[opt.type] || sliderDefaults.center), {});
    if (options.breakpoints && scrollbarWidth) {
      var bps = {};
      for (var bp in options.breakpoints) {
        var real_bp = parseInt(bp) - scrollbarWidth - 1;
        bps[real_bp] = options.breakpoints[bp];
      }
      options.breakpoints = bps;
    }
    if (opt.width) { options.width = opt.width }
    if (opt.height) { options.height = opt.height }
    if (typeof opt.distance !== 'undefined') { options.slideDistance = opt.distance }
    if (opt.type == 'contents') {
      if (opt.width || opt.height) {
        options.aspectRatio = Math.round(options.width / options.height * 100) / 100;
      }
      if (number_of_slide % 2 === 0) {
        options.visibleSize = options.width * (number_of_slide - 1) + options.slideDistance * (number_of_slide - 2);
      }
    }
    if (typeof opt.autoplay !== 'undefined') { options.autoplay = opt.autoplay }
    if (number_of_slide === 1) {
      opt.arrows = false;
      opt.buttons = false;
      options.touchSwipe = false;
    }
    if (typeof opt.arrows !== 'undefined') {
      switch (opt.arrows) {
        case false:
          options.arrows = false;
          $(this).addClass('disable-arrows');
          break;
        case 'pc-only':
          var bp = 768 - scrollbarWidth - 1;
          options.breakpoints[bp] = options.breakpoints[bp] || {};
          options.breakpoints[bp].arrows = false;
          $(this).addClass('sp-disable-arrows');
          break;
      }
    }
    if (typeof opt.buttons !== 'undefined') {
      switch (opt.buttons) {
        case false:
          options.buttons = false;
          break;
        case 'pc-only':
          var bp = 768 - scrollbarWidth - 1;
          options.breakpoints[bp] = options.breakpoints[bp] || {};
          options.breakpoints[bp].buttons = false;
          break;
      }
    }
    if (typeof opt.thumb !== 'undefined') {
      options.thumbnailsPosition = opt.thumb;
    }
    $(this).sliderPro(options);
  });

  $('.slide_scroll').click(function(e) {
    e.preventDefault();
    var pos = $(this).closest('section').next().offset().top;
    $('html, body').animate({scrollTop: pos});
  });

  // Q&A
  $('.qa:not(.qa-open) .question').click(function() {
    $(this).toggleClass('open').next('.answer').slideToggle();
  });

  // responsive scroll table
  $('table.responsive-scroll').wrap('<div class="responsive-scroll-container"><div class="responsive-scroll-inner"></div></div>');

  // responsive list table
  $('table.responsive-list').each(function() {
    var header = [];
    $(this).find('thead th').each(function() {
      header.push($(this).text());
    });
    $(this).find('tbody td').each(function() {
      $(this).attr('data-title', header[$(this).index()]);
    });
  });

  // combine table
  $('table.combine').closest('.col').css('margin-bottom', 0);

  // Fix SP Menu
  function fixSpMenu() {
    var win_h = $(window).height();
    var hdr_h = $('.title').outerHeight();
    if ($('.menu_icon').is(':visible') && $('header').css('z-index') != 'auto') { // SP && Fixed
      $('header .global_nav ul').css('max-height', win_h - hdr_h);
    } else {
      $('header .global_nav ul').css('max-height', 'none');
    }
  }

  // Load Event
  $(window).load(function() {
    fixSpMenu();
    $('.tile').each(function() {
      $(this).children().tile();
    });
  })

  // Scroll Event
  var scrolltimer = false;
  var prevPos = 0;
  var header_height = $('header').height();
  $(window).on('scroll touchmove', function() {
    $('body').addClass('scroll');
    var currentPos = $(this).scrollTop();
    if (currentPos > prevPos && currentPos > 0) {// down
      $('body').removeClass('up').addClass('down').css('paddingTop', 0);
      if (currentPos > header_height) {
        $('header').addClass('hidden');
      }
    } else { // up
      $('body').removeClass('down').addClass('up').css('paddingTop', function() {
        return $('header').css('position') == 'fixed'? header_height : 0;
      });
      $('header').removeClass('hidden');
    }
    prevPos = currentPos;

    if (scrolltimer !== false) {
      clearTimeout(scrolltimer);
    }
    scrolltimer = setTimeout(function() {
      $('body').removeClass('scroll');
    }, 500);
  });

  // Resize Event
  var resizetimer = false;
  $(window).resize(function() {
    if (resizetimer !== false) {
      clearTimeout(resizetimer);
    }
    resizetimer = setTimeout(function() {
      fixSpMenu();
      header_height = $('header').height();
      $('.tile').each(function() {
        $(this).children().tile();
      });
    }, 200);
  });

});