@extends('templates.admin_templates.main')

@section('title', 'Dashboard')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<!-- Content Row -->
<div class="row">

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <a href="/admin/pengaduan" class="text-decoration-none text-xs font-weight-bold text-primary text-uppercase mb-1">Aduan</a>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pengaduan }}</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-edit fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <a href="/admin/tanggapan" class="text-decoration-none text-xs font-weight-bold text-success text-uppercase mb-1">Tanggapan</a>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $tanggapan }}</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-copy fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <a href="/admin/petugas/user" class="text-decoration-none text-xs font-weight-bold text-info text-uppercase mb-1">Petugas</a>
            <div class="row no-gutters align-items-center">
              <div class="col-auto">
                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $pengguna }}</div>
              </div>
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-users fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Pending Requests Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <a href="/admin/masyarakat/user" class="text-decoration-none text-xs font-weight-bold text-warning text-uppercase mb-1">Masyarakat</a>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $masyarakat }}</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-users fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection