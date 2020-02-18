<section class="testimonials">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 text-center">
            <h2 class="section-title">Khách hàng nói về chúng tôi</h2>
        </div>
        <div class="col-12">
            <div id="testimonial-slider" class="owl-carousel">
                <div class="testimonial item">
                    <div class="testimonial-content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda deleniti dolor ipsum
                            molestias mollitia ut. Aliquam aperiam corporis cumque debitis delectus dignissimos.
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        </p>
                    </div>
                    <div class="testimoial-author">
                        <div class="pic">
                            <img src="https://static.pexels.com/photos/529928/pexels-photo-529928.jpeg">
                        </div>
                        <h3 class="testimonial-title">
                            <a href="#">krystal</a>
                            <small>Web Developer</small>
                        </h3>
                    </div>
                </div>



                <div class="testimonial item">
                    <div class="testimonial-content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda deleniti dolor ipsum
                            molestias mollitia ut. Aliquam aperiam corporis cumque debitis delectus dignissimos.
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        </p>
                    </div>
                    <div class="pic">
                        <img src="https://static.pexels.com/photos/529928/pexels-photo-529928.jpeg">
                    </div>
                    <h3 class="testimonial-title">
                        <a href="#">Jhonson</a>
                        <small>Web Developer</small>
                    </h3>
                </div>



                <div class="testimonial item">
                    <div class="testimonial-content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda deleniti dolor ipsum
                            molestias mollitia ut. Aliquam aperiam corporis cumque debitis delectus dignissimos.
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        </p>
                    </div>
                    <div class="pic">
                        <img src="https://static.pexels.com/photos/529928/pexels-photo-529928.jpeg">
                    </div>
                    <h3 class="testimonial-title">
                        <a href="#">David </a>
                        <small>Web Developer</small>
                    </h3>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

@section('css')
    @parent
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
@stop

@section('js')
@parent
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>

    $(document).ready(function(){

        $("#testimonial-slider").owlCarousel({

            items:1,

            itemsDesktop:[1000,1],

            itemsDesktopSmall:[979,1],

            itemsTablet:[768,1],

            pagination:true,

            navigation:false,

            slideSpeed:1000,

            singleItem:false,

            navigationText:["",""],

            autoPlay:true

        });

    });
</script>
@stop
