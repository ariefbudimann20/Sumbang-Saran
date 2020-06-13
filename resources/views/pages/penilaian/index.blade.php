@extends('layouts.frame')
@section('title','Penilaian')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark"><i class="nav-icon fas fa-star-half-alt"></i> Penilaian</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{url('penilai/dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Penilaian</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
    
    <section class="content">
        <div class="row">
            <div class="col-12">
                <!-- Content Card -->
                <div class="card">
                    <div class="card-body">
                        <div class="text-left mb-2">
                            <a class="btn btn-success mr-1" href="{{url('penilai/penilaian/export-excel')}}" role="button"><i class="fas fa-file-excel"></i></a>
                            <a class="btn btn-danger" href="{{url('penilai/penilaian/export-pdf')}}" role="button"><i class="fas fa-file-pdf"></i></a>
                        </div>
                        <div class="table-responsive table-penilaian">
                            <table id="penilaian" class="text-center table table-bordered table-striped table-sm" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NIK</th>
                                        <th>NAMA</th>
                                        <th>JUDUL</th>
                                        <th>BAGIAN</th>
                                        <th>PERIODE</th>
                                        <th>NILAI</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sumbangsaran as $ss)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$ss->karyawan->nik}}</td>
                                        <td>{{$ss->karyawan->nama}}</td>
                                        <td>{{Str::limit($ss->judul, 20)}}</td>
                                        <td>{{$ss->karyawan->bagian->nama}}</td>
                                        <td>{{$ss->periode}}</td>
                                        <td> @if($ss->penilaian->count() > 0)
                                                @foreach($ss->penilaian as $area)
                                                {{$area->nilai}}
                                                @endforeach
                                                @else
                                                <span class="badge badge-danger p-2">Belum Di Nilai</span>
                                            @endif
                                        </td>
                                       
                                        <td>
                                            @if($ss->penilaian->count() > 0)
                                                <a href="#mymodal" data-remote="{{route('penilaian.show', $ss->id)}}" data-toggle="modal" data-target="#mymodal" data-title="Detail Sumbang Saran: {{$ss->judul}}"  class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            @else
                                                <a href="#mymodal" data-remote="{{route('penilaian.show', $ss->id)}}" data-toggle="modal" data-target="#mymodal" data-title="Detail Sumbang Saran: {{$ss->judul}}"  class="btn btn-success btn-sm">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            @endif
                                            {{-- <form action="{{url('penilaian',$ss->id)}}" method="POST" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger btn-sm" type="submit">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form> --}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('after-style')
<style>
@media screen and (min-width: 768px) {
  .modal-xl {
    width: 90%;
   max-width:1200px;
  }
}

</style>
@endpush
@push('after-script')
    <!-- Datatables -->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#penilaian').DataTable();
        } );
    </script>

    <!-- Modal -->
    <script>
        jQuery(document).ready(function($){
            $('#mymodal').on('show.bs.modal',function(e){
                var button = $(e.relatedTarget);
                var modal = $(this);
                modal.find('.modal-body').load(button.data('remote'));
                modal.find('.modal-title').html(button.data('title'));
            });
        });
    </script>

    <div class="modal fade" id="mymodal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-scrollable modal-xl d-block mx-auto" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #c9c8e0">
            <h5 class="modal-title" style="color: #0f0e20">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <i class="fa fa-spinner fa-spin"></i>
            </div>
        </div>
        </div>
    </div>

    <script>
        function sum(){
            var text1 = document.getElementById('nilai1').value;
            var text2 = document.getElementById('nilai2').value;
            var text3 = document.getElementById('nilai3').value;
            var text4 = document.getElementById('nilai4').value;
            var text5 = document.getElementById('nilai5').value;
            var result = parseInt(text1) + parseInt(text2) + parseInt(text3) + parseInt(text4) + parseInt(text5);
            if (!isNaN(result)){
                document.getElementById('total').value = result;
            }
        }
    </script>
@endpush