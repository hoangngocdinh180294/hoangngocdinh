<div class="col-12 col-md-6 col-lg-3">
    <a class="item-project" href="{{route('detail_project',$pro->slug)}}" title="{{$pro->title}}">
        <img src="{{$pro['default_image']['image']}}" alt="" onerror="this.src='{{App\Helpers\Theme::assetsPath('images/du-an-noimg.png')}}'">
        <div class="bg-filter">&nbsp; </div>
        <div class="title text-center"> {{$pro->title}} </div>
        <div class="border-yellow">&nbsp;</div>
    </a>
</div>