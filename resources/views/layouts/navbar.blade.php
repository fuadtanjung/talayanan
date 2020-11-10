@extends('layouts.app')

@section('navbar')

    <!-- Main navbar -->
    <div class="navbar navbar-expand-md navbar-dark">
        <div class="navbar-brand wmin-200">
            <a href="{{ url('admin/home') }}" class="d-inline-block">
                <img src="" alt="">
            </a>
        </div>

        <div class="collapse navbar-collapse" id="navbar-mobile">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
                        <i class="icon-paragraph-justify3"></i>
                    </a>
                </li>
            </ul>

            <span class="badge bg-success-400 ml-md-auto mr-md-3">Active</span>

            <ul class="navbar-nav">
                <li class="nav-item dropdown dropdown-user">
                    <a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
                        @if ( auth()->user()->role->nama == "admin")
                        <img src="{{ asset('images/logo2.png') }}" class="rounded-circle mr-2" height="34" alt="">
                        @endif
                            @if ( auth()->user()->role->nama == "pengguna")
                                <img src="{{ asset('images/user.png') }}" class="rounded-circle mr-2" height="34" alt="">
                            @endif
                        <span>{{ Auth::user()->name }}</span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="{{ route('login.logout') }}" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!-- /main navbar -->


    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                @yield('header')
            </div>
        </div>
    </div>
    <!-- /page header -->


    <!-- Page content -->
    <div class="page-content pt-0">

        <!-- Main sidebar -->
        <div class="sidebar sidebar-dark sidebar-main sidebar-expand-md align-self-start">

            <!-- Sidebar mobile toggler -->
            <div class="sidebar-mobile-toggler text-center">
                <a href="#" class="sidebar-mobile-main-toggle">
                    <i class="icon-arrow-left8"></i>
                </a>
                <span class="font-weight-semibold">Main sidebar</span>
                <a href="#" class="sidebar-mobile-expand">
                    <i class="icon-screen-full"></i>
                    <i class="icon-screen-normal"></i>
                </a>
            </div>
            <!-- /sidebar mobile toggler -->


            <!-- Sidebar content -->
            <div class="sidebar-content">
                <div class="card card-sidebar-mobile">

                    <!-- Header -->
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title">Navigation</h6>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                            </div>
                        </div>
                    </div>

                    <!-- User menu -->
                    <div class="sidebar-user">
                        <div class="card-body">
                            <div class="media">
                                <div class="mr-3">
                                    @if ( auth()->user()->role->nama == "admin")
                                    <a href="#"><img src="{{ asset('images/logo3.png') }}" width="38" height="38" class="rounded-circle" alt=""></a>
                                        @endif
                                        @if ( auth()->user()->role->nama == "pengguna")
                                            <a href="#"><img src="{{ asset('images/user.png') }}" width="38" height="38" class="rounded-circle" alt=""></a>
                                        @endif
                                </div>

                                <div class="media-body">
                                    <div class="media-title font-weight-semibold">{{ Auth::user()->name }}</div>
                                    @if ( auth()->user()->role->nama == "admin")
                                    <div class="font-size-xs opacity-50">
                                        <i class="icon-pin font-size-sm"></i> &nbsp;Padang
                                    </div>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- /user menu -->


                    <!-- Main navigation -->
                    <div class="card-body p-0">
                        <ul class="nav nav-sidebar" data-nav-type="accordion">

                            <!-- Main -->
                            <li class="nav-item-header mt-0"><div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i></li>
                            <li class="nav-item">
                                <a href="{{ url('/') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
                                    <i class="icon-home4"></i>
                                    <span>
										Dashboard
										<span class="d-block font-weight-normal opacity-50">No active orders</span>
									</span>
                                </a>

                                @if ( auth()->user()->role->nama == "admin")
                                <a href="{{ url('admin') }}" class="nav-link {{ request()->is('admin') ? 'active' : '' }}">
                                    <i class="icon-file-text2"></i>
                                    <span>
										Laporan Awal
									</span>
                                </a>
                                <a href="{{ url('proses') }}" class="nav-link {{ request()->is('proses') ? 'active' : '' }}">
                                    <i class="icon-file-zip"></i>
                                    <span>
										Laporan Diproses
									</span>
                                </a>
                                <a href="{{ url('selesai') }}" class="nav-link {{ request()->is('selesai') ? 'active' : '' }}">
                                    <i class="icon-cabinet"></i>
                                    <span>
										Laporan Selesai
									</span>
                                </a>
                            </li>
                            <li class="nav-item nav-item-submenu {{ request()->is(['dampak','user','jenis','kategori','petugas','urgensi','prioritas','tipe']) ? 'nav-item-expanded' : '' }} {{ request()->is(['dampak','user','jenis','kategori','petugas','urgensi','prioritas','tipe']) ? 'nav-item-open' : '' }} ">
                                <a href="#" class="nav-link {{ request()->is(['dampak','user','jenis','kategori','petugas','urgensi','prioritas','tipe'],'kategori') ? 'active' : '' }}"><i class="icon-transmission"></i> <span>Klasifikasi</span></a>
                                <ul class="nav nav-group-sub" data-submenu-title="Klasifikasi">
                                    <li class="nav-item"><a href="{{ url('tipe') }}" class="nav-link {{ request()->is('tipe') ? 'active' : '' }}">Tipe</a></li>
                                    <li class="nav-item"><a href="{{ url('kategori') }}" class="nav-link {{ request()->is('kategori') ? 'active' : '' }}">Kategori</a></li>
                                    <li class="nav-item"><a href="{{ url('user') }}" class="nav-link {{ request()->is('user') ? 'active' : '' }}">User</a></li>
                                    <li class="nav-item"><a href="{{ url('jenis') }}" class="nav-link {{ request()->is('jenis') ? 'active' : '' }}">Jenis</a></li>
                                    <li class="nav-item"><a href="{{ url('urgensi')}}" class="nav-link {{ request()->is('urgensi') ? 'active' : '' }}">Urgensi</a></li>
                                    <li class="nav-item"><a href="{{ url('dampak') }}" class="nav-link {{ request()->is('dampak') ? 'active' : '' }}">Dampak</a></li>
                                    <li class="nav-item"><a href="{{ url('prioritas') }}" class="nav-link {{ request()->is('prioritas') ? 'active' : '' }}">Prioritas</a></li>
                                    <li class="nav-item"><a href="{{ url('petugas') }}" class="nav-link {{ request()->is('petugas') ? 'active' : '' }}">Petugas</a></li>
                                </ul>
                            </li>
                            @endif

                            @if ( auth()->user()->role->nama == "pengguna")
                                <a href="{{ url('user') }}" class="nav-link {{ request()->is('user') ? 'active' : '' }}">
                                    <i class="icon-file-text2"></i>
                                    <span>
										Pengaduan
									</span>
                                </a>
                                <a href="{{ url('user/history') }}" class="nav-link {{ request()->is('user/history') ? 'active' : '' }}">
                                    <i class="icon-file-text2"></i>
                                    <span>
										Riwayat Pengaduan
									</span>
                                </a>
                            @endif
                        </ul>
                    </div>
                    <!-- /main navigation -->

                </div>
            </div>
            <!-- /sidebar content -->

        </div>
        <!-- /main sidebar -->


        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content">
                @yield('content')
            </div>
        </div>
        <!-- /main content -->

        @yield('sidebarkanan')

    </div>
    <!-- /page content -->
    <!-- Footer -->
    <div class="navbar navbar-expand-lg navbar-light">
        <div class="text-center d-lg-none w-100">
            <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
                <i class="icon-unfold mr-2"></i>
                Footer
            </button>
        </div>

        <div class="navbar-collapse collapse" id="navbar-footer">
            <span class="navbar-text">
                &copy; 2020. <a href="#">LPSE Diskominfo</a>
            </span>
        </div>
    </div>
    <!-- /footer -->
@endsection
