@extends('themes.mspace.layouts.app')
@section('seo_support')
    <title>  {{App\Helpers\Theme::assetsPath('404-title')}}</title>
    <meta name="description" content="{{\App\Helpers\Base::getSetting('404-description')}}">
    <meta name="keywords" content="{{\App\Helpers\Base::getSetting('404-keyworks')}}">
@endsection
@section('after_css')
    <link rel="stylesheet" href="{{App\Helpers\Theme::assetsPath('assets/css/404.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Anton|Passion+One|PT+Sans+Caption' rel='stylesheet' type='text/css'>
@endsection
@section('content')

<section class="error-container">
<h4>Lỗi !!! Trang không tồn tại  </h4>
  <span><span>4</span></span>
  <span>0</span>
  <span><span>4</span></span>
</section>
<div class="link-container">
  <a href="{{route('home')}}" class="more-link">Về trang chủ</a>
</div>
@endsection
