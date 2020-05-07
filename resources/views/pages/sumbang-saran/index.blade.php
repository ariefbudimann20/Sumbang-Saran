@extends('layouts.frame')
@section('title','Sumbang Saran')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark"><i class="nav-icon fab fa-audible"></i> Sumbang Saran</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Sumbang Saran</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Modal Ubah Periode -->
      {{-- <div class="modal fade modal-ubah-periode" id="modal-ubahperiode" tabindex="-1" role="dialog" aria-labelledby="modal-ubahperiodeTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header bg-info">
              <h5 class="modal-title" id="modal-ubahperiodeTitle">Periode Sumbang Saran</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="">
                  <div class="form-group mt-3">
                      <label for="mulai">Tanggal Mulai &nbsp;&nbsp;:</label>
                      <input type="text" id="mulai" class="date-picker text-center">
                  </div>
                  <div class="form-group">
                      <label for="selesai">Tanggal Selesai :</label>
                      <input type="text" id="selesai" class="date-picker text-center">
                  </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
              <button type="button" class="btn btn-info">Simpan</button>
            </div>
          </div>
        </div>
      </div> --}}
      <!-- Modal Ubah Periode -->

    <section class="content">
        <div class="row">
            <div class="col-12">
                <!-- Content Card -->
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive-sm table-sumbangsaran">
                            <table id="sumbangsaran" class="table table-striped table-sm table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NIK</th>
                                        <th>NAMA</th>
                                        <th>JUDUL</th>
                                        <th>BAGIAN</th>
                                        <th>PERIODE</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sumbangsaran as $ss)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$ss->karyawan->nik}}</td>
                                        <td>{{$ss->karyawan->nama}}</td>
                                        <td>{{$ss->judul}}</td>
                                        <td>{{$ss->karyawan->bagian->nama}}</td>
                                        <td>{{$ss->periode}}</td>
                                        <td>
                                            <a href="#mymodal" data-remote="{{route('sumbang-saran.show', $ss->id)}}" data-toggle="modal" data-target="#mymodal" data-title="Detail Sumbang Saran: {{$ss->judul}}"  class="btn btn-info btn-sm">
                                                <i class="fa fa-eye"></i>

                                            </a>
                                            <form action="{{url('sumbang-saran',$ss->id)}}" method="POST" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger btn-sm" type="submit">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
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

@push('after-script')

    <!-- Datatables -->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#sumbangsaran').DataTable();
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
    <script></script>

    <div class="modal fade bd-example-modal-lg" id="mymodal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
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

    {{-- Date Picker --}}
    {{-- <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="{{url('assets/plugins/jquery-ui/jquery-ui.css')}}">

    <script>
        $(document).ready(function(){
            $('.date-picker').datepicker({
                dateFormat:"dd MM yy",
                showOtherMonths: true,
                changeMonth: true,
                changeYear:true,
            });
        });
    </script> --}}
@endpush
