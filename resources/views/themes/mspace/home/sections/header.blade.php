<header class="header">
    <div class="top-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="top-header__link bg-primary">
                        <div class="top-header__wrap-link">công ty cổ phần nhà xanh<i class="icon fa fa-caret-right"></i></div>
                    </div>
                    <div class="top-header__ticker">
                        <ul id="myUl">
                            @foreach($postheader as $item)
                            <li class="news-item"><a href="{{route('posts.detail', ['slug' => $item->slug])}}" class="news-item__link">{{$item->title}}</a><i class="icon fa fa-adjust"></i></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-main">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <ul class="social-links list-inline ul-link">
                        <li><a target="_blank" href="{{\App\Helpers\Base::getSetting('twitter') }}" class="social-links__item_link"><i class="icon fa fa-twitter"></i></a>
                        </li>
                        <li><a target="_blank" href="{{\App\Helpers\Base::getSetting('facebook') }}" class="social-links__item_link"><i
                                    class="icon fa fa-facebook"></i></a></li>
                        <li><a target="_blank" href="{{\App\Helpers\Base::getSetting('instagram') }}" class="social-links__item_link"><i
                                    class="icon fa fa-instagram"></i></a></li>
                        <li><a target="_blank" href="{{\App\Helpers\Base::getSetting('linkedin') }}" class="social-links__item_link"><i
                                    class="icon fa fa-linkedin"></i></a></li>
                        <li><a target="_blank" href="{{\App\Helpers\Base::getSetting('pinterest') }}" class="social-links__item_link"><i
                                    class="icon fa fa-pinterest-p"></i></a></li>
                        <li><a target="_blank" href="{{\App\Helpers\Base::getSetting('youtube') }}" class="social-links__item_link"><i
                                    class="icon fa fa-youtube-play"></i></a></li>
                        <li><a target="_blank" href="{{\App\Helpers\Base::getSetting('rss') }}" class="social-links__item_link"><i class="icon fa fa-rss"></i></a></li>
                    </ul>
                </div>
            <div class="col-md-4"><a href="{{route('home')}}" class="logo"><img
                            src="{{App\Helpers\Theme::assetsPath('assets/media/general/logo1.jpg')}}" style="margin-top: -10px;" alt="Logo"
                            class="logo__img img-responsive center-block" /></a></div>
                <div class="col-md-4">
                    <div class="header-main__links">
                        <!-- <a href="home.html" class="header-main__links-item">Sign In</a> or<a href="home.html" class="header-main__links-item"> Register</a> -->
                        <a href="#fakelink" class="search-open"><i class="icon pe-7s-search"></i></a><a href="#cd-nav"
                            class="trigger cd-nav-trigger"><i class="icon pe-7s-menu"></i></a></div>
                </div>
            </div>
        </div>
    </div>
</header>
