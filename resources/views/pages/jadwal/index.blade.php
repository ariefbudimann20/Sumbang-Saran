@extends('layouts.frame')
@section('title','Jadwal Sumbang Saran')
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
                <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
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
               <button class="btn btn-info font-weight-bold" type="button" data-toggle="collapse" data-target="#JadwalCollapse" aria-expanded="false" aria-controls="JadwalCollapse"><i class="fas fa-calendar-plus"></i> Buat Jadwal</button>

               <div class="collapse mt-1" id="JadwalCollapse">
                   <div class="card card-body">
                       <form action="{{url('jadwal')}}" method="POST">
                        @csrf
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="far fa-clock"></i></span>
                                    </div>
                                    <input type="text" id="daterange" class="form-control" disabled />  
                                </div>
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
                                        <th>Pemenang</th>
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
                                        <td>{{$jwl->pemenang}}</td>
                                        <td>
                                            <a href="#mymodal" data-remote="{{route('jadwal.edit',$jwl->id)}}" data-toggle="modal" data-target="#mymodal" data-title="Ubah Extension"  class="btn btn-info btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="{{url('jadwal',$jwl->id)}}" method="POST" class="d-inline">
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

    <div class="daterangepicker ltr show-calendar opensright" style="top: 1524px; left: auto; right: 0px; display: block;"><div class="ranges"></div><div class="drp-calendar left"><div class="calendar-table"><table class="table-condensed"><thead><tr><th class="prev available"><span></span></th><th colspan="5" class="month">May 2020</th><th></th></tr><tr><th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th></tr></thead><tbody><tr><td class="weekend off ends available" data-title="r0c0">26</td><td class="off ends available" data-title="r0c1">27</td><td class="off ends available" data-title="r0c2">28</td><td class="off ends available" data-title="r0c3">29</td><td class="off ends available" data-title="r0c4">30</td><td class="today active start-date active end-date available" data-title="r0c5">1</td><td class="weekend available" data-title="r0c6">2</td></tr><tr><td class="weekend available" data-title="r1c0">3</td><td class="available" data-title="r1c1">4</td><td class="available" data-title="r1c2">5</td><td class="available" data-title="r1c3">6</td><td class="available" data-title="r1c4">7</td><td class="available" data-title="r1c5">8</td><td class="weekend available" data-title="r1c6">9</td></tr><tr><td class="weekend available" data-title="r2c0">10</td><td class="available" data-title="r2c1">11</td><td class="available" data-title="r2c2">12</td><td class="available" data-title="r2c3">13</td><td class="available" data-title="r2c4">14</td><td class="available" data-title="r2c5">15</td><td class="weekend available" data-title="r2c6">16</td></tr><tr><td class="weekend available" data-title="r3c0">17</td><td class="available" data-title="r3c1">18</td><td class="available" data-title="r3c2">19</td><td class="available" data-title="r3c3">20</td><td class="available" data-title="r3c4">21</td><td class="available" data-title="r3c5">22</td><td class="weekend available" data-title="r3c6">23</td></tr><tr><td class="weekend available" data-title="r4c0">24</td><td class="available" data-title="r4c1">25</td><td class="available" data-title="r4c2">26</td><td class="available" data-title="r4c3">27</td><td class="available" data-title="r4c4">28</td><td class="available" data-title="r4c5">29</td><td class="weekend available" data-title="r4c6">30</td></tr><tr><td class="weekend available" data-title="r5c0">31</td><td class="off ends available" data-title="r5c1">1</td><td class="off ends available" data-title="r5c2">2</td><td class="off ends available" data-title="r5c3">3</td><td class="off ends available" data-title="r5c4">4</td><td class="off ends available" data-title="r5c5">5</td><td class="weekend off ends available" data-title="r5c6">6</td></tr></tbody></table></div><div class="calendar-time"><select class="hourselect"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12" selected="selected">12</option></select> : <select class="minuteselect"><option value="0" selected="selected">00</option><option value="30">30</option></select> <select class="ampmselect"><option value="AM" selected="selected">AM</option><option value="PM">PM</option></select></div></div><div class="drp-calendar right"><div class="calendar-table"><table class="table-condensed"><thead><tr><th></th><th colspan="5" class="month">Jun 2020</th><th class="next available"><span></span></th></tr><tr><th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th></tr></thead><tbody><tr><td class="weekend off ends available" data-title="r0c0">31</td><td class="available" data-title="r0c1">1</td><td class="available" data-title="r0c2">2</td><td class="available" data-title="r0c3">3</td><td class="available" data-title="r0c4">4</td><td class="available" data-title="r0c5">5</td><td class="weekend available" data-title="r0c6">6</td></tr><tr><td class="weekend available" data-title="r1c0">7</td><td class="available" data-title="r1c1">8</td><td class="available" data-title="r1c2">9</td><td class="available" data-title="r1c3">10</td><td class="available" data-title="r1c4">11</td><td class="available" data-title="r1c5">12</td><td class="weekend available" data-title="r1c6">13</td></tr><tr><td class="weekend available" data-title="r2c0">14</td><td class="available" data-title="r2c1">15</td><td class="available" data-title="r2c2">16</td><td class="available" data-title="r2c3">17</td><td class="available" data-title="r2c4">18</td><td class="available" data-title="r2c5">19</td><td class="weekend available" data-title="r2c6">20</td></tr><tr><td class="weekend available" data-title="r3c0">21</td><td class="available" data-title="r3c1">22</td><td class="available" data-title="r3c2">23</td><td class="available" data-title="r3c3">24</td><td class="available" data-title="r3c4">25</td><td class="available" data-title="r3c5">26</td><td class="weekend available" data-title="r3c6">27</td></tr><tr><td class="weekend available" data-title="r4c0">28</td><td class="available" data-title="r4c1">29</td><td class="available" data-title="r4c2">30</td><td class="off ends available" data-title="r4c3">1</td><td class="off ends available" data-title="r4c4">2</td><td class="off ends available" data-title="r4c5">3</td><td class="weekend off ends available" data-title="r4c6">4</td></tr><tr><td class="weekend off ends available" data-title="r5c0">5</td><td class="off ends available" data-title="r5c1">6</td><td class="off ends available" data-title="r5c2">7</td><td class="off ends available" data-title="r5c3">8</td><td class="off ends available" data-title="r5c4">9</td><td class="off ends available" data-title="r5c5">10</td><td class="weekend off ends available" data-title="r5c6">11</td></tr></tbody></table></div><div class="calendar-time"><select class="hourselect"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11" selected="selected">11</option><option value="12">12</option></select> : <select class="minuteselect"><option value="0">00</option><option value="30">30</option></select> <select class="ampmselect"><option value="AM">AM</option><option value="PM" selected="selected">PM</option></select></div></div><div class="drp-buttons"><span class="drp-selected">05/01/2020 12:00 AM - 05/01/2020 11:59 PM</span><button class="cancelBtn btn btn-sm btn-default" type="button">Cancel</button><button class="applyBtn btn btn-sm btn-primary" type="button">Apply</button> </div></div>
@endsection

@push('after-style')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endpush
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
        $('#daterange').daterangepicker({ 
            "singleDatePicker": true,
            startDate: today, // after open picker you'll see this dates as picked
            locale: {
                "format": 'YYYY-MM-DD hh:mm:ss',
            }
        }, function (start, end, label) {
            //what to do after change
        }).val(today); 

        $('#daterange1').daterangepicker({
            "singleDatePicker": true,
            "timePicker": true,
            "timePicker24Hour": true,
            "minDate": "YYYY-MM-DD",
            "maxDate": "YYYY-MM-DD",
            autoUpdateInput: true,
            "locale": {
            "format": 'YYYY-MM-DD hh:mm:ss',
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
