@extends('templates.admin_templates.main')

@section('title', 'Detail Tanggapan')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Detail Tanggapan</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">ID Tanggapan : {{ $tanggapan->id }}</h6>
        </div>
        <div class="card-body">
            <img src="../storage/{{ $tanggapan->pengaduan->foto }}" alt="" class="card-img-top col-xl-12">
            <div class="table-responsive">
                <style>
                    .table tr td {
                        border: none;
                    }
                </style>
                <table class="table" style="margin-top: 20px !important;">
                    <tr>
                        <td style="border-bottom: 1px solid #ccc !important;" align="left" class="font-weight-bold">Judul Laporan/Pengaduan : {{ $tanggapan->pengaduan->judul_laporan }} </td>
                        <td style="border-bottom: 1px solid #ccc !important;" align="right" class="font-weight-bold">Pengirim : {{ $tanggapan->pengaduan->nik }} - {{ $tanggapan->pengaduan->user->name }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Pengaduan : {{ \Carbon\Carbon::create($tanggapan->tgl_pengaduan)->format('d F Y') }}</td>
                        <td align="right">Petugas Penanggap : {{ $tanggapan->petugas->nik }} - {{ $tanggapan->petugas->name }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Tanggapan : {{ \Carbon\Carbon::create($tanggapan->tgl_tanggapan)->format('d F Y') }}</td>
                    </tr>
                    <tr>
                        <td>Isi Laporan</td>
                        <td>
                            <textarea style="width: 100%;border: 1px solid #ccc;outline: none" rows=8 readonly>{{ $tanggapan->pengaduan->isi_laporan }}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Tanggapan</td>
                        <td>
                            <textarea style="width: 100%;border: 1px solid #ccc;outline: none" rows=8 readonly>{{ $tanggapan->tanggapan }}</textarea>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <a onclick="window.history.back();" style="color: #fff;cursor: pointer" class="btn btn-secondary"> <i class="fa fa-angle-left"></i> Kembali</a>
            <a href="/admin/tanggapan/{{ $tanggapan->id }}/edit" class="btn btn-warning"> <i class="fa fa-edit"></i> Edit </a>
            @if(Auth::user()->level == 'Admin')
                <a href="/admin/tanggapan/cetak/{{ $tanggapan->id }}" target="_blank" class="btn btn-success"> <i class="fa fa-print"></i> Cetak</a>
            @endif
        </div>
    </div>

</div>
@endsection