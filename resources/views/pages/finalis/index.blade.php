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
                            <a class="btn btn-success mr-1" href="{{url('penilai/finalis/export-excel')}}" role="button"><i class="fas fa-file-excel"></i> Export Excel</a>
                            <a class="btn btn-danger" href="{{url('penilai/finalis/export-pdf')}}" role="button"><i class="fas fa-file-pdf"></i> Export PDF</a>
                        </div>
                        <div class="table-responsive-sm table-sm table-datakaryawan">
                            <table id="finalis" class="text-center table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nik</th>
                                        <th>Nama</th>
                                        <th>Bagian</th>
                                        <th>Sub Bagian</th>
                                        <th>Judul</th>
                                        <th>Periode</th>
                                        {{-- <th>Status</th> --}}
                                        <th>Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($karyawan as $ky)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$ky->karyawan->nik}}</td>
                                        <td>{{$ky->karyawan->nama}}</td>
                                        <td>{{$ky->karyawan->bagian->nama}}</td>
                                        <td>{{$ky->karyawan->sub_bagian->nama}}</td>
                                        <td>{{Str::limit($ky->judul, 20)}}</td>
                                        <td>{{$ky->periode}}</td>
                                        {{-- <td>@if($ky->jml_sdh_nilai == $penilai)
                                            <small class="badge badge-success p-2">Complete</small>
                                            @else
                                            <small class="badge badge-info p-2">Sudah Di Nilai {{$ky->jml_sdh_nilai}} : {{$penilai}}</small>
                                            @endif
                                        </td> --}}
                                        <td>
                                            {{$ky->nilai_total}}
                                            {{-- @php
                                                $total = 0;
                                            @endphp
                                            @foreach($ky->penilaian as $area)
                                            @php
                                                $total += $area->nilai;
                                            @endphp
                                            @endforeach
                                            {{ $total}} --}}
                                            
                                            {{-- @foreach($ky->penilaian as $total)
                                            {{$total->nilai}}
                                            @endforeach --}}
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
            $('#finalis').DataTable();
        } );
    </script>
@endpush