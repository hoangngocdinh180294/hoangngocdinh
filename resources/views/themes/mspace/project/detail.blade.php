@if($setting_menu->dich_vu == 1)
@extends('themes.mspace.layouts.app')
@section('seo_support')
    <title>{{$project->title}}</title>
    <meta property="og:title" name="title" content="{{$project->title}}">
    <meta property="og:image" content="{{$project['projectimages']->first()['image']}}" />
    <meta name="description" content="{{Str::words($project->body, 25,'...')}}">
    <meta name="keywords" content="{{$project->meta_keywords}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
@endsection

@section('content')
<div class="wrap-nav">
    @include('themes.mspace.home.sections.menu')
    <div class="section-title section-bg">
        <div class="section__inner">
            <h1 class="ui-title-page">Chi tiết dịch vụ</h1>
        </div>
    </div>
</div>
<div class="breadcrumb-wrap">
    <ol class="breadcrumb">
        <li><a href="{{route('home')}}">Trang chủ</a></li>
        <li><a href="{{route('project')}}">Dịch vụ</a></li>
        <li class="active">{{$project->title}}</li>
    </ol>
</div>
<div class="section-type-k">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <article $project class="post post-full clearfix">
                    <div class="entry-media"><a href="{{$project->projectimages[0]->image}}" class="prettyPhoto"><img src="{{$project->projectimages[0]->image}}"
                                alt="Foto" class="img-responsive"></a></div>
                    <div class="entry-main">
                        <div class="entry-header">
                            <h2 class="entry-title">{{$project->title}}</h2>
                        </div>
                        <div class="entry-meta"><span class="entry-meta__item">{{$project->created_at->format('d/m/Y')}}</span></div>
                        <div class="entry-content">
                            {!! $project->body !!}
                        </div>
                    </div>
                    <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0&appId=447109492769330&autoLogAppEvents=1"></script>
<div class="fb-comments" data-href="{{route('detail_project',$project->slug)}}" data-width="" data-numposts="5"></div>
                </article>



            </div>
            <div class="col-md-4">
                <aside class="sidebar">
                    <div class="widget">
                        <form id="search-global-form" method="get" class="form-search" action="{{route('posts.search')}}">
                            <div class="form-group has-feedback">
                                <input name="s" type="text" placeholder="Search any news, article"
                                    class="form-search__input form-control">
                                <button class="form-search__btn icon pe-7s-search form-control-feedback"></button>
                            </div>
                        </form>
                    </div>
                    @include('themes.mspace.home.sections.follow')
                    <section class="widget">
                        <h2 class="widget-title ui-title-inner text-right">Chuyên mục</h2>
                        <div class="decor-right"></div>
                        <div class="widget-content">
                            <ul class="list list-mark-1 list-mark-1_mod-a">
                            @foreach($cate as $item)
                                <li><a href="{{route('detail_project',$item->slug)}}">{{$item->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </section>
                    <section class="widget">
                        <h2 class="widget-title ui-title-inner text-right">Dịch vụ khác</h2>
                        <div class="decor-right"></div>
                        <div class="widget-content">
                            @foreach($projectother as $news)
                            <article class="post post-3 post-3_mod-a clearfix">
                                <div class="entry-media"><a href="{{$news->image}}"
                                        class="prettyPhoto"><img src="{{$news->image}}"
                                            alt="Foto" class="img-responsive" /></a></div>
                                <div class="entry-main">
                                    <div class="entry-header">
                                        <h2 class="entry-title"><a href="{{route('detail_project',$news->slug)}}">{{$news->title}}</a></h2>
                                    </div>
                                    <div class="entry-meta"><span class="category color-4">Chi tiết</span></div>
                                </div>
                            </article>
                            @endforeach
                        </div>
                    </section>
                    
                    <div class="widget"><a href="{{route('home')}}" class="banner"><img src="{{App\Helpers\Theme::assetsPath('assets/media/content/banners/3.jpg')}}" alt="banner" style="width:336px; height:280px" class="img-responsive center-block"></a></div>
                   
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
