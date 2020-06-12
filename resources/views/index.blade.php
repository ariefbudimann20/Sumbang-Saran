<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="icon" href="{{url('assets/img/favicon.ico')}}" type="image/x-icon" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('assets/css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

    {{-- Google Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,600;1,500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">

    <title>Sumbang Saran</title>
  </head>
  <body id="index">
    <div class="container-fluid">
        <div class="row logo">
          <div class="col-6"> 
            <div class="icare">
              <img src="{{url('assets/img/icare.png')}}" width="130px" alt="">
            </div>
          </div>
          <div class="col-6">
            <div class="kimiafarma">
              <img src="{{url('assets/img/kimiafarma.png')}}" width="130px" alt="">
            </div> 
          </div>
        </div>
        <div class="row justify-content-center konten">
            <div class="col-lg-6 col-sm-12 konten-kiri">
              <h1>Sumbang Saran </h1>
              <h2>PT. Kimia Farma Plant Jakarta</h2>
              <br>
              <h4 class="periode">Periode Sumbang Saran : </h4>
              @if(!empty($jadwal))
              <h3 class="font-italic  tanggal">{{$jadwal->created_at->format('d M Y')}} - {{date('d M Y', strtotime($jadwal->selesai))}}</h3>
              @else
              <h3 class="font-italic  tanggal">Sudah Selesai</h3>
              @endif
              @if(!empty($jadwal))
              <input type="hidden" id="end" value="{{$jadwal->selesai}}">

              <br>
              <p class="waktu-tersisa">Waktu tersisa :</p>
                <div class="hitungmundur">

                  <div class="box">
                    <p id="days" class="satuan-angka"></p>
                    <p class="satuan-teks">Hari</p>
                  </div>
                  <div class="box-span">
                    <p>:</p>
                  </div>
                  <div class="box">
                    <p id="hours" class="satuan-angka"></p>
                    <p class="satuan-teks">Jam</p>
                  </div>
                  <div class="box-span">
                    <p>:</p>
                  </div>
                  <div class="box">
                    <p id="minutes" class="satuan-angka"></p>
                    <p class="satuan-teks">Menit</p>
                  </div>
                  <div class="box-span">
                    <p>:</p>
                  </div>
                  <div class="box">
                    <p id="seconds" class="satuan-angka"></p>
                    <p class="satuan-teks">Detik</p>
                  </div>
                </div>
              @else
              <p class="waktu-tersisa">Waktu tersisa :</p>
              <div class="hitungmundur">
                <div class="box">
                  <p class="satuan-angka">0</p>
                  <p class="satuan-teks">Hari</p>
                </div>
                <div class="box-span">
                  <p>:</p>
                </div>
                <div class="box">
                  <p class="satuan-angka">0</p>
                  <p class="satuan-teks">Jam</p>
                </div>
                <div class="box-span">
                  <p>:</p>
                </div>
                <div class="box">
                  <p class="satuan-angka">0</p>
                  <p class="satuan-teks">Menit</p>
                </div>
                <div class="box-span">
                  <p>:</p>
                </div>
                <div class="box">
                  <p class="satuan-angka">0</p>
                  <p class="satuan-teks">Detik</p>
                </div>
              </div>
              @endif
              <a href="{{url('/login')}}" class="btn btn-warning btn-sm mt-4 font-weight-bold login"><i class="fas fa-sign-in-alt"></i> Login Sekarang</a>
                
            </div>

            <div class="col-lg-6 col-sm-12 konten-kanan">
              <div id="carouselKFUPJ" class="carousel slide carousel-fade" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                      <img src="{{url('assets/img/kimiafarma/kfpj1.png')}}" class="d-block mx-auto" width="500px" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="{{url('assets/img/kimiafarma/kfpj2.png')}}" class="d-block mx-auto" width="500px" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="{{url('assets/img/kimiafarma/kfpj3.png')}}" class="d-block mx-auto" width="500px" alt="...">
                  </div>
                </div>
              </div>
            </div>

        </div>
    </div>
    @include('sweetalert::alert')
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  
    {{-- Jam Digital --}}
    <script>
    
    var dt = document.getElementById("end").value;
    var now = new Date(dt);
    var dateNow = now.toLocaleDateString('en-us', {timeZone: 'Asia/Jakarta'});
    dateNow = dateNow.split('/');
    var dateString = dateNow[2] + '/' + dateNow[0] + '/' + dateNow[1] + ' ' + dt.split(' ')[1];
    var countDownDate = new Date(dateString);
    countDownDate.setMinutes(countDownDate.getMinutes() + 1);
    //console.log(countDownDate);
    // Update the count down every 1 second
    var x = setInterval(function() {
        // Get todays date and time
        var now = new Date().getTime();
        //console.log(now);
        // Find the distance between now an the count down date
        var distance = countDownDate.getTime() - now;
        //console.log(distance);

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        if (days < 0)  {
            days = 0;
        }

        if (hours < 0) {
            hours = 0;
        }

        if (minutes < 0) {
            minutes = 0;
        }

        if (seconds < 0) {
            seconds = 0;
        }

        $('#days').html(days);
        $('#hours').html(hours);
        $('#minutes').html(minutes);
        $('#seconds').html(seconds);
        $('#finish').html(now);

        if (distance <= 0) {
            clearInterval(x);
            $('.countdown').css("display", "none");
        }
    }, 1000);
    </script>

    {{-- Parallax effect --}}
    <script>  
      $(window).on('load', function() {
          $('.konten-kiri').addClass('showkonten');
          $('.konten-kanan').addClass('showkonten');
      })
    </script>

    {{-- Tooltip --}}



  </body>
</html>