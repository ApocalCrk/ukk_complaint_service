@extends('templates.public_templates.main')

@section('title', 'Data Pengaduan')

@section('content')

@if(session('pesan'))
<script>
    $(document).ready(function() {
        const notyf = new Notyf({
        types: [
            {
            type: 'success',
            duration: 5000
            }
        ]
        });
        
        notyf.success("{{ session('pesan') }}");
    });
</script>
@endif
<div class="card-grid-toolbar">
    <div class="control has-icon">
        <input class="input custom-text-filter" placeholder="Cari aduan..." data-filter-target=".column" @if(count($pengaduan) == 0) disabled @endif>
        <div class="form-icon">
            <i data-feather="search"></i>
        </div>
    </div>
    <div class="buttons">
        <a href="/masyarakat/buat_aduan" class="button h-button is-primary is-raised">
            <span class="icon">
                    <i class="fas fa-plus"></i>
                </span>
            <span>Buat Aduan</span>
        </a>
    </div>
</div>
<div class="card-grid card-grid-v2">

    <!--List Empty Search Placeholder -->
    <div class="page-placeholder custom-text-filter-placeholder is-hidden">
        <div class="placeholder-content">
            <img class="light-image" src="assets/img/illustrations/placeholders/search-3.svg" alt="" />
            <img class="dark-image" src="assets/img/illustrations/placeholders/search-3-dark.svg" alt="" />
            <h3>Pencarian tidak ditemukan</h3>
            <p class="is-larger">Too bad. Looks like we couldn't find any matching results for the
                search terms you've entered. Please try different search terms or criteria.</p>
        </div>
    </div>

    <!--Card Grid v2-->
    <div class="columns is-multiline">
        @if(count($pengaduan) > 0)
        @foreach($pengaduan as $row)
            <div class="column is-4">
                <div class="card-grid-item">
                    <div class="card">
                        <header class="card-header">
                            <div class="card-header-title">
                                <div class="meta">
                                    <span class="dark-inverted" data-filter-match>{{ Auth::user()->name }}</span>
                                    <span>Diperbarui {{ $row->updated_at }}</span>
                                </div>
                            </div>
                            @if($row->status == '0')
                            <div class="card-header-icon">
                                <div class="dropdown is-spaced is-dots is-right dropdown-trigger">
                                    <div class="is-trigger" aria-haspopup="true">
                                        <i data-feather="more-vertical"></i>
                                    </div>
                                    <div class="dropdown-menu" role="menu">
                                        <div class="dropdown-content">
                                            <a href="/masyarakat/pengaduan/{{ $row->id }}/edit" class="dropdown-item is-media">
                                                <div class="icon">
                                                    <i class="lnil lnil-pencil"></i>
                                                </div>
                                                <div class="meta">
                                                    <span>Edit</span>
                                                    <span>Edit aduan</span>
                                                </div>
                                            </a>
                                            <form action="/masyarakat/pengaduan/{{ $row->id }}" method="post" class="is-hidden" id="hapus_aduan_{{ $row->id }}">@csrf @method('DELETE')</form>
                                            <a class="hapus_aduan_btn_{{ $row->id }} dropdown-item is-media">
                                                <div class="icon">
                                                    <i class="lnil lnil-trash"></i>
                                                </div>
                                                <div class="meta">
                                                    <span>Hapus</span>
                                                    <span>Hapus dari pengaduan</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </header>
                        <div class="card-image">
                            <figure class="image is-16by9">
                                <img src="https://via.placeholder.com/1280x960" data-demo-src="../storage/{{ $row->foto }}" alt="">
                            </figure>
                        </div>
                        <div class="card-content">
                            <div class="card-content-flex">
                                <div class="card-info">
                                    <h3 class="dark-inverted" data-filter-match>{{ $row->judul_laporan }}</h3>
                                    <p data-filter-match><i data-feather="loader"></i>Status : 
                                        @if($row->status == '0')
                                            Aduan belum diproses
                                        @else
                                            {{$row->status}}
                                        @endif
                                    </p>
                                    <p data-filter-match><i data-feather="calendar"></i>{{ \Carbon\Carbon::create($row->tgl_pengaduan)->format('d F Y') }}</p>
                                </div>
                            </div>
                        </div>
                        <footer class="card-footer">
                            <a href="/masyarakat/pengaduan/{{ $row->id }}" class="card-footer-item">Detail</a>
                        </footer>
                    </div>
                </div>
            </div>
        @endforeach
        @else
        <div class="page-placeholder custom-text-filter-placeholder">
            <div class="placeholder-content">
                <img class="light-image" src="assets/img/illustrations/placeholders/search-3.svg" alt="" />
                <img class="dark-image" src="assets/img/illustrations/placeholders/search-3-dark.svg" alt="" />
                <h3>Pengaduan tidak tersedia</h3>
                <p class="is-larger">Pengaduan tidak tersedia, silahkan buat aduan terlebih dahulu untuk melihat daftar aduan</p>
            </div>
        </div>
        @endif
    </div>

</div>
@foreach($pengaduan as $row)
<script>
    $('.hapus_aduan_btn_{{ $row->id }}').on('click', function () {
    initConfirm('Hapus Aduan', 'Apakah anda yakin? aduan yang sudah di hapus tidak dapat di kembalikan', false, false, 'Hapus', 'Batal', function (closeEvent) {
        $('#hapus_aduan_{{ $row->id }}').submit();
    })
})
</script>
@endforeach
@endsection