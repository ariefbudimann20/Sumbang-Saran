@extends('layouts.frame')
@section('title','Bagian')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark"><i class="nav-icon fas fa-layer-group"></i> Bagian
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                  <li class="breadcrumb-item active">Bagian</li>
                </ol>
              </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

    <section class="content">
       <div class="row mt-2">
           <div class="col-12">
               {{-- Content Card --}}
               <div class="card">
                   <div class="card-body">
                    <a href="#mymodal" data-remote="{{route('bagian.create')}}" data-toggle="modal" data-target="#mymodal" data-title="Tambah Bagian"  class="btn btn-primary font-weight-bold mb-3">
                        <i class="fa fa-plus"></i> Bagian
                    </a>
                       <div class="table-responsive table-jadwal">
                           <table id="bagian" class="table table-sm table-bordered table-striped" style="width:100%">
                                <thead class="text-center">
                                    <tr>
                                        <th style="width:10%">No</th>
                                        <th style="width:70%">Nama</th>
                                        <th style="width:20%">Aksi</th>
                                    </tr>        
                                </thead>
                                <tbody class="text-center">
                                    @foreach($bagian as $bg)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$bg->nama}}</td>
                                        <td>
                                            <a href="#mymodal" data-remote="{{route('bagian.edit',$bg->id)}}" data-toggle="modal" data-target="#mymodal" data-title="Ubah Bagian"  class="btn btn-info btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="#" role="button" data-id="{{$bg->id}}" data-name="{{$bg->nama}}" class="servdeletebtn btn btn-danger btn-sm "><i class="fas fa-trash"></i></a>
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
            $('#bagian').DataTable();
        } );
    </script>

    <!-- Hapus Item -->
    <script>
        $(document).ready(function(){
            $('.servdeletebtn').click(function(e){
                e.preventDefault();
                var postId = $(this).data('id'); 
                var postName = $(this).data('name'); 
                // alert(postId);
                Swal.fire({
                    title: 'Apa Kamu Yakin?',
                    html: '<span class="text-center">Hapus Data Bagian <strong>'+ postName +'</strong>, Data Yang Berhubungan Dengan Data Ini Akan Terhapus</span>',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url : "/admin/bagian/" + postId,
                            type: "DELETE",
                            data: {
                                '_token' : $('input[name=_token]').val(),
                                'id': postId
                            },
                            success: function(response){
                                Swal.fire(
                                'Success!',
                                'Data Bagian Berhasil Di Hapus',
                                'success'
                                )
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

    <div class="modal fade" id="mymodal" tabindex="-1" role="dialog">
        <div class="modal-dialog d-block mx-auto" role="document">
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
