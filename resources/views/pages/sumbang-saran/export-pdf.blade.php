<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Export Sumbang Saran</title>

  </head>
  <body>
    <h5>Report Sumbang Saran</h5>
    <h5>Tanggal: {{$date}}</h5>
    <table class="text-center table table-striped table-sm table-bordered mt-3" >
        <thead>
          <tr>
            <th style="font-weight:bold " align="center">No</th>
            <th style="font-weight:bold " align="center">Nik</th>
            <th style="font-weight:bold " align="center">Nama</th>
            <th style="font-weight:bold " align="center">Bagian</th>
            <th style="font-weight:bold " align="center">Judul</th>
            <th style="font-weight:bold " align="center">Periode</th>
            <th style="font-weight:bold " align="center">Tanggal Kirim</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($sumbangsaran as $ss)
            <tr>
              <td align="center">{{$loop->iteration}}</td>
              <td align="center">{{$ss->karyawan->nik}}</td>
              <td align="center">{{$ss->karyawan->nama}}</td>
              <td align="center">{{$ss->karyawan->bagian->nama}}</td>
              <td align="center">{{$ss->judul}}</td>
              <td align="center">{{$ss->periode}}</td>
              <td align="center">{{$ss->created_at->format('d M Y H:i:s')}}</td>
            </tr>
          @endforeach
        </tbody>
    </table>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>