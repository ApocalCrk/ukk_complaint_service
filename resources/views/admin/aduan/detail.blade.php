@extends('templates.admin_templates.main')

@section('title', 'Detail Aduan')

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
<h1 class="h3 mb-2 text-gray-800">Detail Aduan</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">ID Pengaduan : {{ $aduan->id }}</h6>
    </div>
    <div class="card-body">
        <img src="../storage/{{ $aduan->foto }}" alt="" class="card-img-top col-xl-12">
        <div class="table-responsive">
            <style>
                .table tr td {
                    border: none;
                }
            </style>
            <table class="table">
                <tr>
                    <td align="left" class="font-weight-bold">Judul Aduan : {{ $aduan->judul_laporan }}</td>
                    <td align="right" class="font-weight-bold">Pengirim : {{ $aduan->nik.' - '.$aduan->user->name }}</td>
                </tr>
                <tr>
                    <td>Tanggal Pengaduan : {{ \Carbon\Carbon::create($aduan->tgl_pengaduan)->format('d F Y') }}</td>
                </tr>
                <tr>
                    <td>Isi Laporan</td>
                    <td>
                        <textarea style="width: 100%;border: 1px solid #ccc;outline: none" rows=8 readonly>{{ $aduan->isi_laporan }}</textarea>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="card-footer">
        <a onclick="window.history.back();" style="color: #fff;cursor: pointer" class="btn btn-secondary"> <i class="fa fa-angle-left"></i> Kembali</a>
        @if($aduan->status == '0')
            <button class="btn btn-primary" data-toggle="modal" id="tanggapan" data-target="#exampleModal"><i class="fa fa-copy"></i> Tanggapi</button>
        @else
            <a href="/admin/tanggapan/{{ $aduan->tanggapan->id }}" class="btn btn-primary">Lihat Tanggapan</a>
        @endif
        @if(Auth::user()->level == 'Admin')
            <a href="/admin/pengaduan/cetak/{{ $aduan->id }}" target="_blank" class="btn btn-success"> <i class="fa fa-print"></i> Cetak</a>
        @endif
    </div>
</div>

<!-- Modal Tanggapi -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tanggapan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/admin/tanggapan" method="POST">
            @csrf
            <input type="text" name="id_pengaduan" id="id_pengaduan" value="{{ $aduan->id }}" class="id_pengaduan" readonly style="display: none;">
            <div class="form-group">
                <label for="tanggapan">Tanggapan</label>
                <textarea cols="30" rows="10" id="tanggapan" name="tanggapan" class="form-control @error('tanggapan') is-invalid @enderror"></textarea>
                @error('tanggapan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Kirim Tanggapan</button>
        </form>
      </div>
    </div>
  </div>
</div>

@if($errors->any())
<script>
$(document).ready(function() {
    $('#tanggapan').click();
});
</script>
@endif

@endsection