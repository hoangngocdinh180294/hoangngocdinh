$(document).ready(function() {
    var slideEl = $('.before-nav-wrap-slide');
    var slideItems = JSON.parse(slideEl.attr('data-slides'));
    console.log(slideItems);
    slideEl.vegas({
        slides: slideItems,
        overlay: 'https://cdnjs.cloudflare.com/ajax/libs/vegas/2.4.4/overlays/01.png',
        timer: false
    });
});
