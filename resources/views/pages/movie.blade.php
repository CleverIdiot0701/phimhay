@extends('layout')
@section('content')
    <div class="container">
        <div class="row container" id="wrapper">
            <div class="halim-panel-filter">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="yoast_breadcrumb hidden-xs"><span><span>
                                <a href="{{ route('category', [$movie->category->slug]) }}">{{ $movie->category->title }}</a> » 
                                <span>
                                <a href="{{ route('country', [$movie->country->slug]) }}">{{ $movie->country->title }}</a> » 
                                @foreach ($movie->movie_genre as $gen)
                                    
                                <a href="{{ route('genre', [$gen->slug]) }}">{{ $gen->title }}</a> » 
                                @endforeach

                                <span class="breadcrumb_last" aria-current="page">{{ $movie->title }}</span>
                            </span>
                        </span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
                    <div class="ajax"></div>
                </div>
            </div>
            <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
                <section id="content" class="test">
                    <div class="clearfix wrap-content">

                        <div class="halim-movie-wrapper">
                            <div class="title-block">
                                <div id="bookmark" class="bookmark-img-animation primary_ribbon" data-id="38424">
                                    <div class="halim-pulse-ring"></div>
                                </div>
                                <div class="title-wrapper" style="font-weight: bold;">
                                    Bookmark
                                </div>
                            </div>
                            <div class="movie_info col-xs-12">
                                <div class="movie-poster col-md-3">
                                    <img class="movie-thumb" src="{{ asset('uploads/movie/' . $movie->image) }}"
                                        alt="{{ $movie->title }}">
                                    @if ($movie->resolution != 5)
                                        <div class="bwa-content">
                                            <div class="loader"></div>
                                            <a href="{{ url('xem-phim/'.$movie->slug.'/tap-' .$episode->episode) }}" class="bwac-btn">
                                                <i class="fa fa-play"></i>
                                            </a>
                                        </div>
                                    @else
                                        <a href="#wacth_trailer" style="display: block"
                                            class="btn btn-primary watch_trailer">Xem Trailer</a>
                                    @endif
                                </div>
                                <div class="film-poster col-md-9">
                                    <h1 class="movie-title title-1"
                                        style="display:block;line-height:35px;margin-bottom: -14px;color: #ffed4d;text-transform: uppercase;font-size: 18px;">
                                        {{ $movie->title }}</h1>
                                    <h2 class="movie-title title-2" style="font-size: 12px;">{{ $movie->name_eng }}</h2>
                                    <ul class="list-info-group">
                                        <li class="list-info-group-item"><span>Trạng Thái</span> : <span class="quality">
                                                @switch($movie->resolution)
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
                                            @if ($movie->resolution != 5)
                                                <span class="episode">
                                                    <td>
                                                        @if ($movie->phude == 0)
                                                            Phụ đề
                                                        @else
                                                            Thuyết minh
                                                        @endif
                                                        @if ($movie->season != 0)
                                                            - SS{{ $movie->season }}
                                                        @endif
                                                    </td>
                                                </span>
                                            @endif

                                        </li>
                                        <li class="list-info-group-item"><span>Điểm IMDb</span> : <span
                                                class="imdb">7.2</span></li>
                                        <li class="list-info-group-item"><span>Tập Pim</span> : {{ $movie->sotap }} / {{$movie->sotap}}
                                        </li>
                                        <li class="list-info-group-item"><span>Thời Lượng</span> : {{ $movie->thoiluong }}
                                        </li>
                                        <li class="list-info-group-item"><span>Thể Loại</span> :
                                            @foreach ($movie->movie_genre as $gen)
                                            <a href="{{ route('genre', $gen->slug) }}" rel="category">{{$gen->title}} |</a>
                                            @endforeach
                                        </li>
                                        <li class="list-info-group-item"><span>Danh Mục Phim</span> :
                                            <a href="{{ route('category', $movie->category->slug) }}"
                                                rel="tag">{{ $movie->category->title }}</a>
                                        </li>
                                        <li class="list-info-group-item"><span>Quốc Gia</span> :
                                            <a href="{{ route('country', $movie->country->slug) }}"
                                                rel="tag">{{ $movie->country->title }}</a>
                                        </li>
                                       

                                    </ul>
                                    <div class="movie-trailer hidden"></div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div id="halim_trailer"></div>
                        <div class="clearfix"></div>
                        <div class="section-bar clearfix">
                            <h2 class="section-title"><span style="color:#ffed4d">Nội dung phim</span></h2>
                        </div>
                        <div class="entry-content htmlwrap clearfix">
                            <div class="video-item halim-entry-box">
                                <article id="post-38424" class="item-content">
                                    {{ $movie->description }}
                                </article>
                            </div>
                        </div>
                        {{-- Tags phim --}}
                        <div class="section-bar clearfix">
                            <h2 class="section-title"><span style="color:#ffed4d">Key word</span></h2>
                        </div>
                        <div class="entry-content htmlwrap clearfix">
                            <div class="video-item halim-entry-box">
                                <article id="wacth_trailer" class="item-content">
                                    @if ($movie->tags != null)
                                        @php
                                            $tags = [];
                                            $tags = explode(',', $movie->tags);

                                        @endphp
                                        @foreach ($tags as $key => $tag)
                                            <a href="{{ url('tag/' . $tag) }}">{{ $tag }}</a>
                                        @endforeach
                                    @else
                                        {{ $movie->title }}
                                    @endif
                                </article>
                            </div>
                        </div>

                        {{-- Trailer phim --}}
                        <div class="section-bar clearfix">
                            <h2 class="section-title"><span style="color:#ffed4d">Trailer Phim</span></h2>
                        </div>
                        <div class="entry-content htmlwrap clearfix">
                            <div class="video-item halim-entry-box">
                                <article id="post-38424" class="item-content">
                                    <iframe width="100%" height="375px"
                                        src="https://www.youtube.com/embed/{{ $movie->trailer }}"
                                        title="{{ $movie->title }}" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                </article>
                            </div>
                        </div>
                        {{-- Comments Face --}}
                        <div class="section-bar clearfix">
                            <h2 class="section-title"><span style="color:#ffed4d">Bình Luận</span></h2>
                        </div>
                        <div class="entry-content htmlwrap clearfix">
                            @php
                                $current_url = Request::url();
                            @endphp
                            <div class="video-item halim-entry-box">
                                <article id="wacth_trailer" class="item-content">
                                    <div class="fb-comments" data-href="{{ $current_url }}" data-width="100%"
                                        data-numposts="10"></div>
                                </article>
                            </div>
                        </div>

                    </div>
                </section>
                <section class="related-movies">
                    <div id="halim_related_movies-2xx" class="wrap-slider">
                        <div class="section-bar clearfix">
                            <h3 class="section-title"><span>CÓ THỂ BẠN MUỐN XEM</span></h3>


                        </div>
                        <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">
                            @foreach ($related as $key => $relate)
                                <article class="thumb grid-item post-38498">
                                    <div class="halim-item">
                                        <a class="halim-thumb" href="{{ route('movie', $relate->slug) }}"
                                            title="{{ $relate->title }}">
                                            <figure><img class=" img-responsive"
                                                    src="{{ asset('uploads/movie/' . $relate->image) }}"
                                                    alt="{{ $relate->title }}" title="{{ $relate->title }}"></figure>
                                            <span class="status">
                                                @switch($relate->resolution)
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
                                            @if ($relate->resolution != 5)
                                                <span class="episode"><i class="fa fa-play" aria-hidden="true"></i>

                                                    <td>
                                                        @if ($relate->phude == 0)
                                                            Phụ đề
                                                        @else
                                                            Thuyết minh
                                                        @endif
                                                        @if ($relate->season != 0)
                                                            - SS{{ $relate->season }}
                                                        @endif
                                                    </td>
                                                </span>
                                            @endif
                                            <div class="icon_overlay"></div>
                                            <div class="halim-post-title-box">
                                                <div class="halim-post-title ">
                                                    <p class="entry-title">{{ $relate->title }}</p>
                                                    <p class="original_title">{{ $relate->name_eng }}</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </article>
                            @endforeach


                        </div>
                        <script>
                            $(document).ready(function($) {
                                var owl = $('#halim_related_movies-2');
                                owl.owlCarousel({
                                    loop: true,
                                    margin: 4,
                                    autoplay: true,
                                    autoplayTimeout: 4000,
                                    autoplayHoverPause: true,
                                    nav: true,
                                    navText: ['<i class="hl-down-open rotate-left"></i>',
                                        '<i class="hl-down-open rotate-right"></i>'
                                    ],
                                    responsiveClass: true,
                                    responsive: {
                                        0: {
                                            items: 2
                                        },
                                        480: {
                                            items: 3
                                        },
                                        600: {
                                            items: 4
                                        },
                                        1000: {
                                            items: 4
                                        }
                                    }
                                })
                            });
                        </script>
                    </div>
                </section>
            </main>
            @include('pages.include.sidebar')

        </div>
    </div>
@endsection
