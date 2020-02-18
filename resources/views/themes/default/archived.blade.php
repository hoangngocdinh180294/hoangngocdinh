@extends('layouts/main')
@section('content')
    <section class="fake-body">
        <div class="container container-mb">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <h2>DỰ ÁN TIÊU BIỂU</h2>
                    @for($i = 0; $i < 7; $i++)
                    <div class="hot-project">
                        <h3>THIẾT KẾ BIỆT THỰ SÂN VƯỜN ECOPARK – THÁCH THỨC MỌI GIỚI HẠN</h3>
                        <span class="info-project">
                            Ranh giới giữa trong và ngoài đã bị xóa nhòa tại biệt thự sân vườn Ecopark. Không còn đóng
                            khung các không gian sống trong bốn bức tường hoặc những cái “hộp” ngột ngạt.
                            Kiến trúc sư Nội Thất Xanh thiết kế phá bỏ những rào cản để mọi thành viên có thể cảm nhận
                            mình đang trở về với cội nguồn, xích lại gần hơn với thiên nhiên.
                        </span>
                        <div class="get-more">
                            <a href="" class="btn btn-get-more">Xem thêm</a>
                        </div>
                        <figure>
                            <img class="card-img-bottom" src="https://via.placeholder.com/700x350.png?text=hi+a" alt="Card image cap">
                        </figure>
                    </div>
                    @endfor()
                    <div class="load-more">
                        <button class="btn btn-load-more">LOAD MORE</button>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">

                    @include('themes.default.elements.sidebar')
                </div>
            </div>
        </div>
    </section>
@stop()
