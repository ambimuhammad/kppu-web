@extends('layouts.app')
@push('css')
<!-- summernote -->
<link rel="stylesheet" href="{{ asset('template/plugins/summernote/summernote-bs4.css') }}">
@endpush
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="mb-3">Manajemen About</h1>
                <a href="{{ route('about.index') }}" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i>
                    Kembali</a>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Manajemen About</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <!-- /.card-header -->
        <form role="form" action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tambah About</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea name="deskripsi"
                                    class="textarea form-control {{ $errors->has('deskripsi') ? 'is-invalid':'' }}"
                                    placeholder="Place some text here"
                                    style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                    cols="5"></textarea>
                                @error('deskripsi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
@push('script')
</script>
<!-- Summernote -->
<script src="{{ asset('template/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('js/about/component-about.min.js') }}"></script>
@endpush