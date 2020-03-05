@extends('back.templates.main')
@section('title') {{ $title }} @endsection
@section('style')
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('back/plugins/summernote/summernote-bs4.css') }}">
    <!-- Tagging -->
    <link href="{{ asset('back/plugins/taggingJS-master/tag-basic-style.css') }}" rel="stylesheet">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('back/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('back/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- CkEditor 4 full -->
    <script src="{{ asset('back/plugins/ckeditor/ckeditor.js') }}"></script>
@endsection
@section('script')
    <!-- Summernote -->
    <script src="{{ asset('back/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- Tagging -->
    <script src="{{ asset('back/plugins/taggingJS-master/tagging.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('back/plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- CkFinder -->
    <script type="text/javascript" src="{{ asset('js/ckfinder/ckfinder.js') }}"></script>
    <script>CKFinder.config( { connectorPath: 'ckfinder/connector' } );</script>
    <!-- page script -->
    <script>
    $(function () {
        // Summernote
        $('.summernote').summernote({
            height: 350,   //set editable area's height
            codemirror: { // codemirror options
                theme: 'monokai'
            }
        })
    })
    </script>
    <script>
        $("#tagBox").tagging();
    </script>
    <script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
    })
    </script>

    <script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
            $('#image_preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#news_image").change(function() {
        readURL(this);
    });
    </script>
    <script>
        // var editor = CKEDITOR.replace( 'news_content' );
        // CKFinder.setupCKEditor( editor );

        CKEDITOR.replace( 'news_content',
        {
            filebrowserBrowseUrl: '/js/ckfinder/ckfinder.html?popup=1&configId=news_content&CKEditor=news_content&CKEditorFuncNum=1&langCode=en',
            filebrowserImageBrowseUrl: '/js/ckfinder/ckfinder.html?popup=1&configId=news_content&CKEditor=news_content&CKEditorFuncNum=1&langCode=en',
            filebrowserUploadUrl: '/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
            filebrowserImageUploadUrl: '/js /ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
        });
    </script>
@endsection


@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data {{ $title }}</h3>
            </div>
            <div class="card-body">
                <!-- /.card-header -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                @endif
                <form method="post" action="{{ route('stock.store') }}" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group row">
                            <label for="barang" class="col-sm-2 col-form-label">Barang</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('barang') is-invalid @enderror" id="barang" name="barang" value="{{ old('barang') }}">
                                @error('barang')
                                <label class="col-form-label" for="barang">
                                    {{ $message }}
                                </label>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="stok" class="col-sm-2 col-form-label">Stok</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control @error('stok') is-invalid @enderror" id="stok" name="stok" value="{{ old('stok') }}">
                                @error('stok')
                                <label class="col-form-label" for="stok">
                                    {{ $message }}
                                </label>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kadaluarsa" class="col-sm-2 col-form-label">Tgl Kadaluarsa</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control @error('kadaluarsa') is-invalid @enderror" id="kadaluarsa" name="kadaluarsa" value="{{ old('kadaluarsa') }}">
                                @error('kadaluarsa')
                                <label class="col-form-label" for="kadaluarsa">
                                    {{ $message }}
                                </label>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                            <div class="col-sm-10">
                                <input type="textarea" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" value="{{ old('keterangan') }}">
                                @error('keterangan')
                                <label class="col-form-label" for="keterangan">
                                    {{ $message }}
                                </label>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div><!-- /.card -->
    </div>

@endsection
