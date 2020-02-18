<div class="col-12 col-md-4">
    <div class="item-post wow flipInY" data-wow-delay="0.5s">
        <a class="img-box" href="{{route('posts.detail', ['slug' => $post->slug])}}" title="{{$post->title}}"> 
            <img src="{{$post->image}}"  class="img-responsive" onerror="this.src='{{App\Helpers\Theme::assetsPath('images/du-an-noimg.png')}}'" />
        </a>
        <a class="title-box" href="{{route('posts.detail', ['slug' => $post->slug])}}" title="{{$post->title}}">
            <h3>{{$post->title}}</h3>
        </a>
        <div class="time-box"><i class="far fa-clock"></i> {{$post->created_at->format('d/m/Y')}} </div>
        <div class="desc-box">
            @if(!empty($post->excerpt))
                {{ Str::words($post->excerpt, 21, '...')}}
            @else
                {{ Str::words($post->body, 21, '...')}}
            @endif
        </div>
        <a class="read-more" href="{{route('posts.detail', ['slug' => $post->slug])}}" title="{{$post->title}}">Xem thêm ></a>
    </div>
</div>