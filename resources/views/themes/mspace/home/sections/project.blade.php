<!-- <div class="container">
    <div class="row">
        <div class="col-xs-12">
            <section class="section-type-a wow">
                <div class="wrap-title-bg">
                    <h2 class="ui-title-bg">Dự án của chúng tôi</h2>
                </div>
                <div data-min480="1" data-min768="2" data-min992="2" data-min1200="4" data-pagination="false"
                    data-navigation="true" data-auto-play="4000" data-stop-on-hover="true"
                    class="owl-carousel owl-theme enable-owl-carousel">
                    @foreach($services as $service)
                    <article class="post post-1 clearfix">
                        <div class="entry-media"><a href="{{route('detail_service',$service->link)}}" class="prettyPhoto"><img
                                    src="{{$service->image}}" alt="Foto" class="img-responsive" /></a>
                            <h2 class="entry-title">{{$service->title}}</h2>
                        </div><a href="{{route('detail_service',$service->link)}}"><span class="label bg-1">Chi tiết</span></a>
                        <div class="entry-meta"><span class="entry-meta__item">{{$service->created_at->format('d/m/Y')}}</div>
                    </article>
                    @endforeach
                </div>
            </section>
        </div>
    </div>
</div> -->
<!-- 

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <section class="section-type-a wow">
                <div class="wrap-title-bg">
                    <h2 class="ui-title-bg">Dự án của chúng tôi</h2>
                </div>
                <div class="wrapper project">
                    <div class="row stage clearfix">
                        @foreach($services as $service)
                        <div class="main">
                        <div class="view view-ninth">
                        @if(!empty($service->image))
                            <img src="{{$service->image}}" />
                            @else
                            <img src="{{App\Helpers\Theme::assetsPath('assets/media/general/logo.jpg')}}" />
                            @endif
                            <div class="mask mask-1"></div>
                            <div class="mask mask-2"></div>
                            <div class="content">
                                {{-- <h2>{{$service->name}}</h2> --}}
                                <p>{!!App\Helpers\Theme::truncateWords(strip_tags($service->title), 75)!!}</p>
                                <a href="{{route('detail_service',$service->link)}}" class="info">Xem thêm</a>
                            </div>
                        </div>
                    </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </div>
</div> -->
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <section class="section-type-a wow">
                <div class="wrap-title-bg">
                    <h2 class="ui-title-bg">Dự án của chúng tôi</h2>
                </div>
                
                    <!-- Top Navigation -->
                    <div class="content">
                    <!-- <div class="row"> -->
                        <div class="grid">
                        @foreach($services as $service)
                            <figure class="effect-ming">
                            @if(!empty($service->image))
                                    <img src="{{$service->image}}" />
                                    @else
                                    <img src="{{App\Helpers\Theme::assetsPath('assets/media/general/logo.jpg')}}" />
                                    @endif
                                <figcaption>
                                    <h2 style="font-size: 17px; text-transform: none;font-family: Arial, sans-serif;">{!!App\Helpers\Theme::truncateWords(strip_tags($service->title), 50)!!}</h2>
                                    <p>bản quyền thuộc green house</p>
                                    <a href="{{route('detail_service',$service->link)}}">Xem thêm</a>
                                </figcaption>			
                            </figure>
                        @endforeach
                        </div>
                    <!-- </div> -->
                    </div>
            </section>
        </div>
    </div>
</div>
