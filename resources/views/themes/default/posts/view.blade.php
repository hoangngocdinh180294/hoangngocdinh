@extends('layouts.main')
@section('title')
{{$post->title}}
@stop

@section('seo_tags')
<meta name="description" content="{{ $post->meta_description or Str::words($post->post, 75,'...') }}"/>
<meta name="keywords" content="{{ $post->meta_keywords or $post->post }}"/>
@stop

@section('before-nav')
    @include('elements.before_header')
@stop

@section('content')
    <section class="mt-5">
       <div class="container">
           <div class="row">
                <div class="col-md-8">
                    <div class="wrap-post-title">
                        <h2 class="post-main-title">{{$post->title}}</h2>
                        <div class="post-date">{{ \Carbon\Carbon::parse($post->created_at)->format('d/m/Y')}}</div>
                    </div>
                    <div class="wrap-post-content mt-3">
                        {!! $post->body !!}
                    </div>
                </div>
                <div class="col-md-4">
                    @include('themes.default.elements.sidebar')
                </div>
           </div>
       </div>
    </section>
@stop
