<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('assets/css/style.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Sumbang Saran</title>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 float-right">
          <ul class="nav float-right">
            <li class="nav-item">
              <a href="{{url('/login')}}" class="btn btn-warning mt-2 font-weight-bold">Login sebagai Admin</a>
            </li>
          </ul>
        </div>
      </div>
        <div class="row justify-content-center no-gutters persetujuan">
            <div class="col-md-6 col-sm-12 text-center persetujuan-kiri">
                <h2 class="text-center">Syarat & Ketentuan</h2>
                <div class="row justify-content-center">
                <div class="ketentuan text-left">
                        <li>Sebelum menggunakan fitur ini kita awali dengan basmallah</li>
                        <li>Peserta yang mengisi Fitur ini harus mengikuti aturan yang berlaku</li>
                        <li>Peserta harus menggunakan bahasa yang baik dan benar</li>
                        <li>Peserta yang menggunakan Fitur ini harus menggunakan data yang valid dan tidak mengada-ada</li>
                        <li>Pasal 27 ayat 3 UU ITE : Melarang setiap orang dengan sengaja dan tanpa hak mendistribusikan dan/atau mentransmisikan dan/atau membuat dapat di aksesnya informasi Elektronik dan/atau Dokumen Elektronik yang memiliki muatan penghinaan dan/atau pencemaran nama baik</li>
                </div>
              </div>

                <div class="form-check my-2">
                    <input type="checkbox" class="form-check-input mt-2" id="persetujuan">
                    <label for="persetujuan" class="form-check-label"> <small class="text-muted">Saya telah membaca dan memahami syarat & ketentuan diatas</small></label>
                </div>
                <a href="{{url('/sumbang-saran')}}" class="btn btn-warning d-block mx-auto font-weight-bold setuju" style="width: 100px;">Setuju</a>
            </div>

            <div class="col-md-6 col-sm-12 persetujuan-kanan">

              <img src="{{url('assets/img/banner-persetujuan.png')}}" alt=" Responsive Image" class="img-fluid">

                <div class="hitungmundur">
                  <h5>Periode Sumbang Saran : 24 April 2020 - 1 Mei 2020</h5>
                  <p class="waktu-tersisa">Waktu tersisa :</p>

                  <div class="box">
                    <p id="hari" class="satuan-angka"></p>
                    <p class="satuan-teks">Hari</p>
                  </div>
                  <div class="box">
                    <p id="jam" class="satuan-angka"></p>
                    <p class="satuan-teks">Jam</p>
                  </div>
                  <div class="box">
                    <p id="menit" class="satuan-angka"></p>
                    <p class="satuan-teks">Menit</p>
                  </div>
                  <div class="box">
                    <p id="detik" class="satuan-angka"></p>
                    <p class="satuan-teks">Detik</p>
                  </div>

                </div>

            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  
    {{-- Jam Digital --}}
    <script>
      var CountDownDate = new Date("May 1, 2020 12:00:00").getTime();

      var x = setInterval(function() {

        var now = new Date().getTime();

        var distance = CountDownDate - now;

        var days = Math.floor(distance / (1000*60*60*24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (100 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000 );

        document.getElementById("hari").innerHTML = days;
        document.getElementById("jam").innerHTML = hours;
        document.getElementById("menit").innerHTML = minutes;
        document.getElementById("detik").innerHTML = seconds;

        if (distance < 0 ) {
          clearInterval(x);
          document.getElementById("hitungmundur").innerHTML="EXPIRED";
        }
      }, 1000 );
    </script>
  
  </body>
</html>