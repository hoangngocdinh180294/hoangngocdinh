@if($setting_menu->khach_hang == 1)
@extends('themes.mspace.layouts.app')
@section('seo_support')
<title>{{\App\Helpers\Base::getSetting('custommer-list-title') }}</title>
<meta name="description" content="{{\App\Helpers\Base::getSetting('custommer-list-description') }}">
<meta name="keywords" content="{{\App\Helpers\Base::getSetting('custommer-list-keywords') }}">
@endsection
@section('after_css')
<link rel="stylesheet" href="{{App\Helpers\Theme::assetsPath('assets/css/service/detail.css') }}">
@endsection

@section('content')
<div class="wrap-nav">
    @include('themes.mspace.home.sections.menu')
    <div class="section-title section-bg">
        <div class="section__inner">
            <h1 class="ui-title-page">Khách hàng</h1>
        </div>
    </div>
</div>
<div class="breadcrumb-wrap">
    <ol class="breadcrumb">
        <li><a href="{{route('home')}}">Trang chủ</a></li>
        <li class="active">Chi tiết khách hàng</li>
    </ol>
</div>
<div class="section-type-k">
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <article class="post post-full clearfix">
                    <div class="entry-media"><a href="{{$custommer->image}}" class="prettyPhoto"><img src="{{$custommer->image}}"
                                alt="Foto" class="img-responsive"></a></div>
                    <div class="entry-main">
                        <div class="entry-header">
                            <h2 class="entry-title">{{$custommer->title}}</h2>
                        </div>
                        <div class="entry-meta"><span class="entry-meta__item">{{$custommer->created_at->format('d/m/Y')}}</span></div>
                        <div class="entry-content">
                            {!! $custommer->body !!}
                        </div>
                       
                    </div>
                    <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0&appId=447109492769330&autoLogAppEvents=1"></script>
<div class="fb-comments" data-href="{{route('detail_price',$custommer->slug)}}" data-width="" data-numposts="5"></div>
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
