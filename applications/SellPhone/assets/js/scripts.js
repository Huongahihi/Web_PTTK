
// Functions for animated-items

function resizeItems(){
  $('.item-animated-view').removeAttr("style");
  $('.item-animated-content').removeAttr("style");
  $('.item-animated').removeClass('open');
  $('.animated-items').removeClass('active first-active');
};
function sizeItems() {
  var attr = $('.item-animated-view').attr('style');
  if(typeof attr == typeof undefined || attr == false){
    var viewWidth = $(".item-animated").width();
    $(".item-animated-view").css({'width': viewWidth});
    $(".item-animated-content").css({'width': viewWidth});
  }
}

//Function for header fixed

function headerFixed(){
  element = $('.product-menu')
  eTop = element.offset().top;

  $(window).scroll(function() {
    if ($(window).scrollTop() >= eTop) {
      $('body').addClass('header-fixed');
    } else {
      $('body').removeClass('header-fixed');
    }
  });
}

// Anchors' scroll
function anchorScroll(){
  var items  = $('.js-anchor').find('.js-anchor-items a'),
      offset = $('.js-anchor').outerHeight(true);

  items.on('click', function(e){
    e.preventDefault();
    var target    = $($(this).attr('href')),
        targetTop = target.offset().top;

    if (target.length) {
      $('html,body').animate({scrollTop: targetTop-offset}, 1000);
    }

  });
}

//Function for equal heights

function equalizeHeights(){
  $('.equalize').each(function(){

    var items = $(this).find('.box');
    items.removeAttr("style");

    var maxHeight = Math.max.apply(Math, items.map(function(){
         return $(this).outerHeight(true);
    }).get());

    items.css('height', maxHeight);
  });
}

// SCRIPTS STARTS

$(function () {

///////////// CUSTOM FORMS


  var inputs = $("input[type=checkbox],input[type=radio], select").custom_form({
    responsive_select: true
  });

///////// RADIO ITEM PAY FOR IE8

  if( $('.payment-group').lenght ){
    $('.payment-group .radio-item input').on('change', function(e){
      
      if( $(this).is(':checked') ){

        var group  = $(this).parents('.payment-group'),
            parent = $(this).parents('.radio-item');
        
        group.find('.radio-item').removeClass('is-active');
        parent.addClass('is-active');
      }
    });
  }

// TOGGLE VIEW

  $('.js-toggle').on('click',function(e) {
    e.preventDefault();
    $(this).toggleClass("active");
    $(this).next('.js-content').toggleClass("show");
    return false;
  });

// TOGGLE VIEW CLOSE 

  $('.js-toggle-close').on('click',function(e) {
    e.preventDefault();
    var element = $(this);
    $('.js-toggle-close').not(element).removeClass('active');
    $('.js-toggle-close').not(element).next('.js-content').removeClass("show");
    $(this).toggleClass("active");
    $(this).next('.js-content').toggleClass("show");
    return false;
  });

// MOBILE MAIN MENU
  $('.js-open-menu').on('click',function(e) {
    e.preventDefault();
    $('.main-menu').addClass("show");
    return false;
  });

  $('.js-close-menu').on('click',function(e) {
    e.preventDefault();
    $('.main-menu').removeClass("show");
    return false;
  });

// SUBMENU

  $('.js-toggle-submenu').on('click',function(e) {
    e.preventDefault();
    $(this).toggleClass("active");
    $(this).parent().siblings('.sub-menu').toggleClass("show");
    return false;
  });

// JS COLLAPSE
  $('.js-collapse .js-collapse-open').on('click', function(e){
    e.preventDefault();
    var parent  = $(this).parents('.js-collapse');
    parent.toggleClass('is-active');
  });

// ANIMATED ITEMS

  $('.js-animated-item').on('click', function(e){
    sizeItems();
    e.preventDefault();
    $(this).parents(".item-animated").toggleClass('open')
           .siblings().removeClass('open');

    if( $('.item-animated:first-child').hasClass('open') ){
      $('.animated-items').addClass('first-active').removeClass('active');

    } else if( $('.animated-items .open').length > 0 ){
      $('.animated-items').addClass('active').removeClass('first-active');
    } else {
      $('.animated-items').removeClass('active first-active');
    }

  });

// MENU TABS


if( $('.js-tabs').length > 0 ){
    $('.js-tabs-nav a').on('click', function(e){
      e.preventDefault();

      var parent  = $(this).parents('.js-tabs'),
          navElement = $(this).parents('li'),
          tab     = parent.find('.js-tab-content .js-tab'),
          index   = navElement.index();

      navElement.addClass("is-active").siblings('li').removeClass("is-active");
      tab.eq(index).addClass("is-active").siblings().removeClass("is-active");

    });
}

// PRICE PLAN SPECS

if( $('.js-price-plan').length > 0 ){

    $('.js-price-plan .radio').on('click', function(e){

      var parent  = $(this).parents('.field'),
          navElement = $(this).parents('.gi'),
          tab     = parent.find('.prices-plan-specs-detail'),
          index   = navElement.index();

      tab.eq(index).addClass("is-active").siblings().removeClass("is-active");

    });
}


// RESPONSIVEIMAGES
  picturefill();

// FULL CAROUSEL
  $('.full-carousel').slick({
    dots: true,
    adaptiveHeight: true,
    speed: 800,
    prevArrow: "<span class='icon icon-prev'>prev</span>",
    nextArrow: "<span class='icon icon-next'>next</span>"
  });

// FULL CAROUSEL

  if( $('.hero-tabs').length > 0 ){
    var heroTabs = $('.hero-tabs-image')
    heroTabs.slick({
      adaptiveHeight: true,
      speed: 800,
      prevArrow: "<span class='icon icon-prev'>prev</span>",
      nextArrow: "<span class='icon icon-next'>next</span>",
      asNavFor: ".hero-tabs-panel",
      onAfterChange: function() {
        var index = heroTabs.slickCurrentSlide();
        $('.hero-tabs .hero-tab').eq(index).addClass('active').siblings().removeClass('active');
        console.log(index);
      }
    });

    var heroTabsPanel = $('.hero-tabs-panel')
    heroTabsPanel.slick({
      adaptiveHeight: true,
      arrows: false,
      fade: true
    });

    $('.hero-tabs .hero-tab').on('click', function(e){
      e.preventDefault();
      var index = $(this).index();
      heroTabs.slickGoTo(index);
      heroTabsPanel.slickGoTo(index);
    });

  }

// MENU FIXED PRODUCT DISPLAY

  if( $('.product-menu').length > 0 ){
    headerFixed();
  }

  if( $('.js-anchor').length ){
    anchorScroll();
  }

// // EQUALIZE HEIGHT
  if( $('.equalize').length > 0 ){
    $('.equalize img').on("load", function(){
      equalizeHeights();
    });
  }

/////// NAVIGATION FILTERS
  if( $('.navigation-filters').length ){

    $('.navigation-filters .filter-name').on('click', function(){
      $(this).parent('.navigation-filters').toggleClass('is-open');
    });

    $('.navigation-filters li a').on('click', function(e){
      e.preventDefault();
      var parent  = $(this).parents('.navigation-filters'),
          item    = $(this).parent('li'),
          current = $(this).text();

      item.addClass('is-active').siblings('li').removeClass('is-active');
      parent.find('.filter-name .current').text(current);
      parent.removeClass('is-open');

    });
  }

});  // end function

$(window).resize(function() {
  resizeItems();

  if( $('.equalize').length > 0 ){
    equalizeHeights();
  }

});

//SPECS PULL DOWN

$(document).ready(function() {
  var hidden = false;
  $('.specs .button, .faq .button').click(function() {
    hidden = !hidden;
    $('.specs .is-hidden, .faq .is-hidden').slideToggle('normal', function() {
      $('.specs .button, .faq .button').toggleClass('top-icon', hidden);
    });
  });
});

// PRODUCT CART PULL DOWN

$(document).ready(function() {
  var hidden = false;
  $('.product-cart .dropdown').click(function() {
    hidden = !hidden;
    $('.product-cart .is-hidden').slideToggle('normal', function() {
      $('.product-cart .dropdown').toggleClass('top', hidden);
    });
  });
  
     $('.flexslider').flexslider({
                        animation: "slide",
                        animationLoop: true,
                        start: function (slider) {
                           // $('body').removeClass('loading');
                        }
                    });
});
