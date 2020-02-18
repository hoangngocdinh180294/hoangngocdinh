
@extends('themes.mspace.layouts.app')
@section('seo_support')
 <title>  {{\App\Helpers\Base::getSetting('site-title') }}</title>
 <meta name="description" content="{{\App\Helpers\Base::getSetting('site-description') }}">
 <meta name="keywords" content="{{\App\Helpers\Base::getSetting('site-keywords') }}">
@endsection
@section('content')
        <h1 style="display:none">aaaaaaaaaaaa</h1>
        @if($setting_menu->slide == 1)
        @include('themes.mspace.home.sections.slides')
        @endif

        @if($setting_menu->dich_vu == 1)
        @include('themes.mspace.home.sections.service')
        @endif

        @if($setting_menu->du_an == 1)
        @include('themes.mspace.home.sections.project')
        @endif

        @if($setting_menu->tai_sao == 1)
        @include('themes.mspace.home.sections.about_us')
        @endif

        @if($setting_menu->slogan == 1)
        @include('themes.mspace.home.sections.slogan')
        @endif

        @if($setting_menu->tin_tuc == 1)
        @include('themes.mspace.home.sections.post')
        @endif

        @if($setting_menu->khach_hang == 1)
        @include('themes.mspace.home.sections.custommer')
        @endif

        @if($setting_menu->bao_gia == 1)
        @include('themes.mspace.home.sections.product')
        @endif

        @if($setting_menu->lanh_dao == 1)
        @include('themes.mspace.home.sections.employee')
        @endif


        @if($setting_menu->instagram == 1)
        @include('themes.mspace.home.sections.instagram')
        @endif
@endsection
@section('css')
<link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.min.css">
@endsection

@section('js')
<script src="https://unpkg.com/swiper/js/swiper.min.js"></script>
<script>
$(document).ready(function () {
  var mySwiper = new Swiper ('.swiper-container', {
    loop: true
  })
});
</script>
@endsection
