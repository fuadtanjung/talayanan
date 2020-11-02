<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PetugasController extends Controller
{
    public function index(){
        return view('klasifikasi.petugas');
    }

    protected function  validasiData($data){
        $pesan = [
            'required' => ':attribute tidak boleh kosong',
            'unique' => ':attribute tidak boleh sama',
            'exists' => ':attribute tidak ditemukan'
        ];
        return validator($data, [
            'inisial' => 'required:Petugas',
        ], $pesan);
    }

    public function input(Request $request){
        $validasi = $this->validasiData($request->all());
        if ($validasi->passes()) {
            $petugas = new Petugas;
            $petugas->in_petugas = $request->inisial;

            if($petugas->save()){
                return json_encode(array("success"=>"Berhasil Menambahkan Data Petugas "));
            }
            else{
                return json_encode(array("error"=>"Gagal Menambahkan Data Petugas"));
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
        $petugas =  Petugas::all();
        try {
            return Datatables::of($petugas)
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
            $petugas = Petugas::where('id_petugas', $id)->first();
            $petugas->in_petugas = $request->inisial;

            if ($petugas->update()) {
                return json_encode(array("success" => "Berhasil Merubah Data Petugas :)"));
            } else {
                return json_encode(array("error" => "Gagal Merubah Data Petugas :("));
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
        $petugas = Petugas::where('id_petugas', $id)->first();
        if($petugas->delete()){
            return json_encode(array("success"=>"Berhasil Menghapus Data Petugas :)"));
        }else{
            return json_encode(array("error"=>"Gagal Menghapus Data Petugas :("));
        }
    }
}
