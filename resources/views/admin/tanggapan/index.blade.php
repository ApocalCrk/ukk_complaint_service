@extends('templates.admin_templates.main')

@section('title', 'Data Tanggapan')

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
    <h1 class="h3 mb-0 text-gray-800">Data Tanggapan</h1>
</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="data" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Pengaduan</th>
                    <th>Pengadu</th>
                    <th>Tanggal Tanggapan</th>
                    <th>Petugas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tanggapan as $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $row->id_pengaduan }}</td>
                    <td>{{ $row->pengaduan->nik.' - '.$row->pengaduan->user->name }}</td>
                    <td>{{ \Carbon\Carbon::create($row->tgl_tanggapan)->format('d F Y') }}</td>
                    <td>{{ $row->petugas->name }}</td>
                    <td>
                        <a href="/admin/tanggapan/{{ $row->id }}" class="badge badge-primary"><i class="fa fa-eye"></i> </a>
                        <a href="/admin/tanggapan/{{ $row->id }}/edit" class="badge badge-warning"><i class="fa fa-edit"></i> </a>
                        <form action="/admin/tanggapan/{{ $row->id }}" class="d-none delete_tanggapan" method="post">@csrf @method('DELETE')</form>
                        <a style="color: #fff;cursor: pointer" onclick="delete_tanggapan()" class="badge badge-danger"><i class="fa fa-trash"></i> </a>
                        @if(Auth::user()->level == 'Admin')
                        <a href="/admin/tanggapan/cetak/{{ $row->id }}" target="_blank" class="badge badge-success"><i class="fa fa-print"></i> </a>
                        @endif
                    </td>
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
function delete_tanggapan() {
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
        $('.delete_tanggapan').submit();
    }
    })
}
</script>
@endsection