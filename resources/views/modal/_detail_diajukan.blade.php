<div id="input_pengaduan" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="form_pengaduan">
                    {{ csrf_field() }}
                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">Informasi Pengaduan</legend>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Nama Pengguna</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Waktu Pelaporan</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="waktu_pelaporan" name="waktu_pelaporan" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Media Pelaporan</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="media_pelaporan" name="media_pelaporan" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Kontak Pengguna</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="kontak_pengguna" name="kontak_pengguna" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Deskripsi</label>
                            <div class="col-lg-10">
                                <textarea class="form-control" id="deskripsi" cols="3" rows="3" name="deskripsi" readonly></textarea>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link legitRipple" data-dismiss="modal">Tutup<span class="legitRipple-ripple"></span></button>
            </div>
        </div>
    </div>
</div>
