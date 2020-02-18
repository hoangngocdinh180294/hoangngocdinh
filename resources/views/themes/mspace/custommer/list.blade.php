@if($setting_menu->khach_hang == 1)
@extends('themes.mspace.layouts.app')
@section('seo_support')
<title>{{\App\Helpers\Base::getSetting('custommer-list-title') }}</title>
<meta name="description" content="{{\App\Helpers\Base::getSetting('custommer-list-description') }}">
<meta name="keywords" content="{{\App\Helpers\Base::getSetting('custommer-list-keywords') }}">
@endsection
@section('after_css')
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
        <li class="active">Khách hàng</li>
    </ol>
</div>
<div class="section-default">
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <section class="section-type-a wow">
                <div data-min480="1" data-min768="2" data-min992="2" data-min1200="4" data-pagination="false"
                    data-navigation="true" data-auto-play="4000" data-stop-on-hover="true"
                    class="owl-carousel owl-theme enable-owl-carousel">
                    @foreach($custommer as $item)
                    <article class="post post-1 clearfix">
                        <div class="entry-media"><a href="{{route('detail_custommer',$item->slug)}}" class="prettyPhoto"><img
                                    src="{{$item->image}}" alt="Foto" class="img-responsive" /></a>
                            <h2 class="entry-title">{{$item->title}}</h2>
                        </div><a href="{{route('detail_custommer',$item->slug)}}"><span class="label bg-1">Chi tiết</span></a>
                        <div class="entry-meta"><span class="entry-meta__item">{{$item->created_at->format('d/m/Y')}}</span></div>
                    </article>
                    @endforeach
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
