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
                            <div class="col-sm-4">
                                <label>Media</label>
                                <select data-placeholder="Pilih Media" id="media_pelaporan" name="media_pelaporan" class="form-control form-control-sm select" data-container-css-class="select-sm">
                                    <option></option>
                                </select>
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
                                <select data-placeholder="Pilih Tipe" id="tipe" name="tipe" class="form-control form-control-sm select" data-container-css-class="select-sm">
                                    <option></option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <label>Kategori</label>
                                <select data-placeholder="Pilih Kategori" id="kategori" name="kategori" class="form-control form-control-sm select" data-container-css-class="select-sm">
                                    <option></option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <label>User</label>
                                <select data-placeholder="Pilih User" id="user" name="user" class="form-control form-control-sm select" data-container-css-class="select-sm">
                                    <option></option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <label>Jenis</label>
                                <select data-placeholder="Pilih Jenis" id="jenis" name="jenis" class="form-control form-control-sm select" data-container-css-class="select-sm">
                                    <option></option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-4">
                                <label>Urgensi</label>
                                <select data-placeholder="Pilih Urgensi" id="urgensi" name="urgensi" class="form-control form-control-sm select" data-container-css-class="select-sm">
                                    <option></option>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label>Dampak</label>
                                <select data-placeholder="Pilih Dampak" id="dampak" name="dampak" class="form-control form-control-sm select" data-container-css-class="select-sm">
                                    <option></option>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label>Prioritas</label>
                                <select data-placeholder="Pilih Prioritas" id="prioritas" name="prioritas" class="form-control form-control-sm select" data-container-css-class="select-sm">
                                    <option></option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <h5 class="text-white bg-info text-center">Informasi Penanganan</h5><br>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Petugas</label>
                                @foreach($initials AS $a)
                                    <input type="text" class="form-control" id="petugas" name="petugas" value="{{ $a }}" readonly>
                                @endforeach
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
                                <label>status konfirmasi kepada pengguna</label>
                                <select data-placeholder="Pilih Konfirmasi" id="konfirmasi" name="konfirmasi" class="form-control form-control-sm select" data-container-css-class="select-sm">
                                    <option></option>
                                </select>
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
