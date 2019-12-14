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
<script src="{{ asset('js/RecentWork/component-recent-work.min.js') }}"></script>
@endpush