@extends('front.layouts.primary')
@section('content')
<!-- PAGE HEADER -->
<div class="page_header">
    <div class="page_header_parallax2">
        <div class="container">
            <div class="col-md-12">
                <h3 class="text-center">Page not found</h3>
            </div>
        </div>
    </div>
</div>

<!-- 404 ERROR CONTENT -->
<div class="inner-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center error-404">
                <h2>404</h2>
                <p>Error 404! Sorry, the page you requested was not found.</p>
                <div class="clearfix"></div>
                <a href="{{ route('front.index') }}" class="button btn-center"><i
                        class="icon-circle-arrow-left"></i>Back to Home</a>
            </div>
        </div>
    </div>
</div>
@endsection