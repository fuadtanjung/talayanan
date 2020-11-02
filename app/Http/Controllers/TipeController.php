<?php

namespace App\Http\Controllers;

use App\Models\Tipe;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TipeController extends Controller
{
    public function index(){
        return view('klasifikasi.tipe');
    }

    protected function  validasiData($data){
        $pesan = [
            'required' => ':attribute tidak boleh kosong',
            'unique' => ':attribute tidak boleh sama',
            'exists' => ':attribute tidak ditemukan'
        ];
        return validator($data, [
            'nama_tipe' => 'required:Tipe',
            'singkatan' => 'required:Tipe',
        ], $pesan);
    }

    public function input(Request $request){
        $validasi = $this->validasiData($request->all());
        if ($validasi->passes()) {
            $tipe = new Tipe;
            $tipe->nama_tipe = $request->nama_tipe;
            $tipe->sk_tipe = $request->singkatan;

            if($tipe->save()){
                return json_encode(array("success"=>"Berhasil Menambahkan Data Tipe"));
            }
            else{
                return json_encode(array("error"=>"Gagal Menambahkan Data Tipe"));
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
        $tipe =  Tipe::all();
        try {
            return Datatables::of($tipe)
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
            $tipe = Tipe::where('id_tipe', $id)->first();
            $tipe->nama_tipe = $request->nama_tipe;
            $tipe->sk_tipe = $request->singkatan;

            if ($tipe->update()) {
                return json_encode(array("success" => "Berhasil Merubah Data Tipe :)"));
            } else {
                return json_encode(array("error" => "Gagal Merubah Data Tipe :("));
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
        $tipe = Tipe::where('id_tipe', $id)->first();
        if($tipe->delete()){
            return json_encode(array("success"=>"Berhasil Menghapus Data Tipe :)"));
        }else{
            return json_encode(array("error"=>"Gagal Menghapus Data Tipe :("));
        }
    }

}
