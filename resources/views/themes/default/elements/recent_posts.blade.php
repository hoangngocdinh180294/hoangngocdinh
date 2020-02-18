<div class="recent-post-content">
    @foreach ($recentPosts as $item)
        <div class="post-item">
            <div class="post-item-prepend">
                <span>{{ \Carbon\Carbon::parse($item->created_at)->format('d/m')}}</span>
                <span class="cat-icon">{{\App\Helpers\Base::buildCategoryIcon($item)}}</span>
            </div>
            <div class="post-item-content">
                <a href="{{route('posts.detail', ['slug' => $item->slug])}}">{{ $item->title}}</a>
            </div>
        </div>
    @endforeach
</div>
