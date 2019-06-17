var homePage = (function () {
    var initCountDown = function () {
        if ($("#header-countdown").length && (typeof $.fn.countdown !== 'undefined')) {
            $("#header-countdown").countdown({until: new Date("Jan 29, 2017 00:00:00 +0000"), timezone: +14});
        }
    }
    var initModule = function () {
        $(window).load(function () {
            if (window.innerWidth > 1024) {
                $('.expert-trainer .scroll-wrapper').each(function () {
                    if (this.scrollHeight > this.offsetHeight) {
                        $(this).slimScroll({
                            height: this.offsetHeight + 'px',
                            railColor: '#e3e3e3',
                            railVisible: true,
                            railOpacity: 1,
                            alwaysVisible: true,
                            color: '#4c4c4c',
                            size: '4px',
                            opacity: 1
                        });
                    }
                });
            }
        });
        $('.offers-carousel').owlCarousel({
            items: 2,
            dots: false,
            nav: true,
            loop: true,
            margin: 20,
            navText: ['', ''],
            responsive: {0: {items: 1}, 480: {items: 2}}
        });
        $('.testimonial-carousel').owlCarousel({items: 1, dots: false, nav: true, loop: true, navText: ['', '']});
        if (window.innerWidth < 768) {
            $('.celeb-carousel').addClass('owl-carousel owl-theme').removeClass('row').owlCarousel({
                items: 1,
                dots: true,
                nav: false,
                loop: true,
                responsive: {0: {items: 1}, 480: {items: 2}}
            });
        }
    };
    return {initModule: initModule};
}());
$(document).ready(function ($) {
    homePage.initModule();
});