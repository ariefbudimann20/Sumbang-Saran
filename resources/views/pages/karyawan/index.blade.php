@extends('layouts.frame')
@section('title','Karyawan')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark"> <i class="nav-icon fas fa-database"></i></i> Karyawan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Karyawan</li>
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
                        <div class="table-responsive-sm table-datakaryawan">
                            <table id="karyawan" class="table table-striped table-sm table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nik</th>
                                        <th>Nama</th>
                                        <th>Bagian</th>
                                        <th>Sub Bagian</th>
                                        <th>Jumlah</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($karyawan as $ky)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$ky->nik}}</td>
                                        <td>{{$ky->nama}}</td>
                                        <td>{{$ky->bagian->nama}}</td>
                                        <td>{{$ky->sub_bagian->nama}}</td>
                                        <td>{{$ky->sumbangsaran_count}}</td>
                                        <td>{{$ky->status->nama}}</td>
                                        <td>
                                            <form action="{{url('admin/karyawan',$ky->id)}}" method="POST" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button href="" class="btn btn-danger btn-sm" type="submit">
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
            $('#karyawan').DataTable();
        } );
    </script>
@endpush