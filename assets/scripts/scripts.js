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
require('covervid');
var magnificPopup = require('magnific-popup');
var jQueryBridget = require('jquery-bridget');
var Isotope = require('isotope-layout');
var imagesLoaded = require('imagesloaded');
var OnScreen = require('onscreen');

// Jquery here
$(document).ready(function(){
	
	//sidr menu
  $('#panel-main').sidr({
    name: 'sidr-left',
    source: '.large-nav',
    side: 'left',
    renaming: false
  });
  
  $("#sidr").on("click touchstart",function(e) {
    e.stopPropagation();
	});
	
	$('#panel-more').sidr({
    name: 'sidr-right',
    source: '.footer-info-mobile',
    side: 'right',
    renaming: false
  });
  
	$(".header, .page-wrap").on("click touchstart",function(e) {
    $.sidr('close','sidr-left');
    $.sidr('close','sidr-right');
  });
  
  $("#sidr-left li.menu-item-has-children > span").on("click touchstart",function(e) {
    e.preventDefault();
    if ($(this).parent().hasClass("open")) {
	    $(this).parent().removeClass("open");
    } else {
	    $(this).parent().addClass("open");
    }
    
	});
	
	$(".sidr-open #panel-main").on("click touchstart",function(e) {
    
    $("#sidr-left li.menu-item-has-children > a").parent().removeClass("open");
    
	});

	//scroll stick
	$(document).scroll(function() {
    $('body.slim').toggleClass('scrolled', $(document).scrollTop() >= 30);
    $('body.full').toggleClass('scrolled', $(document).scrollTop() >= 30);
    
    if($('header.notification-active').length > 0){ 
	    
	    var headerHeight = $('header.notification-active').height();
			var navHeight = $('header.notification-active .header-bottom').height();
			var exceptNavHeight = headerHeight-navHeight;
			
	    if($(document).scrollTop() >= 30){
			  $('header').css('top', -(exceptNavHeight));
			  $('.header-style-a .page-head, .header-style-c .page-head, .header-style-a .page-wrap, .header-style-c .page-wrap').css('margin-top', navHeight);
			} else {
			  $('header').css('top', 0);
			  $('.header-style-a header, .header-style-c header').css('top', 0);
			  $('.header-style-b header').css('top', '15px');
			  
			  $('.header-style-a .page-head, .header-style-c .page-head, .header-style-a .page-wrap, .header-style-c .page-wrap').css('margin-top', headerHeight);
				$('.header-style-b .page-head').css({'padding-top': headerHeight+15, 'margin-top': 0});
			}
		}
		
		if($(document).scrollTop() >= 30){
			$('.header-style-a .page-wrap, .header-style-c .page-wrap').addClass('scrolled');
		} else {
			$('.header-style-a .page-wrap, .header-style-c .page-wrap').removeClass('scrolled');
		}
	  
  });
  
  $('body.slim').toggleClass('scrolled', $(document).scrollTop() >= 30);
  $('body.full').toggleClass('scrolled', $(document).scrollTop() >= 30);
  
  if($('header.notification-active').length > 0){
	  var headerHeight = $('header.notification-active').height();
	  $('.header-style-a .page-head, .header-style-c .page-head, .header-style-a .page-wrap, .header-style-c .page-wrap').css('margin-top', headerHeight);
	  $('.header-style-b .page-head').css({'padding-top': headerHeight+15, 'margin-top': 0});
	}
  
  var headerHeight = $('header.notification-active').height();
/*
	if($('header.notification-active').length > 0){ 
		$('.header-style-a .page-wrap, .header-style-c .page-wrap').css('margin-top', headerHeight);
		$('.header-style-b .page-wrap').css('margin-top', headerHeight+15);
	}
*/
	
	//MODULE SPECIFIC *********
	
	//Module Fold_slider
	if($('.slick-fold_slider').length>0){
		$('.slick-fold_slider').slick({
	    infinite: true,
	      slidesToShow: 1,
	      slidesToScroll: 1,
	      speed: 500,
	      arrows:false,
	      dots:true,
	      autoplay: true,
	      autoplaySpeed: 5000,
	      fade: true,
	      cssEase: 'linear',
	      pauseOnHover: false,
	      responsive: [
	        {breakpoint: 480,settings: {dots:false}},
	      ]
		});
	}
	
	if($('.fold-video').length>0){ 
		var videoHeight = $('.fold-video').height();  
		var videoWidth = $('.fold-video').width(); 
		 $('.fold-video').coverVid(videoWidth, videoHeight);
	}
	
	if($('.fold-slices').length>0){
  	if($(window).width()>1199){
		  var sliceWidth = 40/($('.fold-slices .fold-slice').length-1);
		  $('.fold-slices .fold-slice:nth-child(n+2)').css('width',sliceWidth+'%');
		}
  	$('.fold-slices .fold-slice').on('click',function(e){
		  if($(window).width()>1199){
			  $('.fold-slices .fold-slice').removeClass('active').css('width',$(this).parent().attr('data-slice')+'%');
				$(this).addClass('active').css('width','60%');
			}else{
				var activeSlice = $(this).index()+1;
				$('.fold-slices .fold-slice').removeClass('active').css('width','10%');
				$(this).addClass('active').css('width','80%');
				var offset = ( activeSlice==1 || activeSlice==$('.fold-slices .fold-slice').length) ? 1 : 0 ;
				$('.fold-slices .fold-slice:nth-child(n+'+(activeSlice+2+offset)+')').css('width','0%');
				$('.fold-slices .fold-slice:nth-child(-n+'+(activeSlice-2-offset)+')').css('width','0%');
			}
  	});
  }
  
  $('.fold-slices-slick').slick({
    	infinite: true,
			speed: 500,
      fade: true,
      cssEase: 'linear',
      pauseOnHover: false,
      autoplay: true,
		  autoplaySpeed: 5000,
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: false,
      dots:true,
		});
	
	
	// module fold_boxes
	var os = new OnScreen();
	os.on('enter', '.fold-panel, .fold-slice-content', (element, event) => {
    element.classList.add("onScreen");
	});
	os.on('leave', '.fold-panel, .fold-slice-content', (element, event) => {
    element.classList.remove("onScreen");
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
  
  //Gallery Widget
  if($('.slick-widget-gallery').length>0){
    $('.slick-widget-gallery').slick({
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      speed: 300,
      arrows:false,
      dots:true,
      fade: true,
      cssEase: 'linear',
      autoplay:true
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


//SHORTCODE BLOCKS ********

//Mini Gallery Shortcode Button
  if($('.slick-mini-gallery').length>0){
    $.each( $('.slick-mini-gallery'), function(e) {
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
  
  $('.grid-mini-gallery').magnificPopup({
	  delegate: 'a.mini-gallery-grid-item',
	  midClick: true,
	  type: 'image',
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
	
//Faqs shortcode button
	if($('.faq_shortcode_contain').length>0){
    var loadAccordian = function(){
      var allTriggers = $('.faq_accordion > span[data-accordion="question"] > a');
      var allPanels = $('.faq_accordion > span[data-accordion="answer"]').hide();
      $('.faq_accordion > span[data-accordion="question"] > a').on('click',function(e){
	      	e.preventDefault();
          var target =  $(this).parent().next();
          if(!target.hasClass('active')){
             allPanels.removeClass('active').slideUp();
             target.addClass('active').slideDown();
             allTriggers.removeClass('active');
             $(this).addClass('active');
          } else {
	          allTriggers.removeClass('active');
	          allPanels.removeClass('active').slideUp();
          }
        return false;
      });
    }
    loadAccordian();
	}
	
//testimonials shortcode button
if($('.slick_shortcode_testimonials').length>0 && $('.slick_slide_shortcode_testimonials').length>1){
    $.each( $('.slick_shortcode_testimonials'), function(e) {
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
  
//SERVICES SPECIFIC *********	
  //Service Page Associations (if applicable)
  if($('.slick-service-associations').length>0){
    $('.slick-service-associations').slick({
      speed: 500,
      arrows:false,
      dots:false,
      autoplay: true,
      autoplaySpeed: 2000,
      slidesToShow: 3,
      slidesToScroll: 1,
      responsive: [
        {breakpoint: 1100,settings:{slidesToScroll:2,slidesToShow: 2}},
        {breakpoint: 600,settings:{slidesToScroll:1,slidesToShow: 1}}
      ]
    });
  }
  
  //Service Page Testimonials (if applicable)
  if($('.slick-service-testimonials').length>0){
    $('.slick-service-testimonials').slick({
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      speed: 300,
      arrows:false,
      dots:true,
      fade: true,
      cssEase: 'linear',
      autoPlay:true
    });
  }
  
	//Service Page FAQs (if applicable)
  if($('.service-faqs').length>0){
    var loadAccordian = function(){
      var allTriggers = $('.faq-accordion > dt > a');
      var allPanels = $('.faq-accordion > dd').hide();
      $('.faq-accordion > dt > a').on('click',function(){
          if(!$(this).parent().next().hasClass('active')){
             allPanels.removeClass('active').slideUp();
             $(this).parent().next().addClass('active').slideDown();
             allTriggers.removeClass('active');
             $(this).addClass('active');
          }
        return false;
      });
    }
    loadAccordian();
  }

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

	$('.drop-link').removeClass('open').next().hide();
  $('.drop-link').on('click',function(t){t.preventDefault(),$(this).toggleClass('open').next().slideToggle()});
	
  $('.popup-youtube').magnificPopup({
		type: 'iframe',
		mainClass: 'mfp-fade',
		removalDelay: 160,
		preloader: false,
		fixedContentPos: false
	});

	$('.popup-iframe').magnificPopup({
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false
    });

    $('.popup-image').magnificPopup({
        type: 'image',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false
    });
	   	
});