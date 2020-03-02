@extends('templates.admin.main')
@section('title') {{ $title }} @endsection
@section('style')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('back/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endsection
@section('script')
    <!-- DataTables -->
    <script src="{{ asset('back/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('back/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    <!-- page script -->
    <script>
    $(function () {
        $('#table').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        });
    });
    </script>
@endsection


@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data {{ $title }}</h3>
                <div class="float-right">
                    <!-- add modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-add-modal-lg">Add {{ $title }}</button>
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
                            <th>Nama</th>
                            <th>Details</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->category_name }}</td>
                            <td>{{ $item->category_detail }}</td>
                            <td>
                                <a href="{{ route('panel.category.edit', $item->id ) }}" class="btn btn-warning">Edit</a>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target=".bd-delete-modal-lg{{$item->id}}">Delete</button>
                                {{-- <a href="{{ route('panel.category.destroy', $item->id ) }}" type="button" class="btn btn-danger" onclick="return confirm('Apa anda yakin?')">Delete</a> --}}

                              <!-- add modal -->
                                <div class="modal fade bd-delete-modal-lg{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Delete Category</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h5> Apakah anda yakin untuk menghapus {{$item->category_name}} ?</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <form method="post" action="{{ route('panel.category.destroy', $item->id ) }}" class="d-inline">
                                                    @method('delete') @csrf
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                                    </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Details</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div><!-- /.card -->
    </div>

    <!-- add modal -->
    <div class="modal fade bd-add-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add {{ $title }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{ route('panel.category.store') }}">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group row">
                            <label for="category_name" class="col-sm-2 col-form-label">Nama Category</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('category_name') is-invalid @enderror" id="category_name" name="category_name" onkeyup='saveValue(this);'>
                                @error('category_name')
                                <label class="col-form-label" for="category_name">
                                    {{ $message }}
                                </label>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="category_detail" class="col-sm-2 col-form-label">Detail Category</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="category_detail" name="category_detail" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
