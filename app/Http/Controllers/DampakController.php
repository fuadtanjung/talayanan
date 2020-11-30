<?php

namespace App\Http\Controllers;

use App\Models\Dampak;
use App\Models\InformasiPengaduan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DampakController extends Controller
{
    public function index(){
        return view('admin.klasifikasi.dampak');
    }

    protected function  validasiData($data){
        $pesan = [
            'required' => ':attribute tidak boleh kosong',
            'unique' => ':attribute tidak boleh sama',
            'exists' => ':attribute tidak ditemukan'
        ];
        return validator($data, [
            'nama_dampak' => 'required',
            'singkatan' => 'required',
        ], $pesan);
    }

    public function input(Request $request){
        $validasi = $this->validasiData($request->all());
        if ($validasi->passes()) {
            $dampak = new Dampak;
            $dampak->nama_dampak = $request->nama_dampak;
            $dampak->id_dampak = $request->singkatan;

            if($dampak->save()){
                return json_encode(array("success"=>"Berhasil Menambahkan Data Dampak"));
            }
            else{
                return json_encode(array("error"=>"Gagal Menambahkan Data Dampak"));
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
        $dampak =  Dampak::all();
        try {
            return Datatables::of($dampak)
                ->addColumn('action', function ($userss) {
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
            $dampak = Dampak::where('id_dampak', $id)->first();
            $dampak->nama_dampak = $request->nama_dampak;
            $dampak->id_dampak = $request->singkatan;

            if ($dampak->update()) {
                return json_encode(array("success" => "Berhasil Merubah Data Dampak :)"));
            } else {
                return json_encode(array("error" => "Gagal Merubah Data Dampak :("));
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
        if (InformasiPengaduan::where('dampak_id',$id)->count() == 0) {
            $dampak = Dampak::where('id_dampak', $id)->first();
            if($dampak->delete()){
                return json_encode(array("success"=>"Berhasil Menghapus Data Dampak :)"));
            }else{
                return json_encode(array("error"=>"Gagal Menghapus Data Dampak :("));
            }
        }else{
            return json_encode(array("error"=>"Gagal Data Sedang Di Pakai"));
        }
    }

}
