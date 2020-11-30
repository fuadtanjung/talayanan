<?php

namespace App\Http\Controllers;

use App\Models\Prioritas;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PrioritasController extends Controller
{
    public function index(){
        return view('admin.klasifikasi.prioritas');
    }

    protected function  validasiData($data){
        $pesan = [
            'required' => ':attribute tidak boleh kosong',
            'unique' => ':attribute tidak boleh sama',
            'exists' => ':attribute tidak ditemukan'
        ];
        return validator($data, [
            'nama_prioritas' => 'required:Userss ',
            'singkatan' => 'required:Userss',
        ], $pesan);
    }

    public function input(Request $request){
        $validasi = $this->validasiData($request->all());
        if ($validasi->passes()) {
            $prioritas = new Prioritas;
            $prioritas->nama_prioritas = $request->nama_prioritas;
            $prioritas->id_prioritas = $request->singkatan;

            if($prioritas->save()){
                return json_encode(array("success"=>"Berhasil Menambahkan Data Prioritas"));
            }
            else{
                return json_encode(array("error"=>"Gagal Menambahkan Data Priroitas"));
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
        $prioritas =  Prioritas::all();
        try {
            return Datatables::of($prioritas)
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
            $prioritas = Prioritas::where('id_prioritas', $id)->first();
            $prioritas->nama_prioritas = $request->nama_prioritas;
            $prioritas->id_prioritas = $request->singkatan;

            if ($prioritas->update()) {
                return json_encode(array("success" => "Berhasil Merubah Data Prioritas :)"));
            } else {
                return json_encode(array("error" => "Gagal Merubah Data Prioritas :("));
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
        $prioritas = Prioritas::where('id_prioritas', $id)->first();
        if($prioritas->delete()){
            return json_encode(array("success"=>"Berhasil Menghapus Data Prioritas :)"));
        }else{
            return json_encode(array("error"=>"Gagal Menghapus Data Prioritas :("));
        }
    }
}
