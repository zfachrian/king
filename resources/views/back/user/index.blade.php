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
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        });
    });
    </script>
@endsection


@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data User</h3>
            </div>
            <div class="card-body">
                <table id="table" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->username }}</td>
                            <td></td>
                        </tr>                     
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div><!-- /.card -->
    </div>
@endsection

