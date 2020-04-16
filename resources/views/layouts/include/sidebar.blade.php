  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('user.png') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->nama_petugas }} @if(Auth::user()->level == 1)(Admin) @elseif(Auth::user()->level == 2)(Petugas) @else (Siswa) @endif</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
        <li>
        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); 
        document.getElementById('logout-form').submit();">
          <i class="fa fa-sign-out"></i><span>{{ __('Logout') }}</span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" >
        @csrf
        </form>
        </li>
        @if(Auth::user()->level == 1)
        <li class="header">MANAGEMEN DATA</li>

        <li><a href="{{ route('siswa.index') }}"><i class="fa fa-user"></i><span>Siswa</span></a></li>
        <li><a href="{{ route('petugas.index') }}"><i class="fa fa-users"></i><span>Users</span></a></li>
        <li><a href="{{ route('kelas.index') }}"><i class="fa fa-flag"></i><span>Kelas</span></a></li>
        <li><a href="{{ route('spp.index') }}"><i class="fa fa-dollar"></i><span>SPP</span></a></li>
        @endif

        
        <li class="header">SPP</li>
        @if(Auth::user()->level == 1 || Auth::user()->level == 2)
        <li><a href="{{ route('bayar.create') }}"><i class="fa fa-cart-plus"></i><span>Transaksi</span></a></li>
        @endif

        <li><a href="{{ route('bayar.index') }}"><i class="fa fa-list"></i><span>Riwayat Pembayaran</span></a></li>

        @if(Auth::user()->level == 1)
        <li><a href="{{ route('generate') }}"><i class="fa fa-align-justify"></i><span>Laporan</a></span></li>
        @endif

        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
