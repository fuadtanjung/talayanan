@extends('layouts.navbar')

@section('header')
    <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Selesai</h4>
    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
@endsection

@section('content')
    <div class="card">
        <div class="card-header header-elements-inline">
            <h4 class="card-title">Laporan Pengaduan</h4>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="reload"></a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <button type="button" class="btn bg-primary btn-labeled btn-labeled-left rounded-round" data-toggle="modal" data-target="#input_pengaduan">
                <b><i class="icon-plus-circle2"></i></b>
                Tambah
            </button>

            <button type="button" class="btn bg-success btn-labeled btn-labeled-left rounded-round sidebar-right-toggle">
                <b><i class="icon-printer"></i></b>
                Print Data
            </button>
        </div>

        <table class="table table-border-solid table-bordered" id="datatable">
            <thead>
            <tr>
                <th>Nama Pengguna</th>
                <th>Kontak Pengguna</th>
                <th>Deskripsi</th>
                <th>Status</th>
                <th>Status</th>
            </tr>
            </thead>
        </table>
    </div>

    <div id="detail_pengaduan" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Pengaduan</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="detail_form_pengaduan">
                        {{ csrf_field() }}
                        <h5 class="text-white bg-info text-center">Informasi Pelaporan</h5><br>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Nama Pengguna</label>
                                    <input type="text" class="form-control" id="det_nama_pengguna" name="det_nama_pengguna">
                                </div>
                                <div class="col-sm-4" id="tanggal">
                                    <label>Waktu Pelaporan</label>
                                    <input type="text" class="form-control" id="det_waktu_pelaporan" name="det_waktu_pelaporan">
                                </div>
                                <div class="col-sm-4" id="tanggal">
                                    <label>Media Pelaporan</label>
                                    <input type="text" class="form-control" id="det_media_pelaporan" name="det_media_pelaporan">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Kontak Pengguna</label>
                                    <input type="text" class="form-control" id="det_kontak_pengguna" name="det_kontak_pengguna" required autofocus>
                                </div>
                                <div class="col-sm-6">
                                    <label>Deskripsi</label>
                                    <textarea class="form-control" id="det_deskripsi" name="det_deskripsi"></textarea>
                                </div>
                            </div>
                        </div>

                        <h5 class="text-white bg-info text-center">Klasifikasi</h5><br>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-3">
                                    <label>Tipe</label>
                                    <input type="text" class="form-control" id="det_tipe" name="det_tipe">
                                </div>
                                <div class="col-sm-3">
                                    <label>Kategori</label>
                                    <input type="text" class="form-control" id="det_kategori" name="det_kategori">
                                </div>
                                <div class="col-sm-3">
                                    <label>User</label>
                                    <input type="text" class="form-control" id="det_user" name="det_user">
                                </div>
                                <div class="col-sm-3">
                                    <label>Jenis</label>
                                    <input type="text" class="form-control" id="det_jenis" name="det_jenis">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Urgensi</label>
                                    <input type="text" class="form-control" id="det_urgensi" name="det_urgensi">
                                </div>
                                <div class="col-sm-4">
                                    <label>Dampak</label>
                                    <input type="text" class="form-control" id="det_dampak" name="det_dampak">
                                </div>
                                <div class="col-sm-4">
                                    <label>Prioritas</label>
                                    <input type="text" class="form-control" id="det_prioritas" name="det_prioritas">
                                </div>
                            </div>
                        </div>

                        <h5 class="text-white bg-info text-center">Informasi Penanganan</h5><br>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-3">
                                    <label>Petugas</label>
                                    <input type="text" class="form-control" id="det_petugas" name="det_petugas">
                                </div>
                                <div class="col-sm-3">
                                    <label>Status</label>
                                    <input type="text" class="form-control" id="det_status" name="det_status">
                                </div>
                                <div class="col-sm-3">
                                    <h6>Keterangan</h6>
                                    <textarea class="form-control" id="det_keterangan" name="det_keterangan"></textarea>
                                </div>
                                <div class="col-sm-3">
                                    <h6>Tanggal Pemuktahiran</h6>
                                    <input class="form-control" id="det_tgl_pemuktahiran" name="det_tgl_pemuktahiran">
                                </div>
                            </div>
                        </div>

                        <h5 class="text-white bg-info text-center">Informasi Penyelesaian</h5><br>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-4">
                                    <h6>solusi</h6>
                                    <textarea class="form-control" id="det_solusi" name="det_solusi"></textarea>
                                </div>
                                <div class="col-sm-4">
                                    <h6>Tanggal Penyelesaian</h6>
                                    <input class="form-control" id="det_tgl_penyelesaian" name="det_tgl_penyelesaian">
                                </div>
                                <div class="col-sm-4">
                                    <h6>status konfirmasi kepada pengguna</h6>
                                    <textarea class="form-control" id="det_konfirmasi" name="det_konfirmasi"></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link legitRipple" data-dismiss="modal">Tutup<span class="legitRipple-ripple" style="left: 59.2894%; top: 39.4737%; transform: translate3d(-50%, -50%, 0px); width: 225.475%; opacity: 0;"></span></button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('sidebarkanan')
    <div class="sidebar sidebar-light sidebar-right sidebar-expand-sm">

        <!-- Sidebar mobile toggler -->
        <div class="sidebar-mobile-toggler text-center">
            <a href="#" class="sidebar-mobile-expand">
                <i class="icon-screen-full"></i>
                <i class="icon-screen-normal"></i>
            </a>
            <span class="font-weight-semibold">Filter Print</span>
            <a href="#" class="sidebar-mobile-right-toggle">
                <i class="icon-arrow-right8"></i>
            </a>
        </div>
        <!-- /sidebar mobile toggler -->

            <!-- Sidebar search -->
            <div class="card">
                <div class="card-header bg-transparent header-elements-inline">
                    <span class="text-uppercase font-size-sm font-weight-semibold">Filter Print</span>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ url('selesai/filter')}}" target="_blank" id="form_validation" class="form-material" method="post">
                        {{ csrf_field() }}
                        <h6>Dari</h6>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="date" name="start" id="start" class="form-control" name="dari" />
                            </div>
                        </div>
                        <h6>Sampai</h6>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="date"  name="end" id="end" class="form-control" name="sampai" />
                            </div>
                        </div>
                        <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                    </form>
                </div>
            </div>
            <!-- /sidebar search -->
        </div>
    @include('modal._add_pengaduan')
@endsection

@section('js')
    <script type="text/javascript">
        function loadData() {
            $('#datatable').dataTable({
                "ajax": "{{ url('/selesai/data') }}",
                "columns": [
                    { "data": "nama_pengguna" },
                    { "data": "kontak_pengguna" },
                    { "data": "deskripsi" },
                    { "data": "status",},
                    { "data": "action" }
                ],
                autoWidth: false,
                columnDefs: [{
                    width: 170,
                    targets: [ 2 ]
                },{
                    width: 220,
                    targets: [ 4 ]
                }],
                dom: '<"datatable-header"fl><"datatable-scroll datatable-scroll-wrap"t><"datatable-footer"ip>',
                language: {
                    search: '<span>Filter:</span> _INPUT_',
                    searchPlaceholder: 'Ketik untuk cari...',
                    lengthMenu: '<span>Tampil:</span> _MENU_',
                    paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
                }
            });
        }

        function resetFormPengaduan() {
            $("#form_pengaduan")[0].reset();
            $('#id_pelaporan').val("").change();
        }

        $(window).on('load', function () {
            loadData();
            $('#submit_pengaduan').click(function () {
                var aksi = $("#submit_pengaduan").attr("aksi");
                if(aksi=="input"){
                    $.ajax({
                        url: "{{ url('/selesai/input') }}",
                        type: "post",
                        data: new FormData($('#form_pengaduan')[0]),
                        async: false,
                        cache: false,
                        contentType: false,
                        processData: false,

                        success: function (response) {
                            var pesan = JSON.parse(response);
                            if(pesan.error != null){
                                new PNotify({
                                    title: 'Error notice',
                                    text: pesan.error,
                                    type: 'error'
                                });
                                $('#datatable').DataTable().destroy();
                                loadData();
                            }else if(pesan.success != null){
                                Toast.fire({
                                    type: 'success',
                                    position: 'top-right',
                                    text: pesan.success,
                                });
                                resetFormPengaduan();
                                $('#input_pengaduan').modal('hide');
                                $('#datatable').DataTable().destroy();
                                loadData();
                            }else {
                                new PNotify({
                                    title: 'Warning',
                                    text: "Can't retrieve any data from server",
                                });
                            }


                        },
                        fail: function () {
                            new PNotify({
                                title: 'Error notice',
                                text: 'Gagal Menambahkan Data TS',
                                type: 'error',
                                hide: true
                            });
                        }
                    });
                }
            });

            {{--menampilkan detail--}}
            $('#datatable tbody').on('click', '#edit', function (e) {
                var table = $('#datatable').DataTable();
                var data = table.row( $(this).parents('tr') ).data();
                $('#det_nama_pengguna').val(data.nama_pengguna);
                $('#det_waktu_pelaporan').val(data.waktu_pelaporan);
                $('#det_media_pelaporan').val(data.media_pelaporan);
                $('#det_kontak_pengguna').val(data.kontak_pengguna);
                $('#det_deskripsi').val(data.deskripsi);
                $('#det_tipe').val(data.tipe.nama_tipe);
                $('#det_kategori').val(data.kategori.nama_kategori);
                $('#det_prioritas').val(data.prioritas.nama_prioritas);
                $('#det_dampak').val(data.dampak.nama_dampak);
                $('#det_jenis').val(data.jenis.nama_jenis);
                $('#det_user').val(data.userkl.nama_user);
                $('#det_urgensi').val(data.urgensi.nama_urgensi);
                $('#det_petugas').val(data.petugas.in_petugas);
                $('#det_status').val(data.status);
                $('#det_keterangan').val(data.keterangan);
                $('#det_tgl_pemuktahiran').val(data.tgl_pemuktahiran);
                $('#det_solusi').val(data.solusi);
                $('#det_tgl_penyelesaian').val(data.tgl_selesai);
                $('#det_konfirmasi').val(data.status_pengguna);
                $('#detail_pengaduan').modal('toggle');
            } );

            $('#datatable tbody').on('click', '#print', function (e) {
                var table = $('#datatable').DataTable();
                var data = table.row( $(this).parents('tr') ).data();
                var id = data.id_pengaduan;
                window.open("{{ url('/selesai/print/')}}/"+id,'_blank');
            } );

            {{--Menghapus data--}}
            $('#datatable tbody').on('click', '#delete', function (e) {
                var table = $('#datatable').DataTable();
                var data = table.row( $(this).parents('tr') ).data();
                swal.fire({
                    title: 'Yakin Menghapus?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Delete It!',
                    cancelButtonText: 'No, cancel!',
                    confirmButtonClass: 'btn btn-success',
                    cancelButtonClass: 'btn btn-danger',
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: "{{ url('/selesai/delete/') }}/" + data.id_pengaduan,
                            type: "post",
                            data: {
                                "_token": "{{ csrf_token() }}",
                            },
                            cache: false,
                            success: function (response) {
                                var pesan = JSON.parse(response);
                                swal.fire(
                                    "Berhasil!",
                                    pesan.success,
                                    "success"
                                );
                                table.destroy();
                                loadData();
                            },
                        });
                    } else if (
                        // Read more about handling dismissals
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swal.fire(
                            'Cancelled',
                            'Gagal Menghapus Data Pengaduan',
                            'error'
                        )
                    }
                });
            });

            {{--Menampilkan LIST --}}

            $.ajax({
                url: '{{ url('list/kategori') }}',
                dataType: "json",
                success: function (data) {
                    var kategori = jQuery.parseJSON(JSON.stringify(data));
                    $.each(kategori, function (k, v) {
                        $('#kategori').append($('<option>', {value: v.id_kategori}).text(v.nama_kategori))
                    })
                }
            });
            $.ajax({
                url: '{{ url('list/tipe') }}',
                dataType: "json",
                success: function (data) {
                    var tipe = jQuery.parseJSON(JSON.stringify(data));
                    $.each(tipe, function (k, v) {
                        $('#tipe').append($('<option>', {value: v.id_tipe}).text(v.nama_tipe))
                    })
                }
            });
            $.ajax({
                url: '{{ url('list/user') }}',
                dataType: "json",
                success: function (data) {
                    var user = jQuery.parseJSON(JSON.stringify(data));
                    $.each(user, function (k, v) {
                        $('#user').append($('<option>', {value: v.id_user}).text(v.nama_user))
                    })
                }
            });
            $.ajax({
                url: '{{ url('list/urgensi') }}',
                dataType: "json",
                success: function (data) {
                    var urgensi = jQuery.parseJSON(JSON.stringify(data));
                    $.each(urgensi, function (k, v) {
                        $('#urgensi').append($('<option>', {value: v.id_urgensi}).text(v.nama_urgensi))
                    })
                }
            });
            $.ajax({
                url: '{{ url('list/prioritas') }}',
                dataType: "json",
                success: function (data) {
                    var prioritas = jQuery.parseJSON(JSON.stringify(data));
                    $.each(prioritas, function (k, v) {
                        $('#prioritas').append($('<option>', {value: v.id_prioritas}).text(v.nama_prioritas))
                    })
                }
            });
            $.ajax({
                url: '{{ url('list/jenis') }}',
                dataType: "json",
                success: function (data) {
                    var jenis = jQuery.parseJSON(JSON.stringify(data));
                    $.each(jenis, function (k, v) {
                        $('#jenis').append($('<option>', {value: v.id_jenis}).text(v.nama_jenis))
                    })
                }
            });
            $.ajax({
                url: '{{ url('list/dampak') }}',
                dataType: "json",
                success: function (data) {
                    var dampak = jQuery.parseJSON(JSON.stringify(data));
                    $.each(dampak, function (k, v) {
                        $('#dampak').append($('<option>', {value: v.id_dampak}).text(v.nama_dampak))
                    })
                }
            });
            $.ajax({
                url: '{{ url('list/petugas') }}',
                dataType: "json",
                success: function (data) {
                    var petugas = jQuery.parseJSON(JSON.stringify(data));
                    $.each(petugas, function (k, v) {
                        $('#petugas').append($('<option>', {value: v.id_petugas}).text(v.in_petugas))
                    })
                }
            });

            {{--BATAS MENAMPILKAN LIST--}}

            $('#input_pengaduan').on('hidden.bs.modal', function () {
                resetFormPengaduan();
                $("#submit_pengaduan").attr("aksi","input");
                $('#submit_pengaduan').removeAttr("idpengaduan");
            });
        })


    </script>
@endsection
