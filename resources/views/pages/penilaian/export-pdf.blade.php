<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Export Penilaian</title>

  </head>
  <body>
    <h5>Report Penilaian</h5>
    <h5>Tanggal: {{$date}}</h5>
    <table class="text-center table table-striped table-sm table-bordered mt-3" >
      <thead>
        <tr>
            <th>No</th>
            <th>Nik</th>
            <th>Nama</th>
            <th>Judul</th>
            <th>Bagian</th>
            <th>Sub Bagian</th>
            <th>Periode</th>
            <th>Nilai</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($sumbangsaran as $ss)
          <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$ss->karyawan->nik}}</td>
              <td>{{$ss->karyawan->nama}}</td>
              <td>{{$ss->judul}}</td>
              <td>{{$ss->karyawan->bagian->nama}}</td>
              <td>{{$ss->karyawan->sub_bagian->nama}}</td>
              <td>{{$ss->periode}}</td>
              <td> 
                  @if($ss->penilaian->count() > 0)    
                      @foreach($ss->penilaian as $area)
                      {{$area->nilai}}
                      @endforeach
                      @else
                      Belum Di Nilai
                  @endif
              </td>
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