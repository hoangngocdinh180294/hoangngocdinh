          <section class="section-default wow">
            <div class="container">
              <div class="row">
                <div class="col-xs-12">
                  <div class="clearfix">
                    <h2 class="ui-title-block"><span class="ui-title-block__subtitle">Bảng giá</span><span class="text-uppercase">Green house</span></h2><a href="{{route('price')}}" class="btn-link btn-link_under-title">Xem toàn bộ</a>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12">
                  <div class="wrap-posts">
                      @php $index = 0; @endphp
                    @foreach ($prince as $item)
                      @php $index ++; @endphp
                      @if ($index == 1)
                      <article class="post post-2 post-2_mod-e clearfix">
                        <div class="entry-media"><a href="{{$item->image}}" class="prettyPhoto"><img src="{{$item->image}}" alt="Foto" style="width:360px; height:200px" class="img-responsive"/></a><a style="cursor: pointer" href="{{route('detail_price', $item->slug)}}"><span class="label bg-3">đoc tiếp</span></a>
                        </div>
                        <div class="entry-main">
                          <div class="entry-header">
                          <h2 class="entry-title text-uppercase">{!!App\Helpers\Theme::truncateWords(strip_tags($item->title), 60)!!}</h2>
                          </div>
                        <div class="entry-meta"><span class="entry-meta__item">Giá:<a href="{{route('detail_price',$item->slug)}}" class="entry-meta__link"> {{$item->price}}</a></span><span class="entry-meta__item"><a href="{{route('detail_price',$item->slug)}}" class="entry-meta__link">Ngày đăng:</a></span><span class="entry-meta__item"><i class="icon pe-7s-comment"></i><a href="{{route('detail_price',$item->slug)}}" class="entry-meta__link">{{$item->created_at->format('d/m/Y')}}</a></span></div>
                        </div>
                      </article>
                      @endif
                      @if($index == 2)
                      <article class="post post-2 post-2_mod-e clearfix">
                        <div class="entry-main">
                          <div class="entry-header">
                          <h2 class="entry-title text-uppercase">{!!App\Helpers\Theme::truncateWords(strip_tags($item->title), 60)!!}</h2>
                          </div>
                          <div class="entry-meta"><span class="entry-meta__item">Giá:<a href="{{route('detail_price',$item->slug)}}" class="entry-meta__link"> {{$item->price}}</a></span><span class="entry-meta__item"><a href="{{route('detail_price',$item->slug)}}" class="entry-meta__link">Ngày đăng:</a></span><span class="entry-meta__item"><i class="icon pe-7s-comment"></i><a href="{{route('detail_price',$item->slug)}}" class="entry-meta__link">{{$item->created_at->format('d/m/Y')}}</a></span></div>
                        </div>
                        <div class="entry-media"><a href="{{$item->image}}" class="prettyPhoto"><img src="{{$item->image}}" alt="Foto" style="width:360px; height:200px" class="img-responsive"/></a><a style="cursor: pointer" href="{{route('detail_price', $item->slug)}}"><span class="label bg-6">đọc tiếp</span></a>
                        </div>
                      </article>
                      @endif
                      @if($index == 3)
                      <article class="post post-2 post-2_mod-e clearfix">
                        <div class="entry-media"><a href="{{$item->image}}" class="prettyPhoto"><img src="{{$item->image}}" alt="Foto" style="width:360px;height:200px" class="img-responsive"/></a><a  style="cursor: pointer"href="{{route('detail_price', $item->slug)}}"><span class="label bg-13">đọc tiếp</span></a>
                        </div>
                        <div class="entry-main">
                          <div class="entry-header">
                          <h2 class="entry-title text-uppercase">{!!App\Helpers\Theme::truncateWords(strip_tags($item->title), 60)!!}</h2>
                          </div>
                        <div class="entry-meta"><span class="entry-meta__item">Giá:<a href="{{route('detail_price',$item->slug)}}" class="entry-meta__link"> {{$item->price}}</a></span><span class="entry-meta__item"><a href="{{route('detail_price',$item->slug)}}" class="entry-meta__link">Ngày đăng:</a></span><span class="entry-meta__item"><i class="icon pe-7s-comment"></i><a href="{{route('detail_price',$item->slug)}}" class="entry-meta__link">{{$item->created_at->format('d/m/Y')}}</a></span></div>
                        </div>
                      </article>
                      @endif
                      @if($index == 4)
                      <article class="post post-2 post-2_mod-e clearfix">
                        <div class="entry-media"><a href="{{$item->image}}" class="prettyPhoto"><img src="{{$item->image}}" alt="Foto" style="width:360px;height:200px" class="img-responsive" style="cursor: pointer"/></a><a href="{{route('detail_price', $item->slug)}}"><span class="label bg-5">đọc tiếp</span></a>
                        </div>
                        <div class="entry-main">
                          <div class="entry-header">
                          <h2 class="entry-title text-uppercase">{!!App\Helpers\Theme::truncateWords(strip_tags($item->title), 60)!!}</h2>
                          </div>
                        <div class="entry-meta"><span class="entry-meta__item">Giá:<a href="{{route('detail_price',$item->slug)}}" class="entry-meta__link"> {{$item->price}}</a></span><span class="entry-meta__item"><a href="{{route('detail_price',$item->slug)}}" class="entry-meta__link">Ngày đăng:</a></span><span class="entry-meta__item"><i class="icon pe-7s-comment"></i><a href="{{route('detail_price',$item->slug)}}" class="entry-meta__link">{{$item->created_at->format('d/m/Y')}}</a></span></div>
                        </div>
                      </article>
                      @endif
                      @if($index == 5)
                      <article class="post post-2 post-2_mod-e clearfix">
                        <div class="entry-main">
                          <div class="entry-header">
                          <h2 class="entry-title text-uppercase">{!!App\Helpers\Theme::truncateWords(strip_tags($item->title), 60)!!}</h2>
                          </div>
                          <div class="entry-meta"><span class="entry-meta__item">Giá:<a href="{{route('detail_price',$item->slug)}}" class="entry-meta__link"> {{$item->price}}</a></span><span class="entry-meta__item"><a href="{{route('detail_price',$item->slug)}}" class="entry-meta__link">Ngày đăng:</a></span><span class="entry-meta__item"><i class="icon pe-7s-comment"></i><a href="{{route('detail_price',$item->slug)}}" class="entry-meta__link">{{$item->created_at->format('d/m/Y')}}</a></span></div>
                        </div>
                        <div class="entry-media"><a href="{{$item->image}}" class="prettyPhoto"><img src="{{$item->image}}" alt="Foto" style="width:360px;height:200px" class="img-responsive" style="cursor: pointer"/></a><a href="{{route('detail_price', $item->slug)}}"><span class="label bg-7">đọc tiếp</span></a></div>
                      </article>
                      @endif
                      @if($index == 6)
                      <article class="post post-2 post-2_mod-e clearfix">
                        <div class="entry-media"><a href="{{$item->image}}" class="prettyPhoto"><img src="{{$item->image}}" alt="Foto" style="width:360px;height:200px" class="img-responsive" style="cursor: pointer"/></a><a href="{{route('detail_price', $item->slug)}}"><span class="label bg-4">đọc tiếp</span></a>
                        </div>
                        <div class="entry-main">
                          <div class="entry-header">
                          <h2 class="entry-title text-uppercase">{!!App\Helpers\Theme::truncateWords(strip_tags($item->title), 60)!!}</h2>
                          </div>
                        <div class="entry-meta"><span class="entry-meta__item">Giá:<a href="{{route('detail_price',$item->slug)}}" class="entry-meta__link"> {{$item->price}}</a></span><span class="entry-meta__item"><a href="{{route('detail_price',$item->slug)}}" class="entry-meta__link">Ngày đăng:</a></span><span class="entry-meta__item"><i class="icon pe-7s-comment"></i><a href="{{route('detail_price',$item->slug)}}" class="entry-meta__link">{{$item->created_at->format('d/m/Y')}}</a></span></div>
                        </div>
                      </article>
                      @endif
                    @endforeach
                    
                  </div>
                </div>
              </div>
            </div>
          </section>
