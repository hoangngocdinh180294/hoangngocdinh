@if($setting_menu->bao_gia == 1)
@extends('themes.mspace.layouts.app')
@section('seo_support')
    <title>{{\App\Helpers\Base::getSetting('price-list-title') }}</title>
    <meta name="description" content="{{\App\Helpers\Base::getSetting('price-list-description') }}">
    <meta name="keywords" content="{{\App\Helpers\Base::getSetting('price-list-keywords') }}">
@endsection

@section('content')
<div class="wrap-nav">
@include('themes.mspace.home.sections.menu')
            <div class="section-title section-bg">
              <div class="section__inner">

                <h1 class="ui-title-page">Bảng giá</h1>

              </div>
            </div>
          </div>
          <div class="breadcrumb-wrap">
            <ol class="breadcrumb">
              <li><a href="{{route('home')}}">Trang chủ</a></li>
              <li class="active">Bảng giá</li>

            </ol>
          </div>
          <div class="section-default">
            <div class="container">
              <div class="row">
                <div class="col-md-8">
                @foreach($prices as $item)
                  <article class="post post-5 clearfix">
                    <div class="entry-media"><a href="{{$item->image}}" class="prettyPhoto"><img src="{{$item->image}}" alt="Foto" style="width:340px; height:310px" class="img-responsive"/></a></div>
                    <div class="entry-main">
                      <div class="entry-header"><span class="category color-4">Chi tiết</span>
                        <h2 class="entry-title"><a href="{{route('detail_price',$item->slug)}}">{!!App\Helpers\Theme::truncateWords(strip_tags($item->title), 30)!!}</a></h2>
                      </div>
                      <div class="entry-meta"><span class="entry-meta__item">{{$item->created_at->format('d/m/Y')}}</span></div>                      <div class="entry-content">
                        <p>{!!App\Helpers\Theme::truncateWords(strip_tags($item->excerpt), 98)!!}</p>
                      </div>
                      <div class="entry-footer"><a href="{{route('detail_price',$item->slug)}}" class="btn-link">Đọc thêm</a></div>
                    </div>
                  </article>
                  @endforeach
                  <div class="wrap-pagination">
                    <ul class="pagination">
                      {{-- <li><a href="#">previous</a></li> --}}

                      {{-- <li class="active">{{$all_posts->links()}}</li> --}}

                     

                      {{-- <li><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                      <li><a href="#">4</a></li>
                      <li><a href="#">5</a></li>
                      <li><a href="#">Next</a></li> --}}
                    </ul>
                  </div>
                </div>
                <div class="col-md-4">
                  <aside class="sidebar">
                    <div class="widget">
                      <form id="search-global-form" method="get" action="{{route('prices.searchbanggia')}}" class="form-search">
                        <div class="form-group has-feedback">
                          <input name="s" type="text" placeholder="Tìm kiếm bảng giá" class="form-search__input form-control">
                          <button class="form-search__btn icon pe-7s-search form-control-feedback"></button>
                        </div>
                      </form>
                    </div>
                    @include('themes.mspace.home.sections.follow')
                    
                    <section class="widget">
                      <h2 class="widget-title ui-title-inner text-right">Bảng giá liên quan</h2>
                      <div class="decor-right"></div>
                      <div class="widget-content">
                        @foreach ($pricenew as $item)
                        <article class="post post-3 post-3_mod-a clearfix">
                          <div class="entry-media"><a href="{{$item->image}}" class="prettyPhoto"><img src="{{$item->image}}" alt="Foto" style="width:100px; height:100px" class="img-responsive"/></a></div>
                          <div class="entry-main">
                            <div class="entry-header">
                            <h2 class="entry-title"><a href="{{route('detail_price',$item->slug)}}">{{$item->title}}</a></h2>
                            </div>
                            <div class="entry-meta"><span class="category color-4">đọc tiếp</span><span class="entry-meta__item"><i class="icon pe-7s-comment"></i><a href="{{route('detail_price',$item->slug)}}" class="entry-meta__link">greenhouse</a></span></div>
                          </div>
                        </article>
                        @endforeach
                      </div>
                    </section>
                  <div class="widget"><a href="{{route('home')}}" class="banner"><img src="{{App\Helpers\Theme::assetsPath('assets/media/content/banners/3.jpg')}}" alt="banner" style="width:336px; height:280px" class="img-responsive center-block"></a></div>
                    <section class="widget">
                      <h2 class="widget-title ui-title-inner text-right">tiếp tục được cập nhật</h2>
                      <div class="decor-right"></div>
                      <div class="widget-content">
                        <p>Đăng ký nhận bản tin của chúng tôi để nhận tin tức mới nhất.</p>
                        <form class="form-subscribe">
                          <div class="form-group has-feedback">
                            <input type="email" placeholder="Email của bạn" class="form-control">
                            <button class="icon pe-7s-mail form-control-feedback"></button>
                          </div>
                        </form>
                      </div>
                    </section>
                    
                  </aside>
                </div>
              </div>
            </div>
          </div>
@if($setting_menu->instagram == 1)
    @include('themes.mspace.home.sections.instagram')
@endif
@endsection
@endif
