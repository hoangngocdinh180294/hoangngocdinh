$(document).ready(function() {
    $(document).on('scroll', function() {
        var page = $("html");
        var top = page.scrollTop();
        var height = $('.site-begin').height() - 58;
        if(top > height){
            $('body').addClass("mb-sticky");
            $('.wrap-nav .navbar-brand.logo').removeClass('d-none');
            $('.wrap-nav .navbar-nav').removeClass('mx-auto').addClass('ml-auto');
        } else {
            $('body').removeClass("mb-sticky");
            $('.wrap-nav .navbar-brand.logo').addClass('d-none');
            $('.wrap-nav .navbar-nav').removeClass('ml-auto').addClass('mx-auto');
        }
    });
});
