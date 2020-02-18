@extends('themes.mspace.layouts.main')
@section('after_css')
<link rel="stylesheet" href="{{App\Helpers\Theme::assetsPath('css/project/list_tag.css')}}" />

@endsection
@section('content')
<section class="sec-padding section-light">
    <div class="container">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-2">
                <div class="tags pd-25">
                <div class="clearfix"></div>
                <div class="col-divider-margin-5"></div>
                <span><img width=20px; height=20px src="/images/icon-tags.png">Tags</span>
                @foreach ($list as $l)
                <div style="margin-top:10px" class="list-style-2">
                    <div class="icon"><i class="fa fa-angle-right"></i></div>
                    <div class="text"><a href="/tag/list/{{$l->id}}">{{ json_decode($l->name,true)["en"] }}</a></div>
                </div>
                <!--end item-->
                @endforeach</div>

            </div>
            <div class="col-md-10">
               <div class="result-tag pd-25">
               <div class="char">
                    <h1>
                        <span class="text-info">
                            Tìm thấy {{$count}} kết quả phù hợp</span>
                        <span style="color:chocolate">về </span><span>{{json_decode($name,true)["en"]}}</span>
                    </h1>
                </div>
                @foreach($tag_post as $tag)
                <div class="col-md-3 col-sm-12 col-xs-12 bmargin"> <a href="/{{$tag->slug}}"><img width="100%"
                            src="{{$tag->image}}" class="img-responsive" /></a>
                        <div class="text-box padding-top-5">
                            <h4 class=" raleway"><a href="/{{$tag->slug}}">{{Str::words($tag->title,9)}}</a></h4>
                            <span> {{ \Carbon\Carbon::parse($tag->update_at)->format('d/m/Y')}}</span>
                        </div>
                </div>
                {{-- end item --}}
                @endforeach</div>
            </div>
        </div>
    </div>
    <div style=" margin-left:1000px;">{{ $tag_post->links() }}</div>
</section>

@endsection
