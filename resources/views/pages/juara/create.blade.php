<form action="{{url('admin/juara')}}" method="POST">
    @csrf
    <div class="form-group">
        <label>Juara I</label>
        <select name="juara1" class="form-control" required>
            <option value="">- Pilih -</option>
            @foreach($finalis as $fnl)
                @foreach ($fnl->penilaian as $item)
                <option value="{{$item->id}}">{{$item->karyawan->nama}} ({{$item->karyawan->bagian->nama}}) - {{$item->nilai}}</option>
                @endforeach
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Juara II</label>
        <select name="juara2" class="form-control" required>
            <option value="">- Pilih -</option>
            @foreach($finalis as $fnl)
                @foreach ($fnl->penilaian as $item)
                <option value="{{$item->id}}">{{$item->karyawan->nama}} ({{$item->karyawan->bagian->nama}}) - {{$item->nilai}}</option>
                @endforeach
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Juara III</label>
        <select name="juara3" class="form-control" required>
            <option value="">- Pilih -</option>
            @foreach($finalis as $fnl)
                @foreach ($fnl->penilaian as $item)
                <option value="{{$item->id}}">{{$item->karyawan->nama}} ({{$item->karyawan->bagian->nama}}) - {{$item->nilai}}</option>
                @endforeach
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Periode</label>
        <select name="periode_id" class="form-control" required>
            <option value="">- Pilih -</option>
            @foreach($periode as $pd)
            <option value="{{ $pd->id }}">{{ $pd->mulai}} - {{$pd->selesai}}</option>
            @endforeach
        </select>
    </div>
    <hr>
    <div class="d-flex justify-content-end">
        <button type="button" class="btn btn-secondary waves-effect mr-2" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary waves-effect waves-light ">Simpan</button>
    </div>
</form>