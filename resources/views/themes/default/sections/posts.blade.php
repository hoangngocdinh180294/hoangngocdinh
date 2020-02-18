<section class="news">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="section-title">Bài viết mới</h2>
            </div>

            @foreach ($posts as $item)
                <div class="col-12 col-md-6 mb-3">
                    <div class="news-item">
                        <a href="{{route('posts.detail', ['slug' => $item->slug])}}" class="item-wrap-img" style="background-image:url('{{ $item->image }}')">
                            <span>Xem chi tiết</span>
                        </a>
                        <div class="item-body">
                            <h3><a href="{{route('posts.detail', ['slug' => $item->slug])}}">{{ $item->title}}</a></h3>
                            <p class="item-text">{{$item->excerpt}}</p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
