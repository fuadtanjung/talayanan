<?php

namespace App\Http\Controllers;

use App\Models\InformasiPengaduan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DiajukanController extends Controller
{
    public function index(){
        return view('diajukan');
    }

    public function ajaxTable(){
        $informasi_pelaporan =  InformasiPengaduan::Where('status','diajukan')->get();
        try {
            return Datatables::of($informasi_pelaporan)
                ->addColumn('action', function ($informasi) {
                    return "
                        <a href=\"#\" class=\"btn btn-sm btn-outline-success rounded-round\" title=\"Lihat Data\" data-popup=\"tooltip\" id=\"edit\"><i class=\"fa fa-eye\"></i></a>
                        <a href=\"#\" class=\"btn btn-sm btn-outline-primary  rounded-round\" title=\"Proses Data\" data-popup=\"tooltip\" id=\"change\"><i class=\"fa fa-power-off\"></i></a>
                        <a href=\"#\" class=\"btn btn-sm btn-outline-danger rounded-round\" title=\"Hapus Data\" data-popup=\"tooltip\" id=\"delete\"><i class=\"fa fa-trash\"></i> </a>
                    ";
                })
                ->make(true);
        } catch (\Exception $e) {

        }
    }

    protected function  validasiData($data){
        $pesan = [
            'required' => ':attribute tidak boleh kosong',
            'unique' => ':attribute tidak boleh sama',
            'exists' => ':attribute tidak ditemukan'
        ];
        return validator($data, [
            'nama_pengguna' => 'required:informasi_pelaporan',
            'kontak_pengguna' => 'required:informasi_pelaporan',
            'deskripsi' => 'required:informasi_pelaporan',
            'tipe' => 'required:informasi_pelaporan',
            'kategori' => 'required:informasi_pelaporan',
            'user' => 'required:informasi_pelaporan',
            'jenis' => 'required:informasi_pelaporan',
            'urgensi' => 'required:informasi_pelaporan',
            'dampak' => 'required:informasi_pelaporan',
            'prioritas' => 'required:informasi_pelaporan',
            'petugas' => 'required:informasi_pelaporan',
            'keterangan' => 'required:informasi_pelaporan',
            'solusi' => 'required:informasi_pelaporan',
            'konfirmasi' => 'required:informasi_pelaporan',
        ], $pesan);
    }


    public function edit($id, Request $request)
    {
        $validasi = $this->validasiData($request->all());
        $status = 'difasilitasi';
        if ($validasi->passes()) {
            $informasi_pelaporan = InformasiPengaduan::where('id_pengaduan', $id)->first();
            $informasi_pelaporan->kategori_id = $request->kategori;
            $informasi_pelaporan->tipe_id = $request->tipe;
            $informasi_pelaporan->user_id = $request->user;
            $informasi_pelaporan->urgensi_id = $request->urgensi;
            $informasi_pelaporan->prioritas_id = $request->prioritas;
            $informasi_pelaporan->jenis_id = $request->jenis;
            $informasi_pelaporan->dampak_id = $request->dampak;
            $informasi_pelaporan->petugas_id = $request->petugas;
            $informasi_pelaporan->keterangan = $request->keterangan;
            $informasi_pelaporan->solusi = $request->solusi;
            $informasi_pelaporan->status = $status;
            $informasi_pelaporan->status_pengguna = $request->konfirmasi;
            $informasi_pelaporan->tgl_pemuktahiran = date('Y-m-d');
            $informasi_pelaporan->tgl_selesai = date('Y-m-d');
            if ($informasi_pelaporan->update()) {
                return json_encode(array("success" => "Berhasil Merubah Data Informasi :)"));
            } else {
                return json_encode(array("error" => "Gagal Merubah Data Informasi :("));
            }
        }else{
            $msg = $validasi->getMessageBag()->messages();
            $err = array();
            foreach ($msg as $key=>$item) {
                $err[] = $item[0];
            }
            return json_encode(array("error"=>$err));
        }
    }

    public function delete($id){
        $informasi_pelaporan = InformasiPengaduan::where('id_pengaduan', $id)->first();
        if($informasi_pelaporan->delete()){
            return json_encode(array("success"=>"Berhasil Menghapus Data Pengaduan :)"));
        }else{
            return json_encode(array("error"=>"Gagal Menghapus Data Pengaduan :("));
        }
    }

    public function changeStatus($id){
        $informasi_pelaporan = InformasiPengaduan::where('id_pengaduan', $id)->first();
        if($informasi_pelaporan->status == "ditangani"){
            $informasi_pelaporan->status = "diajukan";
            $informasi_pelaporan->update();
        }else{
            $informasi_pelaporan->status = "ditangani";
            $informasi_pelaporan->update();
        }
    }


}
