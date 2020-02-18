        <div class="section-type-f">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <section class="section-type-a wow box">
                            <div class="wrap-title-bg">
                                <h2 class="ui-title-bg">Ban giám đốc</h2>
                            </div>
                        <div data-min480="1" data-min768="2" data-min992="3" data-min1200="4" data-pagination="false"
                            data-navigation="true" data-auto-play="2000" data-stop-on-hover="true"
                            class="owl-carousel owl-theme enable-owl-carousel">
                            @foreach ($employee as $item)
                            <div class="staff">
                                <div class="staff__img"><img src="{{$item->image}}" alt="foto" class="img-responsive"></div>
                            <div class="staff__name">{{$item->name}}</div>
                                <div class="staff__category">{{$item->position}}</div>
                                <ul class="social-links list-inline">
                                    <li><a href="twitter.com" class="social-links__item_link"><i
                                                class="icon fa fa-twitter"></i></a></li>
                                    <li><a href="facebook.com" class="social-links__item_link"><i
                                                class="icon fa fa-facebook"></i></a></li>
                                    <li><a href="plus.google.com" class="social-links__item_link"><i
                                                class="icon fa fa-google-plus"></i></a></li>
                                    <li><a href="linkedin.com" class="social-links__item_link"><i
                                                class="icon fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                            @endforeach
                        </div>
                    </section>
                    </div>
                </div>
            </div>
        </div>
