<aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
    <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
        <div class="section-bar clearfix">
            <div class="section-title">
                <span>Trending</span>

            </div>
        </div>
        <section class="tab-content">
            <div role="tabpanel" class="tab-pane active halim-ajax-popular-post">
                <div class="halim-ajax-popular-post-loading hidden"></div>
                <div id="halim-ajax-popular-post" class="popular-post">

                    @foreach ($phimhot_sidebar as $key => $hot_sidebar)
                        <div class="item post-37176">
                            <a href="{{ route('movie', $hot_sidebar->slug) }}" title="{{ $hot_sidebar->title }}">
                                <div class="item-link">
                                    <img src="{{ asset('uploads/movie/' . $hot_sidebar->image) }}"
                                        class="lazy post-thumb" alt="{{ $hot_sidebar->title }}"
                                        title="{{ $hot_sidebar->title }}" />
                                    <span class="is_trailer">
                                        @switch($hot_sidebar->resolution)
                                            @case(0)
                                                HD
                                            @break

                                            @case(1)
                                                SD
                                            @break

                                            @case(2)
                                                HD CAM
                                            @break

                                            @case(3)
                                                CAM
                                            @break

                                            @case(4)
                                                FullHD
                                            @break

                                            @case(5)
                                                Trailer
                                            @break

                                            @default
                                        @endswitch
                                    </span>
                                </div>
                                <p class="title">{{ $hot_sidebar->title }}</p>
                            </a>
                            <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                            <div style="float: left;">
                                <span class="user-rate-image post-large-rate stars-large-vang"
                                    style="display: block;/* width: 100%; */">
                                    <span style="width: 0%"></span>
                                </span>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </section>
        <div class="clearfix"></div>
    </div>
</aside>

<aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
    <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
        <div class="section-bar clearfix">
            <div class="section-title">
                <span>Phim Sắp Chiếu</span>

            </div>
        </div>
        <section class="tab-content">
            <div role="tabpanel" class="tab-pane active halim-ajax-popular-post">
                <div class="halim-ajax-popular-post-loading hidden"></div>
                <div id="halim-ajax-popular-post" class="popular-post">

                    @foreach ($phim_trailer as $key => $hot_trailer)
                        <div class="item post-37176">
                            <a href="{{ route('movie', $hot_trailer->slug) }}" title="{{ $hot_trailer->title }}">
                                <div class="item-link">
                                    <img src="{{ asset('uploads/movie/' . $hot_trailer->image) }}"
                                        class="lazy post-thumb" alt="{{ $hot_trailer->title }}"
                                        title="{{ $hot_trailer->title }}" />
                                    <span class="is_trailer">
                                        @switch($hot_trailer->resolution)
                                            @case(0)
                                                HD
                                            @break

                                            @case(1)
                                                SD
                                            @break

                                            @case(2)
                                                HD CAM
                                            @break

                                            @case(3)
                                                CAM
                                            @break

                                            @case(4)
                                                FullHD
                                            @break

                                            @case(5)
                                                Trailer
                                            @break

                                            @default
                                        @endswitch
                                    </span>
                                </div>
                                <p class="title">{{ $hot_trailer->title }}</p>
                            </a>
                            <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                            <div style="float: left;">
                                <span class="user-rate-image post-large-rate stars-large-vang"
                                    style="display: block;/* width: 100%; */">
                                    <span style="width: 0%"></span>
                                </span>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </section>
        <div class="clearfix"></div>
    </div>
</aside>

<aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
    <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
        <div class="section-bar clearfix">
            <div class="section-title">
                <span>Top Views</span>

            </div>
        </div>
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item active">
                <a class="nav-link filter-sidebar " id="pills-home-tab" data-toggle="pill" href="#ngay" role="tab"
                    aria-controls="pills-home" aria-selected="true">Ngày</a>
            </li>
            <li class="nav-item">
                <a class="nav-link filter-sidebar" id="pills-profile-tab" data-toggle="pill" href="#tuan"
                    role="tab" aria-controls="pills-profile" aria-selected="false">Tuần</a>
            </li>
            <li class="nav-item">
                <a class="nav-link filter-sidebar" id="pills-contact-tab" data-toggle="pill" href="#thang"
                    role="tab" aria-controls="pills-contact" aria-selected="false">Tháng</a>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div id="halim-ajax-popular-post-default" class="popular-post">
                <span id="show_data_default"></span>
            </div>

            <div class="tab-pane fade show active " id="tuan" role="tabpanel" aria-labelledby="pills-home-tab">
                <div id="halim-ajax-popular-post" class="popular-post">
                    {{-- <div class="item post-37176">
                              <a href="chitiet.php" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ">
                                 <div class="item-link">
                                    <img src="https://ghienphim.org/uploads/GPax0JpZbqvIVyfkmDwhRCKATNtLloFQ.jpeg?v=1624801798" class="lazy post-thumb" alt="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" />
                                    <span class="is_trailer">Trailer</span>
                                 </div>
                                 <p class="title">CHỊ MƯỜI BA: BA NGÀY SINH TỬ</p>
                              </a>
                              <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                              <div style="float: left;">
                                 <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                                 <span style="width: 0%"></span>
                                 </span>
                              </div>
                           </div> --}}
                    <span id="show_data"></span>

                </div>
            </div>


        </div>

    </div>
</aside>
