<form action="{{url('penilai/penilaian')}}" method="POST">
@csrf
<input type="hidden" name="sumbang_saran_id" value="{{$ss->id}}">
<input type="hidden" name="karyawan_id" value="{{$ss->karyawan_id}}">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <label>Nomor Induk Karyawan : </label>
                <p>{{$ss->karyawan->nik}}</p>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <label>Nama Lengkap :</label>
                <p>{{$ss->karyawan->nama}}</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <label>Bagian :</label>
                <p>{{$ss->karyawan->bagian->nama}}</p>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <label>Sub Bagian :</label>
                <p>{{$ss->karyawan->sub_bagian->nama}}</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <label>Judul Sumbang Saran :</label>
                <p>{{$ss->judul}}</p>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <label for="foto">Attachment :</label><br>
                @if (pathinfo($ss->attachment, PATHINFO_EXTENSION) == 'jpg' || pathinfo($ss->attachment, PATHINFO_EXTENSION) == 'png' || pathinfo($ss->attachment, PATHINFO_EXTENSION) == 'gif')
                    <div class="col-md-6 col-lg-4 item zoom-on-hover"><a href="{{url('assets/attachment',$ss->attachment)}}" data-lightbox="image-1">
                        <img style="width:auto; height:150px; margin-bottom:10px;" src="{{url('assets/attachment',$ss->attachment)}}" /></a>
                    </div>
                @else
                    <a href="{{ url('assets/attachment',$ss->attachment)}}" ><img src="{{url('assets/img/attachment.jpg')}}"></a><br>
                    <small class="text-muted"><i>{{ $ss->attachment }}</i></small>
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
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <label>Deskripsi kondisi saat ini :</label>
                <p class="text-justify">{{$ss->kondisi_awal}}</p>
            </div>  
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <label>Usulan /Ide Perbaikan :</label>
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

    <div class="row penilaian">
        <div class="col-12 pt-4">
            <h4 class="mb-2">FORM PENILAIAN</h4>
        </div>
        </div>         
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12">            
                <p>Latar Belakang / Ide</p>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">            
                <input type="number" name="latarbelakang_ide" min="0" max="100" value="0" onfocus="startHitung()" onblur="akhirHitung()"  id="latarbelakang_ide" class="form-control">
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">            
                <p class="text-secondary text-right">Bobot 10%</p>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">            
                <input type="text" id="bobot_latarbelakang_ide"  value="0" class="form-control" disabled>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12">            
                <p>Gambaran/kondisi saat ini</p>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">            
                <input  type="number" name="kondisi_awal" id="kondisi_awal" min="0" max="100" value="0" onfocus="startHitung()" onblur="akhirHitung()" class="form-control">
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">            
                <p class="text-secondary text-right">Bobot 5%</p>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">            
                <input type="text" id="bobot_kondisi_awal"  value="0" class="form-control" disabled>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12">            
                <p>Usulan/ide perbaikan</p>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">            
                <input  type="number" name="kondisi_akhir" id="kondisi_akhir" class="form-control" min="0" max="100" value="0" onfocus="startHitung()" onblur="akhirHitung()">
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">            
                <p class="text-secondary text-right">Bobot 30%</p>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">            
                <input type="text" id="bobot_kondisi_akhir" value="0" class="form-control" disabled>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12">            
                <p>Biaya/investasi yang dibutuhkan</p>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">            
                <input type="number" name="biaya" id="biaya" class="form-control" min="0" max="100" value="0" onfocus="startHitung()" onblur="akhirHitung()">
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">            
                <p class="text-secondary text-right">Bobot 25%</p>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">            
                <input type="text" id="bobot_biaya"  value="0" class="form-control" disabled>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12">            
                <p>Manfaat yang diperolah</p>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">            
                <input  type="number" name="manfaat" id="manfaat" class="form-control" min="0" max="100" value="0" onfocus="startHitung()" onblur="akhirHitung()">
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">            
                <p class="text-secondary text-right">Bobot 30%</p>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">            
                <input type="text" id="bobot_manfaat"  value="0" class="form-control" disabled>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12">            
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">            
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">            
                <p class="text-secondary text-right">TOTAL</p>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">            
                <input type="text" id="total" value="0" class="form-control" disabled>
                <input type="hidden" id="nilai" name="nilai">
            </div>
        </div>
  
</div>
<hr>
<div class="d-flex justify-content-end">
    <button type="button" class="btn btn-secondary waves-effect mr-2" data-dismiss="modal">Batal</button>
    <button type="submit" class="btn btn-primary waves-effect waves-light ">Simpan</button>
</div>
</form>

<script>
    function startHitung(){
        interval  = setInterval("hitung()",1);
    }

    function hitung(){
        var latarbelakang_ide   = parseInt(document.getElementById('latarbelakang_ide').value);
        var kondisi_awal        = parseInt(document.getElementById('kondisi_awal').value);
        var kondisi_akhir       = parseInt(document.getElementById('kondisi_akhir').value);
        var biaya               = parseInt(document.getElementById('biaya').value);
        var manfaat             = parseInt(document.getElementById('manfaat').value);

        ltrblk_ide  = parseFloat(latarbelakang_ide)*10/100;
        knds_awal   = parseFloat(kondisi_awal)*5/100;
        knds_akhir  = parseFloat(kondisi_akhir)*30/100;
        biaya       = parseFloat(biaya)*25/100;
        manfaat     = parseFloat(manfaat)*30/100;

        jumlah = ltrblk_ide + knds_awal +  knds_akhir + biaya + manfaat

        document.getElementById('bobot_latarbelakang_ide').value = ltrblk_ide;
        document.getElementById('bobot_kondisi_awal').value = knds_awal;
        document.getElementById('bobot_kondisi_akhir').value = knds_akhir;
        document.getElementById('bobot_biaya').value = biaya;
        document.getElementById('bobot_manfaat').value = manfaat;
        document.getElementById('total').value = jumlah.toFixed(2);
        document.getElementById('nilai').value = jumlah.toFixed(2);
    }
    function akhirHitung(){
        clearInterval(interval);
    }
</script>