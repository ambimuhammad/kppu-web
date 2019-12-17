@extends('front.layouts.primary')
@section('content')
<!-- PAGE HEADER -->
<div class="page_header">
    <div class="page_header_parallax">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3><span>Blog</span></h3>
                </div>
            </div>
        </div>
    </div>
    <div class="bcrumb-wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="bcrumbs">
                        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li>Blog Artikel</li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- INNER CONTENT -->
<div class="inner-content">
    <div class="container">
        <div class="row">
            @if (empty($artikelSearch))
            <div class="col-md-9 blog-content">
                <div class="row">
                    @foreach($artikel as $listartikel)
                    <div class="col-md-6 space60">
                        <article class="blogpost">
                            <h2 class="post-title-small"><a
                                    href="{{ url('artikels', $listartikel->slug) }}">{{ $listartikel->judul }}</a></h2>
                            <div class="post-meta">
                                <span><a href="#"><i class="icon-clock2"></i>
                                        {{ date('j F Y, H:i:s', strtotime($listartikel->published_at)) }}</a></span>
                                <span><a href="#"><i class="icon-user"></i>
                                        {{ $listartikel->users->name }}</a></span>
                            </div>
                            <div class="space30"></div>
                            <div class="post-media">
                                <img src="{{ asset($listartikel->path) }}" style="width: 408px; height: 214px;"
                                    class="img-responsive" alt="">
                            </div>
                            <div class="space20"></div>
                            <div class="post-excerpt">
                                {!! \Str::limit($listartikel->deskripsi, 200, ' (...)') !!}
                            </div>
                            <a href="{{ url('artikels', $listartikel->slug) }}" class="button btn-xs">Read
                                More&nbsp;&nbsp;<i class="fa fa-angle-right"></i></a>
                        </article>
                    </div>
                    @endforeach
                </div>
                <div class="space50"></div>
                <!-- Pagination -->
                <div class="page_nav">
                    {!! $artikel->links() !!}
                </div>
                <!-- End Pagination -->
            </div>
            <!-- Sidebar -->
            <aside class="col-sm-3 ">
                <div class="side-widget space50">
                    <h4>Search</h4>
                    <form method="GET" role="form" class="search-widget" action="{{ route('front.artikel') }}">
                        <input class="form-control" name="search" type="text">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <div class="side-widget space50">
                    <h4>Categories</h4>
                    <ul class="list-unstyled cat-list">
                        @foreach($artikelWithCategories as $kategori)
                        @foreach($kategori->kategoris as $kategories)
                        <li><a href="#">{{ $kategories->nama_kategori }}</a> <i class="icon-plus2"></i></li>
                        @endforeach
                        @endforeach
                    </ul>
                </div>
                <div class="side-widget space50">
                    <h4>Artikel Terakhir</h4>
                    <ul class="list-unstyled popular-post">
                        @foreach($artikelTerakhir as $terakhir)
                        <li>
                            <div class="popular-img">
                                <a href="{{ url('artikels', $terakhir->slug) }}"> <img
                                        src="{{ asset($terakhir->path) }}" style="width: 60px; height: 57px;"
                                        class="img-responsive" alt=""></a>
                            </div>
                            <div class="popular-desc">
                                <h5> <a href="{{ url('artikels', $terakhir->slug) }}">{{ $terakhir->judul }}</a></h5>
                                <span>By {{ ucfirst($terakhir->users->name) }}</span>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="side-widget">
                    <h4>Tag Cloud</h4>
                    <div class="tag-list">
                        <a href="#">Design</a>
                        <a href="#">Photo</a>
                        <a href="#">News</a>
                        <a href="#">Fashion</a>
                        <a href="#">Marketing</a>
                        <a href="#">video</a>
                        <a href="#">vector</a>
                        <a href="#">Photoshop</a>
                    </div>
                </div>
            </aside>
            {{-- Hasil Pencarian --}}
            @else
            @if(count($artikelSearch) > 0)
            <div class="col-md-9 blog-content">
                <h1>Hasil Pencarian : {{ request()->get('search') }}</h1>
                <div class="row">
                    @foreach($artikelSearch as $listartikel)
                    <div class="col-md-6 space60">
                        <article class="blogpost">
                            <h2 class="post-title-small"><a
                                    href="{{ url('artikels', $listartikel->slug) }}">{{ $listartikel->judul }}</a></h2>
                            <div class="post-meta">
                                <span><a href="#"><i class="icon-clock2"></i>
                                        {{ date('j F Y, H:i:s', strtotime($listartikel->published_at)) }}</a></span>
                                <span><a href="#"><i class="icon-user"></i>
                                        {{ $listartikel->users->name }}</a></span>
                            </div>
                            <div class="space30"></div>
                            <div class="post-media">
                                <img src="{{ asset($listartikel->path) }}" style="width: 333px; height: 214px;"
                                    class="img-responsive" alt="">
                            </div>
                            <div class="space20"></div>
                            <div class="post-excerpt">
                                {!! \Str::limit($listartikel->deskripsi, 200, ' (...)') !!}
                            </div>
                            <a href="{{ url('artikels', $listartikel->slug) }}" class="button btn-xs">Read
                                More&nbsp;&nbsp;<i class="fa fa-angle-right"></i></a>
                        </article>
                    </div>
                    @endforeach
                </div>
                <div class="space50"></div>
                <!-- Pagination -->
                <div class="page_nav">
                    {!! $artikelSearch->links() !!}
                </div>
                <!-- End Pagination -->
            </div>
            <!-- Sidebar -->
            <aside class="col-sm-3 ">
                <div class="side-widget space50">
                    <h4>Search</h4>
                    <form method="GET" role="form" class="search-widget" action="{{ route('front.artikel') }}">
                        <input class="form-control" name="search" type="text">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <div class="side-widget space50">
                    <h4>Categories</h4>
                    <ul class="list-unstyled cat-list">
                        <li> <a href="#">Marketing</a> <i class="icon-plus2"></i></li>
                        <li> <a href="#">Photography</a> <i class="icon-plus2"></i></li>
                        <li> <a href="#">Webdesign</a> <i class="icon-plus2"></i></li>
                        <li> <a href="#">Fashion</a> <i class="icon-plus2"></i></li>
                        <li> <a href="#">Seo Strategy</a> <i class="icon-plus2"></i></li>
                    </ul>
                </div>
                <div class="side-widget space50">
                    <h4>Artikel Terakhir</h4>
                    <ul class="list-unstyled popular-post">
                        @foreach($artikelTerakhirSearch as $terakhir)
                        <li>
                            <div class="popular-img">
                                <a href="{{ url('artikels', $terakhir->slug) }}"> <img
                                        src="{{ asset($terakhir->path) }}" style="width: 60px; height: 57px;"
                                        class="img-responsive" alt=""></a>
                            </div>
                            <div class="popular-desc">
                                <h5> <a href="{{ url('artikels', $terakhir->slug) }}">{{ $terakhir->judul }}</a></h5>
                                <span>By {{ ucfirst($terakhir->users->name) }}</span>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="side-widget">
                    <h4>Tag Cloud</h4>
                    <div class="tag-list">
                        <a href="#">Design</a>
                        <a href="#">Photo</a>
                        <a href="#">News</a>
                        <a href="#">Fashion</a>
                        <a href="#">Marketing</a>
                        <a href="#">video</a>
                        <a href="#">vector</a>
                        <a href="#">Photoshop</a>
                    </div>
                </div>
            </aside>
            @else
            <div class="col-md-9 blog-content">
                <h1>Hasil Pencarian : {{ \Str::limit(request()->get('search'), 15, '(...)') }} Tidak Ditemukan <a
                        class="btn btn-primary" href="{{ route('front.artikel') }}"><i class="fa fa-arrow-left"></i>
                        Kembali Ke Artikel</a></h1>
            </div>
            <!-- Sidebar -->
            <aside class="col-sm-3 ">
                <div class="side-widget space50">
                    <h4>Search</h4>
                    <form method="GET" role="form" class="search-widget" action="{{ route('front.artikel') }}">
                        <input class="form-control" name="search" type="text">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <div class="side-widget space50">
                    <h4>Categories</h4>
                    <ul class="list-unstyled cat-list">
                        <li> <a href="#">Marketing</a> <i class="icon-plus2"></i></li>
                        <li> <a href="#">Photography</a> <i class="icon-plus2"></i></li>
                        <li> <a href="#">Webdesign</a> <i class="icon-plus2"></i></li>
                        <li> <a href="#">Fashion</a> <i class="icon-plus2"></i></li>
                        <li> <a href="#">Seo Strategy</a> <i class="icon-plus2"></i></li>
                    </ul>
                </div>
                <div class="side-widget space50">
                    <h4>Artikel Terakhir</h4>
                    <ul class="list-unstyled popular-post">
                        @foreach($artikelTerakhirSearch as $terakhir)
                        <li>
                            <div class="popular-img">
                                <a href="#"> <img src="{{ asset($terakhir->path) }}" style="width: 60px; height: 57px;"
                                        class="img-responsive" alt=""></a>
                            </div>
                            <div class="popular-desc">
                                <h5> <a href="#">{{ $terakhir->judul }}</a></h5>
                                <span>By {{ ucfirst($terakhir->users->name) }}</span>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="side-widget">
                    <h4>Tag Cloud</h4>
                    <div class="tag-list">
                        <a href="#">Design</a>
                        <a href="#">Photo</a>
                        <a href="#">News</a>
                        <a href="#">Fashion</a>
                        <a href="#">Marketing</a>
                        <a href="#">video</a>
                        <a href="#">vector</a>
                        <a href="#">Photoshop</a>
                    </div>
                </div>
            </aside>
            @endif
            @endif
        </div>
    </div>
</div>
</div>
@endsection