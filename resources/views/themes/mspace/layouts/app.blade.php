
<!DOCTYPE html>
<html lang="en" class="no-js">
  <head>
    <meta charset="utf-8"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <meta name="csrf_token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    @yield('seo_support')
    <meta content="telephone=no" name="format-detection"/>
    <meta name="HandheldFriendly" content="true"/>
    <link rel="stylesheet" href="{{App\Helpers\Theme::assetsPath('assets/css/master.css')}}"/>
    <!-- SWITCHER-->
    <link href="{{App\Helpers\Theme::assetsPath('assets/plugins/switcher/css/switcher.css')}}" rel="stylesheet" id="switcher-css" media="all"/>
    <link href="{{App\Helpers\Theme::assetsPath('assets/plugins/switcher/css/color1.css')}}" rel="alternate stylesheet" title="color1" media="all"/>
    <link href="{{App\Helpers\Theme::assetsPath('assets/plugins/switcher/css/color2.css')}}" rel="alternate stylesheet" title="color2" media="all"/>
    <link href="{{App\Helpers\Theme::assetsPath('assets/plugins/switcher/css/color3.css')}}" rel="alternate stylesheet" title="color3" media="all"/>
    <link href="{{App\Helpers\Theme::assetsPath('assets/plugins/switcher/css/color4.css')}}" rel="alternate stylesheet" title="color4" media="all"/>
    <link href="{{App\Helpers\Theme::assetsPath('assets/plugins/switcher/css/color5.css')}}" rel="alternate stylesheet" title="color5" media="all"/>
    <link rel="icon" type="image/x-icon" href="{{App\Helpers\Theme::assetsPath('images/favicon.ico')}}"/>
    <link href="{{App\Helpers\Theme::assetsPath('css/home.css')}}" rel="alternate stylesheet" title="color1" media="all"/>
    
    <link rel="stylesheet" type="text/css" href="{{App\Helpers\Theme::assetsPath('assets/css/project/demo.css')}}" />
<link rel="stylesheet" type="text/css" href="{{App\Helpers\Theme::assetsPath('assets/css/project/style_common.css')}}" />
<link rel="stylesheet" type="text/css" href="{{App\Helpers\Theme::assetsPath('assets/css/project/reset.css')}}" />
<link rel="stylesheet" type="text/css" href="{{App\Helpers\Theme::assetsPath('assets/css/project/style9.css')}}" />
<script src="{{App\Helpers\Theme::assetsPath('assets/js/project/modernizr.custom.js')}}"></script>

    <link rel="stylesheet" href="{{App\Helpers\Theme::assetsPath('assets/css/call/call-right.css')}}">
    <link rel="stylesheet" href="{{App\Helpers\Theme::assetsPath('assets/css/call/call-left.css')}}">
    <link rel="stylesheet" href="{{App\Helpers\Theme::assetsPath('assets/css/call/call-left-2.css')}}">
    <link rel="stylesheet" type="text/css" href="{{App\Helpers\Theme::assetsPath('assets/css/project/normalize.css')}}" />
<link rel="stylesheet" type="text/css" href="{{App\Helpers\Theme::assetsPath('assets/css/project/set2.css')}}" />
    @yield('after_css')
    <style type="text/css">
    #calltrap-ico:before {
        background-image: url("{{App\Helpers\Theme::assetsPath('assets/images/call.png')}}");
    }
		</style>
    <script>(function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement)</script>
  </head>
  <body>
    <!-- Loader-->
    <div id="page-preloader"><span class="spinner"></span></div>
    <!-- Loader end-->
    <div data-header="sticky" data-header-top="200" class="layout-theme animated-css">
      <!-- Start Switcher-->
      <div class="switcher-wrapper">
        <div class="demo_changer">
          <div class="demo-icon color_primary"><i class="fa fa-cog fa-spin fa-2x"></i></div>
          <div class="form_holder">
            <div class="row">
              <div class="col-xs-12">
                <div class="predefined_styles">
                  <div class="skin-theme-switcher">
                    <h4>Color</h4><a href="javascript:void(0);" data-switchcolor="color1" style="background-color:#02b300;" class="styleswitch"></a>
                    <a href="javascript:void(0);" data-switchcolor="color2" style="background-color:#3498db;" class="styleswitch"></a>
                    <a href="javascript:void(0);" data-switchcolor="color3" style="background-color:#00adb4;" class="styleswitch"></a>
                    <a href="javascript:void(0);" data-switchcolor="color4" style="background-color:rgba(245, 59, 87, 1.0);" class="styleswitch"></a>
                    <a href="javascript:void(0);" data-switchcolor="color5" style="background-color:rgba(155, 89, 182,1.0);" class="styleswitch"></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end switcher-->
      <div class="cd-main">
        <div class="wrap-content cd-section cd-selected">
          @if($setting_menu->header == 1)
          @include('themes.mspace.home.sections.header')
          @endif

          @yield('content')
          @include('themes.mspace.elements.call-right')
          @include('themes.mspace.elements.call-left')
          <br>
          @include('themes.mspace.elements.call-left-2')

          @if($setting_menu->footer == 1)
          @include('themes.mspace.home.sections.footer')
          @endif

      
        </div>
      </div>
    </div>
    <nav id="cd-nav" class="cd-nav-container"><a href="#0" class="cd-close-nav">Close</a>
      <nav class="sidebar-nav">
        <ul class="sidebar-nav__list list-unstyled">
          <li><a href="{{route('home')}}">Trang chủ</a></li>
          @if($setting_menu->gioi_thieu == 1)
          <li><a href="{{route('introduce')}}">Giới thiệu</a></li>
          @endif

          @if($setting_menu->dich_vu == 1)
          <li><a href="{{route('project')}}" data-toggle="dropdown">Dịch vụ</a>
            <ul role="menu" class="dropdown-menu">
              <li>
                <ul class="list list-mark-1 list-mark-1_mod-a">
                  @foreach($cate_dichvu as $cate)
                  <li><a href="{{route('cate_dichvu',$cate->slug)}}">{{$cate->name}}</a></li>
                  @endforeach
                </ul>
              </li>
            </ul>
          </li>
          @endif

          @if($setting_menu->du_an == 1)
          <li><a href="{{route('services')}}">Dự án</a></li>
          @endif

          @if($setting_menu->tin_tuc == 1)
          <li><a href="{{route('post')}}">Tin tức</a></li>
          @endif

          @if($setting_menu->khach_hang == 1)
          <li><a href="{{route('custommer')}}">Khách hàng</a></li>
          @endif

          @if($setting_menu->bao_gia == 1)
          <li><a href="{{route('price')}}">Bảng giá</a></li>
          @endif

          @if($setting_menu->tuyen_dung == 1)
          <li><a href="{{route('recruitment')}}">Tuyển dụng</a></li>
          @endif

          @if($setting_menu->lien_he == 1)
          <li><a href="{{route('contact')}}">Liên hệ</a></li>
          @endif
        </ul>
      </nav>
      <!-- end layout-theme-->
    </nav>
    <script src="{{App\Helpers\Theme::assetsPath('assets/js/main.js')}}"></script>
    <script src="{{App\Helpers\Theme::assetsPath('assets/js/separate-js/custom.js')}}"></script>
    <script src="{{App\Helpers\Theme::assetsPath('assets/plugins/3d-bold-navigation/main.js')}}"></script>
    <script src="{{App\Helpers\Theme::assetsPath('assets/plugins/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{App\Helpers\Theme::assetsPath('assets/plugins/slider-pro/jquery.sliderPro.js')}}"></script>
    <script src="{{App\Helpers\Theme::assetsPath('assets/plugins/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{App\Helpers\Theme::assetsPath('assets/plugins/isotope/isotope.pkgd.min.js')}}"></script>
    <script src="{{App\Helpers\Theme::assetsPath('assets/plugins/prettyphoto/jquery.prettyPhoto.js')}}"></script>
    <script src="{{App\Helpers\Theme::assetsPath('assets/plugins/bootstrap-select/bootstrap-select.js')}}"></script>
    <script src="{{App\Helpers\Theme::assetsPath('assets/plugins/rendro-easy-pie-chart/jquery.easypiechart.min.js')}}"></script>
    <script src="{{App\Helpers\Theme::assetsPath('assets/plugins/doubletaptogo.js')}}"></script>
    <script src="{{App\Helpers\Theme::assetsPath('assets/plugins/waypoints.min.js')}}"></script>
    <script src="{{App\Helpers\Theme::assetsPath('assets/plugins/news-ticker/js/endlessRiver.js')}}"></script>
    <script src="{{App\Helpers\Theme::assetsPath('assets/plugins/datetimepicker/jquery.datetimepicker.js')}}"></script>
    <script src="{{App\Helpers\Theme::assetsPath('assets/plugins/flexslider/jquery.flexslider.js')}}"></script>
    <script src="{{App\Helpers\Theme::assetsPath('assets/plugins/jarallax/jarallax.js')}}"></script>
    <script src="{{App\Helpers\Theme::assetsPath('assets/plugins/scrollreveal/scrollreveal.js')}}"></script>
    <script src="{{App\Helpers\Theme::assetsPath('assets/plugins/classie.js')}}"></script>
    <script src="{{App\Helpers\Theme::assetsPath('assets/plugins/switcher/js/dmss.js')}}"></script>
    <script src="{{App\Helpers\Theme::assetsPath('assets/plugins/tilt.jquery.js')}}"></script>
    <script src="{{App\Helpers\Theme::assetsPath('assets/plugins/jquery.ripples.js')}}"></script>
    <script src="{{App\Helpers\Theme::assetsPath('assets/plugins/switcher/js/swiper.min.js')}}"></script>
    @yield('after_js')
    <script src="{{App\Helpers\Theme::assetsPath('assets/js/project/demoad.js')}}"></script>
    <script>
  $(document).ready(function(){
    $(".social-button-content").hide();
    $('.user-support').click(function(event) {
      $('.social-button-content').slideToggle();
    });
    });
</script>

  </body>
</html>
