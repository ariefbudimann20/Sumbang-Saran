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
                       <div class="row">
                           <div class="col-md-6">
                               <div class="form-group text-center">
                                   <input type="text" id="mulai" placeholder="Mulai" class="form-control text-center">  
                               </div>
                           </div>
                           <div class="col-md-6">
                               <div class="form-group text-center">
                                   <input type="text" id="selesai" placeholder="Selesai" class="form-control text-center">
                               </div>
                           </div>
                       </div>
                       <div class="row justify-content-center">
                           <button class="btn btn-info font-weight-bold">Set Jadwal</button>
                       </div>
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
                                    <tr>
                                        <td>1</td>
                                        <td>30 Maret 2020 - 29 April 2020</td>
                                        <td>Selesai</td>
                                        <td>Reza Fahlevi</td>
                                        <td>
                                            <button class="btn btn-sm btn-danger" type="submit">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>30 April 2020 - 29 Mei 2020</td>
                                        <td>Sedang Berlangsung</td>
                                        <td>-</td>
                                        <td>
                                            <button class="btn btn-sm btn-danger disabled" type="submit">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
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
            $('#jadwal').DataTable();
        } );
    </script>

    {{-- Date Picker --}}
    <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="{{url('assets/plugins/jquery-ui/jquery-ui.css')}}">

    <script>
        $(document).ready(function(){
            $('#selesai, #mulai').datepicker({
                dateFormat:"dd MM yy",
                showOtherMonths: true,
                changeMonth: true,
                changeYear:true,
            });
        });
    </script>
@endpush
