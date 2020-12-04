@extends('layouts.navbar')

@section('header')
    <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Dashboard</h4>
    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
    @endsection

@section('content')
        <div class="card bg-dark">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <h2 class="text-primary">Selamat Datang Di Aplikasi Pengaduan.</h2>
                        <p class="text-gray-700">Aplikasi ini digunakan agar memudahkan dalam penyampaian pengaduan. </p>
                    </div>
                    <div>
                        <img class="img-fluid px-xl-4 mt-xxl-n5" src="https://www.padang.go.id/assets/img/logo1.png" />
                    </div>
                </div>
            </div>
        </div>
<!-- Simple statistics -->
        @if ( auth()->user()->role->nama != "admin")
    <div class="row">
        <div class="col-sm-6 col-xl-3">
            <div class="card card-body bg-primary-400 has-bg-image">
                <div class="media">
                    <div class="media-body">
                        <h3 class="mb-0">{{ count($total) }}</h3>
                        <span class="text-uppercase font-size-xs">total <br> pengaduan</span>
                    </div>

                    <div class="ml-3 align-self-center">
                        <i class="icon-bubbles4 icon-3x opacity-75"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-5 col-xl-3">
            <div class="card card-body bg-danger-400 has-bg-image">
                <div class="media">
                    <div class="media-body">
                        <h3 class="mb-0">{{ count($diajukan) }}</h3>
                        <span class="text-uppercase font-size-xs">pengaduan <br> diajukan</span>
                    </div>

                    <div class="ml-3 align-self-center">
                        <i class="icon-newspaper icon-3x opacity-75"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-5 col-xl-3">
            <div class="card card-body bg-info-400 has-bg-image">
                <div class="media">
                    <div class="media-body">
                        <h3 class="mb-0">{{ count($diproses) }}</h3>
                        <span class="text-uppercase font-size-xs">pengaduan <br> diproses</span>
                    </div>

                    <div class="ml-3 align-self-center">
                        <i class="icon-inbox icon-3x opacity-75"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-5 col-xl-3">
            <div class="card card-body bg-indigo-400 has-bg-image">
                <div class="media">
                    <div class="media-body">
                        <h3 class="mb-0">{{ count($difasilitasi) }}</h3>
                        <span class="text-uppercase font-size-xs">pengaduan <br> selesai</span>
                    </div>

                    <div class="ml-3 align-self-center">
                        <i class="icon-task icon-3x opacity-75"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

        @if ( auth()->user()->role->nama == "admin")
    <div class="row">
        <div class="col-sm-6 col-xl-3">
            <div class="card card-body bg-primary-400 has-bg-image">
                <div class="media">
                    <div class="media-body">
                        <h3 class="mb-0">{{ count($admtotal) }}</h3>
                        <span class="text-uppercase font-size-xs">total <br> pengaduan</span>
                    </div>

                    <div class="ml-3 align-self-center">
                        <i class="icon-bubbles4 icon-3x opacity-75"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-5 col-xl-3">
            <div class="card card-body bg-danger-400 has-bg-image">
                <div class="media">
                    <div class="media-body">
                        <h3 class="mb-0">{{ count($admdiajukan) }}</h3>
                        <span class="text-uppercase font-size-xs">pengaduan <br> diajukan</span>
                    </div>

                    <div class="ml-3 align-self-center">
                        <i class="icon-newspaper icon-3x opacity-75"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-5 col-xl-3">
            <div class="card card-body bg-info-400 has-bg-image">
                <div class="media">
                    <div class="media-body">
                        <h3 class="mb-0">{{ count($admdiproses) }}</h3>
                        <span class="text-uppercase font-size-xs">pengaduan <br> diproses</span>
                    </div>

                    <div class="ml-3 align-self-center">
                        <i class="icon-inbox icon-3x opacity-75"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-5 col-xl-3">
            <div class="card card-body bg-indigo-400 has-bg-image">
                <div class="media">
                    <div class="media-body">
                        <h3 class="mb-0">{{ count($admdifasilitasi) }}</h3>
                        <span class="text-uppercase font-size-xs">pengaduan <br> selesai</span>
                    </div>

                    <div class="ml-3 align-self-center">
                        <i class="icon-task icon-3x opacity-75"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection

@section('js')
    <script type="text/javascript">
        @if(Session::has('success'))
        Toast.fire({
            type: 'success',
            position: 'top',
            title: '{{ Session::get('success') }}',
        })
        @endif
    </script>
@endsection
