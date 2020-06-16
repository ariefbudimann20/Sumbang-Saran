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
                        <div class="text-left mb-2">
                            <a class="btn btn-success mr-1" href="{{url('admin/karyawan/export-excel')}}" role="button"><i class="fas fa-file-excel"></i></a>
                            <a class="btn btn-danger" href="{{url('admin/karyawan/export-pdf')}}" role="button"><i class="fas fa-file-pdf"></i></a>
                        </div>
                        <div class="table-responsive-sm table-datakaryawan">
                            <table id="karyawan" class="text-center table table-striped table-sm table-bordered" style="width:100%">
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
                                            <meta name="csrf-token" content="{{ csrf_token() }}">
                                            <a href="#" role="button" data-id="{{$ky->id}}" data-name="{{$ky->nama}}" class="servdeletebtn btn btn-danger btn-sm "><i class="fas fa-trash"></i></a>
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
    <!-- Sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
@endpush
@push('after-script')
    <!-- Datatables -->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#karyawan').DataTable();
        } );
    </script>

    <!-- Hapus Item -->
    <script>
        $(document).ready(function(){
            $('.servdeletebtn').click(function(e){
                e.preventDefault();
                var postId = $(this).data('id'); 
                var postName = $(this).data('name');
                var token = $("meta[name='csrf-token']").attr("content"); 
                // alert(postId);
                Swal.fire({
                    title: 'Apa Kamu Yakin?',
                    html: '<span class="text-center">Hapus Data Karyawan <strong>'+ postName +'</strong>, Data Yang Berhubungan Dengan Data Ini Akan Terhapus</span>',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url : "/admin/karyawan/" + postId,
                            type: "DELETE",
                            data: {
                                '_token' : token,
                                'id': postId
                            },
                            success: function(response){
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Data Karyawan Berhasil Di Hapus',
                                })
                                .then((result) => {
                                    location.reload();
                                })
                            },

                        });
            
                    }
                })
            })
        });
    </script>
@endpush