<nav class="navbar yamm">
              <div id="navbar-collapse-1" class="navbar-collapse collapse">
                <div class="container">
                  <div class="row">
                    <div class="col-xs-12">
                      <ul class="nav navbar-nav">
                        <li><a href="{{route('home')}}">Trang chủ</a></li>
                        @if($setting_menu->gioi_thieu == 1)
                        <li class="yamm-fw"><a href="{{route('introduce')}}">Giới thiệu</a> </li>
                        @endif

                        @if($setting_menu->dich_vu == 1)
                        <li class="yamm-fw"><a href="{{route('project')}}">Dịch vụ</a>
                          <ul class="dropdown-menu">
                            <li>
                              <div class="yamm-content">
                                <div class="row">
                                  <div class="col-md-4 col-sm-6">
                                    <ul class="list list-mark-1 list-mark-1_mod-a">
                                     @foreach($cate_dichvu as $cate)
                                      <li><a href="{{route('cate_dichvu',$cate->slug)}}">{{$cate->name}}</a></li>
                                      @endforeach
                                    </ul>
                                  </div>
                                  <div class="col-md-4 col-sm-6">
                                    <article class="post post-4 post-4_mod-a clearfix">
                                      <div class="entry-media"><a href="{{App\Helpers\Theme::assetsPath('assets/media/content/post/360x280/green-house-menu.jpg')}}" class="prettyPhoto"><img src="{{App\Helpers\Theme::assetsPath('assets/media/content/post/360x280/green-house-menu.jpg')}}" style="width:360; height:280px" alt="Foto" class="img-responsive"/></a></div>
                                      <div class="entry-main">
                                        <div class="entry-header">
                                          <h2 class="entry-title">Green house giá trị Việt</h2>
                                        </div>
                                        <div class="entry-meta"><span class="entry-meta__item"><a href="{{route('project')}}" class="entry-meta__link"></a></span><span class="entry-meta__item"><i class="icon pe-7s-comment"></i><a href="{{route('project')}}" class="entry-meta__link"></a></span></div>
                                      </div>
                                    </article>
                                  </div>
                                  <div class="col-md-4 col-xs-12">
                                    @foreach ($dichvu_new as $item)
                                    <article class="post post-3 post-3_mod-f clearfix">
                                      <div class="entry-media"><a href="" class="prettyPhoto"><img src="{{$item->projectimages[0]->image}}" style="width:100px; height:80px" alt="Foto" class="img-responsive"/></a></div>
                                      <div class="entry-main">
                                        <div class="entry-header">
                                        <h2 class="entry-title"><a href="{{route('detail_project',$item->slug)}}">{{$item->title}}</a></h2>
                                        </div>
                                        <div class="entry-meta"><span class="category color-4">Mới nhất</span><span class="entry-meta__item"><i class="icon pe-7s-comment"></i><a href="{{route('detail_project',$item->slug)}}" class="entry-meta__link">Greenhouse</a></span></div>
                                      </div>
                                    </article>
                                    @endforeach
                                  </div>
                                </div>
                              </div>
                            </li>
                          </ul>
                        </li>
                        @endif


                        @if($setting_menu->du_an == 1)
                        <li class="yamm-fw"><a href="{{route('services')}}">Dự án</a></li>
                        @endif

                        @if($setting_menu->tin_tuc == 1)
                        <li class="yamm-fw"><a href="{{route('post')}}">Tin tức</a></li>
                        @endif

                        @if($setting_menu->khach_hang == 1)
                        <li class="yamm-fw "><a href="{{route('custommer')}}">Khách hàng</a></li>
                        @endif

                        @if($setting_menu->bao_gia == 1)
                        <li class="yamm-fw "><a href="{{route('price')}}">Bảng giá</a></li>
                        @endif

                        @if($setting_menu->tuyen_dung == 1)
                      <li class="yamm-fw"><a href="{{route('recruitment')}}">Tuyển dụng</a></li>
                        @endif
                        @if($setting_menu->lien_he == 1)
                        <li class="yamm-fw" ><a href="{{route('contact')}}">Liên hệ</a> </li>
                        @endif
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="header-search">
                <div class="container">
                  <div class="row">
                    <div class="col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
                      <div class="navbar-search">
                      <form class="search-global" method="get" action="{{route('posts.search')}}">
                          <input style="font-size:50px" type="text" placeholder="Search..." autocomplete="off" name="s" value="" class="search-global__input"/>
                          <button class="search-global__btn"><i class="icon fa fa-search"></i></button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <button type="button" class="search-close close"><i class="fa fa-times"></i></button>
              </div>
            </nav>
