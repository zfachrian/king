@extends('templates.admin.main')
@section('title') {{ $title }} @endsection
@section('style')
@endsection
@section('script')
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

    $("#image_contributor").change(function() {
        readURL(this);
    });
    </script>
@endsection


@section('content')
<div class="col-md-5">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- Horizontal Form -->
    <div class="card card-secondary">
        <!-- Session -->
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <!-- form start -->
        <form method="post" action="{{ route('panel.contributor.update', $contributor->id) }}" class="form-horizontal" enctype="multipart/form-data">
            @method('put') @csrf <input type="hidden" name="id" value="{{ $contributor->id }}">
            <div class="card-header">
                <h3 class="card-title">{{ $title }} Details</h3>
                <div class="float-right">
                    <!-- add modal -->
                    <a href="{{ route('panel.contributor.index') }}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="form-group row">
                    <label for="name_contributor" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name_contributor" name="name_contributor" value="{{ $contributor->name_contributor }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email_contributor" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email_contributor" name="email_contributor" value="{{ $contributor->email_contributor }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="telephone_contributor" class="col-sm-2 col-form-label">No. Telp</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="telephone_contributor" name="telephone_contributor"  value="{{ $contributor->telephone_contributor }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="profile_contributor" class="col-sm-2 col-form-label">Profil</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="profile_contributor" name="profile_contributor" rows="3">{{ $contributor->profile_contributor }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="profile_contributor" class="col-sm-2 col-form-label">Contributor Image</label>
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image_contributor" name="image_contributor">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                        <img id="image_preview" src="{{ asset('images/contributor/'.$contributor->image_contributor)}}" class="img-thumbnail">
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </form>
    </div>
    <!-- /.card -->

</div>
@endsection

