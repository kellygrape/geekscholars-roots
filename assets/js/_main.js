// Modified http://paulirish.com/2009/markup-based-unobtrusive-comprehensive-dom-ready-execution/
// Only fires on body class (working off strictly WordPress body_class)

var geekScholarsSite = {
  // All pages
  common: {
    init: function() {
      
    },
    finalize: function() { 
      $('[data-toggle="tooltip"]').tooltip({'placement': 'bottom'});
      $('.carousel').carousel();
    	$('.movie-review-snippet').each(function(){
        theMovieTitleHeight = $(this).find('.header-text').height();
        $(this).find('.movie-review-rating').css('height',theMovieTitleHeight);
        $(this).find('.movie-review-rating').css('line-height',theMovieTitleHeight+'px');
      });
    }
  },
  // Home page
  home: {
    init: function() {
      // JS here
    }
  },
  // About page
  about: {
    init: function() {
      // JS here
    }
  }
};

var UTIL = {
  fire: function(func, funcname, args) {
    var namespace = geekScholarsSite;
    funcname = (funcname === undefined) ? 'init' : funcname;
    if (func !== '' && namespace[func] && typeof namespace[func][funcname] === 'function') {
      namespace[func][funcname](args);
    }
  },
  loadEvents: function() {

    UTIL.fire('common');

    $.each(document.body.className.replace(/-/g, '_').split(/\s+/),function(i,classnm) {
      UTIL.fire(classnm);
    });

    UTIL.fire('common', 'finalize');
  }
};

$(document).ready(UTIL.loadEvents);
