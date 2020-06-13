@extends('layouts.frame')
@section('title','Finalis')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark"> <i class="nav-icon fas fa-medal"></i> Finalis</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{url('penilai/dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Finalis</li>
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
                            <a class="btn btn-success mr-1" href="{{url('penilai/finalis/export-excel')}}" role="button"><i class="fas fa-file-excel"></i></a>
                            <a class="btn btn-danger" href="{{url('penilai/finalis/export-pdf')}}" role="button"><i class="fas fa-file-pdf"></i></a>
                        </div>
                        <div class="table-responsive-sm table-sm table-datakaryawan">
                            <table id="finalis" class="text-center table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NIK</th>
                                        <th>NAMA</th>
                                        <th>BAGIAN</th>
                                        <th>EXT</th>
                                        <th>JUDUL</th>
                                        <th>PERIODE</th>
                                        <th>NILAI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($karyawan as $ky)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$ky->karyawan->nik}}</td>
                                        <td>{{$ky->karyawan->nama}}</td>
                                        <td>{{$ky->karyawan->bagian->nama}}</td>
                                        <td>{{$ky->karyawan->ext->nama}}</td>
                                        <td>{{$ky->sumbangsaran->judul}}</td>
                                        <td>{{$ky->sumbangsaran->periode}}</td>
                                        <td>{{$ky->nilai}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <h6><strong>* Data Yang Tampil Dengan Nilai Minimal 350 Point</strong></h6>
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
            $('#finalis').DataTable();
        } );
    </script>
@endpush