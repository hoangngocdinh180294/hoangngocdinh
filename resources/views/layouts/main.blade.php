<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    @yield('seo_tags')
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=ZCOOL+KuaiLe" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="{{ mix('themes/default/css/app.css') }}" rel="stylesheet">
    @yield('css')
</head>
<body class="{{isset($body_class) ?  $body_class : 'default-body'}}">
<header>
    <div class="site-begin">
            @yield('before-nav')
    </div>
    <div class="section-nav">
        <div class="wrap-nav">
            <div class="container">
                <nav class="navbar navbar-expand-md">
                    <a class="navbar-brand logo d-none" href="{{route('home')}}">MSPACE.VN</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mspace-navbar-toggler"
                            aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="mspace-navbar-toggler">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('home') }}">Trang chủ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Giới thiệu</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Dự án</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('contact.view')}}">Liên hệ</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
@yield('content')
<section class="subscription">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 align-items-center d-flex text-uppercase">
                <div>Liên hệ <span>{{\App\Helpers\Base::getSetting('dien-thoai') }}</span> hoặc đăng ký tư vấn miễn phí</div>
            </div>
            <div class="col-12 col-lg-6 align-items-center d-flex">
                <form name="form" class="w-100" method="post" id="form-subcribe" action="/Support/Subscribe">
                    <div class="form-group">
                        <input name="email" type="email" class="form-control" placeholder="Địa chỉ email của bạn" required="">
                    </div>
                    <div class="form-group">
                        <input name="phone" type="number" class="form-control" placeholder="Số điện thoại" required="">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary w-100" id="btn-subcribe">Đăng ký tư vấn</button>
                    </div>
                </form>
                <div id="subcribe-success" class="d-none">
                    Cảm ơn bạn! Thông tin của bạn đã được gửi thành công!
                </div>
            </div>
        </div>
    </div>
</section>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4">
                <h4 class="footer-title">Thông tin liên hệ</h4>
                <div class="footer-description">
                    <ul>
                    <li><i class="fa-fw fas fa-phone-square fa-flip-horizontal"></i> <span> {{\App\Helpers\Base::getSetting('dien-thoai') }}</span></li>
                        <li><i class="fa-fw fas fa-map-marker"></i> <span> {{\App\Helpers\Base::getSetting('dia-chi') }}</span></li>
                        <li><i class="fa-fw fas fa-envelope-open"></i> <span> {{\App\Helpers\Base::getSetting('email') }}</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-md-4 text-md-center">
                <h4 class="footer-title">Thời gian làm việc</h4>
                <div class="footer-description">
                    <ul>
                        <li>Thứ 2- 6: 8h:00 - 17h:30</li>
                        <li>Thứ 7: 8h:00 - 12h:00</li>
                        <li>CN và các ngày lễ: Nghỉ</li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-md-4 text-md-right">
                <h4 class="footer-title">Trung tâm hỗ trợ</h4>
                <div class="footer-description">
                    <ul>
                        <li><a href="#">Câu hỏi thường gặp</a></li>
                        <li><a href="#">Chính sách bảo hiểm</a></li>
                        <li><a href="#">Thông tin liên hệ</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-6">
                <ul class="list-inline d-inline-block wrap-social">
                    <li class="list-inline-item"><a href="{{\App\Helpers\Base::getSetting('google-plus') }}"><i class="fab fa-google-plus-square"></i></a></li>
                    <li class="list-inline-item"><a href="{{\App\Helpers\Base::getSetting('twitter') }}"><i class="fab fa-twitter-square"></i></a></li>
                    <li class="list-inline-item"><a href="{{\App\Helpers\Base::getSetting('facebook') }}"><i class="fab fa-facebook"></i></a></li>
                    <li class="list-inline-item"><a href="{{\App\Helpers\Base::getSetting('youtube') }}"><i class="fab fa-youtube-square"></i></a></li>
                    <li class="list-inline-item"><a href="{{\App\Helpers\Base::getSetting('instagram') }}"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </div>
            <div class="col-6 text-right">
                <div class="footer-logo">
                    <a class="logo" href="{{route('home')}}">MSPACE.VN</a>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="{{ mix('themes/default/js/main.js') }}"></script>
@yield('js')
</body>
</html>

