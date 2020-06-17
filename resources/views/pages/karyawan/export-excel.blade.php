<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Export Karyawan</title>

  </head>
  <body>
    <h3>Report Karyawan</h3>
    <h3>Tanggal: {{$date}}</h3>
    <table class="text-center table table-striped table-sm table-bordered" >
        <thead>
            <tr></tr>
            <tr></tr>
            <tr>
                <th style="font-weight:bold " align="center">No</th>
                <th style="font-weight:bold " align="center">Nik</th>
                <th style="font-weight:bold " align="center" width="20">Nama</th>
                <th style="font-weight:bold " align="center" width="20">Bagian</th>
                <th style="font-weight:bold " align="center" width="20">Sub Bagian</th>
                <th style="font-weight:bold " align="center">Jumlah Ide</th>
                <th style="font-weight:bold " align="center">Status</th>
            </tr>
        </thead>
        <tbody>
          @foreach ($karyawan as $ky)
          <tr>
              <td align="center">{{$loop->iteration}}</td>
              <td align="center">{{$ky->nik}}</td>
              <td align="center">{{$ky->nama}}</td>
              <td align="center">{{$ky->bagian->nama}}</td>
              <td align="center">{{$ky->sub_bagian->nama}}</td>
              <td align="center">{{$ky->sumbangsaran_count}}</td>
              <td align="center">{{$ky->status->nama}}</td>
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