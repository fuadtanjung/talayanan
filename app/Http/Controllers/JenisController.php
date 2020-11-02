<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class JenisController extends Controller
{
    public function index(){
        return view('klasifikasi.jenis');
    }

    protected function  validasiData($data){
        $pesan = [
            'required' => ':attribute tidak boleh kosong',
            'unique' => ':attribute tidak boleh sama',
            'exists' => ':attribute tidak ditemukan'
        ];
        return validator($data, [
            'nama_jenis' => 'required:Jenis ',
            'singkatan' => 'required:Jenis',
        ], $pesan);
    }

    public function input(Request $request){
        $validasi = $this->validasiData($request->all());
        if ($validasi->passes()) {
            $jenis = new Jenis;
            $jenis->nama_jenis = $request->nama_jenis;
            $jenis->sk_jenis = $request->singkatan;

            if($jenis->save()){
                return json_encode(array("success"=>"Berhasil Menambahkan Data Jenis"));
            }
            else{
                return json_encode(array("error"=>"Gagal Menambahkan Data Jenis"));
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
        $jenis =  Jenis::all();
        try {
            return Datatables::of($jenis)
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
            $jenis = Jenis::where('id_jenis', $id)->first();
            $jenis->nama_jenis = $request->nama_jenis;
            $jenis->sk_jenis = $request->singkatan;

            if ($jenis->update()) {
                return json_encode(array("success" => "Berhasil Merubah Data Jenis :)"));
            } else {
                return json_encode(array("error" => "Gagal Merubah Data Jenis :("));
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
        $jenis = Jenis::where('id_jenis', $id)->first();
        if($jenis->delete()){
            return json_encode(array("success"=>"Berhasil Menghapus Data Jenis :)"));
        }else{
            return json_encode(array("error"=>"Gagal Menghapus Data Jenis :("));
        }
    }
}
