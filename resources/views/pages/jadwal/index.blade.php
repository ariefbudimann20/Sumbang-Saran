@extends('layouts.frame')
@section('title','Jadwal Sumbang Saran')
@push('after-style')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endpush
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark"><i class="nav-icon far fa-calendar-alt"></i></i> Jadwal Sumbang Saran</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Sumbang Saran</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

    <section class="content">
       <div class="row content-jadwal">
           <div class="col-md-6 ml-3">
               <button class="btn btn-info font-weight-bold" type="button" data-toggle="collapse" data-target="#JadwalCollapse" aria-expanded="false" aria-controls="JadwalCollapse"><i class="fa fa-plus"></i> Jadwal</button>

               <div class="collapse mt-1" id="JadwalCollapse">
                   <div class="card card-body">
                       <form action="{{url('admin/jadwal')}}" method="POST">
                        @csrf
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="far fa-clock"></i></span>
                                    </div>
                                    <input type="text" id="daterange" class="form-control" /> 
                                   
                                </div>
                                <input type="hidden" id="mulai" name="awal"> 
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="far fa-clock"></i></span>
                                    </div>
                                    <input type="text" id="daterange1" class="form-control" name="selesai" />  
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-info font-weight-bold">Set Jadwal</button>
                        </div>
                       </form>
                   </div>
               </div>
            </div>
       </div>

       <div class="row mt-2">
           <div class="col-12">
               {{-- Content Card --}}
               <div class="card">
                   <div class="card-body">
                       <div class="table-responsive table-jadwal">
                           <table id="jadwal" class="table table-sm table-bordered table-striped" style="width:100%">
                                <thead class="text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Periode</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>        
                                </thead>
                                <tbody class="text-center">
                                    @foreach($jadwal as $jwl)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$jwl->created_at}} - {{$jwl->selesai}}</td>
                                        <td>@if($jwl->status == 0)
                                            <span class="badge badge-info p-2">Berjalan</span>
                                            @else
                                            <span class="badge badge-success p-2">Selesai</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="#mymodal" data-remote="{{route('jadwal.edit',$jwl->id)}}" data-toggle="modal" data-target="#mymodal" data-title="Ubah Sub Bagian"  class="btn btn-info btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="{{url('admin/jadwal',$jwl->id)}}" method="POST" class="d-inline">
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
    <!-- daterangepicker -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
 
<script>

    var date = new Date();
    var aaaa = date.getFullYear();
    var gg = date.getDate();
    var mm = (date.getMonth() + 1);

    if (gg < 10)
        gg = "0" + gg;

    if (mm < 10)
        mm = "0" + mm;

    var cur_day = aaaa + "-" + mm + "-" + gg;

    var hours = date.getHours()
    var minutes = date.getMinutes()
    var seconds = date.getSeconds();

    if (hours < 10)
        hours = "0" + hours;

    if (minutes < 10)
        minutes = "0" + minutes;

    if (seconds < 10)
        seconds = "0" + seconds;

    var today = cur_day + " " + hours + ":" + minutes + ":" + seconds;
    document.getElementById("mulai").value = today;
        $('#daterange').daterangepicker({ 
            "singleDatePicker": true,
            startDate: today, // after open picker you'll see this dates as picked
            locale: {
                "format": 'YYYY-MM-DD HH:mm:ss',
            }
        }, function (start, end, label) {
            //what to do after change
        }).val(today); 

        $('#daterange1').daterangepicker({
            "singleDatePicker": true,
            "timePicker": true,
            "timePicker24Hour": true,
            "minDate": "YYYY-MM-DD HH:mm:ss",
            "maxDate": "YYYY-MM-DD HH:mm:ss",
            autoUpdateInput: true,
            "locale": {
            "format": 'YYYY-MM-DD HH:mm:ss',
            "cancelLabel": 'Clear'
            }
        });
        </script>

    <!-- Datatables -->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#jadwal').DataTable();
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
@endpush
