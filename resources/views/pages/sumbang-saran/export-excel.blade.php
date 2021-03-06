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
    <h3>Report Sumbang Saran</h3>
    <h3>Tanggal: {{$date}}</h3>
    <table class="text-center table table-striped table-sm table-bordered" >
        <thead>
            <tr></tr>
            <tr></tr>
            <tr>
                <th style="font-weight:bold " align="center">No</th>
                <th style="font-weight:bold " align="center">Nik</th>
                <th style="font-weight:bold " align="center">Nama</th>
                <th style="font-weight:bold " align="center">Bagian</th>
                <th style="font-weight:bold " align="center">Sub Bagian</th>
                <th style="font-weight:bold " align="center" width="50">Judul</th>
                <th style="font-weight:bold " align="center" width="30">Latar Belakang Ide</th>
                <th style="font-weight:bold " align="center" width="30">Deskripsi kondisi saat ini</th>
                <th style="font-weight:bold " align="center" width="30">Usulan /Ide Perbaikan</th>
                <th style="font-weight:bold " align="center" width="30">Biaya atau Investasi yang dibutuhkan (Estimasi) </th>
                <th style="font-weight:bold " align="center" width="30">Manfaat yang diperoleh</th>
                <th style="font-weight:bold " align="center" width="30">Attachment</th>
                <th style="font-weight:bold " align="center" width="30">Tanggal Kirim</th>
                <th style="font-weight:bold " align="center" width="30">Periode</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sumbangsaran as $ss)
            <tr>
                <td align="center">{{$loop->iteration}}</td>
                <td align="center">{{$ss->karyawan->nik}}</td>
                <td align="center">{{$ss->karyawan->nama}}</td>
                <td align="center">{{$ss->karyawan->bagian->nama}}</td>
                <td align="center">{{$ss->karyawan->sub_bagian->nama}}</td>
                <td align="center">{{$ss->judul}}</td>
                <td align="center">{{$ss->latar_belakang}}</td>
                <td align="center">{{$ss->kondisi_awal}}</td>
                <td align="center">{{$ss->kondisi_awal}}</td>
                <td align="center">{{$ss->biaya}}</td>
                <td align="center">{{$ss->manfaat}}</td>
                <td align="center">{{url('assets/attachment',$ss->attachment)}}</td>
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