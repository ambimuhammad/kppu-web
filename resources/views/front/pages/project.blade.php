@extends('front.layouts.primary')
@section('content')
<!-- INNER CONTENT -->
<div class="inner-content">
    <div class="container">
        <div class="space50"></div>
        <section id="portfolio-section">
            <div class="container">
                <h3 class="uppercase text-center">Project Gallery</h3>
            </div>
            <ul class="filter" data-option-key="filter">
                <li><a class="selected" href="#filter" data-option-value="*">All</a></li>
                @foreach($recent as $re)
                <li><a href="#" data-option-value=".{{ $re->kategori_recent_work }}">{{ $re->kategori_recent_work }}</a>
                </li>
                @endforeach
            </ul>
            <div id="portfolio-home" class="isotope">
                @foreach($recent as $res)
                @foreach($res->galleries as $rest)
                <div class="project-item {{ $res->kategori_recent_work }}">
                    <div class="project-gal">
                        <img src="{{ asset($rest->path) }}" style="width: 333px; height: 214px;" class="img-responsive"
                            alt="">
                        <div class="overlay-folio">
                            <div class="hover-box">
                                <div class="hover-zoom">
                                    <a class="mp-lightbox zoom" href="{{ asset($rest->path) }}"><i
                                            class="icon-plus2"></i></a>
                                    <a class="link" href="{{ url('portfolio', $res->id) }}"><i
                                            class="icon-link3"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="project-info">
                        <h2>Aliquam tincidunt risus.</h2>
                        <p>Web , Creative</p>
                    </div>
                </div>
                @endforeach
                @endforeach
            </div>
        </section>
    </div>
</div>
@endsection