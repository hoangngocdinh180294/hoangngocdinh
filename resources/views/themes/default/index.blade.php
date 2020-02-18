@extends('layouts.main', ['body_class' => 'home-body'])

@php
    $slides = [
        ['src' => asset('images/slides/1.jpg')],
        ['src' => asset('images/slides/2.jpg')],
        ['src' => asset('images/slides/3.jpg')]
    ]
@endphp

@section('before-nav')
<div class="before-nav-wrap-slide" data-slides="{{json_encode($slides)}}">
    <div class="before-nav-wrap">
        <div class="before-nav-content">
            <h1 class="logo">MSPACE.VN</h1>
            <div class="slogan"> Thách thức mọi không gian </div>
            <a class="btn btn-register" > Đăng ký tư vấn miễn phí </a>
        </div>
    </div>
</div>
@stop

@section('content')
@include('themes.default.sections.services')
{{--
<section class="service">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="section-title">Công trình chúng tôi đã thực hiện</h2>
            </div>

            @for($i = 0; $i < 12; $i++)
                <div class="col-12 col-md-3 mb-3">
                    <div class="card">
                        <img class="card-img-top" src="https://via.placeholder.com/300x100.png?text=hi+a" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text">nha anh D</p>
                        </div>
                    </div>
                </div>
            @endfor

        </div>
    </div>
</section> --}}

@include('themes.default.sections.posts')
@include('themes.default.sections.testimonial')
@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/vegas/2.4.4/vegas.min.css">
@stop
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vegas/2.4.4/vegas.min.js"></script>
    <script src="{{mix('themes/default/js/home.js')}}"></script>
@stop
