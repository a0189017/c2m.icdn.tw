$(function() {
    var pd_thumbnail = [];

    $('.pd-preview-slider .swiper-slide').each(function(){
        pd_thumbnail.push($(this).data('imgurl'))
    });

    var galleryTop = new Swiper('.pd-preview-slider .swiper-container', {
        spaceBetween: 0,
        navigation: {
            nextEl: '.pd-preview-slider .swiper-button-next',
            prevEl: '.pd-preview-slider .swiper-button-prev',
        },
        pagination: {
            el: '.pd-preview-slider .swiper-pagination',
            clickable: true,
            renderBullet: function (index, className) {
                return '<div class="thumb-item '+className+'" style="background-image: url('+pd_thumbnail[index]+');"></div>';
            },
        },
    });

});