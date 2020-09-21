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
                        <img src="{{ asset($service->path) }}" class="img-responsive" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div>
                        {!! $service->deskripsi !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection