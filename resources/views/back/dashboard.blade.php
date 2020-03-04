@extends('back.templates.main')
@section('title') {{ $title }} @endsection
@section('style')@endsection
@section('script')@endsection


@section('content')
    <div class="col-lg-12">
        <div class="card">
        <div class="card-body">
            <h5 class="card-title"></h5>

            <p class="card-text">
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Congratulattion, Welcome to shoesmart panel</h4>
                    <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
                    <hr>
                    <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
                </div>
            </p>
        </div>
        </div><!-- /.card -->
    </div>
@endsection

