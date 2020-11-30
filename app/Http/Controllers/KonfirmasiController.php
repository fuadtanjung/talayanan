<?php

namespace App\Http\Controllers;

use App\Models\InformasiPengaduan;

use App\Models\Status_konfirmasi;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KonfirmasiController extends Controller
{
    public function index(){
        return view('admin.penanganan.konfirmasi');
    }

    protected function  validasiData($data){
        $pesan = [
            'required' => ':attribute tidak boleh kosong',
            'unique' => ':attribute tidak boleh sama',
            'exists' => ':attribute tidak ditemukan'
        ];
        return validator($data, [
            'nama_konfirmasi' => 'required',
        ], $pesan);
    }

    public function input(Request $request){
        $validasi = $this->validasiData($request->all());
        if ($validasi->passes()) {
            $konfirmasi = new Status_konfirmasi();
            $konfirmasi->nama_konfirmasi = $request->nama_konfirmasi;

            if($konfirmasi->save()){
                return json_encode(array("success"=>"Berhasil Menambahkan Data Konfirmasi"));
            }
            else{
                return json_encode(array("error"=>"Gagal Menambahkan Data Konfirmasi"));
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

    public function ajaxTable(){
        $konfirmasi =  Status_konfirmasi::all();
        try {
            return Datatables::of($konfirmasi)
                ->addColumn('action', function ($konfirmasi) {
                    return "
                        <a href=\"#\" class=\"btn btn-sm btn-outline-success rounded-round\" id=\"edit\"><i class=\"icon-pencil\"></i> Edit </a>
                        <a href=\"#\" class=\"btn btn-sm btn-outline-danger rounded-round\" id=\"delete\"><i class=\"icon-trash\"></i> Hapus </a>
                    ";
                })
                ->make(true);
        } catch (\Exception $e) {
        }
    }

    public function edit($id, Request $request){
        $validasi = $this->validasiData($request->all());
        if($validasi->passes()) {
            $konfirmasi = Status_konfirmasi::where('id_konfirmasi', $id)->first();
            $konfirmasi->nama_konfirmasi = $request->nama_konfirmasi;

            if ($konfirmasi->update()) {
                return json_encode(array("success" => "Berhasil Merubah Data Konfirmasi :)"));
            } else {
                return json_encode(array("error" => "Gagal Merubah Data Konfirmasi :("));
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
        if (InformasiPengaduan::where('konfirmasi_id',$id)->count() == 0) {
            $konfirmasi = Status_konfirmasi::where('id_konfirmasi', $id)->first();
            if ($konfirmasi->delete()) {
                return json_encode(array("success" => "Berhasil Menghapus Data Konfirmasi :)"));
            } else {
                return json_encode(array("error" => "Gagal Menghapus Data Konfirmasi :("));
            }
        }
        else{
            return json_encode(array("error"=>"Gagal Data Sedang Di Pakai"));
        }
    }
}
