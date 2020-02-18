
          <div class="section-default">
            <div class="container">
              <div class="row">
                <div class="col-md-8">
                  <div class="row">
                    <div class="col-md-6 wow">
                      <div class="title-category clearfix">
                        <h2 class="title-category__title ui-title-inner color-4">tin tức</h2><span class="title-category__category">mới nhất ...</span>
                      </div>
                      <div class="decor-right bg-4"></div>
                      @foreach($post_1 as $item)
                      <article class="post post-2 post-2_mod-c clearfix">
                        <div class="entry-media"><a href="{{$item->image}}" class="prettyPhoto"><img src="{{$item->image}}" alt="Foto" style="width:360px; height:240px" class="img-responsive"/></a>
                        </div>
                        <div class="entry-main">
                          <div class="entry-header">
                          <a href="{{route('posts.detail', ['slug' => $item->slug])}}"><h2 class="entry-title text-uppercase">{!!App\Helpers\Theme::truncateWords(strip_tags($item->title), 35)!!}</h2></a>
                          </div>
                          <div class="entry-meta"><span class="entry-meta__item">By<a href="{{route('home')}}" class="entry-meta__link"> greenhouse</a></span><span class="entry-meta__item">{{$item->created_at->format('d/m/Y')}}</span></div>
                          <div class="entry-content">
                            <p>{!!App\Helpers\Theme::truncateWords(strip_tags($item->excerpt), 140)!!}</p>
                          </div>
                          <div class="entry-footer"><a href="{{route('posts.detail', ['slug' => $item->slug])}}" class="btn-link">Xem thêm</a></div>
                        </div>
                      </article>
                      @endforeach
                    </div>
                    <div class="col-md-6 wow">
                      <div class="title-category clearfix">
                        <h2 class="title-category__title ui-title-inner color-5">sự kiện</h2><span class="title-category__category">Nổi bật ...</span>
                      </div>
                      <div class="decor-right bg-5"></div>
                      @foreach($post_2 as $item2)
                      <article class="post post-2 post-2_mod-c clearfix">
                        <div class="entry-media"><a href="{{$item2->image}}" class="prettyPhoto"><img src="{{$item2->image}}" alt="Foto" style="width:360px; height:240px" class="img-responsive"/></a>
                        </div>
                        <div class="entry-main">
                          <div class="entry-header">
                          <a href="{{route('posts.detail', ['slug' => $item2->slug])}}" class="btn-link"><h2 class="entry-title text-uppercase">{!!App\Helpers\Theme::truncateWords(strip_tags($item2->title), 35)!!}</h2></a>
                          </div>
                          <div class="entry-meta"><span class="entry-meta__item">By<a href="{{route('home')}}" class="entry-meta__link"> greenhouse</a></span><span class="entry-meta__item">{{$item2->created_at->format('d/m/Y')}}</span></div>
                          <div class="entry-content">
                            <p>{!!App\Helpers\Theme::truncateWords(strip_tags($item2->excerpt), 140)!!}</p>
                          </div>
                          <div class="entry-footer"><a href="{{route('posts.detail', ['slug' => $item2->slug])}}" class="btn-link">Xem thêm</a></div>
                        </div>
                      </article>
                      @endforeach
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-12">
                      <div class="section-type-d wow"><a href="home.html" class="banner"><img src="{{App\Helpers\Theme::assetsPath('assets/media/content/banners/2.jpg')}}" alt="banner" class="img-responsive center-block"></a></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 wow">
                    @foreach($posts as $post)
                      <article class="col-md-6 post post-3 post-3_mod-c clearfix">
                        <div class="entry-media"><a href="{{$post->image}}" class="prettyPhoto"><img src="{{$post->image}}" alt="Foto" style="width:100px; height:100px" class="img-responsive"/></a></div>
                        <div class="entry-main">
                          <div class="entry-header">
                            <h2 class="entry-title"><a href="{{route('posts.detail', ['slug' => $post->slug])}}">{{$post->title}}</a></h2>
                          </div>
                          </div>
                      </article>
                    @endforeach
                    </div>
                   </div>
                </div>
                <div class="col-md-4">
                  <aside class="sidebar">
                    <section class="widget wow">
                      <h2 class="widget-title ui-title-inner text-right">Dịch vụ</h2>
                      <div class="decor-right"></div>
                      <div class="widget-content">
                        <ul class="list list-mark-1 list-mark-1_mod-a">
                        @foreach($cate_dichvu as $item)
                          <li><a href="{{route('cate_dichvu',$item->slug)}}">{{$item->name}}</a></li>
                        @endforeach
                        </ul>
                      </div>
                    </section>
                    <section class="widget wow">
                      <h2 class="widget-title ui-title-inner text-right">Video mới nhất</h2>
                      <div class="decor-right"></div>
                      <div class="widget-content">
                        <div id="accordion" class="panel-group acc-type-a acc-type-a_mod-a">
                          <div class="panel panel-default">
                            <div id="vi-ac_1" class="panel-collapse collapse in">
                              <div class="panel-body">
                                <iframe width="100%" height="240" src="https://www.youtube.com/embed/OQRA8fDJnO0" frameborder="0" allowfullscreen></iframe>
                              </div>
                            </div>
                            <div class="panel-heading">
                              <div class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#vi-ac_1"><span class="acc-type-a__title"><i class="icon fa fa-play"></i>làm sạch chuyên nghiệp</span><span class="acc-type-a__author">BY greenhouse</span></a></div>
                            </div>
                          </div>
                          <div class="panel panel-default">
                            <div id="vi-ac_2" class="panel-collapse collapse">
                              <div class="panel-body">
                                <iframe width="100%" height="240" src="https://www.youtube.com/embed/jxbEWfy39Uo" frameborder="0" allowfullscreen></iframe>
                              </div>
                            </div>
                            <div class="panel-heading">
                              <div class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#vi-ac_2"><span class="acc-type-a__title"><i class="icon fa fa-play"></i>vệ sinh công nghiệp</span><span class="acc-type-a__author">BY greenhouse</span></a></div>
                            </div>
                          </div>
                          <div class="panel panel-default">
                            <div id="vi-ac_3" class="panel-collapse collapse">
                              <div class="panel-body">
                                <iframe width="100%" height="240" src="https://www.youtube.com/embed/_ZKvaKN8Wl0" frameborder="0" allowfullscreen></iframe>
                              </div>
                            </div>
                            <div class="panel-heading">
                              <div class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#vi-ac_3"><span class="acc-type-a__title"><i class="icon fa fa-play"></i>cung cấp nhân viên vệ sinh</span><span class="acc-type-a__author">BY greenhouse</span></a></div>
                            </div>
                          </div>
                          <div class="panel panel-default">
                            <div id="vi-ac_4" class="panel-collapse collapse">
                              <div class="panel-body">
                                <iframe width="100%" height="240" src="https://www.youtube.com/embed/iqJP48fUy9w" frameborder="0" allowfullscreen></iframe>
                                {{-- <iframe width="100%" height="240" src="https://www.youtube.com/embed/_BvUJNWvysg?rel=0&amp;amp;showinfo=0;theme=light;iv_load_policy=3;modestbranding=1;autohide=1" frameborder="0" allowfullscreen></iframe> --}}
                              </div>
                            </div>
                            <div class="panel-heading">
                              <div class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#vi-ac_4"><span class="acc-type-a__title"><i class="icon fa fa-play"></i>vệ sinh công nghiệp</span><span class="acc-type-a__author">BY greenhouse</span></a></div>
                            </div>
                          </div>
                        </div>
                        <div class="text-right"><a href="javascript:void(0)" class="acc-type-a__link btn-link">tất cả video</a></div>
                      </div>
                    </section>
                  </aside>
                </div>
              </div>
            </div>
          </div>
