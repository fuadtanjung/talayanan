<?php

namespace App\Http\Controllers;

use App\Models\InformasiPengaduan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DiajukanController extends Controller
{
    public function index(){
        return view('admin.diajukan');
    }

    public function ajaxTable(){
        $informasi_pelaporan =  InformasiPengaduan::join('media','informasi_pengaduans.media_id','media.id_media')
            ->join('users','informasi_pengaduans.user_id','=','users.id')
            ->where('status','=','diajukan')
            ->get();
        try {
            return Datatables::of($informasi_pelaporan)
                ->addColumn('action', function ($informasi) {
                    return "
                        <a href=\"#\" class=\"btn btn-sm btn-outline-success rounded-round\" title=\"Lihat Data\" data-popup=\"tooltip\" id=\"edit\"><i class=\"fa fa-eye\"></i></a>
                        <a href=\"#\" class=\"btn btn-sm btn-outline-primary  rounded-round\" title=\"Proses Data\" data-popup=\"tooltip\" id=\"change\"><i class=\"fa fa-edit\"></i></a>
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

    public function delete($id){
        $informasi_pelaporan = InformasiPengaduan::where('no_tiket', $id)->first();
        if($informasi_pelaporan->delete()){
            return json_encode(array("success"=>"Berhasil Menghapus Data Pengaduan :)"));
        }else{
            return json_encode(array("error"=>"Gagal Menghapus Data Pengaduan :("));
        }
    }

    public function changeStatus($id){
        $informasi_pelaporan = InformasiPengaduan::where('no_tiket', $id)->first();
        if($informasi_pelaporan->status == 'diproses'){
            $informasi_pelaporan->status = 'diajukan';
            $informasi_pelaporan->update();
        }else{
            $informasi_pelaporan->status = 'diproses';
            $informasi_pelaporan->update();
        }
    }


}
