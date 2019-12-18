@extends('layouts.app')
@push('css')
<link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all" rel="stylesheet"
    type="text/css" />
<!-- summernote -->
<link rel="stylesheet" href="{{ asset('template/plugins/summernote/summernote-bs4.css') }}">
<style type="text/css">
    .fileinput-upload,
    .fileinput-upload-button,
    .kv-file-upload {
        display: none;
    }
</style>
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
        <form role="form" action="{{ route('recent.update', $recent->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $recent->id }}">
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
                                    id="kategori_recent_work"
                                    value="{{ old('kategori_recent_work') ?? $recent->kategori_recent_work }}"
                                    placeholder="Kategori Recent Work">
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
                                    id="name_recent_work"
                                    value="{{ old('name_recent_work') ?? $recent->name_recent_work }}"
                                    placeholder="Name Recent Work">
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
                                    cols="5">{!! htmlspecialchars_decode($recent->deskripsi_recent_work) !!}</textarea>
                                @error('deskripsi_recent_work')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="judul">Image</label>
                                <div class="file-loading">
                                    <input id="file-1" type="file" name="gallery_name[]" multiple class="file"
                                        data-overwrite-initial="false" data-min-file-count="2">
                                </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js" type="text/javascript">
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js"
    type="text/javascript"></script>
<!-- Summernote -->
<script src="{{ asset('template/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('js/RecentWork/component-recent-work.min.js') }}"></script>
<script>
    $("#file-1").fileinput({
    theme: 'fa',
    uploadUrl: "#",
    allowedFileExtensions: ['jpg', 'jpeg', 'png', 'gif'],
    overwriteInitial: false,
    maxFileSize: 2000,
    maxFilesNum: 10,
    initialPreview: [
        @foreach($recent->galleries as $gallery)
        '<img src="{{ asset($gallery->path) }}" class="kv-preview-data file-preview-image">',
        @endforeach
    ]
});
</script>
@endpush