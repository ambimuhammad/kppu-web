@extends('front.layouts.primary')
@section('content')
<!-- INNER CONTENT -->
<div class="inner-content">
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <div class="blog-single">
                    <article class="blogpost">
                        <h2 class="post-title"><a href="#">{{ $product->kategori->nama_kategori }}</a></h2>
                        <div class="space30"></div>
                        {!! htmlspecialchars_decode($product->deskripsi_produk) !!}
                    </article>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection