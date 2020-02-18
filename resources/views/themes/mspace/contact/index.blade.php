@if($setting_menu->lien_he == 1)
@extends('themes.mspace.layouts.app')
@section('seo_support')
    <title>{{\App\Helpers\Base::getSetting('contact-title') }}</title>
    <meta name="description" content="{{\App\Helpers\Base::getSetting('contact-description') }}">
    <meta name="keywords" content="{{\App\Helpers\Base::getSetting('contact-keywords') }}">
    <meta property="og:title" content="{{\App\Helpers\Base::getSetting('contact-title') }}">
    <meta property="og:description" content="{{\App\Helpers\Base::getSetting('contact-description') }}">
    <meta name="twitter:title" content="{{\App\Helpers\Base::getSetting('contact-title') }}">
    <meta name="twitter:description" content="{{\App\Helpers\Base::getSetting('contact-description') }}">
@endsection
@section('content')
<div class="wrap-nav">
@include('themes.mspace.home.sections.menu')
            <div class="section-title section-bg">
              <div class="section__inner">
                <h1 class="ui-title-page">Liên hệ</h1>
              </div>
            </div>
          </div>
          <div class="breadcrumb-wrap">
            <ol class="breadcrumb">
            <li><a href="{{route('home')}}">Trang chủ</a></li>
              <li class="active">Liên hệ</li>
            </ol>
          </div>
          <div class="section-type-a">
            <div class="container">
              <div class="row">
                <div class="col-md-3">
                  <div class="contacts-item"><i class="icon pe-7s-map-marker color-primary"></i>
                    <div class="decor-center bg-primary"></div>
                    <div class="contacts-item__title">Địa chỉ</div>
                    <div class="contacts-item__info">Trụ sở VP chính: Số 10 Phan Huy Chú - Hoàn Kiếm - Hà Nội  <br> Văn phòng giao dịch: Tầng 7, P711 Toà nhà 8C, 30 Tạ Quang Bửu, Hai Bà Trưng, Hà Nội </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="contacts-item"><i class="icon pe-7s-call color-7"></i>
                    <div class="decor-center bg-7"></div>
                    <div class="contacts-item__title">Số điện thoại</div>
                    <div class="contacts-item__info">Điện thoại : (8424) 22195122 <br>Fax: (8424) 36230355</div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="contacts-item"><i class="icon pe-7s-mail-open-file color-13"></i>
                    <div class="decor-center bg-13"></div>
                    <div class="contacts-item__title">email</div>
                    <div class="contacts-item__info">nhaxanh.hn@gmail.com <br></div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="contacts-item"><i class="icon pe-7s-clock color-3"></i>
                    <div class="decor-center bg-3"></div>
                    <div class="contacts-item__title">Thời gian làm việc</div>
                    <div class="contacts-item__info">Sáng: 8h00 - 12h00 Chiều: 13h00 - 17h00  <br> Tư vấn MIỄN PHÍ 24/7</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- <div id="map" class="map"></div> -->
          <div class="section-type-a"></div>
          <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3724.318633359336!2d105.856873!3d21.019933!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135abedbff25ef5%3A0xcfaef45c4c40961e!2zMTAgUGhhbiBIdXkgQ2jDuiwgUGhhbiBDaHUgVHJpbmgsIEhvw6BuIEtp4bq_bSwgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2sus!4v1575727862293!5m2!1svi!2sus" width="100%" height="450px" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
          <div class="section-type-f">
            <div class="container">
              <div class="row">
                <div class="col-xs-12">
                  <h2 class="ui-title-block"><span class="ui-title-block__subtitle">Liên hệ với chúng tôi</span><span class="text-uppercase"></span></h2>
                  @include('themes.mspace.elements.contact_form')
                </div>
              </div>
            </div>
          </div>
@if($setting_menu->instagram == 1)
    @include('themes.mspace.home.sections.instagram')
@endif
@endsection
@endif
