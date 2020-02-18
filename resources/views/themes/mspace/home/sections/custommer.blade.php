<div class="container wow">
            <div class="row">
              <div class="col-xs-12">
                <section class="section-type-c">
                  <div class="wrap-title-bg">
                    <h2 class="ui-title-bg">Khách hàng của greenhouse</h2>
                  </div>
                  <div data-min480="1" data-min768="2" data-min992="4" data-min1200="4" data-pagination="false" data-navigation="true" data-auto-play="2000" data-stop-on-hover="true" class="owl-carousel owl-theme enable-owl-carousel">
                    @foreach($custommer as $item)
                    <article class="post post-4 clearfix">
                      <div class="entry-media"><a href="{{$item->image}}" class="prettyPhoto"><img style="width:100%; height:300px; object-fit:cover;" src="{{$item->image}}" alt="Foto" class="img-responsive"/></a></div>
                      <div class="entry-main">
                        <div class="entry-header">
                          <a href="{{route('detail_custommer',$item->slug)}}"><h2 class="entry-title">{{$item->title}}</h2></a>
                        </div>
                        <div class="entry-meta"><span class="entry-meta__item">By greenhouse</span></div>
                      </div>
                    </article>
                    @endforeach
                  </div>
                </section>
              </div>
            </div>
          </div>
