jQuery(function($){
    // ПРИЖИМАЕМ ФУТЕР
    $(window).load(function () { // вешаем скрипт на load ибо при ready chrome криво достаёт размеры
        var hh = jQuery('header.site-header').height(); // берем высоту шапки и суем в переменную hh
        var fh = jQuery('footer.footer').height(); // то же самое с подвалом
        var wh = jQuery(window).height(); // высота всего окна
        var сh = wh - hh - fh; // считаем оптимальную высоту для блока с контентом
        $('#sitecontent').css('min-height', сh); // применяем посчитанную высоту
    });
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
            breakpoint: 400,
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
        arrows: false
    });

// ПОДГРУЗКА ПОСТОВ
    $('#true_loadmore').click(function(){
        $(this).text('Загружаю...'); // изменяем текст кнопки, вы также можете добавить прелоадер
        var data = {
            'action': 'loadmore',
            'query': true_posts,
            'page' : current_page
        };
        $.ajax({
            url:ajaxurl, // обработчик
            data:data, // данные
            type:'POST', // тип запроса
            success:function(data){
                if( data ) {
                    $('#true_loadmore').text('Загрузить ещё').before(data); // вставляем новые посты
                    current_page++; // увеличиваем номер страницы на единицу
                    if (current_page == max_pages) $("#true_loadmore").remove(); // если последняя страница, удаляем кнопку
                } else {
                    $('#true_loadmore').remove(); // если мы дошли до последней страницы постов, скроем кнопку
                }
            }
        });
    });
});


