@extends('templates.admin_templates.main')

@section('title', 'Data Petugas')

@section('content')
@if(session('pesan'))
    <script>
        swal.fire({
            'icon':'success',
            'title': "{{ session('pesan') }}",
            'showConfirmButton': false,
            'timer': 2000
        });
    </script>
@endif
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Petugas</h1>
    @if(Auth::user()->level == 'Admin')
    <a href="/admin/petugas/cetak" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Cetak Laporan</a>
    @endif
</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-body">
    <div class="table-responsive">
    <table class="table table-bordered" id="data" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No Telp</th>
                @if(Auth::user()->level == 'Admin')
                <th>Aksi</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($data_petugas as $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $row->nik }}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->email }}</td>
                    <td>{{ $row->telp }}</td>
                    @if(Auth::user()->level == 'Admin')
                    <td>
                        <a href="/admin/petugas/user/{{ $row->id }}/edit" class="badge badge-warning"> <i class="fa fa-edit"></i> Edit</a>
                        <form action="/admin/user/{{ $row->id }}" method="post" class="delete_form d-none">@csrf @method('DELETE')</form>
                        <a style="color: #fff;cursor: pointer;" class="badge badge-danger" onclick="delete_pgs()"> <i class="fa fa-trash"></i> Hapus</a>
                    </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
</div>

<script>
$(document).ready(function() {
    $('#data').dataTable();
});
</script>
<script>
function delete_pgs() {
    Swal.fire({
    title: 'Apakah kamu yakin?',
    text: "Data yang sudah di hapus tidak dapat di kembalikan",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Hapus',
    cancelButtonText: 'Batal'
    }).then((result) => {
    if (result.isConfirmed) {
        $('.delete_form').submit();
    }
    })
}
</script>
@endsection