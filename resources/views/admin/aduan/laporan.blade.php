<!doctype html>
<html lang="en">
  <head>
    <base href="http://ukk2021.test/laporan_template/">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap.css">

    <title>Laporan Pengaduan</title>
  </head>
  <body>
    <div class="text-center">
        <small style="font-size: 18px;">PELAYANAN PENGADUAN MASYARAKAT</small>
        <br>
        <small style="font-size: 18px;">DATA ADUAN MASYARAKAT</small>
    </div>
    <style>
        .table tr td {
            border: none;
        }
    </style>
    <br>
    <table class="table">
        <tr>
            <td align="left">Judul Laporan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $aduan->judul_laporan }}</td>
            <td align="right">Pengirim &nbsp;&nbsp;: {{ $aduan->nik }} - {{ $aduan->user->name }}</td>
        </tr>
        <tr>
            <td align="left">Tanggal Pengaduan &nbsp;&nbsp;: {{ \Carbon\Carbon::create($aduan->tgl_pengaduan)->format('d F Y') }}</td>
        </tr>
    </table>

    <div class="text-center">
        <small style="font-size: 17px;">Isi Laporan</small>
        <hr>
    </div>
    <p class="text-justify" style="padding: 0 50px;">&nbsp;&nbsp;&nbsp;{{ $aduan->isi_laporan }}</p>
    <br>
    <div class="float-right">
        Pekanbaru, {{ \Carbon\Carbon::create(date('Y-m-d'))->format('d F Y') }}
        <br><br><br><br>
        <p class="margin-left: 30px">
        {{ Auth::user()->level }}, {{ Auth::user()->name }}
        </p>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="jquery.js"></script>
    <script src="popper.js"></script>
    <script src="bootstrap.js"></script>
  </body>
</html>