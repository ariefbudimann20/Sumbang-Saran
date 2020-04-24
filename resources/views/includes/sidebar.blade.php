<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="admin.html" class="brand-link">
      <i class="ml-3 fas fa-box-open"></i>
      <span class="brand-text font-weight-light">Sumbang Saran</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="{{url('dashboard')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          
          <li class="nav-header">JOB ADMIN</li>
          <li class="nav-item">
            <a href="{{url('sumbang-saran')}}" class="nav-link">
              <i class="nav-icon fab fa-audible"></i>
              <p>Kelola Sumbang Saran</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('karyawan')}}" class="nav-link">
              <i class="nav-icon fas fa-database"></i>
              <p>Data Karyawan</p>
            </a>
          </li>

          <li class="nav-header">JOB TIM PENILAI</li>
          <li class="nav-item">
            <a href="{{url('penilaian')}}" class="nav-link">
              <i class="nav-icon fas fa-star-half-alt"></i>
              <p>Penilaian</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('peserta-terbaik')}}" class="nav-link">
              <i class="nav-icon fas fa-medal"></i>
              <p>Peserta Terbaik</p>
            </a>
          </li>

          <li class="nav-header">AKUN</li>
          <li class="nav-item">
              <a  class="nav-link" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  <i class="fas fa-sign-out-alt"></i>
                  {{ __('Keluar') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>