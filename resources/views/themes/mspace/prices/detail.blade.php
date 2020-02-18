@if($setting_menu->bao_gia == 1)
@extends('themes.mspace.layouts.app')
@section('seo_support')
<title>{{$prices->title}}</title>
<meta name="title" content="{{$prices->title}}">
<meta name="description" content="{{$prices->meta_description}}">
<meta name="description" content="{{$prices->excerpt}}">
<meta name="description" content="{{Str::words($prices->body,25,'...')}}">
<meta name="keywords" content="{{$prices->meta_keywords}}">
<meta property="og:title" content="{{$prices->title}}">
<meta property="og:description" content="{{$prices->meta_description}}">
<meta property="og:image" content="{{$prices->image}}">
<meta property="og:url" content="{{route('posts.detail',$prices->slug)}}">
<meta name="twitter:title" content="{{$prices->title}}">
<meta name="twitter:description" content="{{$prices->meta_description}}">
<meta name="twitter:image" content="{{$prices->image}}">
<meta name="twitter:card" content="summary_large_image">
@endsection
@section('after_css')
<link rel="stylesheet" href="{{App\Helpers\Theme::assetsPath('assets/css/post/detail.css') }}">
@endsection
@section('content')
<div class="wrap-nav">
    @include('themes.mspace.home.sections.menu')
    <div class="section-title section-bg">
        <div class="section__inner">
            <h1 class="ui-title-page">Chi tiết bảng giá</h1>
        </div>
    </div>
</div>
<div class="breadcrumb-wrap">
    <ol class="breadcrumb">
        <li><a href="{{route('home')}}">Trang chủ</a></li>
        <li><a href="{{route('post')}}">Bảng giá</a></li>
        <li class="active">{{$prices->title}}</li>
    </ol>
</div>
<div class="section-type-k">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <article class="post post-full clearfix">
                    <div class="entry-media"><a href="{{$prices->image}}" class="prettyPhoto"><img src="{{$prices->image}}"
                                alt="Foto" class="img-responsive"></a></div>
                    <div class="entry-main">
                        <div class="entry-header">
                            <h2 class="entry-title">{{$prices->title}}</h2>
                        </div>
                        <div class="entry-meta"><span class="entry-meta__item">Giá: {{$prices->price}} <br> Ngày đăng: {{$prices->created_at->format('d/m/Y')}}</span></div>

                        <div class="entry-content">
                            {!! $prices->body !!}
                        </div>
                      
                    </div>
                    <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0&appId=447109492769330&autoLogAppEvents=1"></script>
<div class="fb-comments" data-href="{{route('detail_price',$prices->slug)}}" data-width="" data-numposts="5"></div>
                </article>



            </div>
            <div class="col-md-4">
                <aside class="sidebar">
                    <div class="widget">
                        <form id="search-global-form" method="get" action="{{route('prices.searchbanggia')}}" class="form-search">
                            <div class="form-group has-feedback">
                              <input name="s" type="text" placeholder="Tìm kiếm bảng giá" class="form-search__input form-control">
                              <button class="form-search__btn icon pe-7s-search form-control-feedback"></button>
                            </div>
                          </form>
                    </div>
                    @include('themes.mspace.home.sections.follow')
                    <section class="widget">
                        <h2 class="widget-title ui-title-inner text-right">Báo giá khác</h2>
                        <div class="decor-right"></div>
                        <div class="widget-content">
                            @foreach($all as $news)
                            <article class="post post-3 post-3_mod-a clearfix">
                                <div class="entry-media"><a href="{{$news->image}}"
                                        class="prettyPhoto"><img src="{{$news->image}}"
                                            alt="Foto" class="img-responsive" /></a></div>
                                <div class="entry-main">
                                    <div class="entry-header">
                                        <h2 class="entry-title"><a href="{{route('detail_price',$news->slug)}}">{{$news->title}}</a></h2>
                                    </div>
                                    <div class="entry-meta"><span class="category color-4">Chi tiết</span></div>
                                </div>
                            </article>
                            @endforeach
                        </div>
                    </section>
                <div class="widget"><a href="{{route('home')}}" class="banner"><img src="{{App\Helpers\Theme::assetsPath('assets/media/content/banners/3.jpg')}}" alt="banner" style="width:336px; height:280px" class="img-responsive center-block"></a></div>
                   
                </aside>
            </div>
        </div>
        
    </div>
</div>
@if($setting_menu->instagram == 1)
    @include('themes.mspace.home.sections.instagram')
@endif

@endsection
@endif
