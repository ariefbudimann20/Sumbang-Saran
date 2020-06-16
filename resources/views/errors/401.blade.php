<!doctype html>
<html lang="en">
  <head>
    <!--  meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="icon" href="{{url('assets/img/favicon.ico')}}" type="image/x-icon" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Sriracha&display=swap" rel="stylesheet">

    <title>Page Not Found | Sumbang Saran</title>

    <style>
        body {
    height: 100%;
    margin: 0;
    padding: 0;
}

.overlay {
    position: absolute;
    width: 100%;
    height: 100%;
    color: #333;
    opacity: 1;
}

.overlay .box {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    width: 400px;
    height: 400px;
    background-image: url(../assets/img/error/error401.png);
    background-position-y: top;
    background-position-x: center;
    background-repeat: no-repeat;
    background-size: 200px;
    overflow: hidden;
}

.overlay .text {
    margin-top: 250px;
    text-align: center;
    font-family: 'monserrat', sans-serif;
}

.overlay .text h4 {
    font-size: 28px;
    font-weight: 600;
}

.overlay button {
    font-family: 'monserrat', sans-serif;
    margin-top: 40px;
    background-color: #0f0e20;
    border: none;
}

.overlay button:hover {
    background-color: #0f0e20;
    color: #b5b5b5;
    transition: .1s;
}

.d-flex a {
    background-color: #0f0e20;
    color: white;
    border: none;
}

.d-flex a:hover {
    color: #b5b5b5
}

    </style>
  </head>
  <body>
      <div class="overlay">
          <div class="box">
              <div class="text">
                  <h4>Oops!</h4>
                  <p>Halaman tidak dapat dimuat karena ada beberapa kesalahan</p>
              </div>

              <div class="d-flex justify-content-center">
                <a href="{{ URL::previous() }}" class="btn btn-md mx-auto text-center"><i class="fas fa-arrow-left"></i> Kembali</a>
            </div>          </div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{url('assets/plugins/jquery/jquery.min.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
{{-- @extends('errors::minimal')

@section('title', __('Unauthorized'))
@section('code', '401')
@section('message', __('Unauthorized')) --}}
