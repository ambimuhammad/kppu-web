@extends('layouts.app')
@push('css')
<!-- summernote -->
<link rel="stylesheet" href="{{ asset('template/plugins/summernote/summernote-bs4.css') }}">
<link rel="stylesheet" href="{{ asset('css/Artikel/component.artikel.css') }}">
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
        <form role="form" action="{{ route('about.update', $about->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $about->id }}">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit About</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="tag">Jenis</label>
                                <select class="form-control select-jenis" name="jenis_about"
                                    data-placeholder="Pilih Jenis" style="width:100%;">
                                    <option value="Draft"
                                        {{ ($artikel->jenis_about == 'company profile') ? 'selected' : '' }}>Company
                                        Profil
                                    </option>
                                    <option value="Publish"
                                        {{ ($artikel->jenis_about == 'visi misi') ? 'selected' : '' }}>
                                        Visi & Misi</option>
                                </select>
                                @error('kategori_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="container">
                                    <img class="mt-3" id="output_image_edit" src="{{ asset($about->path) }}">
                                    <img class="mt-3" id="output_image">
                                    <div class="overlay"></div>
                                    <div class="button">
                                        <div class="upload-btn-wrapper">
                                            <button class="btn btn-primary">Change Image</button>
                                            <input type="file" name="company_image" class="form-control"
                                                accept="image/*" onchange="preview_image(event)">
                                        </div>
                                    </div>
                                </div>
                                @error('company_image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea name="deskripsi"
                                    class="textarea form-control {{ $errors->has('deskripsi') ? 'is-invalid':'' }}"
                                    placeholder="Place some text here"
                                    style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                    cols="5">{{ $about->deskripsi }}</textarea>
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
<script src="{{ asset('js/Artikel/component-artikel.min.js') }}"></script>
@endpush