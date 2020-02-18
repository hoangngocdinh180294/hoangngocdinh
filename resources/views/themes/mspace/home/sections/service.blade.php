{{-- @php dd($project_categoris); @endphp --}}
<div class="section-type-c wow">
            <div class="container">
              <div class="row">
                <div class="col-md-8">
                  <section class="section-area">
                    <h2 class="ui-title-block"><span class="ui-title-block__subtitle"></span><span class="text-uppercase">Dịch vụ Green house</span></h2>
                    <ul class="nav nav-tabs">
                      {{-- <li class="tabs-label">Filter Content by</li> --}}
                      @php $i = 0; @endphp
                      @foreach ($project_categoris as $item)
                      @php $i++; @endphp
                    <li class="{{$i == 1 ? 'active' : ''}}"><a style="padding:16px" href="#tab-{{$item->id}}" data-toggle="tab">{{$item->name}}</a></li>
                      @endforeach
                    </ul>
                    <div class="tab-content">
                      <div id="tab-1" class="tab-pane fade in active">
                        <div class="row">
                          <div class="col-md-6">
                            <article class="post post-2 post-2_mod-d clearfix">
                              <div class="entry-media"><a href="{{App\Helpers\Theme::assetsPath('assets/media/content/post/360x300/ve-sinh-cong-trinh.jpg')}}" class="prettyPhoto"><img src="{{App\Helpers\Theme::assetsPath('assets/media/content/post/360x300/ve-sinh-cong-trinh.jpg')}}" alt="Foto" class="img-responsive"/></a><span class="label bg-4">greenhouse</span>
                              </div>
                              <div class="entry-main">
                                <div class="entry-header">
                                  <h2 class="entry-title text-uppercase">Vệ sinh công trình</h2>
                                </div>
                                <div class="entry-meta"><span class="entry-meta__item">By<a href="javascript:void(0)" class="entry-meta__link"> greenhouse</a></span><span class="entry-meta__item"><a href="javascript:void(0)" class="entry-meta__link"></a></span><span class="entry-meta__item"><i class="icon pe-7s-comment"></i><a href="javascript:void(0)" class="entry-meta__link"></a></span></div>
                                <div class="entry-content">
                                  <p>Những năm gần đây dịch vụ vệ sinh công trình sau xây dựng được rất nhiều người ưa chuộng và sử dụng. Hiện nay trên thị trường vệ sinh sau xây dựng là rất cần thiết bởi vì sau mỗi công trình rác thải rất nhiều vì vậy cần có một công ty làm về sinh sau xây dựng. Công ty vệ sinh Greenhouse tự hào là một trong những công ty hàng đầu cung cấp vệ sinh sau xây dựng giá rẻ đảm bảo sự sạch sẽ cho công trình của quý khách.
                                  </p>
                                </div>
                                {{-- <div class="entry-footer"><a href="javascript:void(0)" class="btn-link">Continue Reading</a></div> --}}
                              </div>
                            </article>
                          </div>
                          <div class="col-md-6">
                            @foreach ($projects1 as $item1)
                            <article class="post post-3 post-3_mod-a clearfix">
                              <div class="entry-media"><a href="{{$item1->image}}" class="prettyPhoto"><img style="width:100px; height:100px" src="{{$item1->image}}" alt="Foto" class="img-responsive"/></a></div>
                              <div class="entry-main">
                                <div class="entry-header">
                                <h2 class="entry-title"><a href="{{route('detail_project',$item1->slug)}}">{{$item1->title}}</a></h2>
                                </div>
                                <div class="entry-meta"><span class="category color-4">Đọc thêm</span><span class="entry-meta__item"><i class="icon pe-7s-comment"></i><a href="{{route('detail_project',$item->slug)}}" class="entry-meta__link">greenhouse</a></span></div>
                              </div>
                            </article>
                            @endforeach
                           
                          </div>
                        </div>
                      </div>
                      <div id="tab-2" class="tab-pane fade">
                        <div class="row">
                          <div class="col-md-6">
                            <article class="post post-2 clearfix">
                              <div class="entry-media"><a href="{{App\Helpers\Theme::assetsPath('assets/media/content/post/360x300/cham-soc-cay-canh.jpg')}}" class="prettyPhoto"><img src="{{App\Helpers\Theme::assetsPath('assets/media/content/post/360x300/cham-soc-cay-canh.jpg')}}" alt="Foto" class="img-responsive"/></a><span class="label bg-5">greenhouse</span>
                              </div>
                              <div class="entry-main">
                                <div class="entry-header">
                                  <h2 class="entry-title text-uppercase">Dịch vụ chăm sóc cây cảnh</h2>
                                </div>
                                <div class="entry-meta"><span class="entry-meta__item">By<a href="javascript:void(0)" class="entry-meta__link"> green house</a></span><span class="entry-meta__item"><a href="javascript:void(0)" class="entry-meta__link"></a></span><span class="entry-meta__item"><i class="icon pe-7s-comment"></i><a href="javascript:void(0)" class="entry-meta__link"></a></span></div>
                                <div class="entry-content">
                                  <p>Như các bạn đều biết, tạo ra một khu vườn đẹp đã khó, việc chăm sóc, bảo dưỡng cây xanh hàng ngày cũng là việc cực kỳ quan trọng giúp cho cảnh quan sân vườn nhà chúng ta phải có sự kết hợp hài hòa giữa kiến trúc và ngoại cảnh, giữa thiết kế cảnh quan và thi công trồng cây, giữa các yếu tố tĩnh và động…</p>
                                </div>
                                {{-- <div class="entry-footer"><a href="javascript:void(0)" class="btn-link">Continue Reading</a></div> --}}
                              </div>
                            </article>
                          </div>
                          <div class="col-md-6">
                            @foreach ($projects2 as $item2)
                            <article class="post post-3 post-3_mod-a clearfix">
                              <div class="entry-media"><a href="{{$item2->image}}" class="prettyPhoto"><img style="width:100px; height:100px" src="{{$item2->image}}" alt="Foto" class="img-responsive"/></a></div>
                              <div class="entry-main">
                                <div class="entry-header">
                                <h2 class="entry-title"><a href="{{route('detail_project',$item2->slug)}}">{{$item2->title}}</a></h2>
                                </div>
                                <div class="entry-meta"><span class="category color-4">Đọc thêm</span><span class="entry-meta__item"><i class="icon pe-7s-comment"></i><a href="{{route('detail_project',$item->slug)}}" class="entry-meta__link">greenhouse</a></span></div>
                              </div>
                            </article>
                            @endforeach
                            
                          </div>
                        </div>
                      </div>
                      <div id="tab-3" class="tab-pane fade">
                        <div class="row">
                          <div class="col-md-6">
                            <article class="post post-2 clearfix">
                              <div class="entry-media"><a href="{{App\Helpers\Theme::assetsPath('assets/media/content/post/360x300/nhan-vien-ve-sinh-1.jpg')}}" class="prettyPhoto"><img src="{{App\Helpers\Theme::assetsPath('assets/media/content/post/360x300/nhan-vien-ve-sinh-1.jpg')}}" alt="Foto" class="img-responsive"/></a><span class="label bg-6">greenhouse</span>
                              </div>
                              <div class="entry-main">
                                <div class="entry-header">
                                  <h2 class="entry-title text-uppercase">Cung cấp nhân viên vệ sinh</h2>
                                </div>
                                <div class="entry-meta"><span class="entry-meta__item">By<a href="javascript:void(0)" class="entry-meta__link"> greenhouse</a></span><span class="entry-meta__item"><a href="javascript:void(0)" class="entry-meta__link"></a></span><span class="entry-meta__item"><i class="icon pe-7s-comment"></i><a href="javascript:void(0)" class="entry-meta__link"></a></span></div>
                                <div class="entry-content">
                                  <p>Việc vệ sinh các công trình này thực sự không hề đơn giản đòi sự có mặt của các đơn vị vệ sinh chuyên nghiệp. Dịch vụ cung cấp nhân viên vệ sinh được khá nhiều doanh nghiệp cũng như cá nhân lựa chọn và sử dụng và hãy tham khảo dịch vụ của Vệ Sinh Duy Tuấn cung cấp tới khách hàng của mình.</p>
                                </div>
                                {{-- <div class="entry-footer"><a href="javascript:void(0)" class="btn-link">Continue Reading</a></div> --}}
                              </div>
                            </article>
                          </div>
                          <div class="col-md-6">
                            @foreach ($projects3 as $item3)
                            <article class="post post-3 post-3_mod-a clearfix">
                              <div class="entry-media"><a href="{{$item3->image}}" class="prettyPhoto"><img style="width:100px; height:100px" src="{{$item3->image}}" alt="Foto" class="img-responsive"/></a></div>
                              <div class="entry-main">
                                <div class="entry-header">
                                <h2 class="entry-title"><a href="{{route('detail_project',$item3->slug)}}">{{$item3->title}}</a></h2>
                                </div>
                                <div class="entry-meta"><span class="category color-4">Đọc thêm</span><span class="entry-meta__item"><i class="icon pe-7s-comment"></i><a href="{{route('detail_project',$item3->slug)}}" class="entry-meta__link">greenhouse</a></span></div>
                              </div>
                            </article>
                            @endforeach
                          </div>
                        </div>
                      </div>
                      <div id="tab-4" class="tab-pane fade">
                        <div class="row">
                          <div class="col-md-6">
                            <article class="post post-2 clearfix">
                              <div class="entry-media"><a href="{{App\Helpers\Theme::assetsPath('assets/media/content/post/360x300/ve-sinh-cong-nghiep.jpg')}}" class="prettyPhoto"><img src="{{App\Helpers\Theme::assetsPath('assets/media/content/post/360x300/ve-sinh-cong-nghiep.jpg')}}" alt="Foto" class="img-responsive"/></a><span class="label bg-9">greenhouse</span>
                              </div>
                              <div class="entry-main">
                                <div class="entry-header">
                                  <h2 class="entry-title text-uppercase">Vệ sinh công nghiệp</h2>
                                </div>
                                <div class="entry-meta"><span class="entry-meta__item">By<a href="javascript:void(0)" class="entry-meta__link"> Greenhouse</a></span><span class="entry-meta__item"><a href="javascript:void(0)" class="entry-meta__link"></a></span><span class="entry-meta__item"><i class="icon pe-7s-comment"></i><a href="javascript:void(0)" class="entry-meta__link"></a></span></div>
                                <div class="entry-content">
                                  <p>Tại Greenhouse khẳng định là nhà cung cấp dịch vụ vệ sinh chuyên nghiệp nhất. Đơn giản vì Greenhouse là Công ty chuyên về dịch vụ vệ sinh công nghiệp được thành lập từ năm 2006. Với nhiều năm kinh nghiệm trong lĩnh vực và có nền tảng là Nhà cung cấp dịch vụ đầu tiên ở Việt Nam, chúng tôi khẳng định về dịch vụ của mình luôn là số 1.</p>
                                </div>
                                {{-- <div class="entry-footer"><a href="javascript:void(0)" class="btn-link">Continue Reading</a></div> --}}
                              </div>
                            </article>
                          </div>
                          <div class="col-md-6">
                            @foreach ($projects4 as $item4)
                            <article class="post post-3 post-3_mod-a clearfix">
                              <div class="entry-media"><a href="{{$item4->image}}" class="prettyPhoto"><img style="width:100px; height:100px" src="{{$item4->image}}" alt="Foto" class="img-responsive"/></a></div>
                              <div class="entry-main">
                                <div class="entry-header">
                                <h2 class="entry-title"><a href="{{route('detail_project',$item4->slug)}}">{{$item4->title}}</a></h2>
                                </div>
                                <div class="entry-meta"><span class="category color-4">Đọc thêm</span><span class="entry-meta__item"><i class="icon pe-7s-comment"></i><a href="{{route('detail_project',$item->slug)}}" class="entry-meta__link">greenhouse</a></span></div>
                              </div>
                            </article>
                            @endforeach
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>
                </div>
                <div class="col-md-4">
                  <aside class="sidebar">
                  @include('themes.mspace.home.sections.follow')
                    <div class="widget"><a href="{{route('home')}}" class="banner"><img src="{{App\Helpers\Theme::assetsPath('assets/media/content/banners/3.jpg')}}" style="width:336px; height:280px" alt="banner" class="img-responsive center-block"></a></div>
                    <section class="widget">
                      <h2 class="widget-title ui-title-inner text-right">Tiếp tục được cập nhật
                      </h2>
                      <div class="decor-right"></div>
                      <div class="widget-content">
                        <p>Đăng ký nhận bản tin của chúng tôi để nhận tin tức mới nhất.</p>
                        <form class="form-subscribe">
                          <div class="form-group has-feedback">
                            <input type="email" placeholder="Email của bạn" class="form-control">
                            <button class="icon pe-7s-mail form-control-feedback"></button>
                          </div>
                        </form>
                      </div>
                    </section>
                  </aside>
                </div>
              </div>
            </div>
          </div>
