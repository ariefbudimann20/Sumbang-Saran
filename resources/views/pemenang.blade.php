<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,600;1,500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">


    <title>Pemenang | Sumbang Saran KFUPJ</title>

    <style>
      .pemenang {
        position: relative;
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100vh;
        background-color: #0f0e20;
        font-family: 'Montserrat', sans-serif;
        background-image: url('assets/img/pemenang/banner-winner.png');
        background-size: 800px;
        background-position: center;
        background-repeat: no-repeat;
    }

        .pemenang .header p {
            text-align: center;
            font-weight: 600;
            font-size: 20px;
            color: #fff;
        }

        .pemenang .card {
            background-color: transparent;
            border: 1px solid #252347;
            color: white;
            transition: .3s ease-out;
        }

        .pemenang .card:hover {
            background-color: rgba(255, 255, 255, .1);
        }
        .pemenang .card img {
            width: 100px;
        }

        .pemenang .modal .modal-header {
            background-color: #c9c8e6;
            color: #0f0e20;
        }

        .btn-back a {
            background-color: #c9c8e6;
            color: #0f0e20;
            transition: .1s;
            border: none;
        }

        .btn-back a:hover {
            background-color: #0f0e20;
            color: #b5b5b5;
        }

        .animate {
            opacity: 0;
            transform: translateX(-1000px);
            transition: .5s ease-out;
        }

        .animate.show-animate {
            transform: translate(0,0);
            opacity: 1;
        }

      @media screen and (max-width: 768px) {
        .pemenang .logo {
          justify-content: space-between;
        }

        .pemenang .logo .col-sm-6 {
          width: 150px;
        }


        .pemenang .logo .logo-kf img {
          float: right;
        }

        .pemenang .header p {
          font-size: 20px;
        }

        .pemenang .content button {
          display: block;
          margin: 0 auto;
        }

        .modal-xl {
          width: 90%;
          max-width:1200px;
        }
      }

      @media screen and (max-width: 500px) {
        .pemenang .header p {
          font-size: 14px;
        }
        
        .pemenang .logo img {
          width: 80px;
        }

        .pemenang .content button .card {
          width: 16rem !important;
        }

        .pemenang .content button .card img {
          width: 70px;
        }

        .pemenang .modal .modal-body .col-lg-4 {
          width: 300px;
        }
      }

    </style>
  </head>
  <body class="pemenang">
    <div class="container-fluid">
      <div class="row logo">
        <div class="col-lg-6 col-sm-6 logo-icare">
          <img src="assets/img/icare.png" class="mt-2" alt="" width="120px">  
        </div>
        <div class="col-lg-6 col-sm-6 logo-kf">
          <img src="assets/img/kimiafarma.png" class="float-right mt-2" alt="" width="130px">  
        </div>
      </div>
      <div class="row header">
        <div class="col-12">
          <p class="mt-4 animate">Selamat! <br>
            Kepada para pemenang Sumbang Saran <br>
            PT. Kimia Farma Plant Jakarta <br>
            Periode 22 Juni 2020 - 22 Juli 2020
          </p>
        </div>

      </div>
      <div class="row content">
        <div class="col-lg-4 animate">
          <button type="button" class="btn" data-toggle="modal" data-target="#modal-pemenang">
            <div class="card d-block mx-auto" style="width: 20rem;">
              <img src="{{url('assets/img/pemenang/juara1.png')}}" class="card-img-top mt-3 img-fluid d-block mx-auto" alt="...">
              <div class="card-body text-center">
                <h5 class="card-title">Nama Pemenang (Bagian)</h5>
                <p class="card-text">Judul Sumbang Saran</p>
              </div>
            </div>
          </button>
        </div>
        <div class="col-lg-4 animate">
          <button type="button" class="btn" data-toggle="modal" data-target="#modal-pemenang">
            <div class="card d-block mx-auto" style="width: 20rem;">
              <img src="{{url('assets/img/pemenang/juara2.png')}}" class="card-img-top mt-3 img-fluid d-block mx-auto" alt="...">
              <div class="card-body text-center">
                <h5 class="card-title">Nama Pemenang (Bagian)</h5>
                <p class="card-text">Judul Sumbang Saran</p>
              </div>
            </div>
          </button>
        </div>
        <div class="col-lg-4 animate">
          <button type="button" class="btn" data-toggle="modal" data-target="#modal-pemenang">
            <div class="card d-block mx-auto" style="width: 20rem;">
              <img src="{{url('assets/img/pemenang/juara3.png')}}" class="card-img-top mt-3 img-fluid d-block mx-auto" alt="...">
              <div class="card-body text-center">
                <h5 class="card-title">Nama Pemenang (Bagian)</h5>
                <p class="card-text">Judul Sumbang Saran</p>
              </div>
            </div>
          </button>
        </div>

      </div>
      <div class="row btn-back my-4">
        <a href="{{ URL::previous() }}" class="btn btn-md mx-auto font-weight-bold text-center animate"><i class="fas fa-arrow-left"></i> Kembali</a>
      </div>
      <div class="modal fade" id="modal-pemenang" tabindex="-1" role="dialog" aria-labelledby="modal-pemenangLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="modal-pemenangLabel"><i class="fas fa-trophy"></i> Juara 1 / 2 / 3</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-lg-4 col-sm-12 font-weight-bold">
                  <p>Judul Sumbang Saran</p>
                </div>
                <div class="col-lg-8 col-sm-12 text-justify">
                  <p>Website Sumbang Saran</p>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4 font-weight-bold">
                  <p>Kondisi saat ini</p>
                </div>
                <div class="col-lg-8 col-sm-12 text-justify">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4 col-sm-12 font-weight-bold">
                  <p>Usulan/Ide perbaikan</p>
                </div>
                <div class="col-lg-8 col-sm-12 text-justify">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4 col-sm-12 font-weight-bold">
                  <p>Biaya yang dibutuhkan</p>
                </div>
                <div class="col-lg-8 col-sm-12 text-justify">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4 col-sm-12 font-weight-bold">
                  <p>Manfaat yg di peroleh</p>
                </div>
                <div class="col-lg-8 col-sm-12 text-justify">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    
    <script>
        $(window).on('load', function() {
            $('.animate').each(function(i) {
                setTimeout(function() {
                    $('.animate').eq(i).addClass('show-animate');
                }, 500 * i);
            });
        });
    </script>

</body>
