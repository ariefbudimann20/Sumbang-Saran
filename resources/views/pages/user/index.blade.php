@extends('layouts.frame')
@section('title','Manajemen User')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark"><i class="fas fa-users-cog"></i> Manajemen User
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                  <li class="breadcrumb-item active">Manajemen User</li>
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
                    <a href="#mymodal" data-remote="{{route('user.create')}}" data-toggle="modal" data-target="#mymodal" data-title="Tambah User"  class="btn btn-primary font-weight-bold mb-3">
                        <i class="fa fa-plus"></i> User
                    </a>
                       <div class="table-responsive table-jadwal">
                           <table id="user" class="table table-sm table-bordered table-striped" style="width:100%">
                                <thead class="text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>        
                                </thead>
                                <tbody class="text-center">
                                    @foreach($user as $usr)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$usr->username}}</td>
                                        <td>{{$usr->name}}</td>
                                        <td>{{$usr->email}}</td>
                                        <td>
                                            @if($usr->hak_akses == 1)
                                                <span class="badge badge-danger p-2">Admin</span>
                                            @elseif($usr->hak_akses == 2)
                                                <span class="badge badge-primary p-2">Penilai</span>
                                            @else
                                                <span class="badge badge-success p-2">User</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($usr->id == 1)
                                                <a href="#mymodal" data-remote="{{route('user.edit',$usr->id)}}" data-toggle="modal" data-target="#mymodal" data-title="Ubah User"  class="btn btn-info btn-sm">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            @else
                                                <a href="#mymodal" data-remote="{{route('user.edit',$usr->id)}}" data-toggle="modal" data-target="#mymodal" data-title="Ubah User"  class="btn btn-info btn-sm">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <meta name="csrf-token" content="{{ csrf_token() }}">
                                                <a href="#" role="button" data-id="{{$usr->id}}" data-name="{{$usr->name}}" class="servdeletebtn btn btn-danger btn-sm "><i class="fas fa-trash"></i></a>
                                            @endif
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
            $('#user').DataTable();
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
                    html: '<span class="text-center">Hapus Data User <strong>'+ postName +'</strong>, Data Yang Berhubungan Dengan Data Ini Akan Terhapus</span>',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url : "/admin/user/" + postId,
                            type: "DELETE",
                            data: {
                                '_token' : token,
                                'id': postId
                            },
                            success: function(response){
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Data User Berhasil Di Hapus',
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
