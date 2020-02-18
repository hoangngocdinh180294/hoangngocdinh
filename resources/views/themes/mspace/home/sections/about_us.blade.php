<section class="section-type-a">
            <div class="wrap-title-bg">
              <h2 class="ui-title-bg">Tại sao bạn nên chọn chúng tôi?</h2>
            </div>
            <div data-jarallax="{&quot;type&quot;: &quot;scroll-opacity&quot;, &quot;speed&quot;: &quot;.2&quot;}" style="background-image: url({{App\Helpers\Theme::assetsPath('assets/media/content/bg/1.jpg')}});" class="section-default section-bg section-bg_dark jarallax">
              <div class="container">
                <div class="row">
                  <div class="col-xs-12">
                    <div class="section__inner">
                      <div id="slider-1" class="slider-pro slider-thumbnails">
                        <div class="sp-slides">
                        @foreach($pages as $item)
                          <div class="sp-slide">
                            <article class="post post-2 post-2_mod-a clearfix">
                              <div class="entry-media"><a href="{{$item->image}}" class="prettyPhoto"><img src="{{$item->image}}" alt="Foto" style="width:640px; height:320px" class="img-responsive about-big"/></a><span class="label bg-6">Chi tiết</span>
                              </div>
                              <div class="entry-main">
                                <div class="entry-header">
                                  <h2 class="entry-title text-uppercase"><a href="{{route('posts.detail', ['slug' => $item->slug])}}">{!!App\Helpers\Theme::truncateWords(strip_tags($item->title), 50)!!}</a>
                                  </h2>
                                </div>
                                <div class="entry-meta"><span class="entry-meta__item"><a href="{{route('posts.detail', ['slug' => $item->slug])}}" class="entry-meta__link">{{$item->created_at->format('d/m/Y')}}</a></span></div>
                                <div class="entry-content">
                                  <p>{!!App\Helpers\Theme::truncateWords(strip_tags($item->excerpt), 150)!!}</p>
                                </div>
                              </div>
                            </article>
                          </div>
                        @endforeach
                        </div>
                        <div class="sp-thumbnails">
                        @foreach($pages as $page)
                          <div class="sp-thumbnail">
                            <article class="post post-2 post-2_mod-b clearfix">
                              <div class="entry-media"><img src="{{$page->image}}" alt="Foto" style="width:180px; height:110px" class="img-responsive about-small"/><span class="label bg-6">Chi tiết</span>
                              </div>
                              <div class="entry-main">
                                <div class="entry-header">
                                  <h2 class="entry-title text-uppercase">{!!App\Helpers\Theme::truncateWords(strip_tags($page->title), 40)!!}</h2>
                                </div>
                                <div class="entry-meta"><span class="entry-meta__item">{{$page->created_at->format('d/m/Y')}}</span></div>
                              </div>
                            </article>
                          </div>
                        @endforeach
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
