@foreach($get_ped as $row)
@if($row->read_by_admin == '0')
<a class="dropdown-item d-flex align-items-center" style="background-color: #f8f9fc" href="/admin/pengaduan/detail/{{ $row->id }}">
    <div class="mr-3">
        <div class="icon-circle bg-primary">
            <i class="fas fa-file-alt text-white"></i>
        </div>
    </div>
    <div>
        <div class="small text-gray-500 font-weight-bold">{{ $row->created_at.' - '.$row->nik }}</div>
        <span class="font-weight-bold">{{ $row->judul_laporan }}</span>
    </div>
</a>
@else
<a class="dropdown-item d-flex align-items-center" href="/admin/pengaduan/detail/{{ $row->id }}">
    <div class="mr-3">
        <div class="icon-circle bg-primary">
            <i class="fas fa-file-alt text-white"></i>
        </div>
    </div>
    <div>
        <div class="small text-gray-500 font-weight-bold">{{ $row->created_at.' - '.$row->nik }}</div>
        <span class="font-weight-bold">{{ $row->judul_laporan }}</span>
    </div>
</a>
@endif
@endforeach
