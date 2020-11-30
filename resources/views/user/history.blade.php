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

        <table class="table datatable-basic table-bordered table-hover table-sm" width="100%" id="datatable">
            <thead>
            <tr>
                <th>No Tiket </th>
                <th>Kendala</th>
                <th>Waktu Pengaduan</th>
                <th>Status</th>
            </tr>
            </thead>
        </table>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        function loadData() {
            $('#datatable').dataTable({
                "ajax": "{{ url('/user/data3') }}",
                "columns": [
                    { "data": "no_tiket" },
                    { "data": "deskripsi" },
                    { "data": "waktu_pelaporan" },
                    { "data": "status" },
                ],
                autoWidth: false,
                columnDefs: [{
                    width: 200,
                    "className": "text-center",
                    targets: [ 3 ]
                },
                    {
                        targets: [2],
                        render: $.fn.dataTable.render.moment( 'D MMM YYYY' ),
                    },{
                    width: 300,
                    targets: [ 1 ]
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

        function resetFormReport() {
            $("#form_report")[0].reset();
            $("#tes").val("").change();
        }

        $(window).on('load', function () {
            loadData();
        })
    </script>

@endsection
