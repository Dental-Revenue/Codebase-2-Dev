//require jQuery
var $ = require('jquery');
window.jQuery = window.$ = $;

//require modules
//var Cleave = require('cleave.js');
//require('cleave.js/dist/addons/cleave-phone.US');
require('slick-carousel');
//require('jquery-sticky-kit');
require('sidr/dist/jquery.sidr.js');
require('bootstrap/js/dist/tab.js');
var magnificPopup = require('magnific-popup');
var jQueryBridget = require('jquery-bridget');
var Isotope = require('isotope-layout');
var imagesLoaded = require('imagesloaded');

// Jquery here
$(document).ready(function(){
	

	//scroll stick
	$(document).scroll(function() {
    $('.header').toggleClass('scrolled', $(document).scrollTop() >= 30);
  });
  $('.header').toggleClass('scrolled', $(document).scrollTop() >= 30);
	
	//MODULE SPECIFIC *********
	
	//Module Fold_slider
	$('.slick-fold_slider').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		speed:500,
		arrows: false,
		dots: true,
	});
	
	//Module Carousel_1
	$('.slick-carousel_1').slick({
		slidesToShow: 4,
		slidesToScroll: 4,
		speed:500,
		arrows: false,
		dots: true,
		responsive: [
      {breakpoint: 1100,settings: {slidesToShow: 3,slidesToScroll: 3,}},
      {breakpoint: 700,settings: {slidesToShow: 2,slidesToScroll: 2,}},
      {breakpoint: 480,settings: {slidesToShow: 1,slidesToScroll: 1,}},
    ]
	});
	
	//Module 26 Carousel
	if($('.slick-carousel_2').length>0){
	    $.each( $('.slick-carousel_2'), function(e) {
	      $(this).slick({
	        infinite: true,
	        slidesToShow: 4,
	        slidesToScroll: 4,
	        speed: 300,
	        arrows:false,
	        dots:true,
	        responsive: [
						{breakpoint: 1200,settings:{slidesToScroll:3,slidesToShow: 3}},
						{breakpoint: 900,settings:{slidesToScroll:2,slidesToShow: 2}},
						{breakpoint: 480,settings:{slidesToScroll:1,slidesToShow: 1}}
					]
	      });
	    });   
	}
	
	 //Module 15 Carousel
  if($('.slick-carousel_3').length>0){
    var slides = $('.slick-carousel_3').attr('data-slides');    
    $.each( $('.slick-carousel_3'), function(e) {
      var slides = $(this).attr('data-slides');
      $(this).slick({
        infinite: true,
        slidesToShow: parseInt(slides),
        slidesToScroll: parseInt(slides),
        speed: 300,
        arrows:true,
        dots:true,
        responsive: [
          {breakpoint: 1400,settings: {slidesToShow: 3,slidesToScroll: 3,}},
          {breakpoint: 1000,settings: {slidesToShow: 2,slidesToScroll: 2,}},
          {breakpoint: 660,settings: {slidesToShow: 1,slidesToScroll: 1,}},
        ]
      });
    });   
  }
	
  
  //Module logo_scroll Carousel
  if($('.slick-logo_scroll').length>0){
    $.each( $('.slick-logo_scroll'), function(e) {
      var slides = $(this).attr('data-slides');
      $(this).slick({
        autoplay:true,
        autoplaySpeed: 3000,
        infinite: true,
        slidesToShow: slides,
        slidesToScroll: 1,
        speed: 300,
        arrows:false,
        dots:false,
        responsive: [
          {breakpoint: 1200,settings: {slidesToShow: 3}},
          {breakpoint: 800,settings: {slidesToShow: 2}},
          {breakpoint: 400,settings: {slidesToShow: 1}},
        ]
      });
    });   
  }
  
  //Module 3 Testimonials
  if($('.slick-reviews_testimonials_fold').length>0){
    $.each( $('.slick-reviews_testimonials_fold'), function(e) {
      $(this).slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        speed: 300,
        arrows:true,
        dots:true
      });
    });   
	}
	
	//Module 20 Carousel
  if($('.slick-reviews_testimonials_carousel').length>0){
    $.each( $('.slick-reviews_testimonials_carousel'), function(e) {
      var slides = $(this).attr('data-slides');
      $(this).slick({
        autoplay:true,
        autoplaySpeed: 3000,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        speed: 300,
        arrows:false,
        dots:true
      });
    });   
  }
	
	
	//Module 11
  /*if($('.slick-m11').length>0){
    var slides = $('.slick-m11').attr('data-slides');    
    $.each( $('.slick-m11'), function(e) {
      var slides = $(this).attr('data-slides');
      $(this).slick({
        infinite: true,
        slidesToShow: parseInt(slides),
        slidesToScroll: 1,
        speed: 400,
        arrows:false,
        dots:false,
        autoplay:true,
        autoplaySpeed:3000,
        responsive: [
          {breakpoint: 1200,settings: {slidesToShow: 3}},
          {breakpoint: 800,settings: {slidesToShow: 2}},
          {breakpoint: 400,settings: {slidesToShow: 1}},
        ]
      });
    });   
	} */
  
  //Show tab for Mod 20
$('.static_tabs-left ul li:first-child a').tab('show');


//GALLERY SPECIFIC *********

	//Grid Style Gallery
	if($('body.page-template-template-gallery-grid').length>0){
		jQueryBridget( 'isotope', Isotope, $ );
		
		function getHashFilter() {
	    var hash = location.hash;
	    return hash.replace("#", "");
		}
		var $grid = $('.g-grid-grid');
	    var $filters = $('.g-grid-filters').on('click', 'a', function() {
	        var filterAttr = $(this).attr('data-filter');
	        var filterAttr = filterAttr.replace(".f-", "");
	        location.hash = encodeURIComponent(filterAttr);
	        return false;
	    });
	    var isIsotopeInit = false;
	
	    function onHashchange() {
	        var hashFilter = getHashFilter();
	        if (!hashFilter && isIsotopeInit) {
	            return;
	        }
	        if (!hashFilter || hashFilter == '') {
	            var hashFilter = 'all';
	        }
	        isIsotopeInit = true;
	        $grid.imagesLoaded(function() {
		       // console.log(isotope);
	            $grid.isotope({
	                itemSelector: '.g-grid-grid-item',
	                percentPosition: true,
	                masonry: {
	                    columnWidth: '.g-grid-sizer'
	                },
	                filter: '.f-' + hashFilter
	            });
	        });
	        if (hashFilter) {
	            $filters.find('.active').removeClass('active');
	            $filters.find('[data-filter=".f-' + hashFilter + '"]').addClass('active');
	        }
	    }
	    $(window).on('hashchange', onHashchange);
	    onHashchange();
		
		
		
		$.each($(".g-grid-patient"), function() {
	        var data = $(this).attr('data-images').trim().split(' ');
	        var items = [];
	        if (data && data != '') {
	            for (var i = 0; i < data.length; ++i) {
	                var item = {};
	                if ($(data[i]).hasClass('g-grid-lightbox-single')) {
	                    item["src"] = $(data[i]).find('img').attr('data-src');
	                    item["type"] = "image";
	                    items.push(item);
	                } else {
	                    var fullHTML = $("<div />").append($(data[i]).clone()).html();
	                    fullHTML = fullHTML.replace('src="about:blank" ', '');
	                    fullHTML = fullHTML.replace('src="about:blank" ', '');
	                    fullHTML = fullHTML.replace('data-src', 'src');
	                    fullHTML = fullHTML.replace('data-src', 'src');
	                    item["src"] = fullHTML;
	                    item["type"] = "inline";
	                    items.push(item);
	                }
	            }
	        }
	        $(this).magnificPopup({
	            midClick: true,
	            items: items,
	            gallery: {
	                enabled: true
	            },
	            verticalFit: true,
	            closeMarkup: '<button title="%title%" type="button" class="custom-mfp-close">&#215;</button>',
	            callbacks: {
	                open: function() {
	                    var wHeight = $(window).height();
	                    $('.g-grid-lightbox-set').css('height', wHeight * .9 + "px");
	                },
	                resize: function() {
	                    var wHeight = $(window).height();
	                    $('.g-grid-lightbox-set').css('height', wHeight * .9 + "px");
	                },
	                change: function() {
	                    var wHeight = $(window).height();
	                    if (this.content.hasClass('g-grid-lightbox-set')) {
	                        this.content.css('height', wHeight - 80 + "px");
	                    }
	                }
	            }
	        });
	    });
	  }
	  
	  $('body').on('click', '.custom-mfp-close', function() {
	      $.magnificPopup.close();
	  });
	
	$('.slick-g-scroll').slick({dots:true,arrows:false,infinite:false,speed:200});
	
	
  //Youtube Popups
  $('.popup-youtube').magnificPopup({
		type: 'iframe',
		mainClass: 'mfp-fade',
		removalDelay: 160,
		preloader: false,
		fixedContentPos: false
	});
	
	
	    	
});