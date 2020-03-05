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
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-add-modal-lg">Tambah Data</button>
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
                            <th>Barang</th>
                            <th>Stock</th>
                            <th>Tgl Kadaluarsa</th>
                            <th>Keterangan</th>
                            <th>Menu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $stock)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $stock->barang }}</td>
                            <td>{{ $stock->stock}}</td>
                            <td>{{ $stock->tgl_kadaluarsa}}</td>
                            <td>{{ $stock->keterangan}}</td>
                            <td>
                                <a href="{{ route('stock.edit', $stock->id ) }}" class="btn btn-warning"> edit </a>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target=".bd-delete-modal-lg{{ $stock->id }}">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Barang</th>
                            <th>Stock</th>
                            <th>Tgl Kadaluarsa</th>
                            <th>Keterangan</th>
                            <th>Menu</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div><!-- /.card -->
    </div>

  <!-- add stok modal -->
  <div class="modal fade bd-add-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Contributor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
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
        </div>
    </div>

    <!-- add modal -->
    <div class="modal fade bd-delete-modal-lg{{ $stock->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                        <form method="post" action="{{ route('stock.destroy', $stock->id ) }}" class="d-inline">
                            @method('delete') @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>

            </div>
        </div>
    </div>

@endsection
