@extends('layouts.app')
@push('css')
<link rel="stylesheet" href="{{ asset('template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('template/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" type="text/css"
    href="//unpkg.com/file-upload-with-preview@4.0.2/dist/file-upload-with-preview.min.css">
<!-- Tempusdominus Bbootstrap 4 -->
<link rel="stylesheet" href="{{ asset('template/plugins/daterangepicker/daterangepicker.css') }}">
<!-- summernote -->
<link rel="stylesheet" href="{{ asset('template/plugins/summernote/summernote-bs4.css') }}">
@endpush
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="mb-3">Manajemen Artikel</h1>
                <a href="{{ route('artikel.index') }}" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i>
                    Kembali</a>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Manajemen Artikel</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <!-- /.card-header -->
        <form role="form" action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Artikel</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input type="text" id="slugs" name="judul"
                                    class="form-control {{ $errors->has('judul') ? 'is-invalid':'' }}" id="judul"
                                    placeholder="Judul">
                                @error('judul')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            https://dirgatz.co.id/artikel/
                                        </div>
                                    </div>
                                    <input type="text" id="convert_slug" name="slug" readonly="readonly"
                                        class="form-control" placeholder="url-address">
                                </div>
                                @error('slug')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea name="deskripsi" class="textarea" placeholder="Place some text here"
                                    style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                    cols="5"></textarea>
                                @error('deskripsi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="meta name">Meta Name</label>
                                <input type="text" name="meta_name"
                                    class="form-control {{ $errors->has('meta_name') ? 'is-invalid':'' }}"
                                    id="meta_name" placeholder="Meta Name">
                                @error('meta_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="meta deskripsi">Meta Description</label>
                                <input type="text" name="meta_description"
                                    class="form-control {{ $errors->has('meta_description') ? 'is-invalid':'' }}"
                                    id="meta_description" placeholder="Meta Description">
                                @error('meta_description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="meta tag">Meta Tags</label>
                                <input type="text" name="meta_tags"
                                    class="form-control {{ $errors->has('meta_tags') ? 'is-invalid':'' }}"
                                    id="meta_tags" placeholder="Meta Tags">
                                @error('meta_tags')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Published</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="tag">Status</label>
                                <select class="form-control select-status" name="status">
                                    <option></option>
                                    <option value="Draft">Draft</option>
                                    <option value="Publish">Publish</option>
                                </select>
                                @error('kategori_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tag">Kategori</label>
                                <select class="form-control select-kategori" multiple name="kategori_id">
                                    <option></option>
                                    @foreach($kategori as $kat)
                                    <option value="{{ $kat->id }}">{{ $kat->nama_kategori }}</option>
                                    @endforeach
                                </select>
                                @error('kategori_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tag">Tag</label>
                                <select class="form-control select-tag" multiple name="tag_id">
                                    <option></option>
                                    @foreach($tag as $tags)
                                    <option value="{{ $tags->id }}">{{ $tags->nama_tag }}</option>
                                    @endforeach
                                </select>
                                @error('tag_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Date and Time Publish</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar"></i></span>
                                    </div>
                                    <input type="text" name="published_at" class="form-control float-right"
                                        id="reservationtime">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Featured Image</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="custom-file-container" data-upload-id="myUniqueUploadId">
                                    <label>Upload File <a href="javascript:void(0)"
                                            class="custom-file-container__image-clear"
                                            title="Clear Image">&times;</a></label>
                                    <label class="custom-file-container__custom-file">
                                        <input type="file" name="featured_image"
                                            class="custom-file-container__custom-file__custom-file-input" accept="*"
                                            aria-label="Choose File">
                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                    </label>
                                    <div class="custom-file-container__image-preview"></div>
                                </div>
                                @error('featured_image')
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
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('template/plugins/daterangepicker/moment.min.js') }}"></script>
<script src="{{ asset('template/plugins/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('template/plugins/select2/js/select2.min.js') }}"></script>
<script src="//unpkg.com/file-upload-with-preview@4.0.2/dist/file-upload-with-preview.min.js"></script>
</script>
<!-- Summernote -->
<script src="{{ asset('template/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('js/Artikel/component-artikel.min.js') }}"></script>
@endpush
