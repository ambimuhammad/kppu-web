@extends('front.layouts.primary')
@push('css')
<style>
    .owl-controls .clickable {
        display: none;
    }
</style>
@endpush
@section('content')
<!-- INNER CONTENT -->
<div class="inner-content">
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <div class="blog-single">
                    <article class="blogpost">
                        <h2 class="post-title"><a href="#">{{ $single->judul }}</a></h2>
                        <div class="post-meta">
                            <span><a href="#"><i class="icon-clock2"></i>
                                    {{ date('j F Y, H:i:s', strtotime($single->published_at)) }}</a></span>
                            <span><a href="#"><i class="icon-user"></i> {{ ucfirst($single->users->name) }}</a></span>
                        </div>
                        <div class="space30"></div>

                        <!-- Media Gallery -->
                        <div class="post-media">
                            <div id="blog-slider" class="owl-carousel owl-theme">
                                <div class="item">
                                    <img src="{{ asset($single->path) }}" style="width: 848px; height: 463px;"
                                        class="img-responsive" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="space30"></div>
                        {!! htmlspecialchars_decode($single->deskripsi) !!}
                    </article>
                </div>
            </div>
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
        </div>
    </div>
</div>
@endsection