@extends('templates.public_templates.main')

@section('title', 'Dashboard')

@section('content')
<!--Personal Dashboard V2-->
<div class="personal-dashboard personal-dashboard-v2">

<div class="columns is-multiline">

    <div class="column is-12">
        <div class="dashboard-header">
            <div class="h-avatar is-xl">
                <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="../storage/{{ Auth::user()->foto }}" alt="">
            </div>
            <div class="user-meta is-dark-bordered-12">
                <h3 class="title is-4 is-narrow is-bold">Selamat Datang, {{ Auth::user()->name }}.</h3>
                <p class="light-text">Senang bertemu denganmu lagi</p>
            </div>
            <div class="user-action">
                <h3 class="title is-2 is-narrow">{{ $aduan_pros }}</h3>
                <p class="light-text">Aduan dalam proses</p>
                <a class="action-link" href="/masyarakat/pengaduan">Lihat Semua</a>
            </div>
            <div class="cta h-hidden-tablet-p">
                <div class="media-flex inverted-text">
                    <i class="lnil lnil-copy"></i>
                    <p class="white-text">Silahkan klik pelajari lebih lanjut jika tidak mengerti cara penggunaan.</p>
                </div>
                <a class="link inverted-text">Pelajari Lebih Lanjut</a>
            </div>
        </div>
    </div>

    <div class="column is-8">
        <div class="dashboard-card has-margin-bottom">
            <div class="card-head">
                <h3 class="dark-inverted">Aduan Baru</h3>
                <a class="action-link" href="/masyarakat/pengaduan">Lihat Semua</a>
            </div>
            <div class="active-projects">
                @if(count($pengaduan_baru) > 0)
                @foreach($pengaduan_baru as $row)
                <!--aduan-->
                <div class="media-flex-center">
                    <div class="h-avatar is-medium">
                        <img class="avatar is-squared" src="https://via.placeholder.com/150x150" data-demo-src="../storage/{{ $row->foto }}" alt="">
                    </div>
                    <div class="flex-meta">
                        <span class="dark-text dark-inverted">{{ $row->judul_laporan }}</span>
                        <span class="light-text">Terakhir Update {{ $row->updated_at }}</span>
                    </div>
                    <div class="flex-end">
                        <div class="dropdown is-spaced is-dots is-right dropdown-trigger end-action">
                            <div class="is-trigger" aria-haspopup="true">
                                <i data-feather="more-vertical"></i>
                            </div>
                            <div class="dropdown-menu" role="menu">
                                <div class="dropdown-content">
                                    <a href="/masyarakat/pengaduan/{{ $row->id }}" class="dropdown-item is-media">
                                        <div class="icon">
                                            <i class="lnil lnil-eye"></i>
                                        </div>
                                        <div class="meta">
                                            <span>Detail</span>
                                            <span>Lihat Detail Aduan</span>
                                        </div>
                                    </a>
                                    @if($row->status == '0')
                                    <a href="/masyarakat/pengaduan/{{ $row->id }}/edit" class="dropdown-item is-media">
                                        <div class="icon">
                                            <i class="lnil lnil-pencil"></i>
                                        </div>
                                        <div class="meta">
                                            <span>Edit</span>
                                            <span>Edit Aduan</span>
                                        </div>
                                    </a>
                                    <form action="/masyarakat/pengaduan/{{ $row->id }}" method="post" class="is-hidden" id="hapus_aduan_{{ $row->id }}">@csrf @method('DELETE')</form>
                                    <a class="hapus_aduan_btn_{{ $row->id }} dropdown-item is-media">
                                        <div class="icon">
                                            <i class="lnil lnil-trash"></i>
                                        </div>
                                        <div class="meta">
                                            <span>Hapus</span>
                                            <span>Hapus Aduan</span>
                                        </div>
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <div class="has-text-centered dark-text dark-inverted">
                    Aduan baru tidak tersedia
                </div>
                @endif
            </div>
        </div>

    </div>

    <div class="column is-4">


        <div class="dashboard-card">
            <div class="card-head">
                <h3 class="dark-inverted">Aduan Selesai</h3>
                <a class="action-link" href="/masyarakat/pengaduan">Lihat Semua</a>
            </div>
            <div class="active-team">
                <ul class="user-list">
                    @if(count($aduan_selesai) > 0)
                    @foreach($aduan_selesai as $row)
                    <li>
                        <div class="h-avatar">
                            <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="../storage/{{ $row->foto }}" alt="">
                        </div>
                        <div class="user-list-info">
                            <div class="name dark-inverted">{{ $row->judul_laporan }}</div>
                            <div class="position">{{ \Carbon\Carbon::create($row->tgl_pengaduan)->format('d F Y') }}</div>
                        </div>
                        <div class="user-list-icons">
                            <a href="/masyarakat/pengaduan/{{ $row->id }}"><i class="fas fa-eye"></i></a>
                        </div>
                    </li>
                    @endforeach
                    @else
                        <p class="has-text-centered">Aduan selesai tidak tersedia.</p>
                    @endif
                </ul>
            </div>
        </div>

    </div>
</div>

</div>

@foreach($pengaduan_baru as $row)
<script>
    $('.hapus_aduan_btn_{{ $row->id }}').on('click', function () {
    initConfirm('Hapus Aduan', 'Apakah anda yakin? aduan yang sudah di hapus tidak dapat di kembalikan', false, false, 'Hapus', 'Batal', function (closeEvent) {
        $('#hapus_aduan_{{ $row->id }}').submit();
    })
})
</script>
@endforeach
@endsection