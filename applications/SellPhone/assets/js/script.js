$(document).ready(function() {
    // MOBILE MAIN MENU
    $('.js-open-menu').on('click', function(e) {
        e.preventDefault();
        $('.main-menu').addClass("show");
        return false;
    });

    $('.js-close-menu').on('click', function(e) {
        e.preventDefault();
        $('.main-menu').removeClass("show");
        return false;
    });

    // SUBMENU

    $('.js-toggle-submenu').on('click', function(e) {
        e.preventDefault();
        $(this).toggleClass("active");
        $(this).parent().siblings('.sub-menu').toggleClass("show");
        return false;
    });

    // JS COLLAPSE
    $('.js-collapse .js-collapse-open').on('click', function(e) {
        e.preventDefault();
        var parent = $(this).parents('.js-collapse');
        parent.toggleClass('is-active');
    });

    // ANIMATED ITEMS

    $('.js-animated-item').on('click', function(e) {
        sizeItems();
        e.preventDefault();
        $(this).parents(".item-animated").toggleClass('open')
            .siblings().removeClass('open');

        if ($('.item-animated:first-child').hasClass('open')) {
            $('.animated-items').addClass('first-active').removeClass('active');

        } else if ($('.animated-items .open').length > 0) {
            $('.animated-items').addClass('active').removeClass('first-active');
        } else {
            $('.animated-items').removeClass('active first-active');
        }
    });

    // JS TOGGLE
    $('.js-toggle-close').on('click', function(e) {
        e.preventDefault();
        $(this).parent().find('.js-content').toggleClass('show');
    });

    // match height
    $('.product-item').find('.spec-row').matchHeight({
        byRow: true,
        property: 'height',
        target: null,
        remove: false
    });
    $('.product-item').find('.wrap-img').matchHeight({
        byRow: true,
        property: 'height',
        target: null,
        remove: false
    });

    // Scroll
    $('a[href^="#"]').bind('click.smoothscroll', function(e) {
        e.preventDefault();

        var target = this.hash;
        var targetx = $(target).offset();

        $('html, body').stop().animate({
            'scrollTop': targetx.top
        }, 700, 'swing', function() {
            window.location.hash = target;
        });
    });

    function callCarousel(targetElement) {
        var owl = $(targetElement);
        owl.owlCarousel({
            responsive: {
                0: {
                    items: 1,
                    slideBy: 1
                }

            },
            navigation: true,
            nav: true,
            dots: true,
            loop: true,
            lazyLoad: true,
            autoplay: true,
            touchDrag: true,
            mouseDrag: true,
            autoplayTimeout: 5000,
            // animateOut: 'slideOutDown',
            // animateIn: 'flipInX',
            navText: ['<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>', '<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>']

        });
    }

    function callCarouselAccess(targetElement) {
        var owlA = $(".wrap-acces");
        owlA.owlCarousel({
            responsive: {
                0: {
                    items: 1,
                    slideBy: 1
                },
                767: {
                    items: 2,
                    slideBy: 2
                },
                769: {
                    items: 4,
                    slideBy: 4
                }

            },
            navigation: true,
            nav: true,
            dots: false,
            loop: true,
            lazyLoad: true,
            autoplay: true,
            touchDrag: true,
            mouseDrag: true,
            autoplayTimeout: 5000,
            // animateOut: 'slideOutDown',
            // animateIn: 'flipInX',
            navText: ['<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>', '<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>']

        });
    }

    // add slider
    callCarouselAccess();
    callCarousel(".owl-carousel");

    // windown resize
    var optionOWLB = {
        responsive: {
            0: {
                items: 1,
                slideBy: 1
            },
            767: {
                items: 2,
                slideBy: 2
            }

        },
        navigation: true,
        nav: true,
        dots: false,
        loop: true,
        lazyLoad: true,
        autoplay: true,
        touchDrag: true,
        mouseDrag: true,
        autoplayTimeout: 5000,
        navText: ['<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>', '<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>']
    };
    var owlB = $(".carousel-pad");
    var resizeFunc = function () {
        if ($(window).width() <= 768) {
            owlB.addClass("owl-carousel owl-theme");
            owlB.owlCarousel(optionOWLB);
        } else {
            owlB.owlCarousel('destroy');
            owlB.removeClass("owl-carousel owl-theme");
        }
        $.fn.matchHeight._update();
    }
    $( window ).resize(resizeFunc);


});
