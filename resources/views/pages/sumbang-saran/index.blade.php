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
    
    <section class="content">
        <div class="row">
            <div class="col-12">
                <!-- Content Card -->
                <div class="card">
                    <div class="card-body">
                        <table id="sumbang-saran" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>NIK</th>
                                    <th>NAMA</th>
                                    <th>JUDUL</th>
                                    <th>BAGIAN</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>09099090</td>
                                    <td>ABDUL</td>
                                    <td>KAIZEN LINGKUNGAN</td>
                                    <td>MAINTENANCE</td>
                                    <td>
                                        <a href="" class="btn btn-info" role="button">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="" class="btn btn-danger" role="button">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('after-script')
    <script>
        $(document).ready(function() {
            $('#sumbang-saran').DataTable();
        } );
    </script>
@endpush