@extends('layouts.navbar')

@section('header')
    <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Diproses</h4>
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

        <table class="table table-border-solid table-bordered" id="datatable">
            <thead>
            <tr>
                <th>Nama Pengguna</th>
                <th>Kontak Pengguna</th>
                <th>Deskripsi</th>
                <th>Status</th>
                <th class="text-center">Actions</th>
            </tr>
            </thead>
        </table>
    </div>

    <div id="input_pengaduan" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Input Pengaduan</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="form_pengaduan">
                        {{ csrf_field() }}
                        {{--                               <legend class="text-semibold">Update Pengaduan</legend>--}}
                        {{--                                <br>--}}
                        <h5 class="text-white bg-info text-center">Informasi Pelaporan</h5><br>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Nama Pengguna</label>
                                    <input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" readonly>
                                </div>
                                <div class="col-sm-4" id="tanggal">
                                    <label>Waktu Pelaporan</label>
                                    <input type="text" class="form-control" id="waktu_pelaporan" name="waktu_pelaporan" readonly>
                                </div>
                                <div class="col-sm-4" id="tanggal">
                                    <label>Media Pelaporan</label>
                                    <input type="text" class="form-control" id="media_pelaporan" name="media_pelaporan" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Kontak Pengguna</label>
                                    <input type="text" class="form-control" id="kontak_pengguna" name="kontak_pengguna" required autofocus>
                                </div>
                                <div class="col-sm-6">
                                    <label>Deskripsi</label>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
                                </div>
                            </div>
                        </div>

                        <h5 class="text-white bg-info text-center">Klasifikasi</h5><br>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-3">
                                    <label>Tipe</label>
                                    <select class="custom-select select2" id="tipe" name="tipe" auto required >
                                        <option value="">Pilih Tipe</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <label>Kategori</label>
                                    <select class="custom-select select2" id="kategori" name="kategori" required>
                                        <option value="">Pilih Kategori</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <label>User</label>
                                    <select class="custom-select select2" required id="user" name="user">
                                        <option value="">Pilih User</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <label>Jenis</label>
                                    <select class="custom-select select2" required id="jenis" name="jenis">
                                        <option value="">Pilih Jenis</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Urgensi</label>
                                    <select class="custom-select select2" required id="urgensi" name="urgensi">
                                        <option value="">Pilih Urgensi</option>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label>Dampak</label>
                                    <select class="custom-select select2" required id="dampak" name="dampak">
                                        <option value="">Pilih Dampak</option>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label>Prioritas</label>
                                    <select class="custom-select select2" required id="prioritas" name="prioritas">
                                        <option value="">Pilih Prioritas</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <h5 class="text-white bg-info text-center">Informasi Penanganan</h5><br>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Petugas</label>
                                    <select class="custom-select select2" required id="petugas" name="petugas">
                                        <option value="">Pilih Petugas</option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <h6>Keterangan</h6>
                                    <textarea class="form-control" id="keterangan" name="keterangan"></textarea>
                                </div>
                            </div>
                        </div>

                        <h5 class="text-white bg-info text-center">Informasi Penyelesaian</h5><br>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h6>solusi</h6>
                                    <textarea class="form-control" id="solusi" name="solusi"></textarea>
                                </div>
                                <div class="col-sm-6">
                                    <h6>status konfirmasi kepada pengguna</h6>
                                    <textarea class="form-control" id="konfirmasi" name="konfirmasi"></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link legitRipple" data-dismiss="modal">Tutup<span class="legitRipple-ripple" style="left: 59.2894%; top: 39.4737%; transform: translate3d(-50%, -50%, 0px); width: 225.475%; opacity: 0;"></span></button>
                    <button type="button" class="btn btn-primary legitRipple" aksi="input" id="submit_pengaduan">Simpan</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        function loadData() {
            $('#datatable').dataTable({
                "ajax": "{{ url('/proses/data') }}",
                "columns": [
                    { "data": "nama_pengguna" },
                    { "data": "kontak_pengguna" },
                    { "data": "deskripsi" },
                    { "data": "status" ,
                        render:function(status){
                                return '<span class="badge badge-success">Ditangani</span></td>';
                    }
                    },
                    { "data": "action" }
                ],
                autoWidth: false,
                columnDefs: [{
                    width: 170,
                    targets: [ 4 ]
                }],
                dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                language: {
                    search: '<span>Filter:</span> _INPUT_',
                    searchPlaceholder: 'Type to filter...',
                    lengthMenu: '<span>Show:</span> _MENU_',
                    paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
                }
            });
        }

        function resetFormPengaduan() {
            $("#form_pengaduan")[0].reset();
            $('#id_pengaduan').val("").change();
        }

        $(window).on('load', function () {
            loadData();
            $('#submit_pengaduan').click(function () {
                var aksi = $("#submit_pengaduan").attr("aksi");
                swal.fire({
                    title: 'Apakah Laporan Ini Selesai?',
                    text: "Anda Hanya Sekali Mengonfirmasi!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, Do it!',
                    cancelButtonText: 'No, cancel!',
                    confirmButtonClass: 'btn btn-success',
                    cancelButtonClass: 'btn btn-danger',
                    buttonsStyling: false
                }).then((result) => {
                    if (result.value) {
                        var id_pengaduan = $("#submit_pengaduan").attr("idpengaduan");
                        $.ajax({
                            url: "{{ url('/admin/edit') }}/" + id_pengaduan,
                            type: "post",
                            data: new FormData($('#form_pengaduan')[0]),
                            async: false,
                            cache: false,
                            contentType: false,
                            processData: false,
                            success: function (response) {
                                var pesan = JSON.parse(response);
                                if (pesan.error != null) {
                                    Toast.fire({
                                        type: 'error',
                                        position: 'top-right',
                                        text: pesan.error,
                                    });
                                    $('#datatable').DataTable().destroy();
                                    loadData();
                                } else if (pesan.success != null) {
                                    Toast.fire({
                                        type: 'success',
                                        position: 'top-right',
                                        text: pesan.success,
                                    });
                                    resetFormPengaduan();
                                    $('#input_pengaduan').modal('hide');
                                    $('#datatable').DataTable().destroy();
                                    loadData();
                                } else {
                                    new PNotify({
                                        title: 'Warning',
                                        text: "Can't retrieve any data from server",
                                        hide: true
                                    });
                                    $('#submit_pengaduan').attr("data-aksi", "input");
                                }


                            },
                            fail: function () {
                                new PNotify({
                                    title: 'Error notice',
                                    text: 'Can\'t retrieve any data from server, please contact your administrator',
                                });
                            }
                        });
                    } else if (
                        // Read more about handling dismissals
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swal.fire(
                            'Cancelled',
                            'Your imaginary file is safe :)',
                            'error'
                        )
                    }
                });
            });

            {{--menampilkan detail--}}
            $('#datatable tbody').on('click', '#edit', function (e) {
                var table = $('#datatable').DataTable();
                var data = table.row($(this).parents('tr')).data();
                $('#nama_pengguna').val(data.nama_pengguna);
                $('#waktu_pelaporan').val(data.waktu_pelaporan);
                $('#media_pelaporan').val(data.media_pelaporan);
                $('#kontak_pengguna').val(data.kontak_pengguna);
                $('#deskripsi').val(data.deskripsi);
                $("#submit_pengaduan").attr("aksi", "edit");
                $('#submit_pengaduan').attr("idpengaduan", data.id_pengaduan);
                $('#input_pengaduan').modal('toggle');
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
                            url: "{{ url('/proses/delete/') }}/" + data.id_pengaduan,
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

            $('#input_pengaduan').on('hidden.bs.modal', function () {
                resetFormPengaduan();
                $("#submit_pengaduan").attr("aksi", "input");
                $('#submit_pengaduan').removeAttr("idpengaduan");
            });
        });

    </script>
@endsection
