@extends('layouts.app')
@push('css')
<link rel="stylesheet" type="text/css"
    href="//unpkg.com/file-upload-with-preview@4.0.2/dist/file-upload-with-preview.min.css">
<!-- summernote -->
<link rel="stylesheet" href="{{ asset('template/plugins/summernote/summernote-bs4.css') }}">
@endpush
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="mb-3">Manajemen Recent Work</h1>
                <a href="{{ route('recent.index') }}" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i>
                    Kembali</a>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Manajemen Recent Work</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <!-- /.card-header -->
        <form role="form" action="{{ route('recent.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Recent Work</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="judul">Kategori Recent Work</label>
                                <input type="text" name="kategori_recent_work"
                                    class="form-control {{ $errors->has('kategori_recent_work') ? 'is-invalid':'' }}"
                                    id="kategori_recent_work" placeholder="Kategori Recent Work">
                                @error('kategori_recent_work')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="judul">Nama Recent Work</label>
                                <input type="text" name="name_recent_work"
                                    class="form-control {{ $errors->has('name_recent_work') ? 'is-invalid':'' }}"
                                    id="name_recent_work" placeholder="Name Recent Work">
                                @error('name_recent_work')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="judul">Deskripsi Recent Work</label>
                                <textarea name="deskripsi_recent_work"
                                    class="textarea form-control {{ $errors->has('deskripsi_recent_work') ? 'is-invalid':'' }}"
                                    placeholder="Place some text here"
                                    style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                    cols="5"></textarea>
                                @error('deskripsi_recent_work')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="custom-file-container" data-upload-id="myUniqueUploadId">
                                    <label>Upload File <a href="javascript:void(0)"
                                            class="custom-file-container__image-clear"
                                            title="Clear Image">&times;</a></label>
                                    <label class="custom-file-container__custom-file">
                                        <input type="file" name="galleries_name[]"
                                            class="custom-file-container__custom-file__custom-file-input" accept="*"
                                            multiple aria-label="Choose File">
                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                    </label>
                                    <div class="custom-file-container__image-preview"></div>
                                </div>
                                @error('galleries_name')
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
<script src="//unpkg.com/file-upload-with-preview@4.0.2/dist/file-upload-with-preview.min.js"></script>
<!-- Summernote -->
<script src="{{ asset('template/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('js/RecentWork/component-recent-work.min.js') }}"></script>
@endpush