
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Nomor Induk Karyawan : </label>
                <p>{{$ss->nik}}</p>
            </div>
            <div class="form-group">
                <label>Nama Lengkap :</label>
                <p>{{$ss->nama}}</p>
            </div>
            <div class="form-group">
                <label>Judul Sumbang Saran :</label>
                <p>{{$ss->judul}}</p>
            </div>
            <div class="form-group">
                <label>Gambarkan Kondisi Awal :</label>
                <p>{{$ss->kondisi_awal}}</p>
            </div>
            <div class="form-group">
                <label>Gambarkan Kondisi Yang Diinginkan :</label>
                <p>{{$ss->kondisi_akhir}}</p>
            </div>  
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Bagian :</label>
                <p>{{$ss->bagian}}</p>
            </div>
            <div class="form-group">
                <label>Ext :</label>
                <p>{{$ss->ext}}</p>
            </div>
            <div class="form-group">
                <label for="foto">Foto :</label><br>
                <div class="col-md-6 col-lg-4 item zoom-on-hover"><a href="{{url('assets/images',$ss->foto)}}" data-lightbox="image-1">
                    <img style="width:auto; height:80px; margin-bottom:10px;" src="{{url('assets/images',$ss->foto)}}" /></a>
                </div>
            </div>
            <div class="form-group">
                <label>Manfaat Bagi Perusahaan :</label>
                <p>{{$ss->manfaat}}</p>
            </div>
        </div>
        <div class="col-md-4">
            <h5 class="mb-4">Kriteria Penilaian</h5>
            <div class="form-group">
                <label>Menggunaan Material</label>
                <input type="text" id="nilai1" min="0" max="10" onkeyup="sum()" class="form-control col-md-4">
            </div>
            <div class="form-group">
                <label>SS Digunakan</label>
                <input type="text" id="nilai2" min="0" max="25" onkeyup="sum()" class="form-control col-md-4">
            </div>
            <div class="form-group">
                <label>Quality</label>
                <input type="text" id="nilai3" min="0" max="25" onkeyup="sum()" class="form-control col-md-4">
            </div> 
            <div class="form-group">
                <label>Cost</label>
                <input type="text" id="nilai4" min="0" max="20" onkeyup="sum()" class="form-control col-md-4">
            </div>
            <div class="form-group">
                <label>Delivery</label>
                <input type="text" id="nilai5" min="0" max="20" onkeyup="sum()" class="form-control col-md-4">
            </div>
            <div class="form-group">
                <label>Total</label>
                <input type="text" id="total" class="form-control col-md-4" disabled>
            </div>     
        </div>
    </div>
</div>
<hr></hr>
<div class="d-flex justify-content-end">
    <button type="button" class="btn btn-default waves-effect mr-2" data-dismiss="modal">Batal</button>
    <button type="submit" class="btn btn-primary waves-effect waves-light ">Simpan</button>
</div>