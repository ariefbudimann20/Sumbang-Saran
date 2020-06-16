<form action="{{url('admin/status',$status->id)}}" method="POST">
    @csrf
    @method('PUT')
        <div class="form-group mb-4">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{$status->nama}}" required>
        </div>
    <hr>
    <div class="d-flex justify-content-end">
        <button type="button" class="btn btn-secondary waves-effect mr-2" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary waves-effect">Simpan</button>
    </div>
    </form>
    