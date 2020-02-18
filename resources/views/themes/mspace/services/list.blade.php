@if($setting_menu->du_an == 1)
@extends('themes.mspace.layouts.app')
@section('seo_support')
<title>{{\App\Helpers\Base::getSetting('services-list-title') }}</title>
<meta name="description" content="{{\App\Helpers\Base::getSetting('services-list-description') }}">
<meta name="keywords" content="{{\App\Helpers\Base::getSetting('services-list-keywords') }}">
@endsection
@section('after_css')
@endsection

@section('content')
<div class="wrap-nav">
    @include('themes.mspace.home.sections.menu')
    <div class="section-title section-bg">
        <div class="section__inner">
            <h1 class="ui-title-page">Dự án</h1>
        </div>
    </div>
</div>
<div class="breadcrumb-wrap">
    <ol class="breadcrumb">
        <li><a href="{{route('home')}}">Trang chủ</a></li>
        <li class="active">Dự án</li>
    </ol>
</div>
{{-- <div class="section-default">
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <section class="section-type-a wow">
                <div data-min480="1" data-min768="2" data-min992="2" data-min1200="4" data-pagination="false"
                    data-navigation="true" data-auto-play="4000" data-stop-on-hover="true"
                    class="owl-carousel owl-theme enable-owl-carousel">
                    @foreach($services as $service)
                    <article class="post post-1 clearfix">
                        <div class="entry-media"><a href="{{route('detail_service',$service->link)}}" class="prettyPhoto"><img
                                    src="{{$service->image}}" alt="Foto" class="img-responsive" /></a>
                            <h2 class="entry-title">{{$service->title}}</h2>
                        </div><a href="{{route('detail_service',$service->link)}}"><span class="label bg-1">Chi tiết</span></a>
                        <div class="entry-meta"><span class="entry-meta__item">{{$service->created_at->format('d/m/Y')}}</span></div>
                    </article>
                    @endforeach
                </div>
            </section>
        </div>
    </div>
</div>
</div> --}}
{{-- <div class="container">
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
                    <p>{!!App\Helpers\Theme::truncateWords(strip_tags($service->title), 75)!!}</p>
                    <a href="{{route('detail_service',$service->link)}}" class="info">Xem thêm</a>
                </div>
            </div>
        </div>
            @endforeach
        </div>
    </div>
</div> --}}
<div class="container">

    <div class="row">
        <div class="col-xs-12">
            <section class="section-type-a wow">
                    <div class="content">
                        <div class="grid">
                        @foreach($services as $service)
                            <figure class="effect-ming">
                            @if(!empty($service->image))
                                    <img src="{{$service->image}}" />
                                    @else
                                    <img src="{{App\Helpers\Theme::assetsPath('assets/media/general/logo.jpg')}}" />
                                    @endif
                                <figcaption>
                                    <h2 style="font-size: 17px; text-transform: none;font-family: Arial, sans-serif;">{!!App\Helpers\Theme::truncateWords(strip_tags($service->title), 75)!!}</h2>
                                    <p>bản quyền thuộc green house</p>
                                    <a href="{{route('detail_service',$service->link)}}">Xem thêm</a>
                                </figcaption>			
                            </figure>
                        @endforeach
                        </div>
                    </div>
            </section>
        </div>
    </div>
    <div class="wrap-pagination">
        <ul class="pagination">
          {{-- <li><a href="#">previous</a></li> --}}
          <li class="active">{{$services->links()}}</li>
          {{-- <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#">5</a></li>
          <li><a href="#">Next</a></li> --}}
        </ul>
      </div>
</div>

@if($setting_menu->instagram == 1)
    @include('themes.mspace.home.sections.instagram')
@endif
@endsection
@endif
