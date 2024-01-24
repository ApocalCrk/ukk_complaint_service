@extends('templates.admin_templates.main')

@section('title', 'Data Masyarakat')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Aduan</h1>
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
                <th>Judul Aduan</th>
                <th>Tanggal Aduan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($aduan as $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $row->user->nik.' - '.$row->user->name }}</td>
                    <td>{{ $row->judul_laporan }}</td>
                    <td>{{ \Carbon\Carbon::create($row->tgl_pengaduan)->format('d F Y') }}</td>
                    <td>
                        <a href="/admin/pengaduan/detail/{{ $row->id }}" class="badge badge-primary"> <i class="fa fa-eye"></i> Detail </a>
                        @if(Auth::user()->level == 'Admin')
                        <a href="/admin/pengaduan/cetak/{{ $row->id }}" target="_blank" class="badge badge-success"> <i class="fa fa-print"></i> Cetak </a>
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
@endsection