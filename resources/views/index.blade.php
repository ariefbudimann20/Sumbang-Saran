<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/fontawesome-free-5.13.0-web/css/all.css">
    <title>Sumbang Saran</title>
  </head>
  <body>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-10 sumbangsaran-page">
                <img src="{{url('assets/img/banner-sumbangsaran.png')}}" alt="Responsive Image" class="img-fluid mx-auto d-block">

                <div class="alert alert-primary text-center mt-4" role="alert">
                    Sampaikan Informasi, Saran, Keluhan anda demi kemajuan perusahaan. Kami menjamin <b>kerahasiaan</b> data Anda
                </div>

                <form action="">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="token">Nomor Induk Karyawan : </label>
                                <div class="d-flex">
                                    <input type="text" id="token" class="form-control fc-token"> 
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama Lengkap :</label>
                                <input type="text" id="nama" class="form-control fc-nama">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="bagian">Bagian :</label>
                                <select class="form-control fc-bagian" id="bagian">
                                    <option value="">- Pilih -</option>
                                    <option>HRD</option>
                                    <option>Produksi</option>
                                    <option>Penyimpanan</option>
                                    <option>QA</option>
                                    <option>QC</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="ext">Ext :</label>
                                <input type="text" id="ext" class="form-control fc-ext">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="judul">Judul Sumbang Saran :</label>
                        <input type="text" id="judul" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="kondisi-awal">Gambarkan Kondisi Awal :</label>
                                <textarea id="kondisi-awal" class="form-control" rows="5"></textarea>
                            </div>        
                        </div>
                        <div class="col-md-6 col-sm-12 mt-4">
                            <div class="form-group">
                                <label for="foto">Foto : (Boleh dikosongkan)</label>
                                <input type="file" id="foto" class="form-control-file">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kondisi-akhir">Gambarkan Kondisi Yang Diinginkan :</label>
                        <textarea id="kondisi-akhir" class="form-control" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="manfaat">Manfaat Bagi Perusahaan :</label>
                        <textarea id="manfaat" class="form-control" rows="3"></textarea>
                    </div>
                </form>
                
                <button class="btn btn-success float-right my-3">Kirim</button>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>