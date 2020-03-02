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
                <a href="{{ route('panel.category.index', $category->id ) }}" class="btn btn-secondary">Back</a>
                <a href="{{ route('panel.category.edit', $category->id ) }}" class="btn btn-warning">Edit</a>
            </div>
        </div>
        <!-- /.card-header -->

        <!-- form start -->
        <form class="form-horizontal">
            <div class="card-body">
                <div class="form-group row">
                    <label for="name_contributor" class="col-sm-2 col-form-label">Category</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control-plaintext" id="name_contributor" name="name_contributor" value="{{ $category->category_name }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email_contributor" class="col-sm-2 col-form-label">Detail Category</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control-plaintext" id="email_contributor" name="email_contributor" value="{{ $category->category_detail }}" disabled>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </form>
    </div>
    <!-- /.card -->

</div>
@endsection

