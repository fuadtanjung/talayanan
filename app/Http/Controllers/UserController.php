<?php

namespace App\Http\Controllers;


use App\Models\Userkl;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index(){
        return view('klasifikasi.user');
    }

    protected function  validasiData($data){
        $pesan = [
            'required' => ':attribute tidak boleh kosong',
            'unique' => ':attribute tidak boleh sama',
            'exists' => ':attribute tidak ditemukan'
        ];
        return validator($data, [
            'nama_user' => 'required:userkl ',
            'singkatan' => 'required:userkl',
        ], $pesan);
    }

    public function input(Request $request){
        $validasi = $this->validasiData($request->all());
        if ($validasi->passes()) {
            $user = new Userkl;
            $user->nama_user = $request->nama_user;
            $user->sk_user = $request->singkatan;

            if($user->save()){
                return json_encode(array("success"=>"Berhasil Menambahkan Data Pengaduan"));
            }
            else{
                return json_encode(array("error"=>"Gagal Menambahkan Data Pengaduan"));
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
        $user =  Userkl::all();
        try {
            return Datatables::of($user)
                ->addColumn('action', function ($userkl) {
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
            $user = Userkl::where('id_user', $id)->first();
            $user->nama_user = $request->nama_user;
            $user->sk_user = $request->singkatan;

            if ($user->update()) {
                return json_encode(array("success" => "Berhasil Merubah Data User :)"));
            } else {
                return json_encode(array("error" => "Gagal Merubah Data User :("));
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
        $user = Userkl::where('id_user', $id)->first();
        if($user->delete()){
            return json_encode(array("success"=>"Berhasil Menghapus Data User :)"));
        }else{
            return json_encode(array("error"=>"Gagal Menghapus Data User :("));
        }
    }
}
