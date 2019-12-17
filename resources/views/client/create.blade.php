@extends('layouts.app')
@push('css')
<link rel="stylesheet" href="{{ asset('template/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
<!-- summernote -->
<link rel="stylesheet" href="{{ asset('template/plugins/summernote/summernote-bs4.css') }}">
<link rel="stylesheet" href="{{ asset('css/image-preview.min.css') }}">
@endpush
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="mb-3">Manajemen Klien</h1>
                <a href="{{ route('client.index') }}" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i>
                    Kembali</a>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Manajemen Klien</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <!-- /.card-header -->
        <form role="form" action="{{ route('client.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Klien</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama">Nama Klien</label>
                                <input type="text" name="nama_client"
                                    class="form-control  {{ $errors->has('nama_client') ? 'is-invalid':'' }}"
                                    placeholder="Nama Client">
                                @error('nama_client') <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="link">Link Klien</label>
                                <input type="text" name="link_client"
                                    class="form-control {{ $errors->has('link_client') ? 'is-invalid':'' }}"
                                    placeholder="Link Client">
                                @error('link_client') <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="logo">Logo Klien</label>
                                <input type="file" class="form-control" accept="image/*" onchange="preview_image(event)"
                                    name="logo_client">
                                <img class="mt-3" id="output_image">
                                @error('service_image')
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
<script src="{{ asset('template/plugins/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('template/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('js/Client/component-client.min.js') }}"></script>
<script src="{{ asset('js/image-preview.min.js') }}"></script>
@endpush