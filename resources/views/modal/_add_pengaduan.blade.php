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
                    <h5 class="text-white bg-info text-center">Informasi Pelaporan</h5><br>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-4">
                                <label>Nama Pengguna</label>
                                <input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna">
                            </div>
                            <div class="col-sm-4" id="tanggal">
                                <label>Waktu Pelaporan</label>
                                <input type="date" class="form-control" id="waktu_pelaporan" name="waktu_pelaporan">
                            </div>
                            <div class="col-sm-4" id="tanggal">
                                <label>Media Pelaporan</label>
                                <input type="text" class="form-control" id="media_pelaporan" name="media_pelaporan">
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
                                <select class="custom-select select2" id="tipe" name="tipe">
                                    <option value="">Pilih Tipe</option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <label>Kategori</label>
                                <select class="custom-select select2" id="kategori" name="kategori">
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
