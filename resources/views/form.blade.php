<!doctype html>
<html lang="en">
  <head>
    <!--  meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="icon" href="{{url('assets/img/favicon.ico')}}" type="image/x-icon" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('assets/css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Sriracha&display=swap" rel="stylesheet">

    <title>Sumbang Saran KFUPJ</title>
  </head>
  <body id="input">
    @if(!empty($jadwal))
        <div id="myModal" class="modal fade" role="dialog" >
            <div class="modal-dialog">
                <!-- Modal content-->
                    
                <div class="modal-content">
                    <a role="button" class="close text-right mr-3 mt-2" data-dismiss="modal" aria-label="Close" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        <span aria-hidden="true">&times;</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <div class="modal-body">
                    <h5 style="margin-bottom: 20px;"><i>Syarat dan Ketentuan</i></h5>
                    <ul style="text-align: justify; font-size: 14px; margin-right: 30px;">
                        <li>Sebelum menggunakan fitur ini kita awali dengan basmallah.</li>
                        <li>User yang mengisi Fitur ini harus mengikuti aturan yang berlaku.</li>
                        <li>User harus menggunakan bahasa yang baik dan benar.</li>
                        <li>User yang menggunakan fitur ini datanya harus valid dan tidak mengada-ada.</li>
                        <li>Jika saran atau kritik bersifat keluhan, user wajib mengisi nomor handphone dan melampirkan attachment atau bukti yang kuat.</li>
                        <li>Pasal 27 ayat 3 UU ITE : Melarang setiap orang dengan sengaja dan tanpa hak mendistribusikan dan/atau mentransmisikan dan/atau membuat dapat diaksesnya Informasi Elektronik dan/atau Dokumen Elektronik yang memiliki muatan penghinaan dan/atau pencemaran nama baik.</li>
                    </ul>
                    </div>
                    <div class="modal-footer">
                        <div class="form-check d-block mx-auto">
                            <input type="checkbox" class='modal-check mr-2 form-check-input' name='modal-check' id="yourBox" />
                            <label for="yourBox" class="form-check-label"><small class="text-muted ">Saya telah membaca dan memahami syarat & ketentuan di atas</small></label>
                        </div>
                        <input type="button" id="yourbutton"  class="btn btn-primary mr-1" value="Setuju" data-dismiss="modal" disabled />  
                    </div>
                </div>
            </div>
        </div>
      <div class="container-fluid">
          <div class="row justify-content-center">
              <div class="col-10 form-page">
                  <img src="{{url('assets/img/kimiafarma-login.png')}}"  alt="Responsive Image" class="img-fluid mx-auto d-block mt-3 animate">
  
                  <div class="alert text-center mt-4 animate" role="alert">
                      Sampaikan Informasi, Saran, Keluhan anda demi kemajuan perusahaan. Kami menjamin <b>kerahasiaan</b> data Anda
                  </div>
                  <form action="{{url('input')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      @if(!empty($jadwal))
                      <input type="hidden" name="periode" value="{{$jadwal->created_at->format('d M Y')}} - {{date('d M Y', strtotime($jadwal->selesai))}}">
                      @else
                      <input type="hidden" name="periode" value="Periode Sudah Habis">
                      @endif
                      <div class="row">
                          <div class="col-md-6">
                              <div class="form-group animate">
                                <label>Status <span class="text-danger">*</span></label>
                                <select name="status" id="status_select" class="form-control @error('status') is-invalid @enderror" >
                                    <option value="">- Pilih -</option>
                                    @foreach($status as $sts)
                                        <option value="{{$sts->id}}">{{$sts->nama}}</option>
                                    @endforeach
                                </select>
                                @error('status') <span class="error invalid-feedback">{{$message}}</span> @enderror
                              </div>
                              <div class="form-group animate">
                                  <label>Nomor Induk Karyawan <span class="text-danger">*</span></label></label>
                                  <input type="number" id="status" name="nik" class="form-control @error('nik') is-invalid @enderror" value="{{ old('nik') }}" >
                                  @error('nik') <span class="error invalid-feedback">{{$message}}</span> @enderror 
                              </div>
                              <div class="form-group animate">
                                  <label>Nama Lengkap <span class="text-danger">*</span></label></label>
                                  <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{old('nama')}}" >
                                  @error('nama') <span class="error invalid-feedback">{{$message}}</span> @enderror
                              </div>
                              <div class="form-group animate">
                                <label>Judul Sumbang Saran <span class="text-danger">*</span></label></label>
                                <input name="judul" type="text" class="form-control @error('judul') is-invalid @enderror" value="{{old('judul')}}" >
                                @error('judul') <span class="error invalid-feedback">{{$message}}</span> @enderror
                            </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group animate">
                                  <label>Bagian <span class="text-danger">*</span></label></label>
                                  <select name="bagian" id="bagian" class="form-control @error('bagian') is-invalid @enderror" >
                                      <option value="">- Pilih -</option>
                                      @foreach($bagian as $bg)
                                      <option value="{{$bg->id}}">{{$bg->nama}}</option>
                                      @endforeach
                                  </select>
                                  @error('bagian') <span class="error invalid-feedback">{{$message}}</span> @enderror
                              </div>
                               <div class="form-group animate">
                                  <label>Sub Bagian <span class="text-danger">*</span></label></label>
                                  <select name="sub_bagian" id="subbagian" class="form-control @error('ext') is-invalid @enderror" >
                                      <option value="">- Pilih -</option>
  
                                      </select>
                                  @error('sub_bagian') <span class="error invalid-feedback">{{$message}}</span> @enderror
                              </div>
                                <div class="form-group animate">
                                    <label>Attachment</label> <small class="text-muted">(Boleh dikosongkan)</small><br>
                                    <img id="blah" style="height:100px; margin-bottom:10px;" src="{{url('assets/img/dummy.jpg')}}" alt="your image" />
                                    <input id="imgInp" name="attachment" type="file" class="form-control-file @error('attachment') is-invalid @enderror" >
                                    @error('attachment') <span class="error invalid-feedback">{{$message}}</span> @enderror
                                </div>
                          </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12 col-sm-12 animate">
                            <div class="form-group">
                                <label>Latarbelakang Ide <span class="text-danger">*</span></label></label>
                                <textarea name="latar_belakang" class="form-control @error('latar_belakang') is-invalid @enderror" rows="5" >{{old('latar_belakang')}}</textarea>
                                @error('latar_belakang') <span class="error invalid-feedback">{{$message}}</span> @enderror
                            </div>        
                        </div>
                          <div class="col-md-12 col-sm-12 animate">
                              <div class="form-group">
                                  <label>Gambaran/Deskripsi kondisi saat ini <span class="text-danger">*</span></label></label>
                                  <textarea name="kondisi_awal" class="form-control @error('kondisi_awal') is-invalid @enderror" rows="5" >{{old('kondisi_awal')}}</textarea>
                                  @error('kondisi_awal') <span class="error invalid-feedback">{{$message}}</span> @enderror
                              </div>        
                          </div>
                      </div>
                      <div class="form-group animate">
                          <label>Usulan /Ide Perbaikan <span class="text-danger">*</span></label></label>
                          <textarea name="kondisi_akhir" class="form-control @error('kondisi_akhir') is-invalid @enderror" rows="5" >{{old('kondisi_akhir')}}</textarea>
                          @error('kondisi_akhir') <span class="error invalid-feedback">{{$message}}</span> @enderror
                      </div>
                      <div class="form-group animate">
                          <label>Biaya atau Investasi yang dibutuhkan (Estimasi) <span class="text-danger">*</span></label></label>
                          <textarea name="biaya" class="form-control @error('biaya') is-invalid @enderror" rows="3" >{{old('biaya')}}</textarea>
                          @error('biaya') <span class="error invalid-feedback">{{$message}}</span> @enderror
                      </div>
                      <div class="form-group animate">
                          <label>Manfaat yang diperoleh <span class="text-danger">*</span></label></label>
                          <textarea name="manfaat" class="form-control @error('manfaat') is-invalid @enderror" rows="5" >{{old('manfaat')}}</textarea>
                          @error('manfaat') <span class="error invalid-feedback">{{$message}}</span> @enderror
                      </div>
                      <span class="text-danger float-left my-3 animate">* Wajib diisi</span>
                      <button type="submit" class="btn float-right text-white my-3 animate"><i class="fas fa-paper-plane"></i> Kirim</button>
                  </form>
              </div>
          </div>
      </div>
    @else
      <div class="overlay">
        <div class="box">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <img class="d-block mx-auto" src="{{url('assets/img/closed.png')}}" alt="">
            <p>Maaf.. <br>
              Sumbang Saran telah berakhir <br>
              Silahkan tunggu periode berikutnya
          </p>
          <div class="d-flex justify-content-center">
              <a role="button" class="btn btn-md mx-auto text-center" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();"><i class="fas fa-arrow-left"></i>
                  {{ __('Kembali') }}
              </a>
  
               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
          </div>
        </div>
      </div>
    @endif
    @include('sweetalert::alert')
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{url('assets/plugins/jquery/jquery.min.js')}}"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>

    <script>
        $(document).ready(function(){

        var my_cookie = $.cookie($('.modal-check').attr('name'));
        if (my_cookie && my_cookie == "true") {
            $(this).prop('checked', my_cookie);
            
        }
        else{
            $('#myModal').modal({
                            backdrop: 'static',
                            keyboard: true, 
                            show: true
                        });
        document.getElementById('yourBox').onchange = function() {
        document.getElementById('yourbutton').disabled = !this.checked;
        }; 
        }

        $(".modal-check").change(function() {
            $.cookie($(this).attr("name"), $(this).prop('checked'), {
                path: '/',
                expires: 1
            });
        });
    });
    </script>
    
    <script>
        $('#status_select').change(function(){
            if($(this).val() == 1){
                nilai = 0;
                $('#status').val(nilai);
                $('#status').attr('disabled','disabled');

            }else{
                $('#status').removeAttr('disabled');     
            }
        }).trigger('change');
    </script>

    <script>
        $('#bagian').on('change',function(e){
            console.log(e);

            var bagian_id = e.target.value;

            // Ajax
            $.get('ajax-sub?bagian=' + bagian_id, function(data){
                // console.log(data);
                $('#subbagian').html('<option value="">- Pilih -</option>');
                $.each(data,function(index, subbagObj){
                    $('#subbagian').append('<option value="'+subbagObj.id+'">'+subbagObj.nama+'</option>')
                })  
            });
        });
    </script>

    <script>
        function readURL(input) {
        var imgTypes = ['jpg', 'jpeg', 'png', 'gif'];

        if (input.files && input.files[0]) {
            var extension = input.files[0].name.split('.').pop().toLowerCase(),  //file extension from input file
            isSuccess = imgTypes.indexOf(extension) > -1;  //is extension in acceptable types
            var reader = new FileReader();
            
            
            if (isSuccess) { //yes
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
            else {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#blah').attr('src','assets/img/attachment.jpg');
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        }

        $("#imgInp").change(function() {
        readURL(this);
        });
    </script>

    {{-- Parallax effect --}}
    {{-- <script>
        $(window).on('load', function() {
            $('.form-page').addClass('show-form');
        });
    </script> --}}
 
    <script>
        $(window).on('load', function() {
            $('.animate').each(function(i) {
                setTimeout(function() {
                    $('.animate').eq(i).addClass('show-form');
                }, 100 * i)
            })
        })
    </script>

</body>
</html>