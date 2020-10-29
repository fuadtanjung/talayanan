<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DampakController extends Controller
{
    public function index(){
        return view('klasifikasi.dampak');
    }

    protected function  validasiData($data){
        $pesan = [
            'required' => ':attribute tidak boleh kosong',
            'unique' => ':attribute tidak boleh sama',
            'exists' => ':attribute tidak ditemukan'
        ];
        return validator($data, [
            'nama_dampak' => 'required:Userss ',
            'sk_dampak' => 'required:Userss',
        ], $pesan);
    }

    public function input(Request $request){
        $validasi = $this->validasiData($request->all());
        if ($validasi->passes()) {
            $dampak = new Dampak;
            $dampak->nama_dampak = $request->nama_dampak;
            $dampak->sk_dampak = $request->sk_dampak;

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
        $dampak =  DB::table('dampaks')->get();
        try {
            return Datatables::of($dampak)
                ->addColumn('action', function ($userss) {
                    return "
                        <a href=\"#\" class=\"btn btn-outline-success btn-sm legitRipple\" id=\"edit\"><i class=\"icon-pencil\"></i> </a>
                        <a href=\"#\" class=\"btn btn-outline-danger btn-sm legitRipple\" id=\"delete\"><i class=\"icon-trash\"></i> </a>
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
            $dampak->sk_dampak = $request->sk_dampak;

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
        $dampak = Dampak::where('id_dampak', $id)->first();
        if($dampak->delete()){
            return json_encode(array("success"=>"Berhasil Menghapus Data Dampak :)"));
        }else{
            return json_encode(array("error"=>"Gagal Menghapus Data Dampak :("));
        }
    }
}
