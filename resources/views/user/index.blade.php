@extends('layouts.navbar')

@section('header')
    <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">User</span> - Pengaduan</h4>
    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
@endsection

@section('content')
    <div class="card">
        <div class="card-header header-elements-inline">
            <h4 class="card-title">Pengaduan</h4>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="reload"></a>
                </div>
            </div>
        </div>

        <div class="card-body header-elements-sm-inline">
            <button type="button" class="btn bg-primary btn-labeled btn-labeled-left rounded-round" data-toggle="modal" data-target="#input_form">
                <b><i class="icon-plus-circle2"></i></b>
                Tambah Pengaduan
            </button>
        </div>

        <table class="table datatable-basic table-bordered table-hover table-sm" width="100%" id="datatable">
            <thead>
            <tr>
                <th>No Tiket </th>
                <th>Kendala</th>
                <th>Waktu Pengaduan</th>
                <th>Status</th>
                <th class="text-center">Actions</th>
            </tr>
            </thead>
        </table>
    </div>

    <div id="input_form" class="modal fade" data-backdrop="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h6 class="modal-title" style="color: white">Tambah Pengaduan</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form id="form_report" class="form-material">
                        {{ csrf_field() }}
                        <div class="text-center mb-3">
                            <img src="{{ asset('images/logo.png') }}" alt="" width="150 px">
                        </div>

                        <input type="text" class="form-control" name="user_id" value="{{ auth()->user()->id }}" hidden>
                        <input type="text" class="form-control" name="nama_pengguna" value="{{ auth()->user()->name }}" hidden>
                        <input type="text" class="form-control" name="kontak_pengguna" value="{{ auth()->user()->kontak }}" hidden>
                        <div class="form-group form-group-feedback form-group-feedback-right">
                            <h4 for="">Pengaduan</h4>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="pengaduan" value="Pendaftaran">
                                    Pendaftaran
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="pengaduan" value="Download Dokumen">
                                    Download Dokumen
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="pengaduan" value="Permohonan Perubahan Jadwal karena ada kendala dalam upload addendum dokumen pengaduan">
                                    Permohonan Perubahan Jadwal karena ada kendala dalam upload addendum dokumen pengaduan
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" id="tes" name="pengaduan" value="">
                                   Lainnya
                                </label>
                            </div>
                            <textarea name="pengaduan" id="textInput" class="form-control" cols="5" rows="3" placeholder="pengaduan Pengaduan"></textarea>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-link legitRipple" data-dismiss="modal">Tutup<span class="legitRipple-ripple" style="left: 59.2894%; top: 39.4737%; transform: translate3d(-50%, -50%, 0px); width: 225.475%; opacity: 0;"></span></button>
                    <button type="button" class="btn btn-primary legitRipple" aksi="input" id="submit_report">Simpan</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        function loadData() {
            $('#datatable').dataTable({
                "ajax": "{{ url('/user/data') }}",
                "columns": [
                    { "data": "no_tiket" },
                    { "data": "deskripsi" },
                    { "data": "waktu_pelaporan" },
                    { "data": "status" },
                    { "data": "action" }
                ],
                autoWidth: false,
                columnDefs: [
                    {
                        width: 300,
                        targets: [ 1 ]
                    },
                    {
                        targets: [2],
                        render: $.fn.dataTable.render.moment( 'D MMM YYYY' ),
                    },
                    {
                        width: 200,
                        targets: [ 4 ]
                    },
                ],
                dom: '<"datatable-header"fl><"datatable-scroll datatable-scroll-wrap"t><"datatable-footer"ip>',
                language: {
                    search: '<span>Filter:</span> _INPUT_',
                    searchPlaceholder: 'Ketik untuk cari...',
                    lengthMenu: '<span>Tampil:</span> _MENU_',
                    paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
                }
            });
        }

        function resetFormReport() {
            $("#form_report")[0].reset();
            $("#tes").val("").change();
        }

        $(window).on('load', function () {
            loadData();
            $('#submit_report').click(function () {
                var aksi = $("#submit_report").attr("aksi");
                if (aksi == "input") {
                    $.ajax({
                        url: "{{ url('/user/input') }}",
                        type: "post",
                        data: new FormData($('#form_report')[0]),
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
                                resetFormReport();
                                $('#input_form').modal('toggle');
                                $('#datatable').DataTable().destroy();
                                loadData();
                            } else {
                                Toast.fire({
                                    type: 'warning',
                                    position: 'top-right',
                                    text: 'Can\'t retrieve any data from server',
                                });
                            }
                        },
                        fail: function () {
                            Toast.fire({
                                type: 'error',
                                position: 'top-right',
                                text: 'Can\'t retrieve any data from server, please contact your administrator',
                            });
                        }
                    });
                } else if (aksi == "edit") {
                    var id_user = $("#submit_report").attr("iduser");
                    $.ajax({
                        url: "{{ url('user/edit') }}/" + id_user,
                        type: "post",
                        data: new FormData($('#form_report')[0]),
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
                                resetFormReport();
                                $('#input_form').modal('toggle');
                                $('#datatable').DataTable().destroy();
                                loadData();
                            } else {
                                Toast.fire({
                                    type: 'warning',
                                    position: 'top-right',
                                    text: 'Can\'t retrieve any data from server',
                                });
                                $('#submit_report').attr("data-aksi", "input");
                            }


                        },
                        fail: function () {
                            Toast.fire({
                                type: 'error',
                                position: 'top-right',
                                text: 'Can\'t retrieve any data from server, please contact your administrator',
                            });
                        }
                    });
                }
            });

            $('#datatable tbody').on('click', '#edit', function (e) {
                var table = $('#datatable').DataTable();
                var data = table.row($(this).parents('tr')).data();
                $('#pengaduan').val(data.deskripsi).change();
                $("#submit_report").attr("aksi", "edit");
                $('#submit_report').attr("iduser", data.no_tiket);
                $('#input_form').modal('toggle');
            });

            $('#datatable tbody').on('click', '#delete', function (e) {
                var table = $('#datatable').DataTable();
                var data = table.row($(this).parents('tr')).data();
                swal.fire({
                    title: 'Apakah Anda Yakin?',
                    text: "Anda tidak akan dapat mengembalikan ini!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    confirmButtonClass: 'btn btn-success',
                    cancelButtonClass: 'btn btn-danger',
                    buttonsStyling: false
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: "{{ url('user/delete/') }}/" + data.no_tiket,
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
                            'Data Anda Aman :)',
                            'error'
                        )
                    }
                });
            });

            var inputBox = $("#textInput");
            inputBox.hide();

            $("input[name=pengaduan]").change(function (e) {
                if ($("#tes").is(":checked")) {
                    inputBox.val(e.target.value);
                    inputBox.show();
                } else {
                    inputBox.val(e.target.value);
                    inputBox.hide();
                }
            });

            $('#input_form').on('hidden.bs.modal', function () {
                resetFormReport();
                $("#submit_report").attr("aksi", "input");
                $('#submit_report').removeAttr("idreport");
            });
        })


    </script>

@endsection
