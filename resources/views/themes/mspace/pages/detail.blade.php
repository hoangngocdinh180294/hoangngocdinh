@if($setting_menu->tai_sao == 1)
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
<link rel="stylesheet" href="{{App\Helpers\Theme::assetsPath('assets/css/service/detail.css') }}">
@endsection
@section('content')
<div class="wrap-nav">
    @include('themes.mspace.home.sections.menu')
    <div class="section-title section-bg">
        <div class="section__inner">
            <h1 class="ui-title-page">{{$post->title}}</h1>
        </div>
    </div>
</div>
<div class="breadcrumb-wrap">
    <ol class="breadcrumb">
        <li><a href="{{route('home')}}">Trang chủ</a></li>
        <li class="active">{{$post->title}}</li>
    </ol>
</div>
<div class="section-type-k">
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <article class="post post-full clearfix">
                    <div class="entry-media"><a href="{{$post->image}}" class="prettyPhoto"><img src="{{$post->image}}"
                                alt="Foto" class="img-responsive"></a></div>
                    <div class="entry-main">
                        <div class="entry-header">
                            <h2 class="entry-title">{{$post->title}}</h2>
                        </div>
                        <div class="entry-meta"><span class="entry-meta__item">{{$post->created_at->format('d/m/Y')}}</span></div>
                        <div class="entry-content">
                            {!! $post->body !!}
                        </div>
                        <div class="entry-footer clearfix">
                            <ul class="social-links social-links_mod-a list-inline">
                                <li class="bg-14"><a href="facebook.com" class="social-links__item_link"><i
                                            class="icon fa fa-facebook"></i></a></li>
                                <li class="bg-15"><a href="twitter.com" class="social-links__item_link"><i
                                            class="icon fa fa-twitter"></i></a></li>
                                <li class="bg-16"><a href="plus.google.com" class="social-links__item_link"><i
                                            class="icon fa fa-google-plus"></i></a></li>
                                <li class="bg-17"><a href="instagram.com" class="social-links__item_link"><i
                                            class="icon fa fa-instagram"></i></a></li>
                                <li class="bg-18"><a href="rss.com" class="social-links__item_link"><i
                                            class="icon fa fa-rss"></i></a></li>
                                <li class="bg-19"><a href="pinterest.com" class="social-links__item_link"><i
                                            class="icon fa fa-pinterest-p"></i></a></li>
                                <li class="bg-20"><a href="mail.com" class="social-links__item_link"><i
                                            class="icon fa fa-envelope-o"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </article>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</div>
@if($setting_menu->instagram == 1)
    @include('themes.mspace.home.sections.instagram')
@endif
@endsection
@endif
