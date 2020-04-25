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
        <div class="row justify-content-center">
            <div class="col-md-12 col-sm-10 text-center index-page">
                <img src="{{url('assets/img/banner-sumbangsaran.png')}}" alt="Responsive Image" class="img-fluid mt-2">
              <div class="row justify-content-center">
                <div class="ketentuan text-left">
                    <h5>Syarat & Ketentuan</h5>
                        <li>Sebelum menggunakan fitur ini kita awali dengan basmallah</li>
                        <li>Peserta yang mengisi Fitur ini harus mengikuti aturan yang berlaku</li>
                        <li>Peserta harus menggunakan bahasa yang baik dan benar</li>
                        <li>Peserta yang menggunakan Fitur ini harus menggunakan data yang valid dan tidak mengada-ada</li>
                        <li>Pasal 27 ayat 3 UU ITE : Melarang setiap orang dengan sengaja dan tanpa hak mendistribusikan dan/atau mentransmisikan dan/atau membuat dapat di aksesnya informasi Elektronik dan/atau Dokumen Elektronik yang memiliki muatan penghinaan dan/atau pencemaran nama baik</li>
                </div>
              </div>

                <div class="form-check my-2">
                  {{-- <input type="checkbox" class='modal-check' name='modal-check' id="yourBox" /> --}}
                    <input type="checkbox" class="form-check-input mt-2" id="yourBox">
                    <label for="persetujuan" class="form-check-label"> <small class="text-muted">Saya telah membaca dan memahami syarat & ketentuan diatas</small></label>
                </div>
                  <button onclick="window.location.href='/input'" id="yourbutton" disabled class="btn btn-primary d-block mx-auto">Setuju</button>
                {{-- <a href="{{url('/login')}}" class="btn btn-warning mt-2">Login sebagai Admin</a> --}}
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
  </body>
</html>