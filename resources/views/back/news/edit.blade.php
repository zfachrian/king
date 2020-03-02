@extends('templates.admin.main')
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
                <form method="post" action="{{ route('panel.news.update', $news->id) }}" enctype="multipart/form-data">
                    @method('put') @csrf
                    <div class="modal-body">
                        @csrf
                        <div class="form-group row d-flex justify-content-center">
                            <div class="col-sm-2">
                                <label for="news_image" class="col-form-label">Foto</label>
                            </div>
                            <div class="col-sm-10">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="news_image" name="news_image">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                                <label>pastikan ukuran foto tidak lebih dari 2mb (dimension : 1904 x 752)</label>
                                <img id="image_preview" src="{{ asset('images/news/'.$news->news_image) }}" class="img-thumbnail">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="news_title" class="col-sm-2 col-form-label">Judul</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('news_title') is-invalid @enderror" id="news_title" name="news_title" value="{{ $news->news_title }}">
                                @error('news_title')
                                <label class="col-form-label" for="news_title">
                                    {{ $message }}
                                </label>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="news_content" class="col-sm-2 col-form-label">Konten</label>
                            <div class="col-sm-10">
                                <textarea name="news_content" id="news_content" rows="10" cols="80">{!! $news->news_content !!}</textarea>                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="news_tags" class="col-sm-2 col-form-label">Tags</label>
                            <div class="col-sm-10">
                                <div data-tags-input-name="tag" id="tagBox">{{ $news->tags}}</div>
                                <label>input your tag and end with a comma eg: tips, trick,</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="category_id[]" class="col-sm-2 col-form-label">Kategori</label>
                            <div class="col-sm-10">
                                <select class="select2" name="category_id[]" multiple="multiple" data-placeholder="Select a Categori" style="width: 100%;">
                                    @foreach ($data['category'] as $item)
                                    <option value="{{ $item->id }}" @if(in_array($item->id, $acategory)) selected @endif>{{ $item->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="contributor_id" class="col-sm-2 col-form-label">Kontributor</label>
                            <div class="col-sm-10">
                                <select class="form-control select2" name="contributor_id" style="width: 100%;">
                                    @foreach ($data['contributor'] as $item)
                                        <option value="{{ $item->id }}" @if($item->id == $news->contributors->id) selected @endif>{{ $item->name_contributor }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div><!-- /.card -->
    </div>

@endsection
