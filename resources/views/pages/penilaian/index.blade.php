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
                <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
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
                        <div class="table-responsive-sm table-penilaian">
                            <table id="sumbang-saran" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NIK</th>
                                        <th>NAMA</th>
                                        <th>JUDUL</th>
                                        <th>BAGIAN</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sumbangsaran as $ss)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$ss->nik}}</td>
                                        <td>{{$ss->nama}}</td>
                                        <td>{{$ss->judul}}</td>
                                        <td>{{$ss->bagian}}</td>
                                        <td>
                                            <a href="#mymodal" data-remote="{{route('penilaian.show', $ss->id)}}" data-toggle="modal" data-target="#mymodal" data-title="Detail Sumbang Saran: {{$ss->judul}}"  class="btn btn-success btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            {{-- <form action="{{url('sumbang-saran',$ss->id)}}" method="POST" class="d-inline">
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
@media (min-width: 768px) {
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
            $('#sumbang-saran').DataTable();
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
        <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
            <h5 class="modal-title">Modal title</h5>
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