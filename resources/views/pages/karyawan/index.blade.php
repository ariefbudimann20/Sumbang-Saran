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
                <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Karyawan</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
          <div class="top-bardk">
              <div class="col-12">
                <button class="btn btn-warning kelola-bagian" data-toggle="modal" data-target="#modal-bagian"><i class="fas fa-tasks"></i> Bagian</button>
                <button class="btn btn-warning kelola-ext" data-toggle="modal" data-target="#modal-extension"><i class="fas fa-phone-alt"></i> Extension</button>
              </div> 
          </div>

          <!-- Modal Bagian -->
          <div class="modal fade" id="modal-bagian" tabindex="-1" role="dialog" aria-labelledby="modal-bagianTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
              <div class="modal-content">
                <div class="modal-header bg-warning">
                  <h5 class="modal-title" id="modal-bagianTitle">Kelola Bagian</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <button class="btn btn-primary mb-3" data-toggle="collapse" data-target="#collapseTambahextension" aria-expanded="false" aria-controls="collapseTambahbagian"><i class="fas fa-plus"></i> Tambah Bagian</button>
                        <!-- Collapse Tambah Bagian -->
                        <div class="collapse" id="collapseTambahbagian">
                            <div class="card card-body">
                                <div class="form-group mt-3">
                                    <label for="namabagian">Nama Bagian :</label>
                                    <input type="text" id="namabagian" class="d-inline">
                                    <button class="btn btn-success">Tambah</button>
                                </div>
                            </div>
                        </div>
                        <!-- Collapse Tambah Bagian -->   
                    <div class="table-responsive table-modalbagian">
                        <table class="table table-striped table-bordered">
                          <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Bagian</th>
                                  <th>Aksi</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr>
                                  <td>1</td>
                                  <td>HRD</td>
                                  <td>
                                      <a href="" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                  </td>
                              </tr>
                              <tr>
                                  <td>2</td>
                                  <td>Produksi</td>
                                  <td>
                                      <a href="" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                  </td>
                              </tr>
                              <tr>
                                  <td>3</td>
                                  <td>QA</td>
                                  <td>
                                      <a href="" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                  </td>
                              </tr>
                              <tr>
                                  <td>4</td>
                                  <td>QC</td>
                                  <td>
                                      <a href="" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                  </td>
                              </tr>
                          </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
          <!-- Modal Bagian -->

          <!-- Modal Extension -->
          <div class="modal fade" id="modal-extension" tabindex="-1" role="dialog" aria-labelledby="modal-extensionTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
              <div class="modal-content">
                <div class="modal-header bg-warning">
                  <h5 class="modal-title" id="modal-extensionTitle">Kelola Extension</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <button class="btn btn-primary mb-3" data-toggle="collapse" data-target="#collapseTambahextension" aria-expanded="false" aria-controls="collapseTambahextension"><i class="fas fa-plus"></i> Tambah Extension</button>
                    <!-- Collapse Tambah Bagian -->
                    <div class="collapse" id="collapseTambahextension">
                        <div class="card card-body">
                            <div class="form-group mt-3">
                                <label for="namaextension">Nama Extension :</label>
                                <input type="text" id="namaextension" class="d-inline">
                                <button class="btn btn-success">Tambah</button>
                            </div>
                        </div>
                    </div>
                    <!-- Collapse Tambah Bagian -->   
                <div class="table-responsive table-modalextension">
                    <table class="table table-striped table-bordered">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Extension</th>
                              <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <td>1</td>
                              <td>100</td>
                              <td>
                                  <a href="" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                              </td>
                          </tr>
                          <tr>
                              <td>2</td>
                              <td>101</td>
                              <td>
                                  <a href="" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                              </td>
                          </tr>
                          <tr>
                              <td>3</td>
                              <td>102</td>
                              <td>
                                  <a href="" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                              </td>
                          </tr>
                          <tr>
                              <td>4</td>
                              <td>103</td>
                              <td>
                                  <a href="" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                              </td>
                          </tr>
                      </tbody>
                    </table>
                </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
          </div>
          <!-- Modal Extension -->

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
                            <table id="sumbang-saran" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NIK</th>
                                        <th>NAMA</th>
                                        <th>BAGIAN</th>
                                        <th>EXT</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($karyawan as $ky)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$ky->nik}}</td>
                                        <td>{{$ky->nama}}</td>
                                        <td>{{$ky->bagian}}</td>
                                        <td>{{$ky->ext}}</td>
                                        <td>
                                            <form action="{{url('karyawan',$ky->id)}}" method="POST" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button href="" class="btn btn-danger" type="submit">
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
            $('#sumbang-saran').DataTable();
        } );
    </script>
@endpush