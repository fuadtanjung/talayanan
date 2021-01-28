@extends('layouts.navbar')

@section('header')
    <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">User</span> - Profile</h4>
    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
@endsection

@section('content')
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Profile information</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="reload"></a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <form action="#">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Nama</label>
                            <input type="text" value="{{ Auth()->user()->name }}" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Kontak</label>
                            <input type="text" value="{{ Auth()->user()->kontak}}" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Email</label>
                            <input type="text" value="{{ Auth()->user()->email }}" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label>User</label>
                            <input type="text" value="{{ Auth()->user()->role->nama }}" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="text-leftt">
                    <button type="submit" class="btn btn-primary"  data-toggle="modal" data-target="#edit_profile">Edit Profile</button>
                    <button type="submit" class="btn btn-danger" style="margin-left: 1%"  data-toggle="modal" data-target="#edit_password">Ganti Password</button>
                </div>
            </form>
        </div>
    </div>

    <div id="edit_profile" class="modal fade" data-backdrop="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h6 class="modal-title" style="color: white">Edit Profil</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form id="form_edit" class="form-material">
                        {{ csrf_field() }}
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <h6>Nama</h6>
                                        <input type="text" class="form-control" id="nama" name="nama" value="{{ Auth()->user()->name }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <h6>Kontak</h6>
                                        <input type="text" class="form-control" id="kontak" name="kontak" value="{{ Auth()->user()->kontak}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <h6>Email</h6>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ Auth()->user()->email}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <h6>User</h6>
                                        <select data-placeholder="Pilih User" id="role" name="user" class="form-control form-control-sm select" data-container-css-class="select-sm">
                                            <option></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-link legitRipple" data-dismiss="modal">Tutup<span class="legitRipple-ripple" style="left: 59.2894%; top: 39.4737%; transform: translate3d(-50%, -50%, 0px); width: 225.475%; opacity: 0;"></span></button>
                    <button type="button" class="btn btn-primary legitRipple" aksi="input" id="submit_edit">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <div id="edit_password" class="modal fade" data-backdrop="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h6 class="modal-title" style="color: white">Edit Password</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form id="form_password" class="form-material">
                        {{ csrf_field() }}
                        <div class="row clearfix">
                            <div class="col-sm-8">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <h6>New Password</h6>
                                        <input type="password" class="form-control" id="password" name="password">
                                        <input type="checkbox" onclick="myFunction()" style="margin-top: 2%"> Show Password
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-link legitRipple" data-dismiss="modal">Tutup<span class="legitRipple-ripple" style="left: 59.2894%; top: 39.4737%; transform: translate3d(-50%, -50%, 0px); width: 225.475%; opacity: 0;"></span></button>
                    <button type="button" class="btn btn-primary legitRipple" aksi="input" id="submit_password">Simpan</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>

    function resetFormEdit() {
        $("#form_edit")[0].reset();
    }

    $('#submit_edit').click(function () {
        var id = "{{ Auth()->user()->id }}";
        $.ajax({
            url: "{{ url('user/editprofile') }}/" + id,
            type: "post",
            data: new FormData($('#form_edit')[0]),
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
                }else if(pesan.success != null){
                    Toast.fire({
                        type: 'success',
                        position: 'top-right',
                        text: pesan.success,
                    });
                    resetFormEdit();
                    $('#edit_profile').modal('toggle');
                    location.reload();
                }else {
                    Toast.fire({
                        type: 'warning',
                        position: 'top-right',
                        text: 'Can\'t retrieve any data from server',
                    });
                    $('#submit_edit').attr("data-aksi","input");
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
    });

    $.ajax({
        url: '{{ url('list/role') }}',
        dataType: "json",
        success: function (data) {
            var role = jQuery.parseJSON(JSON.stringify(data));
            $.each(role, function (k, v) {
                $('#role').append($('<option>', {value: v.id}).text(v.nama))
            })
        }
    });

    $('#edit_profile').on('show.bs.modal',function () {
        resetFormEdit();
        $("#submit_edit").attr("submit_edit");
    });

    function resetFormPassword() {
        $("#form_password")[0].reset();
    }

    $('#submit_password').click(function () {
        var id = "{{ Auth()->user()->id }}";
        $.ajax({
            url: "{{ url('user/editpassword') }}/" + id,
            type: "post",
            data: new FormData($('#form_password')[0]),
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
                }else if(pesan.success != null){
                    Toast.fire({
                        type: 'success',
                        position: 'top-right',
                        text: pesan.success,
                    });
                    resetFormEdit();
                    $('#edit_password').modal('toggle');
                    location.reload();
                }else {
                    Toast.fire({
                        type: 'warning',
                        position: 'top-right',
                        text: 'Can\'t retrieve any data from server',
                    });
                    $('#submit_edit').attr("data-aksi","input");
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
    });


    $('#edit_password').on('show.bs.modal',function () {
        resetFormPassword();
        $("#submit_password").attr("submit_password");
    });

    function myFunction() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

    </script>
@endsection
