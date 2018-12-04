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

// Jquery here
$(document).ready(function(){
	

	//scroll stick
	$(document).scroll(function() {
    $('.header').toggleClass('scrolled', $(document).scrollTop() >= 30);
  });
  $('.header').toggleClass('scrolled', $(document).scrollTop() >= 30);
	
	
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
	
	
	    	
});