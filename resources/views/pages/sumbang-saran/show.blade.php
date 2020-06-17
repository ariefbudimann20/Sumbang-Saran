
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
            <label for="kondisi-awal">Latar Belakang Ide :</label>
            <p class="text-justify">{{$ss->latar_belakang}}</p>
        </div>   
    </div>
    <div class="col-md-6 .col-sm-12">
        <div class="form-group">
            <label for="kondisi-awal">Deskripsi kondisi saat ini :</label>
            <p class="text-justify">{{$ss->kondisi_awal}}</p>
        </div>   
    </div>
    <div class="col-md-6 .col-sm-12">
        <div class="form-group">
            <label for="kondisi-akhir">Usulan /Ide Perbaikan :</label>
            <p class="text-justify">{{$ss->kondisi_akhir}}</p>
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label>Biaya atau Investasi yang dibutuhkan (Estimasi) :</label>
            <p class="text-justify">{{$ss->biaya}}</p>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label>Manfaat yang diperoleh :</label>
            <p class="text-justify">{{$ss->manfaat}}</p>
        </div>
    </div>
</div>

