
@if($setting_menu->dich_vu == 1)
@extends('themes.mspace.layouts.app')
@section('seo_support')
  <title>{{\App\Helpers\Base::getSetting('projects-list-title') }}</title>
  <meta name="description" content="{{\App\Helpers\Base::getSetting('projects-list-description') }}">
  <meta name="keywords" content="{{\App\Helpers\Base::getSetting('projects-list-keywords') }}">
@endsection
@section('after_css')
  <link rel="stylesheet" type="text/css" href="{{App\Helpers\Theme::assetsPath('js/cubeportfolio/cubeportfolio.min.css')}}">
  <link rel="stylesheet" href="{{App\Helpers\Theme::assetsPath('css/project/listproject.css')}}"/>
@endsection

@section('content')
<div class="wrap-nav">
@include('themes.mspace.home.sections.menu')
            <div class="section-title section-bg">
              <div class="section__inner">
                <h1 class="ui-title-page">Tất cả bảng giá Greenhouse</h1>
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
                @if($count>0)
                <h1>Tìm thấy {{$count}} kết quả phù hợp với <i><b>{{$key}}</b></i> </h1>
                @else
                <h1>Không tìm thấy kết quả nào với  <i><b>{{$key}}</b></i></h1>
                @endif
                <br><br>
              <div class="row">
                <div class="col-md-8">
                  @foreach ($post as $item)
                  <article class="post post-5 clearfix">
                    <div class="entry-media"><a href="{{$item->image}}" class="prettyPhoto"><img src="{{$item->image}}" style="width:340px; height:310px" alt="Foto" class="img-responsive"/></a></div>
                    <div class="entry-main">
                      <div class="entry-header"><span class="category color-4">chi tiết</span>
                      <h2 class="entry-title"><a href="{{route('detail_price', ['slug' => $item->slug])}}">{!!App\Helpers\Theme::truncateWords(strip_tags($item->title), 30)!!}</a></h2>
                      </div>
                      <div class="entry-meta"><span class="entry-meta__item">By<a href="{{route('detail_price', ['slug' => $item->slug])}}" class="entry-meta__slug"> greenhouse</a></span><span class="entry-meta__item"><a href="{{route('detail_price', ['slug' => $item->slug])}}" class="entry-meta__slug"></a></span><span class="entry-meta__item"><i class="icon pe-7s-comment"></i><a href="{{route('detail_price', ['slug' => $item->slug])}}" class="entry-meta__slug"></a></span></div>
                      <div class="entry-content">
                        <p>{!!App\Helpers\Theme::truncateWords(strip_tags($item->body), 98)!!}</p>
                      </div>
                      <div class="entry-footer"><a href="{{route('detail_price', ['slug' => $item->slug])}}" class="btn-slug">Đọc tiếp</a></div>
                    </div>
                  </article>
                  @endforeach
                  <div class="wrap-pagination">
                    <ul class="pagination">
                      {{-- <li><a href="#">previous</a></li> --}}
                      <li class="active">{{$post->links()}}</li>
                      {{-- <li><a href="#">Next</a></li> --}}
                    </ul>
                  </div>
                </div>
                <div class="col-md-4">
                  <aside class="sidebar">
                    <div class="widget">
                      <form id="search-global-form" method="get" class="form-search" action="{{route('posts.search')}}">
                        <div class="form-group has-feedback">
                          <input type="text" name="s" placeholder="Tìm kiếm dịch vụ của chúng tôi" class="form-search__input form-control">
                          <button class="form-search__btn icon pe-7s-search form-control-feedback"></button>
                        </div>
                      </form>
                    </div>
                    @include('themes.mspace.home.sections.follow')
                    <section class="widget">
                      <h2 class="widget-title ui-title-inner text-right">Dịch vụ</h2>
                      <div class="decor-right"></div>
                      <div class="widget-content">
                        <ul class="list list-mark-1 list-mark-1_mod-a">
                          @foreach ($project_categoris as $project_categori)
                        <li><a href="{{route('cate_dichvu',$project_categori->slug)}}">{{$project_categori->name}}</a></li>
                          @endforeach
                        </ul>
                      </div>
                    </section>
                    <section class="widget">
                      <h2 class="widget-title ui-title-inner text-right">Tin tức mới</h2>
                      <div class="decor-right"></div>
                      <div class="widget-content">
                        @foreach ($all_posts_new as $item1)
                        <article class="post post-3 post-3_mod-a clearfix">
                          <div class="entry-media"><a href="{{$item1->image}}" class="prettyPhoto"><img style="width:100px; height:100px" src="{{$item1->image}}" alt="Foto" class="img-responsive"/></a></div>
                          <div class="entry-main">
                            <div class="entry-header">
                            <h2 class="entry-title"><a href="{{route('detail_price', ['slug' => $item1->slug])}}">{{$item1->title}}</a></h2>
                            </div>
                            @if ($item1->project_category_id == 1)
                            <div class="entry-meta"><span class="category color-4">đọc tiếp</span><span class="entry-meta__item"><i class="icon pe-7s-comment"></i><a href="{{route('detail_price', ['slug' => $item1->slug])}}" class="entry-meta__slug">greenhouse</a></span></div>
                            @endif
                            @if ($item1->project_category_id == 2)
                            <div class="entry-meta"><span class="category color-7">đọc tiếp</span><span class="entry-meta__item"><i class="icon pe-7s-comment"></i><a href="{{route('detail_price', ['slug' => $item1->slug])}}" class="entry-meta__slug">greenhouse</a></span></div>
                            @endif
                            @if ($item1->project_category_id == 3)
                            <div class="entry-meta"><span class="category color-4">đọc tiếp</span><span class="entry-meta__item"><i class="icon pe-7s-comment"></i><a href="{{route('detail_price', ['slug' => $item1->slug])}}" class="entry-meta__slug">greenhouse</a></span></div>
                            @endif
                            @if ($item1->project_category_id == 4)
                            <div class="entry-meta"><span class="category color-12">đọc tiếp</span><span class="entry-meta__item"><i class="icon pe-7s-comment"></i><a href="{{route('detail_price', ['slug' => $item1->slug])}}" class="entry-meta__slug">greenhouse</a></span></div>
                            @endif
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
