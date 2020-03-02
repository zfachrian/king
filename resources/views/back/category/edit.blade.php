@extends('templates.admin.main')
@section('title') {{ $title }} @endsection
@section('style')
@endsection
@section('script')
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
        <!-- form start -->
        <form method="post" action="{{ route('panel.category.update', $category->id) }}" class="form-horizontal">
            @method('put') @csrf <input type="hidden" name="id" value="{{ $category->id }}">
            <div class="card-header">
                <h3 class="card-title">{{ $title }} Details</h3>
                <div class="float-right">
                    <!-- add modal -->
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="form-group row">
                    <label for="category_name" class="col-sm-2 col-form-label">Nama Kategori</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="category_name" name="category_name" value="{{ $category->category_name }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="category_detail" class="col-sm-2 col-form-label">Detail Kategori</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="category_detail" name="category_detail" value="{{ $category->category_detail }}">
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </form>
    </div>
    <!-- /.card -->

</div>
@endsection

