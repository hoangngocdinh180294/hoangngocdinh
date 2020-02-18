@if($setting_menu->tin_tuc == 1)
@extends('themes.mspace.layouts.app')
@section('seo_support')
<title>{{$post->title}}</title>
<meta name="title" content="{{$post->title}}">
<meta name="description" content="{{$post->meta_description}}">
<meta name="description" content="{{$post->excerpt}}">
<meta name="description" content="{{Str::words($post->body,25,'...')}}">
<meta name="keywords" content="{{$post->meta_keywords}}">
<meta property="og:title" content="{{$post->title}}">
<meta property="og:description" content="{{$post->meta_description}}">
<meta property="og:image" content="{{$post->image}}">
<meta property="og:url" content="{{route('posts.detail',$post->slug)}}">
<meta name="twitter:title" content="{{$post->title}}">
<meta name="twitter:description" content="{{$post->meta_description}}">
<meta name="twitter:image" content="{{$post->image}}">
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
            <h1 class="ui-title-page">Chi tiết bài viết</h1>
        </div>
    </div>
</div>
<div class="breadcrumb-wrap">
    <ol class="breadcrumb">
        <li><a href="{{route('home')}}">Trang chủ</a></li>
        <li><a href="{{route('post')}}">lifestyle</a></li>
        <li class="active">{{$post->title}}</li>
    </ol>
</div>
<div class="section-type-k">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <article class="post post-full clearfix">
                    <div class="entry-media"><a href="{{$post->image}}" class="prettyPhoto"><img src="{{$post->image}}"
                                alt="Foto" class="img-responsive"></a></div>
                    <div class="entry-main">
                        <div class="entry-header">
                            <h2 class="entry-title">{{$post->title}}</h2>
                        </div>
                        <div class="entry-meta"><span
                                class="entry-meta__item">{{$post->created_at->format('d/m/Y')}}</span></div>
                        <div class="entry-content">
                            {!! $post->body !!}
                        </div>

                    </div>
                    <!-- <iframe src="https://www.facebook.com/plugins/share_button.php?href=http%3A%2F%2Fgreenhouse.com%2Flam-sach-may-tinh&layout=button&size=large&appId=754757451673650&width=87&height=28" width="87" height="28" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe> -->
                    <iframe src="https://www.facebook.com/plugins/share_button.php?href={{route('posts.detail', ['slug' => $post->slug])}}%2F&layout=button&size=large&appId=754757451673650&width=87&height=28" width="87" height="28" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>      
                    <!--  -->
                    <div id="fb-root"></div>
                    <script async defer crossorigin="anonymous"
                        src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0&appId=447109492769330&autoLogAppEvents=1">
                    </script>
                    <div class="fb-comments" data-href="{{route('posts.detail', ['slug' => $post->slug])}}"
                        data-width="" data-numposts="5"></div>
                </article>



            </div>
            <div class="col-md-4">
                <aside class="sidebar">
                    <div class="widget">
                        <form id="search-global-form" method="get" class="form-search"
                            action="{{route('posts.searchtintuc')}}">
                            <div class="form-group has-feedback">
                                <input name="s" type="text" placeholder="Tìm kiếm tin tức"
                                    class="form-search__input form-control">
                                <button class="form-search__btn icon pe-7s-search form-control-feedback"></button>
                            </div>
                        </form>
                    </div>
                    @include('themes.mspace.home.sections.follow')
                    <section class="widget">
                        <h2 class="widget-title ui-title-inner text-right">Dịch vụ</h2>
                        <div class="decor-right"></div>
                        <div class="widget-content">
                            <ul class="list list-mark-1 list-mark-1_mod-a">
                                @foreach($cate_dichvu as $cate)
                                <li><a href="{{route('cate_dichvu',$cate->slug)}}">{{$cate->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </section>
                    <section class="widget">
                        <h2 class="widget-title ui-title-inner text-right">Tin tức liên quan</h2>
                        <div class="decor-right"></div>
                        <div class="widget-content">
                            @foreach($postsNew as $news)
                            <article class="post post-3 post-3_mod-a clearfix">
                                <div class="entry-media"><a href="{{$news->image}}" class="prettyPhoto"><img
                                            src="{{$news->image}}" alt="Foto" class="img-responsive" /></a></div>
                                <div class="entry-main">
                                    <div class="entry-header">
                                        <h2 class="entry-title"><a
                                                href="{{route('posts.detail', ['slug' => $news->slug])}}">{{$news->title}}</a>
                                        </h2>
                                    </div>
                                    <div class="entry-meta"><span class="category color-4">Chi tiết</span></div>
                                </div>
                            </article>
                            @endforeach
                        </div>
                    </section>
                    <div class="widget"><a href="{{route('home')}}" class="banner"><img
                                src="{{App\Helpers\Theme::assetsPath('assets/media/content/banners/3.jpg')}}"
                                alt="banner" style="width:336px; height:280px" class="img-responsive center-block"></a>
                    </div>

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
