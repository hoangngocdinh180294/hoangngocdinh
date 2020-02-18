@if($setting_menu->gioi_thieu == 1)
@extends('themes.mspace.layouts.app')
@section('content')
<div class="wrap-nav">
    @include('themes.mspace.home.sections.menu')
    <div class="section-title section-bg" style="background-image: url({{App\Helpers\Theme::assetsPath('assets/media/content/page-title/1.jpg')}});">
        <div class="section__inner">
            <h1 class="ui-title-page">Giới thiệu</h1>
        </div>
    </div>
</div>
<div class="breadcrumb-wrap">
    <ol class="breadcrumb">
        <li><a href="{{route('home')}}">Trang chủ</a></li>
        <li class="active">Giới thiệu</li>
    </ol>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="section-type-a">
                <div class="ui-description ui-description_mod-a text-center"><h1>Kính gửi Quý khách hàng !</h1> <br>
                    Lời đầu thư, Công ty Green House xin gửi tới Quý khách hàng lời chúc <b>“Sức khỏe và thành công”.</b> <br>
                    Chúng tôi, Ban lãnh đạo cùng toàn thể nhân viên Công ty Green House luôn hướng tới mục tiêu: <b>“Đạt và giữ vững vị trí số 1 về kinh nghiệm làm sạch trên thị trường Việt Nam trong lĩnh vực cung cấp dịch vụ vệ sinh chuyên nghiệp”</b>.

 
                </div>
            </div>
        </div>
        <div class="col-md-4 col-md-offset-4">
            <div class="decor-center"></div>
        </div>
    </div>
</div>
<div class="section-type-i">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div data-pagination="false" data-navigation="true" data-single-item="true" data-auto-play="3000"
                    data-transition-style="fade" data-main-text-animation="true" data-after-init-delay="3000"
                    data-after-move-delay="1000" data-stop-on-hover="true"
                    class="owl-carousel owl-theme owl-theme_mod-b enable-owl-carousel"><img
                        src="{{App\Helpers\Theme::assetsPath('assets/media/content/carousel-1/4.jpg')}}" alt="foto" class="img-responsive"><img
                        src="{{App\Helpers\Theme::assetsPath('assets/media/content/carousel-1/5.jpg')}}" alt="foto" class="img-responsive"><img
                        src="{{App\Helpers\Theme::assetsPath('assets/media/content/carousel-1/6.jpg')}}" alt="foto" class="img-responsive"></div>
            </div>
            <div class="col-md-6">
                <section class="section_mod-a">
                    <h2 class="ui-title-block ui-title-block_font-sm text-uppercase">Green House ý thức một cách sâu sắc sự mong đợi của Quý khách hàng.</h2>
                    <p>Qua website này chúng tôi xin gửi tới Quý khách hàng một số thông tin về Công ty và sản phẩm dịch vụ của mình. Vì vậy chúng tôi luôn sẵn sàng chia sẻ và đem hết khả năng, kinh nghiệm của mình nhằm cung cấp những sản phẩm chất lượng cao nhất với dịch vụ tốt nhất.</p>
                    <ul class="list list-mark-1">
                        @foreach ($project_categoris as $item)
                        <li><a href="{{route('cate_dichvu',$item->slug)}}">{{$item->name}}</a></li>
                        @endforeach
                    </ul><a href="{{route('project')}}" class="btn-link">Xem thêm</a>
                </section>
            </div>
        </div>
    </div>
</div>
<div class="section-type-f">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h2 class="ui-title-block"><span class="ui-title-block__subtitle">Ban Lãnh Đạo</span><span
                        class="text-uppercase">Green house</span></h2>
                <div data-min480="1" data-min768="2" data-min992="3" data-min1200="4" data-pagination="false"
                    data-navigation="true" data-auto-play="4000" data-stop-on-hover="true"
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
            </div>
        </div>
    </div>
</div>
@if($setting_menu->slogan == 1)
@include('themes.mspace.home.sections.slogan')
@endif
<div class="section-default section_mod-b">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <section class="section-area">
                    <h2 class="ui-title-inner ui-title-inner_spacing_sm text-right">ý kiến khách hàng</h2>
                    <div class="decor-right"></div>
                    <div data-pagination="true" data-navigation="false" data-single-item="true" data-auto-play="3000"
                        data-transition-style="fade" data-main-text-animation="true" data-after-init-delay="3000"
                        data-after-move-delay="1000" data-stop-on-hover="true"
                        class="owl-carousel owl-theme owl-theme_mod-c enable-owl-carousel">
                        @foreach ($customer_contacts->chunk(2) as $items)
                        <div class="reviews-block">
                            @foreach ($items as $item)
                            <div class="reviews">
                                <div class="clearfix">
                                    <div class="reviews__inner">
                                        <div class="reviews__img center-block"><img
                                                src="{{App\Helpers\Theme::assetsPath('assets/media/content/reviews/1.jpg')}}" alt="foto"
                                                class="img-responsive"></div>
                                        <div class="reviews__name">{{$item->full_name}}</div>
                                    </div>
                                    <div class="reviews__info">{!!$item->body!!}</div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endforeach
                    </div>
                </section>
            </div>
            <div class="col-md-6">
                <section class="section-area">
                    <h2 class="ui-title-inner ui-title-inner_spacing_sm text-right">tại sao là chúng tôi</h2>
                    <div class="decor-right"></div>
                    <div id="accordion-1" class="panel-group accordion">
                        @php $i = 0 @endphp
                        @foreach ($pages as $item)
                        @php $i++ @endphp
                        <div class="panel {{$i == 1 ? 'panel-default' : ''}}">
                            <div class="panel-heading"><a data-toggle="collapse" data-parent="#accordion-{{$i}}"
                                    href="#collapse-{{$i}}" class="btn-collapse {{$i == 1 ? '' : 'collapsed'}}"><i class="icon"></i></a>
                            <h3 class="panel-title">{{$item->title}}</h3>
                            </div>
                            <div id="collapse-{{$i}}" class="panel-collapse collapse {{$i == 1 ? 'in' : ''}}">
                                <div class="panel-body"><img style="width:100px; height:90px" src="{{$item->image}}" alt="foto"
                                        class="img-responsive pull-left">
                                    <p>{!!$item->body!!}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        {{-- <div class="panel">
                            <div class="panel-heading"><a data-toggle="collapse" data-parent="#accordion-1"
                                    href="#collapse-2" class="btn-collapse collapsed"><i class="icon"></i></a>
                                <h3 class="panel-title">Sed eiusmod tempor incididunt ut labore dolore</h3>
                            </div>
                            <div id="collapse-2" class="panel-collapse collapse">
                                <div class="panel-body"><img src="{{App\Helpers\Theme::assetsPath('assets/media/content/post/100x90/1.jpg')}}" alt="foto"
                                        class="img-responsive pull-left">
                                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                        aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                                        voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
                                        occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim
                                        id est laborum.</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-heading"><a data-toggle="collapse" data-parent="#accordion-1"
                                    href="#collapse-3" class="btn-collapse collapsed"><i class="icon"></i></a>
                                <h3 class="panel-title">Dui aliquip ex ea commodo consequat duis</h3>
                            </div>
                            <div id="collapse-3" class="panel-collapse collapse">
                                <div class="panel-body"><img src="{{App\Helpers\Theme::assetsPath('assets/media/content/post/100x90/1.jpg')}}" alt="foto"
                                        class="img-responsive pull-left">
                                    <p>Corem ipsum dolor amet consectetur sed dipisicing elit do eiusmod tempor
                                        incididunt labore et dolore magna aliqua enimad minim incididunt. Lorem ipsum
                                        dolor sit amet, consectetur adipisic ding elit sed do eiusmod tempor incididunt
                                        ut labore et dolore.</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-heading"><a data-toggle="collapse" data-parent="#accordion-1"
                                    href="#collapse-4" class="btn-collapse collapsed"><i class="icon"></i></a>
                                <h3 class="panel-title">Somun donseuat duis aute irure dolor in</h3>
                            </div>
                            <div id="collapse-4" class="panel-collapse collapse">
                                <div class="panel-body"><img src="{{App\Helpers\Theme::assetsPath('assets/media/content/post/100x90/1.jpg')}}" alt="foto"
                                        class="img-responsive pull-left">
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                        doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore
                                        veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam
                                        voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                                        consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque
                                        porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci
                                        velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore
                                        magnam aliquam quaerat voluptatem.</p>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
@if($setting_menu->instagram == 1)
    @include('themes.mspace.home.sections.instagram')
@endif
@endsection
@endif
