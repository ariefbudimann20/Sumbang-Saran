<form action="{{url('admin/sub-bagian')}}" method="POST">
    @csrf
        <div class="form-group">
            <label>Bagian</label>
            <select name="bagian_id" class="form-control" required>
                <option value="">- Pilih -</option>
                @foreach($bagian as $bg)
                <option value="{{$bg->id}}">{{$bg->nama}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label>Sub Bagian</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <hr>
    <div class="d-flex justify-content-end">
        <button type="button" class="btn btn-secondary waves-effect mr-2" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary waves-effect ">Simpan</button>
    </div>
</form>
    