@extends('layouts.navbar')

@section('header')
    <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Diajukan</h4>
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
                <th>No Tiket</th>
                <th>Nama Pengguna</th>
                <th>Kontak Pengguna</th>
                <th>Deskripsi</th>
                <th>Status</th>
                <th class="text-center">Actions</th>
            </tr>
            </thead>
        </table>
    </div>

    @include('modal._detail_diajukan')
@endsection

@section('js')
    <script type="text/javascript">
        function loadData() {
            $('#datatable').dataTable({
                "ajax": "{{ url('/admin/data') }}",
                "columns": [
                    { "data": "no_tiket" },
                    { "data": "nama_pengguna" },
                    { "data": "kontak_pengguna" },
                    { "data": "deskripsi" },
                    { "data": "status",
                        render:function(status){
                            if(status == 'diajukan'){
                                return '<span class="badge badge-info">Diajukan</span></td>';
                            }else{
                                return '<span class="badge badge-success">Ditangani</span></td>';
                            }
                        }
                    },
                    { "data": "action" }
                ],
                autoWidth: false,
                columnDefs: [{
                    width: 170,
                    targets: [ 5 ]
                },{
                    width: 220,
                    targets: [ 3 ]
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
            $('#id_kegiatan').val("").change();
        }

        $(window).on('load', function () {
            loadData();
            {{----MENGUBAH STATUS--}}
            $('#datatable tbody').on('click', '#change', function (e) {
                var table = $('#datatable').DataTable();
                var data = table.row( $(this).parents('tr') ).data();
                swal.fire({
                    title: 'Apakah Anda Yakin?',
                    text: "Anda Hanya Sekali Mengubah Status!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, change it!',
                    cancelButtonText: 'No, cancel!',
                    confirmButtonClass: 'btn btn-success',
                    cancelButtonClass: 'btn btn-danger',
                    buttonsStyling: false
                }).then((result) =>
                {  if (result.value) {
                    $.ajax({
                        url: "{{ url('/admin/change') }}/"+data.id_pengaduan,
                        type: "POST",
                        data: {
                            "_token": "{{ csrf_token() }}",
                        },
                        success: function (response) {
                            swal.fire(
                                "Berhasil!",
                                "Berhasil Merubah Status",
                                "success"
                            );
                            $('#datatable').DataTable().ajax.reload();
                        },
                    });
                }else if (
                        // Read more about handling dismissals
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swal.fire(
                            'Cancelled',
                            'Gagal Mengubah Status',
                            'error'
                        )
                    }
                });
            } );

            {{--menampilkan detail--}}
            $('#datatable tbody').on('click', '#edit', function (e) {
                var table = $('#datatable').DataTable();
                var data = table.row( $(this).parents('tr') ).data();
                $('#nama_pengguna').val(data.nama_pengguna);
                $('#waktu_pelaporan').val(data.waktu_pelaporan);
                $('#media_pelaporan').val(data.media_pelaporan);
                $('#kontak_pengguna').val(data.kontak_pengguna);
                $('#deskripsi').val(data.deskripsi).change();
                $("#submit_pengaduan").attr("aksi","edit");
                $('#submit_pengaduan').attr("idpelaporan",data.id_pengaduan);
                $('#input_pengaduan').modal('toggle');
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
                            url: "{{ url('/admin/delete/') }}/" + data.id_pengaduan,
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
        })
    </script>

@endsection
