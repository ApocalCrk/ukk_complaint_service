@extends('templates.public_templates.main')

@section('title', 'Detail Pengaduan')

@section('content')
<div class="invoice-wrapper">
    <div class="invoice-header">
        <div class="left">
            <h3>ID Pengaduan : {{ $pengaduan->id }}</h3>
        </div>
        <div class="right">
            <div class="controls">
                @if($pengaduan->status == '0')
                <a class="action" href="/masyarakat/pengaduan/{{ $pengaduan->id }}/edit">
                    <i data-feather="edit-3"></i>
                </a>
                @endif
                <a class="action" href="/masyarakat/pengaduan">
                    <i data-feather="arrow-left"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="invoice-body">
        <div class="invoice-card">
            <div class="invoice-section is-flex is-bordered">
                <div class="h-avatar is-large">
                    <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="../storage/{{ Auth::user()->foto }}" alt="" data-user-popover="6">
                </div>
                <div class="meta">
                    <h3>{{ $pengaduan->user->name }}</h3>
                    <span>{{ $pengaduan->user->email }}</span>
                    <span>{{ $pengaduan->user->telp }}</span>
                </div>
                <div class="end">
                    <h3>Judul Aduan : {{ $pengaduan->judul_laporan }}</h3>
                    <span>Tanggal Aduan : {{ \Carbon\Carbon::create($pengaduan->tgl_pengaduan)->format('d F Y') }}</span>
                    <span>Status : 
                        @if($pengaduan->status == '0')
                            Aduan belum diproses
                        @elseif($pengaduan->status == 'Proses')
                            Aduan sedang diproses
                        @elseif($pengaduan->status == 'Selesai')
                            Aduan sudah selesai
                        @endif
                    </span>
                </div>
            </div>
            <div class="invoice-section is-flex is-bordered">
                <img src="../storage/{{ $pengaduan->foto }}" alt="">
            </div>
            <div class="invoice-section">
                <div class="flex-table">
                    <h1 class="is-grow dark-text dark-inverted" style="font-size: 20px;">Isi Aduan</h1>
                        <textarea class="textarea dark-text dark-inverted" style="font-size: 14px;" readonly disabled>{{ $pengaduan->isi_laporan }}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
@if(count($tanggapan)==1)
@foreach($tanggapan as $row)
<div class="invoice-wrapper">
    <div class="invoice-header">
        <div class="left">
            <h3>Tanggapan</h3>
        </div>
    </div>
    <div class="invoice-body">
        <div class="invoice-card">
            <div class="invoice-section is-flex is-bordered">
                <div class="h-avatar is-large">
                    <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="../storage/{{ $row->petugas->foto }}" alt="">
                </div>
                <div class="meta">
                    <h3>{{ $row->petugas->name }}</h3>
                </div>
                <div class="end">
                    <h3>ID Tanggapan : {{ $row->id }}</h3>
                    <span>Tanggal Tanggapan : {{ \Carbon\Carbon::create($row->tgl_tanggapan)->format('d F Y') }}</span>
                    <span>{{ $row->petugas->level }}</span>
                </div>
            </div>
            <div class="invoice-section">
                <div class="flex-table">
                    <h1 class="is-grow dark-text dark-inverted" style="font-size: 20px;">Tanggapan</h1>
                    <!--Table item-->
                    <div class="flex-table-item">
                        <p class="dark-text dark-inverted" style="font-size: 14px;">
                            {{ $row->tanggapan }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endif
@endsection