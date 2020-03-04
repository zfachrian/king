@extends('back.templates.main')
@section('title') {{ $title }} @endsection
@section('style')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('back/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
   <!-- summernote -->
   <link rel="stylesheet" href="{{ asset('back/plugins/summernote/summernote-bs4.css') }}">
@endsection
@section('script')
    <!-- DataTables -->
    <script src="{{ asset('back/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('back/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('back/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- page script -->
    <script>
    $(function () {
        $('#table').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        });
    });
    </script>
    <script>
    $(function () {
        // Summernote
        $('.textarea').summernote()
    })
    </script>

@endsection


@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data {{ $title }}</h3>
                <div class="float-right">
                    <!-- add modal -->
                    {{-- <a href="{{ route('panel.news.create') }}" class="btn btn-primary">Add {{ $title }}</a> --}}
                </div>
            </div>
            <div class="card-body">
                <!-- /.card-header -->
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
                <table id="table" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Kontributor</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($data as $title) --}}
                        <tr>
                            {{-- <td>{{ $loop->iteration }}</td>
                            <td>{{ $title->news_title }}</td>
                            <td>{{ $title->contributors->name_contributor }}</td> --}}
                            <td>
                                {{-- <a href="{{ route('panel.news.edit', $title->id ) }}" class="btn btn-warning"> edit </a> --}}
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target=".bd-delete-modal-lg">Delete</button>
                            </td>
                        </tr>
                        {{-- @endforeach --}}
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Kontributor</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div><!-- /.card -->
    </div>

    <!-- add modal -->
    <div class="modal fade bd-add-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add {{ $title }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group row">
                            <label for="news_title" class="col-sm-2 col-form-label">Judul</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('news_title') is-invalid @enderror" id="news_title" name="news_title" onkeyup='saveValue(this);'>
                                @error('news_title')
                                <label class="col-form-label" for="news_title">
                                    {{ $message }}
                                </label>
                                @enderror
                            </div>
                        </div>
                    <textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- add modal -->
    <div class="modal fade bd-delete-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete {{ $title }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                    <div class="modal-body">
                        <h5> Apakah anda yakin untuk menghapus ?</h5>
                    </div>
                    <div class="modal-footer">
                        {{-- <form method="post" action="{{ route('panel.news.destroy', $title->id ) }}" class="d-inline"> --}}
                            @method('delete') @csrf
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </form>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>

            </div>
        </div>
    </div>

@endsection
