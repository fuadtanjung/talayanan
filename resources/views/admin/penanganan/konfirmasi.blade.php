@extends('layouts.navbar')

@section('header')
    <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Penanganan</span> - Konfirmasi Kepada Pengguna</h4>
    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
@endsection

@section('content')
    <div class="card">
        <div class="card-header header-elements-inline">
            <h4 class="card-title">Konfirmasi Kepada Pengguna</h4>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="reload"></a>
                </div>
            </div>
        </div>

        <div class="card-body header-elements-sm-inline">
            <button type="button" class="btn bg-primary btn-labeled btn-labeled-left rounded-round" data-toggle="modal" data-target="#input_konfirmasi">
                <b><i class="icon-plus-circle2"></i></b>
                Tambah
            </button>
        </div>

        <table class="table datatable-basic table-bordered table-hover" width="100%" id="datatable">
            <thead>
            <tr>
                <th>Nama Konfirmasi</th>
                <th class="text-center">Actions</th>
            </tr>
            </thead>
        </table>
    </div>

    <div id="input_konfirmasi" class="modal fade" data-backdrop="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h6 class="modal-title" style="color: white">Data Konfirmasi Kepada Pengguna</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form id="form_konfirmasi" class="form-material">
                        {{ csrf_field() }}
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <h6>Nama Konfirmasi</h6>
                                        <input type="text" class="form-control" id="nama_konfirmasi" name="nama_konfirmasi">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-link legitRipple" data-dismiss="modal">Tutup<span class="legitRipple-ripple" style="left: 59.2894%; top: 39.4737%; transform: translate3d(-50%, -50%, 0px); width: 225.475%; opacity: 0;"></span></button>
                    <button type="button" class="btn btn-primary legitRipple" aksi="input" id="submit_konfirmasi">Simpan</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script type="text/javascript">
        function loadData() {
            $('#datatable').dataTable({
                "ajax": "{{ url('/konfirmasi/data') }}",
                "columns": [
                    { "data": "nama_konfirmasi" },
                    { "data": "action" }
                ],
                scrollX: true,
                scrollY: '350px',
                scrollCollapse: true,
                dom: '<"datatable-header"fl><"datatable-scroll datatable-scroll-wrap"t><"datatable-footer"ip>',
                language: {
                    search: '<span>Filter:</span> _INPUT_',
                    searchPlaceholder: 'Ketik untuk cari...',
                    lengthMenu: '<span>Tampil:</span> _MENU_',
                    paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
                }
            });
        }

        function resetFormKonfirmasi() {
            $("#form_konfirmasi")[0].reset();
        }

        $(window).on('load', function () {
            loadData();
            $('#submit_konfirmasi').click(function () {
                var aksi = $("#submit_konfirmasi").attr("aksi");
                if(aksi=="input"){
                    $.ajax({
                        url: "{{ url('/konfirmasi/input') }}",
                        type: "post",
                        data: new FormData($('#form_konfirmasi')[0]),
                        cache: false,
                        contentType: false,
                        processData: false,

                        success: function (response) {
                            var pesan = JSON.parse(response);
                            if(pesan.error != null){
                                Toast.fire({
                                    type: 'error',
                                    position: 'top-right',
                                    text: pesan.error,
                                });
                                $('#datatable').DataTable().destroy();
                                loadData();
                            }else if(pesan.success != null){
                                Toast.fire({
                                    type: 'success',
                                    position: 'top-right',
                                    text: pesan.success,
                                });
                                resetFormKonfirmasi();
                                $('#input_konfirmasi').modal('toggle');
                                $('#datatable').DataTable().destroy();
                                loadData();
                            }else {
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
                }
                else if(aksi=="edit"){
                    var id_konfirmasi = $("#submit_konfirmasi").attr("idkonfirmasi");
                    $.ajax({
                        url: "{{ url('/konfirmasi/edit') }}/"+id_konfirmasi,
                        type: "post",
                        data: new FormData($('#form_konfirmasi')[0]),
                        cache: false,
                        contentType: false,
                        processData: false,

                        success: function (response) {
                            var pesan = JSON.parse(response);
                            if(pesan.error != null){
                                Toast.fire({
                                    type: 'error',
                                    position: 'top-right',
                                    text: pesan.error,
                                });
                                $('#datatable').DataTable().destroy();
                                loadData();
                            }else if(pesan.success != null){
                                Toast.fire({
                                    type: 'success',
                                    position: 'top-right',
                                    text: pesan.success,
                                });
                                resetFormKonfirmasi();
                                $('#input_konfirmasi').modal('toggle');
                                $('#datatable').DataTable().destroy();
                                loadData();
                            }else {
                                Toast.fire({
                                    type: 'warning',
                                    position: 'top-right',
                                    text: 'Can\'t retrieve any data from server',
                                });
                                $('#submit_konfirmasi').attr("data-aksi","input");
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
                var data = table.row( $(this).parents('tr') ).data();
                $('#nama_konfirmasi').val(data.nama_konfirmasi).change();
                $("#submit_konfirmasi").attr("aksi","edit");
                $('#submit_konfirmasi').attr("idkonfirmasi",data.id_konfirmasi);
                $('#input_konfirmasi').modal('toggle');
            } );


            $('#datatable tbody').on('click', '#delete', function (e) {
                var table = $('#datatable').DataTable();
                var data = table.row( $(this).parents('tr') ).data();
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
                            url: "{{ url('/konfirmasi/delete/') }}/" + data.id_konfirmasi,
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


            $('#input_konfirmasi').on('hidden.bs.modal', function () {
                resetFormKonfirmasi();
                $("#submit_konfirmasi").attr("aksi","input");
                $('#submit_konfirmasi').removeAttr("idkonfirmasi");
            });
        })
    </script>

@endsection
