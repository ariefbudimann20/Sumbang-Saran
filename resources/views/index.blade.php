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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

    <title>Sumbang Saran</title>
  </head>
  <body>
    <div class="container-fluid">
        <div class="row">
          <div class="col-12 float-right"> 
            <ul class="nav float-right">
              <li class="nav-item">
                <a href="{{url('/login')}}" class="btn btn-danger mt-2 font-weight-bold"><i class="fas fa-unlock-alt"></i> Login</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="row justify-content-center no-gutters persetujuan">
            <div class="col-md-4 offset-md-1 col-sm-12 persetujuan-kiri">
              <h2 class="text-center">Sumbang Saran Karyawan</h2>
              <img src="{{url('assets/img/banner-persetujuan.png')}}" alt=" Responsive Image" class="img-fluid mx-auto d-block">

                <div class="hitungmundur mx-auto d-block">
                  <h5 class="periode">Periode Sumbang Saran : </h5>
                  <h5 class="font-italic font-weight-bold tanggal">24 April 2020 - 1 Mei 2020</h5>
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

              <div class="col-md-6 col-sm-12 text-center persetujuan-kanan">
                <h4 class="text-center">Syarat & Ketentuan</h4>
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
                    <input type="checkbox" class="form-check-input mt-2" id="yourBox">
                    <label class="form-check-label"> <small class="text-muted">Saya telah membaca dan memahami syarat & ketentuan diatas</small></label>
                </div>
                <button onclick="window.location.href='/input'" id="yourbutton" disabled class="btn btn-primary d-block mx-auto font-weight-bold setuju" style="width: 100px;">Setuju</button>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
       document.getElementById('yourBox').onchange = function() {
       document.getElementById('yourbutton').disabled = !this.checked;
       };
    </script>

  
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

    {{-- Parallax effect --}}
    <script>  
      $(window).on('load', function() {
          $('.persetujuan-kiri').addClass('showpersetujuan');
          $('.persetujuan-kanan').addClass('showpersetujuan');
      })
    </script>
  
  </body>
</html>