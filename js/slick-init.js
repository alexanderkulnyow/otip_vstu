jQuery(function ($) {

// АКТИВАЦИЯ СЛИК
    $('.front__news').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 6000,
        dots: false,
        arrows: false,
        responsive: [{
            breakpoint: 1300,
            settings: {
                slidesToShow: 3,
                infinite: true
            }
        }, {
            breakpoint: 800,
            settings: {
                slidesToShow: 2,
                infinite: true

            }
        }, {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                infinite: true

            }
        }]
    });

    $('.staff').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 6000,
        dots: false,
        arrows: false,
        responsive: [{
            breakpoint: 1300,
            settings: {
                slidesToShow: 3,
                infinite: true
            }
        }, {
            breakpoint: 800,
            settings: {
                slidesToShow: 2,
                infinite: true

            }
        }, {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                infinite: true

            }
        }]
    });

});
