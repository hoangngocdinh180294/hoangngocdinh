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
                <h1 class="ui-title-page">Tất cả dịch vụ Greenhouse</h1>
              </div>
            </div>
          </div>
          <div class="breadcrumb-wrap">
            <ol class="breadcrumb">
              <li><a href="{{route('home')}}">Trang chủ</a></li>
              <li class="active">Dịch vụ</li>
            </ol>
          </div>
          <div class="section-default">
            <div class="container">
              <div class="row">
                <div class="col-md-8">
                  @foreach ($project as $item)
                  <article class="post post-5 clearfix">
                    <div class="entry-media"><a href="{{$item->projectimages[0]->image}}" class="prettyPhoto"><img src="{{$item->projectimages[0]->image}}" style="width:340px; height:310px" alt="Foto" class="img-responsive"/></a></div>
                    <div class="entry-main">
                      <div class="entry-header"><span class="category color-4">entertainment</span>
                      <h2 class="entry-title"><a href="{{route('detail_project',$item->slug)}}">{!!App\Helpers\Theme::truncateWords(strip_tags($item->title), 30)!!}</a></h2>
                      </div>
                      <div class="entry-meta"><span class="entry-meta__item">By<a href="{{route('detail_project',$item->slug)}}" class="entry-meta__slug"> greenhouse</a></span><span class="entry-meta__item"><a href="{{route('detail_project',$item->slug)}}" class="entry-meta__slug">15 mins ago</a></span><span class="entry-meta__item"><i class="icon pe-7s-comment"></i><a href="{{route('detail_project',$item->slug)}}" class="entry-meta__slug">23</a></span></div>
                      <div class="entry-content">
                        <p>{!!App\Helpers\Theme::truncateWords(strip_tags($item->body), 98)!!}</p>
                      </div>
                      <div class="entry-footer"><a href="{{route('detail_project',$item->slug)}}" class="btn-slug">Tiếp tục đọc</a></div>
                    </div>
                  </article>
                  @endforeach
                 
                  <div class="wrap-pagination">
                    <ul class="pagination">
                      <!-- <li><a href="#">previous</a></li> -->
                      <li class="active">{{$project->links()}}</li>
                     
                      <!-- <li><a href="#">Next</a></li> -->
                    </ul>
                  </div>
                </div>
                <div class="col-md-4">
                  <aside class="sidebar">
                    <div class="widget">
                      <form id="search-global-form" method="get" class="form-search" action="{{route('posts.search')}}">
                        <div class="form-group has-feedback">
                          <input name="s" type="text" placeholder="Tìm kiếm dịch vụ của chúng tôi" class="form-search__input form-control">
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
                          @foreach ($cate as $project_categori)
                        <li><a href="category.html">{{$project_categori->name}}</a></li>
                          @endforeach
                      
                        </ul>
                      </div>
                    </section>
                    <section class="widget">
                      <h2 class="widget-title ui-title-inner text-right">Dịch vụ mới</h2>
                      <div class="decor-right"></div>
                      
                    </section>
                    <div class="widget"><a href="home.html" class="banner"><img src="{{App\Helpers\Theme::assetsPath('assets/media/content/banners/3.jpg')}}" alt="banner" style="width:336px; height:280px" class="img-responsive center-block"></a></div>
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
                    <section class="widget">
                      <h2 class="widget-title ui-title-inner text-right">bài viết mới</h2>
                      <div class="decor-right"></div>
                      <div class="widget-content">
                        <ul class="nav nav-tabs nav-tabs_sm nav-tabs_primary">
                          <li class="active"><a href="#tab-2-1" data-toggle="tab">Tuần trước</a></li>
                          <li><a href="#tab-2-2" data-toggle="tab">Mới nhất</a></li>
                          <li><a href="#tab-2-3" data-toggle="tab">Điểm cao nhất</a></li>
                        </ul>
                        <div class="tab-content">
                          <div id="tab-2-1" class="tab-pane fade in active">
                            <article class="post post-3 post-3_mod-e clearfix">
                              <div class="entry-media"><a href="{{App\Helpers\Theme::assetsPath('assets/media/content/post/100x100/2.jpg')}}" class="prettyPhoto"><img src="{{App\Helpers\Theme::assetsPath('assets/media/content/post/100x100/2.jpg')}}" alt="Foto" class="img-responsive"/></a></div>
                              <div class="entry-main">
                                <div class="entry-header">
                                  <h2 class="entry-title"><a href="#">Aliquip exea comod rure nsewuat duis</a></h2>
                                </div>
                                <div class="entry-meta"><span class="category color-7">health</span><span class="entry-meta__item"><i class="icon pe-7s-comment"></i><a href="#" class="entry-meta__slug">12</a></span></div>
                              </div>
                            </article>
                            <article class="post post-3 post-3_mod-e clearfix">
                              <div class="entry-media"><a href="{{App\Helpers\Theme::assetsPath('assets/media/content/post/100x100/23.jpg')}}" class="prettyPhoto"><img src="{{App\Helpers\Theme::assetsPath('assets/media/content/post/100x100/23.jpg')}}" alt="Foto" class="img-responsive"/></a></div>
                              <div class="entry-main">
                                <div class="entry-header">
                                  <h2 class="entry-title"><a href="#">Perspiciatis unde omnist enatus error sit</a></h2>
                                </div>
                                <div class="entry-meta"><span class="category color-5">world</span><span class="entry-meta__item"><i class="icon pe-7s-comment"></i><a href="#" class="entry-meta__slug">12</a></span></div>
                              </div>
                            </article>
                            <article class="post post-3 post-3_mod-e clearfix">
                              <div class="entry-media"><a href="{{App\Helpers\Theme::assetsPath('assets/media/content/post/100x100/4.jpg')}}" class="prettyPhoto"><img src="{{App\Helpers\Theme::assetsPath('assets/media/content/post/100x100/4.jpg')}}" alt="Foto" class="img-responsive"/></a></div>
                              <div class="entry-main">
                                <div class="entry-header">
                                  <h2 class="entry-title"><a href="#">Volupta tem acusa ntium dolore me laud</a></h2>
                                </div>
                                <div class="entry-meta"><span class="category color-12">sports</span><span class="entry-meta__item"><i class="icon pe-7s-comment"></i><a href="#" class="entry-meta__slug">12</a></span></div>
                              </div>
                            </article>
                            <article class="post post-3 post-3_mod-e clearfix">
                              <div class="entry-media"><a href="{{App\Helpers\Theme::assetsPath('assets/media/content/post/100x100/5.jpg')}}" class="prettyPhoto"><img src="{{App\Helpers\Theme::assetsPath('assets/media/content/post/100x100/5.jpg')}}" alt="Foto" class="img-responsive"/></a></div>
                              <div class="entry-main">
                                <div class="entry-header">
                                  <h2 class="entry-title"><a href="#">Aliquip exea comod rure nsewuat duis</a></h2>
                                </div>
                                <div class="entry-meta"><span class="category color-2">technology</span><span class="entry-meta__item"><i class="icon pe-7s-comment"></i><a href="#" class="entry-meta__slug">12</a></span></div>
                              </div>
                            </article>
                          </div>
                          <div id="tab-2-2" class="tab-pane fade">
                            <article class="post post-3 post-3_mod-e clearfix">
                              <div class="entry-media"><a href="{{App\Helpers\Theme::assetsPath('assets/media/content/post/100x100/23.jpg')}}" class="prettyPhoto"><img src="{{App\Helpers\Theme::assetsPath('assets/media/content/post/100x100/23.jpg')}}" alt="Foto" class="img-responsive"/></a></div>
                              <div class="entry-main">
                                <div class="entry-header">
                                  <h2 class="entry-title"><a href="#">Perspiciatis unde omnist enatus error sit</a></h2>
                                </div>
                                <div class="entry-meta"><span class="category color-5">world</span><span class="entry-meta__item"><i class="icon pe-7s-comment"></i><a href="#" class="entry-meta__slug">12</a></span></div>
                              </div>
                            </article>
                            <article class="post post-3 post-3_mod-e clearfix">
                              <div class="entry-media"><a href="{{App\Helpers\Theme::assetsPath('assets/media/content/post/100x100/4.jpg')}}" class="prettyPhoto"><img src="{{App\Helpers\Theme::assetsPath('assets/media/content/post/100x100/4.jpg')}}" alt="Foto" class="img-responsive"/></a></div>
                              <div class="entry-main">
                                <div class="entry-header">
                                  <h2 class="entry-title"><a href="#">Volupta tem acusa ntium dolore me laud</a></h2>
                                </div>
                                <div class="entry-meta"><span class="category color-12">sports</span><span class="entry-meta__item"><i class="icon pe-7s-comment"></i><a href="#" class="entry-meta__slug">12</a></span></div>
                              </div>
                            </article>
                          </div>
                          <div id="tab-2-3" class="tab-pane fade">
                            <article class="post post-3 post-3_mod-e clearfix">
                              <div class="entry-media"><a href="{{App\Helpers\Theme::assetsPath('assets/media/content/post/100x100/5.jpg')}}" class="prettyPhoto"><img src="{{App\Helpers\Theme::assetsPath('assets/media/content/post/100x100/5.jpg')}}" alt="Foto" class="img-responsive"/></a></div>
                              <div class="entry-main">
                                <div class="entry-header">
                                  <h2 class="entry-title"><a href="#">Aliquip exea comod rure nsewuat duis</a></h2>
                                </div>
                                <div class="entry-meta"><span class="category color-2">technology</span><span class="entry-meta__item"><i class="icon pe-7s-comment"></i><a href="#" class="entry-meta__slug">12</a></span></div>
                              </div>
                            </article>
                            <article class="post post-3 post-3_mod-e clearfix">
                              <div class="entry-media"><a href="{{App\Helpers\Theme::assetsPath('assets/media/content/post/100x100/2.jpg')}}" class="prettyPhoto"><img src="{{App\Helpers\Theme::assetsPath('assets/media/content/post/100x100/2.jpg')}}" alt="Foto" class="img-responsive"/></a></div>
                              <div class="entry-main">
                                <div class="entry-header">
                                  <h2 class="entry-title"><a href="#">Aliquip exea comod rure nsewuat duis</a></h2>
                                </div>
                                <div class="entry-meta"><span class="category color-7">health</span><span class="entry-meta__item"><i class="icon pe-7s-comment"></i><a href="#" class="entry-meta__slug">12</a></span></div>
                              </div>
                            </article>
                          </div>
                        </div>
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
