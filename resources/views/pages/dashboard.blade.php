@extends('layouts.frame')
@section('title','Dashboard')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><i class="fas fa-tachometer-alt"></i> Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          @if(Auth::user()->hak_akses <= 1)
          <div class="col-lg-3 col-3">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$sumbangsaran->count()}}</h3>

                <p>Sumbang Saran</p>
              </div>
              <div class="icon">
                <i class="fab fa-audible"></i>
              </div>
              <a href="{{url('admin/sumbang-saran')}}" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-3">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$karyawan->count()}}</h3>

                <p>Data Karyawan</p>
              </div>
              <div class="icon">
                <i class="fas fa-database"></i>
              </div>
              <a href="{{url('admin/karyawan')}}" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-3">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$user->count()}}</h3>

                <p>Manajemen User</p>
              </div>
              <div class="icon">
                <i class="fas fa-users-cog"></i>
              </div>
              <a href="{{url('admin/user')}}" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-3">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$bagian->count()}}</h3>

                <p>Bagian</p>
              </div>
              <div class="icon">
                <i class="fas fa-layer-group"></i>
              </div>
              <a href="{{url('admin/bagian')}}" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          @else
          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 class="text-white">{{$penilaian->count()}}</h3>

                <p class="text-white">Saran yang telah dinilai oleh TIM PENILAI</p>
              </div>
              <div class="icon">
                <i class="fas fa-star-half-alt"></i>
              </div>
              <a href="{{url('penilai/penilaian')}}" class="small-box-footer"><p class=" text-white d-inline">Selengkapnya</p> <i class="fas fa-arrow-circle-right text-white"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$peserta}}</h3>

                <p>Finalis</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-medal"></i>
              </div>
              <a href="{{url('penilai/finalis')}}" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          @endif
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection


<script src="{{url('assets/plugins/jquery/jquery.min.js')}}"></script>
<script>
  $(window).on('load', function(){
    $('.content .col-6').each(function(i) {
      setTimeout(function() {
        $('.content .col-6').eq(i).addClass('show-content');
      }, 200 * i)
    })
  })
;</script>