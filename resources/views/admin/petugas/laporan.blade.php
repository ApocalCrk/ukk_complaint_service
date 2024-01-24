<!doctype html>
<html lang="en">
  <head>
  <base href="http://ukk2021.test/laporan_template/">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap.css">
    <title>Laporan Petugas</title>
  </head>
  <body>
    <div class="text-center">
        <small style="font-size: larger;"> PELAYANAN PENGADUAN MASYARAKAT <br> DATA PETUGAS <br> {{ date('Y') }}</small>
    </div>

    <table class="table table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>NIK</th>
          <th>Nama</th>
          <th>Email</th>
          <th>No Telp</th>
        </tr>
      </thead>
      <tbody>
        @foreach($petugas as $row)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $row->nik }}</td>
            <td>{{ $row->name }}</td>
            <td>{{ $row->email }}</td>
            <td>{{ $row->telp }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>

    <br><br>

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