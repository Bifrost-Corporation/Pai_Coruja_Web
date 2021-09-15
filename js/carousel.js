const $carouselDestaque = document.querySelector('.carousel-destaque')

new Glider($carouselDestaque, {
    slidesToShow: 1,
    slidesToScroll: 1,
    itemHeight: 'auto',

    dots: '.carousel-destaque-dots',

    scrollLock: true,
    draggable: true,
    arrows: {
        prev: '.carousel-destaque-prev',
        next: '.carousel-destaque-next',
    }
})

const $carouselEventos = document.querySelector('.carousel-evento')


new Glider($carouselEventos, {
    slidesToShow: 2.5,
    slidesToScroll: 1,

    dots: '.carousel-evento-dots',

    scrollLock: true,
    draggable: true,
    arrows: {
        prev: '.carousel-evento-prev',
        next: '.carousel-evento-next',
    }
})