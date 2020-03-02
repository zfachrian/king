@extends('templates.admin.main')
@section('title') {{ $title }} @endsection
@section('style')
@endsection
@section('script')
@endsection


@section('content')
<div class="col-md-5">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <!-- Horizontal Form -->
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">{{ $title }} Details</h3>
            <div class="float-right">
                <!-- add modal -->
                <a href="{{ route('panel.contributor.index') }}" class="btn btn-secondary">Back</a>
                <a href="{{ route('panel.contributor.edit', $contributor->id ) }}" class="btn btn-warning">Edit</a>
            </div>
        </div>
        <!-- /.card-header -->

        <!-- form start -->
        <form class="form-horizontal">
            <div class="card-body">
                <div class="form-group row">
                    <label for="name_contributor" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control-plaintext" id="name_contributor" name="name_contributor" value="{{ $contributor->name_contributor }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email_contributor" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control-plaintext" id="email_contributor" name="email_contributor" value="{{ $contributor->email_contributor }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="telephone_contributor" class="col-sm-2 col-form-label">No. Telp</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control-plaintext" id="telephone_contributor" name="telephone_contributor"  value="{{ $contributor->telephone_contributor }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="profile_contributor" class="col-sm-2 col-form-label">Profil</label>
                    <div class="col-sm-10">
                        <textarea class="form-control-plaintext" id="profile_contributor" name="profile_contributor" rows="3" disabled>{{ $contributor->profile_contributor }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="profile_contributor" class="col-sm-2 col-form-label">Contributor Image</label>
                    <div class="col-sm-10">
                        {{-- <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image_contributor" name="image_contributor">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div> --}}
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

