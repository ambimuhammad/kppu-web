@extends('front.layouts.primary')
@push('css')
<style>
    p {
        text-align: justify;
    }
</style>
@endpush
@section('content')
<!-- PAGE HEADER -->
<div class="page_header">
    <div class="page_header_parallax">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3><span>Portfolio</span>{{ $singleRecentWork->name_recent_work }}</h3>
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
                        <li>Portfolio - {{ $singleRecentWork->name_recent_work }}</li>
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
            <div class="col-md-9">
                <div id="blog-slider" class="owl-carousel owl-theme">
                    @foreach($singleRecentWork->galleries as $galleri)
                    <div class="item">
                        <img src="{{ asset($galleri->path) }}" style="width: 848px; height: 486px;"
                            class="img-responsive" alt="">
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-3">
                <div class="fs-info">
                    <h3>{{ $singleRecentWork->name_recent_work }}</h3>
                    {!! $singleRecentWork->deskripsi_recent_work !!}
                    <div class="clearfix space20"></div>
                </div>
            </div>
        </div>
        <div class="clearfix space30"></div>
        <h4 class="uppercase">Recent Projects</h4>
        <hr>
        <div id="portfolio-home" class="isotope gutter folio-boxed-4col">
            @foreach($recent as $res)
            @foreach($res->galleries as $rest)
            <div class="project-item">
                <a href="{{ url('portfolio', $res->id) }}">
                    <div class="project-gal">
                        <img src="{{ asset($rest->path) }}" style="width: 333px; height: 214px;" class="img-responsive"
                            alt="">
                        <div class="overlay-folio2">
                            <div class="project-info">
                                <h2>{{ $res->name_recent_work }}</h2>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            @endforeach
        </div>
    </div>
</div>
@endsection