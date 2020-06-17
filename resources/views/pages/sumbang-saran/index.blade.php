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
                <li class="breadcrumb-item"><a href="admin/dashboard')}}">Home</a></li>
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
                        <div class="row mb-5 justify-content-between">
                            <div class="text-left mb-2">
                                <a class="btn btn-success mr-1" href="{{url('admin/sumbang-saran/export-excel')}}" role="button"><i class="fas fa-file-excel"></i> Export to Excel</a>
                                <a class="btn btn-danger" href="{{url('admin/sumbang-saran/export-pdf')}}" role="button"><i class="fas fa-file-pdf"></i> Export to PDF</a>
                            </div>
                            <div class="text-right mb-2">
                                <meta name="csrf-token" content="{{ csrf_token() }}">
                                <a class="btn btn-danger mr-1 text-right" href="{{url('admin/sumbang-saran/e')}}" role="button"><i class="fas fa-trash"></i> Delete All</a>
                            </div>
                        </div>
                        <div class="table-responsive-sm table-sumbangsaran">
                            <table id="sumbangsaran" class="text-center table table-striped table-sm table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nik</th>
                                        <th>Nama</th>
                                        <th>Bagian</th>
                                        <th>Judul</th>
                                        <th>Periode</th>
                                        <th>Tanggal Kirim</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sumbangsaran as $ss)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$ss->karyawan->nik}}</td>
                                        <td>{{$ss->karyawan->nama}}</td>
                                        <td>{{$ss->karyawan->bagian->nama}}</td>
                                        <td>{{Str::limit($ss->judul, 20)}}</td>
                                        <td>{{$ss->periode}}</td>
                                        <td>{{$ss->created_at->format('d M Y H:i:s')}}</td>
                                        <td>
                                            <a href="#mymodal" data-remote="{{route('sumbang-saran.show', $ss->id)}}" data-toggle="modal" data-target="#mymodal" data-title="Detail Sumbang Saran : {{$ss->judul}}"  class="btn btn-info btn-sm">
                                                <i class="fa fa-eye"></i>

                                            </a>
                                            <meta name="csrf-token" content="{{ csrf_token() }}">
                                            <a href="#" role="button" data-id="{{$ss->id}}" data-name="{{$ss->judul}}" class="servdeletebtn btn btn-danger btn-sm "><i class="fas fa-trash"></i></a>
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
<!-- Sweetalert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
@endpush
@push('after-script')
    <!-- Datatables -->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#sumbangsaran').DataTable();
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
                    // text: "Menghapus Data Sumbang Saran " + postName,
                    html: '<span class="text-center">Hapus Data Sumbang Saran <strong>'+ postName +'</strong></span>',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url : "/admin/sumbang-saran/" + postId,
                            type: "DELETE",
                            data: {
                                '_token' : token,
                                'id' : postId
                            },
                            success: function(response){
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Data Sumbang Saran Berhasil Di Hapus',
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

    <div class="modal fade bd-example-modal-xl" id="mymodal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-scrollable modal-xl d-block mx-auto" role="document">
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
