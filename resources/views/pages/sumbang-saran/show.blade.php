
<!-- Lightbox -->
 <link rel="stylesheet" href="{{url('assets/lightbox/css/lightbox.css')}}" />

<div class="row">
    <div class="col-md-6 .col-sm-12">
        <div class="form-group">
            <label>Nomor Induk Karyawan : </label>
            <p>{{$ss->karyawan->nik}}</p>
        </div>
    </div>
    <div class="col-md-6 .col-sm-12">
        <div class="form-group">
            <label for="nama">Nama Lengkap :</label>
            <p>{{$ss->karyawan->nama}}</p>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 .col-sm-12">
        <div class="form-group">
            <label for="bagian">Bagian :</label>
            <p>{{$ss->karyawan->bagian->nama}}</p>
        </div>
    </div>
    <div class="col-md-6 .col-sm-12">
        <div class="form-group">
            <label for="ext">Sub Bagian :</label>
            <p>{{$ss->karyawan->sub_bagian->nama}}</p>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 .col-sm-12">
        <div class="form-group">
            <label for="judul">Judul Sumbang Saran :</label>
            <p>{{$ss->judul}}</p>
        </div>
    </div>
    <div class="col-md-6 .col-sm-12">
        <div class="form-group">
            <label>Attachment :</label><br>
            @if (pathinfo(url('assets/attachment',$ss->attachment), PATHINFO_EXTENSION) == 'docx' && 'doc' && 'xls' && 'xlsx' && 'ppt' && 'pptx' && 'pdf')
                <a href="{{ url('assets/attachment',$ss->attachment)}}"><img src="{{url('assets/img/attachment.jpg')}}"></a><br>
                <small class="text-muted"><i>{{ $ss->attachment }}</i></small>
            @else
                <div class="col-md-6 col-lg-4 item zoom-on-hover"><a href="{{url('assets/attachment',$ss->attachment)}}" data-lightbox="image-1">
                    <img style="width:auto; height:150px; margin-bottom:10px;" src="{{url('assets/attachment',$ss->attachment)}}" /></a>
                </div>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 .col-sm-12">
        <div class="form-group">
            <label for="kondisi-awal">Cerita Kondisi Awal :</label>
            <p class="text-justify">{{$ss->kondisi_awal}}</p>
        </div>   
    </div>
    <div class="col-md-6 .col-sm-12">
        <div class="form-group">
            <label for="kondisi-akhir">Cerita Kondisi Yang Diinginkan :</label>
            <p class="text-justify">{{$ss->kondisi_akhir}}</p>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 .col-sm-12">

        <div class="form-group">
            <label for="manfaat">Manfaat Bagi Perusahaan :</label>
            <p class="text-justify">{{$ss->manfaat}}</p>
        </div>
    </div>
</div>

<!-- Lightbox -->
<script src="{{url('assets/lightbox/js/lightbox.min.js')}}"></script>
