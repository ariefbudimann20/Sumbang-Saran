
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <label>Nomor Induk Karyawan : </label>
                <p>{{$ss->nik}}</p>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <label>Nama Lengkap :</label>
                <p>{{$ss->nama}}</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <label>Bagian :</label>
                <p>{{$ss->bagian}}</p>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <label>Ext :</label>
                <p>{{$ss->ext}}</p>
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
                <label for="foto">Foto :</label><br>
                <div class="col-md-6 col-lg-4 item zoom-on-hover"><a href="{{url('assets/images',$ss->foto)}}" data-lightbox="image-1">
                    <img style="width:auto; height:80px; margin-bottom:10px;" src="{{url('assets/images',$ss->foto)}}" /></a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <label>Gambarkan Kondisi Awal :</label>
                <p class="text-justify">{{$ss->kondisi_awal}}</p>
            </div>  
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <label>Gambarkan Kondisi Yang Diinginkan :</label>
                <p class="text-justify">{{$ss->kondisi_akhir}}</p>
            </div>  
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="form-group">
                <label>Manfaat Bagi Perusahaan :</label>
                <p class="text-justify">{{$ss->manfaat}}</p>
            </div>
        </div>
    </div>
    <div class="row border border-info bg-penilaian">
        <div class="col-12 pt-4">
            <h4 class="mb-2 ml-2 font-italic">FORM PENILAIAN</h4>
        </div>
        <div class="col-md-6 col-sm-12">
            <pre>
                <div class="form-group d-flex">
                    <label>Menggunaan Material  : </label>
                    <div class="d-flex">
                    <input type="text" id="nilai1" min="0" max="100" onkeyup="sum()" class="form-control" placeholder="nilai 0 - 100">
                </div>
            </div>
            <div class="form-group d-flex">
                <label>SS Digunakan                 : </label>
                <div class="d-flex">
                    <input type="text" id="nilai2" min="0" max="100" onkeyup="sum()" class="form-control" placeholder="nilai 0 - 100" >
                </div>
            </div>
            <div class="form-group d-flex quality">
                <label>Quality                            : </label>
                <div class="d-flex">
                    <input type="text" id="nilai3" min="0" max="100" onkeyup="sum()" class="form-control" placeholder="nilai 0 - 100">
                </div>
            </div>  
            </pre>
        </div>
        <div class="col-md-6 col-sm-12">
            <pre>
                <div class="form-group d-flex">
                    <label>Cost                                 : </label>
                    <div class="d-flex">
                        <input type="text" id="nilai4" min="0" max="100" onkeyup="sum()" class="form-control" placeholder="nilai 0 - 100">
                    </div>
                </div>
                <div class="form-group d-flex">
                    <label>Delivery                           : </label>
                    <div class="d-flex">
                        <input type="text" id="nilai5" min="0" max="100" onkeyup="sum()" class="form-control" placeholder="nilai 0 - 100">
                    </div>
                </div>
                <div class="form-group d-flex total">
                    <label>Total                                 : </label>
                    <div class="d-flex">
                        <input type="text" id="total" class="form-control" disabled>
                    </div>
                </div>    
            </pre>
        </div>
    </div>
</div>
<hr>
<div class="d-flex justify-content-end">
    <button type="button" class="btn btn-secondary waves-effect mr-2" data-dismiss="modal">Batal</button>
    <button type="submit" class="btn btn-primary waves-effect waves-light ">Simpan</button>
</div>