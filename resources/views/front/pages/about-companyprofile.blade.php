@extends('front.layouts.primary')
@section('content')
<!-- INNER CONTENT -->
<div class="inner-content">
    <div class="container">

        <!-- ABOUT -->
        <div class="section-about space100">
            <div class="row">
                <div class="col-md-6">
                    <div>
                        <img src="{{ asset($about->path) }}" class="img-responsive" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div>
                        {!! $about->deskripsi !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection