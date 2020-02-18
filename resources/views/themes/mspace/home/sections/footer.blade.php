<footer class="footer">
            <div class="container">
              <div class="row">
                <div class="col-md-4">
                  <div class="footer__first-section">
                    <div class="footer__info">Trụ sở VP chính: {{\App\Helpers\Base::getSetting('tru-so-van-phong') }}<br>
                      Văn phòng giao dịch:  {{\App\Helpers\Base::getSetting('van-phong-giao-dich') }}</div>
                    <div class="decor-right decor-right_sm"></div>
                    <div class="footer-contacts">
                      
                      <div class="footer-contacts__item"><i class="icon fa fa-phone"></i>{{\App\Helpers\Base::getSetting('dien-thoai') }}</div>
                      <div class="footer-contacts__item"><i class="icon fa fa-envelope"></i>{{\App\Helpers\Base::getSetting('email') }}</div>
                      <div class="footer-contacts__item"><i class="icon fa fa-print"></i>{{\App\Helpers\Base::getSetting('fax') }}</div>
                      <div class="footer-contacts__item"><i class="icon fa fa-location-arrow"></i>{{\App\Helpers\Base::getSetting('tru-so-van-phong') }}</div>
                    </div>
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="clearfix">
                    <div class="footer-wrap-section">
                      <section class="footer-section">
                        <h3 class="footer__title ui-title-inner">Dịch vụ</h3>
                        <div class="decor-right decor-right_sm bg-7"></div>
                        <ul class="footer-list list list-mark-2">
                          @foreach($cate_dichvu as $cate)
                            <li><a href="{{route('cate_dichvu',$cate->slug)}}">{{$cate->name}}</a></li>
                          @endforeach
                            <li><a href="{{route('project')}}">Xem tất cả</a></li>
                        </ul>
                      </section>
                      <section class="footer-section">
                        <h3 class="footer__title ui-title-inner">Danh mục</h3>
                        <div class="decor-right decor-right_sm bg-13"></div>
                        <ul class="footer-list list list-mark-2">
                          <li><a href="{{route('introduce')}}">Giới thiệu</a></li>
                          <li><a href="{{route('services')}}">Dự án</a></li>
                          <li><a href="{{route('post')}}">Tin tức</a></li>
                          <li><a href="{{route('custommer')}}">Khách hàng</a></li>
                          <li><a href="{{route('recruitment')}}">Tuyển dụng</a></li>
                          <li><a href="{{route('contact')}}">Liên hệ</a></li>
                        </ul>
                      </section>
                      <section class="footer-section">
                        <h3 class="footer__title ui-title-inner">Bảng giá</h3>
                        <div class="decor-right decor-right_sm bg-3"></div>
                        <ul class="footer-list list list-mark-2">
                          @foreach ($pricecomposer as $item)
                        <li><a href="{{route('detail_price',$item->slug)}}">{!!App\Helpers\Theme::truncateWords(strip_tags($item->title), 25)!!}</a></li>
                          @endforeach
                          <li><a href="{{route('price')}}">Xem tất cả</a></li>
                        </ul>
                      </section>
                    </div>
                  </div>
                  <form class="footer-form" method="get" action="{{route('posts.search')}}">
                    <div class="form-group has-feedback">
                      <input style="line-height:unset" name="s" type="text" placeholder="Tìm kiếm dịch vụ ..." class="form-control">
                      <button class="icon pe-7s-search form-control-feedback bg-primary"></button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
        
            <div class="footer-bottom">
              <div class="container">
                <div class="row">
                  <div class="col-xs-12">
                    {{-- <div class="footer-bottom__link bg-primary">
                      <div class="footer-bottom__wrap-link">we are social<i class="icon fa fa-caret-right"></i></div>
                    </div> --}}
                    {{-- <div class="footer-bottom__inner">
                                <ul class="social-links list-inline">
                                  <li><a href="twitter.com" class="social-links__item_link"><i class="icon fa fa-twitter"></i></a></li>
                                  <li><a href="facebook.com" class="social-links__item_link"><i class="icon fa fa-facebook"></i></a></li>
                                  <li><a href="instagram.com" class="social-links__item_link"><i class="icon fa fa-instagram"></i></a></li>
                                  <li><a href="linkedin.com" class="social-links__item_link"><i class="icon fa fa-linkedin"></i></a></li>
                                  <li><a href="pinterest.com" class="social-links__item_link"><i class="icon fa fa-pinterest-p"></i></a></li>
                                  <li><a href="youtube.com" class="social-links__item_link"><i class="icon fa fa-youtube-play"></i></a></li>
                                  <li><a href="rss.com" class="social-links__item_link"><i class="icon fa fa-rss"></i></a></li>
                                </ul>
                    </div> --}}
                    <div class="copyright">© 2020<a target="_blank" href="{{\App\Helpers\Base::getSetting('developer-hoang-ngoc-dinh') }}"> {{\App\Helpers\Base::getSettingName('Developer Hoàng Ngọc Định')}} </a></div>
                  </div>
                </div>
              </div>
            </div>
            <button class="topBtn"><i class="fa fa-arrow-up"></i></button>
          </footer>
